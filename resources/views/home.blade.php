@extends('layouts.app')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Dashboard</h1>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12">
                        <h5 style="text-align: center;">Welcome, To Request App</h5>
                    </div>
                    <div class="col-12 col-md-12">
                        <div class="card card-primary">

                             <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-primary">
                                <i class="far fa-user"></i>
                                </div>
                                <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Request Waiting</h4>
                                </div>
                                <div class="card-body">
                                    {{ $waiting }}
                                </div>
                                </div>
                            </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-info">
                                <i class="far fa-user"></i>
                                </div>
                                <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Request On Progress</h4>
                                </div>
                                <div class="card-body">
                                    {{ $onprogress }}
                                </div>
                                </div>
                            </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-success">
                                <i class="far fa-newspaper"></i>
                                </div>
                                <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Request Completed</h4>
                                </div>
                                <div class="card-body">
                                    {{ $complated }}
                                </div>
                                </div>
                            </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-danger">
                                <i class="far fa-file"></i>
                                </div>
                                <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Request Rejected</h4>
                                </div>
                                <div class="card-body">
                                    {{ $rejected }}
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>

                        </div>
                    </div>

                     <div class="col-12 col-md-12">
                          <h4 style="text-align: center;">Status Permintaan</h4>
                          <canvas id="statusChart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('script')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('statusChart').getContext('2d');

    const chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($bulanList) !!},
            datasets: [
                {
                    label: 'Complated',
                    data: {!! json_encode(array_values($statusData['complated'])) !!},
                    backgroundColor: 'rgba(75, 192, 192, 0.7)'
                },
                {
                    label: 'Rejected',
                    data: {!! json_encode(array_values($statusData['rejected'])) !!},
                    backgroundColor: 'rgba(255, 99, 132, 0.7)'
                },
                {
                    label: 'On Progress',
                    data: {!! json_encode(array_values($statusData['onprogress'])) !!},
                    backgroundColor: 'rgba(255, 206, 86, 0.7)'
                },
                {
                    label: 'Waiting',
                    data: {!! json_encode(array_values($statusData['waiting'])) !!},
                    backgroundColor: 'rgba(65, 106, 240, 0.7)'
                }
            ]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    precision: 0
                }
            }
        }
    });
</script>

@endpush
