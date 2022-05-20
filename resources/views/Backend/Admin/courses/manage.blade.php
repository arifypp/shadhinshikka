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
                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#CouseDetails{{$value->id}}"> <span><i class="mdi mdi-eye"></i></span> </a>
                                    <!-- Open course details -->
                                    <div class="modal fade" id="CouseDetails{{$value->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">{{ $value->name }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="img text-center">
                                                        <img src="{{ asset('assets/images/course/'. $value->image) }}" alt="{{ $value->name }}" class="img-fluid w-100">
                                                    </div><br>
                                                    <div class="courseinfo">
                                                        <table class="table table-responsive border-none">
                                                            <tbody>
                                                                <tr>
                                                                    <th>কোর্সের নাম</th>
                                                                    <td>:</td>
                                                                    <td>{{ $value->name }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>শিক্ষকের নাম</th>
                                                                    <td>:</td>
                                                                    <td> <a href="{{ route('student.show', $value->teachername->id) }}">{{ $value->teachername->name }}</a></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>মোট সিট</th>
                                                                    <td>:</td>
                                                                    <td>{{ $value->student_capacity }} সিট</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>মোট ছাত্র/ছাত্রী</th>
                                                                    <td>:</td>
                                                                    <td> No Config</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>কোর্সের মূল্য</th>
                                                                    <td>:</td>
                                                                    <td><h4 class="text-success">৳{{ $value->price }} BDT</h4></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>কোর্সের ফিচার</th>
                                                                    <td>:</td>
                                                                    <td>
                                                                        <ul>
@php 
    $iteslist = App\Models\Backend\Admin\CourseItem::where('cicourse_id', $value->id)->get();
@endphp
@foreach( $iteslist as $items )
   <li> {{ $items->name }} </li>
@endforeach
                                                                        </ul>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">বন্ধ করুন</button>
                                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">পিছনে যান</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{ route('course.edit', $value->slug) }}" title="edit" class="text-info"> <span><i class="mdi mdi-lead-pencil"></i></span> </a>
                                    <a href="javascript:void(0)" onclick="deleteConfirmation('{{$value->id}}')" class="text-danger"> <span><i class="mdi mdi-delete"></i></span> </a>
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

@section('script')
<script type="text/javascript">

function deleteConfirmation(id) {
        swal.fire({
            title: "ডিলেট?",
            icon: 'question',
            text: "দয়া করে কনর্ফাম করুন!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "হ্যা, ডিলেট করুন!",
            cancelButtonText: "না, বাতিল করুন!",
            dangerMode: true,
            reverseButtons: !0
        }).then(function (e) {
            if (e.value === true) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajaxSetup({
	                headers: {
	                    'X-CSRF-TOKEN': '{{csrf_token()}}'
	                }
	            });
                $.ajax({
                    type: 'POST',
                    url:  '{{ url("/admin/courses/delete") }}/' + id,
                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',
                    success: function (results) {
                        if (results.success === true) {
                            window.setTimeout(function(){location.reload()},2000)
                            swal.fire("Done!", results.message, "success");
                            // refresh page after 2 seconds
                            // $('.table').load(document.URL + ' .table');     Using .reload() method.
                        } else {
                            swal.fire("Error!", results.message, "error");
                        }
                    }
                });
            } else {
                e.dismiss;
            }
        }, function (dismiss) {
            return false;
        })
    }
</script>
@endsection