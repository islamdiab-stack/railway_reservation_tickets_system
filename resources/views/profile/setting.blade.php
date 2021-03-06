@extends('layouts.app')

{{-- Title --}}
@section('title')
    Edit {{$user->name . "'s"}}
@endsection

{{-- Styles --}}
@section('other-styles')
    <style>
        .profile-setting-page {
            background-image: linear-gradient(180deg, rgba(152, 53, 78, 0.8) -2.1%, #1c1f33 90%);
        }
        .profile-setting-page .setting-info nav .nav-tabs {
            padding: 0.5rem;
            justify-content: space-around;
        }
        .profile-setting-page .setting-info nav .nav-tabs .nav-item {
            padding: 0.35rem 0.7rem;
        }

        .profile-setting-page .setting-info .tab-content .tab-pane .setting-form .card form .card-body {
            padding: 1rem;
        }
        .profile-setting-page .setting-info .tab-content .tab-pane .setting-form .card form .avatar-upload {
            max-width: 165px;
            margin: 15px auto;
        }
        .profile-setting-page .setting-info .tab-content .tab-pane .setting-form .card form .avatar-preview {
            width: 150px;
            height: 150px;
        }

    </style>
@endsection


{{-- Header --}}
@section('header')

@endsection

{{-- Content --}}
@section('content')
<section class="profile-setting-page section">
    <div class="container-fluid">

        <!-- Setting page header -->
        <div class="page-header setting-page-header text-center">
            <div class="row">
                <div class="col-12">
                    <div class="header-info">
                        <h2 class="heading m-0">Account Settings</h2>
                        <p class="m-0">Change your profile and account settings</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of setting page header -->

        <!-- Setting info -->
        <div class="setting-info">

            <div class="row">
                <div class="col-11 m-auto">
                    <!-- Navbar tabs -->
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <!-- Change Account info  -->
                            <a class="nav-item nav-link active" id="nav-account-tab"
                                data-toggle="tab" href="#nav-account" role="tab"
                                aria-controls="nav-account" aria-selected="false">
                                <!-- Icon -->
                                <div class="icon mr-1 d-inline-block">
                                    <i class="mdi mdi-account-settings"></i>
                                </div>
                                <span> Change Account Info</span>
                            </a>
                            <!-- End of Change Account info  -->

                            <!-- Change your password  -->
                            <a class="nav-item nav-link" id="nav-password-tab"
                                data-toggle="tab" href="#nav-password" role="tab"
                                aria-controls="nav-password" aria-selected="false">
                                <!-- Icon -->
                                <div class="icon mr-1 d-inline-block">
                                    <i class="mdi mdi-lock"></i>
                                </div>
                                <span>Change your Password</span>
                            </a>
                            <!-- End of Change your password  -->

                            <!-- Social Media Links -->
                            <a class="nav-item nav-link" id="nav-social-media-tab"
                                data-toggle="tab" href="#nav-social-media" role="tab"
                                aria-controls="nav-social-media" aria-selected="false">
                                <!-- Icon -->
                                <div class="icon mr-1 d-inline-block">
                                    <i class="mdi mdi-cellphone-cog"></i>
                                </div>
                                <span>Social Media links</span>
                            </a>
                            <!-- End of Social Media Links -->

                            <!-- Change your bio -->
                            <a class="nav-item nav-link" id="nav-bio-tab"
                                data-toggle="tab" href="#nav-bio" role="tab"
                                aria-controls="nav-bio" aria-selected="false">
                                <!-- Icon -->
                                <div class="icon mr-1 d-inline-block">
                                    <i class="mdi mdi-text-account"></i>
                                </div>
                                <span>Change your bio</span>
                            </a>
                            <!-- End of Change your bio -->
                        </div>
                    </nav>
                    <!-- End of Navbar tabs -->

                </div>
            </div>

            <div class="row">
                <div class="col-6 m-auto">
                    <!-- Tab content -->
                    <div class="tab-content" id="nav-tabContent">



                        <!-- Change Account information -->
                        <div class="tab-pane fade show active" id="nav-account" role="tabpanel"
                            aria-labelledby="nav-account-tab">

                            <div class="setting-form section-form">
                                <div class="card card-primary">
                                    <!-- Card header -->
                                    {{-- <div class="card-header">
                                        <h5 class="title">
                                            Account info
                                        </h5>
                                    </div> --}}
                                    <!-- End of card header -->
                                    <!-- form -->
                                    <form action="{{route('profile.update', ['id' => $user->id])}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="card-body">

                                            <!-- image -->
                                            <div class="form-group">
                                                <div class="avatar-upload">
                                                    <div class="avatar-edit">
                                                        <input type='file' id="imageUpload" name="image" accept=".png, .jpg, .jpeg" />
                                                        <label for="imageUpload">
                                                            <i class="mdi mdi-pencil"></i>
                                                        </label>
                                                    </div>
                                                    <div class="avatar-preview">
                                                        <div id="imagePreview" style="background-image: url({{asset('uploads/users/' . Auth::user()->profile->image)}});">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Name -->
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <!-- Input group -->
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <!-- Input Icon -->
                                                        <span class="input-group-text" id="name">
                                                            <i class="mdi mdi-account-outline"></i>
                                                        </span>
                                                    </div>
                                                    <!-- Input -->
                                                    <input class="form-control" type="text" id="name"
                                                        name="name" placeholder="{{trans('site.name')}}"
                                                        value="{{$user->name}}" aria-describedby="name" aria-label="name" >
                                                </div>
                                            </div>

                                            <!-- Email -->
                                            <div class="form-group m-0">
                                                <label for="email">Email</label>
                                                <!-- Input group -->
                                                <div class="input-group mb-0">
                                                    <div class="input-group-prepend">
                                                        <!-- Input Icon -->
                                                        <span class="input-group-text" id="email">
                                                            <i class="mdi mdi-email"></i>
                                                        </span>
                                                    </div>
                                                    <!-- Input -->
                                                    <input class="form-control" type="email" id="email"
                                                    name="email" placeholder="{{trans('site.type_email')}}"
                                                    value="{{$user->email}}" aria-describedby="email" aria-label="email" >
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->

                                        <div class="card-footer {{app()->getLocale() == "ar" ? "text-left" : "text-right" }}">
                                            <button type="submit" class="btn btn-primary update-btn crayons-btn">
                                                Update
                                            </button>
                                        </div>
                                    </form>
                                    <!-- End of form -->
                                </div>
                            <!-- /.card -->
                            </div>

                        </div>
                        <!-- End of Change Account information -->

                        <!-- Change your password -->
                        <div class="tab-pane fade" id="nav-password" role="tabpanel"
                            aria-labelledby="nav-password-tab">
                            <div class="setting-form section-form">
                                <div class="card card-primary">
                                    <!-- Card header -->
                                    {{-- <div class="card-header">
                                        <h5 class="title">
                                            Change your password
                                        </h5>
                                    </div> --}}
                                    <!-- End of card header -->
                                    <!-- form -->
                                    <form action="{{route('profile.update', ['id' => $user->id])}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="card-body">

                                            <!-- Password -->
                                            <div class="form-group">
                                                <label for="password">Password</label>

                                                <!-- Input Group -->
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <!-- Input icon -->
                                                        <span class="input-group-text" id="facebook">
                                                            <i class="mdi mdi-lock"></i>
                                                        </span>
                                                    </div>
                                                    <!-- Input -->
                                                    <input class="form-control" type="password" id="password"
                                                    name="password" placeholder="Enter Your Password">
                                                </div>


                                            </div>

                                            <!-- Confirm Password -->
                                            <div class="form-group m-0">
                                                <label for="confirmPassword">Confirm Password</label>

                                                <!-- Input Group -->
                                                <div class="input-group mb-0">
                                                    <div class="input-group-prepend">
                                                        <!-- Input icon -->
                                                        <span class="input-group-text" id="facebook">
                                                            <i class="mdi mdi-lock"></i>
                                                        </span>
                                                    </div>
                                                    <!-- Input -->
                                                    <input class="form-control" type="password" id="confirmPassword"
                                                    name="password_confirmation" placeholder="Confirm password ">
                                                </div>
                                            </div>

                                        </div>
                                        <!-- /.card-body -->

                                        <div class="card-footer {{app()->getLocale() == "ar" ? "text-left" : "text-right" }}">
                                            <button type="submit" class="btn btn-primary update-btn crayons-btn">
                                                Update
                                            </button>
                                        </div>
                                    </form>
                                    <!-- End of form -->
                                </div>
                            <!-- /.card -->
                            </div>
                        </div>
                        <!-- End of Change your password -->

                        <!-- Social Media Links -->
                        <div class="tab-pane fade" id="nav-social-media" role="tabpanel"
                            aria-labelledby="nav-social-media-tab">
                            <div class="setting-form section-form">
                                <div class="card card-primary">
                                    <!-- Card header -->
                                    {{-- <div class="card-header">
                                        <h5 class="title">
                                            Social Media links
                                        </h5>
                                    </div> --}}
                                    <!-- End of card header -->
                                    <!-- form start -->
                                    <form action="{{route('profile.update', ['id' => $user->id])}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="card-body">

                                            <!-- Facebook -->
                                            <div class="form-group">
                                                <label for="facebook">Facebook URL</label>
                                                <!-- Input Group -->
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <!-- Input icon -->
                                                        <span class="input-group-text" id="facebook">
                                                            <i class="mdi mdi-facebook"></i>
                                                        </span>
                                                    </div>
                                                    <!-- Input -->
                                                    <input class="form-control" type="text" id="facebook"
                                                    name="facebook" placeholder="ex: http://www.facebook.com/username"
                                                    value="{{$user->profile->facebook}}" aria-describedby="facebook" aria-label="facebook" >
                                                </div>
                                            </div>

                                            <!-- twitter -->
                                            <div class="form-group">
                                                <label for="twitter">Twitter URL</label>
                                                <!-- Input Group -->
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <!-- Input icon -->
                                                        <span class="input-group-text" id="twitter">
                                                            <i class="mdi mdi-twitter"></i>
                                                        </span>
                                                    </div>
                                                    <!-- Input -->
                                                    <input class="form-control" type="text" id="twitter"
                                                    name="twitter" placeholder="ex: http://www.twitter.com/username"
                                                    value="{{$user->profile->twitter}}" aria-describedby="twitter" aria-label="twitter" >
                                                </div>

                                            </div>
                                            <!-- linkedin -->
                                            <div class="form-group  m-0">
                                                <label for="linkedin">Linkedin URL</label>
                                                <!-- Input Group -->
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <!-- Input icon -->
                                                        <span class="input-group-text" id="linkedin">
                                                            <i class="mdi mdi-linkedin"></i>
                                                        </span>
                                                    </div>
                                                    <!-- Input -->
                                                    <input class="form-control" type="text" id="linkedin"
                                                    name="linkedin" placeholder="ex: http://www.linkedin.com/username"
                                                    value="{{$user->profile->linkedin}}" aria-describedby="linkedin" aria-label="linkedin" >
                                                </div>

                                            </div>
                                        </div>
                                        <!-- /.card-body -->

                                        <div class="card-footer {{app()->getLocale() == "ar" ? "text-left" : "text-right" }}">
                                            <button type="submit" class="btn btn-primary update-btn crayons-btn">
                                                Update
                                            </button>
                                        </div>
                                    </form>
                                    <!-- End of form -->
                                </div>
                            <!-- /.card -->
                            </div>
                        </div>
                        <!-- End of Social Media Links -->

                        <!-- Bio -->
                        <div class="tab-pane fade" id="nav-bio" role="tabpanel"
                            aria-labelledby="nav-bio-tab">
                            <div class="setting-form section-form">
                                <div class="card card-primary">
                                    <!-- Card header -->
                                    {{-- <div class="card-header">
                                        <h5 class="title">
                                            Bio
                                        </h5>
                                    </div> --}}
                                    <!-- End of card header -->
                                    <!-- form -->
                                    <form action="{{route('profile.update', ['id' => $user->id])}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="card-body">
                                            <!-- about -->
                                            <div class="form-group m-0">
                                                <label for="about">About</label>
                                                <textarea class="form-control" name="about" id="about" cols="30"
                                                rows="10" placeholder="About Here">{{$user->profile->about}}</textarea>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->

                                        <div class="card-footer {{app()->getLocale() == "ar" ? "text-left" : "text-right" }}">
                                            <button type="submit" class="btn btn-primary update-btn crayons-btn">
                                                Update
                                            </button>
                                        </div>
                                    </form>
                                    <!-- End of form -->
                                </div>
                            <!-- /.card -->
                            </div>
                        </div>
                        <!-- End of Bio -->

                    </div>
                    <!-- End of tab content -->

                </div>
            </div>

        </div>
        <!-- End of setting info -->

    </div>
</section>
@endsection

@section('other-scripts')

<!-- main script -->
<script src="{{asset('js/main.js')}}"></script>

<!-- custom script -->
<script src="{{asset('js/custom.js')}}"></script>

<script>

    $(document).ready(function(){

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUpload").change(function() {
            readURL(this);
        });
    });

</script>
@endsection
