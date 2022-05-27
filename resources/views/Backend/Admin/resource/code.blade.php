@extends('layouts.master')

@section('title') {{ __('Code Resource') }} @endsection

@section('css')
   <!-- CSS -->
   <link rel="stylesheet" href="{{ asset('/prism.css') }}" />
   <style>
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
        { @endphp
            <pre class="line-numbers language-{{ strtolower($lang_name->name) }}"><code class="language-{{ strtolower($lang_name->name) }}">
          @php
        }
@endphp
@verbatim
   <?php echo htmlspecialchars($code->description); ?>
@endverbatim
</code></pre>
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
@endsection