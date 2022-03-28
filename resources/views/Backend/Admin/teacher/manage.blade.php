@extends('layouts.master')

@section('title') {{ 'শিক্ষক লিস্ট' }} @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') শিক্ষক ম্যানেজ @endslot
        @slot('title') শিক্ষক সেটিং @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h2 class="card-title text-white">কোর্সের লিস্ট</h2>
                </div>
                <div class="card-body">
                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100 align-middle">
                        <thead>
                            <tr>
                                <th>ক্র.নং</th>
                                <th>ফটো</th>
                                <th>শিক্ষকের নাম</th>
                                <th>কোর্সের নাম</th>
                                <th>মোবাইল নং</th>
                                <th>ই-মেইল</th>
                                <th>অ্যাকশন</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $teacher as $key => $value )
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>
                                    @if( !empty( $value->avatar ) )
                                        <img class="rounded-circle avatar-xs" src="{{ asset($value->avatar) }}" alt="{{ $value->name }}">
                                    @else
                                    <div class="avatar-xs">
                                        <span class="avatar-title rounded-circle">
                                            {{ \Str::limit($value->name, 1, '') }}
                                        </span>
                                    </div>
                                    @endif
                                </td>
                                <td>{{ $value->name }}</td>
                                <td>
                                    <a href="#" class="badge badge-soft-primary font-size-11 m-1">Photoshop</a>
                                    <a href="#" class="badge badge-soft-primary font-size-11 m-1">illustrator</a>
                                </td>
                                <td>{{ $value->phone }}</td>
                                <td>{{ $value->email }}</td>
                                <td>
                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#CouseDetails{{$value->id}}"> <span><i class="mdi mdi-eye"></i></span> </a>
                                    <a href="#" title="edit" class="text-info"> <span><i class="mdi mdi-lead-pencil"></i></span> </a>
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