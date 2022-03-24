@extends('layouts.master')

@section('title') {{'বেসিক সেটিংস'}} @endsection

@section('css')
    <!-- select2 css -->
    <link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') বেসিক সেটিং @endslot
        @slot('title') বেসিক সেটিং @endslot
    @endcomponent

    <div class="checkout-tabs">
        <div class="row">
            <div class="col-xl-2 col-sm-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="general-setting" data-bs-toggle="pill" href="#v-pills-shipping"
                        role="tab" aria-controls="v-pills-shipping" aria-selected="true">
                        <i class="bx bxs-cog d-block check-nav-icon mt-4 mb-2"></i>
                        <p class="font-weight-bold mb-4">বেসিক সেটিং</p>
                    </a>
                    <a class="nav-link" id="mail-setting" data-bs-toggle="pill" href="#v-pills-payment" role="tab"
                        aria-controls="v-pills-payment" aria-selected="false">
                        <i class="bx bx-envelope d-block check-nav-icon mt-4 mb-2"></i>
                        <p class="font-weight-bold mb-4">ই-মেইল সেটিং</p>
                    </a>
                </div>
            </div>
            <div class="col-xl-10 col-sm-9">
                <div class="card">
                    <div class="card-body">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-shipping" role="tabpanel"
                                aria-labelledby="general-setting">
                                <div>
                                    <h4 class="card-title">প্লাটফর্ম সেটিং</h4>
                                    <p class="card-title-desc">তথ্য পূরণ করুন এবং আপডেট করুন</p>
                                    <form action="" method="POST" id="general-form" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row mb-4">
                                            <label for="title" class="col-md-2 col-form-label">ওয়েবসাইট টাইটেল</label>
                                            <div class="col-md-10">
                                                <input type="text" name="title" class="form-control" id="title"
                                                value="{{ config('settings.title') }}"
                                                    placeholder="সাইট টাইটেল লিখুন">
                                            </div>
                                        </div>
                                       
                                        <div class="form-group row mb-4">
                                            <label for="address" class="col-md-2 col-form-label">কোম্পানির ঠিকানা</label>
                                            <div class="col-md-10">
                                                <textarea class="form-control" name="address" id="address" rows="3"
                                                    placeholder="ঠিকানা লিখুন">{{ config('settings.address') }}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row mb-4">
                                            <label for="logo" class="col-md-2 col-form-label">প্লাটফর্ম লোগো</label>
                                            <div class="col-md-10">
                                                <div id="logo">

                                                </div>
                                            </div>
                                            <input type="hidden" name="old_logo" id="old_logo" value="{{ config('settings.logo') }}">
                                        </div>

                                        <div class="form-group row mb-4">
                                            <label for="adminlogo" class="col-md-2 col-form-label">এডমিন লোগো</label>
                                            <div class="col-md-10">
                                                <div id="adminlogo">
                                                    
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row mb-4">
                                            <label for="favicon" class="col-md-2 col-form-label">প্লাটফর্ম ফেভকোন</label>
                                            <div class="col-md-10">
                                                <div id="favicon">
                                                    
                                                </div>
                                            </div>
                                            <input type="hidden" name="old_favicon" id="old_favicon" value="{{ config('settings.favicon') }}">
                                        </div>

                                        <div class="form-group row mb-4">
                                            <label for="adminfevicon" class="col-md-2 col-form-label">এডমিন ফেভকোন</label>
                                            <div class="col-md-10">
                                                <div id="adminfavicon">
                                                    
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row mb-4">
                                            <label for="currency_code" class="col-md-2 col-form-label">কারেন্সি কোড</label>
                                            <div class="col-md-10">
                                                <input type="text" name="currency_code" class="form-control" id="currency_code"
                                                value="{{ config('settings.currency_code') }}"
                                                    placeholder="BDT / USD / NOR">
                                            </div>
                                        </div>

                                        <div class="form-group row mb-4">
                                            <label for="currency_symbol" class="col-md-2 col-form-label">কারেন্সি সিম্বোল</label>
                                            <div class="col-md-10">
                                                <input type="text" name="currency_symbol" class="form-control" id="currency_symbol"
                                                value="{{ config('settings.currency_symbol') }}"
                                                    placeholder="BDT / USD / NOR">
                                            </div>
                                        </div>

                                        <div class="form-group row mb-4">
                                            <label for="currency_symbol" class="col-md-2 col-form-label">কারেন্সি পজিশন</label>
                                            <div class="col-md-10">
                                                <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="currency_position" id="suffix" value="prefix" {{ config('settings.currency_direction') == 'suffix' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="inlineRadio1">Suffix</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="currency_position" id="prefix" value="prefix" {{ config('settings.currency_direction') == 'prefix' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="inlineRadio2">Prefix</label>
                                                </div>

                                            </div>
                                        </div>
                                        
                                        <div class="form-group row mb-4">
                                            <label class="col-md-2 col-form-label">টাইমজোন</label>
                                            <div class="col-md-10">
                                                <select class="form-control select2" title="timezone" name="timezone">
                                                @foreach ($zones_array as $zone)
                                                    <option value="{{ $zone['zone'] }}" {{ config('settings.timezone') == $zone['zone'] ? 'selected' : '' }}>
                                                        {{ $zone['diff_from_GMT'].' - '.$zone['zone'] }}
                                                    </option>
                                                @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row mb-4">
                                            <label class="col-md-2 col-form-label">তারিখ ফরমেট</label>
                                            <div class="col-md-10">
                                                <select class="form-control select2" title="Date Format" name="date_format">
                                                @foreach ($zones_array as $zone)
                                                    <option value="F j, Y" {{ config('settings.date_format') == 'F j, Y' ? 'selected' : '' }}>
                                                        {{ date('F j, Y') }}
                                                    </option>
                                                    <option value="M j, Y" {{ config('settings.date_format') == 'M j, Y' ? 'selected' : '' }}>
                                                        {{ date('M j, Y') }}
                                                    </option>
                                                    <option value="j F, Y" {{ config('settings.date_format') == 'j F, Y' ? 'selected' : '' }}>
                                                        {{ date('j F, Y') }}
                                                    </option>
                                                    <option value="j M, Y" {{ config('settings.date_format') == 'j M, Y' ? 'selected' : '' }}>
                                                        {{ date('j M, Y') }}
                                                    </option>
                                                    <option value="Y-m-d" {{ config('settings.date_format') == 'Y-m-d' ? 'selected' : '' }}>
                                                        {{ date('Y-m-d') }}
                                                    </option>
                                                    <option value="Y-M-d" {{ config('settings.date_format') == 'Y-M-d' ? 'selected' : '' }}>
                                                        {{ date('Y-M-d') }}
                                                    </option>
                                                    <option value="Y/m/d" {{ config('settings.date_format') == 'Y/m/d' ? 'selected' : '' }}>
                                                        {{ date('Y/m/d') }}
                                                    </option>
                                                    <option value="m/d/Y" {{ config('settings.date_format') == 'm/d/Y' ? 'selected' : '' }}>
                                                        {{ date('m/d/Y') }}
                                                    </option>
                                                    <option value="d/m/Y" {{ config('settings.date_format') == 'd/m/Y' ? 'selected' : '' }}>
                                                        {{ date('d/m/Y') }}
                                                    </option>
                                                    <option value="d.m.Y" {{ config('settings.date_format') == 'd.m.Y' ? 'selected' : '' }}>
                                                        {{ date('d.m.Y') }}
                                                    </option>
                                                    <option value="d-m-Y" {{ config('settings.date_format') == 'd-m-Y' ? 'selected' : '' }}>
                                                        {{ date('d-m-Y') }}
                                                    </option>
                                                    <option value="d-M-Y" {{ config('settings.date_format') == 'd-M-Y' ? 'selected' : '' }}>
                                                        {{ date('d-M-Y') }}
                                                    </option>
                                                @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row mb-4">
                                            <label for="invoice_prefix" class="col-md-2 col-form-label">ইনভয়েস প্রেফিক্স</label>
                                            <div class="col-md-10">
                                                <input type="text" name="invoice_prefix" class="form-control" id="invoice_prefix"
                                                value="{{ config('settings.invoice_prefix') }}">
                                            </div>
                                        </div>

                                        <div class="form-group row mb-4">
                                            <label for="invoice_number" class="col-md-2 col-form-label">ইনভয়েস নাম্বার</label>
                                            <div class="col-md-10">
                                                <input type="text" name="invoice_number" class="form-control" id="invoice_number"
                                                value="{{ config('settings.invoice_number') }}">
                                            </div>
                                        </div>

                                        <div class="row mt-4">
                                            <div class="col-sm-6">                                       
                                            </div> <!-- end col -->
                                            <div class="col-sm-6">
                                                <div class="text-end">
                                                    <button type="button" class="btn btn-primary" id="general-save-btn" onclick="save_data('general')">সেভ করুন</button>
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-payment" role="tabpanel"
                                aria-labelledby="v-pills-payment-tab">
                                <div>
                                    <h4 class="card-title">ই-মেইল সেটিংস</h4>
                                    <p class="card-title-desc">প্লাটফম ই-মেইল সেটিংস</p>

                                    <form id="mail-form" method="post">
                                        @csrf
                                        <div class="form-group row mb-4">
                                            <label class="col-md-2 col-form-label">মেইল ড্রাইভার</label>
                                            <div class="col-md-10">
                                                <select class="form-control " title="mail mailer" name="mail_mailer">
                                                @foreach (MAIL_MAILER as $driver)
                                                    <option value="{{ $driver }}" {{ config('settings.mail_mailer') == $driver ? 'selected' : '' }}>
                                                        {{ $driver }}
                                                    </option>
                                                @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row mb-4">
                                            <label for="mail_host" class="col-md-2 col-form-label">মেইল হোস্ট নাম</label>
                                            <div class="col-md-10">
                                                <input type="text" name="mail_host" class="form-control" id="mail_host" value="{{ config('settings.mail_host') }}">
                                            </div>
                                        </div>

                                        <div class="form-group row mb-4">
                                            <label for="mail_username" class="col-md-2 col-form-label">মেইল ইউজার নাম</label>
                                            <div class="col-md-10">
                                                <input type="text" name="mail_username" class="form-control" id="mail_username" value="{{ config('settings.mail_username') }}">
                                            </div>
                                        </div>

                                        <div class="form-group row mb-4">
                                            <label for="mail_password" class="col-md-2 col-form-label">মেইল পাসওয়ার্ড</label>
                                            <div class="col-md-10">
                                                <input type="text" name="mail_password" class="form-control" id="mail_password" value="{{ config('settings.mail_password') }}">
                                            </div>
                                        </div>

                                        <div class="form-group row mb-4">
                                            <label for="mail_from_name" class="col-md-2 col-form-label">সেন্ডার নাম</label>
                                            <div class="col-md-10">
                                                <input type="text" name="mail_from_name" class="form-control" id="mail_from_name" value="{{ config('settings.mail_from_name') }}">
                                            </div>
                                        </div>

                                        <div class="form-group row mb-4">
                                            <label for="mail_port" class="col-md-2 col-form-label">মেইল পোর্ট</label>
                                            <div class="col-md-10">
                                                <input type="text" name="mail_port" class="form-control" id="mail_port" value="{{ config('settings.mail_port') }}">
                                            </div>
                                        </div>

                                        <div class="form-group row mb-4">
                                            <label class="col-md-2 col-form-label">মেইল এন্ক্রিপশন</label>
                                            <div class="col-md-10">
                                                <select class="form-control" title="mail encryption" name="mail_encryption">
                                                @foreach (MAIL_ENCRYPTION as $key => $value)
                                                    <option value="{{ $value }}" {{ config('settings.mail_encryption') == $value ? 'selected' : '' }}>
                                                        {{ $key }}
                                                    </option>
                                                @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mt-4">
                                            <div class="col-sm-6">                                       
                                            </div> <!-- end col -->
                                            <div class="col-sm-6">
                                                <div class="text-end">
                                                    <button type="button" class="btn btn-primary" id="mail-save-btn" onclick="save_data('mail')">সেভ করুন</button>
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                    </form>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection
@section('script')
    <!-- select 2 plugin -->
    <script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>

    <!-- init js -->
    <script src="{{ URL::asset('/assets/js/pages/ecommerce-select2.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/spartan-multi-image-picker-min.js') }}"></script>

<script>
    $(document).ready(function(){
        $('#logo').spartanMultiImagePicker({
            fieldName: 'logo',
            maxCount: 1,
            rowHeight: '100px',
            groupClassName: 'col-md-12 com-sm-12 com-xs-12',
            maxFileSize: '',
            dropFileLabel: 'Drop Here',
            allowExt: 'png|jpg|jpeg',
            onExtensionErr: function(index, file){
                Swal.fire({icon:'error',title:'Oops...',text: 'Only png, jpg and jpeg file format allowed!'});
            }
        });
        $('#adminlogo').spartanMultiImagePicker({
            fieldName: 'adminlogo',
            maxCount: 1,
            rowHeight: '100px',
            groupClassName: 'col-md-12 com-sm-12 com-xs-12',
            maxFileSize: '',
            dropFileLabel: 'Drop Here',
            allowExt: 'png|jpg|jpeg',
            onExtensionErr: function(index, file){
                Swal.fire({icon:'error',title:'Oops...',text: 'Only png, jpg and jpeg file format allowed!'});
            }
        });
        
        $('#favicon').spartanMultiImagePicker({
            fieldName: 'favicon',
            maxCount: 1,
            rowHeight: '100px',
            groupClassName: 'col-md-12 com-sm-12 com-xs-12',
            maxFileSize: '',
            dropFileLabel: 'Drop Here',
            allowExt: 'png',
            onExtensionErr: function(index, file){
                Swal.fire({icon:'error',title:'Oops...',text: 'Only png file format allowed!'});
            }
        });

        $('#adminfavicon').spartanMultiImagePicker({
            fieldName: 'adminfavicon',
            maxCount: 1,
            rowHeight: '100px',
            groupClassName: 'col-md-12 com-sm-12 com-xs-12',
            maxFileSize: '',
            dropFileLabel: 'Drop Here',
            allowExt: 'png',
            onExtensionErr: function(index, file){
                Swal.fire({icon:'error',title:'Oops...',text: 'Only png file format allowed!'});
            }
        });


        $('input[name="logo"],input[name="adminlogo"],input[name="adminfavicon"],input[name="favicon"]').prop('required',true);

        $('.remove-files').on('click', function(){
            $(this).parents('.col-md-12').remove();
        });


        @if(config('settings.logo'))
        $('#logo img.spartan_image_placeholder').css('display','none');
        $('#logo .spartan_remove_row').css('display','none');
        $('#logo .img_').css('display','block');
        $('#logo .img_').attr('src','{{ asset("storage/".LOGO_PATH.config("settings.logo")) }}');
        @endif

        @if(config('settings.adminlogo'))
        $('#adminlogo img.spartan_image_placeholder').css('display','none');
        $('#adminlogo .spartan_remove_row').css('display','none');
        $('#adminlogo .img_').css('display','block');
        $('#adminlogo .img_').attr('src','{{ asset("storage/".LOGO_PATH.config("settings.adminlogo")) }}');
        @endif

        @if(config('settings.favicon'))
        $('#favicon img.spartan_image_placeholder').css('display','none');
        $('#favicon .spartan_remove_row').css('display','none');
        $('#favicon .img_').css('display','block');
        $('#favicon .img_').attr('src','{{ asset("storage/".LOGO_PATH.config("settings.favicon")) }}');
        @endif

        @if(config('settings.adminfavicon'))
        $('#adminfavicon img.spartan_image_placeholder').css('display','none');
        $('#adminfavicon .spartan_remove_row').css('display','none');
        $('#adminfavicon .img_').css('display','block');
        $('#adminfavicon .img_').attr('src','{{ asset("storage/".LOGO_PATH.config("settings.adminfavicon")) }}');
        @endif
       
    });

    function save_data(form_id) {
    let form = document.getElementById(form_id+'-form');
    let formData = new FormData(form);
    let url;
    if(form_id == 'general'){
        url = "{{ route('general.settings') }}";
    }else{
        url = "{{ route('mail.settings') }}";
    }
    $.ajax({
        url: url,
        type: "POST",
        data: formData,
        dataType: "JSON",
        contentType: false,
        processData: false,
        cache: false,
        beforeSend: function(){
            $('#'+form_id+'-save-btn').addClass('spinner-border spinner-border-sm');
        },
        complete: function(){
            $('#'+form_id+'-save-btn').removeClass('spinner-border spinner-border-sm');
        },
        success: function (data) {
            $('#'+form_id+'-form').find('.is-invalid').removeClass('is-invalid');
            $('#'+form_id+'-form').find('.error').remove();
            if (data.status == false) {
                $.each(data.errors, function (key, value) {
                    $('#'+form_id+'-form input#' + key).addClass('is-invalid');
                    $('#'+form_id+'-form textarea#' + key).addClass('is-invalid');
                    $('#'+form_id+'-form select#' + key).parent().addClass('is-invalid');
                $('#'+form_id+'-form #' + key).parent().append(
                    '<small class="error text-danger">' + value + '</small>');
                });
            } else {
                notification(data.status, data.message);
            }
        },
        error: function (xhr, ajaxOption, thrownError) {
            console.log(thrownError + '\r\n' + xhr.statusText + '\r\n' + xhr.responseText);
        }
    });
}

</script>
@endsection