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
    <div class="row mb-4">
        <div class="col-md-12">
            <label for="satuan" class="form-label">Satuan</label>
            <select id="satuan" name="satuan" class="form-control">
                <option value="" disabled selected>Pilih</option>
                <option value="kg" {{ old('satuan', optional($bahan ?? null)->satuan) == 'kg' ? 'selected' : '' }}>Kg</option>
                <option value="meter" {{ old('satuan', optional($bahan ?? null)->satuan) == 'meter' ? 'selected' : '' }}>Meter</option>
                <option value="unit" {{ old('satuan', optional($bahan ?? null)->satuan) == 'unit' ? 'selected' : '' }}>Unit</option>
            </select>
            @error('satuan')
                <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-12">
            <label for="stok" class="form-label">Stok</label>
            <input id="stok" name="stok" value="{{ old('stok', optional($bahan ?? null)->stok) }}" type="number" class="form-control">
            @error('stok')
                <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-12">
            <label for="id_kategori" class="form-label">Kategori</label>
            <select id="id_kategori" name="id_kategori" class="form-control">
                <option value="" disabled selected>Pilih Kategori</option>
                @foreach ($kategoris as $kategori)
                    <option value="{{ $kategori->id }}" {{ old('id_kategori', optional($bahan ?? null)->id_kategori) == $kategori->id ? 'selected' : '' }}>
                        {{ $kategori->nama_kategori }}
                    </option>
                @endforeach
            </select>
            @error('id_kategori')
                <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>
@include('components.formbutton')
