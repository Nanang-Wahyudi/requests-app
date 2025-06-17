@extends('layouts.app')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $title ?? '' }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="/">Dashboard</a></div>
                    <div class="breadcrumb-item">Edit Request Type</div>
                </div>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('requesttypes.update', $reqtype->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <label for="role" class="form-label">Request Type</label>
                                    <input type="text" class="form-control @error('request_type_name') is-invalid @enderror"
                                        id="request_type_name" name="request_type_name"
                                        value="{{ old('request_type_name', $reqtype->request_type_name) }}" required>
                                    @error('request_type_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="role" class="form-label">Role</label>
                                    <select class="form-control" name="role_id">
                                        <?php
                                            foreach ($roles as $role) {

                                            if ($role->id==$reqtype->role_id) {
                                                $select="selected";
                                            }else{
                                                $select="";
                                            }

                                        ?>
                                        <option <?php echo $select; ?> value="<?php echo $role->id;?>"><?php echo $role->name; ?></option>

                                     <?php } ?>
                                    </select>
                                </div>

                            </div>

                            <button type="submit" class="btn btn-primary">Update Data</button>
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
