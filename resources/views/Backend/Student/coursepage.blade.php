@extends('layouts.master')

@section('title') {{ $course->name }} @endsection

@section('css')
   <!-- Open Graph -->
    <link rel="stylesheet" href="https://unpkg.com/plyr@3/dist/plyr.css">
@endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') {{ $course->name }} @endslot
        @slot('title') Course @endslot
    @endcomponent

    <div class="container">
        <div class="row">
            <div class="col-md-8 p-0">
                <div class="card">
                    <div class="card-body">
                       
                    <div class="plyr__video-embed" id="player">
                        <iframe
                            src="https://www.youtube.com/embed/bhaS8sOfYIo"
                            allowfullscreen
                            allowtransparency
                            allow="autoplay=1"
                        ></iframe>
                    </div>

                    

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body  p-0">
                        <div class="button-group p-3 justify-content-center align-items-center text-center mb-3">
                            <a href="javascrip:void(0)" class="btn btn-info text-left text-start">Claim Certificate</a>
                            <a href="javascrip:void(0)" class="btn btn-warning text-right text-end">Message</a>
                        </div>
                        <!-- Video play list -->
                        <div class="video-list">
                            <div class="video-duration p-3 text-center bg-ss text-white">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6 class="text-white m-0">Course Curriculum</h6>
                                    </div>
                                    <div class="col-md-6 text-end">
                                        <h6 class="text-white m-0">09:56:05</h6>
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
        });
    });

</script>
@endsection