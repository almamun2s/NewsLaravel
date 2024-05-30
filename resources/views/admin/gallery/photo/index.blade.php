@extends('admin.body.main_layout')

@section('title', 'Photo Gallery')

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
                        <h4 class="page-title">Photo Gallery</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->



            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form action="{{ url('admin/photo_gallery') }}" id="myForm" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <label for="simpleinput" class="form-label">Add Photos</label>
                                            <input type="file" name="image[]" id="multiImg" multiple
                                                class="form-control">
                                            <div id="preview_img"></div>
                                        </div>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Add</button>
                                    </form>
                                </div> <!-- end col -->
                            </div>

                            <!-- end row-->

                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div><!-- end col -->
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Photo</th>
                                        <th>Uploaded</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($photos as $key => $photo)
                                        <tr>
                                            <td>{{ $key + 1 }} </td>
                                            <td><img src="{{ $photo->getImg() }}" alt="" width="75px"> </td>
                                            <td>{{ $photo->created_at->diffForHumans() }} </td>
                                            <td>
                                                <form action="{{ url("admin/photo_gallery/$photo->id") }}"
                                                    method="post" class="deleteForm">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input
                                                        class="btn btn-outline-danger rounded-pill waves-effect waves-light"
                                                        type="submit" value="Delete">
                                                </form>
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


    <script>
        $(document).ready(function() {
            $('#multiImg').on('change', function() { //on file input change
                if (window.File && window.FileReader && window.FileList && window
                    .Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data

                    $.each(data, function(index, file) { //loop though each file
                        if (/(\.|\/)(gif|jpe?g|png|webp)$/i.test(file
                                .type)) { //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file) { //trigger function on successful read
                                return function(e) {
                                    var img = $('<img/>').addClass('thumb').attr('src',
                                            e.target.result).width(100)
                                        .height(80); //create image element 
                                    $('#preview_img').append(
                                        img); //append image to output element
                                };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });

                } else {
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });
    </script>
@endsection
