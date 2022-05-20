@extends('layouts.master')

@section('title') {{ 'রিসোর্স তৈরি করুন' }} @endsection
@section('css')
<link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ URL::asset('/assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="{{ URL::asset('/assets/libs/datepicker/datepicker.min.css') }}">

@endsection
@section('content')

    @component('components.breadcrumb')
        @slot('li_1') রিসোর্স ম্যানেজ @endslot
        @slot('title') রিসোর্স তৈরি @endslot
    @endcomponent

    <div class="checkout-tabs">
        <div class="row">
            <div class="col-xl-2 col-sm-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-basic-info-tab" data-bs-toggle="pill" href="#v-basic-info"
                        role="tab" aria-controls="v-basic-info" aria-selected="true">
                        <i class="bx bxs-book d-block check-nav-icon mt-4 mb-2"></i>
                        <p class="font-weight-bold mb-4">Basic Info</p>
                    </a>
                    <a class="nav-link" id="v-video-url-tab" data-bs-toggle="pill" href="#v-video-url" role="tab"
                        aria-controls="v-video-url" aria-selected="false">
                        <i class="bx bx-video d-block check-nav-icon mt-4 mb-2"></i>
                        <p class="font-weight-bold mb-4">Video</p>
                    </a>
                    <a class="nav-link" id="attached-file-tab-tab" data-bs-toggle="pill" href="#attached-file-tab" role="tab"
                        aria-controls="attached-file-tab" aria-selected="false">
                        <i class="bx bx-bookmark-plus d-block check-nav-icon mt-4 mb-2"></i>
                        <p class="font-weight-bold mb-4">Attachment</p>
                    </a>
                </div>
            </div>
            <div class="col-xl-10 col-sm-9">
                <div class="card">
                    <div class="card-body">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-basic-info" role="tabpanel"
                                aria-labelledby="v-basic-info-tab">
                                <div>
                                    <h4 class="card-title">Basic Info Format</h4>
                                    <p class="card-title-desc">Fill all information below</p>
                                    <form action="{{ route('resource.basicinfo') }}" method="post" id="basic-info">
                                        @csrf
                                        <div class="form-group row mb-4">
                                            <label for="topic-name" class="col-md-2 col-form-label">Topic Name</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="name" placeholder="Enter topic name">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label for="section-title" class="col-md-2 col-form-label">Section Title</label>
                                            <div class="col-md-10">
                                                <select name="lecture_title" id="lecture-title" class="form-control">
                                                    <option value="0">Please select lecture</option>
                                                    @foreach( $resources as $value )
                                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label for="example-textarea" class="col-md-2 col-form-label">Describe here</label>
                                            <div class="col-md-10">
                                                <textarea class="form-control" name="desc" id="elm1" rows="15"
                                                    placeholder="Write some note.."></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group mb-0 text-end">
                                                <button type="submit" class="btn bg-ss text-end">Submit Now</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-video-url" role="tabpanel"
                                aria-labelledby="v-video-url-tab">
                                <div>
                                    <h4 class="card-title">Enter Video information</h4>
                                    <p class="card-title-desc">Fill all information below</p>

                                    <div>
                                        <div class="form-check form-check-inline font-size-16">
                                            <input class="form-check-input" type="radio" name="vide-url-link"
                                                id="vide-url-link1" checked>
                                            <label class="form-check-label font-size-13" for="vide-url-link1"><i
                                                    class="fa fa-link me-1 font-size-20 align-top"></i> External Link</label>
                                        </div>
                                        <div class="form-check form-check-inline font-size-16">
                                            <input class="form-check-input" type="radio" name="vide-url-link"
                                                id="vide-url-link2">
                                            <label class="form-check-label font-size-13" for="vide-url-link2"><i
                                                    class="fab fa-youtube me-1 font-size-20 align-top"></i> Youtube</label>
                                        </div>
                                        <div class="form-check form-check-inline font-size-16">
                                            <input class="form-check-input" type="radio" name="vide-url-link"
                                                id="vide-url-link3">
                                            <label class="form-check-label font-size-13" for="vide-url-link3"><i
                                                    class="fab fa-vimeo-v me-1 font-size-20 align-top"></i> Vimeo
                                                Delivery</label>
                                        </div>
                                    </div>

                                    <h5 class="mt-5 mb-3 font-size-15">For the info</h5>
                                    <div class="p-4 border">
                                        <form action="{{ route('resource.video') }}" method="post" id="video-linl-url-form">
                                            @csrf
                                            <div class="form-group mb-3">
                                                <label for="topic-name" class="col-md-2 col-form-label">Topic Name</label>
                                                <div class="col-md-12">
                                                    <input type="text" class="form-control" name="name" placeholder="Enter topic name">
                                                </div>
                                            </div>
                                            <div class="form-group mb-3">
                                            <label for="Title">Section Title</label>
                                            <select name="section_title" id="" class="form-select">
                                                <option value="0">Please select section</option>
                                                @foreach( $resources as $value )
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group mb-3 video-input">
                                                        <label for="video Url">Video Url</label>
                                                        <input type="text" name="video_url" class="form-control" id="videourl"
                                                            placeholder="Enter Video Url">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group mb-3 video-duration">
                                                        <label for="video Url">Video Duration</label>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <input class="form-control" type="text" id="duration" name="duration[]" placeholder="hh">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input class="form-control" type="text" id="duration" name="duration[]" placeholder="mm">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input class="form-control" type="text" id="duration" name="duration[]" placeholder="ss">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group mb-0 text-end">
                                                    <button type="submit" class="btn bg-ss text-end">Submit Now</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="attached-file-tab" role="tabpanel"
                                aria-labelledby="attached-file-tab-tab">
                                <div class="card shadow-none border mb-0">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Attached File Here</h4>
                                        <form action="{{ route('resource.attachment') }}" method="post" id="attachedment-url">
                                            @csrf
                                            <div class="form-group mb-0">
                                            <label for="Title">Lecture Title</label>
                                            <select name="lecture-title" id="" class="form-control">
                                                <option value="0">Please select lecture</option>
                                                @foreach( $resources as $value )
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group mt-4 mb-3 Attached">
                                                        <label for="video Url">Attached File Here</label>
                                                        <input type="file" name="attach-file" class="form-control" id="file">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group mb-0 text-end">
                                                        <button type="submit" class="btn bg-ss text-end">Submit Now</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
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
@endsection