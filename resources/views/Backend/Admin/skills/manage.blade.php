@extends('layouts.master')

@section('title') {{ 'স্কিলস ম্যানেজ' }} @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') স্কিলস ম্যানেজ করুন @endslot
        @slot('title') স্কিলস ম্যানেজ @endslot
    @endcomponent
    <div class="row">
        <div class="add-cat text-end pb-2">
            <a class="btn btn-primary btn-md btn-block" href="{{ route('category.create') }}">তৈরি করুন</a>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h2 class="card-title text-white">স্কিলস লিস্ট</h2>
                </div>
                <div class="card-body">
                    <table class="table-responsive data-table table">
                        <thead>
                            <th>ক্র.নং</th>
                            <th>নাম</th>
                            <th>সাব-স্কিলস নাম</th>
                            <th>স্ট্যাটাস</th>
                            <th>অ্যাকশন</th>
                        </thead>
                        <tbody>
                            @foreach($skills as $key => $skill)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{ $skill->name }}</td>
                                <td> 
                                @if ($skill->childs()->count() > 0 )
                                            
                                    @include('Backend.Admin.skills.subcategoriestree', ['subcategories' => $skill->childs, 'parent' => $skill->name])

                                @else
                                <span class="badge badge-soft-primary font-size-11 m-1">Primary</span>
                                @endif
                                <td>
                                    @if( $skill->status == 'Active' )
                                    <span class="badge badge-soft-primary font-size-11 m-1">Active</span>
                                    @else
                                    <span class="badge badge-soft-primary font-size-11 m-1">In-Active</span>
                                    @endif
                                </td>
                            <td> <a href="#" data-bs-toggle="modal"
                            data-bs-target="#Skills{{ $skill->id }}"> <span><i class="mdi mdi-eye"></i></span> </a> &nbsp;
                                    <div class="modal fade" id="Skills{{ $skill->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
                                        tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">{{ $skill->name }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <table class="table table-responsive">
                                                        <tr>
                                                            <th>নাম</th>
                                                            <td>:</td>
                                                            <td> <h4 class="text-success">{{ $skill->name }}</h4> </td>
                                                        </tr>
                                                        <tr>
                                                            <th>বিবরণ</th>
                                                            <td>:</td>
                                                            <td> <span class="d-block" style="white-space:normal;">{{ $skill->skill_desc }}</span> </td>
                                                        </tr>
                                                        <tr>
                                                            <th>সাব ক্যাটাগরি</th>
                                                            <td>:</td>
                                                            <td> 
                                                            @if ($skill->childs()->count() > 0 )
                                            
                                                                @include('Backend.Admin.skills.subcategoriestree', ['subcategories' => $skill->childs, 'parent' => $skill->name])
                            
                                                            @else
                                                            <span class="badge badge-soft-primary font-size-11 m-1">Primary</span>
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
                                    <a href="{{ route('skills.edit', $skill->id) }}" title="edit" class="text-info"> <span><i class="mdi mdi-lead-pencil"></i></span> </a> &nbsp;
                                    <a href="javascript:void(0)" onclick="deleteConfirmation('{{$skill->id}}')" class="text-danger"> <span><i class="mdi mdi-delete"></i></span> </a>
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
                    url:  '{{ url("/admin/skills/delete") }}/' + id,
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