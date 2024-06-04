@extends('admin.body.main_layout')

@section('title', 'Manage Admins')

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
                        <h4 class="page-title">Manage Admins <span class="btn btn-success">{{ count($admins) }}</span> </h4>
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
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($admins as $key => $admin)
                                        <tr>
                                            <td>{{ $key + 1 }} </td>
                                            <td><img src="{{ $admin->getImg() }}" alt="admin" width="50px"
                                                    height="50px"> </td>
                                            <td>{{ $admin->fname }} {{ $admin->lname }} </td>
                                            <td>{{ $admin->username }} </td>
                                            <td>{{ $admin->email }} </td>
                                            <td>{{ $admin->phone }} </td>
                                            <td>
                                                @if (auth()->user()->id == $admin->id)
                                                    <span>This is you</span>
                                                @else
                                                    @if ($admin->status == 'active')
                                                        <a href="{{ route('admin.inactive', $admin->id) }}"
                                                            class="btn btn-danger rounded-pill waves-effect waves-light"
                                                            title="Make Inactive">Deactivate</a>
                                                    @else
                                                        <a href="{{ route('admin.active', $admin->id) }}"
                                                            class="btn btn-primary rounded-pill waves-effect waves-light"
                                                            title="Make Active">Activate</a>
                                                    @endif
                                                @endif
                                            </td>
                                            <td>
                                                @if (auth()->user()->id == $admin->id)
                                                    <span>This is you</span>
                                                @else
                                                    <a href="{{ route('admin.make_user', $admin->id) }}" id="delete"
                                                        class="btn btn-danger rounded-pill waves-effect waves-light"
                                                        title="Make Inactive">Make Normal User</a>
                                                @endif
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
