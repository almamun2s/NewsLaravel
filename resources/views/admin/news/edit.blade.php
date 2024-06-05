@extends('admin.body.main_layout')

@section('title', 'Edit News')

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
                        <h4 class="page-title">Edit News </h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Edit News </h4>

                            <div class="row">
                                <div class="col-lg-9">
                                    <form action="{{ url("/admin/news_post/$news->id") }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="form-group mb-3">
                                            <label for="category" class="form-label">Category</label>
                                            <select id="category" class="selectize-drop-header" name="category_id"
                                                placeholder="Select a Category...">
                                                <option value="">-- Select --</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ $category->id == $news->category_id ? 'selected' : '' }}>
                                                        {{ $category->name }} </option>
                                                @endforeach
                                            </select>
                                            @error('category')
                                                <span class="text-danger">{{ $message }} </span>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="sub_category" class="form-label">Sub Category (Optional)</label>
                                            <select class="form-select" name="subcategory_id" id="sub_category">
                                                <option value="">-- Select Sub Category --</option>
                                                @foreach ($sub_categories as $sub_category)
                                                    <option value="{{ $sub_category->id }}"
                                                        {{ $sub_category->id == $news->subcategory_id ? 'selected' : '' }}>
                                                        {{ $sub_category->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="title" class="form-label">Title</label>
                                            <input type="text" name="title" id="title" class="form-control"
                                                placeholder="Write your news title here" value="{{ $news->title }}">
                                            @error('title')
                                                <span class="text-danger">{{ $message }} </span>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="wysiwyg" class="form-label">Description</label>
                                            <textarea name="details" id="wysiwyg">{{ $news->details }}</textarea>
                                            @error('details')
                                                <span class="text-danger">{{ $message }} </span>
                                            @enderror
                                        </div>

                                        <div class="row">

                                            <div class="form-group mb-3 col-lg-6">
                                                <label for="image" class="form-label">Image</label>
                                                <input type="file" name="image" id="image" class="form-control">
                                                @error('image')
                                                    <span class="text-danger">{{ $message }} </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-lg-3"></div>
                                            <div class="form-group col-lg-3">
                                                <img src="{{ $news->getImg() }}" alt="" width="100px"
                                                    id="image_preview">
                                            </div>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="tags" class="form-label">Tags</label>
                                            <input type="text" value="{{ $news->tags }}" name="tags" id="tags"
                                                class="selectize-close-btn" value="">
                                            @error('tags')
                                                <span class="text-danger">{{ $message }} </span>
                                            @enderror
                                        </div>


                                        <div class="row">
                                            <div class="col-lg-2">
                                                <div class="form-check mb-2 form-check-success">
                                                    <input class="form-check-input rounded-circle" type="checkbox"
                                                        value="1" name="breaking_news"
                                                        {{ $news->breaking_news == 1 ? 'checked' : '' }}
                                                        id="breaking_news">
                                                    <label class="form-check-label" for="breaking_news">Breaking
                                                        News</label>
                                                </div>
                                            </div>

                                            <div class="col-lg-2">
                                                <div class="form-check mb-2 form-check-success">
                                                    <input class="form-check-input rounded-circle" type="checkbox"
                                                        value="1" {{ $news->top_slider == 1 ? 'checked' : '' }}
                                                        name="top_slider" id="top_slider">
                                                    <label class="form-check-label" for="top_slider">Top Slider</label>
                                                </div>
                                            </div>

                                            <div class="col-lg-2">
                                                <div class="form-check mb-2 form-check-success">
                                                    <input class="form-check-input rounded-circle" type="checkbox"
                                                        value="1" {{ $news->section_three == 1 ? 'checked' : '' }}
                                                        name="section_three" id="section_three">
                                                    <label class="form-check-label" for="section_three">Section
                                                        three</label>
                                                </div>
                                            </div>

                                            <div class="col-lg-2">
                                                <div class="form-check mb-2 form-check-success">
                                                    <input class="form-check-input rounded-circle" type="checkbox"
                                                        value="1" {{ $news->section_nine == 1 ? 'checked' : '' }}
                                                        name="section_nine" id="section_nine">
                                                    <label class="form-check-label" for="section_nine">Section
                                                        nine</label>
                                                </div>
                                            </div>

                                            <div class="col-lg-2">
                                                <div class="form-check mb-2 form-check-success">
                                                    <input class="form-check-input rounded-circle" type="checkbox"
                                                        value="1" {{ $news->status == 'publish' ? 'checked' : '' }}
                                                        name="news_status" id="news_status">
                                                    <label class="form-check-label" for="news_status">Publish</label>
                                                </div>
                                            </div>


                                        </div>

                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Update
                                            News</button>
                                    </form>
                                </div> <!-- end col -->

                                @if (auth()->user()->can('news.delete'))
                                    <div class="col-lg-3">
                                        <form action="{{ url("admin/news_post/$news->id") }}" method="post"
                                            id="deleteForm">
                                            @csrf
                                            @method('DELETE')
                                            <input class="btn btn-outline-danger rounded-pill waves-effect waves-light"
                                                type="submit" value="Delete">
                                        </form>
                                    </div>
                                @endif


                            </div>

                            <!-- end row-->

                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div><!-- end col -->
            </div>
            <!-- end row -->

        </div> <!-- container -->
    </div> <!-- content -->

    <script>
        $(document).ready(function() {
            $('#category').change(function() {
                let category_id = $(this).val();

                $.ajax({
                    url: "{{ url('/admin/sub_category/ajax') }}/" + category_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#sub_category').html('');

                        let d = $('#sub_category').empty();

                        $.each(data, function(key, value) {
                            $('#sub_category').append('<option value="' + value.id +
                                '" >' + value.name + '</option>');
                        });
                    },
                });
            });
        });
    </script>

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
