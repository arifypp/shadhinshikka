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
                <img src="{{ asset('/storage/users-avatar/'.Auth::user()->avatar) }}" class="circle-rounded" alt="{{ $student->name }}" width="100">
            </div>
            <hr>
            <div class="student-details">
                <h2 class="text-center">
                    প্রোফাইল তথ্য
                </h2>
                <table class="table table responsive">
                    <tbody>
                        <tr>
                            <th>{{ __('নাম') }}</th>
                            <td>:</td>
                            <td>{{ $student->name }}</td>
                        </tr>
                        <tr>
                            <th>স্ট্যাটাস</th>
                            <td>:</td>
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
                <a href="" class="btn btn-primary waves-effect waves-light btn-sm" data-bs-toggle="modal"
                data-bs-target=".update-profile">Edit Profile</a> 
                
                <!--  Update Profile example -->
                <div class="modal fade update-profile text-left" tabindex="-1" role="dialog"
                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myLargeModalLabel">Edit Profile</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-left">
                                <form class="form-horizontal text-left" action="{{ route('updateProfile', Auth::user()->id) }}" method="POST" enctype="multipart/form-data" id="update-profile">
                                    @csrf
                                    <input type="hidden" value="{{ Auth::user()->id }}" id="data_id">
                                    <div class="mb-3">
                                        <label for="useremail" class="form-label">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            id="useremail" value="{{ Auth::user()->email }}" name="email"
                                            placeholder="Enter email" autofocus>
                                        <div class="text-danger" id="emailError" data-ajax-feedback="email"></div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            value="{{ Auth::user()->name }}" id="username" name="name" autofocus
                                        placeholder="Enter username">
                                        <div class="text-danger" id="nameError" data-ajax-feedback="name"></div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="userdob">Date of Birth</label>
                                        <div class="input-group" id="datepicker1">
                                            <input type="text" class="form-control @error('dob') is-invalid @enderror"
                                                placeholder="dd-mm-yyyy" data-date-format="dd-mm-yyyy"
                                                data-date-container='#datepicker1' data-date-end-date="0d"
                                                value="{{ date('d-m-Y', strtotime(Auth::user()->dob)) }}"
                                                data-provide="datepicker" name="dob" autofocus id="dob">
                                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                        </div>
                                        <div class="text-danger" id="dobError" data-ajax-feedback="dob"></div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="avatar">Profile Picture</label>
                                        <div class="input-group">
                                            <input type="file"
                                                class="form-control @error('avatar') is-invalid @enderror"
                                                id="avatar" name="avatar"  autofocus>
                                            <label class="input-group-text" for="avatar">Upload</label>
                                        </div>
                                        <div class="text-start mt-2">
                                            <img src="{{ asset('/storage/users-avatar/'.Auth::user()->avatar) }}" alt=""
                                                class="rounded-circle avatar-lg">
                                        </div>
                                        <div class="text-danger" role="alert" id="avatarError" data-ajax-feedback="avatar"></div>
                                    </div>

                                    <div class="mt-3 d-grid">
                                        <button class="btn btn-primary waves-effect waves-light UpdateProfile" data-id="{{ Auth::user()->id }}"
                                            type="submit">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
            </div>
        </div>
    </div>
</div>

@endsection