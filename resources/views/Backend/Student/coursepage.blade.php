@extends('layouts.master')

@section('title') {{ $course->name }} @endsection

@section('css')
   <!-- Open Graph -->
    <link rel="stylesheet" href="https://unpkg.com/plyr@3/dist/plyr.css">
@endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') {{ __('Course') }} @endslot
        @slot('title') {{ $course->name }}  @endslot
    @endcomponent

    <div class="container">
        <div class="row">
            <div class="col-md-8 p-0">
                <div class="card">
                    <div class="card-body p-0 pb-2">
                       
                        <div class="plyr__video-embed" id="player">
                            <iframe
                                src="{{ $resourceItems->video_url }}?origin=https://plyr.io&amp;iv_load_policy=3&amp;modestbranding=1&amp;playsinline=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1"
                                allowfullscreen
                                allowtransparency
                                allow="autoplay"
                            ></iframe>
                        </div>
                        <div class="video__footer m-2">
                            <div class="row align-middle">
                                <div class="col-md-6">
                                    <div class="instructor-info-video align-middle">
                                        <p class="p-0 m-0">Instructor: <a href="#"> {{$course->teachername->name}} </a></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="paginate text-end text-right float-right">
                                        <a href="javascript:void(0)" class="btn btn-primary me-1 btn-sm">Previous</a>
                                        <a href="javascript:void(0)" class="btn btn-info btn-sm">Next</a>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="description my-2">
                                        <hr>
                                        <h4><button class="bg-ss border-0 rounded">Course: </button> {{ $course->name }}</h4>
                                        <p class="m-0">{{ $course->c_desc }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body  p-0">
                        <div class="button-group p-3 justify-content-center align-items-center text-center mb-3">
                            <a href="javascrip:void(0)" class="btn btn-info text-left text-start">Claim Certificate</a>
                            <a href="{{ url('/sschat', $course->teacher) }}" class="btn btn-warning text-right text-end">Message</a>
                        </div>
                        <!-- Video play list -->
                        <div class="video-list">
                            <div class="video-duration p-3 pl-1 pr-1 text-center bg-ss text-white">
                                <div class="row">
                                    <div class="col-md-7">
                                        <h6 class="text-white m-0">Course Curriculum</h6>
                                    </div>
                                    <div class="col-md-5 text-end">
                                        <h6 class="text-white m-0">
                                            {{ App\Models\Common\Admission::duration() }}
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion" id="accordionExample">
                                @foreach( $sectionTitle as $title )
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne{{ $title->id }}">
                                        <a class="accordion-button fw-medium"
                                            data-bs-toggle="collapse" data-bs-target="#video{{ $title->id }}" aria-expanded="false"
                                            aria-controls="video{{ $title->id }}">
                                            {{ $title->name }}                                       
                                        </a>                                        
                                    </h2>
                                    <div id="video{{ $title->id }}" class="accordion-collapse collapse"
                                        aria-labelledby="headingOne{{ $title->id }}" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <ul>
                                            @foreach( App\Models\Common\ResourcesItem::where('resource_id', $title->id)->get() as $item )    
                                                <li>
                                                    <a href="{{ $item->video_url }}" id="video_url">
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <img src="{{ asset('assets/images/course/'. $course->image) }}" alt="" class="img-fluid">
                                                            </div>
                                                            <div class="col-md-10">
                                                                <p> {{ $item->name }} </p>
                                                                <span><i class="fas fa-play-circle"></i> {{ $item->video_duration }}</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                            @endforeach    
                                            </ul>
                                        </div>
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


@endsection

@section('script')
<script src="https://cdn.polyfill.io/v2/polyfill.min.js?features=es6,Array.prototype.includes,CustomEvent,Object.entries,Object.values,URL"></script>
<script src="https://unpkg.com/plyr@3.7.2/dist/plyr.min.js"></script>

<script>
    // Change the second argument to your options:
    const player = new Plyr('#player', {
        muted: false,
        volume: 1,
        autoplay: true,
        clickToPlay: true,
        noCookie: false, rel: 0,
        iv_load_policy: 3, 
        modestbranding: 1,
        pause: 'Pause',
        played: 'Played',
        controls: ['play', 'progress', 'current-time', 'volume', 'settings', 'fullscreen'],
    });
    player.play();
    

    // Expose player so it can be used from the console
    window.player = player;


    $(document).ready(function(){
        $('a#video_url').click(function(e) {
            e.preventDefault();
            var videoid = $(this).attr('href');

            // $('#player').attr('src', videoid+"?autoplay=1");

            var html = '<iframe src="'+ videoid +'?rel=0&showinfo=0" frameborder="0" allowfullscreen allowtransparency allow="autoplay=1" allowfullscreen></iframe>';

            $('#player').html(html);

            const player = new Plyr('#player', {
                muted: false,
                volume: 1,
                autoplay: true,
                clickToPlay: true,
                noCookie: false, rel: 0, 
                showinfo: 0, 
                iv_load_policy: 3, 
                modestbranding: 1,
                controls: ['play', 'progress', 'current-time', 'volume', 'settings', 'fullscreen'],
            });
            player.play();


            if ($(this).hasClass("active")) {
                $("a#video_url").removeClass("active");
            }
            // Else, the element doesn't have the active class, so we remove it from every element before applying it to the element that was clicked
            else {
                $("a#video_url").removeClass("active");
                $(this).addClass("active");
            }
        });
    });

//    Show first toggle be loading page
    $(document).ready(function() {
        $(".collapse:first").addClass("show");        
    });

</script>
@endsection