<div class="my-3">
    <form>
        <div class="card-body">
            <div class="form-group">
                <div class="mb-4">
                    <label for="petugas_produksi">Petugas Produksi</label>
                    <input type="text" class="form-control @error('petugas_produksi') is-invalid @enderror"
                        wire:model="petugas_produksi">
                    @error('petugas_produksi') <span class="invalid-feedback">{{ $message }}</span>@enderror
                </div>
                <div class="mb-4">
                    <label for="staff_cuci">Staff Cuci</label>
                    <input type="text" class="form-control @error('staff_cuci') is-invalid @enderror"
                        wire:model="staff_cuci">
                    @error('staff_cuci') <span class="invalid-feedback">{{ $message }}</span>@enderror
                </div>
                <div class="mb-4">
                    <label for="staff_noxel">Staff Noxel</label>
                    <input type="text" class="form-control @error('staff_noxel') is-invalid @enderror"
                        wire:model="staff_noxel">
                    @error('staff_noxel') <span class="invalid-feedback">{{ $message }}</span>@enderror
                </div>
                <div class="mb-4">
                    <label for="staff_qc">Staff QC</label>
                    <input type="text" class="form-control @error('staff_qc') is-invalid @enderror"
                        wire:model="staff_qc">
                    @error('staff_qc') <span class="invalid-feedback">{{ $message }}</span>@enderror
                </div>
                <div class="mb-4">
                    <label for="jumlah_produksi">Jumlah Produksi</label>
                    <input type="text" class="form-control @error('jumlah_produksi') is-invalid @enderror"
                        wire:model="jumlah_produksi">
                    @error('jumlah_produksi') <span class="invalid-feedback">{{ $message }}</span>@enderror
                </div>
                <div class="mb-4">
                    <label for="tanggalProduksi">Tanggal Produksi</label>
                    <input type="date" class="form-control @error('tanggal_produksi') is-invalid @enderror"
                        wire:model="tanggal_produksi">
                    @error('tanggal_produksi') <span class="invalid-feedback">{{ $message }}</span>@enderror
                </div>
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
