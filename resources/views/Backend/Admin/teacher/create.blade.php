@extends('layouts.master')

@section('title') {{ 'শিক্ষক তৈরি করুন' }} @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') শিক্ষক সেটিং @endslot
        @slot('title') শিক্ষক তৈরি করুন  @endslot
    @endcomponent

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('teacher.store') }}" method="post" id="teacherRgter" class="needs-validation" enctype="multipart/form-data" novalidate>
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <h4>শিক্ষকের বেসিক তথ্য</h4><hr> 
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="First Name" class="form-label">ডাক নাম</label>
                                    <input type="text" name="name" class="form-control" id="FirstName" placeholder="ডাক নাম লিখুন"
                                        value="{{ old('name') }}" required>
                                    <div class="valid-feedback">
                                        ঠিক আছে
                                    </div>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="Last Name" class="form-label">সম্পন্ন নাম</label>
                                    <input type="text" name="lastname" class="form-control" id="LastName" placeholder="সম্পন্ন নাম লিখুন" value="{{ old('lastname') }}"
                                        required>
                                    <div class="valid-feedback">
                                        ঠিক আছে
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">ই-মেইল অ্যাড্রেস</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="ই-মেইল অ্যাড্রেস লিখুন" value="{{ old('email') }}"
                                        required>
                                    <div class="valid-feedback">
                                        ঠিক আছে
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">মোবাইল নাম্বার</label>
                                    <input type="phone" name="phone" class="form-control" id="phone" placeholder="মোবাইল নং লিখুন" value="{{ old('phone') }}"
                                        required>
                                    <div class="valid-feedback">
                                        ঠিক আছে
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="dob" class="form-label">জন্ম তারিখ</label>
                                    <input type="date" name="dob" class="form-control" id="dob" placeholder="দিন - মাস - বছর" value="{{ old('date') }}"
                                        required>
                                    <div class="valid-feedback">
                                        ঠিক আছে
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="teacherId" class="form-label">টিচার আইডি </label>
                                    <input type="text" name="teacherId" value="SST-{{ rand('1', 100000) }}" class="form-control" id="teacherId" placeholder="দিন - মাস - বছর" readonly >
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="address" class="form-label">বাড়ি / হোল্ডিং / গ্রাম</label>
                                    <textarea name="address" class="form-control" id="address" cols="5" rows="3" required>{{ old('address') }}</textarea>
                                    <div class="valid-feedback">
                                        ঠিক আছে
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="division" class="form-label">বিভাগ</label>
                                    <select class="form-select" id="division" name="division" required>
                                        <option selected disabled value="">নির্বাচন করুন...</option>
                                        <!-- all division here -->
                                        @foreach( $divisions as $division )
                                            <option value="{{ $division->id }}">{{ $division->bn_name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        অনুগ্রহ করে বিভাগ নির্বাচন করুন
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="district" class="form-label">জেলা</label>
                                    <select class="form-select" id="district" name="district" required>
                                        <option selected disabled value="">নির্বাচন করুন...</option>
                                        <!-- all district here -->                                       
                                    </select>
                                    <div class="invalid-feedback">
                                        অনুগ্রহ করে জেলা নির্বাচন করুন
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <div class="mb-3">
                                    <label for="thana" class="form-label">থানা</label>
                                    <select class="form-select" id="thana" name="thana" required>
                                        <option selected disabled value="">নির্বাচন করুন...</option>
                                        <!-- all thana here -->                                       
                                    </select>
                                    <div class="invalid-feedback">
                                        অনুগ্রহ করে থানা নির্বাচন করুন
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <h4>শিক্ষাগত যোগ্যতা</h4><hr> 
                            </div>
                            <div class="col-md-12 mb-3">
                                <table class="table table-bordered" id="dynamicAddRemove">  
                                        <tr>
                                            <th>পরীক্ষার নাম</th>
                                            <th>প্রতীষ্ঠানের নাম</th>
                                            <th>পাসের সন</th>
                                            <th>অ্যাকশন</th>
                                        </tr>
                                        <tr>  
                                            <td class="col-4">
                                                <select name="moreFields[0][name]" id="educationanem" class="form-control">
                                                    <option value="0">নির্বাচন করুন</option>
                                                    <option value="1">SSC</option>
                                                    <option value="2">HSC</option>
                                                    <option value="3">B.Sc(Engineering/Architecture)</option>
                                                    <option value="4">B.Sc(Agricultural Science)</option>
                                                    <option value="5">M.B.B.S./B.D.S</option>
                                                    <option value="6">Honors</option>
                                                    <option value="7">Pass Course</option>
                                                    <option value="8">Fazil</option>
                                                    <option value="9">Graduation Equivalent</option>
                                                </select>
                                                @error('moreFields')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </td>
                                            <td class="col-4">
                                                <input type="text" name="moreFields[0][institue]" placeholder="প্রতিষ্ঠানের নাম লিখুন" class="form-control @error('moreFields') is-invalid @enderror" />
                                            </td>  
                                            <td>
                                                <select name="moreFields[0][passingyear]" id="educationanem" class="form-control">
                                                    <option value="0">নির্বাচন করুন</option>
                                                    @foreach(array_combine(range(date("Y"), 1990), range(date("Y"), 1990)) as $year)
                                                        <option value="{{ $year }}">{{ $year }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <button type="button" name="add" id="add-btn" class="btn btn-success"> + </button>
                                            </td>
                                        </tr> 
                                    </table> 
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <h4>কাজের অভিজ্ঞতা</h4><hr> 
                            </div>
                            <div class="col-md-12 mb-3">
                                <table class="table table-bordered" id="dynamicAddRemoveExperience">  
                                    <tr>
                                        <th>প্রতিষ্ঠানের নাম</th>
                                        <th>শুরু তারিখ</th>
                                        <th>শেষ তারিখ</th>
                                        <th>অ্যাকশন</th>
                                    </tr>
                                    <tr>  
                                        <td class="col-4">
                                            <input type="text" name="experience[0][companyname]" placeholder="প্রতিষ্ঠানের নাম লিখুন" class="form-control @error('moreFields') is-invalid @enderror" />
                                        </td>
                                        <td class="col-4">
                                            <select name="experience[0][fromdate]" id="educationanem" class="form-control">
                                                <option value="0">নির্বাচন করুন</option>
                                                @foreach(array_combine(range(date("Y"), 1990), range(date("Y"), 1990)) as $year)
                                                    <option value="{{ $year }}">{{ $year }}</option>
                                                @endforeach
                                            </select>
                                        </td>  
                                        <td>
                                            <select name="experience[0][todate]" id="educationanem" class="form-control">
                                                <option value="0">নির্বাচন করুন</option>
                                                @foreach(array_combine(range(date("Y"), 1990), range(date("Y"), 1990)) as $year)
                                                    <option value="{{ $year }}">{{ $year }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <button type="button" name="add" id="add-experiencebtn" class="btn btn-success"> + </button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="" id="avater">

                                </div>
                            </div>
                        </div>
                        

                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                            <label class="form-check-label" for="invalidCheck">
                                আপনি কি আমাদের কন্ডিশনের সাথে একমত?
                            </label>
                            <div class="invalid-feedback">
                                সাবমিট করার আগে অবশ্যই আপনাকে আমাদের কন্ডিশনের সাথে একমত হতে হবে.
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-primary" id="submit" type="submit">সাবমিট করুন</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end card -->
        </div> <!-- end col -->
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
<script src="{{ URL::asset('/assets/libs/parsleyjs/parsleyjs.min.js') }}"></script>

<script src="{{ URL::asset('/assets/js/pages/form-validation.init.js') }}"></script>
<script src="{{ URL::asset('/assets/js/pages/spartan-multi-image-picker-min.js') }}"></script>

<script>
    $(document).ready(function(){
        $('#avater').spartanMultiImagePicker({
            fieldName: 'image',
            maxCount: 1,
            rowHeight: '200px',
            groupClassName: 'col-md-3 com-sm-12 com-xs-12',
            maxFileSize: '',
            dropFileLabel: 'আপলোড করুন',
            allowExt: 'png|jpg|jpeg',
            onExtensionErr: function(index, file){
                Swal.fire({icon:'error', title:'দু:খিত...',text: 'শুধুমাত্র .PNG, .JPG, JPEG সার্পোটেড'});
            }
        });
    });

    $("#division").on('change',function(e){
        e.preventDefault();
        var ddlDistrict=$("#district");
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    $.ajax({
        type:'POST',
        url: "{{url('/district-by-division')}}",
        data:{_token:$('input[name=_token]').val(),division:$(this).val()},
        success:function(response){
            // var jsonData=JSON.parse(response);

            $('option', ddlDistrict).remove();
            $('#district').append('<option value="">--নির্বাচন করুন--</option>');
            $.each(response, function(){
            $('<option/>', {
                'value': this.id,
                'text': this.bn_name
            }).appendTo('#district');
            });
        }
    });
    });

    $("#district").on('change',function(e){
    e.preventDefault();
    var ddlthana=$("#thana");
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type:'POST',
        url: "{{url('/thana-by-district')}}",
        data:{_token:$('input[name=_token]').val(),districts:$(this).val()},
        success:function(response){

            // var jsonData=JSON.parse(response);

            $('option', ddlthana).remove();
            $('#thana').append('<option value="">--নির্বাচন করুন--</option>');
            $.each(response, function(){
            $('<option/>', {
                'value': this.id,
                'text': this.bn_name
            }).appendTo('#thana');
            });
        }
        });
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
        $("#dynamicAddRemove").append('<tr><td><select name="moreFields['+i+'][name]" id="educationanem" class="form-control"><option value="0">নির্বাচন করুন</option><option value="1">SSC</option><option value="2">HSC</option><option value="3">B.Sc(Engineering/Architecture)</option><option value="4">B.Sc(Agricultural Science)</option><option value="5">M.B.B.S./B.D.S</option><option value="6">Honors</option><option value="7">Pass Course</option><option value="8">Fazil</option><option value="9">Graduation Equivalent</option></select></td><td><input type="text" name="moreFields['+i+'][institue]" placeholder="প্রতিষ্ঠানের নাম লিখুন" class="form-control"/></td><td><select name="moreFields['+i+'][passingyear]" id="educationanem" class="form-control"><option value="0">নির্বাচন করুন</option>@foreach(array_combine(range(date("Y"), 1990), range(date("Y"), 1990)) as $year)  <option value="{{ $year }}">{{ $year }}</option>   @endforeach </select>  </td><td><button type="button" class="btn btn-danger remove-tr">-</button></td></tr>');
    });
        $(document).on('click', '.remove-tr', function(){  
        $(this).parents('tr').remove();
    });
    
    $("#add-experiencebtn").click(function(){
        ++i;
        $("#dynamicAddRemoveExperience").append('<tr><td><input type="text" name="experience['+i+'][companyname]" placeholder="প্রতিষ্ঠানের নাম লিখুন" class="form-control @error('experience') is-invalid @enderror" /></td><td><select name="experience['+i+'][fromdate]" id="educationanem" class="form-control"><option value="0">নির্বাচন করুন</option> @foreach(array_combine(range(date("Y"), 1990), range(date("Y"), 1990)) as $year) <option value="{{ $year }}">{{ $year }}</option> @endforeach</select></td><td><select name="experience['+i+'][todate]" id="educationanem" class="form-control"> <option value="0">নির্বাচন করুন</option> @foreach(array_combine(range(date("Y"), 1990), range(date("Y"), 1990)) as $year) <option value="{{ $year }}">{{ $year }}</option> @endforeach</select></td><td><button type="button" class="btn btn-danger remove-tr">-</button></td></tr>');
    });
        $(document).on('click', '.remove-tr', function(){  
        $(this).parents('tr').remove();
    });
    
    

</script>
@endsection