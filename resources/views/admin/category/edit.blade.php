@extends('admin.body.main_layout')

@section('title', 'Edit Categories')

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
                        <h4 class="page-title">Categories</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Edit Category</h4>

                            <div class="row">
                                <div class="col-lg-6">
                                    <form action="{{ route('category.edit', $category->id ) }}" id="myForm" method="post">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <label for="simpleinput" class="form-label">Category Name</label>
                                            <input type="text" name="category_name" autocomplete="off" value="{{ $category->name }}"
                                                class="form-control">
                                            @error('category_name')
                                                <span class="text-danger">{{ $message }} </span>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Update Category
                                        </button>
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



    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    category_name: {
                        required: true,
                    },
                },
                messages: {
                    category_name: {
                        required: 'Please Enter Category Name',
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>


@endsection
