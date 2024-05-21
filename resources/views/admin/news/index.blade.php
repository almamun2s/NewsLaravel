@extends('admin.body.main_layout')

@section('title', 'News Posts')
@php
    $activeNews = App\Models\NewsPost::where('status', 'publish')->get();
    $breakingNews = App\Models\NewsPost::where('breaking_news', 1 )->get();
@endphp
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
                <div class="col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-primary border-primary border shadow">
                                        <i class="fe-layout font-22 avatar-title text-white"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ count($allNews) }}</span>
                                        </h3>
                                        <p class="text-muted mb-1 text-truncate">Total News Posted </p>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-success border-success border shadow">
                                        <i class="fe-eye font-22 avatar-title text-white"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ count($activeNews) }}</span>
                                        </h3>
                                        <p class="text-muted mb-1 text-truncate">Active News</p>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-danger border-danger border shadow">
                                        <i class="fe-alert-octagon font-22 avatar-title text-white"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup"> {{ count($allNews) - count($activeNews) }} </span>
                                        </h3>
                                        <p class="text-muted mb-1 text-truncate">Inactive News</p>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-warning border-warning border shadow">
                                        <i class="fe-heart  font-22 avatar-title text-white"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ count($breakingNews) }}</span>
                                        </h3>
                                        <p class="text-muted mb-1 text-truncate">Breaking News</p>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->
            </div>
            <!-- end row-->

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
