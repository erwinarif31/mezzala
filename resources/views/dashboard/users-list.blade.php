@extends('layouts.dashboard.master')

@section('page-title')
    User List
@endsection

@section('module-title')
    <h1>User Lists</h1>
@endsection

@section('user-module')
    @if (auth()->user()->is_admin == 1)
        <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-user"></i>
                <span>User</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="/users"><i class="fas fa-list"></i>User List</a>
                </li>
                <li><a class="nav-link" href="layout-transparent.html"><i class="fas fa-plus"></i>Create User</a></li>
            </ul>
        </li>
    @endif
@endsection

@section('css-libraries')
    {{-- <link rel="stylesheet" href="../node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">
@endsection

@section('js-libraries')
    {{-- <script src="../node_modules/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js"></script> --}}
@endsection

@section('spesific-js')
    {{-- <script src="../assets/js/page/modules-datatables.js"></script> --}}
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {

            var table = $("#table-1").DataTable({
                "columnDefs": [{
                    "sortable": false,
                    "targets": [4, 7]
                }, {
                    "visible": false,
                    "targets": [5, 6]
                }],
                dom: '<"#filterDiv">frtip',
            })

            $("#filterDiv").append(
                "<button class='btn btn-primary' id='filterBtn' type='button' data-toggle='dropdown' aria-expanded='false'><i class='fas fa-filter'></i>  Filter</button>"
            )
            $("#filter-menu").prependTo($("#filterDiv"));

            $('.filter-status').on('change', function(e) {
                var searchTerms = []
                $.each($('.filter-status'), function(i, elem) {
                    if ($(elem).prop('checked')) {
                        searchTerms.push("^" + $(this).val() + "$")
                    }
                })
                table.column(6).search(searchTerms.join('|'), true, false, true).draw();
                console.log($(this).val());
            });

            $('.filter-isAdmin').on('change', function(e) {
                var searchTerms = []
                $.each($('.filter-isAdmin'), function(i, elem) {
                    if ($(elem).prop('checked')) {
                        searchTerms.push("^" + $(this).val() + "$")
                    }
                })
                table.column(5).search(searchTerms.join('|'), true, false, true).draw();
                console.log($(this).val());
            });
        })
    </script>

@endsection

@section('css-spesific')
    <style>
        #filterDiv {
            position: absolute;
            right: 25%
        }
    </style>
@endsection

@section('page-content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Users List</h4>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Username</th>
                                    <th>Due Date</th>
                                    <th>Article Authore</th>
                                    <th>is_admin?</th>
                                    <th>status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>username</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>
                                            <ul>
                                                <li>test</li>
                                            </ul>
                                        </td>
                                        <td>{{ $user->is_admin }}</td>
                                        <td>{{ $user->status }}</td>
                                        <td>
                                            <button class="btn btn-primary">Edit</button>
                                            <button class="btn btn-primary">Detail</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="dropdown-menu" id="filter-menu">
        <div class="dropdown-title">Status</div>
        <div class="form-check ml-3">
            <input class="filter-status" name="status" type="checkbox" id="active" value="Active">
            <label class="form-check-label" for="active">
                Active
            </label>
        </div>
        <div class="form-check ml-3">
            <input class="filter-status" name="status" type="checkbox" id="inactive" value="Inactive">
            <label class="form-check-label" for="inactive">
                Inactive
            </label>
        </div>
        <div class="form-check ml-3">
            <input class="filter-status" name="status" type="checkbox" id="block" value="Block">
            <label class="form-check-label" for="block">
                Block
            </label>
        </div>

        <div class="dropdown-title">User Level</div>
        <div class="form-check ml-3">
            <input class="filter-isAdmin" type="checkbox" id="admin" value="1">
            <label class="form-check-label" for="admin">
                Admin
            </label>
        </div>
        <div class="form-check ml-3">
            <input class="filter-isAdmin" type="checkbox" id="member" value="0">
            <label class="form-check-label" for="member">
                Member
            </label>
        </div>

    </div>
@endsection
