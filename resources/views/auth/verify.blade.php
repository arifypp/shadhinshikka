@extends('layouts.master-without-nav')

@section('title')
    ভেরিফাই ই-মেইল অ্যাড্রেস
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
                                            <h5 class="text-primary"> ভেরিফাই ই-মেইল অ্যাড্রেস</h5>
                                            <p>আপনার ই-মেইল ভেরিফাই করুন.</p>
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

                                @if (session('resent'))
                                    <div class="alert alert-success" role="alert">
                                        {{ __('নতুন একটি ই-মেইল প্রেরণ করা হয়েছে, ধন্যবাদ!') }}
                                    </div>
                                @endif

                                {{ __('ই-মেইল রিসেন্ড বাটনে প্রেস করার আগে অবশ্যই চেক করবেন, আপনার দেওয়া ই-মেইল সঠিক নাকি ভুল। যেকোনো প্রয়োজনে আমাদেরকে ই-মেইল করতে পরেন info@shadhinshikkha.com') }}
                                <div class="p-2">
                                    <form class="form-horizontal" method="POST" action="{{ route('verification.resend') }}">
                                        @csrf

                                        <div class="text-end">
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" class="btn btn-danger w-md waves-effect waves-light"
                                                >{{ __('লগ আউট করুন') }}</a>
                                            
                                                <button class="btn btn-primary w-md waves-effect waves-light"
                                                type="submit">{{ __('নতুন ইমেইল প্রেরণ করুন') }}</button>
                                        </div>
                                        
                                    </form>
                                    <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>

                            </div>
                        </div>
                        <div class="mt-5 text-center">
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
