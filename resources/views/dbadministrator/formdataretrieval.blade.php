@extends('layouts.app')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $title ?? '' }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="/">Dashboard</a></div>
                    <div class="breadcrumb-item active">Add Data Retrieval</div>
                </div>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ url('proses-formdataret') }}" method="POST">
                            @csrf
                            <div class="row">

                                <div class="col-md-12 mb-3">
                                    <label for="kendaraan" class="form-label">Ticket URL</label>
                                    <input type="text" class="form-control @error('ticket_url') is-invalid @enderror"
                                        id="ticket_url" name="ticket_url" value="{{ old('ticket_url') }}" required>
                                    @error('ticket_url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                  <div class="col-md-12 mb-3">
                                    <label for="kendaraan" class="form-label">Database Name</label>
                                    <input type="text" class="form-control @error('database_name') is-invalid @enderror"
                                        id="database_name" name="database_name" value="{{ old('database_name') }}" required>
                                    @error('database_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                 </div>

                                  <div class="col-md-12 mb-3">
                                    <label for="kendaraan" class="form-label">Description</label>
                                    <input type="text" class="form-control @error('description') is-invalid @enderror"
                                        id="description" name="description" value="{{ old('description') }}" required>
                                    @error('description')
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
