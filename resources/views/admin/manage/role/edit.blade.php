@extends('admin.body.main_layout')

@section('title', 'Edit Roles')

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
                        <h4 class="page-title">Edit Roles</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Edit Roles</h4>

                            <div class="row">
                                <div class="col-lg-6">
                                    <form action="{{ url("admin/roles/$role->id") }}" id="myForm" method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" name="name" autocomplete="off"
                                                value="{{ $role->name }}" class="form-control">
                                            @error('name')
                                                <span class="text-danger">{{ $message }} </span>
                                            @enderror
                                        </div>

                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Update
                                            Roles</button>
                                    </form>
                                </div> <!-- end col -->

                                @if (auth()->user()->can('roles.delete'))
                                    <div class="col-lg-3">
                                        <form action="{{ url("admin/roles/$role->id") }}" method="post" id="deleteForm">
                                            @csrf
                                            @method('DELETE')
                                            <input class="btn btn-outline-danger rounded-pill waves-effect waves-light"
                                                type="submit" value="Delete">
                                        </form>
                                    </div>
                                @endif
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
                            <h4 class="header-title">Permissions for {{ $role->name }}</h4>

                            <div class="row">
                                <div class="col-lg-6">
                                    <form action="{{ route('admin.permission_update', $role->id) }}" id="myForm"
                                        method="post">
                                        @csrf
                                        @method('PUT')

                                        <div class="mb-3">
                                            <div class="form-check mb-2 form-check-primary">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="permitAll">
                                                <label class="form-check-label" style="text-transform: capitalize;"
                                                    for="permitAll">Permit all</label>
                                            </div>
                                        </div>

                                        @foreach ($permission_groups as $group)
                                            @php
                                                $permissions = App\Models\User::getPermissionByGroup(
                                                    $group->group_name,
                                                );
                                            @endphp
                                            <div class="row">
                                                <div class="col-3">

                                                    <div class="form-check mb-2 form-check-primary">
                                                        <input class="form-check-input" type="checkbox"
                                                            {{ App\Models\User::roleHasPermissions($role, $permissions) ? 'checked' : '' }}
                                                            id="{{ $group->group_name }}1">
                                                        <label class="form-check-label" style="text-transform: capitalize;"
                                                            for="{{ $group->group_name }}1">{{ $group->group_name }}</label>
                                                    </div>
                                                </div>


                                                <div class="col-9">
                                                    @foreach ($permissions as $permission)
                                                        <div class="form-check mb-2 form-check-primary">
                                                            <input name="permission[]" value="{{ $permission->name }}"
                                                                class="form-check-input" type="checkbox"
                                                                {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}
                                                                id="{{ $permission->name }}">
                                                            <label class="form-check-label"
                                                                for="{{ $permission->name }}">{{ $permission->name }}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>

                                            </div>
                                            <br>
                                        @endforeach
                                        <button type="submit"
                                            class="btn btn-primary waves-effect waves-light">Save</button>
                                    </form>
                                </div> <!-- end col -->
                            </div>

                            <!-- end row-->

                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div><!-- end col -->
            </div>
        </div> <!-- container -->
    </div> <!-- content -->


    <script>
        $('#permitAll').click(function() {
            if ($(this).is(':checked')) {
                $('input[type=checkbox]').prop('checked', true);
            } else {
                $('input[type=checkbox]').prop('checked', false);
            }
        });
    </script>


@endsection
