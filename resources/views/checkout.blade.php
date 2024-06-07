@extends('dashboard.layouts.master')

@section('main-content-section')

<div class="section-2  bg-1 ">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="banner-cont">
                    <p>Checkout</p>
                    <span>Few Steps Away</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section-3  ptb-65">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="prdocut-dtl p-0">
                    <div class="table_white">
                        <div class="table-responsive">
                        <table class="display nowrap dataTable collapsed common-table" width="100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Quantity</th>
                                    <th>Pledge</th>
                                    <!-- <th></th> -->
                                </tr>
                            </thead>
                            <tbody>
                            @if(!empty($cartItems))
                                <tr>
                                    <td>
                                        <div class="coupn-box-text">
                                            @if(isset($cartItems->attributes['image']))
                                                <img src="{{ asset('storage/app/storage/images') }}/{{$cartItems->attributes['image']}}">
                                            @endif
                                            <p><em class="text-truncate-custom d-inline-block">{{$cartItems->name}}</em><span class="dist-cpt">{{$cartItems->attributes['discount'] ? $cartItems->attributes['discount'] : 0}}% Off</span></p>
                                        </div>
                                    </td>
                                    <td>
                                        <p>{{$cartItems->attributes['type'] ?? $cartItems->attributes['type']}}</p>
                                    </td>
                                    <td>
                                        <div class="qty-input">
                                            <button class="qty-count qty-count--minus update-cart" data-action="minus"
                                                type="button">-</button>
                                            <input type="text" name="qtyname" class="product-qty qtyValue quantity" value="{{ $cartItems->quantity ?? '' }}" id="{{ $cartItems->id ?? ''}}" price="{{ $cartItems->price }}">
                                            <button class="qty-count qty-count--add update-cart" data-action="add"
                                                type="button">+</button>
                                        </div>
                                    </td>
                                    <td>
                                        <p>${{$cartItems->price}}</p>
                                    </td>

                                    {{-- <td>
                                        <form action="{{ route('cart.remove') }}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{ $item->id }}" name="id">
                                        <button class="text-white bg-red-600">x</button>
                                    </form>
                                    </td> --}}
                                </tr>
                            @else
                                <tr class="no-data">
                                    <td colspan="4">There is no record in cart</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
                <div class="prdocut-dtl prdt-option">
                    <div class="radio-btn-wrap p-0">
                        <p class="sub-heading">Choose Payment Option</p>
                        <div class="radio-box m-0">
                            <label class="containers">Cash on Delivery
                                <input type="radio" name="paymentMethod" onchange="paymentType()" checked="checked" value="cash">
                                <span class="checkmark"></span>
                            </label>
                            <label class="containers">Other
                                <input type="radio" name="paymentMethod" onchange="paymentType()" value="other">
                                <span class="checkmark"></span>
                            </label>

                        </div>
                    </div>
                </div>
                <div class="prdocut-dtl recpt-dtl" id="payment-section" style="display:block;">
                    <p class="sub-heading">Your Details</p>
                    <form>
                    <div class="errMessage"></div>

                        <div class="row">
                            <div class="col-lg-6 col-md-5 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Name <span class="asterisk-sign">*</span></label>
                                    <input type="text" class="form-control" placeholder="Full Name" id="full_name" value="{{!empty($cartItems) && $cartItems->user_name ? $cartItems->user_name : ''}}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-5 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Associated Child <span class="asterisk-sign">*</span></label>
                                    <!-- <input type="text" class="form-control" placeholder="Child Name" id="child_name"> -->
                                    <select class="form-control" name="child_name" id="child_name">
                                        <option value="">Select Status</option>
                                        @foreach($kids as $kid)
                                            <option {{!empty($cartItems) && $cartItems->associated_child == $kid->id ? 'selected' : ''}} value="{{$kid->id}}">{{$kid->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-5 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Phone <span class="asterisk-sign">*</span></label>
                                    <input type="text" name="phone_number" id="ph_number" class="form-control reg_phone_number" size="10" maxlength="10" placeholder="Mobile Number" value="{{!empty($cartItems) && $cartItems->user_phone ? $cartItems->user_phone : ''}}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-5 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Email <span class="asterisk-sign">*</span></label>
                                    <input type="email" class="form-control" id="email_addr" placeholder="Your Email Address" value="{{!empty($cartItems) && $cartItems->user_email ? $cartItems->user_email : ''}}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check check-wrap">
                                    <div class="radio-box m-0">
                                        <label class="containers">Please accept my discount as a addition donation
                                            to super school
                                            <input id="termCond" onchange="additionalDonation()" type="checkbox" name="radio-7" {{!empty($cartItems) && $cartItems->accept_discount == 1 ? 'checked' : ''}}>
                                            <span class="checkmark"></span>
                                        </label>


                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="coupons-wrap flt-grp total-amt mb-4">
                    <div class="top-head">
                        <p>Amount</p>
                    </div>
                    <div class="amount-wrap">
                        <ul>
                            <li><span>Amount</span>
                                <!-- <p>${{ Cart::getTotal() }}</p> -->
                                <p>${{!empty($cartItems) && $cartItems->price ? $cartItems->price : ''}}</p>
                            </li>
                            <li><span>Tax</span>
                                <p>10%</p>
                            </li>
                            <li><span>Total Amount</span>
                                <p>${{$taxCalculation}}</p>
                            </li>
                        </ul>

                    </div>

                </div>
                @if(isset($cartItems->attributes['type']))
                    <!-- <a onclick="cartRefresh()" target="" href="{{ route('pledge') }}" class="cstm-btn gift-card-btn plg-now w-100" disabled>Pledge Now</a> -->
                    <a onclick="pledgeNow()" target="" class="cstm-btn gift-card-btn plg-now w-100" disabled>Pledge Now</a>
                @else
                    <a href="#" class="cstm-btn gift-card-btn plg-now w-100" disabled>Pledge Now</a>
                @endif
            </div>
        </div>

    </div>
</div>

@endsection

@push('scripts')
<script type="text/javascript">

    $('.reg_phone_number').keypress(validateNumber);

    function validateNumber(event) {
        var key = window.event ? event.keyCode : event.which;
        if (event.keyCode === 8 || event.keyCode === 46) {
            return true;
        } else if ( key < 48 || key > 57 ) {
            return false;
        } else {
            return true;
        }
    };

    function paymentType(){
        var type = $('input:radio[name=paymentMethod]:checked').val();
        if(type == 'other'){
            $("#payment-section").css("display", "none");
        }else{
            $("#payment-section").css("display", "block");
        }
    }

    function additionalDonation(){
        if(document.getElementById('termCond').checked == true){
            var discount = 1;
        }else{
            var discount = 0;
        }

        $.ajax({
            url: '{{ route('check-additional-donation') }}',
            method: "POST",
            data: {
                _token: '{{ csrf_token() }}',
                id: $('.product-qty').attr("id"),
                quantity: $('.product-qty').val(),
                type: $(this).attr('data-action'),
                discount: discount,
                user_name : $('#full_name').val(),
                child_name: $('#child_name').val(),
                ph_number : $('#ph_number').val(),
                email_addr: $('#email_addr').val()
            },
            success: function(response) {
            window.location.reload();
            }
        });
    }
</script>

<script type="text/javascript">

    function cartRefresh(){
        setTimeout(() => {
            location.reload();
        }, 2000);
    }

    function pledgeNow(){
        user_name = $('#full_name').val();
        child_name= $('#child_name').val();
        ph_number = $('#ph_number').val();
        email_addr= $('#email_addr').val();
        accept_discount = $('#accept_discount').val()

        if(document.getElementById('termCond').checked == true){
            var discount = 1;
        }else{
            var discount = 0;
        }

        $.ajax({
            url: '{{ route('pledge') }}',
            method: "POST",
            data: {
                _token: '{{ csrf_token() }}',
                id: $('.product-qty').attr("id"),
                quantity: $('.product-qty').val(),
                type: $(this).attr('data-action'),
                discount: discount,
                user_name : $('#full_name').val(),
                child_name: $('#child_name').val(),
                ph_number : $('#ph_number').val(),
                email_addr: $('#email_addr').val()
            },
            success: function(res) {
                if(res.response=="true"){
                    location.reload();
                    var url = {!! json_encode(url('/')) !!} + "/user/thank-you/pledge/"+ res.order_id;
                    window.location = url;
                }else{
                    var html = `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Validations failed.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>`;
                    $('.errMessage').html(html);
                }
            }
        });

    }

    $(document).ready(function () {

        $(".update-cart").on('click', function(e) {

            e.preventDefault();
            $.ajax({
                url: '{{ route('cart.update') }}',
                method: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: $('.product-qty').attr("id"),
                    quantity: $('.product-qty').val(),
                    type: $(this).attr('data-action'),
                    price: $('.product-qty').attr("price"),
                    child_name: $('#child_name').val(),
                    discount: 0,
                    user_name : $('#full_name').val(),
                    child_name: $('#child_name').val(),
                    ph_number : $('#ph_number').val(),
                    email_addr: $('#email_addr').val()
                },
                success: function(response) {
                   window.location.reload();
                }
            });
        });
    });
</script>
@endpush