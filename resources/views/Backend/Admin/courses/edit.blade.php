@extends('layouts.master')

@section('title') {{ 'কোর্স তৈরি করুন' }} @endsection
@section('css')
<link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ URL::asset('/assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="{{ URL::asset('/assets/libs/datepicker/datepicker.min.css') }}">

@endsection
@section('content')

    @component('components.breadcrumb')
        @slot('li_1') কোর্স ম্যানেজ @endslot
        @slot('title') কোর্স তৈরি @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">কোর্সের বেসিক তথ্য</h2><hr>
                    <form action="{{ route('course.update', $courses->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="Course Name">কোর্সের নাম</label>
                                    <input type="text" name="cname" id="cname" class="form-control  @error('cname') is-invalid @enderror" value="{{ old('cname', $courses->name) }}" placeholder="কোর্সের নাম লিখুন" autocomplete="off">
                                    @error('cname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="Course Seat">আসন সংখ্যা</label>
                                    <input type="text" name="cseat" id="cseat" class="form-control @error('cseat') is-invalid @enderror" value="{{ old('cseat', $courses->student_capacity) }}" placeholder="আসন সংখ্যা লিখুন" autocomplete="off">
                                    @error('cseat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="Course startdate">ক্লাস শুরু তারিখ</label>
                                    <div class="input-group" id="datepicker1">
                                        <input type="text" class="form-control @error('cstartdate') is-invalid @enderror" placeholder="দিন মাস, বছর"
                                            data-date-format="dd M, yyyy" data-date-container='#datepicker1'
                                            data-provide="datepicker" name="cstartdate" value="{{ old('cstartdate', $courses->start_on) }}">
                                        <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                    </div>
                                    @error('cstartdate')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="Course Locatoin">ক্লাসের লোকেশন</label>
                                    <select class="form-control select2 @error('clocation') is-invalid @enderror" name="clocation" id="clocation" >
                                        <option value="0">লোকেশন নির্বাচন করুন</option>
                                        <option value="online" @if( $courses->class_location == 'online' ) selected @endif>অনলাইন</option>
                                        <option value="offline" @if( $courses->class_location == 'offline' ) selected @endif>অফলাইন</option>
                                        <option value="online-offline" @if( $courses->class_location == 'online-offline' ) selected @endif>অনলাইন/অফলাইন</option>
                                    </select>
                                    @error('clocation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="Course Batch">ব্যাচের নাম্বার</label>
                                    <input type="text" name="cbatch" id="cbatch" class="form-control" value="{{ $courses->batch_no }}" placeholder="ব্যাচের নাম্বার লিখুন" autocomplete="off" readonly>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="Course Seat">শিক্ষক/শিক্ষিকা</label>
                                    <select class="form-control select2 @error('cteacher') is-invalid @enderror" name="cteacher" id="cteacher">
                                        <option value="0">শিক্ষক নির্বাচন করুন</option>
                                        @foreach( App\Models\Backend\Admin\Course::teacherlist() as $teachers)
                                        <option value="{{ $teachers->id }}" @if( $courses->teacher == $teachers->id ) selected @endif >{{ $teachers->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('cteacher')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="Course endate">ক্লাস শেষ তারিখ</label>
                                    <div class="input-group" id="datepicker1">
                                        <input type="text" class="form-control @error('cenddate') is-invalid @enderror" placeholder="দিন মাস, বছর"
                                            data-date-format="dd M, yyyy" data-date-container='#datepicker1'
                                            data-provide="datepicker" name="cenddate" value="{{ old('cenddate', $courses->end_on) }}">
                                        <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                    </div>
                                    @error('cenddate')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="Course price">কোর্সের মূল্য</label>
                                    <div class="input-group">
                                        <div class="input-group-text">৳</div>
                                        <input type="text" class="form-control @error('cprise') is-invalid @enderror" id="autoSizingInputGroup"name="cprise" value="{{ old('cprise', $courses->price) }}" placeholder="কোর্সের মূল্য">
                                        <div class="input-group-text">BDT</div>
                                    </div>
                                    @error('cprise')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-3 col-6">
                                <label for="Total Class">মোট ক্লাস</label>
                                <input type="text" name="cclasscount" id="cclasscount" class="form-control  @error('cclasscount') is-invalid @enderror" value="{{ old('cclasscount', $courses->class_count) }}" placeholder="মোট ক্লাস" autocomplete="off">
                                @error('cclasscount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3 col-6">
                                <label for="Category Course">ক্যাটাগরি</label>
                                <select class="form-select form-control select2" name="category" id="category">
                                    @foreach( App\Models\Backend\Admin\Category::all() as $category )
                                        <option value="{{ $category->id }}" @if($courses->category_id == $category->id) selected @endif>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                               
                                @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3 col-6">
                                <label for="Category Level">কোর্স লেভেল</label>
                                <select class="form-select form-control select2" name="level" id="level">
                                   <option value="Beginner" @if($courses->level == 'Beginner') selected @endif>Beginner</option>
                                   <option value="Medium" @if($courses->level == 'Medium') selected @endif>Medium</option>
                                   <option value="Expert" @if($courses->level == 'Expert') selected @endif>Expert</option>
                                   <option value="All Level" @if($courses->level == 'All Level') selected @endif>All Level</option>
                                </select>
                               
                                @error('level')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3 col-6">
                                <label for="Category Skills">কোর্স স্কিল</label>
                                <select class="form-select form-control select2" name="skills" id="level">
                                   <option value="Beginner">Beginner</option>
                                   <option value="Medium">Medium</option>
                                   <option value="Expert">Expert</option>
                                   <option value="All Level">All Level</option>
                                </select>
                               
                                @error('skills')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="description">কোর্সের বিবরণ</label>
                                <textarea name="c_desc" class="form-control" id="c_desc" cols="10" rows="5"></textarea>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="আপলোড ফটো">আপলোড ফটো</label>
                                    <div class="" id="logo">

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 mt-3">
                                <h2 class="card-title">কোর্সের ফিচার</h2><hr>
                                <table class="table table-bordered" id="dynamicAddRemove">  
                                    <tr>
                                        <th>ফিচার নাম</th>
                                    </tr>
                                    @foreach( $coursefeatures as $key => $value )
                                    <tr>                                        
                                        <td class="col-10">
                                            <input type="text" name="moreFields[{{ $key++ }}][name]" placeholder="কোর্সের ফিচার লিখুন" class="form-control @error('moreFields') is-invalid @enderror" value="{{ $value->name }}" />
                                            @error('moreFields')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </td>                                        
                                        
                                    </tr>  
                                    @endforeach
                                </table> 
                            </div>

                            <div class="col-md-12 text-right align-right align-self-end justify-content-end float-right">
                                <button class="btn btn-primary btn-block text-right float-right" type="submit" id="submit" name="submit">সাবমিট করুন</button>
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

@endsection
@section('script')
<script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/datepicker/datepicker.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/pages/spartan-multi-image-picker-min.js') }}"></script>
<script>
    $(document).ready(function(){
        $('#logo').spartanMultiImagePicker({
            fieldName: 'image',
            maxCount: 1,
            rowHeight: '100px',
            groupClassName: 'col-md-12 com-sm-12 com-xs-12',
            maxFileSize: '',
            dropFileLabel: 'আপলোড করুন',
            allowExt: 'png|jpg|jpeg',
            onExtensionErr: function(index, file){
                Swal.fire({icon:'error', title:'দু:খিত...',text: 'শুধুমাত্র .PNG, .JPG, JPEG সার্পোটেড'});
            }
        });

        $('input[name="logo"]').prop('required',true);

        $('.remove-files').on('click', function(){
            $(this).parents('.col-md-12').remove();
        });


        @if( $courses->image )
        $('#logo img.spartan_image_placeholder').css('display','none');
        $('#logo .spartan_remove_row').css('display','none');
        $('#logo .img_').css('display','block');
        $('#logo .img_').attr('src','{{ asset("assets/images/course/$courses->image") }}');
        @endif
    });
    $(document).ready(function() {
        $(document).on('submit', 'form', function() {
            $('button').attr('disabled', 'disabled');
            $("#submit").attr("disabled", true);
            $("#submit").text("প্রসেসিং ...");
            $('#submit').append('<div class="spinner-border spinner-border-sm"></div>')
        });
    });
</script>
<script type="text/javascript">
    var i = 0;

    $("#add-btn").click(function(){
        ++i;
        $("#dynamicAddRemove").append('<tr><td><input type="text" name="moreFields['+i+'][name]" placeholder="কোর্চের ফিচার লিখুন" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">রিমুভ করুন</button></td></tr>');
    });
        $(document).on('click', '.remove-tr', function(){  
        $(this).parents('tr').remove();
    });  

</script>
@endsection