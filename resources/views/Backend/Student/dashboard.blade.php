@extends('layouts.master')

@section('title') @lang('translation.Dashboards') @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') Dashboards @endslot
        @slot('title') Dashboard @endslot
    @endcomponent

    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                <!-- Warning for admission -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-12 my-1">
                    <form action="{{ route('student.course.payment') }}" method="post" id="submitdata">
                        @csrf
                        @foreach( $admissions as $adm )
                        @if( $adm->status === 'inactive' )
                            <div class="admission-warning alert alert-danger">
                                <span> {{ __('আপনার অ্যাডমিশন এখনো একটিভ হয়নি। অনুগ্রহ করে অপেক্ষা করুন ধন্যবাদ।') }} </span>
                            </div>
                        @endif
                        <input type="hidden" name="admission_id" value="{{ $adm->id }}">
                        <input type="hidden" name="user_id" value="{{ $adm->users_id }}">
                        @endforeach
                        {{ App\Models\Common\Admission::payment_progress() }}
                    </form>
                    
                </div>
                <div class="col-md-4">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body">
                                    <p class="text-muted fw-medium">{{ __('Total Purchase Course') }} </p>
                                    <h4 class="mb-0">
                                        {{ App\Models\User::purchaseCounter() }}
                                    </h4>
                                </div>

                                <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                    <span class="avatar-title">
                                        <i class="bx bx-copy-alt font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body">
                                    <p class="text-muted fw-medium">{{ __('Total Paid') }}</p>
                                    <h4 class="mb-0">
                                    {{ App\Models\User::paidCounter() }}
                                    
                                    </h4>
                                </div>

                                <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                    <span class="avatar-title rounded-circle bg-primary">
                                        <i class="bx bx-archive-in font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body">
                                    <p class="text-muted fw-medium">{{ __('All Courses') }}</p>
                                    <h4 class="mb-0">
                                        {{ App\Models\User::admissioncount() }}
                                    </h4>
                                </div>

                                <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                    <span class="avatar-title rounded-circle bg-primary">
                                        <i class="bx bx-purchase-tag-alt font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- Course module -->
                @foreach( $courses as $course )
                <div class="col-xl-4">
                    <div class="card student-courses">
                        <div class="card-header bg-primary">
                            <h5 class="text-white p-0 m-0"><i class="bx bx-copy"></i> {{ $course->name }}</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush p-0">
                            @php 
                                $itemlist = App\Models\Backend\Admin\CourseItem::where('cicourse_id', $course->id)->get();
                            @endphp
                            @foreach( $itemlist as $items )
                            <li class="list-group-item"> <i class="bx bx-chevrons-right"></i> {{ $items->name }} </li>
                            @endforeach
                            </ul>
                        </div>
                        <div class="card-footer bg-dark text-center text-white">
                            <ul class="list-inline m-2">
                            @if(in_array($course->id, $admissions->pluck('courses_id')->toArray()))
                                @foreach($admissions as $admission)
                                    <!-- {{-- If the course is active --}} -->
                                    @if($admission->courses_id == $course->id)
                                        @if($admission->status == 'active')
                                            <li class="list-inline-item">
                                                <a href="{{ route('access.course', $course->slug) }}" class="btn btn-warning btn-sm"><h5 class="p-0 m-0 text-white"> {{ __('Continue Course') }}</h5></a>
                                            </li>
                                        @endif
                                    @else
                                    <!-- {{-- If the course is not active --}} -->
                                        <li class="list-inline-item">
                                            <a href="javascript:void(0)" class="btn btn-info btn-sm"><h5 class="p-0 m-0 text-white"> {{ __('Admitted') }}</h5></a>
                                        </li>
                                    @endif
                                @endforeach
                            @else        
                                <!-- {{-- User has not purchased the course --}} -->
                                <li class="list-inline-item">
                                    <a href="{{ route('purchase.course', $course->slug) }}" class="btn btn-info btn-sm"><h5 class="p-0 m-0 text-white"> {{ __('Admission Now') }}</h5></a>
                                </li>
                                <li class="list-inline-item">{{ __('Price') }}: ৳{{ number_format( $course->price , 0 , '.' , ',' ) }} BDT</li>
                            @endif
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
        </div>
    </div>
    <!-- end row -->

@endsection
@section('script')
    <!-- apexcharts -->
    <script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- dashboard init -->
    <script src="{{ URL::asset('/assets/js/pages/dashboard.init.js') }}"></script>

    <script>
        $(document).ready(function() {
            $(document).on('submit', 'form', function() {
                $('button').attr('disabled', 'disabled');
                $("#submition").attr("disabled", true);
                $("#submition").text("প্রসেসিং ...");
                $('#submition').append('<div class="spinner-border spinner-border-sm"></div>')
            });
        });

        $(function(){
            $.ajaxSetup({
            headers: {
                    "X-CSRFToken": '{{csrf_token()}}'
                }
            });
            $('#submitdata').submit(function(e){
                e.preventDefault();
                var mydata = $(this).serialize();
                $.ajax({
                    method : 'POST',
                    url : "{{ route('student.course.payment') }}",
                    data:mydata,
                    success: function(response) {
                        if(response.success){
                            toastr.success(response.message);
                        }
                        setTimeout(function(){
                            // window.location = '{{ route('user.dashboard') }}';
                            document.getElementById("submitdata").reset();
                        }, 3000);


                        
                },
                error:function (response){
                    $('.text-danger').html('');

                    $.each(response.responseJSON.errors,function(field_name,error){
                        $(document).find('[name='+field_name+']').after('<span class="text-strong ss-text-danger">' +error+ '</span>');                    
                        toastr.error(error);
                    })
                    $('.text-danger').delay(5000).fadeOut();
                    setTimeout(function(){
                        // window.location = '{{ route('user.dashboard') }}';
                    }, 3000);
                }
                })
            })
        })
    </script>
</script>

@endsection
