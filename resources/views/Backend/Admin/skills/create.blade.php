@extends('layouts.master')

@section('title') {{ 'স্কিলস তৈরি' }} @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') স্কিলস তৈরি করুন @endslot
        @slot('title') স্কিলস তৈরি @endslot
    @endcomponent
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('skills.store') }}" method="post" class="needs-validation" novalidate>
                        @csrf 
                        <div class="row">
                            <div class="form-group mb-3 col-4">
                                <label for="Skills Name">স্কিলস নাম</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" placeholder="স্কিলস নাম" required>
                                <div class="valid-feedback">
                                    ঠিক আছে
                                </div>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3 col-4">
                                <label for="Skills Status">স্কিলস স্ট্যাটাস</label>
                                <select class="form-select" name="status" required>
                                    <option selected disabled value="">নির্বাচন করুন...</option>
                                    <option value="Active">অ্যাকটিভ</option>
                                    <option value="Inactive">ইন-অ্যাকটিভ</option>
                                </select>
                                <div class="valid-feedback">
                                    ঠিক আছে
                                </div>
                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3 col-4">
                                <label for="Skills Parent">প্রাইমারি স্কিলস</label>
                                <select class="form-select" name="parent_id">
                                    <option selected disabled value="">নির্বাচন করুন...</option>
                                    @foreach($skills as $category)
                                    <option value="{{ $category->id }}">{{$category->name}}</option>
                                    @if ($category->childs()->count() > 0 )
                                            
                                        @include('Backend.Admin.skills.subcategories', ['subcategories' => $category->childs, 'parent' => $category->name])

                                    @endif
                                    @endforeach
                                </select>
                                <div class="valid-feedback">
                                    ঠিক আছে
                                </div>
                            </div>
                            <div class="form-group mb-3 col-12">
                                <label for="Category Description">স্কিলস বিবরণ</label>
                                <textarea name="skills_desc" class="form-control" id="cat_desc" cols="5" rows="5" required>{{ old('address') }}</textarea>
                                <div class="valid-feedback">
                                    ঠিক আছে
                                </div>
                            </div>
                            <div class="form-group text-end">
                                <button type="submit" class="btn btn-primary btn-md btn-block">সাবমিট স্কিলস</button>
                            </div>
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
<script src="{{ URL::asset('/assets/js/pages/form-validation.init.js') }}"></script>
@endsection