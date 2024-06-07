@extends('dashboard.layouts.master')

@section('main-content-section')

<div class="section-2  bg-1 ">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="banner-cont">
                    <p>About {{(!empty($giftcard->variety)) ? ($giftcard->variety == "Donate Shoe" ? 'Donate Shoe' : 'Gift Card') : 'Gift Card'}}</p>
                    <span>E-gift card</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section-3  ptb-65">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                <div class="coupn-image">
                    <h3>{{$giftcard->name}}</h3>
                    <p>{{$giftcard->discount}}% Off</p>
                    <figure>
                    @if(!empty($giftcard->image))
                        <img src="{{ asset('storage/app/storage/images') }}/{{$giftcard->image}}">
                    @else
                        <img src="{{ asset('assets/image/dummy.png') }}">
                    @endif
                    </figure>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                <div class="coupon-qty-detail">
                    <div class="qtn-wrap">
                        <p class="sub-heading">Quantity</p>
                        <div class="wrap">
                            <div class="qty-input">
                                <button class="qty-count qty-count--minus update-cart" data-action="minus" type="button">-</button>
                                <input type="text" name="qtyname" class="product-qty qtyValue quantity" value="{{ $cartData->quantity ?? '' }}" id="{{ $cartData->id ?? ''}}">
                                <button class="qty-count qty-count--add update-cart" data-action="add" type="button">+</button>
                            </div>
                            <p class="total-price">$ {!! Helper::discountedPrice($giftcard, $cartData->quantity) !!}</p>
                        </div>
                    </div>
                    <div class="radio-btn-wrap">
                        <p class="sub-heading">Delivery Options</p>
                        <div class="radio-box">
                            <label class="containers">Send as Gift
                                <input type="radio" name="delivery-option" checked="checked" option="send-as-gift">
                                <span class="checkmark"></span>
                            </label>
                            <label class="containers">Buy for Self
                                <input type="radio" name="delivery-option" option="buy-for-self">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="radio-btn-wrap showMode" id="mode-sec">
                        <p class="sub-heading">Delivery Mode</p>
                        <div class="radio-box mb-2">
                            <label class="containers">Email
                                <input type="radio" name="delivery-mode" option="email">
                                <span class="checkmark"></span>
                            </label>
                            <label class="containers">SMS
                                <input type="radio" name="delivery-mode" option="sms">
                                <span class="checkmark"></span>
                            </label>
                            <label class="containers">Both
                                <input type="radio" name="delivery-mode" option="both" checked="checked">
                                <span class="checkmark"></span>
                            </label>
                        </div>

                        <div class="card prdocut-dtl shadow-none border-0 p-0">
                            <!-- <div class="card-body">
                            </div> -->
                            <div class="form-group" id="email-section">
                                <input class="form-control" type="text" placeholder="Enter Your Email">
                            </div>
                            <div class="form-group" id="phone-section">
                                <input class="form-control" type="number" placeholder="Enter Your Phone Number">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                <div class="coupon-offers">
                    <h4>offers</h4>
                    <ul class="offers-lsit">
                        <li>
                            <p> Flat 5% off. Applicable on payment via UPI on
                                the order value of Rs.100 & above. | <a href="#">USE CODE: GP5</a> </p>
                        </li>
                        <li>
                            <p> Paytm wallet and Net banking on the order
                                value of Rs.100 & above. | <a href="#">USE CODE: GP3</a></p>
                        </li>
                    </ul>
                    <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ $giftcard->id }}" name="id">
                        <input type="hidden" value="{{ $giftcard->name }}" name="name">
                        <input type="hidden" value="{!! Helper::discountedPrice($giftcard, $cartData->quantity) !!}" name="price">
                        <input type="hidden" value="{{ $giftcard->discount }}" name="discount">
                        <input type="hidden" value="{{ $giftcard->type }}" name="type">
                        <input type="hidden" value="{{ $giftcard->variety }}" name="variety">
                        <input type="hidden" value="{{ $giftcard->image }}" name="image">
                        <input type="hidden" id="deliveryOption" name="delivery_option">
                        <input type="hidden" id="deliveryMode" name="delivery_mode">
                        <input type="hidden" value="{{$cartData->quantity}}" name="quantity">
                        <button class="cstm-btn gift-card-btn">Pledge Gift Card</button>
                    </form>
                    <!-- <a href="checkout.html" class="cstm-btn gift-card-btn "></a> -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="coup-detail-tabs">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-toggle="pill"
                                data-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                aria-selected="true">Description</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-toggle="pill"
                                data-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                                aria-selected="false">terms & conditions</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-contact-tab" data-toggle="pill"
                                data-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                                aria-selected="false">how to redeem</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab">
                            <div class="tab-content-wrap">
                                <p>{{$giftcard->description}}</p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                            aria-labelledby="pills-profile-tab">
                            <div class="tab-content-wrap">
                                <p>Target Trademarks that appear on this site are owned by Target and not by CardCash.
                                    Target is not a participating partner or sponsor in this offer and CardCash does not
                                    issue gift cards on behalf of Target. CardCash enables consumers to Pledge and trade
                                    their unwanted Target gift cards at a discount. CardCash verifies the gift cards it
                                    sells. All pre-owned gift cards sold on CardCash are backed by CardCash's 45 day
                                    buyer
                                    protection guarantee. Gift card terms and conditions are subject to change by
                                    Target,
                                    please check Target website for more details.</p>
                                <p>It is a long established fact that a reader will be distracted by the readable
                                    content
                                    of a page when looking at its layout. The point of using Lorem Ipsum is that it has
                                    a
                                    more-or-less normal distribution of letters, as opposed to using 'Content here,
                                    content
                                    here', making it look like readable English. Many desktop publishing packages and
                                    web
                                    page editors now use Lorem Ipsum as their default model text, and a search for
                                    'lorem
                                    ipsum' will uncover many web sites still in their infancy.</p>
                                <ul>
                                    <li>Power up in over 1M Android apps and games on Google Play, the world's largest
                                        mobile gaming platform.</li>
                                    <li>Use a Google Play Gift Code to go further in your favorite games like Clash
                                        Royale or Pokémon GO or redeem your code for the latest apps, movies, music,
                                        books, and more.</li>
                                    <li>There’s no credit card required, and balances never expire.</li>
                                    <li>Treat yourself or give the gift of Play today.</li>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                            aria-labelledby="pills-contact-tab">
                            <div class="tab-content-wrap">
                                <p>Target Trademarks that appear on this site are owned by Target and not by CardCash.
                                    Target is not a participating partner or sponsor in this offer and CardCash does not
                                    issue gift cards on behalf of Target. CardCash enables consumers to Pledge and trade
                                    their unwanted Target gift cards at a discount. CardCash verifies the gift cards it
                                    sells. All pre-owned gift cards sold on CardCash are backed by CardCash's 45 day
                                    buyer
                                    protection guarantee. Gift card terms and conditions are subject to change by
                                    Target,
                                    please check Target website for more details.</p>
                                <p>It is a long established fact that a reader will be distracted by the readable
                                    content
                                    of a page when looking at its layout. The point of using Lorem Ipsum is that it has
                                    a
                                    more-or-less normal distribution of letters, as opposed to using 'Content here,
                                    content
                                    here', making it look like readable English. Many desktop publishing packages and
                                    web
                                    page editors now use Lorem Ipsum as their default model text, and a search for
                                    'lorem
                                    ipsum' will uncover many web sites still in their infancy.</p>
                                <ul>
                                    <li>Power up in over 1M Android apps and games on Google Play, the world's largest
                                        mobile gaming platform.</li>
                                    <li>Use a Google Play Gift Code to go further in your favorite games like Clash
                                        Royale or Pokémon GO or redeem your code for the latest apps, movies, music,
                                        books, and more.</li>
                                    <li>There’s no credit card required, and balances never expire.</li>
                                    <li>Treat yourself or give the gift of Play today.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        var deliveryOption = $( 'input[name=delivery-option]:checked' ).attr('option');
        $('#deliveryOption').val(deliveryOption);

        var deliveryMode = $( 'input[name=delivery-mode]:checked' ).attr('option');
        $('#deliveryMode').val(deliveryMode);

        $('input[name=delivery-option]').change(function(){
            var deliveryOption = $( 'input[name=delivery-option]:checked' ).attr('option');
            $('#deliveryOption').val(deliveryOption);

            if(($('input[name=delivery-option]:checked').attr('option')) === "send-as-gift"){
                $('#mode-sec').addClass('showMode');
                $('#mode-sec').removeClass('hideMode');
            }else{
                $('#mode-sec').addClass('hideMode');
                $('#mode-sec').removeClass('showMode');
            }
        });
        $('input[name=delivery-mode]').change(function(){
            var deliveryMode = $( 'input[name=delivery-mode]:checked' ).attr('option');
            $('#deliveryMode').val(deliveryMode);

            if(deliveryMode === "email"){
                $('#phone-section').css("display", "none");
                $('#email-section').css("display", "block");
            }else if(deliveryMode === "sms"){
                $('#email-section').css("display", "none");
                $('#phone-section').css("display", "block");
            }else if(deliveryMode === "both"){
                $('#email-section').css("display", "block");
                $('#phone-section').css("display", "block");
            }
        });

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
                    price: $('.product-qty').attr("price")
                },
                success: function(response) {
                   window.location.reload();
                }
            });
        });
    });
</script>
@endpush
