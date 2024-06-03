@extends('admin.body.main_layout')

@section('title', 'Edit Permissions')

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
                        <h4 class="page-title">Edit Permissions</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Edit Permissions</h4>

                            <div class="row">
                                <div class="col-lg-6">
                                    <form action="{{ url("admin/permissions/$permission->id") }}" id="myForm"
                                        method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" name="name" autocomplete="off"
                                                value="{{ $permission->name }}" class="form-control">
                                            @error('name')
                                                <span class="text-danger">{{ $message }} </span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="group_name" class="form-label">Input Select</label>
                                            <select class="form-select" id="group_name" name="group_name">
                                                <option {{ $permission->group_name == 'banner' ? 'selected' : '' }}
                                                    value="banner">Banner</option>
                                                <option {{ $permission->group_name == 'category' ? 'selected' : '' }}
                                                    value="category">Category</option>
                                                <option {{ $permission->group_name == 'news' ? 'selected' : '' }}
                                                    value="news">News Post</option>
                                                <option {{ $permission->group_name == 'gallery' ? 'selected' : '' }}
                                                    value="gallery">Gallery</option>
                                                <option {{ $permission->group_name == 'admins' ? 'selected' : '' }}
                                                    value="admins">Admins</option>
                                                <option {{ $permission->group_name == 'roles' ? 'selected' : '' }}
                                                    value="roles">Roles and Permissions</option>
                                                <option {{ $permission->group_name == 'meta' ? 'selected' : '' }}
                                                    value="meta">Meta Data</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Update
                                            Permissions</button>
                                    </form>
                                </div> <!-- end col -->

                                <div class="col-lg-3">
                                    <form action="{{ url("admin/permissions/$permission->id") }}" method="post" id="deleteForm">
                                        @csrf
                                        @method('DELETE')
                                        <input class="btn btn-outline-danger rounded-pill waves-effect waves-light"
                                            type="submit" value="Delete">
                                    </form>
                                </div>
                            </div>

                            <!-- end row-->

                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div><!-- end col -->
            </div>
            <!-- end row -->
        </div> <!-- container -->
    </div> <!-- content -->



@endsection
