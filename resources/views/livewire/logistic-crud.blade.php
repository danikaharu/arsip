@section('title')Data Logistik @endsection
<x-slot name="header">
    <h2 class="text-center">Data Logistik</h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
            <div class="alert alert-success alert-block my-2" role="alert">
                <div class="flex">
                    <div>
                        <strong>{{ session('message') }}</strong>
                    </div>
                </div>
            </div>
            @endif
            <button wire:click="exportPDF()" class="btn btn-danger my-3"><i class="fas fa-file-pdf"></i> Cetak PDF</button>
            <button wire:click="create()" class="btn btn-primary my-3"><i class="fas fa-plus-square"></i> Tambah Data</button>
            @if($isModalOpen)
            @include('livewire.logistic.create')
            @endif
            <div class="form-group mb-5">
                <form action="" class="form-inline float-right">
                    <input wire:model="search" type="search" class="form-control mr-sm-2" placeholder="Search" aria-label="Pencarian">
                </form>
            </div>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Judul</th>
                        <th>Produksi</th>
                        <th>Deskripsi</th>
                        <th>Tanggal Pakai</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($logistics as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->judul }}</td>
                        <td>@if($data->production)
                            {{ $data->production->judul }}
                            @endif 
                        </td>
                        <td>{{ $data->deskripsi }}</td>
                        <td>{{ $data->tanggal_pakai }}</td>
                        <td>
                            <a href="{{ Storage::url($data->upload) }}" target="pdf-frame" class="btn btn-warning btn-md my-2">Lihat Dokumen</a>
                            <button wire:click="edit({{ $data->id }})" class="btn btn-primary btn-md my-2">Edit</button>
                            <button wire:click="delete({{ $data->id }})" class="btn btn-danger btn-md my-2">Hapus</button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">Maaf, belum ada data</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="ml-md-4">
                {{ $logistics->links() }}
            </div>
        </div>
    </div>
</div>
