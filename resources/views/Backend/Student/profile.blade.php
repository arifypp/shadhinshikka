@extends('layouts.master')

@section('title') প্রোফাইল @endsection

@section('css')
    <link href="{{ URL::asset('/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') প্রোফাইল @endslot
        @slot('title') প্রোফাইল @endslot
    @endcomponent

<div class="row">
    <div class="col-md-6 offset-md-3 m-auto text-center align-items-center">
        <div class="card card-body">
            <div class="profile-img img-fluid">
                <img src="{{ asset($student->avatar) }}" class="circle-rounded" alt="{{ $student->name }}" width="100">
            </div>
            <hr>
            <div class="student-details">
                <h2 class="text-center">
                    প্রোফাইল তথ্য
                </h2>
                <table class="table table responsive">
                    <tbody>
                        <tr>
                            <th>{{নাম}}</th>
                            <td>:</td>
                            <td>{{ $student->name }}</td>
                        </tr>
                        <tr>
                            <th>স্ট্যাটাস</th>
                            <td>
                                @if( $student->status == 1 )
                                <span class="text-success">Active</span>
                                @else
                                <span class="text-success">In-Active</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>ই-মেইল </th>
                            <td>:</td>
                            <td>{{ $student->email }}</td>
                        </tr>
                        <tr>
                            <th>মোবাইল নং </th>
                            <td>:</td>
                            <td>{{ $student->phone }}</td>
                        </tr>
                        <tr>
                            <th>ঠিকানা </th>
                            <td>:</td>
                            <td>{{ $student->address }}</td>
                        </tr>
                        <tr>
                            <th>জন্ম তারিখ </th>
                            <td>:</td>
                            <td>{{ date('d M, Y', strtotime($student->dob)) }}</td>
                        </tr>
                        
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection