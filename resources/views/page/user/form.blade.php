<div class="mt-4">
    <div class="row mb-4">
        <div class="col-md-12">
            <label for="nama_user" class="form-label">Nama User</label>
            <input id="nama_user" name="nama_user" value="{{ old('nama_user', optional($user ?? null)->nama_user) }}" type="text" class="form-control">
            @error('nama_user')
                <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-12">
            <label for="name" class="form-label">Username</label>
            <input id="name" name="name" value="{{ old('name', optional($user ?? null)->name) }}" type="text" class="form-control">
            @error('name')
                <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-12">
            <label for="role" class="form-label">Role</label>
            <select id="role" name="role" class="form-control">
                <option value="" disabled selected>Pilih</option>
                <option value="1" {{ old('role', optional($user ?? null)->role) == '1' ? 'selected' : '' }}>Admin</option>
                <option value="2" {{ old('role', optional($user ?? null)->role) == '2' ? 'selected' : '' }}>Owner</option>
                <option value="3" {{ old('role', optional($user ?? null)->role) == '3' ? 'selected' : '' }}>Petugas</option>
            </select>
            @error('role')
                <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-12">
            <label for="email" class="form-label">Email</label>
            <input id="email" name="email" value="{{ old('email', optional($user ?? null)->email) }}" type="text" class="form-control">
            @error('email')
                <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-12">
            <label for="password" class="form-label">Password</label>
            <div class="input-group">
                <input id="password" name="password" value="{{ old('password', optional($user ?? null)->password) }}" type="password" class="form-control" minlength="8" placeholder="Enter your password" required>
                <button class="btn btn-outline-secondary" type="button" id="togglePassword" aria-label="Show/Hide Password">
                    <i class="bi bi-eye"></i> <!-- Bootstrap icon -->
                </button>
            </div>
            @error('password')
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
@section('script')
    <script>
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const toggleButton = document.getElementById('togglePassword');
            const icon = toggleButton.querySelector('i');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('bi-eye');
                icon.classList.add('bi-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('bi-eye-slash');
                icon.classList.add('bi-eye');
            }
        });
    </script>
@endsection
