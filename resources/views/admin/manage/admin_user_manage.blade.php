@extends('admin.body.main_layout')

@section('title', 'Edit Users')

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
                        <h4 class="page-title">Edit User <span class="btn btn-primary">{{ $user->fname }}
                                {{ $user->lname }}</span></h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->




            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <div class="col-lg-12">
                            <form action="{{ route('admin.admin_user_manage_update', $user->id) }}" method="post">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="roles" class="form-label">Assign Role</label>
                                            <select class="form-select" id="roles" name="roles">
                                                @foreach ($roles as $role)
                                                    <option {{ $user->hasRole($role->name) ? 'selected' : '' }}
                                                        value="{{ $role->name }}">{{ $role->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>



                                <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                            </form>
                        </div>
                        @if ($user->role == 'admin')

                            <div class="col-lg-6 mt-3">
                                @if (auth()->user()->id != $user->id)
                                    @if (auth()->user()->can('admins.deactive'))
                                        @if ($user->status == 'active')
                                            <a href="{{ route('admin.inactive', $user->id) }}"
                                                class="btn btn-danger rounded-pill waves-effect waves-light"
                                                title="Make Inactive">Deactivate</a>
                                        @else
                                            <a href="{{ route('admin.active', $user->id) }}"
                                                class="btn btn-primary rounded-pill waves-effect waves-light"
                                                title="Make Active">Activate</a>
                                        @endif
                                    @endif
                                    @if (auth()->user()->can('admins.remove'))
                                        <a href="{{ route('admin.make_user', $user->id) }}" id="delete"
                                            class="btn btn-danger rounded-pill waves-effect waves-light"
                                            title="Make Inactive">Make
                                            Normal User</a>
                                    @endif
                                @endif
                            </div>
                        @endif



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
