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
                    <form action="{{ route('course.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="Course Name">কোর্সের নাম</label>
                                    <input type="text" name="cname" id="cname" class="form-control  @error('cname') is-invalid @enderror" value="{{ old('cname') }}" placeholder="কোর্সের নাম লিখুন" autocomplete="off">
                                    @error('cname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="Course Seat">আসন সংখ্যা</label>
                                    <input type="text" name="cseat" id="cseat" class="form-control @error('cseat') is-invalid @enderror" value="{{ old('cseat') }}" placeholder="আসন সংখ্যা লিখুন" autocomplete="off">
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
                                            data-provide="datepicker" name="cstartdate" value="{{ old('cstartdate') }}">
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
                                        <option value="online">অনলাইন</option>
                                        <option value="online">অফলাইন</option>
                                        <option value="online">অনলাইন/অফলাইন</option>
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
                                    <input type="text" name="cbatch" id="cbatch" class="form-control" value="SS-{{ rand('1' , '1000') }}" placeholder="ব্যাচের নাম্বার লিখুন" autocomplete="off" readonly>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="Course Seat">শিক্ষক/শিক্ষিকা</label>
                                    <select class="form-control select2 @error('cteacher') is-invalid @enderror" name="cteacher" id="cteacher">
                                        <option value="0">শিক্ষক নির্বাচন করুন</option>
                                        @foreach( App\Models\Backend\Admin\Course::teacherlist() as $teachers)
                                        <option value="{{ $teachers->id }}">{{ $teachers->name }}</option>
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
                                            data-provide="datepicker" name="cenddate" value="{{ old('cenddate') }}">
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
                                        <input type="text" class="form-control @error('cprise') is-invalid @enderror" id="autoSizingInputGroup"name="cprise" value="{{ old('cprise') }}" placeholder="কোর্সের মূল্য">
                                        <div class="input-group-text">BDT</div>
                                    </div>
                                    @error('cprise')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
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
                                        <th>অ্যাকশন</th>
                                    </tr>
                                    <tr>  
                                        <td class="col-10">
                                            <input type="text" name="moreFields[0][name]" placeholder="কোর্সের ফিচার লিখুন" class="form-control @error('moreFields') is-invalid @enderror" />
                                            @error('moreFields')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </td>
                                        <td class="col-2">
                                            <button type="button" name="add" id="add-btn" class="btn btn-success">আরো যুক্ত করুন</button>
                                        </td>  
                                    </tr>  
                                </table> 
                            </div>

                            <div class="col-md-12 text-right align-right align-self-end justify-content-end float-right">
                                <button class="btn btn-primary btn-block text-right float-right" id="submit" type="submit" name="submit">সাবমিট করুন</button>
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
    $(document).ready(function() {
        $(document).on('submit', 'form', function() {
            $('button').attr('disabled', 'disabled');
            $("#submit").attr("disabled", true);
            $("#submit").text("প্রসেসিং ...");
            $('#submit').append('<div class="spinner-border spinner-border-sm"></div>')
        });
    });

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