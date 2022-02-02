<div class="my-3">
    <form>
        <div class="card-body">
            <div class="form-group">
            <input type="hidden" wire:model="test_components_id">
                <div class="mb-4">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror" wire:model="tanggal">
                    @error('tanggal') <span class="invalid-feedback">{{ $message }}</span>@enderror
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="mb-4">
                            <label for="jam_pagi">Jam Pagi</label>
                            <input type="time" class="form-control @error('jam_pagi') is-invalid @enderror" wire:model="jam_pagi">
                            @error('jam_pagi') <span class="invalid-feedback">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-4">
                            <label for="jam_sore">Jam Sore</label>
                            <input type="time" class="form-control @error('jam_sore') is-invalid @enderror" wire:model="jam_sore">
                            @error('jam_sore') <span class="invalid-feedback">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="mb-4">
                            <label for="tds_airbaku_pagi">TDS Air Baku Pagi </label>
                            <input type="text" class="form-control @error('tds_airbaku_pagi') is-invalid @enderror" wire:model="tds_airbaku_pagi">
                            @error('tds_airbaku_pagi') <span class="invalid-feedback">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-4">
                            <label for="tds_airbaku_sore">TDS Air Baku Sore</label>
                            <input type="text" class="form-control @error('tds_airbaku_sore') is-invalid @enderror" wire:model="tds_airbaku_sore">
                            @error('tds_airbaku_sore') <span class="invalid-feedback">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="mb-4">
                            <label for="tds_setengahjadi_pagi">TDS Setengah Jadi Pagi </label>
                            <input type="text" class="form-control @error('tds_setengahjadi_pagi') is-invalid @enderror" wire:model="tds_setengahjadi_pagi">
                            @error('tds_setengahjadi_pagi') <span class="invalid-feedback">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-4">
                            <label for="tds_setengahjadi_sore">TDS Setengah Jadi Sore </label>
                            <input type="text" class="form-control @error('tds_setengahjadi_sore') is-invalid @enderror" wire:model="tds_setengahjadi_sore">
                            @error('tds_setengahjadi_sore') <span class="invalid-feedback">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="mb-4">
                            <label for="tds_jadi_pagi">TDS Jadi Pagi </label>
                            <input type="text" class="form-control @error('tds_jadi_pagi') is-invalid @enderror" wire:model="tds_jadi_pagi">
                            @error('tds_jadi_pagi') <span class="invalid-feedback">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-4">
                            <label for="tds_jadi_sore">TDS Jadi Sore </label>
                            <input type="text" class="form-control @error('tds_jadi_sore') is-invalid @enderror" wire:model="tds_jadi_sore">
                            @error('tds_jadi_sore') <span class="invalid-feedback">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="mb-4">
                            <label for="ph_airbaku_pagi">pH Air Baku Pagi </label>
                            <input type="text" class="form-control @error('ph_airbaku_pagi') is-invalid @enderror" wire:model="ph_airbaku_pagi">
                            @error('ph_airbaku_pagi') <span class="invalid-feedback">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-4">
                            <label for="ph_airbaku_sore">pH Air Baku Sore</label>
                            <input type="text" class="form-control @error('ph_airbaku_sore') is-invalid @enderror" wire:model="ph_airbaku_sore">
                            @error('ph_airbaku_sore') <span class="invalid-feedback">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="mb-4">
                            <label for="ph_setengahjadi_pagi">pH Setengah Jadi Pagi </label>
                            <input type="text" class="form-control @error('ph_setengahjadi_pagi') is-invalid @enderror" wire:model="ph_setengahjadi_pagi">
                            @error('ph_setengahjadi_pagi') <span class="invalid-feedback">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-4">
                            <label for="ph_setengahjadi_sore">pH Setengah Jadi Sore </label>
                            <input type="text" class="form-control @error('ph_setengahjadi_sore') is-invalid @enderror" wire:model="ph_setengahjadi_sore">
                            @error('ph_setengahjadi_sore') <span class="invalid-feedback">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="mb-4">
                            <label for="ph_jadi_pagi">pH Jadi Pagi </label>
                            <input type="text" class="form-control @error('ph_jadi_pagi') is-invalid @enderror" wire:model="ph_jadi_pagi">
                            @error('ph_jadi_pagi') <span class="invalid-feedback">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-4">
                            <label for="ph_jadi_sore">pH Jadi Sore </label>
                            <input type="text" class="form-control @error('ph_jadi_sore') is-invalid @enderror" wire:model="ph_jadi_sore">
                            @error('ph_jadi_sore') <span class="invalid-feedback">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="mb-4">
                            <label for="kekeruhan">Kekeruhan</label>
                            <input type="text" class="form-control @error('kekeruhan') is-invalid @enderror" wire:model="kekeruhan">
                            @error('kekeruhan') <span class="invalid-feedback">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="mb-4">
                            <label for="rasa">Rasa</label>
                            <select wire:model="rasa" class="form-control @error('rasa') is-invalid @enderror" >
                                <option selected>-- Pilih --</option>
                                <option value="1">Berasa</option>
                                <option value="2">Tidak Berasa</option>
                            </select>
                            @error('rasa') <span class="invalid-feedback">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="mb-4">
                            <label for="bau">Bau</label>
                             <select wire:model="bau" class="form-control @error('bau') is-invalid @enderror" >
                                <option selected>-- Pilih --</option>
                                <option value="1">Berbau</option>
                                <option value="2">Tidak Berbau</option>
                            </select>
                            @error('bau') <span class="invalid-feedback">{{ $message }}</span>@enderror
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
