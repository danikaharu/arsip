<?php

namespace App\Http\Livewire;

use App\Models\QualityControl;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use PDF;

class QualityControlCrud extends Component
{
    use WithFileUploads;
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $updatesQueryString = [
        ['page' => ['except' => 1]],
        ['search' => ['except' => '']],
    ];

    public $quality, $judul, $tanggal, $deskripsi, $upload, $qualities_id, $search;
    public $isModalOpen = 0;

    public function render()
    {
        $qualities = $this->search === null ?  QualityControl::latest()->paginate(5) : QualityControl::where('judul', 'like', '%' . $this->search . '%')->latest()->paginate(5);
        return view('livewire.quality-control-crud', compact('qualities'));
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
        $this->tanggal = '';
        $this->upload = '';
    }

    public function store()
    {
        $this->validate([
            'judul' => 'required',
            'tanggal' => 'required',
            'upload' => 'required|mimes:doc,docx,pdf',
        ], [
            'judul.required' => 'Kode Kotak Wajib Diisi',
            'tanggal.required' => 'judul Kotak Wajib Diisi',
            'upload.required' => 'Silahkan pilih file terlebih dahulu',
            'upload.mimes' => 'Hanya bisa upload file extensi .doc, .docx, dan .pdf'
        ]);

        $filename = $this->storeFile();

        QualityControl::updateOrCreate(
            ['id' => $this->qualities_id],
            [
                'judul' => $this->judul,
                'tanggal' => $this->tanggal,
                'deskripsi' => $this->deskripsi,
                'upload' => $this->upload->storeAs('file', $filename, 'public'),
            ]
        );

        session()->flash('message', $this->qualities_id ? 'Data berhasil diupdate.' : 'Data berhasil ditambahkan.');

        $this->closeModal();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $quality = QualityControl::findOrFail($id);

        $file = public_path('storage/') . $quality->upload;
        if (file_exists($file)) {
            @unlink($file);
        }
        Storage::delete($file);

        $this->qualities_id = $id;
        $this->judul = $quality->judul;
        $this->tanggal = $quality->tanggal;
        $this->deskripsi = $quality->deskripsi;
        $this->upload = $quality->upload;

        $this->openModal();
    }

    public function delete($id)
    {
        $quality = QualityControl::find($id)->delete();
        $file = public_path('storage/') . $quality->upload;
        if (file_exists($file)) {
            @unlink($file);
        }
        $quality->delete();
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
        $qualities = QualityControl::all();

        $pdf = PDF::loadView('livewire.quality-control.report', compact('qualities'))->output();
        return response()->streamDownload(
            fn () => print($pdf),
            "laporan-produksi.pdf"
        );
    }
}
