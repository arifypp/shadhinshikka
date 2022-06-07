@extends('layouts.master-without-nav')

@section('title')
    @lang('translation.Register')
@endsection
@section('css')
    <link href="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('body')

    <body>
    @endsection

    @section('content')

        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-8">
                        <div class="card overflow-hidden">
                            <div class="bg-primary bg-soft">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-primary p-4">
                                            <h5 class="text-primary">রেজিস্ট্রেশন করুন</h5>
                                            <p>আপনার ফ্রি একাউন্ট তৈরি করে ফেলুন, স্বাধীন শিক্ষাতে.</p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end text-right" style="text-align:right; opacity: .8">
                                        <img src="{{ '/storage/'.LOGO_PATH.config('settings.favicon') }}" alt="" class="img-fluid" width="40%">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div>
                                    <a href="{{ route('home') }}">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="{{ '/storage/'.LOGO_PATH.config('settings.favicon') }}" alt=""
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
                                    <form method="POST" class="form-horizontal" action='{{ url("register/$url") }}' enctype="multipart/form-data">
                                    @else
                                    <form method="POST" class="form-horizontal" action="{{ route('register') }}" enctype="multipart/form-data">
                                    @endisset
                                        @csrf
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                <div class="mb-3">
                                                    <label for="first-name" class="form-label">ডাক নাম</label>
                                                    <input type="text" class="form-control @error('firstname') is-invalid @enderror"
                                                    value="{{ old('firstname') }}" id="firstname" name="firstname" autofocus required
                                                        placeholder="আপনার ডাক নাম লিখুন">
                                                    @error('firstname')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label for="useremail" class="form-label">আপনার ই-মেইল</label>
                                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="useremail"
                                                    value="{{ old('email') }}" name="email" placeholder="আপনার ই-মেইল লিখুন" autofocus required>
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label for="first-name" class="form-label">বাড়ি / হোল্ডিং / রাস্তা / গ্রাম</label>
                                                    <input type="text" class="form-control @error('address1') is-invalid @enderror"
                                                    value="{{ old('address1') }}" id="address1" name="address1" autofocus required
                                                        placeholder="আপনার ঠিকানা লিখুন">
                                                    @error('address1')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label for="first-name" class="form-label">জেলা</label>
                                                    <select name="city" id="district" class="form-control">
                                                        <option value="0">জেলা পছন্দ করুন</option>
                                                    </select>
                                                    @error('city')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label for="userpassword" class="form-label">পাসওর্য়াড</label>
                                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="userpassword" name="password"
                                                        placeholder="আপনার কাঙ্খিত পাসওর্য়াড দিন" autofocus required>
                                                        @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label for="userdob">জন্ম তারিখ</label>
                                                    <div class="input-group" id="datepicker1">
                                                        <input type="text" class="form-control @error('dob') is-invalid @enderror" placeholder="dd-mm-yyyy"
                                                            data-date-format="dd-mm-yyyy" data-date-container='#datepicker1' data-date-end-date="0d" value="{{ old('dob') }}"
                                                            data-provide="datepicker" name="dob" autofocus required autocomplete="off">
                                                        <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                        @error('dob')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>
                                            
                                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">

                                                <div class="mb-3">
                                                    <label for="last-name" class="form-label">সম্পূর্ণ নাম</label>
                                                    <input type="text" class="form-control @error('lastname') is-invalid @enderror"
                                                    value="{{ old('lastname') }}" id="lastname" name="lastname" autofocus required
                                                        placeholder="আপনার পুরো নাম লিখুন">
                                                    @error('lastname')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label for="phone" class="form-label">মোবাইল</label>
                                                    <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                                    value="{{ old('phone') }}" id="phone" name="phone" autofocus required
                                                        placeholder="আপনার মোবাইল নাম্বাার দিন">
                                                    @error('phone')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label for="first-name" class="form-label">বিভাগ</label>
                                                    <select name="state" id="division" class="form-control">
                                                        <option value="0">বিভাগ নিবার্চন করুন</option>
                                                    <!-- all division here -->
                                                    @foreach( $divisions as $division )
                                                        <option value="{{ $division->id }}">{{ $division->bn_name }}</option>
                                                    @endforeach
                                                    </select>
                                                    @error('address1')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label for="first-name" class="form-label">থানা</label>
                                                    <select name="thana" id="thana" class="form-control">
                                                        <option value="0">থানা নির্বাচন করুন</option>
                                                    </select>
                                                    @error('thana')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label for="confirmpassword" class="form-label">কনফার্ম পাসওর্য়াড</label>
                                                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="confirmpassword" name="password_confirmation"
                                                    name="password_confirmation" placeholder="কনফার্ম পাসওয়ার্ড দিন" autofocus required>
                                                    @error('password_confirmation')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label for="avatar">প্রোফাইল ফটো</label>
                                                    <div class="input-group">
                                                        <input type="file" class="form-control @error('avatar') is-invalid @enderror" id="inputGroupFile02" name="avatar" autofocus required>
                                                        <label class="input-group-text" for="inputGroupFile02">আপলোড দিন</label>
                                                    </div>
                                                    @error('avatar')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                        
                                            </div>
                                        </div>

                                        <div class="mt-4 d-grid">
                                            <button class="btn btn-primary waves-effect waves-light"
                                                type="submit">সাবমিট করুন</button>
                                        </div>

                                        <!-- <div class="mt-4 text-center">
                                            <h5 class="font-size-14 mb-3">Sign up using</h5>

                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <a href="#"
                                                        class="social-list-item bg-primary text-white border-primary">
                                                        <i class="mdi mdi-facebook"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="#"
                                                        class="social-list-item bg-info text-white border-info">
                                                        <i class="mdi mdi-twitter"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="#"
                                                        class="social-list-item bg-danger text-white border-danger">
                                                        <i class="mdi mdi-google"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div> -->

                                        <div class="mt-4 text-center">
                                            <p class="mb-0">আপনি কি  Shahdhin Shikkha <a href="#"
                                                    class="text-primary">শর্তাবালীর সাথে একমত?</a></p>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                        <div class="mt-5 text-center">

                            <div>
                                <p>একাউন্ট তৈরি আছে ? 
                                @isset($url)
                                    <a href='{{ url("login/$url") }}' class="fw-medium text-primary">
                                        লগইন করুন</a>
                                @else
                                <a href="{{ url('login/student') }}" class="fw-medium text-primary">
                                        লগইন করুন</a>
                                @endisset
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
        </div>

    @endsection
