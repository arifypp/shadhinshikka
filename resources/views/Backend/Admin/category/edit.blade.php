@extends('layouts.master')

@section('title') {{ 'ক্যাটাগরি তৈরি' }} @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') ক্যাটাগরি তৈরি করুন @endslot
        @slot('title') ক্যাটাগরি তৈরি @endslot
    @endcomponent
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('category.update', $cat->id) }}" method="post" class="needs-validation" novalidate>
                        @csrf 
                        <div class="row">
                            <div class="form-group mb-3 col-4">
                                <label for="Category Name">ক্যাটাগরি নাম</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $cat->name) }}" placeholder="ক্যাটাগরি নাম" required>
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
                                <label for="Category Status">ক্যাটাগরি স্ট্যাটাস</label>
                                <select class="form-select" name="status" required>
                                    <option selected disabled value="">নির্বাচন করুন...</option>
                                    <option value="Active" @if($cat->status == 'Active') selected @endif>অ্যাকটিভ</option>
                                    <option value="Inactive" @if($cat->status == 'Inactive') selected @endif>ইন-অ্যাকটিভ</option>
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
                                <label for="Category Parent">প্রাইমারি ক্যাটাগরি</label>
                                <select class="form-select" name="parent_category">
                                    <option selected disabled value="">নির্বাচন করুন...</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}" @if($category->id == $cat->id) selected @endif>{{$category->name}}</option>
                                    @if ($category->childs()->count() > 0 )
                                            
                                        @include('Backend.Admin.category.editsubcategories', ['subcategories' => $category->childs, 'parent' => $category->name])

                                    @endif
                                    @endforeach
                                </select>
                                <div class="valid-feedback">
                                    ঠিক আছে
                                </div>
                            </div>
                            <div class="form-group mb-3 col-12">
                                <label for="Category Description">ক্যাটাগরি বিবরণ</label>
                                <textarea name="cat_desc" class="form-control" id="cat_desc" cols="5" rows="5" required>{{ old('address', $cat->cat_desc) }}</textarea>
                                <div class="valid-feedback">
                                    ঠিক আছে
                                </div>
                            </div>
                            <div class="form-group text-end">
                                <button type="submit" class="btn btn-primary btn-md btn-block">সাবমিট ক্যাটাগির</button>
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