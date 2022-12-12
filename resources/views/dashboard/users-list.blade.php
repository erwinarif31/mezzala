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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">
@endsection

@section('spesific-js')
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
    <script src="https://cdn.datatables.net/datetime/1.2.0/js/dataTables.dateTime.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://raw.githubusercontent.com/phstc/jquery-dateFormat/master/dist/jquery-dateformat.js"></script>
    <script>
        var fromDate;
        var toDate;


        $(document).ready(function() {
            // let testDate = new Date();
            // // console.log(testDate);
            // year = testDate.getFullYear();
            // month = testDate.getMonth() + 1;
            // day = testDate.getDate();

            // nowDate = year + "-" + month + "-" + day
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

            fromDate = $("#from");
            toDate = $("#to");

            $.fn.dataTable.ext.search.push(
                function(settings, data, dataIndex) {
                    var min = fromDate.val();
                    var max = toDate.val();
                    var date = new Date(data[3]);
                    year = date.getFullYear();
                    month = date.getMonth() + 1;
                    day = date.getDate();
                    date = year + "-" + month + "-" + day
                    if (
                        (min === "" && max === "") ||
                        (min === "" && date <= max) ||
                        (min <= date && max === "") ||
                        (min <= date && date <= max)
                    ) {
                        return true;
                    } 
                }
            );

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

            $('#from, #to').on('change', function() {
                // console.log(fromDate.val());
                table.draw();
            });

            $("#filterDiv").append(
                "<button class='btn btn-primary' id='filterBtn' type='button' data-toggle='dropdown' aria-expanded='false'><i class='fas fa-filter'></i>  Filter</button>"
            )
            $("#filter-menu").prependTo($("#filterDiv"));




            // console.log(nowDate);
            // console.log(fromDate.val());

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
                                    <th>Joined Date</th>
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
        <div class="dropdown-title pb-0">Status</div>
        <div class="form-check ml-2">
            <input class="filter-status" name="status" type="checkbox" id="active" value="Active">
            <a class="form-check-label" for="active">
                Active
            </a>
        </div>
        <div class="form-check ml-2">
            <input class="filter-status" name="status" type="checkbox" id="inactive" value="Inactive">
            <a class="form-check-label" for="inactive">
                Inactive
            </a>
        </div>
        <div class="form-check ml-2">
            <input class="filter-status" name="status" type="checkbox" id="block" value="Block">
            <a class="form-check-label" for="block">
                Block
            </a>
        </div>

        <div class="dropdown-title pb-0">User Level</div>
        <div class="form-check ml-2">
            <input class="filter-isAdmin" type="checkbox" id="admin" value="1">
            <a class="form-check-label" for="admin">
                Admin
            </a>
        </div>
        <div class="form-check ml-2">
            <input class="filter-isAdmin" type="checkbox" id="member" value="0">
            <a class="form-check-label" for="member">
                Member
            </a>
        </div>

        <div class="dropdown-title pb-0">Joined Date</div>
        <div class="from-date ml-4 mr-3">
            <a for="from" class="">From</a>
            <input type="date" class=" mb-1 w-100" name="from" id="from" style="display: block">
        </div>
        <div class="to-date ml-4 mr-3">
            <a for="to" class="">To</a>
            <input type="date" class=" mb-1 w-100" name="to" id="to" style="display: block">
        </div>
    </div>
@endsection
