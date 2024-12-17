<div class="row mb-4">
    <div class="col-md-12">
        <label for="id_bahan" class="form-label">Nama Bahan</label>
        <select id="id_bahan" name="id_bahan" class="form-control">
            <option value="" disabled selected>Pilih Bahan</option>
            @foreach ($bahans as $bahan)
                <option value="{{ $bahan->id }}" {{ old('id_bahan', optional($bahanmasuk ?? null)->id_bahan) == $bahan->id ? 'selected' : '' }}>
                    {{ $bahan->nama_bahan }}
                </option>
            @endforeach
        </select>
        @error('id_bahan')
            <div class="text-danger mt-2">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="row mb-4">
    <div class="col-md-12">
        <label for="tanggal" class="form-label">Tanggal</label>
        <input id="tanggal" name="tanggal" value="{{ old('tanggal', optional($bahanmasuk ?? null)->tanggal) }}" type="date" class="form-control">
        @error('tanggal')
            <div class="text-danger mt-2">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="row mb-4">
    <div class="col-md-12">
        <label for="jumlah" class="form-label">Jumlah</label>
        <input id="jumlah" name="jumlah" value="{{ old('jumlah', optional($bahanmasuk ?? null)->jumlah) }}" type="number" class="form-control">
        @error('jumlah')
            <div class="text-danger mt-2">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="row mb-4">
    <div class="col-md-12">
        <label for="catatan" class="form-label">Catatan</label>
        <textarea id="catatan" name="catatan" class="form-control">{{ old('catatan', optional($bahanmasuk ?? null)->catatan) }}</textarea>
        @error('catatan')
            <div class="text-danger mt-2">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="row mb-4">
    <div class="col-md-12">
        <label for="id_supplier" class="form-label">Nama Supplier</label>
        <select id="id_supplier" name="id_supplier" class="form-control">
            <option value="" disabled selected>Pilih Supplier</option>
            @foreach ($suppliers as $supplier)
                <option value="{{ $supplier->id }}" {{ old('id_supplier', optional($bahanmasuk ?? null)->id_supplier) == $supplier->id ? 'selected' : '' }}>
                    {{ $supplier->nama_supplier }}
                </option>
            @endforeach
        </select>
        @error('id_supplier')
            <div class="text-danger mt-2">{{ $message }}</div>
        @enderror
    </div>
</div>
@include('components.button')
