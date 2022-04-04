@extends('layouts.master')

@section('title') {{ 'শিক্ষার্থী লিস্ট' }} @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') শিক্ষার্থী ম্যানেজ @endslot
        @slot('title') শিক্ষার্থী সেটিং @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h2 class="card-title text-white">শিক্ষার্থী লিস্ট</h2>
                </div>
                <div class="card-body">
                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100 align-middle">
                        <thead>
                            <tr>
                                <th>ক্র.নং</th>
                                <th>ফটো</th>
                                <th>শিক্ষার্থীর নাম</th>
                                <th>কোর্সের নাম</th>
                                <th>মোবাইল নং</th>
                                <th>ই-মেইল</th>
                                <th>অ্যাকশন</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $student as $key => $value )
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
                                <td> <a href="{{ route('student.show', $value->id) }}"> {{ $value->name }}</a></td>
                                <td>
                                    <a href="#" class="badge badge-soft-primary font-size-11 m-1">Photoshop</a>
                                    <a href="#" class="badge badge-soft-primary font-size-11 m-1">illustrator</a>
                                </td>
                                <td>{{ $value->phone }}</td>
                                <td>{{ $value->email }}</td>
                                <td>
                                    <a href="{{ route('student.show', $value->id) }}"> <span><i class="mdi mdi-eye"></i></span> </a>
                                    <a href="{{ route('student.edit', $value->id) }}" title="edit" class="text-info"> <span><i class="mdi mdi-lead-pencil"></i></span> </a>
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
                    url:  '{{ url("/admin/student/delete") }}/' + id,
                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',
                    success: function (results) {
                        if (results.success === true) {
                            window.setTimeout(function(){location.reload()},2000)
                            
                            Swal.mixin({
                                toast: !0,
                                position: "top-end",
                                showConfirmButton: !1,
                                timer: 3e3,
                                timerProgressBar: !0,
                                onOpen: function (t) {
                                t.addEventListener("mouseenter", Swal.stopTimer), t.addEventListener("mouseleave", Swal.resumeTimer)
                                }
                            }).fire({
                                icon: "success",
                                title: "Data Deleted Successfully"
                            })
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