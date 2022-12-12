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
    <link rel="stylesheet" href="../node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css">
@endsection

@section('js-libraries')
    <script src="../node_modules/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js"></script>
@endsection

@section('spesific-js')
    <script src="../assets/js/page/modules-datatables.js"></script>
@endsection

@section('page-content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Users List</h4>
                    <div class="d-flex ml-auto" style="height: 28px">
                        <label for="search" class="mr-2">Search:</label>
                        <input type="search" class="form-control form-control-sm" placeholder="" aria-controls="table-2" name="search" id="search">
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-2">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Username</th>
                                    <th>Due Date</th>
                                    <th>Article Authore</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>username</td>
                                        <td>{{$user->created_at}}</td>
                                        <td>
                                            <ul>
                                                <li>test</li>
                                            </ul>
                                        </td>
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
@endsection
