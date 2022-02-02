@section('title')Data Quality Control @endsection
<x-slot name="header">
    <h2 class="text-center">Data Quality Control</h2>
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

             @if(auth()->user()->role == '0')
            <button wire:click="create()" class="btn btn-primary my-3"><i class="fas fa-plus-square"></i> Tambah Data</button>
            @endif

            @if($isModalOpen)
            @include('livewire.quality-control.create')
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
                        <th>Tanggal</th>
                        <th>Pengecekan Pagi</th>
                        <th>Pengecekan Sore</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ( $qualities as $data )
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->tanggal}}</td>
                        <td>{{$data->jam_pagi}}</td>
                        <td>{{ $data->jam_sore }}</td>
                        <td>
                            <button wire:click="exportPDFPerDate()" class="btn btn-warning my-3"></i>Laporan Harian</button>
                             @if(auth()->user()->role == '0')
                            <button wire:click="edit({{ $data->id }})" class="btn btn-primary btn-md">Edit</button>
                            <button wire:click="delete({{ $data->id }})" class="btn btn-danger btn-md">Hapus</button>
                             @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">Maaf, belum ada data</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="ml-md-4">
                {{ $qualities->links() }}
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
                           <button type="button" wire:click.prevent="exportPDFPerMonth()" class="btn btn-primary close-modal">Cetak</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
