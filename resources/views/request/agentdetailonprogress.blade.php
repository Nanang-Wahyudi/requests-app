@extends('layouts.app')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $title ?? '' }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="/">Dashboard</a></div>
                    <div class="breadcrumb-item">Request Detail</div>
                </div>
            </div>

            <div id="session" data-session="{{ session('success') }}"></div>

            <div class="container mt-4">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Detail Permintaan</h5>
                    </div>
                    <div class="card-body">
                        <h6 class="mb-3">Data Pemohon</h6>
                        <table class="table table-bordered">
                            <tr>
                                <th width="30%">Name</th>
                                <td>{{$data->name}}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{$data->email}}</td>
                            </tr>
                        </table>

                         <h6 class="mb-3">Data Penanggung Jawab</h6>
                        <table class="table table-bordered">
                            <tr>
                                <th width="30%">Name</th>
                                <td>{{$data->pic_name}}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{$data->pic_email}}</td>
                            </tr>
                        </table>

                        <h6 class="mb-3">Status Permintaan</h6>
                        <table class="table table-bordered">
                            <tr>
                                <th width="30%">Status</th>
                                <td>
                                    @php
                                        $status = strtolower($data->status);
                                        $badgeClass = match($status) {
                                            'waiting' => 'bg-info',
                                            'on progress' => 'bg-primary',
                                            'completed' => 'bg-success',
                                            'rejected' => 'bg-danger',
                                        };
                                    @endphp

                                    <span class="badge {{ $badgeClass }} text-white text-capitalize px-3 py-2">
                                        {{ $data->status }}
                                    </span>
                                </td>
                            </tr>

                            <tr>
                                <th>Tanggal Request</th>
                                <td>{{ $data->request_date }}</td>
                            </tr>

                            <tr>
                                <th>Tanggal Ambil Request</th>
                                <td>{{ $data->collect_date }}</td>
                            </tr>
                        </table>

                        <h6 class="mt-4 mb-3">Data Permintaan</h6>
                        <table class="table table-bordered">
                            <tr>
                                <th width="30%">Request Type</th>
                                <td>{{$data->request_type_name}}</td>
                            </tr>

                            @if($data->ticket_url)
                            <tr>
                                <th>Request ID</th>
                                <td>{{ $data->request_id }}</td>
                            </tr>
                            @endif

                            @if($data->ticket_url)
                            <tr>
                                <th>Ticket URL</th>
                                <td>{{ $data->ticket_url }}</td>
                            </tr>
                            @endif

                            @if($data->server_name)
                            <tr>
                                <th>Server Name</th>
                                <td>{{ $data->server_name }}</td>
                            </tr>
                            @endif

                            @if($data->current_spec)
                            <tr>
                                <th>Current Spec</th>
                                <td>{{ $data->current_spec }}</td>
                            </tr>
                            @endif

                            @if($data->requested_spec)
                            <tr>
                                <th>Requested Spec</th>
                                <td>{{ $data->requested_spec }}</td>
                            </tr>
                            @endif

                            @if($data->software_version)
                            <tr>
                                <th>Software Version</th>
                                <td>{{ $data->software_version }}</td>
                            </tr>
                            @endif

                            @if($data->software_name)
                            <tr>
                                <th>Software Name</th>
                                <td>{{ $data->software_name }}</td>
                            </tr>
                            @endif

                            @if($data->file)
                            <tr>
                                <th>File</th>
                                <td>
                                    <a href="{{ Storage::url($data->file) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-download"></i> Download File
                                    </a>
                                </td>
                            </tr>
                            @endif

                            @if($data->service_name)
                            <tr>
                                <th>Service Name</th>
                                <td>{{ $data->service_name }}</td>
                            </tr>
                            @endif

                            @if($data->feature)
                            <tr>
                                <th>Feature</th>
                                <td>{{ $data->feature }}</td>
                            </tr>
                            @endif

                            @if($data->source_ip)
                            <tr>
                                <th>Source IP</th>
                                <td>{{ $data->source_ip }}</td>
                            </tr>
                            @endif

                            @if($data->destination_ip)
                            <tr>
                                <th>Destination IP</th>
                                <td>{{ $data->destination_ip }}</td>
                            </tr>
                            @endif

                            @if($data->port)
                            <tr>
                                <th>Port</th>
                                <td>{{ $data->port }}</td>
                            </tr>
                            @endif

                            @if($data->database_name)
                            <tr>
                                <th>Database Name</th>
                                <td>{{ $data->database_name }}</td>
                            </tr>
                            @endif

                            @if($data->query)
                            <tr>
                                <th>Query</th>
                                <td>{{ $data->query }}</td>
                            </tr>
                            @endif

                            @if($data->description)
                            <tr>
                                <th>Description</th>
                                <td>{{ $data->description }}</td>
                            </tr>
                            @endif

                            @if($data->scan_type)
                            <tr>
                                <th>Scan Type</th>
                                <td>{{ $data->scan_type }}</td>
                            </tr>
                            @endif

                            @if($data->repository_url)
                            <tr>
                                <th>Repository URL</th>
                                <td>{{ $data->repository_url }}</td>
                            </tr>
                            @endif

                            @if($data->branch_name)
                            <tr>
                                <th>Branch Name</th>
                                <td>{{ $data->branch_name }}</td>
                            </tr>
                            @endif

                            @if($data->pr_url)
                            <tr>
                                <th>PR URL</th>
                                <td>{{ $data->pr_url }}</td>
                            </tr>
                            @endif

                            @if($data->purpose)
                            <tr>
                                <th>Purpose</th>
                                <td>{{ $data->purpose }}</td>
                            </tr>
                            @endif
                        </table>

                        <div class="mt-4 d-flex justify-content-end">
                            <a href="{{ url('agent-request-onprogress') }}" class="btn btn-secondary">
                                Back
                            </a>

                            <button type="button" class="btn btn-primary mx-1" data-toggle="modal" data-target="#completeModal">
                                Completed Request
                            </button>

                            <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#rejectModal">
                                Reject Request
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

