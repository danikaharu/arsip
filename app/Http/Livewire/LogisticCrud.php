<?php

namespace App\Http\Livewire;

use App\Models\Logistic;
use App\Models\Production;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
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

    public $logistic, $judul, $deskripsi, $tanggal_pakai, $upload, $logistics_id, $productions_id, $search;
    public $isModalOpen = 0;

    public function render()
    {
        $logistics = $this->search === null ?  Logistic::with('production')->latest()->paginate(5) : Logistic::where('judul', 'like', '%' . $this->search . '%')->latest()->paginate(5);
        $production = Production::orderBy('created_at', 'desc')->get();
        return view('livewire.logistic-crud', compact('production', 'logistics'));
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
        $this->productions_id = '';
        $this->judul = '';


        $this->deskripsi = '';
        $this->tanggal_pakai = '';
        $this->upload = '';
    }

    public function store()
    {
        $this->validate([
            'productions_id' => 'required',
            'judul' => 'required',
            'tanggal_pakai' => 'required',
            'upload' => 'required|mimes:doc,docx,pdf',
        ], [
            'productions_id.required' => 'Silahkan Pilih Produksi',
            'judul.required' => 'Judul Wajib Diisi',
            'tanggal_pakai.required' => 'Silahkan Pilih Tanggal Terlebih Dahulu',
            'upload.required' => 'Silahkan pilih file terlebih dahulu',
            'upload.mimes' => 'Hanya bisa upload file extensi .doc, .docx, dan .pdf'
        ]);

        $filename = $this->storeFile();

        Logistic::updateOrCreate(['id' => $this->logistics_id], [
            'productions_id' => $this->productions_id,
            'judul' => $this->judul,


            'deskripsi' => $this->deskripsi,
            'tanggal_pakai' => $this->tanggal_pakai,
            'upload' => $this->upload->storeAs('file', $filename, 'public'),
        ]);

        session()->flash('message', $this->logistics_id ? 'Data berhasil diupdate.' : 'Data berhasil ditambahkan.');

        $this->closeModal();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $logistic = Logistic::findOrFail($id);

        $file = public_path('storage/') . $logistic->upload;
        if (file_exists($file)) {
            @unlink($file);
        }
        Storage::delete($file);

        $this->logistics_id = $id;
        $this->productions_id = $logistic->productions_id;
        $this->judul = $logistic->judul;
        $this->deskripsi = $logistic->deskripsi;
        $this->tanggal_pakai = $logistic->tanggal_pakai;
        $this->upload = $logistic->upload;

        $this->openModal();
    }

    public function delete($id)
    {
        $logistic = Logistic::findOrFail($id);
        $file = public_path('storage/') . $logistic->upload;
        if (file_exists($file)) {
            @unlink($file);
        }
        $logistic->delete();
        session()->flash('message', 'Data berhasil dihapus.');
    }

    public function storeFile()
    {
        $file = $this->upload;
        $filename = $file->getClientOriginalName();

        return $filename;
    }

    public function exportPDF()
    {
        $logistic = Logistic::with('production')->latest()->get();

        $pdf = PDF::loadView('livewire.logistic.report', compact('logistic'))->output();
        return response()->streamDownload(
            fn () => print($pdf),
            "laporan-logistik.pdf"
        );
    }
}
