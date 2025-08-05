@extends('layouts.app')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $title ?? '' }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="/">Dashboard</a></div>
                    <div class="breadcrumb-item active">Update Request</div>
                </div>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ url('developer-request-onprogress/' . $requestId . '/proses') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                @php
                                    $data = (object) $data;
                                @endphp

                                @if($data->ticket_url)
                                <div class="col-md-12 mb-3">
                                    <label for="ticket_url" class="form-label">Ticket URL</label>
                                    <input type="text" class="form-control @error('ticket_url') is-invalid @enderror"
                                           id="ticket_url" name="ticket_url" value="{{ old('ticket_url', $data->ticket_url ?? '') }}" required>
                                    @error('ticket_url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                @endif

                                @if($data->service_name)
                                <div class="col-md-12 mb-3">
                                    <label for="service_name" class="form-label">Service Name</label>
                                    <input type="text" class="form-control @error('service_name') is-invalid @enderror"
                                           id="service_name" name="service_name" value="{{ old('service_name', $data->service_name ?? '') }}" required>
                                    @error('service_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                @endif

                                @if($data->feature)
                                <div class="col-md-12 mb-3">
                                    <label for="fitur" class="form-label">Fitur</label>
                                    <input type="text" class="form-control @error('fitur') is-invalid @enderror"
                                           id="fitur" name="fitur" value="{{ old('fitur', $data->feature ?? '') }}" required>
                                    @error('fitur')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                @endif

                                @if($data->file)
                                <div class="col-md-12 mb-3">
                                    <label for="file" class="form-label">File</label>
                                    <input type="file" class="form-control @error('file') is-invalid @enderror"
                                           id="file" name="file">
                                    @if (!empty($data->file))
                                        <small class="text-muted">File lama: <a href="{{ Storage::url($data->file) }}" target="_blank">Lihat File</a></small>
                                    @endif
                                    @error('file')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                @endif

                                @if($data->database_name)
                                <div class="col-md-12 mb-3">
                                    <label for="database_name" class="form-label">Database Name</label>
                                    <input type="text" class="form-control @error('database_name') is-invalid @enderror"
                                           id="database_name" name="database_name" value="{{ old('database_name', $data->database_name ?? '') }}" required>
                                    @error('database_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                @endif

                                @if($data->description)
                                <div class="col-md-12 mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <input type="text" class="form-control @error('description') is-invalid @enderror"
                                           id="description" name="description" value="{{ old('description', $data->description ?? '') }}" required>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                @endif

                                @if($data->query)
                                <div class="col-md-12 mb-3">
                                    <label for="querie" class="form-label">Query</label>
                                    <input type="text" class="form-control @error('querie') is-invalid @enderror"
                                           id="querie" name="querie" value="{{ old('querie', $data->query ?? '') }}" required>
                                    @error('querie')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                @endif

                                @if($data->pr_url)
                                <div class="col-md-12 mb-3">
                                    <label for="pr_url" class="form-label">PR URL</label>
                                    <input type="text" class="form-control @error('pr_url') is-invalid @enderror"
                                           id="pr_url" name="pr_url" value="{{ old('pr_url', $data->pr_url ?? '') }}" required>
                                    @error('pr_url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                @endif

                                @if($data->scan_type)
                                <div class="col-md-12 mb-3">
                                    <label for="scan_type" class="form-label">Type Scan</label>
                                    <select class="form-control" name="scan_type">
                                        <option value="">-Pilih Type Scan-</option>
                                        <option value="SAST" {{ old('scan_type', $data->scan_type ?? '') == 'SAST' ? 'selected' : '' }}>SAST</option>
                                        <option value="DAST" {{ old('scan_type', $data->scan_type ?? '') == 'DAST' ? 'selected' : '' }}>DAST</option>
                                        <option value="Aqua Security" {{ old('scan_type', $data->scan_type ?? '') == 'Aqua Security' ? 'selected' : '' }}>Aqua Security</option>
                                    </select>
                                </div>
                                @endif

                                @if($data->repository_url)
                                <div class="col-md-12 mb-3">
                                    <label for="repository_url" class="form-label">Repository URL</label>
                                    <input type="text" class="form-control @error('repository_url') is-invalid @enderror"
                                           id="repository_url" name="repository_url" value="{{ old('repository_url', $data->repository_url ?? '') }}" required>
                                    @error('repository_url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                @endif

                                @if($data->branch_name)
                                <div class="col-md-12 mb-3">
                                    <label for="branch_name" class="form-label">Branch Name</label>
                                    <input type="text" class="form-control @error('branch_name') is-invalid @enderror"
                                           id="branch_name" name="branch_name" value="{{ old('branch_name', $data->branch_name ?? '') }}" required>
                                    @error('branch_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                @endif

                                @if($data->server_name)
                                <div class="col-md-12 mb-3">
                                    <label for="server_name" class="form-label">Server Name</label>
                                    <input type="text" class="form-control @error('server_name') is-invalid @enderror"
                                           id="server_name" name="server_name" value="{{ old('server_name', $data->server_name ?? '') }}" required>
                                    @error('server_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                @endif

                                @if($data->software_name)
                                <div class="col-md-12 mb-3">
                                    <label for="software_name" class="form-label">Software Name</label>
                                    <input type="text" class="form-control @error('software_name') is-invalid @enderror"
                                           id="software_name" name="software_name" value="{{ old('software_name', $data->software_name ?? '') }}" required>
                                    @error('software_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                @endif

                                @if($data->software_version)
                                <div class="col-md-12 mb-3">
                                    <label for="software_version" class="form-label">Software Version</label>
                                    <input type="text" class="form-control @error('software_version') is-invalid @enderror"
                                           id="software_version" name="software_version" value="{{ old('software_version', $data->software_version ?? '') }}" required>
                                    @error('software_version')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                @endif

                                @if($data->current_spec)
                                <div class="col-md-12 mb-3">
                                    <label for="current_spec" class="form-label">Current Spec</label>
                                    <input type="text" class="form-control @error('current_spec') is-invalid @enderror"
                                           id="current_spec" name="current_spec" value="{{ old('current_spec', $data->current_spec ?? '') }}" required>
                                    @error('current_spec')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                @endif

                                @if($data->requested_spec)
                                <div class="col-md-12 mb-3">
                                    <label for="requested_spec" class="form-label">Requested Spec</label>
                                    <input type="text" class="form-control @error('requested_spec') is-invalid @enderror"
                                           id="requested_spec" name="requested_spec" value="{{ old('requested_spec', $data->requested_spec ?? '') }}" required>
                                    @error('requested_spec')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                @endif

                                @if($data->source_ip)
                                <div class="col-md-12 mb-3">
                                    <label for="source_ip" class="form-label">Source IP</label>
                                    <input type="text" class="form-control @error('source_ip') is-invalid @enderror"
                                           id="source_ip" name="source_ip" value="{{ old('source_ip', $data->source_ip ?? '') }}" required>
                                    @error('source_ip')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                @endif

                                @if($data->destination_ip)
                                <div class="col-md-12 mb-3">
                                    <label for="destination_ip" class="form-label">Destination IP</label>
                                    <input type="text" class="form-control @error('destination_ip') is-invalid @enderror"
                                           id="destination_ip" name="destination_ip" value="{{ old('destination_ip', $data->destination_ip ?? '') }}" required>
                                    @error('destination_ip')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                @endif

                                @if($data->port)
                                <div class="col-md-12 mb-3">
                                    <label for="port" class="form-label">Port</label>
                                    <input type="text" class="form-control @error('port') is-invalid @enderror"
                                           id="port" name="port" value="{{ old('port', $data->port ?? '') }}" required>
                                    @error('port')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                @endif

                                @if($data->purpose)
                                <div class="col-md-12 mb-3">
                                    <label for="purpose" class="form-label">Purpose</label>
                                    <input type="text" class="form-control @error('purpose') is-invalid @enderror"
                                           id="purpose" name="purpose" value="{{ old('purpose', $data->purpose ?? '') }}" required>
                                    @error('purpose')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                @endif

                                <div class="col-md-12 mb-3">
                                    <label for="req_id" class="form-label">Request Type</label>
                                    <select class="form-control" name="req_id">
                                        <option value="">-Pilih Type Request-</option>
                                        @foreach ($reqtypes as $reqtype)
                                            <option value="{{ $reqtype->id }}" {{ old('req_id', $data->request_type_id ?? '') == $reqtype->id ? 'selected' : '' }}>
                                                {{ $reqtype->request_type_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>

                             <a href="{{ url('developer-request-onprogress') }}" class="btn btn-secondary">
                                Back
                            </a>
                        </form>
                    </div>
                    <div class="card-footer bg-whitesmoke">
                        This is card footer
                    </div>
                </div>
            </div>
        </section>
    </div>

    @if (session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                timer: 3000,
                showConfirmButton: false
            });
        });
    </script>
    @endif
@endsection