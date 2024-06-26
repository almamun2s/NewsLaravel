@extends('admin.body.main_layout')

@section('title', 'Roles')

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
                        <h4 class="page-title">Role</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            @if (auth()->user()->can('roles.add'))
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Add Role</h4>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <form action="{{ url('admin/roles') }}" id="myForm" method="post">
                                            @csrf

                                            <div class="form-group mb-3">
                                                <label for="name" class="form-label">Name</label>
                                                <input type="text" name="name" autocomplete="off"
                                                    class="form-control">
                                                @error('name')
                                                    <span class="text-danger">{{ $message }} </span>
                                                @enderror
                                            </div>

                                            <button type="submit" class="btn btn-primary waves-effect waves-light">Add
                                                Role</button>
                                        </form>
                                    </div> <!-- end col -->
                                </div>

                                <!-- end row-->

                            </div> <!-- end card-body -->
                        </div> <!-- end card -->
                    </div><!-- end col -->
                </div>
                <!-- end row -->
            @endif

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <table class="table dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Roles Name</th>
                                        <th>Permissions</th>
                                        @if (auth()->user()->can('roles.edit'))
                                            <th>Action</th>
                                        @endif
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($roles as $key => $role)
                                        <tr>
                                            <td>{{ $key + 1 }} </td>
                                            <td>{{ $role->name }} </td>
                                            <td>
                                                @foreach ($role->permissions as $permission)
                                                    <span class="btn btn-danger rounded-pill waves-effect waves-light"
                                                        style="display: inline-block;margin:5px;">{{ $permission->name }}</span>
                                                @endforeach
                                            </td>
                                            @if (auth()->user()->can('roles.edit'))
                                                <td>
                                                    <a href="{{ url("admin/roles/$role->id/edit") }}"
                                                        class="btn btn-warning rounded-pill waves-effect waves-light">Edit</a>
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