<!-- Modal Complete Request -->
<div class="modal fade" id="completeModal" tabindex="-1" role="dialog" aria-labelledby="completeModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form id="completeRequestForm" action="{{url('request-complete-submit')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $data->id }}">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="completeModalLabel">Complete Request</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <label for="result">Result</label>
                    <textarea name="result" id="result" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="result_file">Result File</label>
                    <input type="file" name="file" id="file" class="form-control-file">
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="button" id="skipComplete" class="btn btn-warning">Skip</button>
            </div>
        </div>
    </form>
  </div>
</div>

<!-- Modal Reject Request -->
<div class="modal fade" id="rejectModal" tabindex="-1" role="dialog" aria-labelledby="rejectModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form id="rejectRequestForm" action="{{url('request-reject')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $data->id }}">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rejectModalLabel">Reject Request</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <label for="note">Note</label>
                    <textarea name="note" id="note" class="form-control"></textarea>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
  </div>
</div>


@push('script')
<script>
    $(document).ready(function() {
        $('#skipComplete').on('click', function () {
            const id = $('input[name="id"]').val(); 
            const token = $('meta[name="csrf-token"]').attr('content');

            Swal.fire({
                title: 'Are you sure?',
                text: 'You are about to mark this request as COMPLETED without adding any result. This action cannot be undone.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, skip it!',
                cancelButtonText: 'Cancel',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ url('request-complete-skip') }}",
                        type: 'POST',
                        data: {
                            _token: token,
                            id: id,    
                            skip: 'true'
                        },
                        beforeSend: function () {
                            Swal.fire({
                                title: 'Processing...',
                                allowOutsideClick: false,
                                didOpen: () => {
                                    Swal.showLoading();
                                }
                            });
                        },
                        success: function (response) {
                            $('#completeModal').modal('hide'); 
                            Swal.fire({
                                icon: 'success',
                                title: 'Completed!',
                                text: response.message || 'The request was marked as completed without a result.',
                                timer: 2000,
                                showConfirmButton: false
                            }).then(() => {
                                window.location.href = "{{ url('agent-request-onprogress') }}";
                            });
                        },
                        error: function (xhr, status, error) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Failed',
                                text: xhr.responseJSON.message || 'Something went wrong while skipping the result.',
                            });
                        }
                    });
                }
            });
        });
    });
</script>
@endpush
