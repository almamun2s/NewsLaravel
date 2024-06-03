@extends('admin.body.main_layout')

@section('title', 'Permissions')

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
                        <h4 class="page-title">Permissions</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Add Permissions</h4>

                            <div class="row">
                                <div class="col-lg-6">
                                    <form action="{{ url('admin/permissions') }}" id="myForm" method="post">
                                        @csrf

                                        <div class="form-group mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" name="name" autocomplete="off" class="form-control">
                                            @error('name')
                                                <span class="text-danger">{{ $message }} </span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="group_name" class="form-label">Input Select</label>
                                            <select class="form-select" id="group_name" name="group_name">
                                                <option value="banner">Banner</option>
                                                <option value="category">Category</option>
                                                <option value="news">News Post</option>
                                                <option value="gallery">Gallery</option>
                                                <option value="admins">Admins</option>
                                                <option value="roles">Roles and Permissions</option>
                                                <option value="meta">Meta Data</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Add
                                            Permissions</button>
                                    </form>
                                </div> <!-- end col -->
                            </div>

                            <!-- end row-->

                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div><!-- end col -->
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Group Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($permissions as $key => $permission)
                                        <tr>
                                            <td>{{ $key + 1 }} </td>
                                            <td>{{ $permission->name }} </td>
                                            <td>{{ $permission->group_name }} </td>
                                            <td>
                                                <a href="{{ url("admin/permissions/$permission->id/edit") }}"
                                                    class="btn btn-warning rounded-pill waves-effect waves-light">Edit</a>
                                            </td>
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
