@extends('layouts.master-without-nav')

@section('title')
    @lang('translation.Login')
@endsection

@section('body')

    <body>
    @endsection

    @section('content')
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-primary bg-soft">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-primary p-4">
                                            <h5 class="text-primary">স্বাগতম আবারও !</h5>
                                            <p>{{ isset($url) ? ucwords($url) : " " }} সাইন ইন করুন.</p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="{{ URL::asset('/assets/images/profile-img.png') }}" alt=""
                                            class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="auth-logo">
                                    <a href="index" class="auth-logo-light">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="{{ URL::asset('/assets/images/logo-light.svg') }}" alt=""
                                                    class="rounded-circle" height="34">
                                            </span>
                                        </div>
                                    </a>

                                    <a href="index" class="auth-logo-dark">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="{{ URL::asset('/assets/images/favicon.ico') }}" alt=""
                                                    class="rounded-circle" height="50">
                                            </span>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-2">
                                @if (session()->has('notification'))
                                    <div class="notification">
                                        {!! session('notification') !!}
                                    </div>
                                @endif
                                @isset($url)
                                <form class="form-horizontal" method="POST" action='{{ url("login/$url") }}'>
                                @else
                                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                @endisset
                                        @csrf
                                        <div class="mb-3">
                                            <label for="username" class="form-label">ই-মেইল</label>
                                            <input name="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" id="username"
                                                placeholder="ই-মেইল লিখুন" autocomplete="email" autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">পাসওর্য়াড</label>
                                            <div
                                                class="input-group auth-pass-inputgroup @error('password') is-invalid @enderror">
                                                <input type="password" name="password"
                                                    class="form-control  @error('password') is-invalid @enderror"
                                                    id="userpassword" placeholder="পাসওয়ার্ড দিন"
                                                    aria-label="Password" aria-describedby="password-addon">
                                                <button class="btn btn-light " type="button" id="password-addon"><i
                                                        class="mdi mdi-eye-outline"></i></button>
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="remember"
                                                {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="remember">
                                                আমাকে মনে রাখবেন
                                            </label>
                                        </div>

                                        <div class="mt-3 d-grid">
                                            <button class="btn btn-primary waves-effect waves-light" type="submit">লগইন করুন</button>
                                        </div>

                                        <div class="mt-4 text-center">
                                            @if (Route::has('password.request'))
                                                <a href="{{ route('password.request') }}" class="text-muted"><i
                                                        class="mdi mdi-lock me-1"></i> পাসওয়ার্ড ভুলে গিয়েছি?</a>
                                            @endif

                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                        @if( $url == 'student' )
                        <div class="mt-5 text-center">

                            <div>
                                <p>আমরা একাউন্ট নেই ? 
                                    @isset($url) 
                                        
                                        <a href='{{ url("register/$url") }}' class="fw-medium text-primary">
                                        রেজিস্ট্রেশন করুন</a>
                                       
                                    @else
                                    <a href="{{ url('register/student') }}" class="fw-medium text-primary">
                                            রেজিস্ট্রেশন করুন</a>
                                    @endisset
                                    </p>
                                <p>© <script>
                                        document.write(new Date().getFullYear())

                                    </script> স্বাধীন শিক্ষা. ডিজাইন এবং ডেভেলোপমেন্ট <i class="mdi mdi-heart text-danger"></i> স্বাধীন শিক্ষা টিম
                                </p>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- end account-pages -->

    @endsection
@section('script')
<script>
    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            toastr.error("{{ $error }}");
        @endforeach
    @endif
</script>
@endsection