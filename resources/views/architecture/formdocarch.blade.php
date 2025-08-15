@extends('layouts.app')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $title ?? '' }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="/">Dashboard</a></div>
                    <div class="breadcrumb-item active">Add Document Architecture</div>
                </div>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ url('proses-formdoc') }}" method="POST">
                            @csrf
                            <div class="row">

                                <div class="col-md-12 mb-3">
                                    <label for="kendaraan" class="form-label">Service Name</label>
                                    <input type="text" class="form-control @error('service_name') is-invalid @enderror"
                                        id="service_name" name="service_name" value="{{ old('service_name') }}" required>
                                    @error('service_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                 <div class="col-md-12 mb-3">
                                    <label for="kendaraan" class="form-label">Fitur</label>
                                    <input type="text" class="form-control @error('fitur') is-invalid @enderror"
                                        id="fitur" name="fitur" value="{{ old('fitur') }}" required>
                                    @error('fitur')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                 </div>

                                   <div class="col-md-12 mb-3">
                                    <label for="priority" class="form-label">Request Priority</label>
                                    <select class="form-control" name="priority" required>
                                        <option value="">-Pilih Prioritas Request-</option>
                                        <option value="1">Tinggi</option>
                                        <option value="2">Sedang</option>
                                        <option value="3">Rendah</option>
                                    </select>
                                 </div>

                                  <div class="col-md-12 mb-3">
                                    <label for="kendaraan" class="form-label">Purpose</label>
                                    <input type="text" class="form-control @error('purpose') is-invalid @enderror"
                                        id="purpose" name="purpose" value="{{ old('purpose') }}" required>
                                    @error('purpose')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                 </div>

                                <div class="col-md-12 mb-3">
                                    <label for="kendaraan" class="form-label">Request Type</label>
                                    <select class="form-control" name="req_id">
                                        <option value="">-Pilih Type Request-</option>
                                        @foreach ($reqtypes as $reqtype)
                                            <option value="{{$reqtype->id}}">{{ $reqtype->request_type_name }}</option>
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
