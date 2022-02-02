<div class="my-3">
    <form>
        <div class="card-body">
            <div class="form-group">
                <div class="mb-4">
                    <label for="nama_barang">Nama Barang</label>
                    <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" wire:model="nama_barang">
                    @error('nama_barang') <span class="invalid-feedback">{{ $message }}</span>@enderror
                </div>
                <div class="mb-4">
                    <label for="satuan">Satuan</label>
                    <input type="text" class="form-control @error('satuan') is-invalid @enderror" wire:model="satuan">
                    @error('satuan') <span class="invalid-feedback">{{ $message }}</span>@enderror
                </div>
                <div class="mb-4">
                    <label for="saldo_sebelumnya">Saldo Sebelumnya</label>
                    <input type="text" class="form-control @error('saldo_sebelumnya') is-invalid @enderror" wire:model="saldo_sebelumnya">
                    @error('saldo_sebelumnya') <span class="invalid-feedback">{{ $message }}</span>@enderror
                </div>
                <div class="mb-4">
                    <label for="jumlah_pengeluaran">Jumlah Pengeluaran</label>
                    <input type="text" class="form-control @error('jumlah_pengeluaran') is-invalid @enderror" wire:model="jumlah_pengeluaran">
                    @error('jumlah_pengeluaran') <span class="invalid-feedback">{{ $message }}</span>@enderror
                </div>
                <div class="mb-4">
                    <label for="tanggal_logistik">Tanggal Logistik</label>
                    <input type="date" class="form-control @error('tanggal_logistik') is-invalid @enderror" wire:model="tanggal_logistik">
                    @error('tanggal_logistik') <span class="invalid-feedback">{{ $message }}</span>@enderror
                </div>
                {{-- <div class="mb-4">
                    <label for="upload">Upload Dokumen</label>
                    <input type="file" class="form-control @error('upload') is-invalid @enderror" wire:model="upload">
                    @error('upload') <span class="invalid-feedback">{{ $message }}</span>@enderror
                </div> --}}
            </div>
        </div>
        <div class="card-footer">
            <button wire:click.prevent="store()" type="button" class="btn btn-primary">
                Simpan
            </button>
            <button wire:click="closeModal()" type="button" class="btn btn-secondary">
                Kembali
            </button>
        </div>
    </form>
</div>
