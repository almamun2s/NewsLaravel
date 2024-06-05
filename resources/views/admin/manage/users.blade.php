@extends('admin.body.main_layout')

@section('title', 'Manage Users')

@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">UBold</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                <li class="breadcrumb-item active">Datatables</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Manage Users <span class="btn btn-success">{{ count($users) }}</span> </h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        @if (auth()->user()->can('admins.make'))
                                            <th>Action</th>
                                        @endif

                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($users as $key => $admin)
                                        <tr>
                                            <td>{{ $key + 1 }} </td>
                                            <td><img src="{{ $admin->getImg() }}" alt="User" width="50px"
                                                    height="50px"> </td>
                                            <td>{{ $admin->fname }} {{ $admin->lname }} </td>
                                            <td>{{ $admin->username }} </td>
                                            <td>{{ $admin->email }} </td>
                                            <td>{{ $admin->phone }} </td>
                                            @if (auth()->user()->can('admins.make'))
                                                <td>

                                                    <a href="{{ route('admin.make_admin', $admin->id) }}" id="make_admin"
                                                        class="btn btn-primary rounded-pill waves-effect waves-light"
                                                        title="Make Inactive">Make Admin</a>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row-->
        </div> <!-- container -->
    </div> <!-- content -->


@endsection
