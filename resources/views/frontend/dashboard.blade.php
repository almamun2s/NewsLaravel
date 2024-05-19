@extends('frontend.body.main_layout')

@section('title', 'Profile')

@section('content')

    <div class="contact-page">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="contact-wrpp">
                                <figure class="authorPage-image">
                                    <img alt="" src="{{ auth()->user()->getImg() }}" class="avatar avatar-96 photo"
                                        height="96" width="96" loading="lazy">
                                </figure>
                                <h1 class="authorPage-name">
                                    <a href=" "> {{ auth()->user()->fname }} {{ auth()->user()->lname }} </a>
                                </h1>
                                <h6 class="authorPage-name">{{ auth()->user()->email }}</h6>

                                <ul>
                                    @if (auth()->user()->role == 'admin')
                                        <li><a href="{{ route('admin.dashboard') }}"><b><i
                                                        class="fa-solid fa-table-columns"></i> Admin Dashboard </b></a>
                                        </li>
                                    @endif
                                    <li> <a href="{{ route('profile.cng_pwd') }}"> <b><i class="fa-solid fa-key"></i> Change
                                                Password </b> </a>
                                    </li>
                                    <li> <a href="{{ route('logout') }}"> <b><i class="fa-solid fa-right-from-bracket"></i>
                                                Log Out </b> </a> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                @if ($action == 'updateInfo')
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="contact-wrpp">
                                    <h4 class="contactAddess-title text-center">Update your information </h4>
                                    <div role="form" class="wpcf7" id="wpcf7-f437-o1" lang="en-US" dir="ltr">
                                        <div class="screen-reader-response">
                                            <p role="status" aria-live="polite" aria-atomic="true"></p>
                                            <ul></ul>
                                        </div>

                                        <form action="{{ route('profile.update') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="main_section">
                                                <div class="row">
                                                    @if (session('status'))
                                                        <div class="alert alert-success" role="alert">
                                                            {{ session('status') }}
                                                        </div>
                                                    @endif

                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="contact-title ">First Name</div>
                                                        <div class="contact-form">
                                                            <span class="wpcf7-form-control-wrap sub_title">
                                                                <input type="text" name="fname"
                                                                    value="{{ auth()->user()->fname }}"
                                                                    placeholder="First Name">
                                                                @error('fname')
                                                                    <span class="text-danger">{{ $message }} </span>
                                                                @enderror
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="contact-title ">Last Name</div>
                                                        <div class="contact-form">
                                                            <span class="wpcf7-form-control-wrap sub_title">
                                                                <input type="text" name="lname"
                                                                    value="{{ auth()->user()->lname }}"
                                                                    placeholder="Last Name">
                                                                @error('lname')
                                                                    <span class="text-danger">{{ $message }} </span>
                                                                @enderror
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="contact-title ">Email</div>
                                                        <div class="contact-form">
                                                            <span class="wpcf7-form-control-wrap sub_title">
                                                                <input type="email" name="email"
                                                                    value="{{ auth()->user()->email }}"
                                                                    placeholder="Email">
                                                                @error('email')
                                                                    <span class="text-danger">{{ $message }} </span>
                                                                @enderror
                                                            </span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="contact-title ">Phone</div>
                                                        <div class="contact-form">
                                                            <span class="wpcf7-form-control-wrap sub_title">
                                                                <input type="text" name="phone"
                                                                    value="{{ auth()->user()->phone }}"
                                                                    placeholder="Phone">
                                                                @error('phone')
                                                                    <span class="text-danger">{{ $message }} </span>
                                                                @enderror
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="contact-title ">Photo</div>
                                                        <div class="contact-form">
                                                            <span class="wpcf7-form-control-wrap sub_title">
                                                                <input type="file" name="photo" id="photo"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="contact-form">
                                                            <span class="wpcf7-form-control-wrap sub_title">
                                                                <img src="{{ auth()->user()->getImg() }}" alt="user photo"
                                                                    id="showImage" style="width:200px;max-width:100%;">
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="contact-btn">
                                                            <input type="submit" style="width:100%;"
                                                                value="Update information"
                                                                class="wpcf7-form-control has-spinner wpcf7-submit"><span
                                                                class="wpcf7-spinner"></span>
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
                @endif
                @if ($action == 'change_password')
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="contact-wrpp">
                                    <h4 class="contactAddess-title text-center">Change Password </h4>
                                    <div role="form" class="wpcf7" id="wpcf7-f437-o1" lang="en-US"
                                        dir="ltr">
                                        <div class="screen-reader-response">
                                            <p role="status" aria-live="polite" aria-atomic="true"></p>
                                            <ul></ul>
                                        </div>

                                        <form action="{{ route('profile.change_pwd') }}" method="post">
                                            @csrf
                                            <div class="main_section">
                                                <div class="row">
                                                    @if (session('status'))
                                                        <div class="alert alert-success" role="alert">
                                                            {{ session('status') }}
                                                        </div>
                                                    @endif


                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="contact-title ">Old Password</div>
                                                        <div class="contact-form">
                                                            <span class="wpcf7-form-control-wrap sub_title">
                                                                <input type="password" name="password_old">
                                                            </span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="contact-title ">New Password</div>
                                                        <div class="contact-form">
                                                            <span class="wpcf7-form-control-wrap sub_title">
                                                                <input type="password" name="password">
                                                            </span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="contact-title ">Confirm Password</div>
                                                        <div class="contact-form">
                                                            <span class="wpcf7-form-control-wrap sub_title">
                                                                <input type="password" name="password_confirmation">
                                                            </span>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="contact-btn">
                                                            <input type="submit" style="width:100%;"
                                                                value="Update Password"
                                                                class="wpcf7-form-control has-spinner wpcf7-submit"><span
                                                                class="wpcf7-spinner"></span>
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
                @endif
            </div> <!--  // end row -->
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#photo').change(function(e) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            })

        });
    </script>
@endsection
