@extends('layouts.master')

@section('title') {{ __('সবগুলো কোর্স') }} @endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') {{ __('Dashboard') }} @endslot
        @slot('title') {{ __('সবগুলো কোর্স') }} @endslot
    @endcomponent
<div class="container">
    <div class="row">
        <div class="col-12 col-xl-12 col-md-12 col-lg-12">
            <div class="row">
            @foreach( $courses as $course )
                <div class="col-xl-4 pl-0 all-courses">
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
                            @if( $course->id == $admission->courses_id )
                                <li class="list-inline-item">
                                    <a href="javascript:void(0)" class="btn btn-info btn-sm"><h5 class="p-0 m-0 text-white"> {{ __('Admitted') }}</h5></a>
                                </li>
                                @if( !empty($admission->status == 'active') )
                                <li class="list-inline-item">
                                    <a href="{{ route('access.course', $course->slug) }}" class="btn btn-warning btn-sm"><h5 class="p-0 m-0 text-white"> {{ __('Continue Course') }}</h5></a>
                                </li>
                                @endif
                                @else
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
    </div>
</div>
@endsection