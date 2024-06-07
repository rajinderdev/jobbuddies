@extends('superadmin.layout.master')

@section('main-content-section')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<!-- content area start -->
<div class="container-fluid px-lg-4 mt-4 mt-xl-5">
    <div class="row">
        <div class="col-xl-12 col-md-12">
            <div class="card border-0 shadow">
                <div class="card-header bg-transparent d-xl-none d-block">
                    <div class="page-title">
                        <h4 class="mb-0 fw-semi">Settings</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="horizontal-tabs">
                        <div class="row">
                            <div class="col-12 col-lg-5 col-xl-3">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                    aria-orientation="vertical">
                                    <form method="post" enctype="multipart/form-data" id="imageForm">
                                        @csrf
                                        <div class="avatar-upload">
                                            <div class="avatar-edit">
                                                <input type='file' id="imageUpload"
                                                    accept=".png, .jpg, .jpeg"  name="image"/>
                                                <label for="imageUpload"></label>
                                            </div>
                                            <div class="avatar-preview">
                                                <div id="imagePreview"
                                                    style="background-image: url({{ asset('storage/app/storage/images/'.$user->image) }});">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                   
                                        <div class="avatar-name mb-2">
                                            <h5 class="text-center">{{ $user->name }}</h5>
                                            @if($user->role==\App\Models\User::INTERVIEWER)
                                                <p class="text-center text-secondary"> {{($teacher)?$diseases[$teacher->disease]:''}}
                                            @endif
                                        </div>
                                        @if($user->role==\App\Models\User::INTERVIEWER)
                                        <div class="avatar-name mb-3 mb-lg-4">
                                            <p class="text-center text-secondary">
                                                <svg height="20" width="20" fill="#6c757d"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                                    <!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                    <path
                                                        d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z" />
                                                </svg>
                                               {{($teacher)? $teacher->address.', '.$teacher->city. ', '.$teacher->state. ', '.$teacher->country.', '.$teacher->zipcode:''}}
                                            </p>
                                        </div>
                                    @endif
                                    <button class="nav-link active" id="v-pills-overview-tab"
                                        data-bs-toggle="pill" data-bs-target="#v-pills-overview"
                                        type="button" role="tab" aria-controls="v-pills-overview"
                                        aria-selected="true">Account</button>
                                    <button class="nav-link" id="v-pills-addmission-tab"
                                        data-bs-toggle="pill" data-bs-target="#v-pills-addmission"
                                        type="button" role="tab" aria-controls="v-pills-addmission"
                                        aria-selected="false">Change Password</button>
                                </div>
                            </div>
                            <div class="col-12 col-lg-7 col-xl-9">
                                <div class="tab-content" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="v-pills-overview"
                                        role="tabpanel" aria-labelledby="v-pills-overview-tab">
                                        <div class="profile-kids-details">
                                            <form method="post" action="{{ route('superadmin.settings.updateProfile') }}" enctype="multipart/form-data" id="profileForm">
                                                @csrf
                                                <div class="card mb-3">
                                                    <div class="card-header">
                                                        <h5 class="m-0">Basic Details</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            @if($user->role==\App\Models\User::INTERVIEWER )
                                                                <div class="col-12 col-md-6 col-lg-4">
                                                                    <div class="mb-3">
                                                                        <label for="teacherIDInput"
                                                                            class="form-label"><span class="asterisk-sign">*</span>
                                                                            Teacher ID
                                                                        </label>
                                                                        <input type="text" class="form-control"
                                                                            id="teacherIDInput" placeholder="" name="interviewer_id"
                                                                            value="{{ $teacher ? $teacher->interviewer_id:'' }}" readonly>
                                                                        <input type="text" class="form-control" name="teacherId" value="{{ $teacher ? $teacher->id:'' }}">
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            <div class="col-12 col-md-6 col-lg-4">
                                                                <div class="mb-3">
                                                                    <label for="nameInput"class="form-label">Name<span class="asterisk-sign">*</span></label>
                                                                    <input type="text" class="form-control" id="nameInput" placeholder="" name="name" value="{{ $user->name }}" required>
                                                                </div>
                                                            </div>
                                                            @if($user->role==\App\Models\User::INTERVIEWER)
                                                                <div class="col-12 col-md-6 col-lg-4">
                                                                    <div class="mb-3">
                                                                        <label for="genderInput"
                                                                            class="form-label">Gender<span class="asterisk-sign">*</span></label>
                                                                        <select class="form-control" name="gender" required>
                                                                            <option value="Female" {{ (($teacher) && $teacher->gender=='Female')?'selected':'' }}>Female</option>>
                                                                                Female
                                                                            </option>
                                                                            <option value="Male" {{ (($teacher) && $teacher->gender=='Male')?'selected':'' }}>Male</option>
                                                                            <option value="Other" {{ (($teacher) && $teacher->gender=='Other')?'selected':'' }}>Other</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-md-6 col-lg-4">
                                                                    <div class="mb-3">
                                                                        <label for="dobInput" class="form-label">Date of Birth<span class="asterisk-sign">*</span></label>
                                                                        <input type="date" class="form-control" id="dobInput" placeholder="" name="dob" value="{{ ($teacher)?$teacher->dob:'' }}" required>
                                                                    </div>
                                                                </div>
                                                            @endif 
                                                            <div class="col-12 col-md-6 col-lg-4">
                                                                <div class="mb-3">
                                                                    <label for="phoneInput"
                                                                        class="form-label">Contact Number <span class="asterisk-sign">*</span></label>
                                                                    <input type="text" class="form-control phone_number" size="10" maxlength="10" id="phoneInput" placeholder="" name="phone" value="{{ $user->phone }}" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-6 col-lg-4">
                                                                <div class="mb-3">
                                                                    <label for="emailInput"
                                                                        class="form-label">Email<span class="asterisk-sign">*</span> </label>
                                                                    <input type="text" class="form-control" id="emailInput" placeholder="" name="email" value="{{ $user->email }}" required>
                                                                </div>
                                                            </div>
                                                            @if($user->role===\App\Models\User::INTERVIEWER)
                                                                <div class="col-12 col-md-6 col-lg-4">
                                                                    <div class="mb-3">
                                                                        <label for="joiningdateInput" class="form-label"><span class="asterisk-sign">*</span>Joining Date
                                                                        </label>
                                                                        <input type="date" class="form-control" id="joiningdateInput" placeholder="" name="joining_date" value="{{ ($teacher)?$teacher->joining_date:'' }}" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-md-6 col-lg-4">
                                                                    <div class="mb-3">
                                                                        <label for="qualificationInput"
                                                                            class="form-label">Qualification<span class="asterisk-sign">*</span>
                                                                        </label>
                                                                        <input type="text" class="form-control" id="qualificationInput" placeholder="" name="qualification" value="{{($teacher)? $teacher->qualification:'' }}" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-md-6 col-lg-4">
                                                                    <div class="mb-3">
                                                                        <label for="experienceInput"
                                                                            class="form-label">Experience<span class="asterisk-sign">*</span>
                                                                        </label>
                                                                        <input type="text" class="form-control" id="experienceInput" placeholder="" name="experience" value="{{ ($teacher)?$teacher->experience:''}}" required>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                @if($user->role==\App\Models\User::INTERVIEWER)
                                                    <div class="card mb-3">
                                                        <div class="card-header">
                                                            <h5 class="m-0">Address Detail</h5>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-12 col-md-6 col-lg-4">
                                                                    <div class="mb-3">
                                                                        <label for="addressInput" class="form-label"> Address<span class="asterisk-sign">*</span>
                                                                        </label>
                                                                        <input type="text" class="form-control" id="addressInput" placeholder="" name="address" value="{{ ($teacher)?$teacher->address:'' }}" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-md-6 col-lg-4">
                                                                    <div class="mb-3">
                                                                        <label for="cityInput" class="form-label">City<span class="asterisk-sign">*</span></label>
                                                                        <input type="text" class="form-control" id="cityInput" placeholder="" name="city" value="{{ ($teacher)?$teacher->city:'' }}" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-md-6 col-lg-4">
                                                                    <div class="mb-3">
                                                                        <label for="stateInput" class="form-label">State<span class="asterisk-sign">*</span> </label>
                                                                        <input type="text" class="form-control" id="stateInput" placeholder="" name="state" value="{{ ($teacher)?$teacher->state:'' }}" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-md-6 col-lg-4">
                                                                    <div class="mb-3">
                                                                        <label for="zipcodeInput"
                                                                            class="form-label">Zip Code<span class="asterisk-sign">*</span> </label>
                                                                        <input type="text" class="form-control" id="zipcodeInput" placeholder="" name="zipcode" value="{{ ($teacher)?$teacher->zipcode:'' }}" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-md-6 col-lg-4">
                                                                    <div class="mb-3">
                                                                        <label for="countryInput"
                                                                            class="form-label">Country<span class="asterisk-sign">*</span> </label>
                                                                        <input type="text" class="form-control" id="countryInput" placeholder="" name="country" value="{{ ($teacher)?$teacher->country:'' }}" required>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                <div class="row">
                                                    <div class="col-12 col-lg-12">
                                                        <button type="submit"
                                                            class="btn btn-danger">Update</button>
                                                        <button type="button"
                                                            class="btn btn-secondary">Cancel</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-addmission" role="tabpanel"
                                        aria-labelledby="v-pills-addmission-tab">
                                        <form method="post" enctype="multipart/form-data" id="resetPasswordForm">
                                            @csrf
                                            <div class="profile-kids-details">
                                                <div class="card mb-3">
                                                    <div class="card-header">
                                                        <h5 class="m-0">Change Password</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-12 col-lg-4">
                                                                <div class="mb-3">
                                                                    <label for="currentPassword"
                                                                        class="form-label">Current
                                                                        Password<span class="asterisk-sign">*</span></label>
                                                                    <input type="password" class="form-control"
                                                                        id="currentPassword" placeholder=""
                                                                        value="" name="current_password" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12 col-lg-4">
                                                                <div class="mb-3">
                                                                    <label for="password"
                                                                        class="form-label">New Password<span class="asterisk-sign">*</span></label>
                                                                    <input type="password" class="form-control"
                                                                        id="password" placeholder=""
                                                                        value="" name="password" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12 col-lg-4">
                                                                <div class="mb-3">
                                                                    <label for="password_confirm"
                                                                        class="form-label">Confirm
                                                                        Password<span class="asterisk-sign">*</span></label>
                                                                    <input type="password" class="form-control"
                                                                        id="password_confirm" placeholder=""
                                                                        value="" name="password_confirm" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 col-lg-12">
                                                        <button type="submit"
                                                            class="btn btn-danger">Update</button>
                                                        <button type="button"
                                                            class="btn btn-secondary" id="cancelResetPasswordBtn">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
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
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script>
  function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload").change(function () {
    readURL(this);
    var imageForm = new FormData();
    var image = $(this)[0].files[0];
    imageForm.append('image',image);
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "{{ route('superadmin.settings.profileImageUpdate') }}",
        type: 'post',
        data: imageForm,
        contentType: false,
        processData: false,
        success: function(response){
            toastr.options.timeOut = 5000;
            toastr.success('Profile Image updated Successfully');
        },
    });
});
jQuery(function($) {
    $('#resetPasswordForm').validate({
        rules: {
            current_password: {
                required: true,
            },
            password: {
                required: true,
                min:8
            },
            password_confirm: {
                required: true,
                equalTo: "#password"
            }
        }
    });
    $('#resetPasswordForm').on('submit', function(e) {
        e.preventDefault();
        if ($(this).valid()) {
            $.ajax({
                url: "{{ route('superadmin.settings.resetPasword') }}",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (res) {
                    toastr.options.timeOut = 5000;
                    toastr.success('Password updated Successfully');
                },
                error:function (error) {
                    toastr.options.timeOut = 5000;
                    toastr.error('Current password does not match!');
                }
            });
        }
    });
});
$(function() {
    $('.phone_number').keypress(validateNumber);
    $('.age_number').keypress(validateNumber);

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

    $('.phone_number, .age_number').keydown(function (e) {
        if ($.inArray(e.keyCode, [32,46, 8, 9, 27, 13, 110, 190]) !== -1 ||
            // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
            // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
            // let it happen, don't do anything
            return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });

    $('.txtNumeric').keydown(function (e) {
        if (e.altKey) {
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
@endpush