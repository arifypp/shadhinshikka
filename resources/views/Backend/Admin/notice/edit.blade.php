@extends('layouts.master')

@section('title') {{ 'নোটিশ এডিট' }} @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') নোটিশ এডিট করুন @endslot
        @slot('title') নোটিশ এডিট @endslot
    @endcomponent
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h2 class="card-title text-white">নোটিশ এডিট</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('notice.update', $notice->id) }}" method="post" class="needs-validation" novalidate>
                        @csrf
                        <div class="form-group mb-3">
                            <label for="কোর্সের নাম"> কোর্সের নাম </label>
                            <select name="course" id="course" class="form-control" required>
                                <option selected disabled value="">নির্বাচন করুন...</option>
                                @foreach( $courses as $course )
                                <option value="{{ $course->id }}" @if( $notice->course_id ==  $course->id) selected @endif>{{ $course->name }}</option>
                                @endforeach
                            </select>
                            <div class="valid-feedback">
                                ঠিক আছে
                            </div>
                            @error('course')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                       
                        <div class="form-group mb-3">
                            <label for="রিসিভার"> রিসিভার </label>
                            <select name="reciever" id="reciever" class="form-control" required>
                                <option selected disabled value="">নির্বাচন করুন...</option>
                                <option value="1" @if( $notice->reciever == '1' ) selected @endif>শিক্ষার্থী</option>
                                <option value="2" @if( $notice->reciever == '2' ) selected @endif>শিক্ষক</option>
                            </select>
                            <div class="valid-feedback">
                                ঠিক আছে
                            </div>
                            @error('reciever')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="টাইটেল"> নোটিশ টাইটেল </label>
                            <input type="text" name="title" value="{{ old('title', $notice->title) }}" id="title" class="form-control" placeholder="Enter Title" required>
                            <div class="valid-feedback">
                                ঠিক আছে
                            </div>
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="ম্যাসেজ"> ম্যাসেজ </label>
                            <textarea name="message" id="message" cols="30" rows="10" class="form-control" required>{{ old('message', $notice->description) }}</textarea>
                            <div class="valid-feedback">
                                ঠিক আছে
                            </div>
                            @error('message')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary" id="submit"> নোটিশ আপডেট করুন </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script src="{{ URL::asset('/assets/js/pages/form-validation.init.js') }}"></script>

<script>
    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            toastr.error("{{ $error }}");
        @endforeach
    @endif
</script>

<script>
    $(document).ready(function() {
        $(document).on('submit', 'form', function() {
            $('button').attr('disabled', 'disabled');
            $("#submit").attr("disabled", true);
            $("#submit").text("প্রসেসিং ...");
            $('#submit').append('<div class="spinner-border spinner-border-sm"></div>')
        });
    });
</script>
@endsection