@section('script')
<script src="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script>
    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            toastr.error("{{ $error }}");
        @endforeach
    @endif
</script>

<script>

$("#division").on('change',function(e){
  e.preventDefault();
  var ddlDistrict=$("#district");
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $.ajax({
    type:'POST',
    url: "{{url('/district-by-division')}}",
    data:{_token:$('input[name=_token]').val(),division:$(this).val()},
    success:function(response){
        // var jsonData=JSON.parse(response);

        $('option', ddlDistrict).remove();
        $('#district').append('<option value="">--Select District--</option>');
        $.each(response, function(){
          $('<option/>', {
            'value': this.id,
            'text': this.bn_name
          }).appendTo('#district');
        });
      }
  });
});

$("#district").on('change',function(e){
  e.preventDefault();
  var ddlthana=$("#thana");
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $.ajax({
    type:'POST',
    url: "{{url('/thana-by-district')}}",
    data:{_token:$('input[name=_token]').val(),districts:$(this).val()},
    success:function(response){

        // var jsonData=JSON.parse(response);

        $('option', ddlthana).remove();
        $('#thana').append('<option value="">--Select Thana--</option>');
        $.each(response, function(){
          $('<option/>', {
            'value': this.id,
            'text': this.bn_name
          }).appendTo('#thana');
        });
      }
    });
});

</script>
@endsection
