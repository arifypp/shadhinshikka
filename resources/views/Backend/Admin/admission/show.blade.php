@extends('layouts.master')

@section('title') {{ 'অ্যাডমিশন তথ্য' }} @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') অ্যাডমিশন ম্যানেজ @endslot
        @slot('title') অ্যাডমিশন তথ্য @endslot
    @endcomponent

    <div class="container">
    <div class="row align-items-center align-self-center justify-content-center">
        <div class="col-xl-6 col-lg-6 col-md-6 col-12 col-sm-12">
            <div class="card">
                <div class="card-header bg-ss">
                    <h5 class="card-title text-white">{{ $admission->courses->name }}</h5>
                </div>
                <div class="card-body">
                    <div class="admission__details">
                        <table class="table-responsive table-borderd table strpe">
                            <tbody>
                                <tr>
                                    @if( !empty( $admission->user->avatar ) )
                                        <div class="avater-lg text-center">
                                        <img class="rounded-circle avatar-lg" src="{{ asset($admission->user->avatar) }}" alt="{{ $admission->user->name }}">
                                        </div>
                                    @else
                                    <div class="avatar-xs text-center">
                                        <span class="avatar-title rounded-circle">
                                            {{ \Str::limit($admission->name, 1, '') }}
                                        </span>
                                    </div>
                                    @endif 
                                    <hr>
                                </tr>
                                <tr>
                                    <th>নাম</th>
                                    <td>:</td>
                                    <td>{{ $admission->user->name }}</td>
                                </tr>
                                <tr>
                                    <th>ই-মেইল</th>
                                    <td>:</td>
                                    <td>{{ $admission->user->email }}</td>
                                </tr>
                                <tr>
                                    <th>মোবাইল নং</th>
                                    <td>:</td>
                                    <td>{{ $admission->user->phone }}</td>
                                </tr>
                                <tr>
                                    <th>কোর্সের নাম</th>
                                    <td>:</td>
                                    <td>{{ $admission->courses->name }}</td>
                                </tr>
                                <tr>
                                    <th>কোর্সের মূল্য</th>
                                    <td>:</td>
                                    <td>৳{{ number_format( $admission->courses->price , 0 , '.' , ',' ) }} BDT </td>
                                </tr>
                                <tr>
                                    <th>পেইড</th>
                                    <td>:</td>
                                    <td>৳{{ number_format( $paidAmount->amount , 0 , '.' , ',' ) }} BDT </td>
                                </tr>
                                <tr>
                                    <th>ট্রান্সিকশন আইডি</th>
                                    <td>:</td>
                                    <td> {{ $paidAmount->traxid }} </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="text-center">
                            @if( $admission->status == 'inactive' )
                            <a href="{{ route('admission.udate', $admission->id) }}" class="btn bg-ss" id="accepptCourse">{{ __('Accept The Course') }}</a> 
                            @else 
                            <a href="javascript:void(0)" class="btn bg-ss disabled" id="accepptCourse">{{ __('Already Accepted') }}</a> 

                            @endif
                            &nbsp;
                            <a href="javascript:void(0)" onclick="deleteConfirmation('{{$admission->id}}')" class="btn btn-danger" id="accepptDelete">{{ __('Delete') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
<script>
    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            toastr.error("{{ $error }}");
        @endforeach
    @endif
</script>

<script>
   
   
   
    $("#accepptCourse").click(function(e){
  
        e.preventDefault();   
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{csrf_token()}}'
            }
        });

        $('#accepptCourse').attr('disabled', 'disabled');
        $("#accepptCourse").attr("disabled", true);
        $("#accepptCourse").text("প্রসেসিং ...");
        $('#accepptCourse').append('<div class="spinner-border spinner-border-sm"></div>');

        var url = $(this).attr('href'); 
           
        $.ajax({
           type:'POST',
           url: url,
           data: {_token: CSRF_TOKEN},
           dataType: 'JSON',
           success: function(response) {
                    if(response.success){
                        toastr.success(response.message);
                    }
                    setTimeout(function(){
                        window.location = '{{ route('manage.admission') }}';
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
                setTimeout(function(){
                    window.location = '{{ route('manage.admission') }}';
                }, 3000);
            }
        });
  
    });
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
                    url:  '{{ url("/admin/admission/delete") }}/' + id,
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