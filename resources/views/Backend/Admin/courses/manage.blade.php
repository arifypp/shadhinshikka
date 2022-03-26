@extends('layouts.master')

@section('title') {{ 'কোর্স সেটিং' }} @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') কোর্স ম্যানেজ @endslot
        @slot('title') কোর্স সেটিং @endslot
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
                                <th>কোর্সের নাম</th>
                                <th>টিচারের নাম</th>
                                <th>মোট সিট</th>
                                <th>মোট ছাত্র/ছাত্রী</th>
                                <th>কোর্সের মূল্য</th>
                                <th>অ্যাকশন</th>
                            </tr>
                        </thead>


                        <tbody>

                            @foreach( $course as $key => $value )
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->teachername->name }}</td>
                                <td>{{ $value->student_capacity }} সিট</td>
                                <td>no জন</td>
                                <td>৳{{ $value->price }} BDT</td>
                                <td>
                                    <a href="#"> <span><i class="mdi mdi-eye"></i></span> </a>
                                    <a href="{{ route('course.edit', $value->slug) }}" title="edit" class="text-info"> <span><i class="mdi mdi-lead-pencil"></i></span> </a>
                                    <a href="#" class="text-danger"> <span><i class="mdi mdi-delete"></i></span> </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

@endsection
