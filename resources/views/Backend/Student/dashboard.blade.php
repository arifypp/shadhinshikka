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
                    <form action="{{ route('student.course.payment') }}" method="post">
                        @csrf
                        @if( $admissions->pluck('status') === 'inactive' )
                            <div class="admission-warning alert alert-danger">
                                <span> {{ __('আপনার অ্যাডমিশন এখনো একটিভ হয়নি। অনুগ্রহ করে অপেক্ষা করুন ধন্যবাদ।') }} </span>
                            </div>
                            @endif
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
    <script src="{{ asset('/prism.js') }}"></script>
    <script>
    hljs.initHighlightingOnLoad();
    document.addEventListener('DOMContentLoaded', (event) => {
        document.querySelectorAll('pre code').forEach((el) => {
            hljs.highlightElement(el);
        });
    });

    document.querySelectorAll("code").forEach(function(element) {
        element.innerHTML = element.innerHTML.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/"/g, "&quot;").replace(/'/g, "&#039;");
    });
</script>
@endsection
