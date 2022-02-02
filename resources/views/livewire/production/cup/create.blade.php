<div class="my-3">
    <form>
        <div class="card-body">
            <div class="form-group">
                <div class="mb-4">
                    <label for="tanggalProduksi">Tanggal Produksi</label>
                    <input type="date" class="form-control @error('tanggal_produksi') is-invalid @enderror"
                        wire:model="tanggal_produksi">
                    @error('tanggal_produksi') <span class="invalid-feedback">{{ $message }}</span>@enderror
                </div>
                <div class="mb-4">
                    <label for="staff_operator">Staff Operator</label>
                    <input type="text" class="form-control @error('staff_operator') is-invalid @enderror"
                        wire:model="staff_operator">
                    @error('staff_operator') <span class="invalid-feedback">{{ $message }}</span>@enderror
                </div>
                <div class="mb-4">
                    <label for="staff_packer">Staff Packer</label>
                    <input type="text" class="form-control @error('staff_packer') is-invalid @enderror"
                        wire:model="staff_packer">
                    @error('staff_packer') <span class="invalid-feedback">{{ $message }}</span>@enderror
                </div>
                <div class="mb-4">
                    <label for="staff_sealing">Staff Sealing</label>
                    <input type="text" class="form-control @error('staff_sealing') is-invalid @enderror"
                        wire:model="staff_sealing">
                    @error('staff_sealing') <span class="invalid-feedback">{{ $message }}</span>@enderror
                </div>
                <div class="mb-4">
                    <label for="staff_palet">Staff Palet</label>
                    <input type="text" class="form-control @error('staff_palet') is-invalid @enderror"
                        wire:model="staff_palet">
                    @error('staff_palet') <span class="invalid-feedback">{{ $message }}</span>@enderror
                </div>
                <div class="mb-4">
                    <label for="jumlah_produksi">Jumlah Produksi</label>
                    <input type="text" class="form-control @error('jumlah_produksi') is-invalid @enderror"
                        wire:model="jumlah_produksi">
                    @error('jumlah_produksi') <span class="invalid-feedback">{{ $message }}</span>@enderror
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="mb-4">
                            <label for="miring">Miring</label>
                            <input type="text" class="form-control @error('miring') is-invalid @enderror"
                                wire:model="miring">
                            @error('miring') <span class="invalid-feedback">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-4">
                            <label for="bocor">Bocor</label>
                            <input type="text" class="form-control @error('bocor') is-invalid @enderror"
                                wire:model="bocor">
                            @error('bocor') <span class="invalid-feedback">{{ $message }}</span>@enderror
                        </div>
                    </div>
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
