@extends('layouts.master')

@section('title') {{ __('Resource') }} @endsection

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
        @slot('li_1') {{ __('Course') }} @endslot
        @slot('title') {{ __('Resource Tools') }}  @endslot
    @endcomponent

    
<!-- My code for resouce help -->
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
                        <form action="" method="post">
                            <input type="text" id="search" class="form-control" placeholder="Search..." autocomplete="off">
                        </form>
                    </div>
                    <!-- All the items -->
                        <div class="resource__items">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                            
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
<script>
    $(document).ready(function(){
        $("code[class^='language-']").each(function(){
            $(this).html($(this).html().trim());
        });

        Prism.highlightAll();
    });
</script>

<script>
// Search things
$('document').ready(function(){
    $('#search').on('keyup', function(){
        search();
    });
    search();

    function search(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{csrf_token()}}'
            }
        });
        var keyword = $('#search').val();
        $.post('{{ route("resourcestd.search") }}',
        {
            _token: $('meta[name="csrf-token"]').attr('content'),
            keyword:keyword
        },
        function(data){
            table_post_row(data);
            // console.log(data);
        });
    }

    function table_post_row(res){
    let htmlView = '';
    if(res.coderesuources.length <= 0){
        htmlView+= `
        <div class="alert alert-danger">
            Ops!  data not found
        </div class="alert alert-danger">`;
    }
    for(let i = 0; i < res.coderesuources.length; i++){
        var actieclass = i == "0" ? "active" : "";

        htmlView += `<a class="nav-link `+actieclass+` mb-2"  id="codeblock`+res.coderesuources[i].id+`-tab" data-bs-toggle="pill"
                href="#codeblock`+res.coderesuources[i].id+`" role="tab" aria-controls="codeblock`+res.coderesuources[i].id+`"
                aria-selected="true">
                <p class="m-0">`+res.coderesuources[i].name+`</p>
                <span>Language: `+res.coderesuources[i].lang_id+`</span>
            </a> `;
    }
        $('#v-pills-tab').html(htmlView);
    }
});
</script>
@endsection