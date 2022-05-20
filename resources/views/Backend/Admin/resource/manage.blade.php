@extends('layouts.master')

@section('title') {{ 'রিসোর্স সেটিং' }} @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') রিসোর্স ম্যানেজ @endslot
        @slot('title') রিসোর্স সেটিং @endslot
    @endcomponent

    <div class="row">
        <div class="col-12 col-md-12">
            <div class="form-group mb-2 text-end">
                <button type="button" class="btn bg-ss" data-bs-toggle="modal"
                            data-bs-target="#AddLectureName">অ্যাড লেকচার</button>
            </div>
            <!-- Add Lecture Modal -->
            <div class="modal fade" id="AddLectureName" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Add Lecture Name</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('resource.lecture') }}" method="post" id="AddLecture">
                                @csrf
                                <div class="form-groupmb-3 mb-3">
                                    <label for="Lecture Title">Lecture Title *</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Title Here" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="Lecture Title">Course *</label>
                                    <select name="course_id" id="course_id" class="form-control">
                                        <option value="0">Please select course</option>
                                        {{ App\Models\Common\CourseResource::Allcourseforoption() }}
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="Status">Status *</label>
                                    <select name="status" class="form-control">
                                        <option value="0">Please select status</option>
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" id="submition" class="btn btn-primary">Submit</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End Lecture Modal -->

            <div class="card">
                <div class="card-header bg-primary">
                    <h2 class="card-title text-white">রিসোর্স লিস্ট</h2>
                </div>
                <div class="card-body dt-responsive">
                    <table id="datatable-buttons" class="table table-bordered nowrap w-100 align-middle">
                        <thead>
                            <tr>
                                <th>ক্র.নং</th>
                                <th>লেকচার নাম</th>
                                <th>কোর্সের নাম</th>
                                <th>রিসোর্স টাইপ</th>
                                <th>অ্যাকশন</th>
                            </tr>
                        </thead>


                        <tbody>

                            @foreach( $resources as $key => $value )
                            <tr data-toggle="collapse" data-target="#demo1" class="accordion-toggle">
                                <td>{{ $key+1 }}</td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $items->name }}</td>
                                <td> 
                                    @if( !is_null($value->resorceItem->type ) )
                                        {{ $value->resorceItem->type }}
                                    @endif
                                </td>
                                <td>
                                    <a data-bs-toggle="collapse" href="#reouseinfo{{ $value->id }}" aria-expanded="false" aria-controls="reouseinfo{{ $value->id }}" class="text-success"> <span><i class="mdi mdi-eye"></i></span> </a>
                                    <a href="{{ route('course.edit', $value->id) }}" title="edit" class="text-info"> <span><i class="mdi mdi-lead-pencil"></i></span> </a>
                                    <a href="javascript:void(0)" onclick="deleteConfirmation('{{$value->id}}')" class="text-danger"> <span><i class="mdi mdi-delete"></i></span> </a>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="8" class="p-0">
                                    <div class="collapse" id="reouseinfo{{ $value->id }}">
                                        <div class="card border shadow-none card-body text-muted mb-0">
                                        <!-- Booking content -->
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <table class="table align-middle table-borderless mb-0 " id="resouce_items">
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Duration</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach( App\Models\Common\ResourcesItem::where('resource_id', $value->id)->get() as $items )
                                                            <tr>
                                                                <td>
                                                                    <a href="#"><i class="bx bx-play-circle"></i> &nbsp; {{ $items->name }}</a>
                                                                </td>
                                                                <td>{{ $items->video_duration }}</td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        <!-- Custom Button -->
                                        </div>
                                    </div>
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
<script>
    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            toastr.error("{{ $error }}");
        @endforeach
    @endif
</script>

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
                    url:  '{{ url("/admin/resources/delete") }}/' + id,
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

<script>
$(document).ready(function() {
    var $myGroup = $('#demo1');
    $myGroup.on('show','.collapse', function() {
        $myGroup.find('.collapse .show').collapse('hide');
    });
});

$(document).ready(function() {
        $(document).on('submit', 'form', function() {
        $("#submition").attr("disabled", true);
        $("#submition").text("প্রসেসিং ...");
        $('#submition').append('<div class="spinner-border spinner-border-sm"></div>')
    });
});


$(function(){
    $.ajaxSetup({
    headers: {
            "X-CSRFToken": '{{csrf_token()}}'
        }
    });
    $('#AddLecture').submit(function(e){
        e.preventDefault();
        var mydata = $(this).serialize();
        $.ajax({
            method : 'POST',
            url : "{{ route('resource.lecture') }}",
            data:mydata,
            success: function(response) {
                if(response.success){
                    toastr.success(response.message);
                }
                setTimeout(function(){
                    window.location = '{{ route('course.manage') }}';
                    document.getElementById("submitdata").reset();
                }, 3000);                
        },
        error:function (response){
            $('.text-danger').html('');
            $.each(response.responseJSON.errors,function(field_name,error){
                $(document).find('[name='+field_name+']').after('<span class="text-strong ss-text-danger">' +error+ '</span>');                    
                toastr.error(error);
            })
            $('.text-danger').delay(5000).fadeOut();
            
        }
        })
    })
})
</script>

@endsection