@extends('layouts.master')

@section('title') {{ 'শিক্ষার্থী এডিট করুন' }} @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') শিক্ষার্থী সেটিং @endslot
        @slot('title') শিক্ষার্থী এডিট করুন  @endslot
    @endcomponent

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <!-- SReset Password Modal -->
                    <div class="modal fade" id="ResetPassword{{ $user->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Reset Password Now</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('student.updatePassword', $user->id) }}" method="post">
                                        @csrf
                                        <div class="form-group col-12 mb-3">
                                            <label for="Enter Password">Enter Password</label>
                                            <input type="password" name="password" id="password" placeholder="Enter password" class="form-control">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-12 mb-3">
                                            <label for="Enter Password">Confirm Password</label>
                                            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Enter confirm password" class="form-control">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Reset Password</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('student.update', $user->id) }}" method="post" id="teacherRgter" class="needs-validation" enctype="multipart/form-data" novalidate>
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="float-left">শিক্ষার্থীদের বেসিক তথ্য</h4>
                                <div class="reset-password text-end">
                                    <button type="button" class="btn bg-ss" data-bs-toggle="modal"
                            data-bs-target="#ResetPassword{{ $user->id }}">Reset Password</button>
                                </div>
                                <hr> 
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="First Name" class="form-label">সম্পন্ন নাম</label>
                                    <input type="text" name="name" class="form-control" id="FirstName" placeholder="ডাক নাম লিখুন"
                                        value="{{ old('name', $user->name) }}" required>
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
                                    <label for="email" class="form-label">ই-মেইল অ্যাড্রেস</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="ই-মেইল অ্যাড্রেস লিখুন" value="{{ old('email', $user->email) }}"
                                        required>
                                    <div class="valid-feedback">
                                        ঠিক আছে
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">মোবাইল নাম্বার</label>
                                    <input type="phone" name="phone" class="form-control" id="phone" placeholder="মোবাইল নং লিখুন" value="{{ old('phone', $user->phone) }}"
                                        required>
                                    <div class="valid-feedback">
                                        ঠিক আছে
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="dob" class="form-label">জন্ম তারিখ</label>
                                    <input type="date" name="dob" class="form-control" id="dob" placeholder="দিন - মাস - বছর" value="{{ old('date', $user->dob) }}"
                                        required>
                                    <div class="valid-feedback">
                                        ঠিক আছে
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="teacherId" class="form-label">টিচার আইডি </label>
                                    <input type="text" name="teacherId" value="{{ $user->studentid }}" class="form-control" id="teacherId" placeholder="দিন - মাস - বছর" readonly >
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="address" class="form-label">বাড়ি / হোল্ডিং / গ্রাম</label>
                                    <textarea name="address" class="form-control" id="address" cols="5" rows="3" required>{{ old('address', $user->address) }}</textarea>
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
                                        </tr>
                                    @foreach( $Education as $key => $edudata )
                                        <tr>  
                                            <td class="col-4">
                                                <select name="moreFields[{{ $key+1 }}][ExamName]" id="educationanem" class="form-control">
                                                    <option value="0" @if($edudata->ExamName == 0) selected @endif>নির্বাচন করুন</option>
                                                    <option value="1" @if($edudata->ExamName == 1) selected @endif>SSC</option>
                                                    <option value="2" @if($edudata->ExamName == 2) selected @endif>HSC</option>
                                                    <option value="3" @if($edudata->ExamName == 3) selected @endif>B.Sc(Engineering/Architecture)</option>
                                                    <option value="4" @if($edudata->ExamName == 4) selected @endif>B.Sc(Agricultural Science)</option>
                                                    <option value="5" @if($edudata->ExamName == 5) selected @endif>M.B.B.S./B.D.S</option>
                                                    <option value="6" @if($edudata->ExamName == 6) selected @endif>Honors</option>
                                                    <option value="7" @if($edudata->ExamName == 7) selected @endif>Pass Course</option>
                                                    <option value="8" @if($edudata->ExamName == 8) selected @endif>Fazil</option>
                                                    <option value="9" @if($edudata->ExamName == 9) selected @endif>Graduation Equivalent</option>
                                                </select>
                                                @error('moreFields')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </td>
                                            <td class="col-4">
                                                <input type="text" name="moreFields[{{ $key+1 }}][InstituteName]" placeholder="প্রতিষ্ঠানের নাম লিখুন" value="{{ $edudata->InstituteName }}" class="form-control @error('moreFields') is-invalid @enderror" />
                                            </td>  
                                            <td>
                                                <select name="moreFields[0][PassingYear]" id="educationanem" class="form-control">
                                                    <option value="0">নির্বাচন করুন</option>
                                                    @foreach(array_combine(range(date("Y"), 1990), range(date("Y"), 1990)) as $year)
                                                        <option value="{{ $year }}" @if( $edudata->PassingYear ==  $year ) selected @endif>{{ $year }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                    @endforeach 
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
                                    </tr>
                                @foreach( $Experiece as $key => $exdata )
                                    <tr>  
                                        <td class="col-4">
                                            <input type="text" name="experience[{{$key+1}}][companyname]" placeholder="প্রতিষ্ঠানের নাম লিখুন"  value="{{ $exdata->InstituteName }}" class="form-control @error('moreFields') is-invalid @enderror" />
                                        </td>
                                        <td class="col-4">
                                            <select name="experience[{{$key+1}}][fromdate]" id="educationanem" class="form-control">
                                                <option value="0">নির্বাচন করুন</option>
                                                @foreach(array_combine(range(date("Y"), 1990), range(date("Y"), 1990)) as $year)
                                                    <option value="{{ $year }}" @if( $exdata->from_date == $year ) selected @endif>{{ $year }}</option>
                                                @endforeach
                                            </select>
                                        </td>  
                                        <td>
                                            <select name="experience[{{$key+1}}][todate]" id="todate" class="form-control">
                                                <option value="0">নির্বাচন করুন</option>
                                                @foreach(array_combine(range(date("Y"), 1990), range(date("Y"), 1990)) as $year)
                                                    <option value="{{ $year }}" @if( $exdata->end_date == $year ) selected @endif>{{ $year }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                    @endforeach
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


        $('.remove-files').on('click', function(){
            $(this).parents('.col-md-3').remove();
        });

        @if( $user->avatar )
            $('#avater img.spartan_image_placeholder').css('display','none');
            $('#avater .spartan_remove_row').css('display','none');
            $('#avater .img_').css('display','block');
            $('#avater .img_').attr('src','{{ asset($user->avatar) }}');
        @endif
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
        $("#dynamicAddRemove").append('<tr><td><select name="moreFields['+i+'][ExamName]" id="educationanem" class="form-control"><option value="0">নির্বাচন করুন</option><option value="1">SSC</option><option value="2">HSC</option><option value="3">B.Sc(Engineering/Architecture)</option><option value="4">B.Sc(Agricultural Science)</option><option value="5">M.B.B.S./B.D.S</option><option value="6">Honors</option><option value="7">Pass Course</option><option value="8">Fazil</option><option value="9">Graduation Equivalent</option></select></td><td><input type="text" name="moreFields['+i+'][InstituteName]" placeholder="প্রতিষ্ঠানের নাম লিখুন" class="form-control"/></td><td><select name="moreFields['+i+'][PassingYear]" id="educationanem" class="form-control"><option value="0">নির্বাচন করুন</option>@foreach(array_combine(range(date("Y"), 1990), range(date("Y"), 1990)) as $year)  <option value="{{ $year }}">{{ $year }}</option>   @endforeach </select>  </td><td><button type="button" class="btn btn-danger remove-tr">-</button></td></tr>');
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