@extends('dashboard.layouts.master')

@section('main-content-section')
<main id="user-login">
    <section class="user-login-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 offset-lg-3 offset-md-3 offset-sm-0">
                    <div class="login-form p-5 bg-white shadow">
                        <h1 class="fw-bold text-center mb-5">Login</h1>
                        <form method="POST" action="{{ route('user.logged.in') }}" id="login">
                            @csrf
                            <div class="mb-3">
                                <label for="InputEmail1" class="form-label">Email address</label>
                                <input type="email" class="form-control" name="email" id="InputEmail1">
                                @error('email') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                            <div class="mb-3">
                                <label for="InputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="InputPassword1">
                                @error('password') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <button class="btn btn-primary mb-3">Login</button>
                                </div>
                                <div class="mt-3 col-md-6 text-md-end">
                                    <a href="/forgot-password" class="cursor-pointer"><strong>Forgot Password?</strong></a>
                                </div>
                            </div>
                            <div class="mb-3 text-center">
                                Don't have account? <a class="cursor-pointer" href="{{ route('user.register') }}"><strong>Register Here</strong></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

@push('script')
<script>
    $(document).ready(function() {
        toastr.options.timeOut = 5000;
        @if(Session::has('error'))
        toastr.error('{{ Session::get('
            error ') }}');
        @elseif(Session::has('success'))
        toastr.success('{{ Session::get('
            success ') }}');
        @endif
    });
</script>
@endpush