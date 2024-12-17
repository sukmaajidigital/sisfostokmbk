<div class="mt-4">
    <div class="row mb-4">
        <div class="col-md-12">
            <label for="nama_kategori" class="form-label">Nama kategori</label>
            <input id="nama_kategori" name="nama_kategori" value="{{ old('nama_kategori', optional($kategori ?? null)->nama_kategori) }}" type="text" class="form-control">
            @error('nama_kategori')
                <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>
@include('components.button')
