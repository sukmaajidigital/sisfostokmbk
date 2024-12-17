<div class="row mb-4">
    <div class="col-md-8">
        <label for="id_bahan" class="form-label">Nama Bahan</label>
        <select id="id_bahan" name="id_bahan" class="form-control" onchange="updateStok()">
            <option value="" disabled selected>Pilih Bahan</option>
            @foreach ($bahans as $bahan)
                <option value="{{ $bahan->id }}" data-stok="{{ $bahan->stok . ' ' . $bahan->satuan }}" {{ old('id_bahan', optional($bahankeluar ?? null)->id_bahan) == $bahan->id ? 'selected' : '' }}>
                    {{ $bahan->nama_bahan }}
                </option>
            @endforeach
        </select>
        @error('id_bahan')
            <div class="text-danger mt-2">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-4">
        <label for="stok" class="form-label">Stok Tersedia</label>
        <input id="stok" name="stok" value="{{ old('stok') }}" type="text" class="form-control" readonly>
        @error('stok')
            <div class="text-danger mt-2">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="row mb-4">
    <div class="col-md-6">
        <label for="tanggal" class="form-label">Tanggal</label>
        <input id="tanggal" name="tanggal" value="{{ old('tanggal', optional($bahankeluar ?? null)->tanggal) }}" type="date" class="form-control">
        @error('tanggal')
            <div class="text-danger mt-2">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="id_keperluan" class="form-label">Keperluan</label>
        <select id="id_keperluan" name="id_keperluan" class="form-control">
            <option value="" disabled selected>Pilih Keperluan</option>
            @foreach ($keperluans as $keperluan)
                <option value="{{ $keperluan->id }}" {{ old('id_keperluan', optional($bahankeluar ?? null)->id_keperluan) == $keperluan->id ? 'selected' : '' }}>
                    {{ $keperluan->nama_keperluan }}
                </option>
            @endforeach
        </select>
        @error('id_keperluan')
            <div class="text-danger mt-2">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-12">
        <label for="jumlah" class="form-label">Jumlah</label>
        <input id="jumlah" name="jumlah" value="{{ old('jumlah', optional($bahankeluar ?? null)->jumlah) }}" type="number" class="form-control">
        @error('jumlah')
            <div class="text-danger mt-2">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="row mb-4">
    <div class="col-md-12">
        <label for="catatan" class="form-label">Catatan</label>
        <textarea id="catatan" name="catatan" class="form-control">{{ old('catatan', optional($bahankeluar ?? null)->catatan) }}</textarea>
        @error('catatan')
            <div class="text-danger mt-2">{{ $message }}</div>
        @enderror
    </div>
</div>
@include('components.formbutton')
