<div class="mt-4">
    <div class="row mb-4">
        <div class="col-md-12">
            <label for="nama_keperluan" class="form-label">Nama keperluan</label>
            <input id="nama_keperluan" name="nama_keperluan" value="{{ old('nama_keperluan', optional($keperluan ?? null)->nama_keperluan) }}" type="text" class="form-control">
            @error('nama_keperluan')
                <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<button class="btn btn-secondary me-2" onclick="window.history.back();">
    {{ __('Cancel') }}
</button>
<button type="submit" class="btn btn-primary">
    {{ __('Save') }}
</button>
