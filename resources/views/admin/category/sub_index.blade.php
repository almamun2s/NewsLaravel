@extends('admin.body.main_layout')

@section('title', 'Sub Categories')

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
                        <h4 class="page-title">Sub Categories</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->


            @if (auth()->user()->can('category.add'))
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Add Sub Category</h4>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <form action="{{ route('admin.sub_category') }}" id="myForm" method="post">
                                            @csrf
                                            <div class="form-group mb-3">
                                                <label for="select-code-category" class="form-label">Category</label>
                                                <select id="select-code-category" class="selectize-drop-header"
                                                    name="category_id" placeholder="Select a Category...">
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }} </option>
                                                    @endforeach
                                                </select>
                                                @error('category_id')
                                                    <span class="text-danger">{{ $message }} </span>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="simpleinput" class="form-label">Sub Category Name</label>
                                                <input type="text" name="sub_category_name" autocomplete="off"
                                                    class="form-control">
                                                @error('sub_category_name')
                                                    <span class="text-danger">{{ $message }} </span>
                                                @enderror
                                            </div>
                                            <button type="submit" class="btn btn-primary waves-effect waves-light">Add Sub
                                                Category
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
            @endif

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Category</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        @if (auth()->user()->can('category.sub.edit') || auth()->user()->can('category.sub.delete'))
                                            <th>Action</th>
                                        @endif

                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($subcategories as $key => $subcategory)
                                        <tr>
                                            <td>{{ $key + 1 }} </td>
                                            <td>{{ $subcategory->category->name }} </td>
                                            <td>{{ $subcategory->name }} </td>
                                            <td>{{ $subcategory->slug }} </td>
                                            <td>
                                                @if (auth()->user()->can('category.sub.edit'))
                                                    <a href="{{ route('sub_category.edit', $subcategory->id) }}"
                                                        class="btn btn-primary rounded-pill waves-effect waves-light">Edit</a>
                                                @endif

                                                @if (auth()->user()->can('category.delete'))
                                                    <a href="{{ route('sub_category.delete', $subcategory->id) }}"
                                                        class="btn btn-danger rounded-pill waves-effect waves-light"
                                                        id="delete">Delete</a>
                                                @endif

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
