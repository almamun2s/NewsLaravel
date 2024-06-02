@extends('admin.body.main_layout')

@section('title', 'Update Meta Data')

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
                        <h4 class="page-title">Update Meta Data </h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-9">
                                    <form action="" method="post">
                                        @csrf

                                        <div class="form-group mb-3">
                                            <label for="title" class="form-label">Title</label>
                                            <input type="text" name="title" id="title" class="form-control"
                                                placeholder="Write your meta title" value="{{ $meta_data->title }}">
                                            @error('title')
                                                <span class="text-danger">{{ $message }} </span>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="author" class="form-label">Author</label>
                                            <input type="text" name="author" id="author" class="form-control"
                                                placeholder="Write your meta author" value="{{ $meta_data->author }}">
                                            @error('author')
                                                <span class="text-danger">{{ $message }} </span>
                                            @enderror
                                        </div>


                                        <div class="form-group mb-3">
                                            <label for="keywords" class="form-label">Keywords</label>
                                            <input type="text" name="keywords" id="keywords" class="selectize-close-btn"
                                                placeholder="Type your Keywords by separating with comma."
                                                value="{{ $meta_data->keywords }}">
                                            @error('keywords')
                                                <span class="text-danger">{{ $message }} </span>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="description" class="form-label">Description</label>
                                            <textarea name="description" id="description" style="resize: none;" placeholder="Type your meta Description here"
                                                class="form-control">{{ $meta_data->description }}</textarea>
                                            @error('description')
                                                <span class="text-danger">{{ $message }} </span>
                                            @enderror
                                        </div>

                                        <button type="submit"
                                            class="btn btn-primary waves-effect waves-light">Update</button>
                                    </form>
                                </div> <!-- end col -->
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
