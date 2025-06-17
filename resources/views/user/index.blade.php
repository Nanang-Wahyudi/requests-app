@extends('layouts.app')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $title ?? '' }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="/">Dashboard</a></div>
                    <div class="breadcrumb-item">Data User</div>
                </div>
            </div>

            <div id="session" data-session="{{ session('success') }}"></div>

            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3 d-flex justify-content-end gap-3">
                            <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm ml-2">Tambah data</a>
                        </div>
                        <table id="userTable" class="display">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>
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

        <!-- Modal Ubah Role -->
<div class="modal fade" id="modalUbahRole" tabindex="-1" role="dialog" aria-labelledby="ubahRoleLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form id="formUbahRole">
        @csrf
        <input type="hidden" id="edit_user_id" name="user_id">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Ubah Role Pengguna</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <div class="form-group">
                  <label for="edit_role">Role</label>
                  <select class="form-control" id="edit_role" name="role">
                      @foreach ($roles as $role)
                          <option value="{{ $role->name }}">{{ ucfirst($role->name) }}</option>
                      @endforeach
                  </select>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
    </form>
  </div>
</div>



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
            $('#userTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('users.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'roles',
                        name: 'roles'
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
            $('#userTable').on('click', '.delete-btn', function () {
                var userId = $(this).data('id');

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
                            url: '/users/' + userId,
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response){
                            if(response.success == 1){
                                alert("Record deleted.");
                                var oTable = $('#userTable').dataTable();
                                oTable.fnDraw(false);
                            }else{
                                    alert("Invalid ID.");
                                }
                            },

                        });
                    }
                });
            });

            // Buka modal & set data
$('#userTable').on('click', '.edit-role-btn', function () {
    var userId = $(this).data('id');
    var currentRole = $(this).data('role');

    $('#edit_user_id').val(userId);
    $('#edit_role').val(currentRole);
    $('#modalUbahRole').modal('show');
});

// Submit update role
$('#formUbahRole').on('submit', function (e) {
    e.preventDefault();
    var userId = $('#edit_user_id').val();
    var role = $('#edit_role').val();

    $.ajax({
        url: '/users/' + userId + '/update-role',
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            role: role
        },
        success: function (response) {
            $('#modalUbahRole').modal('hide');
            $('#userTable').DataTable().ajax.reload(null, false);

            Swal.fire({
                title: 'Sukses!',
                text: response.message,
                icon: 'success',
                timer: 2000,
                showConfirmButton: false
            });
        },
        error: function () {
            alert('Gagal mengubah role.');
        }
    });
});



        });
    </script>


@endpush
