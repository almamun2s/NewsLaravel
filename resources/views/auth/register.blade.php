@extends('frontend.body.main_layout')

@section('title', 'Login')

@section('content')

    <div class="contact-page">
        <div class="container">

            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div class="contact-wrpp">
                        <h4 class="contactAddess-title text-center">Register </h4>
                        <div role="form" class="wpcf7" id="wpcf7-f437-o1" lang="en-US" dir="ltr">
                            <div class="screen-reader-response">
                                <p role="status" aria-live="polite" aria-atomic="true"></p>
                                <ul></ul>
                            </div>

                            <form action="{{ url('/register') }}" method="post" class="wpcf7-form init">
                                @csrf
                                <div class="main_section">

                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="contact-title ">First Name</div>
                                            <div class="contact-form">
                                                <span class="wpcf7-form-control-wrap sub_title">
                                                    <input type="text" name="fname" size="40"
                                                        class="wpcf7-form-control wpcf7-text" placeholder="First Name">
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12">
                                            <div class="contact-title ">Last Name</div>
                                            <div class="contact-form">
                                                <span class="wpcf7-form-control-wrap sub_title">
                                                    <input type="text" name="lname" size="40"
                                                        class="wpcf7-form-control wpcf7-text" placeholder="Last Name">
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12">
                                            <div class="contact-title ">Username</div>
                                            <div class="contact-form">
                                                <span class="wpcf7-form-control-wrap sub_title">
                                                    <input type="text" name="username" size="40"
                                                        class="wpcf7-form-control wpcf7-text" placeholder="Username">
                                                </span>
                                            </div>
                                        </div>
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
                                        <div class="col-md-12 col-sm-12">
                                            <div class="contact-title ">Confirm Password *</div>
                                            <div class="contact-form">
                                                <span class="wpcf7-form-control-wrap sub_title">
                                                    <input type="password" name="password_confirmation" required
                                                        size="40" class="wpcf7-form-control wpcf7-text"
                                                        placeholder="Confirm Password">
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="contact-btn">
                                                <input type="submit" value="register Now" style="width:100%;"
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
