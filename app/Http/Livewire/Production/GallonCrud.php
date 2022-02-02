<?php

namespace App\Http\Livewire\Production;

use App\Models\Gallon;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use PDF;

class GallonCrud extends Component
{
    use WithPagination;
    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    protected $updatesQueryString = [
        ['page' => ['except' => 1]],
        ['search' => ['except' => '']],
    ];

    public $gallon, $petugas_produksi, $jumlah_produksi, $staff_cuci, $staff_noxel, $staff_qc, $tanggal_produksi, $gallons_id, $bulan, $search;
    public $isModalOpen = 0;

    public function render()
    {
        $gallons = $this->search === null ?  Gallon::latest()->paginate(5) : Gallon::where('tanggal_produksi', 'like', '%' . $this->search . '%')->latest()->paginate(5);
        return view('livewire.production.gallon-crud', compact('gallons'));
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
        $this->petugas_produksi = '';
        $this->tanggal_produksi = '';
        $this->staff_cuci = '';
        $this->staff_noxel = '';
        $this->staff_qc = '';
    }

    public function store()
    {
        $this->validate([
            'jumlah_produksi' => 'required',
            'petugas_produksi' => 'required',
            'tanggal_produksi' => 'required',
            'staff_cuci' => 'required',
            'staff_noxel' => 'required',
            'staff_qc' => 'required',
        ], [
            'jumlah_produksi.required' => 'Jumlah Produksi Wajib Diisi',
            'petugas_produksi.required' => 'Petugas Produksi Wajib Diisi',
            'tanggal_produksi.required' => 'Pilih Tanggal Produksi Terlebih Dahulu',
            'staff_cuci.required' => 'Staff Cuci Wajib Diisi',
            'staff_noxel.required' => 'Staff Noxel Wajib Diisi',
            'staff_qc.required' => 'Staff QC Wajib Diisi',
        ]);

        Gallon::updateOrCreate(
            ['id' => $this->gallons_id],
            [
                'jumlah_produksi' => $this->jumlah_produksi,
                'petugas_produksi' => $this->petugas_produksi,
                'tanggal_produksi' => $this->tanggal_produksi,
                'staff_cuci' => $this->staff_cuci,
                'staff_noxel' => $this->staff_noxel,
                'staff_qc' => $this->staff_qc,
            ]
        );

        session()->flash('message', $this->gallons_id ? 'Data berhasil diupdate.' : 'Data berhasil ditambahkan.');

        $this->closeModal();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $gallon = Gallon::findOrFail($id);

        $this->gallons_id = $id;
        $this->jumlah_produksi = $gallon->jumlah_produksi;
        $this->petugas_produksi = $gallon->petugas_produksi;
        $this->tanggal_produksi = $gallon->tanggal_produksi;
        $this->staff_cuci = $gallon->staff_cuci;
        $this->staff_noxel = $gallon->staff_noxel;
        $this->staff_qc = $gallon->staff_qc;

        $this->openModal();
    }

    public function delete($id)
    {
        $gallon = Gallon::findOrFail($id);
        $gallon->delete();
        session()->flash('message', 'Data berhasil dihapus.');
    }

    public function exportPDF()
    {
        $gallon = Gallon::whereMonth('tanggal_produksi', $this->bulan)->get();

        $pdf = PDF::loadView('livewire.production.gallon.report', compact('gallon'))->output();
        return response()->streamDownload(
            fn () => print($pdf),
            "laporan-produksi-galon.pdf"
        );
    }
}
