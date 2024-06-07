@extends('dashboard.layouts.master')

@section('main-content-section')

<main id="user-login">
    <section class="user-login-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 offset-lg-2 offset-md-2 offset-sm-0">
                    <div class="login-form p-5 bg-white shadow">
                        <div class="row">
                            <div class="col-md-12 payment-errors" id="payment-errors">

                            </div>
                        </div>

                        <h1 class="fw-bold text-center mb-5">User <span class="reg_text">Payment</span></h1>
                        {!! Form::open(['url' => route('plans.subscription'), 'data-parsley-validate', 'id' => 'payment-form']) !!}
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                        @endif
                        <div class="row">
                            <div class="form-group col-sm-6" id="product-group">
                                {!! Form::label('planname', 'Selected Plan:') !!}

                                {!! Form::text('user_type',$plan?$plan->name:'', [
                                'class' => 'form-control',
                                'required' => 'required',
                                'readonly' => 'readonly',
                                'data-parsley-trigger' => 'change focusout',
                                'data-parsley-class-handler' => '#cc-group'
                                ]) !!}
                            </div>
                            <div class="form-group col-sm-6" id="product-group">

                                {!! Form::label('billingFrequency', 'Billing Frequency') !!}
                                {!! Form::text('plan',($plan)?$plan->plan_type:"", [
                                'class' => 'form-control',
                                'required' => 'required',
                                'readonly' => 'readonly',
                                'data-parsley-trigger' => 'change focusout',
                                'data-parsley-class-handler' => '#cc-group'
                                ]) !!}
                            </div>
                            <div class="form-group col-sm-6" id="product-group">

                                {!! Form::label('total_amount', 'Total Amount') !!}
                                {!! Form::text('total_amount','$'.$plan?$plan->price:'', [
                                'class' => 'form-control',
                                'required' => 'required',
                                'readonly' => 'readonly',
                                'data-parsley-trigger' => 'change focusout',
                                'data-parsley-class-handler' => '#cc-group'
                                ]) !!}
                            </div>


                            <div class="form-group col-sm-6" id="cc-group">
                                {!! Form::label(null, 'Credit card number:') !!}
                                {!! Form::text(null, null, [
                                'class' => 'form-control',
                                'id' => 'cardNumber',
                                'required' => 'required',
                                'data-stripe' => 'number',
                                'data-parsley-type' => 'number',
                                'maxlength' => '16',
                                'data-parsley-trigger' => 'change focusout',
                                'data-parsley-class-handler' => '#cc-group'
                                ]) !!}
                            </div>
                            <div class="form-group col-sm-6" id="ccv-group">
                                {!! Form::label(null, 'CVC (3 or 4 digit number):') !!}
                                {!! Form::text(null, null, [
                                'class' => 'form-control',
                                'id' => 'cvc',
                                'required' => 'required',
                                'data-stripe' => 'cvc',
                                'data-parsley-type' => 'number',
                                'data-parsley-trigger' => 'change focusout',
                                'maxlength' => '4',
                                'data-parsley-class-handler' => '#ccv-group'
                                ]) !!}
                            </div>

                            <div class="col-md-6">
                                <div class="form-group" id="exp-m-group">
                                    {!! Form::label(null, 'Ex. Month') !!}
                                    {!! Form::selectMonth(null, null, [
                                    'class' => 'form-control',
                                    'id' => 'month',
                                    'required' => 'required',
                                    'data-stripe' => 'exp-month'
                                    ], '%m') !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" id="exp-y-group">
                                    {!! Form::label(null, 'Ex. Year') !!}
                                    {!! Form::selectYear(null, date('Y'), date('Y') + 10, null, [
                                    'class' => 'form-control',
                                    'id' => 'year',
                                    'required' => 'required',
                                    'data-stripe' => 'exp-year'
                                    ]) !!}
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="plan_id" value="{{ $plan->id }}">
                        <div class="form-group">
                            {!! Form::submit('Submit Payment',['class' => 'cstm-btn btn-order', 'id' => 'submitBtn', 'style' => 'margin-bottom: 10px;']) !!}
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="//parsleyjs.org/dist/parsley.js"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script>
    window.ParsleyConfig = {
        errorsWrapper: '<div></div>',
        errorTemplate: '<div class="alert alert-danger parsley" role="alert"></div>',
        errorClass: 'has-error',
        successClass: 'has-success'
    };

    Stripe.setPublishableKey("<?php echo env('STRIPE_KEY') ?>");

    jQuery(function($) {
        $('#payment-form').submit(function(event) {
            var $form = $(this);
            alert("fdf")
            var pmType = $('#pmType').is(':checked');
            if (pmType == false) {
                $("#loader").addClass("show-loader");
                $form.parsley().subscribe('parsley:form:validate', function(formInstance) {
                    // formInstance.submitEvent.preventDefault();
                    this.validationResult = false

                    return false;
                });
                Stripe.card.createToken($form, stripeResponseHandler);

                return false;
            }

            $("#loader").addClass("show-loader");
            return true;
        });
    });

    function stripeResponseHandler(status, response) {

        var $form = $('#payment-form');
        if (response.error) {
            $("#loader").removeClass("show-loader");
            console.log(response.error.message);
            console.log(response.error);
            $('#payment-errors').empty();
            $('#payment-errors').append('<span style="color: red;margin-top:10px;">' + response.error.message + '</span>');
            $('#payment-errors').addClass('alert alert-danger');
            $form.find('#submitBtn').prop('disabled', false);
            $('#submitBtn').button('reset');
        } else {
            var token = response.id;
            $form.append($('<input type="hidden" name="stripeToken" />').val(token));
            $form.get(0).submit();
        }
    };
    $('#exp-y-group').change(function(event) {
        $('#payment-errors').empty();
    });
</script>

@endpush