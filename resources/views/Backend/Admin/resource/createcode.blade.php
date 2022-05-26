@extends('layouts.master')

@section('title') {{ __('Add Code Resource') }} @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') {{ __('Add Code Resource') }} @endslot
        @slot('title') {{ __('Add Code Resource') }}  @endslot
    @endcomponent

<div class="container">
    <div class="row">
        <div class="card card-body">
            <div class="col-md-12">
                <!-- Static Backdrop Modal -->
                <div class="modal fade" id="addcodetype" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="addcodetypeLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addcodetypeLabel">Add New Language</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('toolscode.codelangstore') }}" method="post" id="lang_store">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="Enter Language Name">Enter Language Name</label>
                                        <input type="text" name="name" id="name" class="form-control">
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <form action="{{ route('toolscode.codestore') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="form-group col-6 mb-3">
                            <label for="Resource title">Title</label>
                            <input type="text" name="title" id="title" class="form-control" placeholder="Enter Title">
                        </div>
                        <div class="form-group col-6 mb-3">
                            <label for="Select Language">Select Language &nbsp; <a href="javascript" data-bs-toggle="modal"
                            data-bs-target="#addcodetype"> <i class="fa fa-plus"></i> </a></label>
                            <select name="code_type" id="code_type" class="form-control">
                                <option value="0">Please select language</option>
                                @foreach($langName as $lang)
                                <option value="{{ $lang->id }}">{{ $lang->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-12 mb-3">
                            <label for="Type your code">Enter Your Code</label>
                            <textarea name="code" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group col-12">
                            <button type="submit" class="btn btn-primary">Submit Now</button>
                        </div>
                </form>
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
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                    "X-CSRFToken": '{{csrf_token()}}'
                }
        });

        $('#lang_store').submit(function(e){
            e.preventDefault();
            var mydata = $(this).serialize();
            $.ajax({
                method : 'POST',
                url : "{{ route('toolscode.codelangstore') }}",
                data:mydata,
                beforeSend: function(){
                    $('#lang_store .btn-primary').attr('disabled', 'disabled');
                    $("#lang_store .btn-primary").text("প্রসেসিং ...");
                    $('#lang_store .btn-primary').append('<div class="spinner-border spinner-border-sm"></div>')
                },
                complete: function(){
                    $('#lang_store .btn-primary').removeClass('spinner-border spinner-border-sm');
                },
                success: function(response) {
                        if(response.success){
                            toastr.success(response.message);
                        }
                        console.log(response.data.name);
                        setTimeout(function(){
                            document.getElementById("lang_store").reset();
                            $('#addcodetype').modal("hide");
                            $("#code_type").append("<option value="+ response.dataid +">" + response.data.name + "</option>");
                        }, 3000);                    
                },
                error:function (response){
                    $('.text-danger').html('');

                    $.each(response.responseJSON.errors,function(field_name,error){
                        $(document).find('[name='+field_name+']').after('<span class="text-strong ss-text-danger">' +error+ '</span>');                    
                        toastr.error(error);
                    })
                    $('.ss-text-danger').delay(5000).fadeOut();
                    
                }
            })
        })
    })
</script>
@endsection