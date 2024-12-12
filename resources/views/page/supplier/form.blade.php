<div class="mt-4">
    <div class="row mb-4">
        <div class="col-md-12">
            <label for="nama_supplier" class="form-label">Nama supplier</label>
            <input id="nama_supplier" name="nama_supplier" value="{{ old('nama_supplier', optional($supplier ?? null)->nama_supplier) }}" type="text" class="form-control">
            @error('nama_supplier')
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
