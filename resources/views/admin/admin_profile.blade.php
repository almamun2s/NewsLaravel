@extends('admin.body.main_layout')

@section('title', 'Profile')

@section('content')

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">UBold</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Contacts</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Profile</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-4 col-xl-4">
                <div class="card text-center">
                    <div class="card-body">
                        <img src="{{ auth()->user()->getImg() }}" class="rounded-circle avatar-lg img-thumbnail"
                            alt="profile-image">

                        <h4 class="mb-0">{{ auth()->user()->fname }} {{ auth()->user()->lname }} </h4>
                        <p class="text-muted">{{ auth()->user()->username }} </p>

                        <button type="button" class="btn btn-success btn-xs waves-effect mb-2 waves-light">Follow</button>
                        <button type="button" class="btn btn-danger btn-xs waves-effect mb-2 waves-light">Message</button>

                        <div class="text-start mt-3">
                            <h4 class="font-13 text-uppercase">About Me :</h4>
                            <p class="text-muted font-13 mb-3">
                                Hi I'm Johnathn Deo,has been the industry's standard dummy text ever since the 1500s, when
                                an unknown printer took a galley of type.
                            </p>
                            <p class="text-muted mb-2 font-13"><strong>Full Name :</strong> <span
                                    class="ms-2">{{ auth()->user()->fname }} {{ auth()->user()->lname }}</span></p>

                            <p class="text-muted mb-2 font-13"><strong>Mobile :</strong><span
                                    class="ms-2">{{ auth()->user()->phone }}</span></p>

                            <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span
                                    class="ms-2">{{ auth()->user()->email }}</span></p>
                        </div>
                    </div>
                </div> <!-- end card -->
            </div> <!-- end col-->

            <div class="col-lg-8 col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <div class="tab-content">
                            <form action="{{ route('admin.profile.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Personal
                                    Info</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="firstname" class="form-label">First Name</label>
                                            <input type="text" name="fname" class="form-control"
                                                placeholder="Enter first name" value="{{ auth()->user()->fname }}">
                                            @error('fname')
                                                <p class="text-danger mt-2">{{ $message }} </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="lastname" class="form-label">Last Name</label>
                                            <input type="text" name="lname" class="form-control"
                                                placeholder="Enter last name" value="{{ auth()->user()->lname }}">
                                            @error('lname')
                                                <p class="text-danger mt-2">{{ $message }} </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control"
                                                placeholder="Enter your email" value="{{ auth()->user()->email }}">
                                            @error('email')
                                                <p class="text-danger mt-2">{{ $message }} </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Mobile</label>
                                            <input type="number" name="phone" class="form-control"
                                                placeholder="Enter your Phone" value="{{ auth()->user()->phone }}">
                                            @error('phone')
                                                <p class="text-danger mt-2">{{ $message }} </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="photo" class="form-label">Profile Picture</label>
                                            <input type="file" name="photo" class="form-control" id="photo"
                                                placeholder="Enter your Phone">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <img src="{{ auth()->user()->getImg() }}"
                                                class="rounded-circle avatar-lg img-thumbnail" alt="profile-image"
                                                id="showImage">
                                        </div>
                                    </div>
                                </div> <!-- end row -->

                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="userbio" class="form-label">Bio</label>
                                            <textarea class="form-control" id="userbio" rows="4" placeholder="Write something..."></textarea>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->

                                <div class="text-end">
                                    <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i
                                            class="mdi mdi-content-save"></i> Save</button>
                                </div>
                            </form>
                            <!-- end settings content-->

                        </div> <!-- end tab-content -->
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <form action="{{ route('admin.change_pwd') }}" method="POST">
                                @csrf
                                <h5 class="mb-4 text-uppercase"><i class="mdi mdi-key me-1"></i> Change
                                    Password </h5>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="password_old" class="form-label">Current Password</label>
                                            <div class="input-group input-group-merge">
                                                <input type="text" class="form-control" name="password_old"
                                                    placeholder="Enter Current Password">
                                                <div class="input-group-text show-password" data-password="true">
                                                    <span class="password-eye"></span>
                                                </div>
                                            </div>
                                            @error('password_old')
                                                <p class="text-danger mt-2">{{ $message }} </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="password" class="form-label">New Password</label>
                                            {{-- <input type="password" name="password" class="form-control"
                                                placeholder=""> --}}
                                            <div class="input-group input-group-merge">
                                                <input type="text" class="form-control" name="password"
                                                    placeholder="Enter New Password">
                                                <div class="input-group-text show-password" data-password="true">
                                                    <span class="password-eye"></span>
                                                </div>
                                            </div> @error('password')
                                                <p class="text-danger mt-2">{{ $message }} </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="password_confirmation" class="form-label">Retype Password</label>
                                            <div class="input-group input-group-merge">
                                                <input type="text" class="form-control" name="password_confirmation"
                                                    placeholder="Enter New Password again">
                                                <div class="input-group-text show-password" data-password="true">
                                                    <span class="password-eye"></span>
                                                </div>
                                            </div>
                                            @error('password_confirmation')
                                                <p class="text-danger mt-2">{{ $message }} </p>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i
                                            class="mdi mdi-content-save"></i> Save</button>
                                </div>
                            </form>
                            <!-- end settings content-->

                        </div> <!-- end tab-content -->
                    </div>
                </div> <!-- end card-->

            </div> <!-- end col -->
        </div>
        <!-- end row-->

    </div> <!-- container -->

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
