@extends('layouts.master')

@section('title') {{ 'শিক্ষক ভিউ' }} @endsection

@section('content')

@component('components.breadcrumb')
    @slot('li_1') শিক্ষক ভিউ @endslot
    @slot('title') শিক্ষক তথ্য  @endslot
@endcomponent

<!-- Teacher view with full details -->

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-body">
                    <div class="card-inner-text">
                        <div class="teacher-img m-auto text-center mb-3">
                            <img src="{{ asset($user->avatar) }}" alt="{{ $user->name }}" class="img-fluid rounded-circle" width="100">
                        </div>
                        <div class="teacher-details">
                            <table class="table border">
                                <tbody>
                                    <tr class="bg-light">
                                        <td colspan="3"><h5>বেসিক তথ্য</h5></td>
                                    </tr>
                                    <tr>
                                        <td scope="col">নাম</td>
                                        <td scope="col">:</td>
                                        <td scope="col">{{ $user->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>শিক্ষক আইডি</td>
                                        <td>:</td>
                                        <td>{{ $user->studentid }}</td>
                                    </tr>
                                    <tr>
                                        <td>শিক্ষক ই-মেইল </td>
                                        <td>:</td>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                    <tr>
                                        <td>শিক্ষক একাউন্ট ভেরিফাইড </td>
                                        <td>:</td>
                                        <td>
                                            @if( !is_null($user->email_verified_at) )
                                            <span class="text-success">ভেরিফাইড</span>
                                            @else
                                            <span class="text-danger">ভেরিফাইড নয়</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>শিক্ষক মোবাইল নং </td>
                                        <td>:</td>
                                        <td>{{ $user->phone }}</td>
                                    </tr>
                                    <tr>
                                        <td>শিক্ষক ঠিকানা </td>
                                        <td>:</td>
                                        <td>{{ $user->address }}</td>
                                    </tr>
                                    <tr>
                                        <td>শিক্ষক জন্ম-তারিখ </td>
                                        <td>:</td>
                                        <td>{{ date('d M, Y', strtotime($user->dob )) }}</td>
                                    </tr>
                                    <tr class="bg-light">
                                        <td colspan="3"><h5>শিক্ষাগত অভিজ্ঞতা</h5></td>
                                    </tr>
                                    @foreach( $Education as $key => $edudata )
                                    <tr>
                                        <td>পরীক্ষার নাম </td>
                                        <td>:</td>
                                        <td>
                                            @if($edudata->ExamName == 1)
                                                <span>SSC</span>
                                            @elseif($edudata->ExamName == 2)
                                                <span>HSC</span>
                                            @elseif($edudata->ExamName == 3)
                                                <span>B.Sc(Engineering/Architecture)</span>
                                            @elseif($edudata->ExamName == 4)
                                                <span>B.Sc(Agricultural Science)</span>
                                            @elseif($edudata->ExamName == 5)
                                                <span>M.B.B.S./B.D.S</span>
                                            @elseif($edudata->ExamName == 6)
                                                <span>Honors</span>
                                            @elseif($edudata->ExamName == 7)
                                                <span>Pass Course</span>
                                            @elseif($edudata->ExamName == 8)
                                                <span>Fazil</span>
                                            @elseif($edudata->ExamName == 9)
                                                <span>Graduation Equivalent</span>
                                            @endif
                                               
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> প্রতিষ্ঠানের নাম </td>
                                        <td>:</td>
                                        <td>{{ $edudata->InstituteName }}</td>
                                    </tr>
                                    <tr>
                                        <td> পাশের সন </td>
                                        <td>:</td>
                                        <td>{{ $edudata->PassingYear }}</td>
                                    </tr>
                                    @endforeach
                                    <tr class="bg-light">
                                        <td colspan="3"><h5>কাজের অভিজ্ঞতা</h5></td>
                                    </tr>
                                    @foreach( $Experiece as $key => $exdata )
                                    <tr>
                                        <td> প্রতিষ্ঠানের নাম </td>
                                        <td>:</td>
                                        <td>{{ $exdata->InstituteName }}</td>
                                    </tr>
                                    <tr>
                                        <td> শুরু তারিখ </td>
                                        <td>:</td>
                                        <td>{{ $exdata->from_date }}</td>
                                    </tr>
                                    <tr>
                                        <td> শেষ তারিখ </td>
                                        <td>:</td>
                                        <td>{{ $exdata->end_date }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="card-footer-data text-center m-auto justify-content-center">
                            <a href="{{ route('teacher.manage') }}" class="btn btn-dark">পেছনে</a>
                            @if( $user->status == 1 )
                            <a href="{{ route('teacher.status', $user->id) }}" class="btn btn-danger suspend">সাসপেন্ড করুন</a>
                            @else
                            <a href="{{ route('teacher.status', $user->id) }}" class="btn btn-info suspend">সক্রিয় করুন</a>
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('.suspend').on('click', function() {
            $(".suspend").attr("disabled", true);
            $(".suspend").text("প্রসেসিং ...");
            $('.suspend').append('<div class="spinner-border spinner-border-sm"></div>')
        });
    });

     $(document).ready(function(e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        if( $user->status == 1 )
        {
            let href = $(this).attr('href');
        }
        else if( $user->status == 0)
        {
            let href = $(this).attr('href');
        }

        $.ajax({    
              type: 'GET',
              url: href,
              success:function(res){
                if(res.success){
                    toastr.success(res.message);
                  }
              },
              error:function (res){
                    console.log("error");
                }
          });
    });
</script>
@endsection