@extends('layouts.app')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $title ?? '' }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="/">Dashboard</a></div>
                    <div class="breadcrumb-item">Request OnProgress</div>
                </div>
            </div>

            <div id="session" data-session="{{ session('success') }}"></div>

            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <table id="complateTable" class="display">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Id Request</th>
                                    <th>Nama Pemohon</th>
                                    <th>Type Request</th>
                                    <th>Request Date</th>
                                    <th>PIC</th>
                                    <th>Collect Date</th>
                                    <th>Deadline</th>
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

    // Durasi (hari) berdasarkan priority
    function daysFromPriority(priority) {
        if (priority == 1) return 1;
        if (priority == 2) return 2;
        if (priority == 3) return 3;
        return 0;
    }

    // Format countdown (tanpa detik)
    function formatCountdown(deadlineTime) {
        let now = Date.now();
        let diff = deadlineTime - now;

        if (diff <= 0) {
            return `<span class="text-danger">Lewat Deadline</span>`;
        }

        let days = Math.floor(diff / (1000 * 60 * 60 * 24));
        let hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        let minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));

        return `${days}h ${hours}j ${minutes}m`;
    }

    // Helper untuk key localStorage per request
    function getStorageKey(id) {
        return 'deadlineStart_' + id;
    }

    // Inisialisasi DataTable
    let table = $('#complateTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "/agent-request-onprogress",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'request_type_name', name: 'request_type_name' },
            { data: 'request_date', name: 'request_date' },
            { data: 'pic', name: 'pic' },
            { data: 'collect_date', name: 'collect_date' },
            {
                // kita butuh akses ke row.id dan row.priority -> gunakan data: null
                data: null,
                name: 'deadline',
                orderable: false,
                searchable: false,
                render: function(data, type, row) {
                    // pastikan ada id dan priority
                    let id = row.id || row.request_id || row.ID; // fallback jika nama field beda
                    let priority = row.priority;

                    if (!id || !priority) return '-';

                    // per-request storage key
                    const key = getStorageKey(id);

                    // ambil startTime dari localStorage; jika belum ada, set sekarang
                    let startTime = localStorage.getItem(key);
                    if (!startTime) {
                        startTime = Date.now();
                        try {
                            localStorage.setItem(key, startTime);
                        } catch (e) {
                            // jika private mode atau storage penuh, tetap gunakan startTime di memori
                            console.warn('localStorage unavailable:', e);
                        }
                    } else {
                        startTime = Number(startTime);
                    }

                    // hitung deadline berdasarkan startTime + daysFromPriority
                    let daysToAdd = daysFromPriority(priority);
                    let deadlineTime = startTime + (daysToAdd * 24 * 60 * 60 * 1000);

                    // simpan deadlineTime di row supaya interval bisa pakai tanpa hitung ulang storage key
                    row._deadlineTime = deadlineTime;
                    row._startTime = startTime;

                    return formatCountdown(deadlineTime);
                }
            },
            {
                data: 'priority',
                name: 'priority',
                render: function(data) {
                    if (data == 1) return 'Tinggi';
                    if (data == 2) return 'Sedang';
                    if (data == 3) return 'Rendah';
                    return data;
                }
            },
            { data: 'status', name: 'status' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ],
        drawCallback: function(settings) {
            // Optional: setelah redraw, kita bisa melakukan sesuatu (mis: cleanup)
        }
    });

    // Update countdown realtime (setiap 1 detik agar segera berubah di batas menit)
    let intervalId = setInterval(function() {
        table.rows().every(function() {
            let rowData = this.data();
            if (!rowData) return;

            // Prioritaskan _deadlineTime yang sudah diset pada render. Jika tidak ada (row belum dirender),
            // hitung dari storage agar aman.
            let deadlineTime = rowData._deadlineTime;
            if (!deadlineTime) {
                let id = rowData.id || rowData.request_id || rowData.ID;
                let priority = rowData.priority;
                if (!id || !priority) return;
                let key = getStorageKey(id);
                let startTime = localStorage.getItem(key);
                if (!startTime) {
                    startTime = Date.now();
                    try { localStorage.setItem(key, startTime); } catch(e){ }
                } else startTime = Number(startTime);
                deadlineTime = startTime + (daysFromPriority(priority) * 24 * 60 * 60 * 1000);
                rowData._deadlineTime = deadlineTime;
                rowData._startTime = startTime;
            }

            // update cell (kolom index 7 sesuai struktur tabelmu)
            let countdownHtml = formatCountdown(deadlineTime);
            $(this.node()).find('td').eq(7).html(countdownHtml);
        });
    }, 1000);

});
</script>
@endpush
