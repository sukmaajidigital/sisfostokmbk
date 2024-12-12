<div class="mt-4">
    <div class="row mb-4">
        <div class="col-md-12">
            <label for="nama_bahankeluar" class="form-label">Nama bahankeluar</label>
            <input id="nama_bahankeluar" name="nama_bahankeluar" value="{{ old('nama_bahankeluar', optional($bahankeluar ?? null)->nama_bahankeluar) }}" type="text" class="form-control">
            @error('nama_bahankeluar')
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
