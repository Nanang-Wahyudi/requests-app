@extends('layouts.app')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $title ?? '' }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="/">Dashboard</a></div>
                    <div class="breadcrumb-item">Request Onprogress</div>
                </div>
            </div>

            <div id="session" data-session="{{ session('success') }}"></div>

            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <table id="onprogressTable" class="display">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Id Request</th>
                                    <th>Nama Pemohon</th>
                                    <th>Type Request</th>
                                    <th>Request Date</th>
                                    <th>PIC</th>
                                    <th>Collect Date</th>
                                    <th>Priority</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="card-footer bg-whitesmoke">
                        This is card footer
                    </div>
                </div>

                <form id="delete-form" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>


        </section>


    </div>
@endsection



@push('script')
    <script>
        $(document).ready(function() {

            let session = $('#session').data('session');

            if (session) {
                Swal.fire({
                    title: "Sukses!",
                    text: session,
                    icon: "success",
                    timer: 3000,
                    showConfirmButton: true
                });
            }

            // table data
            $('#onprogressTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "/developer-request-onprogress",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                     {
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'request_type_name',
                        name: 'request_type_name'
                    },
                    {
                        data: 'request_date',
                        name: 'request_date'
                    },
                    {
                        data: 'pic',
                        name: 'pic'
                    },
                    {
                        data: 'collect_date',
                        name: 'collect_date'
                    },
                    {
                        data: 'priority',
                        name: 'priority',
                        render: function(data, type, row) {
                            if (data == 1) return 'Tinggi';
                            if (data == 2) return 'Sedang';
                            if (data == 3) return 'Rendah';
                            return data;
                        }
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });

            $(document).on('click', '.btn-delete-request', function () {
                const requestId = $(this).data('id');
                const token = $('meta[name="csrf-token"]').attr('content');

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Data request akan dihapus!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: `/developer-request-onprogress/${requestId}/delete`,
                            type: 'POST',
                            data: {
                                _token: token
                            },
                            beforeSend: function () {
                                Swal.fire({
                                    title: 'Menghapus...',
                                    text: 'Silakan tunggu.',
                                    allowOutsideClick: false,
                                    didOpen: () => {
                                        Swal.showLoading();
                                    }
                                });
                            },
                            success: function (response) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil!',
                                    text: 'Request berhasil dihapus.',
                                    timer: 1000,
                                    showConfirmButton: false
                                }).then(() => {
                                    location.reload(); 
                                });
                            },
                            error: function () {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal!',
                                    text: 'Terjadi kesalahan saat menghapus data.'
                                });
                            }
                        });
                    }
                });
            });

        });
    </script>
@endpush
