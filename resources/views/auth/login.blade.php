@extends('frontend.body.main_layout')

@section('title', 'Login')

@section('content')

    <div class="contact-page">
        <div class="container">

            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div class="contact-wrpp">
                        <h4 class="contactAddess-title text-center">Login </h4>
                        <div role="form" class="wpcf7" id="wpcf7-f437-o1" lang="en-US" dir="ltr">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        <p>{{ $error }}</p>
                                    @endforeach
                                </div>
                            @endif

                            <form action="{{ route('login') }}" method="post" class="wpcf7-form init">
                                @csrf
                                <div class="main_section">

                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="contact-title ">Email *</div>
                                            <div class="contact-form">
                                                <span class="wpcf7-form-control-wrap sub_title">
                                                    <input type="email" name="email" size="40"
                                                        class="wpcf7-form-control wpcf7-text" placeholder="Email">
                                                </span>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-sm-12">
                                            <div class="contact-title ">Password *</div>
                                            <div class="contact-form">
                                                <span class="wpcf7-form-control-wrap sub_title">
                                                    <input type="password" name="password" required size="40"
                                                        class="wpcf7-form-control wpcf7-text" placeholder="Password">
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Remember Me -->
                                    <div class="block mt-4">
                                        <label for="remember_me" class="inline-flex items-center">
                                            <input id="remember_me" type="checkbox"
                                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                                name="remember">
                                            <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                        </label>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="contact-btn">
                                                <input type="submit" value="Login Now" style="width:100%;"
                                                    class="wpcf7-form-control has-spinner wpcf7-submit">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
