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
            <button type="button" class="btn btn-info my-3" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-file-pdf"></i>Laporan Bulanan</button>
            @if(auth()->user()->role == '1')
               <button wire:click="create()" class="btn btn-primary my-3"><i class="fas fa-plus-square"></i> Tambah Data</button>  
            @endif
    
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
                        <th>Barang</th>
                        <th>Saldo Sekarang</th>
                        <th>Jumlah Pengeluaran</th>
                        <th>Tanggal Logistik</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($logistics as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->nama_barang }} - {{ $data->satuan }}</td>
                        <td>{{ $data->saldo_sekarang }}</td>
                        <td>{{ $data->jumlah_pengeluaran }}</td>
                        <td>{{ $data->tanggal_logistik }}</td>
                        <td>
                            {{-- <a href="{{ Storage::url($data->upload) }}" target="pdf-frame" class="btn btn-warning btn-md my-2">Lihat Dokumen</a> --}}
                             @if(auth()->user()->role == '1')
                            <button wire:click="edit({{ $data->id }})" class="btn btn-primary btn-md my-2">Edit</button>
                            <button wire:click="delete({{ $data->id }})" class="btn btn-danger btn-md my-2">Hapus</button>
                            @endif
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

            {{-- Report Modal --}}
            <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Laporan Bulanan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true close-btn">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <select class="form-control" wire:model="bulan">
                                <option>-- Pilih Bulan --</option>
                                <option value="1">Januari</option>
                                <option value="2">Februari</option>
                                <option value="3">Maret</option>
                                <option value="4">April</option>
                                <option value="5">Mei</option>
                                <option value="6">Juni</option>
                                <option value="7">Juli</option>
                                <option value="8">Agustus</option>
                                <option value="9">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>   
                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                           <button type="button" wire:click.prevent="exportPDF()" class="btn btn-primary close-modal">Cetak</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
