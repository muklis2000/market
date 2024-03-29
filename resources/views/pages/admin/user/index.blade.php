@extends('layouts.admin')

@section('title')
    Dashboard Admin Users | Tokokoi
@endsection

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">User</h2>
                <p class="dashboard-subtitle">
                  List of User
                </p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-12">

                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        @if(session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session()->get('error') }}
                            </div>
                        @endif
                        
                        <div class="card">
                            <div class="card-body">
                                <a href="{{  route('user.create') }}" class="btn btn-success btn-login mb-3">
                                    + Tambah User Baru
                                </a>
                                <div class="table-responsive">
                                    <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama</th>
                                            <th>Foto</th>
                                            <th>Email</th>
                                            <th>Roles</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>  
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
@endsection

@push('addon-script')
    <script>
        // AJAX DataTable
        var datatable = $('#crudTable').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            ajax: {
                url: '{!! url()->current() !!}',
            },
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'photo', name: 'photo' },
                { data: 'email', name: 'email' },
                { data: 'roles', name: 'roles' },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    width: '15%'
                },
            ]
        });
    </script>
@endpush