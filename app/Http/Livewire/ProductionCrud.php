<?php

namespace App\Http\Livewire;

use App\Models\Production;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use PDF;

class ProductionCrud extends Component
{
    use WithPagination;
    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    protected $updatesQueryString = [
        ['page' => ['except' => 1]],
        ['search' => ['except' => '']],
    ];

    public $production, $judul, $deskripsi, $tanggal_produksi, $upload, $productions_id, $search;
    public $isModalOpen = 0;

    public function render()
    {
        $productions = $this->search === null ?  Production::latest()->paginate(5) : Production::where('judul', 'like', '%' . $this->search . '%')->latest()->paginate(5);
        return view('livewire.production-crud', compact('productions'));
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
        $this->judul = '';
        $this->deskripsi = '';
        $this->tanggal_produksi = '';
        $this->upload = '';
    }

    public function store()
    {
        $this->validate([
            'judul' => 'required',
            'tanggal_produksi' => 'required',
            'upload' => 'required|mimes:doc,docx,pdf',
        ], [
            'judul.required' => 'Kode Kotak Wajib Diisi',
            'tanggal_produksi.required' => 'Silahkan Pilih Tanggal Terlebih Dahulu',
            'upload.required' => 'Silahkan pilih file terlebih dahulu',
            'upload.mimes' => 'Hanya bisa upload file extensi .doc, .docx, dan .pdf'
        ]);

        $filename = $this->storeFile();

        Production::updateOrCreate(
            ['id' => $this->productions_id],
            [
                'judul' => $this->judul,
                'deskripsi' => $this->deskripsi,
                'tanggal_produksi' => $this->tanggal_produksi,
                'upload' => $this->upload->storeAs('file', $filename, 'public'),
            ]
        );

        session()->flash('message', $this->productions_id ? 'Data berhasil diupdate.' : 'Data berhasil ditambahkan.');

        $this->closeModal();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $production = Production::findOrFail($id);

        $file = public_path('storage/') . $production->upload;
        if (file_exists($file)) {
            @unlink($file);
        }
        Storage::delete($file);

        $this->productions_id = $id;
        $this->judul = $production->judul;
        $this->deskripsi = $production->deskripsi;
        $this->tanggal_produksi = $production->tanggal_produksi;
        $this->upload = $production->upload;

        $this->openModal();
    }

    public function delete($id)
    {
        $production = Production::findOrFail($id);
        $production->delete();
        $file = public_path('storage/') . $production->upload;
        if (file_exists($file)) {
            @unlink($file);
        }
        $production->delete();
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
        $production = Production::all();

        $pdf = PDF::loadView('livewire.production.report', compact('production'))->output();
        return response()->streamDownload(
            fn () => print($pdf),
            "laporan-produksi.pdf"
        );
    }
}
