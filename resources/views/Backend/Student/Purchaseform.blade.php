@extends('layouts.master')

@section('title') {{ __('Purchase Course') }} @endsection

@section('css')
<style>

    .card :checked + label{
        /* background-color: #2fcc71; */
        cursor: pointer;
    }

    .card :checked + label:after, .card :checked + label:after, .card :checked + label:after {
        content: "\2713";
        width: 30px;
        height: 30px;
        line-height: 30px;
        border-radius: 100%;
        border: 1px solid #0d6efd;
        background-color: #d4daf9;
        z-index: 999;
        position: absolute;
        top: -10px;
        right: -10px;
        color: #0d6efd;
    }
</style>
@endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') Course Purchase @endslot
        @slot('title') Purchase your favorite course @endslot
    @endcomponent

    <form action="#" method="POST" id="submitdata">
        @csrf
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <input type="hidden" name="course_id" value="{{ $coursePurchase->id }}">
        <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ asset('assets/images/course/'. $coursePurchase->image) }}" alt="{{ $coursePurchase->name }}" class="img-fluid">
                        </div>
                        <div class="col-md-8">
                            <div class="coursedetails">
                                <h4>{{ $coursePurchase->name }} ({{ $coursePurchase->price }} BDT)</h4>
                                <ul class="m-0 ">
                                    <li>{{ __('Created By : '. $coursePurchase->teachername->name) }}</li>
                                    <li>{{ __($coursePurchase->student_capacity. ' Seats Left (Filling Fast)') }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row py-2">
                        <div class="col-md-4">
                            <div class="item-feature align-middle align-self-middle">
                                <div class="item-icon d-inline-block">
                                    <span class="d-inline-block bg-primary bg-soft p-3 text-primary rounded-circle"> <i class="far fa-check-circle fa-2x"></i> </span>
                                </div>
                                <div class="item-text d-inline-block">
                                    <h6 class="text-dark d-inline-block">
                                        Lifetime Access
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="item-feature">
                                <div class="item-icon d-inline-block">
                                    <span class="d-inline-block bg-primary bg-soft p-3 text-primary rounded-circle"> <i class="far fa-check-circle fa-2x"></i> </span>
                                </div>
                                <div class="item-text d-inline-block">
                                    <h6 class="text-dark d-inline-block">
                                        Free Guideline
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="item-feature">
                                <div class="item-icon d-inline-block">
                                    <span class="d-inline-block bg-primary bg-soft p-3 text-primary rounded-circle"> <i class="far fa-check-circle fa-2x"></i> </span>
                                </div>
                                <div class="item-text d-inline-block">
                                    <h6 class="text-dark d-inline-block">
                                        Course Certificate
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12 my-2">
                            <h4>Pay with a Monthly Fees</h4>
                        </div>
                        <div class="col-md-3">
                            <div class="card border rounded align-self-center align-items-center">
                                <div class="card-body">
                                    <input type="radio" name="monthlypay" id="onemonth" value="1" style="display: none;">
                                    <label class="onemonth-label text-center" for="onemonth">
                                        <h4 class="text-warning">
                                          ৳{{ number_format( $coursePurchase->price / 1, 0 , '.' , ',' ) }}
                                        </h4>
                                        <p class="text-mute p-0 m-0">1 Monthly</p>
                                    </label>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card border rounded align-self-center align-items-center">
                                <div class="card-body">
                                    <input type="radio" name="monthlypay" id="twomonth" value="2" style="display: none;">
                                    <label class="twomonth-label text-center" for="twomonth">
                                        <h4 class="text-warning">
                                          ৳{{ number_format( $coursePurchase->price / 2, 0 , '.' , ',' ) }}
                                        </h4>
                                        <p class="text-mute p-0 m-0">2 Monthly</p>
                                    </label>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card border rounded align-self-center align-items-center">
                                <div class="card-body">
                                    <input type="radio" name="monthlypay" id="threemonth" value="3" style="display: none;">
                                    <label class="threemonth-label text-center" for="threemonth">
                                        <h4 class="text-warning">
                                          ৳{{ number_format( $coursePurchase->price / 3, 0 , '.' , ',' ) }}
                                        </h4>
                                        <p class="text-mute p-0 m-0">3 Monthly</p>
                                    </label>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card border rounded align-self-center align-items-center">
                                <div class="card-body">
                                    <input type="radio" name="monthlypay" id="fivemonth" value="5" style="display: none;">
                                    <label class="fivemonth-label text-center" for="fivemonth">
                                        <h4 class="text-warning">
                                          ৳{{ number_format( $coursePurchase->price / 5, 0 , '.' , ',' ) }}
                                        </h4>
                                        <p class="text-mute p-0 m-0">5 Monthly</p>
                                    </label>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="alert alert-info mb-0" role="alert">
                            <i class="mdi mdi-alert-circle-outline me-2"></i>
                            This is monthly base plan, who wanna pay by monthly wise!!!
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4>{{ __('Billing Summary') }}</h4>
                    <table class="table table-responsive">
                        <tr>
                            <th>Price</th>
                            <td>:</td>
                            <td>৳{{ number_format( $coursePurchase->price, 0 , '.' , ',' ) }}BDT</td>
                        </tr>
                        <tr>
                            <th>Discount</th>
                            <td>:</td>
                            <td>{{ __('৳ -0.00 BDT') }}</td>
                        </tr>
                        <tr>
                            <th>Pay Amount</th>
                            <td>:</td>
                            <td><span id="payamount">৳{{ number_format( $coursePurchase->price, 0 , '.' , ',' ) }}BDT</span></td>
                        </tr>
                    </table> <br>
                    <h6>{{ __('Select Payment method:') }}</h6>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="payment-box p-3 bg-primary bg-soft text-center rounded">
                                <strong>{{ __('Bkash') }}</strong>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="payment-box p-3 bg-primary bg-soft text-center rounded">
                                <strong>{{ __('Dutch Bangla') }}</strong>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="payment-box p-3 bg-primary bg-soft text-center rounded">
                                <strong>{{ __('Debit Card') }}</strong>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="payment-box p-3 bg-primary bg-soft text-center rounded">
                                <strong>{{ __('Cash On') }}</strong>
                            </div>
                        </div>
                    </div>
                   
                    <button type="button" id="submit"  data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop" class="btn btn-primary rounded btn-block w-100 my-3 disabled">Pay {{ number_format( $coursePurchase->price, 0 , '.' , ',' ) }} BDT</button>

                   <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                            <div class="modal-content bg-ss border-0">
                                <div class="modal-header text-center align-self-center justify-content-center align-items-center bg-white">
                                    <!-- <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button> -->
                                        <img src="{{ asset('assets/images/payment-logo.png') }}" alt="Payment logo" class="img-fluid text-center" width="300">
                                </div>
                                <div class="modal-body align-items-center align-self-center justify-content-center text-center">
                                    <div class="alert__info-payment">
                                        <table class="table-responsive">
                                            <tbody>
                                                <tr>
                                                    <th>Personal Account</th>
                                                    <td>:&nbsp;</td>
                                                    <td>+880 1953 291938</td>
                                                </tr>
                                                <tr>
                                                    <th>Personal references</th>
                                                    <td>:&nbsp;</td>
                                                    <td> [Admission ID]</td>
                                                </tr>
                                                <tr>
                                                    <th>Admission ID</th>
                                                    <td>: &nbsp;</td>
                                                    <td><span id="admissionnumber"></span></td>
                                                </tr>
                                                <tr>
                                                    <th>Amount</th>
                                                    <td>: &nbsp;</td>
                                                    <td><span id="PaySSAmount"></span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="payment-field">
                                        <input type="text" name="number" class="form-control my-2" placeholder="e.g 01xxxxxxxxx">
                                        <input type="text" name="traxID" class="form-control my-2" placeholder="e.g 9EA2W88S88">
                                    </div>
                                    <div class="term-condition my-2 text-center">
                                        <div class="form-check text-center">
                                        <input class="form-check-input" id="TrxID" type="checkbox" name="TrxID">
                                        <label class="form-check-label" for="TrxID">I agree to the <a href="#"> tearms & condition</a></label>
                                            </div>
                                    </div>
                                    <div class="payment__footer text-center my-2">
                                        <button type="submit" id="submition" class="btn btn-light">Process</button>
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                    </div>
                                    <div class="payment__call_help mt-3 text-white">
                                        <a href="tel:+8801953291938" class="text-white"> <i class="fa fa-phone"></i> +880 1953 291938 </a>
                                    </div>
                                </div>
                                <!-- <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Process</button>
                                </div> -->
                            </div>
                        </div>
                    </div>

                    <div class="secure-checkout text-center">
                        <span><i class="bx bx-check-shield bx-2bx me-2"></i> Secure Checkout</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>


@endsection

@section('script')
<script>
    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            toastr.error("{{ $error }}");
        @endforeach
    @endif
</script>
<script>
    $("input[type='radio']").click(function () {
        radioVal = $(this).val();
            if( radioVal == '1' )
            {
                var totalAmount =  "{{ $coursePurchase->price }}" / radioVal;
                $('#payamount').html("৳"+totalAmount+" BDT");
                $("#submit").html("Pay ৳"+totalAmount+" BDT");
            }
            else if( radioVal == '2' )
            {
                var totalAmount =  "{{ $coursePurchase->price }}" / radioVal;
                $('#payamount').html("৳"+totalAmount+" BDT");
                $("#submit").html("Pay ৳"+totalAmount+" BDT");
            }
            else if( radioVal == '3' )
            {
                var totalAmount =  "{{ $coursePurchase->price }}" / radioVal;
                $('#payamount').html("৳"+totalAmount+" BDT");
                $("#submit").html("Pay ৳"+totalAmount+" BDT");
            }
            else if( radioVal == '5' )
            {
                var totalAmount =  "{{ $coursePurchase->price }}" / radioVal;
                $('#payamount').html("৳"+totalAmount+" BDT");
                $("#submit").html("Pay ৳"+totalAmount+" BDT");
            }
            else{
                alert("Not found");
            }

            $('<input>').attr({
                type: 'hidden',
                id: 'amount',
                name: 'amount',
                value: totalAmount,
            }).appendTo('form#submitdata');
            
        });

       

        $(document).on("click", "input[type='radio']", function(e) {
            var checked = $(this).attr("checked");
            var radioVal = $(this).val();
            if(!checked){
                var totalAmount =  "{{ $coursePurchase->price }}" / radioVal;
                $("#submit").attr("disabled", false);
                $("#submit").removeClass( "disabled" );
                $("#PaySSAmount").html("৳"+totalAmount+" BDT");
                $(this).attr("checked", true);
            } else {
                $("#submit").attr("disabled", true);
                $(this).removeAttr("checked");
                $(this).prop("checked", false);
            }
        });


        // Admission id create
        $( document ).ready(function() {
            var admissionID = "{{ rand(1, 100000) }}";
            $("#admissionnumber").each(function() {
                $('#admissionnumber').html(admissionID);
            });

            $('<input>').attr({
                type: 'hidden',
                id: 'admissonID',
                name: 'admissonID',
                value: admissionID,
            }).appendTo('form#submitdata');
        });

        // Send admission request

        $(document).ready(function() {
            $(document).on('submit', 'form', function() {
                $('button').attr('disabled', 'disabled');
                $("#submition").attr("disabled", true);
                $("#submition").text("প্রসেসিং ...");
                $('#submition').append('<div class="spinner-border spinner-border-sm"></div>')
            });
        });

        $(function(){
            $.ajaxSetup({
            headers: {
                    "X-CSRFToken": '{{csrf_token()}}'
                }
            });
            $('#submitdata').submit(function(e){
                e.preventDefault();
                var mydata = $(this).serialize();
                $.ajax({
                    method : 'POST',
                    url : "{{ route('purchase.confirm') }}",
                    data:mydata,
                    success: function(response) {
                        if(response.success){
                            toastr.success(response.message);
                        }
                        setTimeout(function(){
                            window.location = '{{ route('user.dashboard') }}';
                            document.getElementById("submitdata").reset();
                        }, 3000);


                        
                },
                error:function (response){
                    $('.text-danger').html('');

                    $.each(response.responseJSON.errors,function(field_name,error){
                        $(document).find('[name='+field_name+']').after('<span class="text-strong ss-text-danger">' +error+ '</span>');                    
                        toastr.error(error);
                    })
                    $('.text-danger').delay(5000).fadeOut();
                    setTimeout(function(){
                        window.location = '{{ route('user.dashboard') }}';
                    }, 3000);
                }
                })
            })
        })

        
</script>
@endsection