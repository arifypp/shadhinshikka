@extends('layouts.master-without-nav')

@section('title')
    Confirm Password
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
                                            <h5 class="text-primary"> পাসওর্য়াড কনফার্ম করুন</h5>
                                            <p>কনফার্ম আপনার পাসওর্য়াড.</p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end text-right" style="text-align:right; opacity: .8">
                                        <img src="{{ '/storage/'.LOGO_PATH.config('settings.favicon') }}" alt="" class="img-fluid" width="60%">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div>
                                    <a href="index">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                            <img src="{{ '/storage/'.LOGO_PATH.config('settings.favicon') }}" alt="" class="rounded-circle" height="60">
                                            </span>
                                        </div>
                                    </a>
                                </div>

                                <div class="p-2">
                                    <form class="form-horizontal" method="POST" action="{{ route('password.confirm') }}">
                                        @csrf

                                        <div class="mb-3">
                                            <label for="userpassword">Password</label>
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                id="userpassword" placeholder="Enter password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="text-end">
                                            <button class="btn btn-primary w-md waves-effect waves-light"
                                                type="submit">Confirm Password</button>
                                        </div>

                                        <div class="mt-4 text-center">
                                            @if (Route::has('password.request'))
                                                <a href="{{ route('password.request') }}" class="text-muted"><i
                                                        class="mdi mdi-lock me-1"></i> Forgot your password?</a>
                                            @endif

                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <p>মনে থাকলে ? <a href="{{ url('login/student') }}" class="fw-medium text-primary"> লগইন করুন</a>
                            </p>
                            <p>© <script>
                                        document.write(new Date().getFullYear())

                                    </script> স্বাধীন শিক্ষা. ডিজাইন এবং ডেভেলোপমেন্ট <i class="mdi mdi-heart text-danger"></i> স্বাধীন শিক্ষা টিম
                                </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    @endsection
