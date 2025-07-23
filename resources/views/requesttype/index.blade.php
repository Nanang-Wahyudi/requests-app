@extends('layouts.app')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $title ?? '' }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="/">Dashboard</a></div>
                    <div class="breadcrumb-item">Data Request Type</div>
                </div>
            </div>

            <div id="session" data-session="{{ session('success') }}"></div>

            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <!-- <div class="mb-3 d-flex justify-content-end gap-3">
                            <a href="{{ route('requesttypes.create') }}" class="btn btn-primary btn-sm ml-2">Tambah data</a>
                        </div> -->
                        <table id="reqtypeTable" class="display">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Request Type</th>
                                    <th>Role</th>
                                    <!-- <th>Aksi</th> -->
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="card-footer bg-whitesmoke">
                        This is card footer
                    </div>
                </div>
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
            $('#reqtypeTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('requesttypes.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'request_type_name',
                        name: 'request_type_name'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    // {
                    //     data: 'action',
                    //     name: 'action',
                    //     orderable: false,
                    //     searchable: false
                    // }
                ]
            });


            // Event listener untuk tombol hapus
            $('#reqtypeTable').on('click', '.delete-btn', function () {
                var reqtypeId = $(this).data('id');

                Swal.fire({
                    title: "Apakah Anda yakin?",
                    text: "Data akan dihapus secara permanen!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Ya, Hapus!",
                    cancelButtonText: "Batal"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/requesttypes/' + reqtypeId,
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response){
                            if(response.success == 1){
                                alert("Record deleted.");
                                var oTable = $('#reqtypeTable').dataTable();
                                oTable.fnDraw(false);
                            }else{
                                    alert("Invalid ID.");
                                }
                            },

                        });
                    }
                });
            });


        });
    </script>
@endpush
