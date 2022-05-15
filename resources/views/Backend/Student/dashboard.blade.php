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
                    @if( !empty($admission->status == 'inactive') )
                    <div class="admission-warning alert alert-danger">
                        <span> {{ __('আপনার অ্যাডমিশন এখনো একটিভ হয়নি। অনুগ্রহ করে অপেক্ষা করুন ধন্যবাদ।') }} </span>
                    </div>
                    @endif
                    
                    {{ App\Models\Common\Admission::payment_progress() }}
                    
                </div>
                <div class="col-md-4">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body">
                                    <p class="text-muted fw-medium">Orders</p>
                                    <h4 class="mb-0">1,235</h4>
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
                                    <p class="text-muted fw-medium">Revenue</p>
                                    <h4 class="mb-0">$35, 723</h4>
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
                                    <p class="text-muted fw-medium">Average Price</p>
                                    <h4 class="mb-0">$16.2</h4>
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
            </div>
            <!-- end row -->

            <!-- Course module -->
            @foreach( $courses as $course )
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h5 class="text-white p-0 m-0"><i class="bx bx-copy"></i> {{ $course->name }}</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush p-0">
                        @php 
                            $itemlist = App\Models\Backend\Admin\CourseItem::where('course_id', $course->id)->get();
                        @endphp
                        @foreach( $itemlist as $items )
                        <li class="list-group-item"> <i class="bx bx-chevrons-right"></i> {{ $items->name }} </li>
                        @endforeach
                        </ul>
                    </div>
                    <div class="card-footer bg-dark text-center text-white">
                        <ul class="list-inline m-2">
                          @if( $course->id == $admission->courses_id )
                            <li class="list-inline-item">
                                <a href="javascript:void(0)" class="btn btn-info btn-sm"><h5 class="p-0 m-0 text-white"> {{ __('Admitted') }}</h5></a>
                            </li>
                            @else
                            <li class="list-inline-item">
                                <a href="{{ route('purchase.course', $course->slug) }}" class="btn btn-info btn-sm"><h5 class="p-0 m-0 text-white"> {{ __('Admission Now') }}</h5></a>
                            </li>
                           @endif
                            <li class="list-inline-item">{{ __('Price') }}: ৳{{ number_format( $course->price , 0 , '.' , ',' ) }} BDT</li>
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
@endsection
