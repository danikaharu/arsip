<div class="my-3">
    <form>
        <div class="card-body">
            <div class="form-group">
                <div class="mb-4">
                    <label for="judul">Judul</label>
                    <input type="text" class="form-control @error('judul') is-invalid @enderror" wire:model="judul">
                    @error('judul') <span class="invalid-feedback">{{ $message }}</span>@enderror
                </div>
                <div class="mb-4">
                    <label for="produksi">Produksi</label>
                    <select wire:model="productions_id" class="form-control @error('productions_id') is-invalid @enderror ">
                        <option>-- Pilih Produksi --</option>
                        @foreach ($production as $data)
                        <option value="{{ $data->id }}">{{ $data->judul }}</option>
                        @endforeach
                    </select>
                    @error('productions_id') <span class="invalid-feedback">{{ $message }}</span>@enderror
                </div>
                <div class="mb-4">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" wire:model="deskripsi"></textarea>
                    @error('deskripsi') <span class="invalid-feedback">{{ $message }}</span>@enderror
                </div>
                <div class="mb-4">
                    <label for="tanggalPakai">Tanggal Pakai</label>
                    <input type="date" class="form-control @error('tanggal_pakai') is-invalid @enderror" wire:model="tanggal_pakai">
                    @error('tanggal_pakai') <span class="invalid-feedback">{{ $message }}</span>@enderror
                </div>
                <div class="mb-4">
                    <label for="upload">Upload Dokumen</label>
                    <input type="file" class="form-control @error('upload') is-invalid @enderror" wire:model="upload">
                    @error('upload') <span class="invalid-feedback">{{ $message }}</span>@enderror
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
