@extends('layouts.app')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $title ?? '' }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="/">Dashboard</a></div>
                    <div class="breadcrumb-item">Agent Request Detail</div>
                </div>
            </div>

            <div id="session" data-session="{{ session('success') }}"></div>

            <div class="section-body">
                <div class="card">
                <div class="card-body">
                        <h5>Data Pemohon</h5>
                        <table>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td>{{$data->name}}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td>{{$data->email}}</td>
                            </tr>
                        </table>
                </div>

                <div class="card-body">
                        <table>
                            <tr>
                                <td>Status</td>
                                <td>:</td>
                                <td>{{$data->status}}</td>
                            </tr>

                             <tr>
                                <td>Request Type</td>
                                <td>:</td>
                                <td>{{$data->request_type_name}}</td>
                            </tr>
                        </table>
                </div>

                <div class="card-body">
                        <h5>Data Request</h5>
                        <table>
                            <tr>
                                <td>Ticket URL</td>
                                <td>:</td>
                                <td>{{$data->ticket_url}}</td>
                            </tr>
                            <tr>
                                <td>Server Name</td>
                                <td>:</td>
                                <td>{{$data->server_name}}</td>
                            </tr>
                            <tr>
                                <td>Current Spec</td>
                                <td>:</td>
                                <td>{{$data->current_spec}}</td>
                            </tr>
                            <tr>
                                <td>Requested Spec</td>
                                <td>:</td>
                                <td>{{$data->requested_spec}}</td>
                            </tr>
                             <tr>
                                <td>Software Version</td>
                                <td>:</td>
                                <td>{{$data->software_version}}</td>
                            </tr>
                            <tr>
                                <td>Software Name</td>
                                <td>:</td>
                                <td>{{$data->software_name}}</td>
                            </tr>
                             <tr>
                                <td>File</td>
                                <td>:</td>
                                <td><a href="{{  Storage::url($data->file) }}">{{$data->file}}</a></td>
                            </tr>
                             <tr>
                                <td>Service Name</td>
                                <td>:</td>
                                <td>{{$data->service_name}}</td>
                            </tr>
                             <tr>
                                <td>Feature</td>
                                <td>:</td>
                                <td>{{$data->feature}}</td>
                            </tr>
                            <tr>
                                <td>Source IP</td>
                                <td>:</td>
                                <td>{{$data->source_ip}}</td>
                            </tr>
                        </table>
                </div>

                </div>
            </div>


        </section>


    </div>
@endsection



@push('script')

@endpush
