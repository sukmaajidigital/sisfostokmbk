<div class="mt-4">
    <div class="row mb-4">
        <div class="col-md-12">
            <label for="nama_bahanmasuk" class="form-label">Nama bahanmasuk</label>
            <input id="nama_bahanmasuk" name="nama_bahanmasuk" value="{{ old('nama_bahanmasuk', optional($bahanmasuk ?? null)->nama_bahanmasuk) }}" type="text" class="form-control">
            @error('nama_bahanmasuk')
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
