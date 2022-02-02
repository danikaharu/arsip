<?php

namespace App\Http\Livewire\Production;

use App\Models\Cup;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use PDF;

class CupCrud extends Component
{
    use WithPagination;
    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    protected $updatesQueryString = [
        ['page' => ['except' => 1]],
        ['search' => ['except' => '']],
    ];

    public $cup, $staff_operator, $jumlah_produksi, $staff_packer, $staff_sealing, $staff_palet, $tanggal_produksi, $miring, $bocor, $cups_id, $bulan, $search;
    public $isModalOpen = 0;

    public function render()
    {
        $cups = $this->search === null ?  Cup::latest()->paginate(5) : Cup::where('tanggal_produksi', 'like', '%' . $this->search . '%')->latest()->paginate(5);
        return view('livewire.production.cup-crud', compact('cups'));
    }

    public function create()
    {
        $this->resetCreateForm();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
    }

    private function resetCreateForm()
    {
        $this->jumlah_produksi = '';
        $this->staff_operator = '';
        $this->tanggal_produksi = '';
        $this->staff_packer = '';
        $this->staff_sealing = '';
        $this->staff_palet = '';
        $this->miring = '';
        $this->bocor = '';
    }

    public function store()
    {
        $this->validate([
            'jumlah_produksi' => 'required',
            'staff_operator' => 'required',
            'tanggal_produksi' => 'required',
            'staff_packer' => 'required',
            'staff_sealing' => 'required',
            'staff_palet' => 'required',
            'miring' => 'numeric',
            'bocor' => 'numeric',
        ], [
            'jumlah_produksi.required' => 'Jumlah Produksi Wajib Diisi',
            'staff_operator.required' => 'Petugas Produksi Wajib Diisi',
            'tanggal_produksi.required' => 'Pilih Tanggal Produksi Terlebih Dahulu',
            'staff_packer.required' => 'Staff Cuci Wajib Diisi',
            'staff_sealing.required' => 'Staff Noxel Wajib Diisi',
            'staff_palet.required' => 'Staff QC Wajib Diisi',
            'miring.numeric' => 'Hanya bisa diisi angka',
            'bocor.numeric' => 'Hanya bisa diisi angka',
        ]);

        Cup::updateOrCreate(
            ['id' => $this->cups_id],
            [
                'jumlah_produksi' => $this->jumlah_produksi,
                'staff_operator' => $this->staff_operator,
                'tanggal_produksi' => $this->tanggal_produksi,
                'staff_packer' => $this->staff_packer,
                'staff_sealing' => $this->staff_sealing,
                'staff_palet' => $this->staff_palet,
                'miring' => $this->miring,
                'bocor' => $this->bocor,
            ]
        );

        session()->flash('message', $this->cups_id ? 'Data berhasil diupdate.' : 'Data berhasil ditambahkan.');

        $this->closeModal();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $cup = Cup::findOrFail($id);

        $this->cups_id = $id;
        $this->jumlah_produksi = $cup->jumlah_produksi;
        $this->staff_operator = $cup->staff_operator;
        $this->tanggal_produksi = $cup->tanggal_produksi;
        $this->staff_packer = $cup->staff_packer;
        $this->staff_sealing = $cup->staff_sealing;
        $this->staff_palet = $cup->staff_palet;
        $this->miring = $cup->miring;
        $this->bocor = $cup->bocor;

        $this->openModal();
    }

    public function delete($id)
    {
        $cup = Cup::findOrFail($id);
        $cup->delete();
        session()->flash('message', 'Data berhasil dihapus.');
    }

    public function exportPDF()
    {
        $cup = Cup::whereMonth('tanggal_produksi', $this->bulan)->get();

        $pdf = PDF::loadView('livewire.production.cup.report', compact('cup'))->output();
        return response()->streamDownload(
            fn () => print($pdf),
            "laporan-produksi-cup.pdf"
        );
    }
}
