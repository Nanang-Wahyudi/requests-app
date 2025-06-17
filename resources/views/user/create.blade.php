@extends('layouts.app')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $title ?? '' }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="/">Dashboard</a></div>
                    <div class="breadcrumb-item">Data Master</div>
                    <div class="breadcrumb-item active">Add User</div>
                </div>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('users.store') }}" method="POST">
                            @csrf
                            <div class="row">


                                <div class="col-md-6 mb-3">
                                    <label for="kendaraan" class="form-label">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                 <div class="col-md-6 mb-3">
                                    <label for="kendaraan" class="form-label">Email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email" value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="password" name="password" value="{{ old('password') }}" required>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                 <div class="col-md-6 mb-3">
                                    <label for="password" class="form-label">Konfirmasi Password</label>
                                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                                        id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}" required>
                                    @error('password_confirmation')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="role" class="form-label">Role</label>
                                     <select name="role" class="form-control">
                                        <option value="">- Pilih Role -</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->name }}">{{ ucfirst($role->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>


                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>

                    </div>
                    <div class="card-footer bg-whitesmoke">
                        This is card footer
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
