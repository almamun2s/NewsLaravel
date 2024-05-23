@extends('admin.body.main_layout')

@section('title', 'Update Banner')

@section('content')

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Update Banner</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->



        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Update Banner</h4>

                        <div class="row mt-3">
                            <div class="col-lg-6">
                                <form action="{{ route('admin.update.banner', 1) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group mb-3 col-lg-6">
                                            <label for="image" class="form-label">Home One</label>
                                            <input type="file" name="home_one" id="image1" class="form-control">
                                            @error('image')
                                                <span class="text-danger">{{ $message }} </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <img src="{{ !empty($home_one->image) ? url('uploads/banner/' . $home_one->image) : url('uploads/no_image.jpg') }} "
                                                alt="" width="400px" height="100px" id="image_preview1">
                                        </div>
                                    </div>


                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Update Home
                                        One</button>
                                </form>
                            </div> <!-- end col -->
                        </div>

                        <div class="row mt-3">
                            <div class="col-lg-6">
                                <form action="{{ route('admin.update.banner', 2) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group mb-3 col-lg-6">
                                            <label for="image" class="form-label">Home Two</label>
                                            <input type="file" name="home_two" id="image2" class="form-control">
                                            @error('image')
                                                <span class="text-danger">{{ $message }} </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <img src="{{ !empty($home_two->image) ? url('uploads/banner/' . $home_two->image) : url('uploads/no_image.jpg') }} "
                                                alt="" width="400px" height="100px" id="image_preview1">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Update Home
                                        Two</button>
                                </form>
                            </div> <!-- end col -->
                        </div>

                        <div class="row mt-3">
                            <div class="col-lg-6">
                                <form action="{{ route('admin.update.banner', 3) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group mb-3 col-lg-6">
                                            <label for="image" class="form-label">Home Three</label>
                                            <input type="file" name="home_three" id="image3" class="form-control">
                                            @error('image')
                                                <span class="text-danger">{{ $message }} </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <img src="{{ !empty($home_three->image) ? url('uploads/banner/' . $home_three->image) : url('uploads/no_image.jpg') }} "
                                                alt="" width="400px" height="100px" id="image_preview1">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Update Home
                                        Three</button>
                                </form>
                            </div> <!-- end col -->
                        </div>

                        <div class="row mt-3">
                            <div class="col-lg-6">
                                <form action="{{ route('admin.update.banner', 4) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group mb-3 col-lg-6">
                                            <label for="image" class="form-label">Home Four</label>
                                            <input type="file" name="home_four" id="image4" class="form-control">
                                            @error('image')
                                                <span class="text-danger">{{ $message }} </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <img src="{{ !empty($home_four->image) ? url('uploads/banner/' . $home_four->image) : url('uploads/no_image.jpg') }} "
                                                alt="" width="400px" height="100px" id="image_preview1">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Update Home
                                        Four</button>
                                </form>
                            </div> <!-- end col -->
                        </div>

                        <div class="row mt-3">
                            <div class="col-lg-6">
                                <form action="{{ route('admin.update.banner', 5) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group mb-3 col-lg-6">
                                            <label for="image" class="form-label">News Category</label>
                                            <input type="file" name="news_category" id="image5"
                                                class="form-control">
                                            @error('image')
                                                <span class="text-danger">{{ $message }} </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <img src="{{ !empty($news_category->image) ? url('uploads/banner/' . $news_category->image) : url('uploads/no_image.jpg') }} "
                                                alt="" width="400px" height="100px" id="image_preview1">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Update News
                                        Category</button>
                                </form>
                            </div> <!-- end col -->
                        </div>

                        <div class="row mt-3">
                            <div class="col-lg-6">
                                <form action="{{ route('admin.update.banner', 6) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group mb-3 col-lg-6">
                                            <label for="image" class="form-label">News Details</label>
                                            <input type="file" name="news_details" id="image6"
                                                class="form-control">
                                            @error('image')
                                                <span class="text-danger">{{ $message }} </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <img src="{{ !empty($news_details->image) ? url('uploads/banner/' . $news_details->image) : url('uploads/no_image.jpg') }} "
                                                alt="" width="400px" height="100px" id="image_preview1">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">News
                                        Details</button>
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

    <script type="text/javascript">
        $(document).ready(function() {

            $('#image1').change(function(e) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $('#image_preview1').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
            $('#image2').change(function(e) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $('#image_preview2').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
            $('#image3').change(function(e) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $('#image_preview3').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
            $('#image4').change(function(e) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $('#image_preview4').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
            $('#image5').change(function(e) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $('#image_preview5').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
            $('#image6').change(function(e) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $('#image_preview6').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });

        });
    </script>
@endsection
