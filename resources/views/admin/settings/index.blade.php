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



        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Update Website Settings</h4>

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
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
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
