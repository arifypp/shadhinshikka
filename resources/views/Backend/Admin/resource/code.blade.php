@extends('layouts.master')

@section('title') {{ __('Code Resource') }} @endsection

@section('css')
   <!-- CSS -->
   <link rel="stylesheet" href="{{ asset('/prism.css') }}" />
   <style>
       pre, code {
            padding:0;
            margin:0;
        }
       pre {
            max-height: 50em;
            overflow: auto;
        }
        .resource__items {
            max-height: 50em;
            overflow: auto;
        }
        .resource__items::-webkit-scrollbar-track
        {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
            border-radius: 10px;
            background-color: #F5F5F5;
        }
   </style>
@endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') {{ __('Code Resource') }} @endslot
        @slot('title') {{ __('Code Resource') }}  @endslot
    @endcomponent

    
<!-- My code for resouce help -->
<div class="resource__box">
    <div class="card">
        <div class="card-header bg-ss">
            <h4 class="text-white">Resouce Box</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search what are you looking for..." aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2"> @ </span>
                        </div>
                    </div>
                    <!-- All the items -->
                        <div class="resource__items">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                            @foreach( $codeblock as $key => $code )
                                <a class="nav-link mb-2 @if($key == 0) active @endif" id="codeblock{{$code->id}}-tab" data-bs-toggle="pill"
                                    href="#codeblock{{$code->id}}" role="tab" aria-controls="codeblock{{$code->id}}"
                                    aria-selected="true">
                                    <p class="m-0">{{ $code->name }}</p>
                                    <span>Language: 
                                    @php 
                                    $lname = DB::table('program_languegs')->where('id', $code->lang_id)->get();
                                        foreach($lname as $lang_name)
                                        {
                                            echo strtolower($lang_name->name);
                                        }
                                    @endphp
                                    </span>
                                </a>
                            @endforeach
                            </div>
                        </div>
                </div>
                <div class="col-md-9">
                    <div class="resource__item">
                        <div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">
@foreach( $codeblock as $key => $code )                            
<div class="tab-pane fade @if($key == 0) active show @endif" id="codeblock{{$code->id}}" role="tabpanel" aria-labelledby="codeblock{{$code->id}}">
<!-- Body text -->
@php 
$lname = DB::table('program_languegs')->where('id', $code->lang_id)->get();
foreach($lname as $lang_name)
{ @endphp<pre class="line-numbers language-{{ strtolower($lang_name->name) }}">
<code class="language-{{ strtolower($lang_name->name) }}">
@php
}
@endphp
@verbatim
   <?php echo htmlspecialchars($code->description); ?>
@endverbatim
</code></pre>

<!-- Delete query -->
<div class="update-code text-end">
    <a href="{{ route('toolscode.edit', $code->id) }}" class="btn btn-info btn-sm">Edit Resource </a>
    <a class="btn btn-danger btn-sm"  href="javascript:void(0)" onclick="deleteConfirmation('{{$code->id}}')">Delete Resource </a>
</div>
</div>
@endforeach  
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- end row -->

@endsection

@section('script')
<script src="{{ asset('/prism.js') }}"></script>

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
                     url:  '{{ url("/admin/resources/tools/delete") }}/' + id,
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

@section('script')
<script>
    $(document).ready(function(){
        $("code[class^='language-']").each(function(){
            $(this).html($(this).html().trim());
        });

        Prism.highlightAll();
    });
</script>
@endsection