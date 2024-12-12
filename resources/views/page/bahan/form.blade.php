<div class="mt-4">
    <div class="row mb-4">
        <div class="col-md-12">
            <label for="nama_bahan" class="form-label">Nama bahan</label>
            <input id="nama_bahan" name="nama_bahan" value="{{ old('nama_bahan', optional($bahan ?? null)->nama_bahan) }}" type="text" class="form-control">
            @error('nama_bahan')
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
