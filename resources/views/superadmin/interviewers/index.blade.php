@extends('superadmin.layout.master')

@section('main-content-section')
<div class="container-fluid px-lg-4 mt-4 mt-xl-5">
    <div class="row">
        <div class="col-xl-12 col-md-12">
            <div class="card border-0 shadow">
                <div class="card-header bg-transparent d-xl-none d-block">
                    <div class="page-title">
                        <h4 class="mb-0 fw-semi">Interviewers</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-header">
                        <div class="row">
                            <div class="col-12 col-md-8">
                                <div class="row g-2 align-items-center mb-4">
                                    <div class="col-12 col-md-auto col-xl-auto">
                                        <label for="inputPassword6" class="col-form-label">Filter
                                            by</label>
                                    </div>
                                    <div class="col-12 col-md-4 col-xl-3">
                                        <select class="form-control" name="diseasefilter" id="diseasefilter">
                                            <option value="" disabled selected>Select Speciality</option>
                                             <option value="All">All</option>
                                            @foreach($diseases as $key=>$disease)
                                                <option value="{{ $key }}">{{ $disease }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-auto col-xl-auto">
                                        <select class="form-control" aria-label="Default select example" name="genderfilter" id="genderfilter">
                                            <option value="" selected>Select Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 text-center text-lg-right">
                                {{-- <button type="button" class="btn btn-light mb-3 mb-lg-0">
                                    <i class="fas fa-upload"></i>
                                    Export
                                </button> --}}
                                <button type="button" class="btn btn-danger mb-3 mb-lg-0"
                                    data-bs-toggle="modal" data-bs-target="#addinterviewerModal">
                                    <i class="fas fa-plus"></i>
                                    Add Interviewer
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- <table class="table table-bordered align-middle tb-light"> -->
                    <table class="display responsive nowrap myTable tb-light interviewers-datatable" width="100%">
                        <thead class="table-light">
                            <tr>
                                <th class="text-uppercase">Sr No.</th>
                                <th class="text-uppercase">Interviewer Name</th>
                                <th class="text-uppercase">Mobile Number</th>
                                <th class="text-uppercase">Department</th>
                                <th class="text-uppercase">Designation</th>
                                <th class="text-uppercase">Joined Date</th>
                                <th class="text-uppercase">Action</th>
                            </tr>
                        </thead>
                       <tbody>
                        
                       </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
 
<!--Add interviewer Modal-->
<div class="modal fade" id="addinterviewerModal" tabindex="-1" aria-labelledby="addinterviewerModalLabel"aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h4 class="modal-title text-danger" id="addKidsModalLabel">Add Interviewer</h4>
                <button type="button" class="close"  data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addinterviewers" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="card mb-3">
                        <div class="card-header">
                            <h5 class="mb-0">Upload Profile Photo</h5>
                        </div>
                        <div class="card-body">
                            <div class="avatar-upload">
                                <div class="avatar-edit">
                                    <input id="imageUpload" name="image" accept="image/png, image/jpg, image/jpeg" type="file" class="form-control">
                                    <label for="imageUpload" class="form-label"></label>
                                </div>
                              
                                <div class="avatar-preview">
                                    <div id="imagePreview" style="background-image: url('imgs/profile-image.jpg');">
                                    </div> 
                                </div>
                            </div>
                            <p id="imageUpload-error" class="error imageUpload-error" align="center"></p>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header">
                            <h5 class="mb-0">Basic Details</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-sm-6 col-lg-4">
                                    <div class="mb-3">
                                        <label for="interviewerIDInput" class="form-label">Interviewer ID</label>
                                        <input type="text" class="form-control" name="interviewer_id" id="interviewerIDInput" placeholder="">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-lg-4">
                                    <div class="mb-3">
                                        <label for="specialityinput" class="form-label">Speciality</label>
                                        <select class="form-control" name="disease" id="specialityinput">
                                            <option value="" disabled selected>Select Speciality</option>
                                            @foreach($diseases as $key=>$disease)
                                                <option value="{{ $key }}">{{ $disease }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-lg-4">
                                    <div class="mb-3">
                                        <label for="assignClassInput" class="form-label">Assign Class</label>
                                        <input type="text" class="form-control" name="assign_class" id="assignClassInput" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-md-12 col-lg-4">
                                    <div class="mb-3">
                                        <label for="interviewernameInput" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="interviewernameInput" name="name" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-4">
                                    <div class="mb-3">
                                        <label for="interviewerGenderInput" class="form-label">Gender
                                        </label>
                                        <select class="form-control" name="gender" id="genderinput">
                                            <option selected disabled>Select Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-4">
                                    <div class="mb-3">
                                        <label for="interviewerDOBInput" class="form-label">Date of
                                            Birth</label>
                                        <input type="date" name="dob" class="form-control" id="interviewerDOBInput" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-4">
                                    <div class="mb-3">
                                        <label for="interviewerPhoneInput" class="form-label"> Contact
                                            Number</label>
                                            <input type="text" name="phone" class="form-control unique_user_phoneNumber" id="phone" value="{{ old('phone') }}" minlength="14" maxlength="14" autocomplete="off" return false;">
                                            @error('phone')
                                            <h6 class="text-danger">{{ $message }}</h6>
                                            @enderror
                                        {{-- <input type="text" name="phone" id="interviewerPhoneInput" class="form-control phone_number" size="10" maxlength="10" placeholder=""> --}}
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-4">
                                    <div class="mb-3">
                                        <label for="interviewerJODInput" class="form-label">Joining Date</label>
                                        <input type="date" class="form-control" id="interviewerJODInput" name="joining_date" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-4">
                                    <div class="mb-3">
                                        <label for="interviewerQualificationInput" class="form-label">Qualification
                                           </label>
                                        <input type="text" class="form-control" id="interviewerQualificationInput"
                                            placeholder="" name="qualification">
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-4">
                                    <div class="mb-3">
                                        <label for="departmentInput" class="form-label">
                                            Department
                                        </label>
                                        <input type="text" class="form-control" id="departmentInput" placeholder=""
                                            value="" name="department">
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-4">
                                    <div class="mb-3">
                                        <label for="designationInput" class="form-label">
                                            Designation
                                        </label>
                                        <input type="text" class="form-control" id="designationInput" placeholder=""
                                            value="" name="designation">
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-4">
                                    <div class="mb-3">
                                        <label for="interviewerExperienceInput" class="form-label">Experience</label>
                                        <input type="text" class="form-control" id="interviewerExperienceInput"
                                            placeholder="" name="experience">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header">
                            <h5 class="mb-0">Login Details</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-lg-4">
                                    <div class="mb-3">
                                        <label for="emailIDInput" class="form-label">Email ID</label>
                                        <input type="text" class="form-control" id="emailIDInput" placeholder=""value="" name="email">
                                        <p id="emailError" class="error"></p>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-4">
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password"
                                            placeholder="" value="" name="password">
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-4">
                                    <div class="mb-3">
                                        <label for="password_confirm" class="form-label">Repeat Password</label>
                                        <input type="password" class="form-control" id="password_confirm"
                                            placeholder="" value="" name="password_confirm">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header">
                            <h5 class="mb-0">Address</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    <div class="mb-3">
                                        <label for="addressInput" class="form-label">Address</label>
                                        <textarea name="address" class="form-control" placeholder=""></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-3">
                                    <div class="mb-3">
                                        <label for="cityInput" class="form-label">City</label>
                                        <input type="text" name="city" class="form-control" id="cityInput"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-3">
                                        <div class="mb-3">
                                            <label for="stateInput" class="form-label">State</label>
                                            <input type="text" class="form-control" id="stateInput" name="state" placeholder="" value="">
                                        </div>
                                </div>
                                <div class="col-md-12 col-lg-3">
                                    <div class="mb-3">
                                        <label for="zipCodeInput" class="form-label">Zip Code</label>
                                        <input type="text" class="form-control" id="zipCodeInput" name="zipcode" placeholder=""
                                            value="">
                                           
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-3">
                                    <div class="mb-3">
                                        <label for="countryInput" class="form-label">Country</label>
                                        <input type="text" class="form-control" id="countryInput" name="country" placeholder=""
                                            value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-center mt-4">
                        <button type="button" class="btn btn-secondary mx-1" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger mx-1" id="addinterviewerBtn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--Edit interviewer Modal-->
<div class="modal fade" id="editInterviewerModal" tabindex="-1" aria-labelledby="editInterviewerModalLabel"aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h4 class="modal-title text-danger" id="editInterviewerModalLabel"></h4>
                <button type="button" class="close"  data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editInterviewers" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="card mb-3">
                        <div class="card-header">
                            <h5 class="mb-0">Upload Profile Photo</h5>
                        </div>
                        <div class="card-body">
                            <div class="avatar-upload">
                                <div class="avatar-edit">
                                    <input id="edit_imageUpload" name="image" accept="image/png, image/jpg, image/jpeg" type="file" class="form-control">
                                    <label for="edit_imageUpload" class="form-label"></label>
                                </div>
                              
                                <div class="avatar-preview" id="edit_imagePreview">
                                   
                                </div>
                            </div>
                           
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header">
                            <h5 class="mb-0">Basic Details</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-sm-6 col-lg-4">
                                    <div class="mb-3">
                                        <label for="edit_interviewerIDInput" class="form-label">Interviewer ID</label>
                                        <input type="text" class="form-control" name="interviewer_id" id="edit_interviewerIDInput" placeholder="">
                                        <input type="hidden" class="form-control" name="id" id="edit_interviewerId">
                                        <input type="hidden" class="form-control" name="user_id" id="user_id">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-lg-4">
                                    <div class="mb-3">
                                        <label for="edit_specialityinput" class="form-label">Speciality</label>
                                        <select class="form-control" name="disease" id="edit_specialityinput">
                                            @foreach($diseases as $key=>$disease)
                                                <option value="{{ $key }}">{{ $disease }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-lg-4">
                                    <div class="mb-3">
                                        <label for="edit_assignClassInput" class="form-label">Assign Class</label>
                                        <input type="text" class="form-control" name="assign_class" id="edit_assignClassInput" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-md-12 col-lg-4">
                                    <div class="mb-3">
                                        <label for="edit_interviewernameInput" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="edit_interviewernameInput" name="name" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-4">
                                    <div class="mb-3">
                                        <label for="edit_genderinput" class="form-label">gender
                                        </label>
                                        <select class="form-control" name="gender" id="edit_genderinput">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-4">
                                    <div class="mb-3">
                                        <label for="edit_interviewerDOBInput" class="form-label">Date of
                                            Birth</label>
                                        <input type="date" name="dob" class="form-control" id="edit_interviewerDOBInput" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-4">
                                    <div class="mb-3">
                                        <label for="edit_interviewerPhoneInput" class="form-label"> Contact
                                            Number</label>
                                            <input type="text" name="phone" class="form-control unique_user_phoneNumber" id="edit_interviewerPhoneInput" value="{{ old('phone') }}" minlength="14" maxlength="14" autocomplete="off" return false;">
                                            @error('phone')
                                            <h6 class="text-danger">{{ $message }}</h6>
                                            @enderror
                                        {{-- <input type="text" name="phone" id="edit_interviewerPhoneInput" class="form-control phone_number" size="10" maxlength="10" placeholder=""> --}}
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-4">
                                    <div class="mb-3">
                                        <label for="edit_interviewerJODInput" class="form-label">Joining Date</label>
                                        <input type="date" class="form-control" id="edit_interviewerJODInput" name="joining_date" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-4">
                                    <div class="mb-3">
                                        <label for="edit_interviewerQualificationInput" class="form-label">Qualification
                                            </label>
                                        <input type="text" class="form-control" id="edit_interviewerQualificationInput"
                                            placeholder="" name="qualification">
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-4">
                                    <div class="mb-3">
                                        <label for="edit_departmentInput" class="form-label">
                                            Department
                                        </label>
                                        <input type="text" class="form-control" id="edit_departmentInput" placeholder=""
                                            value="" name="department">
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-4">
                                    <div class="mb-3">
                                        <label for="edit_designationInput" class="form-label">
                                            Designation
                                        </label>
                                        <input type="text" class="form-control" id="edit_designationInput" placeholder=""
                                            value="" name="designation">
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-4">
                                    <div class="mb-3">
                                        <label for="edit_interviewerExperienceInput" class="form-label">Experience</label>
                                        <input type="text" class="form-control" id="edit_interviewerExperienceInput"
                                            placeholder="" name="experience">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header">
                            <h5 class="mb-0">Login Details</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-lg-4">
                                    <div class="mb-3">
                                        <label for="edit_emailIDInput" class="form-label">Email ID</label>
                                        <input type="text" class="form-control" id="edit_emailIDInput" placeholder=""value="" name="email">
                                        <p id="emailError" class="error"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header">
                            <h5 class="mb-0">Address</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    <div class="mb-3">
                                        <label for="edit_addressInput" class="form-label">Address</label>
                                        <textarea name="address" class="form-control" placeholder="" id="edit_addressInput"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-3">
                                    <div class="mb-3">
                                        <label for="edit_cityInput" class="form-label">City</label>
                                        <input type="text" name="city" class="form-control" id="edit_cityInput"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-3">
                                        <div class="mb-3">
                                            <label for="edit_stateInput" class="form-label">State</label>
                                            <input type="text" class="form-control" id="edit_stateInput" name="state" placeholder="" value="">
                                        </div>
                                </div>
                                <div class="col-md-12 col-lg-3">
                                    <div class="mb-3">
                                        <label for="edit_zipCodeInput" class="form-label">Zip Code</label>
                                        <input type="text" class="form-control" id="edit_zipCodeInput" name="zipcode" placeholder=""
                                            value="">
                                           
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-3">
                                    <div class="mb-3">
                                        <label for="edit_countryInput" class="form-label">Country</label>
                                        <input type="text" class="form-control" id="edit_countryInput" name="country" placeholder=""
                                            value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-center mt-4">
                        <button type="button" class="btn btn-secondary mx-1" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger mx-1" id="editInterviewerBtn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--Add interviewer Details Successfully Modal-->
<div class="modal fade" id="addinterviewerSuccessModal" tabindex="-1" aria-labelledby="addinterviewerSuccessModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border-0 shadow-lg">
            <!-- <div class="modal-header">
                <h5 class="modal-title text-danger" id="addKidsSuccessModalLabel">View Kids Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div> -->
            <div class="modal-body">
                <div class="text-center p-lg-5">
                    <div class="mb-3">
                        <i class="far fa-check-circle fa-4x text-success"></i>
                    </div>
                    <h5 class="mb-0">Interviewer has been successfully created.</h5>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button> -->
                <a href="{{ route('superadmin.interviewers.index') }}" role="button" class="btn btn-danger">Ok</a>
            </div>
        </div>
    </div>
</div>

<!--Edit interviewer Details Successfully Modal-->
<div class="modal fade" id="editInterviewerSuccessModal" tabindex="-1" aria-labelledby="editInterviewerSuccessModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border-0 shadow-lg">
            <!-- <div class="modal-header">
                <h5 class="modal-title text-danger" id="addKidsSuccessModalLabel">View Kids Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div> -->
            <div class="modal-body">
                <div class="text-center p-lg-5">
                    <div class="mb-3">
                        <i class="far fa-check-circle fa-4x text-success"></i>
                    </div>
                    <h5 class="mb-0">Interviewer has been successfully updated.</h5>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button> -->
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Ok</button>
            </div>
        </div>
    </div>
</div>

<!--View Details interviewer Modal-->
<div class="modal fade" id="viewinterviewerModal" tabindex="-1" aria-labelledby="viewinterviewerModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger" id="viewinterviewerModalLabel"></h5>
                <button type="button" class="close"  data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <div class="horizontal-tabs">

                        <div class="row">
                            <div class="col-12 col-lg-5 col-xl-4">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                    aria-orientation="vertical">
                                    <div class="avatar-upload">
                                        {{-- <div class="avatar-edit">
                                            <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                                            <label for="imageUpload"></label>
                                        </div> --}}
                                        <div class="avatar-preview" id="interviewer_image">
            
                                        </div>
                                    </div>
                                    <div class="avatar-name mb-2">
                                        <h5 class="text-center" id="interviewer_name"></h5>
                                        <p class="text-center text-secondary" id="interviewer_disease">
                                           
                                        </p>
                                    </div>
                                    <div class="avatar-name mb-3 mb-lg-4">
                                        <svg height="20" width="20" fill="#6c757d"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                                <!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                <path
                                                    d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z" />
                                            </svg>
                                        <p class="text-center text-secondary" id="interviewer_address">
                                            
                                        </p>
                                    </div>
                                    <button class="nav-link active" id="v-pills-basic-details-tab"
                                        data-bs-toggle="pill" data-bs-target="#v-pills-basic-details" type="button"
                                        role="tab" aria-controls="v-pills-basic-details" aria-selected="true">Basic
                                        Details</button>
                                    <button class="nav-link" id="v-pills-address-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-address" type="button" role="tab"
                                        aria-controls="v-pills-address" aria-selected="false">Address</button>

                                </div>
                            </div>
                            <div class="col-12 col-lg-7 col-xl-8">
                                <div class="tab-content" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="v-pills-basic-details"
                                        role="tabpanel" aria-labelledby="v-pills-basic-details-tab">
                                        <div class="profile-interviewer-details">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <th class="bg-light text-dark">Interviewer ID</th>
                                                            <td id="interviewer_id"></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="bg-light text-dark">Interviewer Name</th>
                                                            <td id="show_interviewer_name"></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="bg-light text-dark">Interviewer Email</th>
                                                            <td id="interviewer_email"></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="bg-light text-dark">Gender</th>
                                                            <td id="interviewer_gender"></td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <th class="bg-light text-dark">Mobile</th>
                                                            <td id="interviewer_phone"></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="bg-light text-dark">Date of Joined</th>
                                                            <td id="interviewer_joining_date"></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="bg-light text-dark">Qualification</th>
                                                            <td id="interviewer_qualification"></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="bg-light text-dark">Department</th>
                                                            <td id="interviewer_department"> </td>
                                                        </tr>
                                                        <tr>
                                                            <th class="bg-light text-dark">Designation</th>
                                                            <td id="interviewer_designation"></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="bg-light text-dark">Experience</th>
                                                            <td id="interviewer_experience"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="tab-pane fade" id="v-pills-address" role="tabpanel"
                                        aria-labelledby="v-pills-address-tab">
                                        <div class="profile-interviewer-details">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <th class="bg-light text-dark">Address</th>
                                                            <td id="show_interviewer_address"></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="bg-light text-dark">City</th>
                                                            <td id="interviewer_city"></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="bg-light text-dark">State</th>
                                                            <td id="interviewer_state"></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="bg-light text-dark">Zip Code</th>
                                                            <td id="interviewer_zipcode"></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="bg-light text-dark">Country</th>
                                                            <td id="interviewer_country"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger">Next</button>
            </div> -->
        </div>
    </div>
</div>
<!-- Delete Kid Modal -->
    <div class="modal fade" id="deleteInterviewerData" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <h4 class="modal-title text-danger"></h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <h4 class="del_text">
                        Are you sure you want to delete this record
                    </h4>
                </div>
                <form id="deleteInterviewer" enctype="multipart/form-data" method="POST">
                    @csrf
                    <input type="hidden" value="" id="deleteInterviewerId" name="id">
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger me-1">Ok</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script type='text/javascript' src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
<script>
     $(document).ready(function(){
        $(":input").inputmask();
             $("#phone").inputmask({"mask": "(999) 999-9999"});
             $("#edit_interviewerPhoneInput").inputmask({"mask": "(999) 999-9999"});
    })
    var diseases = @json($diseases);
jQuery(function($) {
    // $('#addinterviewers').validate({
    //     rules: {
    //         interviewer_id: {
    //             required: true,
    //         },
    //         disease: {
    //             required: true,
    //         },
    //         assign_class: {
    //             required: true,
    //         },
    //         name: {
    //             required: true,
    //         },
    //         gender: {
    //             required: true,
    //         },
    //         dob: {
    //             required: true,
    //         },
    //         phone: {
    //             required: true,
    //         },
    //         joining_date: {
    //             required: true,
    //         },
    //         qualification: {
    //             required: true,
    //         },
    //         department: {
    //             required: true,
    //         },
    //         designation: {
    //             required: true,
    //         },
    //         experience: {
    //             required: true,
    //         },
    //         email: {
    //             required: true,
    //         },
    //         password: {
    //             required: true,
    //         },
    //         password_confirm: {
    //             required: true,
    //             equalTo: "#password"
    //         },
    //         address: {
    //             required: true,
    //         },
    //         city: {
    //             required: true,
    //         },
    //         country: {
    //             required: true,
    //         },
    //         state: {
    //             required: true,
    //         },
    //         // zipcode: {
    //         //     reuired: true,
    //         // },
    //         image: {
    //             required: true,
    //         }
        
    //     }
    // });
    $('#addinterviewers').on('submit', function(e) {
        e.preventDefault();
        // if ($(this).valid()) {
            $.ajax({
                url: "{{ route('superadmin.interviewers.store') }}",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (res) {
                    if(res.success==true){
                        $('#addinterviewerModal').modal('hide');
                        $('#addinterviewerSuccessModal').modal('show');
                        // $('#addinterviewers').trigger("reset");
                        // task_table.draw();
                    }
                }
            });
        // }
        // else{
        //     var image = $('#imageUpload').val();
        //     if(image==""){
        //         $('#imageUpload-error').append("Please Upload Profile Photo");
        //     }
        // }
    });
});
$("#imageUpload").change(function () {
    readURL(this);
    var image = $('#imageUpload').val();
    if(image!=""){
        $('#imageUpload-error').empty();
    }
});
 // Profile upload
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
var interviewers_table = '';
/* All tasks Listing */
$(function () {
    interviewers_table = $('.interviewers-datatable').DataTable({
        processing: true,
        serverSide: true,
        paging: true,
        pagelength: 10,
        "bDestroy": true,
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'pdf',
                text: 'Export',
                exportOptions: {
                    modifier: {
                        selected: null
                    },
                    columns: [1,2,3,4,5]
                }
            }
        ],
        select: true,
        ajax: {
        url: "{{ route('superadmin.interviewers.index') }}",
        data: function(data) {
            data.disease = $('#diseasefilter').val();
            data.gender = $('#genderfilter').val();
            search = data.search.value;
        },
        },
        columns: [
            {
                name: 'id',
                data: null,
                orderable: false,
                render: function(data, type, full, meta) {
                    return data.DT_RowIndex;
                }
            },
            {data: 'name', name: 'name', orderable: false},
            {data: 'phone', name: 'phone', orderable: false},
            {data: 'department', name: 'department', orderable: false},
            {data: 'designation', name: 'designation', orderable: false},
            {data: 'joining_date', name: 'joining_date', orderable: false},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
});
$(document).ready(function () {
    // Disease & gender change
    $("#diseasefilter").change(function(){
        interviewers_table.draw();
    })
    $("#genderfilter").change(function(){
        interviewers_table.draw();
    })
});

</script>
<script>
/* Get interviewer Detail*/
function showInterviewer(id){
    $.ajax({
        url: "{{url('admin/interviewers/show')}}"+"/"+id,
        type: "get",
        success: function (res) {
            if(res.success=='true'){
                var APP_URL = {!! json_encode(url('/')) !!};
                var cardImg = APP_URL+'/storage/app/storage/images/'+res.data.image;
                var image_html = '<div id="imagePreview" style="background-image: url('+cardImg+');"></div>';
                $("#viewinterviewerModalLabel").html('View '+res.data.name+' Interviewer Details');
                $("#interviewer_name").html(res.data.name ?? 'N/A');
                $("#interviewer_email").html(res.data.user ?res.data.user.email : 'N/A');
                $("#show_interviewer_name").html(res.data.name ?? 'N/A');
                $("#show_interviewer_address").html(res.data.address ?? 'N/A');
                $("#interviewer_dob").html(res.data.dob ?? 'N/A');
                $("#interviewer_gender").html(res.data.gender ?? 'N/A');
                $("#interviewer_address").html(res.data.address??'N/A');
                $("#interviewer_country").html(res.data.country ?? 'N/A');
                $("#interviewer_city").html(res.data.city ?? 'N/A');
                $("#interviewer_state").html(res.data.state ?? 'N/A');
                $("#interviewer_zipcode").html(res.data.zipcode ?? 'N/A');
                $("#interviewer_image").html(image_html);
                $("#interviewer_phone").html(res.data.phone ?? 'N/A');
                $("#interviewer_joining_date").html(res.joining_date ?? 'N/A');
                $("#interviewer_qualification").html(res.data.qualification ?? 'N/A');
                $("#interviewer_department").html(res.data.department ?? 'N/A');
                $("#interviewer_designation").html(res.data.designation ?? 'N/A');
                $("#interviewer_experience").html(res.data.experience ?? 'N/A');
                $("#interviewer_id").html(res.data.interviewer_id ?? 'N/A');
                $("#interviewer_disease").html(diseases[res.data.disease] ?? 'N/A');
                $('#viewinterviewerModal').modal('show');
            }
        }
    });
}
/* Get interviewer Detail for edit*/
function editInterviewer(id){
    $.ajax({
        url: "{{url('admin/interviewers/edit')}}"+"/"+id,
        type: "get",
        success: function (res) {
            if(res.success==true){
                console.log(res.response)
                var APP_URL = {!! json_encode(url('/')) !!};
                var cardImg = APP_URL+'/storage/app/storage/images/'+res.response.image;
                var image_html = '<img id="edit_interviewerImage" src="'+cardImg+'">';
                $("#editInterviewerModalLabel").html('Edit '+res.response.name+' Details');
                $("#edit_interviewerId").val(id);
                $("#user_id").val(res.response.user_id);
                $("#edit_interviewerIDInput").val(res.response.interviewer_id);
                $('#edit_specialityinput option[value="'+diseases[res.response.disease]+'"]').attr("selected", "selected");
                $("#edit_assignClassInput").val(res.response.assign_class);
                $("#edit_interviewernameInput").val(res.response.name);
                $("#edit_genderinput").val(res.response.gender);
                $("#edit_interviewerDOBInput").val(res.response.dob);
                $("#edit_interviewerPhoneInput").val(res.response.phone);
                $("#edit_interviewerJODInput").val(res.response.joining_date);
                $("#edit_interviewerQualificationInput").val(res.response.qualification);
                $("#edit_departmentInput").val(res.response.department);
                $("#edit_designationInput").val(res.response.designation);
                $("#edit_interviewerExperienceInput").val(res.response.experience);
                $("#edit_emailIDInput").val((res.response.user)?res.response.user.email:'');
                $("#edit_addressInput").val(res.response.address);
                $("#edit_cityInput").val(res.response.city);
                $("#edit_countryInput").val(res.response.country);
                $("#edit_stateInput").val(res.response.state);
                $("#edit_zipCodeInput").val(res.response.zipcode);
                if(res.response.image){
                    $("#edit_imagePreview").html(image_html);
                }
               
               
                $('#editInterviewerModal').modal("show");
            }

        }
    });
}
jQuery(function($) {
    // $('#editInterviewers').validate({
    //     rules: {
    //         interviewer_id: {
    //             required: true,
    //         },
    //         disease: {
    //             required: true,
    //         },
    //         assign_class: {
    //             required: true,
    //         },
    //         name: {
    //             required: true,
    //         },
    //         gender: {
    //             required: true,
    //         },
    //         dob: {
    //             required: true,
    //         },
    //         phone: {
    //             required: true,
    //         },
    //         joining_date: {
    //             required: true,
    //         },
    //         qualification: {
    //             required: true,
    //         },
    //         department: {
    //             required: true,
    //         },
    //         designation: {
    //             required: true,
    //         },
    //         experience: {
    //             required: true,
    //         },
    //         email: {
    //             required: true,
    //         },
    //         password: {
    //             required: true,
    //         },
    //         password_confirm: {
    //             required: true,
    //             equalTo: "#password"
    //         },
    //         address: {
    //             required: true,
    //         },
    //         city: {
    //             required: true,
    //         },
    //         country: {
    //             required: true,
    //         },
    //         state: {
    //             required: true,
    //         },
    //         zipcode: {
    //             required: true,
    //         }
    //     }
    // });
    $('#editInterviewers').on('submit', function(e) {
        e.preventDefault();
        // if ($(this).valid()) {
            $.ajax({
                url: "{{ route('superadmin.interviewers.update') }}",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (res) {
                    if(res.success==true){
                        $('#editInterviewerModal').modal('hide');
                        $('#editInterviewerSuccessModal').modal('show');
                        $('#editInterviewers').trigger("reset");
                        interviewers_table.draw();
                    }
                }
            });
        // }
        
    });
});
$("#edit_imageUpload").change(function () {
  
    readURLEdit(this);
});
function readURLEdit(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        // var image_html ='<div id="edit_imagePreviewdiv" style="background-image: url('');"></div>'; 
      
       
        reader.onload = function (e) {
            var image_html = '<img id="edit_interviewerImage" src="'+ e.target.result+'">';
            $("#edit_imagePreview").html(image_html);
        }
       
        reader.readAsDataURL(input.files[0]);
    }
}
function deleteInterviewer(id) {
            $('#deleteInterviewerId').val(id);
}
 $('#deleteInterviewer').on('submit', function(e) {
    e.preventDefault();
    if ($(this).valid()) {
        $.ajax({
            url: "{{  route('superadmin.interviewers.deleteInterviewer') }}",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(res) {
                if (res.success == true) {
                        $('#deleteInterviewerData').modal('hide');
                        interviewers_table.draw();
                    
                }
            }
        });
    }
});
</script>
@endpush
