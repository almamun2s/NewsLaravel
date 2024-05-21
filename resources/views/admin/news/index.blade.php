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
                                            <td><img src="{{ $news->getImg() }}" alt="" width="75px"> </td>
                                            <td>{{ str($news->title)->limit(20) }} </td>
                                            <td>{{ $news->category->name }}
                                                {{ $news->subCategory != null ? ' -->' . $news->subCategory->name : '' }}
                                            </td>
                                            <td>{{ $news->user->fname }} {{ $news->user->lname }} </td>
                                            <td>{{ $news->created_at->diffForHumans() }} </td>
                                            <td>
                                                @if ($news->status == 'publish')
                                                    <span class="btn btn-success waves-effect waves-light">Published</span>
                                                @else
                                                    <span class="btn btn-danger waves-effect waves-light">Archived</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ url("/admin/news_post/$news->id/edit") }}" title="Edit News"
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
