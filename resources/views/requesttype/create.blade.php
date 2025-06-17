@extends('layouts.app')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $title ?? '' }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="/">Dashboard</a></div>
                    <div class="breadcrumb-item">Data Master</div>
                    <div class="breadcrumb-item active">Add Request Type</div>
                </div>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('requesttypes.store') }}" method="POST">
                            @csrf
                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <label for="kendaraan" class="form-label">Request Type</label>
                                    <input type="text" class="form-control @error('request_type_name') is-invalid @enderror"
                                        id="request_type_name" name="request_type_name" value="{{ old('request_type_name') }}" required>
                                    @error('request_type_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                 <div class="col-md-6 mb-3">
                                    <label for="kendaraan" class="form-label">Role</label>
                                    <select class="form-control" name="role_id">
                                        <option value="0">-Pilih Role-</option>
                                        @foreach ($roles as $role)
                                            <option value="{{$role->id}}">{{$role->name}}</option>
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
