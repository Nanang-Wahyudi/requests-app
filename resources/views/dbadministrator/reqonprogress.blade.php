@extends('layouts.app')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $title ?? '' }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="/">Dashboard</a></div>
                    <div class="breadcrumb-item">Database Administrator On Progress</div>
                </div>
            </div>

            <div id="session" data-session="{{ session('success') }}"></div>

            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <!-- <div class="mb-3 d-flex justify-content-end gap-3">
                            <a href="{{ route('infrastructure-complated.create') }}" class="btn btn-primary btn-sm ml-2">Tambah data</a>
                        </div> -->
                        <table id="dbaOnProgressTable" class="display">
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
            $('#dbaOnProgressTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('dbadministrator-onprogress') }}",
                dom: '<"top"lBf>rt<"bottom"ip><"clear">',
                buttons: [
                    {
                        extend: 'excelHtml5',
                        title: 'Database Administrator On Progress',
                        text: 'Export XLS',
                        className: 'btn btn-success btn-sm ml-5',
                        exportOptions: {
                            columns: ':visible:not(:last-child)'
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        title: 'Database Administrator On Progress',
                        text: 'Export PDF',
                        className: 'btn btn-danger btn-sm',
                        orientation: 'landscape',
                        pageSize: 'A4',
                        exportOptions: {
                            columns: ':visible:not(:last-child)'
                        },
                        customize: function (doc) {
                            doc.styles.tableHeader = {
                                fillColor: '#2d4154',
                                color: 'white',
                                alignment: 'center',
                                bold: true,
                                fontSize: 12
                            };
                            doc.styles.tableBodyEven = { alignment: 'center', fontSize: 10 };
                            doc.styles.tableBodyOdd = { alignment: 'center', fontSize: 10 };

                            // Atur lebar kolom manual
                            doc.content[1].table.widths = [
                                '5%',   // No
                                '10%',  // Id Request
                                '15%',  // Nama Pemohon
                                '20%',  // Type Request
                                '10%',  // Request Date
                                '15%',  // PIC
                                '10%',  // Collect Date
                                '7%',   // Priority
                                '8%'    // Status
                            ];

                            // Tambah margin
                            doc.pageMargins = [20, 20, 20, 20];

                            // Tambahkan border untuk tabel
                            var objLayout = {};
                            objLayout['hLineWidth'] = function(i) { return 0.5; }; // garis horizontal
                            objLayout['vLineWidth'] = function(i) { return 0.5; }; // garis vertikal
                            objLayout['hLineColor'] = function(i) { return '#000000'; }; // warna garis horizontal
                            objLayout['vLineColor'] = function(i) { return '#000000'; }; // warna garis vertikal
                            objLayout['paddingLeft'] = function(i) { return 4; };
                            objLayout['paddingRight'] = function(i) { return 4; };
                            objLayout['paddingTop'] = function(i) { return 2; };
                            objLayout['paddingBottom'] = function(i) { return 2; };

                            doc.content[1].layout = objLayout;
                        }
                    }
                ],
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


            // Event listener untuk tombol hapus
            // $('#reqtypeTable').on('click', '.delete-btn', function () {
            //     var reqtypeId = $(this).data('id');

            //     Swal.fire({
            //         title: "Apakah Anda yakin?",
            //         text: "Data akan dihapus secara permanen!",
            //         icon: "warning",
            //         showCancelButton: true,
            //         confirmButtonColor: "#d33",
            //         cancelButtonColor: "#3085d6",
            //         confirmButtonText: "Ya, Hapus!",
            //         cancelButtonText: "Batal"
            //     }).then((result) => {
            //         if (result.isConfirmed) {
            //             $.ajax({
            //                 url: '/requesttypes/' + reqtypeId,
            //                 type: 'DELETE',
            //                 data: {
            //                     _token: '{{ csrf_token() }}'
            //                 },
            //                 success: function(response){
            //                 if(response.success == 1){
            //                     alert("Record deleted.");
            //                     var oTable = $('#reqtypeTable').dataTable();
            //                     oTable.fnDraw(false);
            //                 }else{
            //                         alert("Invalid ID.");
            //                     }
            //                 },

            //             });
            //         }
            //     });
            // });


        });
    </script>
@endpush
