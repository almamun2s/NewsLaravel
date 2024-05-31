@extends('admin.body.main_layout')

@section('title', 'Edit Live TV')

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
                        <h4 class="page-title">Edit Live TV</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->



            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.livetvUpdate') }}" id="myForm" method="post"
                                enctype="multipart/form-data">
                                <div class="row">
                                    @csrf
                                    @method('PUT')

                                    <div class="col-lg-6 form-group">


                                        <div class="mb-3">
                                            <label for="simpleinput" class="form-label">Live TV Url ( Put only the url from
                                                Live YouTube video embed ) </label>
                                            <input type="url" name="url" class="form-control"
                                                value="{{ $video->url }}"
                                                placeholder="https://www.youtube.com/embed/hsmiOtjewlQ?si=C6N_-rBpFuASoPcz">
                                            @error('url')
                                                <span class="text-danger">{{ $message }} </span>
                                            @enderror
                                        </div>


                                        <div class="mb-3 form-group">
                                            <label for="simpleinput" class="form-label">Live TV Thumbnail</label>
                                            <input type="file" name="image" class="form-control" id="image">
                                        </div>


                                        <div class="mb-3 form-group">
                                            <img src="{{ $video->getImg() }}" alt="" id="image_preview"
                                                width="100px">
                                        </div>

                                        <div class="form-check mb-2 form-check-success">
                                            <input class="form-check-input rounded-circle" type="checkbox" value="1"
                                                @if ($video->isActive) {{ 'checked' }} @endif
                                                name="live_status" id="live_status">
                                            <label class="form-check-label" for="live_status">Publish</label>
                                        </div>


                                        <button type="submit" class="mt-3 btn btn-primary waves-effect waves-light">Update
                                            Live TV</button>








                                    </div>
                                </div>
                            </form>
                        </div> <!-- end card-body -->


                    </div> <!-- end card -->
                </div><!-- end col -->
            </div>
            <!-- end row -->

            <!-- end row-->
        </div> <!-- container -->
    </div> <!-- content -->

    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $('#image_preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            })

        });
    </script>
@endsection
