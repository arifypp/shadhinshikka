@extends('layouts.master')

@section('title') {{ 'নোটিশ লিস্ট' }} @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') নোটিশ ম্যানেজ @endslot
        @slot('title') নোটিশ সেটিং @endslot
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
                                <th>টাইটেল</th>
                                <th>ম্যাসেজ</th>
                                <th>রিসিভার</th>
                                <th>তারিখ</th>
                                <th>অ্যাকশন</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $notice as $key => $value )
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{ $value->title }}</td>
                                <td>{!! \Str::limit($value->description, 10, ' ...') !!}</td>
                                <td>
                                    @if( $value->reciever == 1 )
                                    <span class="badge badge-soft-primary font-size-11 m-1">Student</span>
                                    @else
                                    <span class="badge badge-soft-primary font-size-11 m-1">Teacher</span>
                                    @endif
                                </td>
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
                    url:  '{{ url("/admin/notice/delete") }}/' + id,
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
                                title: "নোটিশ ডিলেট সম্পন্ন হয়েছে!"
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