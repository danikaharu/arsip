<?php

namespace App\Http\Livewire;

use App\Models\Logistic;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use PDF;

class LogisticCrud extends Component
{
    use WithPagination;
    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    protected $updatesQueryString = [
        ['page' => ['except' => 1]],
        ['search' => ['except' => '']],
    ];

    public $logistic, $nama_barang, $satuan, $saldo_sebelumnya, $saldo_sekarang, $jumlah_pengeluaran, $tanggal_logistik, $logistics_id, $bulan, $search;
    public $isModalOpen = 0;

    public function render()
    {
        $logistics = $this->search === null ?  Logistic::latest()->paginate(5) : Logistic::where('nama_barang', 'like', '%' . $this->search . '%')->latest()->paginate(5);
        return view('livewire.logistic-crud', compact('logistics'));
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
        $this->nama_barang = '';
        $this->satuan = '';
        $this->jumlah_pengeluaran = '';
        $this->tanggal_logistik = '';
        $this->saldo_sebelumnya = '';
        $this->saldo_sekarang = '';
    }

    public function store()
    {
        $this->validate([
            'nama_barang' => 'required',
            'satuan' => 'required',
            'saldo_sebelumnya' => 'required',
            'jumlah_pengeluaran' => 'required',
            'tanggal_logistik' => 'required',
        ], [
            'nama_barang.required' => 'Nama Barang Wajib Diisi',
            'satuan.required' => 'Satuan Wajib Diisi',
            'saldo_sebelumnya.required' => 'Saldo Sebelumnya Wajib Diisi',
            'jumlah_pengeluaran.required' => 'Jumlah Pengeluaran Wajib Diisi',
            'tanggal_logistik.required' => 'Pilih Tanggal Logistik Terlebih Dahulu',
        ]);


        Logistic::updateOrCreate(['id' => $this->logistics_id], [
            'nama_barang' => $this->nama_barang,
            'satuan' => $this->satuan,
            'tanggal_logistik' => $this->tanggal_logistik,
            'jumlah_pengeluaran' => $this->jumlah_pengeluaran,
            'saldo_sebelumnya' => $this->saldo_sebelumnya,
            'saldo_sekarang' => $this->saldo_sebelumnya - $this->jumlah_pengeluaran,
        ]);

        session()->flash('message', $this->logistics_id ? 'Data berhasil diupdate.' : 'Data berhasil ditambahkan.');

        $this->closeModal();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $logistic = Logistic::findOrFail($id);

        $this->logistics_id = $id;
        $this->nama_barang = $logistic->nama_barang;
        $this->satuan = $logistic->satuan;
        $this->tanggal_logistik = $logistic->tanggal_logistik;
        $this->jumlah_pengeluaran = $logistic->jumlah_pengeluaran;
        $this->saldo_sebelumnya = $logistic->saldo_sebelumnya;
        $this->saldo_sekarang = $logistic->saldo_sebelumnya - $logistic->jumlah_pengeluaran;

        $this->openModal();
    }

    public function delete($id)
    {
        $logistic = Logistic::findOrFail($id);
        $logistic->delete();
        session()->flash('message', 'Data berhasil dihapus.');
    }

    public function exportPDF()
    {
        $logistic = Logistic::whereMonth('tanggal_logistik', $this->bulan)->get();

        $pdf = PDF::loadView('livewire.logistic.report', compact('logistic'))->output();
        return response()->streamDownload(
            fn () => print($pdf),
            "laporan-logistik.pdf"
        );
    }
}
