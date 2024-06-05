@extends('admin.body.main_layout')

@section('title', 'Video Gallery')

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
                        <h4 class="page-title">Video Gallery</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->


            @if (auth()->user()->can('gallery.video.add'))
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ url('admin/video_gallery') }}" id="myForm" method="post"
                                    enctype="multipart/form-data">
                                    <div class="row">
                                        @csrf
                                        <div class="col-lg-6 form-group mb-3">
                                            <label for="simpleinput" class="form-label">Video Title</label>
                                            <input type="text" name="title" class="form-control"
                                                value="{{ old('title') }}">
                                            @error('title')
                                                <span class="text-danger">{{ $message }} </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6 form-group mb-3">
                                            <label for="simpleinput" class="form-label">Video Url</label>
                                            <input type="url" name="url" class="form-control"
                                                value="{{ old('url') }}">
                                            @error('url')
                                                <span class="text-danger">{{ $message }} </span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 form-group mb-3">
                                            <label for="simpleinput" class="form-label">Video Thumbnail</label>
                                            <input type="file" name="image" class="form-control" id="image">
                                        </div>
                                        <div class="col-lg-6 form-group mb-3">
                                            <img src="" alt="" id="image_preview" width="100px">
                                        </div>
                                        <div class="col-lg-6">
                                            <button type="submit" class="mt-3 btn btn-primary waves-effect waves-light">Add
                                                Video</button>
                                        </div>
                                    </div>
                                </form>

                                <!-- end row-->

                            </div> <!-- end card-body -->
                        </div> <!-- end card -->
                    </div><!-- end col -->
                </div>
                <!-- end row -->
            @endif


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Uploaded</th>
                                        @if (auth()->user()->can('gallery.video.edit'))
                                            <th>Action</th>
                                        @endif
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($videos as $key => $video)
                                        <tr>
                                            <td>{{ $key + 1 }} </td>
                                            <td><img src="{{ $video->getImg() }}" alt="" width="75px"> </td>
                                            <td>{{ $video->title }} </td>
                                            <td>{{ $video->created_at->diffForHumans() }} </td>
                                            @if (auth()->user()->can('gallery.video.edit'))
                                                <td>
                                                    <a href="{{ url("/admin/video_gallery/$video->id/edit") }}"
                                                        title="Edit News"
                                                        class="btn btn-warning rounded-pill waves-effect waves-light">Edit</a>
                                                </td>
                                            @endif
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
