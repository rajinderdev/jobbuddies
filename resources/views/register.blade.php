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

                        <h1 class="fw-bold text-center mb-5">User <span class="reg_text">Registeration</span></h1>
                        <form method="POST" action="{{ route('user.createUser') }}" id="userCreate" >
                            @csrf
                            <div class="row box8">
                                <div class="col-sm-6 form-group">
                                    <label for="name-f">Full Name</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter full name" required>
                                    @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" required>
                                    @error('email') <span class="text-danger error">{{ $message }}</span>@enderror
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label for="pass">Password</label>
                                    <input type="Password" name="password" class="form-control" id="password" placeholder="Create password" required>
                                    @error('password') <span class="text-danger error">{{ $message }}</span>@enderror
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label for="pass2">Confirm Password</label>
                                    <input type="Password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Re-enter your Password" required>
                                    @error('password_confirmation') <span class="text-danger error">{{ $message }}</span>@enderror
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label for="pass2">Phone</label>
                                    <input type="text" name="phone" minlength="14"  maxlength="14" class="form-control" id="phone" oninput="this.value = this.value.replace(/[^0-9.]/g, '')" placeholder="" required>
                                    @error('phone') <span class="text-danger error">{{ $message }}</span>@enderror
                                </div>
                                <input type="hidden" name="role_id" value="3"/>
                                <!-- <div class="col-sm-6 form-group">
                                    <label for="user_type">User Type</label><br>
                                    <select name="role_id" id="role_id" class="form-control">
                                        <option value="" disabled selected>Select User Type</option>
                                        <option value="1">{{ __('Administrator') }}</option>
                                        <option value="2">{{ __('Interviewer') }}</option>
                                        <option value="3">{{ __('Candidate') }}</option>
                                    </select>

                                    @error('role_id') <span class="text-danger error">{{ $message }}</span> @enderror
                                </div> -->
                                <input type="hidden" name="plan" value="{{$plan ? $plan->id : ''}}">
                                <div class="mb-3 text-center">
                                    <button class="btn btn-primary" type="submit">{{ __('Register') }}</button>
                                </div>
                                <div class="mb-3 text-center">
                                    Alreay have account? <a class="cursor-pointer" href="{{ route('user.login') }}"><strong>Login Here</strong></a>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

@push('scripts')

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
    
    $(function() {
        $('#reg_phone_number').keypress(validateNumber);

        function validateNumber(event) {
            var key = window.event ? event.keyCode : event.which;
            if (event.keyCode === 8 || event.keyCode === 46) {
                return true;
            } else if (key < 48 || key > 57) {
                return false;
            } else {
                return true;
            }
        };

        $('#txtNumeric').keydown(function(e) {
            if (e.ctrlKey || e.altKey) {
                e.preventDefault();
            } else {
                var key = e.keyCode;
                if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
                    e.preventDefault();
                }
            }
        });
    });
</script>

<script>
    window.ParsleyConfig = {
        errorsWrapper: '<div></div>',
        errorTemplate: '<div class="alert alert-danger parsley" role="alert"></div>',
        errorClass: 'has-error',
        successClass: 'has-success'
    };
</script>


<script>
    $('#exp-y-group').change(function(event) {
        $('#payment-errors').empty();
    });
</script>
@endpush