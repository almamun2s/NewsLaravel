@extends('admin.body.main_layout')

@section('title', 'News Posts Comments')

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
                        <h4 class="page-title">News Posts <span class="btn btn-success">{{ count($comments) }}</span> </h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="btn btn-danger">Pending Comments</h4>
                            <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Photo</th>
                                        <th>Title</th>
                                        <th>Commented by</th>
                                        <th>Comment</th>
                                        <th>Commented at</th>
                                        @if (auth()->user()->can('news.comment.delete'))
                                            <th>Action</th>
                                        @endif

                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($comments as $key => $comment)
                                        @if ($comment->status == 0)
                                            <tr>
                                                <td>{{ $key + 1 }} </td>
                                                <td><img src="{{ $comment->news->getImg() }}" alt="" width="75px">
                                                </td>
                                                <td>{{ str($comment->news->title)->limit(20) }} </td>
                                                <td>{{ $comment->user->fname }} {{ $comment->user->lname }} </td>
                                                <td>{{ $comment->text }} </td>
                                                <td>{{ $comment->created_at->diffForHumans() }} </td>
                                                @if (auth()->user()->can('news.comment.delete'))
                                                    <td>
                                                        <a href="{{ route('admin.news.comments.approve', $comment->id) }}"
                                                            class="btn btn-success rounded-pill waves-effect waves-light">Approve</a>
                                                        <a href="{{ route('admin.news.comments.delete', $comment->id) }}"
                                                            id="delete"
                                                            class="btn btn-danger rounded-pill waves-effect waves-light">Delete</a>
                                                    </td>
                                                @endif
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row-->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="btn btn-success">Approved Comments</h4>
                            <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Photo</th>
                                        <th>Title</th>
                                        <th>Commented by</th>
                                        <th>Comment</th>
                                        <th>Commented at</th>
                                        @if (auth()->user()->can('news.comment.delete'))
                                            <th>Action</th>
                                        @endif

                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($comments as $key => $comment)
                                        @if ($comment->status == 1)
                                            <tr>
                                                <td>{{ $key + 1 }} </td>
                                                <td><img src="{{ $comment->news->getImg() }}" alt=""
                                                        width="75px">
                                                </td>
                                                <td>{{ str($comment->news->title)->limit(20) }} </td>
                                                <td>{{ $comment->user->fname }} {{ $comment->user->lname }} </td>
                                                <td>{{ $comment->text }} </td>
                                                <td>{{ $comment->created_at->diffForHumans() }} </td>
                                                @if (auth()->user()->can('news.comment.delete'))
                                                    <td>
                                                        <a href="{{ route('admin.news.comments.delete', $comment->id) }}"
                                                            id="delete"
                                                            class="btn btn-danger rounded-pill waves-effect waves-light">Delete</a>
                                                    </td>
                                                @endif

                                            </tr>
                                        @endif
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
