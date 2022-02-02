<?php

namespace App\Http\Livewire;

use App\Models\QualityControl;
use App\Models\TestComponent;
use Livewire\Component;
use Livewire\WithPagination;
use PDF;

class QualityControlCrud extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $updatesQueryString = [
        ['page' => ['except' => 1]],
        ['search' => ['except' => '']],
    ];

    public $quality, $qualities_id, $tanggal, $jam_pagi, $jam_sore;
    public $tds_airbaku_pagi, $tds_airbaku_sore, $tds_setengahjadi_pagi, $tds_setengahjadi_sore, $tds_jadi_pagi, $tds_jadi_sore;
    public $ph_airbaku_pagi, $ph_airbaku_sore, $ph_setengahjadi_pagi, $ph_setengahjadi_sore, $ph_jadi_pagi, $ph_jadi_sore;
    public $search, $bulan;
    public $kekeruhan, $rasa, $bau;
    public $isModalOpen = 0;

    public function render()
    {
        $qualities = $this->search === null ?  QualityControl::latest()->paginate(5) : QualityControl::where('tanggal', 'like', '%' . $this->search . '%')->latest()->paginate(5);
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
        $this->tanggal = '';
        $this->jam_pagi = '';
        $this->jam_sore = '';
        $this->tds_airbaku_pagi = '';
        $this->tds_airbaku_sore = '';
        $this->tds_setengahjadi_pagi = '';
        $this->tds_setengahjadi_sore = '';
        $this->tds_jadi_pagi = '';
        $this->tds_jadi_sore = '';
        $this->ph_airbaku_pagi = '';
        $this->ph_airbaku_sore = '';
        $this->ph_setengahjadi_pagi = '';
        $this->ph_setengahjadi_sore = '';
        $this->ph_jadi_pagi = '';
        $this->ph_jadi_sore = '';
        $this->kekeruhan = '';
        $this->rasa = '';
        $this->bau = '';
    }

    public function store()
    {
        $this->validate([
            'tanggal' => 'required',
            'jam_pagi' => 'required',
            'jam_sore' => 'required',
            'tds_airbaku_pagi' => 'required',
            'tds_airbaku_sore' => 'required',
            'tds_setengahjadi_pagi' => 'required',
            'tds_setengahjadi_sore' => 'required',
            'tds_jadi_pagi' => 'required',
            'tds_jadi_sore' => 'required',
            'ph_airbaku_pagi' => 'required',
            'ph_airbaku_sore' => 'required',
            'ph_setengahjadi_pagi' => 'required',
            'ph_setengahjadi_sore' => 'required',
            'ph_jadi_pagi' => 'required',
            'ph_jadi_sore' => 'required',
            'kekeruhan' => 'required',
            'rasa' => 'required',
            'bau' => 'required',
        ], [
            'tanggal.required' => 'Pilih tanggal terlebih dahulu',
            'jam_pagi.required' => 'Waktu pengecekan tidak boleh kosong',
            'jam_sore.required' => 'Waktu pengecekan tidak boleh kosong',
            'tds_airbaku_pagi.required' => 'Kolom tidak boleh kosong',
            'tds_airbaku_sore.required' => 'Kolom tidak boleh kosong',
            'tds_setengahjadi_pagi.required' => 'Kolom tidak boleh kosong',
            'tds_setengahjadi_sore.required' => 'Kolom tidak boleh kosong',
            'tds_jadi_pagi.required' => 'Kolom tidak boleh kosong',
            'tds_jadi_sore.required' => 'Kolom tidak boleh kosong',
            'ph_airbaku_pagi.required' => 'Kolom tidak boleh kosong',
            'ph_airbaku_sore.required' => 'Kolom tidak boleh kosong',
            'ph_setengahjadi_pagi.required' => 'Kolom tidak boleh kosong',
            'ph_setengahjadi_sore.required' => 'Kolom tidak boleh kosong',
            'ph_jadi_pagi.required' => 'Kolom tidak boleh kosong',
            'ph_jadi_sore.required' => 'Kolom tidak boleh kosong',
            'kekeruhan.required' => 'Kolom tidak boleh kosong',
            'rasa.required' => 'Kolom tidak boleh kosong',
            'bau.required' => 'Kolom tidak boleh kosong',
        ]);

        QualityControl::updateOrCreate(
            ['id' => $this->qualities_id],
            [
                'tanggal' => $this->tanggal,
                'jam_pagi' => $this->jam_pagi,
                'jam_sore' => $this->jam_sore,
                'tds_airbaku_pagi' => $this->tds_airbaku_pagi,
                'tds_airbaku_sore' => $this->tds_airbaku_sore,
                'tds_setengahjadi_pagi' => $this->tds_setengahjadi_pagi,
                'tds_setengahjadi_sore' => $this->tds_setengahjadi_sore,
                'tds_jadi_pagi' => $this->tds_jadi_pagi,
                'tds_jadi_sore' => $this->tds_jadi_sore,
                'ph_airbaku_pagi' => $this->ph_airbaku_pagi,
                'ph_airbaku_sore' => $this->ph_airbaku_sore,
                'ph_setengahjadi_pagi' => $this->ph_setengahjadi_pagi,
                'ph_setengahjadi_sore' => $this->ph_setengahjadi_sore,
                'ph_jadi_pagi' => $this->ph_jadi_pagi,
                'ph_jadi_sore' => $this->ph_jadi_sore,
                'kekeruhan' => $this->kekeruhan,
                'rasa' => $this->rasa,
                'bau' => $this->bau,
            ]
        );

        session()->flash('message', $this->qualities_id ? 'Data berhasil diupdate.' : 'Data berhasil ditambahkan.');

        $this->closeModal();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $quality = QualityControl::findOrFail($id);

        $this->qualities_id = $id;
        $this->tanggal = $quality->tanggal;
        $this->jam_pagi = $quality->jam_pagi;
        $this->jam_sore = $quality->jam_sore;
        $this->tds_airbaku_pagi = $quality->tds_airbaku_pagi;
        $this->tds_airbaku_sore = $quality->tds_airbaku_sore;
        $this->tds_setengahjadi_pagi = $quality->tds_setengahjadi_pagi;
        $this->tds_setengahjadi_sore = $quality->tds_setengahjadi_sore;
        $this->tds_jadi_pagi = $quality->tds_jadi_pagi;
        $this->tds_jadi_sore = $quality->tds_jadi_sore;
        $this->ph_airbaku_pagi = $quality->ph_airbaku_pagi;
        $this->ph_airbaku_sore = $quality->ph_airbaku_sore;
        $this->ph_setengahjadi_pagi = $quality->ph_setengahjadi_pagi;
        $this->ph_setengahjadi_sore = $quality->ph_setengahjadi_sore;
        $this->ph_jadi_pagi = $quality->ph_jadi_pagi;
        $this->ph_jadi_sore = $quality->ph_jadi_sore;
        $this->kekeruhan = $quality->kekeruhan;
        $this->rasa = $quality->rasa;
        $this->bau = $quality->bau;

        $this->openModal();
    }

    public function delete($id)
    {
        QualityControl::find($id)->delete();
        session()->flash('message', 'Data berhasil dihapus.');
    }

    public function exportPDFPerDate()
    {
        foreach (QualityControl::all() as $qualities) {
            $quality = QualityControl::where('tanggal', $qualities->tanggal)->first();

            $pdf = PDF::loadView('livewire.quality-control.report-daily', compact('quality'))->output();
            return response()->streamDownload(
                fn () => print($pdf),
                "laporan-qc.pdf"
            );
        }
    }

    public function exportPDFPerMonth()
    {
        foreach (QualityControl::all() as $qualities) {
            $quality = QualityControl::whereMonth('created_at', $this->bulan)->get();

            $pdf = PDF::loadView('livewire.quality-control.report-monthly', compact('quality'))->setPaper('a4', 'landscape')->output();
            return response()->streamDownload(
                fn () => print($pdf),
                "laporan-qc.pdf"
            );
        }
    }
}
