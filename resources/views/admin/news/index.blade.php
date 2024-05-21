@extends('admin.body.main_layout')

@section('title', 'News Posts')

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
                        <h4 class="page-title">News Posts <span class="btn btn-success">{{ count($allNews) }}</span> </h4>
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
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Author</th>
                                        <th>Published</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($allNews as $key => $news)
                                        <tr>
                                            <td>{{ $key + 1 }} </td>
                                            <td>{{ $news->image }} </td>
                                            <td>{{ $news->title }} </td>
                                            <td>{{ $news->category_id }} </td>
                                            <td>{{ $news->user_id }} </td>
                                            <td>{{ $news->date }} </td>
                                            <td>{{ $news->status }} </td>
                                            <td>
                                                @if ($news->status == 'active')
                                                    <span class="btn btn-success waves-effect waves-light">Active</span>
                                                @else
                                                    <span class="btn btn-danger waves-effect waves-light">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                {{-- @if (auth()->user()->id == $admin->id)
                                                    <span>This is you</span>
                                                @else
                                                    @if ($admin->status == 'active')
                                                        <a href="{{ route('admin.inactive', $admin->id ) }}"
                                                            class="btn btn-danger rounded-pill waves-effect waves-light"
                                                            title="Make Inactive"><i
                                                                class="fa-solid fa-thumbs-down"></i></a>
                                                    @else
                                                        <a href="{{ route('admin.active', $admin->id ) }}"
                                                            class="btn btn-primary rounded-pill waves-effect waves-light"
                                                            title="Make Active"><i class="fa-solid fa-thumbs-up"></i> </a>
                                                    @endif
                                                @endif --}}
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
