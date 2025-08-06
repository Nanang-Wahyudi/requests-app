@extends('layouts.app')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $title ?? '' }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="/">Dashboard</a></div>
                    <div class="breadcrumb-item active">Add Spec Upgrade</div>
                </div>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ url('proses-formspec') }}" method="POST">
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
                                    <label for="kendaraan" class="form-label">Server Name</label>
                                    <input type="text" class="form-control @error('server_name') is-invalid @enderror"
                                        id="server_name" name="server_name" value="{{ old('server_name') }}" required>
                                    @error('server_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                 </div>

                                   <div class="col-md-12 mb-3">
                                    <label for="kendaraan" class="form-label">Current Spec</label>
                                    <input type="text" class="form-control @error('current_spec') is-invalid @enderror"
                                        id="current_spec" name="current_spec" value="{{ old('current_spec') }}" required>
                                    @error('current_spec')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                 </div>

                                  <div class="col-md-12 mb-3">
                                    <label for="kendaraan" class="form-label">Requested Spec</label>
                                    <input type="text" class="form-control @error('requested_spec') is-invalid @enderror"
                                        id="requested_spec" name="requested_spec" value="{{ old('requested_spec') }}" required>
                                    @error('requested_spec')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
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
