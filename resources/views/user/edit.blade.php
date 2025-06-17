@extends('layouts.app')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit User</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Role</label>
                            <select name="role" class="form-control" required>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}" {{ $role->name == $userRole ? 'selected' : '' }}>
                                        {{ ucfirst($role->name) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                    <div class="form-group">
                        <label>Password Baru</label>
                        <input type="password" name="password" class="form-control" placeholder="Biarkan kosong jika tidak diubah">
                    </div>

                    <div class="form-group">
                        <label>Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Ulangi password">
                    </div>


                        <button class="btn btn-primary">Simpan</button>
                        <a href="{{ route('users.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
