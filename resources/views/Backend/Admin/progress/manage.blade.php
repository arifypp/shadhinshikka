@extends('layouts.master')

@section('title') {{ 'পেমেন্ট এ্যাপ্রুভ লিস্ট' }} @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') পেমেন্ট এ্যাপ্রুভ ম্যানেজ @endslot
        @slot('title') পেমেন্ট এ্যাপ্রুভ সেটিং @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h2 class="card-title text-white">নোটিশ লিস্ট</h2>
                </div>
                <div class="card-body">
                    <table id="datatable-buttons" class="table align-middle table-bordered dt-responsive nowrap w-100 align-middle">
                        <thead>
                            <tr>
                                <th>ক্র.নং</th>
                                <th>সেন্ডার নাম</th>
                                <th>কোর্সের নাম</th>
                                <th>মোবাইল নং</th>
                                <th>ট্রান্সিকশন আইডি</th>
                                <th>তারিখ</th>
                                <th>অ্যাকশন</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $paymentProgress as $key => $value )
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{ $value->student->name }}</td>
                                <td>{{ $value->course->name }}</td>
                                <td>{{ $value->phone }} </td>
                                <td>{{ $value->traxid }}</td>
                                <td>{{ date('d M, Y H:i:s a', strtotime($value->created_at)) }}</td>
                                <td>
                                    <a href="#" data-bs-toggle="modal"
                            data-bs-target="#Notice{{ $value->id }}"> <span><i class="mdi mdi-eye"></i></span> </a> &nbsp;
                        <div class="modal fade" id="Notice{{ $value->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">{{ $value->title }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table table-responsive">
                                            <tr>
                                                <th>টাইটেল</th>
                                                <td>:</td>
                                                <td> <h4 class="text-success">{{ $value->title }}</h4> </td>
                                            </tr>
                                            <tr>
                                                <th>নোটিশ</th>
                                                <td>:</td>
                                                <td> <span class="d-block" style="white-space:normal;">{{ $value->description }}</span> </td>
                                            </tr>
                                            <tr>
                                                <th>রিসিভার</th>
                                                <td>:</td>
                                                <td> 
                                                    @if( $value->reciever == 1 )
                                                    <span class="badge badge-soft-primary font-size-11 m-1">Student</span>
                                                    @else
                                                    <span class="badge badge-soft-primary font-size-11 m-1">Teacher</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal"> পেছনে যান </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                                    <a href="{{ route('notice.edit', $value->id) }}" title="edit" class="text-info"> <span><i class="mdi mdi-lead-pencil"></i></span> </a> &nbsp;
                                    <a href="javascript:void(0)" onclick="deleteConfirmation('{{$value->id}}')" class="text-danger"> <span><i class="mdi mdi-delete"></i></span> </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection