@extends('admin.body.main_layout')

@section('title', 'Website Settings')
@section('content')

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Website Settings</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->


        @if (auth()->user()->can('meta.translation'))
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Update Website Frontend Settings</h4>

                            <div class="row mt-3">
                                <div class="col-lg-6">
                                    <form action="{{ route('admin.web_settings_trnslt') }}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="form-group mb-3 col-lg-6">
                                                <div class="form-check form-switch">
                                                    <label class="form-check-label" for="translation">Website
                                                        Translation</label>
                                                    <input type="checkbox" value="1" class="form-check-input"
                                                        name="translation"
                                                        @if (translatable()) {{ 'checked' }} @endif
                                                        id="translation">
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit"
                                            class="btn btn-primary waves-effect waves-light">Update</button>
                                    </form>
                                </div> <!-- end col -->
                            </div>
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
                        <h4 class="header-title">Update Website Backend Settings</h4>

                        <div class="row mt-3">
                            <div class="col-lg-6">
                                <form action="{{ route('admin.web_settings_backend') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group mb-3 col-lg-6">

                                            <div class="form-check form-switch">
                                                <label class="form-check-label" for="dark_mode">Dark Mode</label>
                                                <input type="checkbox" class="form-check-input" name="dark_mode"
                                                    value="1" id="dark_mode"
                                                    @if (auth()->user()->dark_mode) {{ 'checked' }} @endif>
                                            </div>

                                            <div class="form-check form-switch mt-2">
                                                <label class="form-check-label" for="top_bar_dark">Top Bar Dark</label>
                                                <input type="checkbox" class="form-check-input" name="top_bar_dark"
                                                    value="1" id="top_bar_dark"
                                                    @if (auth()->user()->top_bar_dark) {{ 'checked' }} @endif>
                                            </div>

                                            <div class="form-check form-switch mt-2">
                                                <label class="form-check-label" for="boxed_layout">Boxed Layout</label>
                                                <input type="checkbox" class="form-check-input" name="boxed_layout"
                                                    value="1" id="boxed_layout"
                                                    @if (auth()->user()->boxed_layout) {{ 'checked' }} @endif>
                                            </div>

                                            <div class="form-check form-switch mt-2">
                                                <label class="form-check-label" for="sidebar_user_info">Sidebar User
                                                    Info</label>
                                                <input type="checkbox" class="form-check-input" name="sidebar_user_info"
                                                    value="1" id="sidebar_user_info"
                                                    @if (auth()->user()->sidebar_user_info) {{ 'checked' }} @endif>
                                            </div>


                                            <div class="mt-3">
                                                <h5>Left Sidebar Color</h5>
                                                <div class="form-check">
                                                    <input type="radio" id="left_sidebar_color1" name="left_sidebar_color"
                                                        value="light" class="form-check-input"
                                                        @if (auth()->user()->left_sidebar_color == 'light') {{ 'checked' }} @endif>
                                                    <label class="form-check-label" for="left_sidebar_color1">Light </label>
                                                </div>
                                                <div class="form-check mt-1">
                                                    <input type="radio" id="left_sidebar_color2" name="left_sidebar_color"
                                                        value="dark" class="form-check-input"
                                                        @if (auth()->user()->left_sidebar_color == 'dark') {{ 'checked' }} @endif>
                                                    <label class="form-check-label" for="left_sidebar_color2">Dark </label>
                                                </div>
                                                <div class="form-check mt-1">
                                                    <input type="radio" id="left_sidebar_color3" name="left_sidebar_color"
                                                        value="brand" class="form-check-input"
                                                        @if (auth()->user()->left_sidebar_color == 'brand') {{ 'checked' }} @endif>
                                                    <label class="form-check-label" for="left_sidebar_color3">Brand </label>
                                                </div>
                                                <div class="form-check mt-1">
                                                    <input type="radio" id="left_sidebar_color4" name="left_sidebar_color"
                                                        value="gradient" class="form-check-input"
                                                        @if (auth()->user()->left_sidebar_color == 'gradient') {{ 'checked' }} @endif>
                                                    <label class="form-check-label" for="left_sidebar_color4">Gradient
                                                    </label>
                                                </div>
                                            </div>


                                            <div class="mt-3">
                                                <h5>Left Sidebar size</h5>
                                                <div class="form-check">
                                                    <input type="radio" id="left_sidebar_size1"
                                                        name="left_sidebar_size" value="default" class="form-check-input"
                                                        @if (auth()->user()->left_sidebar_size == 'default') {{ 'checked' }} @endif>
                                                    <label class="form-check-label" for="left_sidebar_size1">Default
                                                    </label>
                                                </div>
                                                <div class="form-check mt-1">
                                                    <input type="radio" id="left_sidebar_size2"
                                                        name="left_sidebar_size" value="compact" class="form-check-input"
                                                        @if (auth()->user()->left_sidebar_size == 'compact') {{ 'checked' }} @endif>
                                                    <label class="form-check-label" for="left_sidebar_size2">Compact
                                                        <small>(Small
                                                            size)</small> </label>
                                                </div>
                                                <div class="form-check mt-1">
                                                    <input type="radio" id="left_sidebar_size3"
                                                        name="left_sidebar_size" value="condensed"
                                                        class="form-check-input"
                                                        @if (auth()->user()->left_sidebar_size == 'condensed') {{ 'checked' }} @endif>
                                                    <label class="form-check-label" for="left_sidebar_size3">Condensed
                                                        <small>(Extra Small
                                                            size)</small>
                                                    </label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <button type="submit"
                                        class="btn btn-primary waves-effect waves-light">Update</button>
                                </form>
                            </div> <!-- end col -->
                        </div>



                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div><!-- end col -->
        </div>
        <!-- end row -->


    </div> <!-- container -->

@endsection
