@extends('superadmin.layout.master')

@section('main-content-section')

<!-- content area start -->
    <div class="container-fluid px-lg-4 mt-4 mt-xl-5">
        <div class="row">
            <div class="col-xl-12 col-md-12">
                <div class="card border-0 shadow">
                    <div class="card-header bg-transparent d-xl-none d-block">
                        <div class="page-title">
                            <h4 class="mb-0 fw-semi">Our Candidates</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-header">
                            <div class="row">
                                <div class="col-12 col-md-8">
                                    <div class="row g-2 align-items-center mb-4">
                                        <div class="col-12 col-md-auto col-xl-auto">
                                            <label for="inputPassword6" class="col-form-label">Filter by</label>
                                        </div>
                                        <div class="col-12 col-md-4 col-xl-3">
                                            <select class="form-control" name="diseasefilter" id="diseasefilter">
                                                <option value="" disabled selected>Select Speciality</option>
                                                 <option value="All">All</option>
                                                @foreach($diseases as $key=>$disease)
                                                    <option value="{{ $disease }}">{{ $disease }}</option>
                                                @endforeach
                                            </select>
                                            <!-- <select class="form-control" aria-label="Default select example">
                                                <option selected>Select Speciality</option>
                                                <option value="1">Down syndrome</option>
                                                <option value="2">Autism spectrum disorder</option>
                                                <option value="3">Cerebral palsy</option>
                                                <option value="4">Attention-deficit/hyperactivity disorder
                                                    (ADHD)</option>
                                                <option value="5"> Intellectual disability</option>
                                                <option value="6">Specific learning disabilities (e.g. dyslexia,
                                                    dyscalculia)</option>
                                                <option value="7">Fetal alcohol spectrum disorder (FASD)
                                                </option>
                                                <option value="8">Fragile X syndrome</option>
                                                <option value="9">Muscular dystrophy</option>
                                                <option value="10">Spina bifida</option>
                                            </select> -->
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
                                    <div class="page-action mb-4 mb-lg-0">
                                        {{-- <button type="button" class="btn btn-light">
                                            <i class="fas fa-upload"></i>
                                            Export
                                        </button> --}}
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#addKidsModal">
                                                <i class="fas fa-plus"></i>
                                                Add New
                                            </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <table class="table table-bordered align-middle tb-light"> -->
                        <table id="newtable" class="responsive nowrap displayTable all-kids-datatable" width="100%">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-uppercase">Sr No.</th>
                                    <th class="text-uppercase">Candidate First Name</th>
                                    <th class="text-uppercase">Last Name</th>
                                    <th class="text-uppercase">Joined on</th>
                                    <th class="text-uppercase">Guardian Contact</th>
                                    <th class="text-uppercase">Interviewer</th>
                                    <th class="text-uppercase">Added By</th>
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

<!--Add Kidz Modal-->
<div class="modal fade" id="addKidsModal" tabindex="-1" aria-labelledby="addKidsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h4 class="modal-title text-danger" id="addKidsModalLabel">Add Candidate</h4>
                <button type="button" class="close"  data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- <form action="{{ route('superadmin.candidate.store') }}" id="addKids" enctype="multipart/form-data" method="POST"> -->
                <form id="addKids" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-sm-6 col-lg-4">
                            <div class="mb-3">
                                <label for="addmissionInput" class="form-label">Addmission No.</label>
                                <input type="text" class="form-control" name="admission_number" id="addmissionInput" placeholder="">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-4">
                            <div class="mb-3">
                                <label for="specialityinput" class="form-label">Speciality</label>
                                 <input type="text" class="form-control" name="disease" id="diseasefilter" placeholder="">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-4">
                            <div class="mb-3">
                                <label for="specialityinput" class="form-label">Assign Teacher </label>
                                @if(Auth::user()->role==\App\Models\User::SUPER_ADMIN)
                                <select class="form-control" name="assigned_teacher" id="interviewer_id"
                                    aria-label="Default select example">
                                    <option value="" id="" disabled selected>Select Teacher</option>
                                    @foreach($teachers as $teacher)
                                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                    @endforeach
                                </select>
                                @else
                                <input type="text" class="form-control" value="{{$teacher_name}}" disabled>
                                @endif
                                <!-- <select class="form-control" id="specialityinput"
                                    aria-label="Default select example">
                                    <option value="0" selected>Select Teacher</option>
                                    <option value="1"> Albert Einstein</option>
                                    <option value="2"> Anne Sullivan</option>
                                    <option value="3">Cerebral palsy</option>
                                    <option value="4"> Christa McAuliffe</option>
                                    <option value="5"> Friedrich Froebel</option>
                                    <option value="6"> Gabriela Mistral</option>
                                    <option value="7"> Jaime Escalante</option>
                                    <option value="8">Kakenya Ntaiya</option>
                                    <option value="9">Maya Angelou</option>
                                    <option value="10">J.K. Rowling</option>
                                </select> -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="wizard mt-3">
                                <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                                    <li class="nav-item flex-fill " role="presentation" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Step 1">
                                        <a class="nav-link active mx-auto d-flex align-items-center justify-content-center"
                                            href="#step1" id="step1-tab" data-bs-toggle="tab" role="tab"
                                            aria-controls="step1" aria-selected="true">
                                            <i class="fa fa-check checked-icons mr-1"></i>
                                            Candidates
                                        </a>
                                    </li>
                                    <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Step 2">
                                        <a class="nav-link mx-auto d-flex align-items-center justify-content-center"
                                            href="#step2" id="step2-tab" data-bs-toggle="tab" role="tab"
                                            aria-controls="step2" aria-selected="false" title="Step 2">
                                            <i class="fa fa-check checked-icons mr-1"></i>
                                            Parents Information
                                        </a>
                                    </li>
                                    <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Step 3">
                                        <a class="nav-link mx-auto d-flex align-items-center justify-content-center"
                                            href="#step3" id="step3-tab" data-bs-toggle="tab" role="tab"
                                            aria-controls="step3" aria-selected="false" title="Step 3">
                                            <i class="fa fa-check checked-icons mr-1"></i>
                                            Emergency Conatct
                                        </a>
                                    </li>
                                    <!-- <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Step 4">
                                        <a class="nav-link mx-auto d-flex align-items-center justify-content-center"
                                            href="#step4" id="step4-tab" data-bs-toggle="tab" role="tab"
                                            aria-controls="step4" aria-selected="false" title="Step 3">
                                            <i class="fa fa-check checked-icons me-1"></i>
                                            Additional information
                                        </a>
                                    </li> -->
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" role="tabpanel" id="step1"
                                        aria-labelledby="step1-tab">
                                        <div class="step-wizard-content mt-4">
                                            <div class="step-wizard-title border-bottom pb-2 mb-2 mb-3">
                                                <h5 class="mb-0">Candidate's Information</h5>
                                            </div>
                                            <div class="step-wizard-form">
                                                <div class="row">
                                                    <div class="col-12 col-lg-4">
                                                        <div class="mb-3">
                                                            <label for="kidsnameInput" class="form-label">Candidate Name</label>
                                                            <input type="text" class="form-control"
                                                                id="kidsnameInput" name="name" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-4">
                                                        <div class="mb-3">
                                                            <label for="dobInput" class="form-label">Date of
                                                                Birth</label>
                                                            <input type="date" name="dob" class="form-control" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-4">
                                                        <div class="mb-3">
                                                            <label for="genderinput" class="form-label">Gender
                                                             </label>
                                                            <select class="form-control" name="gender" id="genderinput">
                                                                <option selected disabled>Select Gender</option>
                                                                <option value="Male">Male</option>
                                                                <option value="Female">Female</option>
                                                                <option value="Other">Other</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-4">
                                                        <div class="mb-3">
                                                            <label for="placeInput" class="form-label">Place of
                                                                Birth</label>
                                                            <input type="text" class="form-control" name="place_of_birth"
                                                                placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-8">
                                                        <div class="mb-3">
                                                            <label for="addressinput" class="form-label">Address
                                                             </label>
                                                            <input type="text" name="address" class="form-control" placeholder="" >
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-4">
                                                        <div class="mb-3">
                                                            <label for="placeInput"
                                                                class="form-label">Street </label>
                                                            <input type="text" name="street" class="form-control"
                                                                placeholder="" >
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-4">
                                                        <div class="mb-3">
                                                            <label for="placeInput" class="form-label">City</label>
                                                            <input type="text" name="city" class="form-control"
                                                                placeholder="" >
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-4">
                                                        <div class="mb-3">
                                                            <label for="placeInput"
                                                                class="form-label">County/Department</label>
                                                            <input type="text" name="country" class="form-control"
                                                                placeholder="" >
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-4">
                                                        <div class="mb-3">
                                                            <label for="placeInput"
                                                                class="form-label">State/Region </label>
                                                            <input type="text" name="state" class="form-control"
                                                                placeholder="" >
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-4">
                                                        <div class="mb-3">
                                                            <label for="postcode"
                                                                class="form-label">Postcode </label>
                                                            <input type="text" name="postcode" class="form-control" id="postcode"
                                                                placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-4">
                                                        <div class="mb-3">
                                                            <label class="form-label">Image</label>
                                                            <input id="" name="image" accept="image/png, image/jpg, image/jpeg" type="file" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="wizard-footer d-flex justify-content-end">
                                            <a class="btn btn-danger add-next validate-form-step1">Continue
                                            </a>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" role="tabpanel" id="step2"
                                        aria-labelledby="step2-tab">
                                        <div class="step-wizard-content mt-4">
                                            <div class="step-wizard-title border-bottom pb-2 mb-2 mb-3">
                                                <h5 class="mb-0">Parent's Information</h5>
                                            </div>
                                            <div class="step-wizard-form appendchild-2">
                                                <div class="row">
                                                    <div class="col-12 col-lg-4">
                                                        <div class="mb-3">
                                                            <label for="guardian_nameInput" class="form-label">Parent
                                                                Name</label>
                                                            <input type="text" class="form-control"
                                                                id="guardian_nameInput" name="guardian_name" placeholder="" >
                                                                @error('guardian_name')
                                                                    <h6 class="text-danger">{{ $message }}</h6>
                                                                @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-4">
                                                        <div class="mb-3">
                                                            <label for="guardian_relationship" class="form-label">Relationship to child
                                                            </label>
                                                            <select name="guardian_relationship" class="form-control" id="guardian_relationship" >
                                                                <option selected disabled>Select Relationship</option>
                                                                <option value="Father">Father</option>
                                                                <option value="Mother">Mother</option>
                                                                <option value="Brother">Brother</option>
                                                                <option value="Sister">Sister</option>
                                                                <option value="Sister">Other</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-4">
                                                        <div class="mb-3">
                                                            <label for="placeInput" class="form-label">Contact
                                                                Number </label>
                                                                <input type="text" name="guardian_phone_number" class="form-control unique_user_phoneNumber" id="add_parentContactInput" value="" minlength="14" maxlength="14" autocomplete="off" onkeyup="phoneValidation(); return false;" >
                                                                @error('phone')
                                                                <h6 class="text-danger">{{ $message }}</h6>
                                                                @enderror
                                                            {{-- <input type="text" name="guardian_phone_number" class="form-control reg_phone_number" size="10" maxlength="10" placeholder=""> --}}
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-4">
                                                        <div class="mb-3">
                                                            <label for="placeInput" class="form-label">Residential
                                                                Address</label>
                                                            <input type="text" name="guardian_address" class="form-control" placeholder="" >
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-4">
                                                        <div class="mb-3">
                                                            <label for="placeInput" class="form-label">Email
                                                                Address</label>
                                                            <input type="text" name="guardian_email" class="form-control"
                                                                placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-4">
                                                        <div class="mt-4">
                                                            <button type="button" class="btn btn-danger"id="add">
                                                                <i class="fas fa-plus"></i>
                                                                Add More
                                                            </button>
                                                        </div>
                                                      
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="wizard-footer d-flex justify-content-between">
                                            <div class="steps-cancel">
                                                <!-- <button type="button" class="btn btn-danger me-1"
                                                    data-bs-dismiss="modal">
                                                    Save
                                                </button> -->
                                            </div>
                                            <div class="steps-action">
                                                <button type="button" class="btn btn-secondary me-1 add-previous">
                                                    Back
                                                </button>
                                                <button type="button" class="btn btn-danger add-next">
                                                    Continue
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" role="tabpanel" id="step3"
                                        aria-labelledby="step3-tab">
                                        <div class="step-wizard-content mt-4">
                                            <div class="step-wizard-title border-bottom pb-2 mb-2 mb-3">
                                                <h5 class="mb-0">Emergency Contact</h5>
                                            </div>
                                            <div class="step-wizard-form">
                                                <div class="row">
                                                    <div class="col-12 col-lg-4">
                                                        <div class="mb-3">
                                                            <label for="em_parent_nameInput" class="form-label">
                                                                Name</label>
                                                            <input type="text" class="form-control"
                                                                id="em_parent_nameInput" name="em_parent_name" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-4">
                                                        <div class="mb-3">
                                                            <label for="em_relationship" class="form-label">Relationship to child 
                                                            </label>
                                                            <select class="form-control" name="em_relationship" id="em_relationship" > 
                                                                <option selected disabled>Select Relationship</option>
                                                                <option value="Father">Father</option>
                                                                <option value="Mother">Mother</option>
                                                                <option value="Brother">Brother</option>
                                                                <option value="Sister">Sister</option>
                                                                <option value="Other">Other</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-4">
                                                        <div class="mb-3">
                                                            <label for="placeInput" class="form-label">Contact
                                                                Number</label>
                                                                <input type="text" name="em_phone_number" class="form-control unique_user_phoneNumber" id="add_em_phone_number" value="" minlength="14" maxlength="14" autocomplete="off" onkeyup="phoneValidation(); return false;">
                                                                @error('phone')
                                                                <h6 class="text-danger">{{ $message }}</h6>
                                                                @enderror
                                                            {{-- <input type="text" name="em_phone_number" class="form-control reg_phone_number" size="10" maxlength="10" placeholder="" > --}}
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-lg-4">
                                                        <div class="mb-3">
                                                            <label for="placeInput" class="form-label">Email
                                                                Address</label>
                                                            <input type="text" name="em_email" class="form-control"
                                                                placeholder="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="wizard-footer d-flex justify-content-between">
                                            <div class="steps-cancel">
                                                <!-- <button type="button" class="btn btn-danger me-1"
                                                    data-bs-dismiss="modal">
                                                    Save
                                                </button> -->
                                            </div>
                                            <div class="steps-action">
                                                <button type="button" class="btn btn-secondary me-1 add-previous">
                                                    Back
                                                </button>
                                                <!-- <button type="button" class="btn btn-danger next"
                                                    data-bs-toggle="modal" data-bs-target="#addKidsSuccessModal">
                                                    Submit
                                                    <i class="fas fa-angle-right"></i>
                                                </button> -->
                                                <button type="submit" class="btn btn-danger me-1" id="addKidsBtn">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger">Next</button>
            </div> -->
        </div>
    </div>
</div>
<!--View Details Kidz Modal-->
<div class="modal fade" id="viewKidsModal" tabindex="-1" aria-labelledby="viewKidsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger" id="viewKidsModalLabel"></h5>
                <button type="button" class="close"  data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="horizontal-tabs">
                        <div class="row">
                            <div class="col-12 col-lg-5 col-xl-4">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                    aria-orientation="vertical">
                                    <div class="avatar-upload">
                                        <div class="avatar-edit">
                                            <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                                            <!-- <label for="imageUpload"></label> -->
                                        </div>
                                        <div class="avatar-preview" id="kid_image">

                                        </div>
                                    </div>
                                    <button class="nav-link active" id="v-pills-overview-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-overview" type="button" role="tab"
                                        aria-controls="v-pills-overview" aria-selected="true">Overview</button>
                                    <button class="nav-link" id="v-pills-addmission-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-addmission" type="button" role="tab"
                                        aria-controls="v-pills-addmission" aria-selected="false">Addmission
                                        details</button>
                                    <button class="nav-link" id="v-pills-medical-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-medical" type="button" role="tab"
                                        aria-controls="v-pills-medical" aria-selected="false">Medical
                                        information</button>
                                    <button class="nav-link" id="v-pills-special-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-special" type="button" role="tab"
                                        aria-controls="v-pills-special" aria-selected="false">Special
                                        needs</button>
                                </div>
                            </div>
                            <div class="col-12 col-lg-7 col-xl-8">
                                <div class="tab-content" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="v-pills-overview" role="tabpanel"
                                        aria-labelledby="v-pills-overview-tab">
                                        <div class="profile-kids-details">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <th class="bg-light text-dark">Candidate Name</th>
                                                            <td id="kid_name"></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="bg-light text-dark">Date of Birth</th>
                                                            <td id="kid_dob"></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="bg-light text-dark">Gender</th>
                                                            <td id="kid_gender"></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="bg-light text-dark">Place of Birth</th>
                                                            <td id="kid_birth_place"></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="bg-light text-dark">Street</th>
                                                            <td id="kid_street"></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="bg-light text-dark">City</th>
                                                            <td id="kid_city"></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="bg-light text-dark">County/Department</th>
                                                            <td id="kid_country"></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="bg-light text-dark">State/Region</th>
                                                            <td id="kid_state"></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="bg-light text-dark">Postcode</th>
                                                            <td id="kid_postcode"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-addmission" role="tabpanel"
                                        aria-labelledby="v-pills-addmission-tab">
                                        <div class="profile-kids-details">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <th class="bg-light text-dark">Addmission No.</th>
                                                            <td id="kid_admission_no"></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="bg-light text-dark">Grade Applying For</th>
                                                            <td id="grade"></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="bg-light text-dark">Addmission Date</th>
                                                            <td id="kid_addmission_date"></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="bg-light text-dark">Preffered mode of
                                                                education</th>
                                                            <td id="education_mode"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-medical" role="tabpanel"
                                        aria-labelledby="v-pills-medical-tab">
                                        <div class="profile-kids-details">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <th class="bg-light text-dark">Known Allergie</th>
                                                            <td id="allergies"></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="bg-light text-dark">Specific food condition
                                                            </th>
                                                            <td id="food_condition"></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="bg-light text-dark">Regular Medication</th>
                                                            <td id="medication"></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="bg-light text-dark">Ditary Restrictions</th>
                                                            <td id="ditary_restriction"></td>
                                                        </tr>
                                                        <!-- <tr>
                                                            <th class="bg-light text-dark">Doctor Name</th>
                                                            <td id="doctor_name"></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="bg-light text-dark">Doctor Phone Number</th>
                                                            <td id="doctor_phone_no"></td>
                                                        </tr> -->
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-special" role="tabpanel"
                                        aria-labelledby="v-pills-special-tab">
                                        <div class="profile-kids-details">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <th class="bg-light text-dark">Learning Disbilities</th>
                                                            <td id="kid_disability"></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="bg-light text-dark">Behavioral Challenges
                                                            </th>
                                                            <td id="kid_behaviour"></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="bg-light text-dark">Accomodations or Support
                                                                Needed</th>
                                                            <td id="kid_accomodation"></td>
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
                </form>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger">Next</button>
            </div> -->
        </div>
    </div>
</div>


<!--Edit Kidz Modal-->
<div class="modal fade" id="editKidsModal" tabindex="-1" aria-labelledby="editKidsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h4 class="modal-title text-danger" id="editKidsModalLabel"></h4>
                <button type="button" class="close"  data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editKids" enctype="multipart/form-data" method="POST">
                    @csrf
                    <input type="hidden" id="editKidId" name="kidId">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-lg-4">
                            <div class="mb-3">
                                <label for="edit_addmissionNo" class="form-label">Addmission No.</label>
                                <input type="text" class="form-control" name="admission_number" id="edit_addmissionNo" placeholder=""
                                    value="" >
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-4">
                            <div class="mb-3">
                                <label for="edit_specialityinput" class="form-label">Speciality</label>
                                <input type="text" class="form-control" name="disease" id="edit_specialityinput" placeholder="" >
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-4">
                            <div class="mb-3">
                                <label for="edit_assigned_teacher" class="form-label">Assign Teacher </label>
                                @if(Auth::user()->role==\App\Models\User::SUPER_ADMIN)
                                <select class="form-control" name="assigned_teacher" id="edit_assigned_teacher"
                                    aria-label="Default select example" >
                                    <option value="" id="diseaseNullValue" disabled selected>Select Teacher</option>
                                    @foreach($teachers as $teacher)
                                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                    @endforeach
                                </select>
                                @else
                                <input type="text" class="form-control" value="{{$teacher_name}}" disabled>
                                @endif
                                <!-- <select class="form-control" id="specialityinput"
                                    aria-label="Default select example">
                                    <option>Select Teacher</option>
                                    <option value="1" selected> Albert Einstein</option>
                                    <option value="2"> Anne Sullivan</option>
                                    <option value="3">Cerebral palsy</option>
                                    <option value="4"> Christa McAuliffe</option>
                                    <option value="5"> Friedrich Froebel</option>
                                    <option value="6"> Gabriela Mistral</option>
                                    <option value="7"> Jaime Escalante</option>
                                    <option value="8">Kakenya Ntaiya</option>
                                    <option value="9">Maya Angelou</option>
                                    <option value="10">J.K. Rowling</option>
                                </select> -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="wizard mt-3">
                                <ul class="nav nav-tabs edit-nav-tab justify-content-center" id="myTab1" role="tablist2">
                                    <li class="nav-item flex-fill " role="presentation" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="edit-Step 1">
                                        <a class="nav-link active mx-auto d-flex align-items-center justify-content-center"
                                            href="#edit-step1" id="edit-step1-tab" data-bs-toggle="tab" role="tab"
                                            aria-controls="edit-step1" aria-selected="true">
                                            <i class="fa fa-check checked-icons mr-1"></i>
                                            Candidates
                                        </a>
                                    </li>
                                    <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="edit-Step 2">
                                        <a class="nav-link mx-auto d-flex align-items-center justify-content-center"
                                            href="#edit-step2" id="edit-step2-tab" data-bs-toggle="tab" role="tab"
                                            aria-controls="edit-step2" aria-selected="false" title="edit-Step 2">
                                            <i class="fa fa-check checked-icons mr-1"></i>
                                            Parents Information
                                        </a>
                                    </li>
                                    <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="edit-Step 3">
                                        <a class="nav-link mx-auto d-flex align-items-center justify-content-center"
                                            href="#edit-step3" id="step3-tab" data-bs-toggle="tab" role="tab"
                                            aria-controls="edit-step3" aria-selected="false" title="edit-Step 3">
                                            <i class="fa fa-check checked-icons mr-1"></i>
                                            Emergency Contact
                                        </a>
                                    </li>
                                    <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="edit-Step 4">
                                        <a class="nav-link mx-auto d-flex align-items-center justify-content-center"
                                            href="#edit-step4" id="step3-tab" data-bs-toggle="tab" role="tab"
                                            aria-controls="edit-step4" aria-selected="false" title="edit-Step 4">
                                            <i class="fa fa-check checked-icons mr-1"></i>
                                            Additional Information
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent2">
                                    <div class="tab-pane fade show active" role="tabpanel" id="edit-step1"
                                        aria-labelledby="edit-step1-tab">
                                        <div class="step-wizard-content mt-4">
                                            <div class="step-wizard-title border-bottom pb-2 mb-2 mb-3">
                                                <h5 class="mb-0">Candidate's Information</h5>
                                            </div>
                                            <div class="step-wizard-form">
                                                <div class="row">
                                                    <div class="col-12 col-lg-4">
                                                        <div class="mb-3">
                                                            <label for="kidName" class="form-label">Candidate
                                                                Name </label>
                                                            <input type="text" class="form-control" name="name"
                                                                id="kidName" placeholder="" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-4">
                                                        <div class="mb-3">
                                                            <label for="edit_dob" class="form-label">Date of Birth </label>
                                                            <input type="date" class="form-control dobInput" name="dob"
                                                                placeholder="" value=""  id="edit_dob" >
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-4">
                                                        <div class="mb-3">
                                                            <label for="edit_genderinput" class="form-label">Gender 
                                                            </label>
                                                            <select class="form-control" name="gender" id="edit_genderinput" >
                                                                <option selected disabled>Select Gender</option>
                                                                <option value="Male" selected>Male</option>
                                                                <option value="Female">Female</option>
                                                                <option value="Other">Other</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-4">
                                                        <div class="mb-3">
                                                            <label for="edit_placeInput" class="form-label">Place of
                                                                Birth </label>
                                                            <input type="text" class="form-control" id="edit_placeInput" name="place_of_birth"
                                                                placeholder="" value="" >
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-8">
                                                        <div class="mb-3">
                                                            <label for="edit_addressinput" class="form-label">Address
                                                            </label>
                                                            <input type="text" class="form-control" name="address" id="edit_addressinput" placeholder="" value="" >
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-4">
                                                        <div class="mb-3">
                                                            <label for="edit_streetInput"
                                                                class="form-label">Street </label>
                                                            <input type="text" class="form-control" id="edit_streetInput" name="street"
                                                                placeholder="" value="" >
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-4">
                                                        <div class="mb-3">
                                                            <label for="edit_cityInput" class="form-label">City </label>
                                                            <input type="text" class="form-control" id="edit_cityInput" name="city"
                                                                placeholder="" value="" >
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-4">
                                                        <div class="mb-3">
                                                            <label for="edit_countryInput"
                                                                class="form-label">County/Department</label>
                                                            <input type="text" class="form-control" id="edit_countryInput" name="country"
                                                                placeholder="" value="" >
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-4">
                                                        <div class="mb-3">
                                                            <label for="edit_stateInput"
                                                                class="form-label">State/Region </label>
                                                            <input type="text" class="form-control" id="edit_stateInput" name="state"
                                                                placeholder="" value="" >
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-4">
                                                        <div class="mb-3">
                                                            <label for="edit_postcodeInput"
                                                                class="form-label">Postcode </label>
                                                            <input type="text" class="form-control" id="edit_postcodeInput" name="postcode"
                                                                placeholder="" value="" >
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-4">
                                                        <div class="mb-3">
                                                            <label class="form-label">Image </label>
                                                            <input id="kid_image" name="image" accept="image/png, image/jpg, image/jpeg" type="file" class="form-control">
                                                        </div></div>

                                                    <div class="col-sm-6 mb-4">
                                                        <div id="img_preview"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="wizard-footer d-flex justify-content-end">
                                            <button type="button" class="btn btn-danger next">Continue </button>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" role="tabpanel" id="edit-step2"
                                        aria-labelledby="edit-step2-tab">
                                        <div class="step-wizard-content mt-4">
                                            <div class="step-wizard-title border-bottom pb-2 mb-2 mb-3">
                                                <h5 class="mb-0">Parent's Information</h5>
                                            </div>
                                            <div class="step-wizard-form">
                                                <div class="row">
                                                    <div class="col-12 col-lg-4">
                                                        <div class="mb-3">
                                                            <label for="parentnameInput" class="form-label">
                                                                Name </label>
                                                            <input type="text" class="form-control" name="guardian_name" id="parentnameInput" placeholder="" value="" > 
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-4">
                                                        <div class="mb-3">
                                                            <label for="parentRelInput" class="form-label">Relationship
                                                                to child 
                                                            </label>
                                                            <select class="form-control" id="parentRelInput" name="guardian_relationship">
                                                                <option value="0" selected disabled>Select</option>
                                                                <option value="Father">Father</option>
                                                                <option value="Mother">Mother</option>
                                                                <option value="Brother">Brother</option>
                                                                <option value="Sister">Sister</option>
                                                                <option value="Other">Other</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-4">
                                                        <div class="mb-3">
                                                            <label for="parentContactInput" class="form-label">Contact
                                                                Number </label>
                                                                <input type="text" name="guardian_phone_number" class="form-control unique_user_phoneNumber" id="parentContactInput" value="" minlength="14" maxlength="14" autocomplete="off" onkeyup="phoneValidation(); return false;">
                                                                @error('phone')
                                                                <h6 class="text-danger">{{ $message }}</h6>
                                                                @enderror
                                                            {{-- <input type="text" name="guardian_phone_number" class="form-control" id="parentContactInput" placeholder="" value=""> --}}
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-4">
                                                        <div class="mb-3">
                                                            <label for="parentAddressInput" class="form-label">Residential
                                                                Address </label>
                                                            <input type="text" class="form-control" name="guardian_address" id="parentAddressInput" placeholder="" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-4">
                                                        <div class="mb-3">
                                                            <label for="parentEmailInput" class="form-label">Email
                                                                Address </label>
                                                            <input type="text" class="form-control" id="parentEmailInput"
                                                                placeholder="" value="" name="guardian_email">
                                                        </div>
                                                    </div>
                                                     <div class="col-12 col-lg-4" id="addBtnDiv">
                                                        <div class="mt-4">
                                                            <button type="button" class="btn btn-danger"id="addForEdit">
                                                                <i class="fas fa-plus"></i>
                                                                Add More
                                                            </button>
                                                        </div>
                                                      
                                                    </div>
                                                   
                                                    <div class="col-sm-12" id="secondParent" style="display: none">
                                                        <div class="step-wizard-title border-bottom pb-2 mb-2 mb-3">
                                                            <h5 class="mb-0">Second Parent's Information</h5>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12 col-lg-4">
                                                                <div class="mb-3">
                                                                    <label for="sp_nameInput" class="form-label">Parent
                                                                        Name</label>
                                                                    <input type="text" class="form-control"
                                                                        id="edit_sp_name" name="sp_name" placeholder="">
                                                                    <input type="hidden" class="form-control"
                                                                        id="edit_sp_id" name="sp_id" placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-lg-4">
                                                                <div class="mb-3">
                                                                    <label for="sp_relationship" class="form-label">Relationship to child</span>
                                                                    </label>
                                                                    <select name="sp_relationship" class="form-control" id="edit_sp_relationship">
                                                                        <option selected disabled>Select Relationship</option>
                                                                        <option value="Father">Father</option>
                                                                        <option value="Mother">Mother</option>
                                                                        <option value="Brother">Brother</option>
                                                                        <option value="Sister">Sister</option>
                                                                        <option value="Sister">Other</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-lg-4">
                                                                <div class="mb-3">
                                                                    <label for="placeInput" class="form-label">Contact
                                                                        Number</label>
                                                                        <input type="text" name="sp_phone_number" id="edit_sp_contact_number" class="form-control unique_user_phoneNumber" value="" minlength="14" maxlength="14" autocomplete="off" onkeyup="phoneValidation(this); return false;">
                                                                     </div>
                                                            </div>
                                                            <div class="col-12 col-lg-4">
                                                                <div class="mb-3">
                                                                    <label for="placeInput" class="form-label">Residential
                                                                        Address</label>
                                                                    <input type="text" name="sp_address" class="form-control" placeholder="" id="edit_sp_address">
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-lg-4">
                                                                <div class="mb-3 ol-lg-3">
                                                                    <label for="placeInput" class="form-label">Email
                                                                        Address</label>
                                                                    <input type="email" name="sp_email" class="form-control" id="edit_sp_email"
                                                                        placeholder="">
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="wizard-footer d-flex justify-content-between">
                                            <div class="steps-cancel">
                                                <!-- <button type="button" class="btn btn-danger me-1"
                                                    data-bs-dismiss="modal">
                                                    Save
                                                </button> -->
                                            </div>
                                            <div class="steps-action">
                                                <button type="button" class="btn btn-secondary me-1 previous">
                                                    Back
                                                </button>
                                                <button type="button" class="btn btn-danger next">
                                                    Continue
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" role="tabpanel" id="edit-step3"
                                        aria-labelledby="edit-step3-tab">
                                        <div class="step-wizard-content mt-4">
                                            <div class="step-wizard-title border-bottom pb-2 mb-2 mb-3">
                                                <h5 class="mb-0">Emergency Contact</h5>
                                            </div>
                                            <div class="step-wizard-form">
                                                <div class="row">
                                                    <div class="col-12 col-lg-4">
                                                        <div class="mb-3">
                                                            <label for="emName" class="form-label">
                                                                Name </label>
                                                            <input type="text" class="form-control" id="emName" placeholder="" name="em_parent_name"
                                                                value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-4">
                                                        <div class="mb-3">
                                                            <label for="edit_em_relationship" class="form-label">Relationship to child 
                                                            </label>
                                                            <select class="form-control" id="edit_em_relationship" name="em_relationship">
                                                                <option selected disabled>Select</option>
                                                                <option value="Father">Father</option>
                                                                <option value="Mother">Mother</option>
                                                                <option value="Brother">Brother</option>
                                                                <option value="Sister">Sister</option>
                                                                <option value="Sister">Other</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-4">
                                                        <div class="mb-3">
                                                            <label for="emContactInput" class="form-label">Contact Phone
                                                                Number </label>
                                                                <input type="text" name="em_phone_number" class="form-control unique_user_phoneNumber" id="emContactInput" value="" minlength="14" maxlength="14" autocomplete="off" onkeyup="phoneValidation(); return false;"  >
                                                                @error('phone')
                                                                <h6 class="text-danger">{{ $message }}</h6>
                                                                @enderror
                                                            {{-- <input type="text" class="form-control" id="emContactInput" name="em_phone_number" placeholder="" value=""> --}}
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-lg-4">
                                                        <div class="mb-3">
                                                            <label for="emEmailInput" class="form-label">Email
                                                                Address</label>
                                                            <input type="text" name="em_email" class="form-control" id="emEmailInput"
                                                                placeholder="" value="" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="wizard-footer d-flex justify-content-between">
                                            <div class="steps-cancel">
                                                <!-- <button type="button" class="btn btn-danger me-1"
                                                    data-bs-dismiss="modal">
                                                    Save
                                                </button> -->
                                            </div>
                                            <div class="steps-action">
                                                <button type="button" class="btn btn-secondary me-1 previous">
                                                    Back
                                                </button>
                                                <button class="btn btn-danger me-1 next" id="editKidsBtn" type="button">Continue</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" role="tabpanel" id="edit-step4"
                                        aria-labelledby="edit-step4-tab">

                                        <div class="step-wizard-content mt-4">
                                            <div class="step-wizard-title border-bottom pb-2 mb-2 mb-3">
                                                <h5 class="mb-0">Addmission Details</h5>
                                            </div>
                                            <div class="step-wizard-form">
                                                <div class="row">
                                                    <div class="col-12 col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="kidsGrade" class="form-label">Grade
                                                                Applying For</label>
                                                            <input type="text" class="form-control" name="grade"
                                                                id="kidsGrade" placeholder="" value="">
                                                        </div>
                                                    </div>
                                                    <!-- <div class="col-12 col-lg-4">
                                                        <div class="mb-3">
                                                            <label for="dobInput" class="form-label">Date of
                                                                Birth</label>
                                                            <input type="text" class="form-control dobInput"
                                                                placeholder="" value="">
                                                        </div>
                                                    </div> -->

                                                    <div class="col-12 col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="placeInput" class="form-label">Addmission
                                                                Date</label>
                                                            <input type="date" class="form-control" id="admissionDate"
                                                                placeholder="" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-8">
                                                        <div class="mb-3">
                                                            <label for="addressinput" class="form-label">Preffered
                                                                mode of education
                                                            </label>
                                                            <select id="modeEducationInput" name="education_mode"
                                                                class="form-control">
                                                                <option value="Full Time" selected>Full Time</option>
                                                                <option value="Part Time">Part Time</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="step-wizard-content mt-4">
                                            <div class="step-wizard-title border-bottom pb-2 mb-2 mb-3">
                                                <h5 class="mb-0">Medical Information</h5>
                                            </div>
                                            <div class="step-wizard-form">
                                                <div class="row">
                                                    <div class="col-12 col-lg-4">
                                                        <div class="mb-3">
                                                            <label for="knownAllergie" class="form-label">Known
                                                                Allergie</label>
                                                            <input type="text" class="form-control" name="allergies"
                                                                id="knownAllergie" placeholder="" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-4">
                                                        <div class="mb-3">
                                                            <label for="foodConditionInput" class="form-label">Specific food
                                                                condition</label>

                                                            <div id="foodoption1" class="foodcondition">
                                                                <select id="foodConditionInput" name="food_cond"
                                                                    class="form-control">
                                                                    <option value="No" selected>No</option>
                                                                    <option value="Yes">Yes</option>
                                                                </select>
                                                            </div>
                                                            <div id="foodoption-Yes" class="foodcondition-input mt-2">
                                                                <input type="text" class="form-control"
                                                                    id="foodoption-yes-input" name="food_cond_desc" placeholder="" value="">
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-lg-4">
                                                        <div class="mb-3">
                                                            <label for="placeInput" class="form-label">Regular
                                                                Medication</label>
                                                            <input type="text" class="form-control" id="regularMedicationInput" name="medication"
                                                                placeholder="" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-8">
                                                        <div class="mb-3">
                                                            <label for="restrictionsInput" class="form-label">
                                                                Ditary Restrictions
                                                            </label>
                                                            <input type="text" class="form-control" name="ditary_rest"
                                                                id="restrictionsInput" placeholder=""
                                                                value="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="step-wizard-content mt-4">
                                            <div class="step-wizard-title border-bottom pb-2 mb-2 mb-3">
                                                <h5 class="mb-0">Special Needs</h5>
                                            </div>
                                            <div class="step-wizard-form">
                                                <div class="row">
                                                    <div class="col-12 col-lg-3">
                                                        <div class="mb-3">
                                                            <label for="kidsnameInput" class="form-label">
                                                                Learning Disbilities</label>
                                                            <div id="disbilitiesoption1"
                                                                class="learningdisbilities">
                                                                <select id="disbilitiesoption" name="disability" class="form-control">
                                                                    <option value="No" selected>No</option>
                                                                    <option value="Yes">Yes</option>
                                                                </select>
                                                            </div>
                                                            <div id="disbilitiesoption-Yes"
                                                                class="learningdisbilities-input mt-2">
                                                                <input type="text" class="form-control"
                                                                    id="learningDisabilityDesc" placeholder="" name="disability_desc" value="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-3">
                                                        <div class="mb-3">
                                                            <label for="dobInput" class="form-label">Behavioral
                                                                Challenges</label>

                                                            <div id="behavioraloption1"
                                                                class="behavioralchallenges">
                                                                <select id="behavioralsoption" name="behaviour" class="form-control">
                                                                    <option value="" selected disabled>Select</option>
                                                                    <option value="No">No</option>
                                                                    <option value="Yes">Yes</option>
                                                                </select>
                                                            </div>
                                                            <div id="behavioralsDesc-Yes" class="behavioralchallenges-input behavioralchallenges mt-2">
                                                                <input type="text" class="form-control" name="behaviour_desc"
                                                                    id="behavioralsDesc" placeholder="" value="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="placeInput" class="form-label">Accomodations
                                                                or Support Needed</label>
                                                            <!-- <input type="text" class="form-control" id="placeInput"
                                                            placeholder="" value="Amoxicillin, 10:00 AM"> -->

                                                            <div id="accomodationsoption" class="accomodations">
                                                                <select id="accomodationSupport" name="accomodation" class="form-control">
                                                                    <option value="" selected>Select</option>
                                                                    <option value="No">No</option>
                                                                    <option value="Yes">Yes</option>
                                                                </select>
                                                            </div>
                                                            <div id="accomodationsoption-Yes" class="accomodationsoption-input
                                                                accomodations mt-2">
                                                                <input type="text" class="form-control" name="accomodation_desc"
                                                                    id="accomodationSupportDesc" placeholder="" value="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="wizard-footer d-flex justify-content-between">
                                            <div class="steps-cancel">
                                                <!-- <button type="button" class="btn btn-danger me-1"
                                                    data-bs-dismiss="modal">
                                                    Save
                                                </button> -->
                                            </div>
                                            <div class="steps-action">
                                                <button type="button" class="btn btn-secondary me-1 previous">
                                                    Back
                                                </button>
                                                <button type="submit" class="btn btn-danger next">
                                                    Submit
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger">Next</button>
            </div> -->
        </div>
    </div>
</div>

<!--Add Kidz Details Successfully Modal-->
<div class="modal fade" id="addKidsSuccessModal" tabindex="-1" aria-labelledby="addKidsSuccessModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header">
                <h5 class="modal-title" id="addKidsSuccessModalLabel">Success Modal</h5>
                <!--<button type="button" class="close"  data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                 </button>-->
            </div>
            <div class="modal-body">
                <div class="text-center p-lg-5">
                    <div class="mb-3">
                        <i class="far fa-check-circle fa-4x text-success"></i>
                    </div>
                    <h5 class="mb-0">Records has been created successfully.</h5>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button> -->
                <a href="{{ route('superadmin.candidate.index') }}" role="button" class="btn btn-danger">Ok</a>
            </div>
        </div>
    </div>
</div>

<!--Edit Kidz Details Successfully Modal-->
<div class="modal fade" id="editKidsSuccessModal" tabindex="-1" aria-labelledby="editKidsSuccessModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header">
                <h5 class="modal-title" id="addKidsSuccessModalLabel">Edit Modal</h5>
                <button type="button" class="close"  data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center p-lg-5">
                    <div class="mb-3">
                        <i class="far fa-check-circle fa-4x text-success"></i>
                    </div>
                    <h5 class="mb-0">Records has been edited successfully.</h5>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button> -->
                <a href="{{ route('superadmin.candidate.index') }}" role="button" class="btn btn-danger">Ok</a>
            </div>
        </div>
    </div>
</div>
<!-- activate/deactivate kids model -->


<div class="modal fade" id="delModal" tabindex="-1" aria-labelledby="delModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header">
                {{-- <h5 class="modal-title" id="delModalLabel">Success Modal</h5> --}}
                <button type="button" class="close"  data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="modal-body">
                    <form action="{{ route('superadmin.candidate.statusChange') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" id="kidId" value="">
                        <input type="hidden" name="status" id="kidStatus" value="">
                        <div class="modal_icon mb-4 text-center">
                            <div class="icon question_icon mb-3"><img src="{{ asset('assets/admin/images/question-mark.png') }}" alt="check"></div>
                            <h3 id="statusText"></h3>
                        </div>
                        <div class="text-center d-flex justify-content-center p-2">
                            <button class="btn-add btn btn-success" id="" type="submit" data-bs-dismiss="modal">Yes</button>
                            <button class="btn-add btn  ml-2 btn-danger ms-2" type="button" data-bs-dismiss="modal">No</button>
                        </div>
                    </form>
                </div>
            </div>
          
        </div>
    </div>
</div>
<!-- Delete Kid Modal -->
    <div class="modal fade" id="deleteKidsData" tabindex="-1" aria-hidden="true">
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
                <form id="deleteKid" enctype="multipart/form-data" method="POST">
                    @csrf
                    <input type="hidden" value="" id="deleteKidId" name="id">
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
function deleteKids(id) {
            $('#deleteKidId').val(id);
}
 $('#deleteKid').on('submit', function(e) {
            e.preventDefault();
            if ($(this).valid()) {
                $.ajax({
                    url: "{{  route('superadmin.candidate.deletekid') }}",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(res) {
                        if (res.success == true) {
                                $('#deleteKidsData').modal('hide');
                                kids_table.draw();
                           
                        }
                    }
                });
            }
        });
var i = 0;
     $("#add").click(function(){
	      $('#add').css('display', 'none');
	 var appends =` <div class="col-sm-12">
        <div class="step-wizard-title border-bottom pb-2 mb-2 mb-3">
            <h5 class="mb-0">Second Parent's Information</h5>
        </div>
        <div class="row">
            <div class="col-12 col-lg-4">
                <div class="mb-3">
                    <label for="sp_nameInput`+i+`" class="form-label">Parent
                        Name</label>
                    <input type="text" class="form-control"
                        id="sp_nameInput`+i+`" name="sp_name" placeholder="">
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="mb-3">
                    <label for="sp_relationship" class="form-label">Relationship to child</span>
                    </label>
                    <select name="sp_relationship" class="form-control" id="sp_relationship">
                        <option selected disabled>Select Relationship</option>
                        <option value="Father">Father</option>
                        <option value="Mother">Mother</option>
                        <option value="Brother">Brother</option>
                        <option value="Sister">Sister</option>
                        <option value="Sister">Other</option>
                    </select>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="mb-3">
                    <label for="placeInput" class="form-label">Contact
                        Number</label>
                        <input type="text" name="sp_phone_number" id="sp_contact_number`+i+`" class="form-control unique_user_phoneNumber" value="" minlength="14" maxlength="14" autocomplete="off" onkeyup="phoneValidation(this); return false;">
                     </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="mb-3">
                    <label for="placeInput" class="form-label">Residential
                        Address</label>
                    <input type="text" name="sp_address" class="form-control" placeholder="">
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="mb-3 ol-lg-3">
                    <label for="placeInput" class="form-label">Email
                        Address</label>
                    <input type="email" name="sp_email" class="form-control"
                        placeholder="">
                </div>
                
            </div>
        </div></div>`;
	  $(appends).insertAfter(".appendchild-2 .row > div:last-child");
      ++i; 
     
 });
    var j = 0;
     $(".close").click(function(){
          $('#addForEdit').css('display', 'block');
	      $('#secondParent').css('display', 'none');
     });
     $("#addForEdit").click(function(){
	      $('#addForEdit').css('display', 'none');
	      $('#secondParent').css('display', 'block');
	
 });
  function phoneValidation(id){
       var numberInputId = $(id).attr('id');
       if($("#"+numberInputId).val()){
        $("#"+numberInputId).inputmask({"mask": "(999) 999-9999"});
       }
        
    } 
    function changeKidStatus(id,status) {
        console.log(id,status)
        $("#kidId").val(id);
        $("#kidStatus").val(status);
        $("#statusText").empty();
        if(status==0){

            $("#statusText").append("Are you sure you want to Deactive this record ?");
        }
        else{
            $("#statusText").append("Are you sure you want to Activate this record ?");  
        }
      $('#delModal').modal('show');
    }
      $(document).ready(function(){
        $(":input").inputmask();
             $("#emContactInput").inputmask({"mask": "(999) 999-9999"});
             $("#parentContactInput").inputmask({"mask": "(999) 999-9999"});
             $("#add_parentContactInput").inputmask({"mask": "(999) 999-9999"});
             $("#add_em_phone_number").inputmask({"mask": "(999) 999-9999"});
    })
    $(function () {
        $('.foodcondition-input').hide();
        $('#foodConditionInput').change(function () {
            $('.foodcondition-input').hide();
            $('#foodoption-' + $(this).val()).show();
        });
    });
    $(function () {
        $('.learningdisbilities-input').hide();
        $('#disbilitiesoption').change(function () {
            $('.learningdisbilities-input').hide();
            $('#disbilitiesoption-' + $(this).val()).show();
        });
        // $('#disbilitiesoption').click(function () {
        //     $('.disbilitiesoption2').show();
        // });
    });
    $(function () {
        $('.behavioralchallenges-input').hide();
        $('#behavioralsoption').change(function () {
            $('.behavioralchallenges-input').hide();
            $('#behavioralsDesc-' + $(this).val()).show();
        });
    });
    $(function () {
        $('.accomodationsoption-input').hide();
        $('#accomodationSupport').change(function () {
            $('.accomodationsoption-input').hide();
            $('#accomodationsoption-' + $(this).val()).show();
        });
    });

    $(document).ready(function() {
        toastr.options.timeOut = 5000;
        @if (Session::has('error'))
            toastr.error('{{ Session::get('error') }}');
        @elseif(Session::has('success'))
            toastr.success('{{ Session::get('success') }}');
        @endif
    });
</script>

<script type="text/javascript">
var kids_table = '';

// All Kids Listing
$(function () {
    kids_table = $('.all-kids-datatable').DataTable({
        responsive: true,
        serverSide: true,
        ordering: true,
        searching: true,
        pageLength: 10,
        bInfo: true,
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
        "order": [
            [2, "asc"]
        ],
        ajax: {
          url: "{{ route('superadmin.candidate.index') }}",
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
            {data: 'last_name', name: 'last_name', visible:false},
            {data: 'joining_date', name: 'joining_date', orderable: false},
            {data: 'guardian_phone_number', name: 'guardian_phone_number', orderable: false},
            {data: 'assigned_teacher', name: 'assigned_teacher', orderable: false},
            {data: 'added_by', name: 'added_by', orderable: false},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
});

$(function() {
    $('.reg_phone_number').keypress(validateNumber);
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

    $('.reg_phone_number, .age_number').keydown(function (e) {
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

<script type="text/javascript">

function viewKid(id){
    $('#viewKidsModal').modal('show');
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data:{id:id},
        url: "{{ route('superadmin.candidate.view') }}",
        type: "get",
        success: function (res) {
            if(res.success=='true'){
                var APP_URL = {!! json_encode(url('/')) !!};
                var cardImg = APP_URL+'/storage/app/storage/images/'+res.data.image;
                var image_html = '<div id="imagePreview" style="background-image: url('+cardImg+');"></div>';

                $("#viewKidsModalLabel").html('View '+res.data.name+' Details');
                $("#kid_name").html((res.data.name) ? res.data.name:'N/A');
                $("#kid_dob").html((res.dob)?res.dob: 'N/A');
                $("#kid_gender").html((res.data.gender) ? res.data.gender:'N/A');
                $("#kid_birth_place").html((res.data.place_of_birth)?res.data.place_of_birth: 'N/A');
                $("#kid_street").html((res.data.street)?res.data.street:'N/A');
                $("#kid_city").html((res.data.city)?res.data.city :'N/A');
                $("#kid_country").html((res.data.country)?res.data.country:'N/A');
                $("#kid_state").html((res.data.state)?res.data.state:'N/A');
                $("#kid_postcode").html((res.data.postcode)?res.data.postcode:'N/A');
                $("#kid_image").html(image_html);
                $("#kid_admission_no").html((res.data.admission_number)?res.data.admission_number:'N/A');
                $("#grade").html((res.data.grade)?res.data.grade:'N/A');
                $("#kid_addmission_date").html((res.joining_date)?res.joining_date: 'N/A');
                $("#education_mode").html((res.data.education_mode)?res.data.education_mode:'N/A');
                $("#allergies").html((res.data.allergies)? res.data.allergies:'N/A');
                $("#food_condition").html((res.data.food_cond)? res.data.food_cond:'N/A');
                $("#medication").html((res.data.medication)? res.data.medication:'N/A');
                $("#ditary_restriction").html((res.data.ditary_rest)? res.data.ditary_rest:'N/A');
                $("#kid_disability").html((res.data.kid_dis) ? res.data.kid_dis: 'N/A');
                $("#kid_behaviour").html((res.data.behaviour) ? res.data.behaviour: 'N/A');
                $("#kid_accomodation").html((res.data.accomodation) ? res.data.accomodation: 'N/A');
            }
        }
    });
}

var kids_table = '';
var diseases = {!! json_encode($diseases) !!};
function editKid(id){
    $("#editKidId").val(id);
    $('#editKidsModal').modal("show");
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data:{kidId:id},
        url: "{{ route('superadmin.candidate.edit') }}",
        type: "get",
        success: function (res) {
            if(res.success==true){
                console.log(res.response,"test");
                var APP_URL = {!! json_encode(url('/')) !!};
                var cardImg = (res.response.image)?APP_URL+'/storage/app/storage/images/'+res.response.image:'';
                var image_html = '<img id="kidImage" src="'+cardImg+'">';
                $("#editKidsModalLabel").html('Edit '+res.response.name+' Details');
                $("#kidName").val(res.response.name ?? '');
                $("#edit_dob").val((res.response.dob)?res.response.dob:'');
                $("#edit_genderinput").val(res.response.gender ?? '');
                $("#edit_placeInput").val(res.response.place_of_birth ?? '');
                $("#edit_addressinput").val(res.response.address ?? '');
                $("#edit_streetInput").val(res.response.street ?? '');
                $("#edit_cityInput").val(res.response.city ?? '');
                $("#edit_countryInput").val(res.response.country ?? '');
                $("#edit_stateInput").val(res.response.state ?? '');
                $("#edit_postcodeInput").val(res.response.postcode ?? '');
                $("#img_preview").html(image_html);
                $("#edit_addmissionNo").val(res.response.admission_number ?? '');
                $("#kid_addmission_date").val(res.response.joining_date ?? '');

                $("#parentnameInput").val(res.response.guardian_name);
                $("#parentRelInput").val(res.response.guardian_relationship);
                $("#parentContactInput").val(res.response.guardian_phone_number);
                $("#parentAddressInput").val(res.response.guardian_address);
                $("#parentEmailInput").val(res.response.guardian_email);

                $("#emName").val(res.response.em_parent_name);
                $("#edit_assigned_teacher").val(res.response.assigned_teacher);
                $("#edit_em_relationship").val(res.response.em_relationship);
                $("#emContactInput").val(res.response.em_phone_number);
                $("#emEmailInput").val(res.response.em_email);
                $("#kidsGrade").val(res.response.grade);
                $("#admissionDate").val(res.response.joining_date);
                $("#admissionDate").val(res.response.joining_date);
                $("#modeEducationInput").val((res.response.education_mode)?res.response.education_mode:'Full Time');
                $("#knownAllergie").val(res.response.allergies);
                $("#foodConditionInput").val((res.response.food_cond==null)?'No':res.response.food_cond);
                $("#regularMedicationInput").val(res.response.medication);
                $("#restrictionsInput").val(res.response.ditary_rest);
                $("#disbilitiesoption").val((res.response.disability==null)?'No':res.response.disability);
                $("#behavioralsoption").val((res.response.behaviour==null)?'No':res.response.behaviour);
                $("#accomodationSupport").val((res.response.accomodation==null)?'No':res.response.accomodation);
                if(res.response.accomodation){
                    $('#accomodationsoption-Yes').show();
                    $("#accomodationSupportDesc").val(res.response.accomodation_desc);
                }
                if(res.response.behaviour){
                    $('#behavioralsDesc-Yes').show();
                    $("#behavioralsDesc").val(res.response.behaviour_desc);
                }
                if(res.response.disability){
                    $('#disbilitiesoption-Yes').show();
                    $("#learningDisabilityDesc").val(res.response.disability_desc);
                }
                if(res.response.food_cond){
                    $('#foodoption-Yes').show();
                    $("#foodoption-yes-input").val(res.response.food_cond_desc);
                }
                if(res.response.disease){
                    $('#edit_specialityinput').val(res.response.disease);
                    // $("select option[value='"+res.response.disease+"']").attr("selected","selected");
                    // $("#specialityinput"+res.response.disease).prop("selected","selected");
                    $("diseaseNullValue").removeAttr('selected');
                }
                $('#secondParent').css('display', 'none');
                $('#addBtnDiv').css('display', 'block');
                if(res.response.kid_second_parent){
                    $('#addBtnDiv').css('display', 'none');
                    $('#secondParent').css('display', 'block');
                    $("#edit_sp_id").val((res.response.kid_second_parent.id==null)?'':res.response.kid_second_parent.id);
                    $("#edit_sp_name").val((res.response.kid_second_parent.name==null)?'':res.response.kid_second_parent.name);
                    $("#edit_sp_contact_number").val((res.response.kid_second_parent.phone_number==null)?'':res.response.kid_second_parent.phone_number);
                    $("#edit_sp_address").val((res.response.kid_second_parent.address==null)?'':res.response.kid_second_parent.address);
                    $("#edit_sp_email").val((res.response.kid_second_parent.email==null)?'':res.response.kid_second_parent.email);
                    $("#edit_sp_relationship").val((res.response.kid_second_parent.relationship==null)?'':res.response.kid_second_parent.relationship);
                }
                else{
                    $('#addBtnDiv').css('display', 'block');  
                    $("#edit_sp_id").val('');
                    $("#edit_sp_name").val('');
                    $("#edit_sp_contact_number").val('');
                    $("#edit_sp_address").val('');
                    $("#edit_sp_email").val('');
                    $("#edit_sp_relationship").val('');
                }
            }

        }
    });
}

function deleteKid(id) {
    $("#kidId").val(id);
}
$(document).ready(function () {
    // Disease & gender change
    $("#diseasefilter").change(function(){
        kids_table.draw();
    })
    $("#genderfilter").change(function(){
        kids_table.draw();
    })
});


jQuery(function($) {
    
    // $('#addKids').validate({
    //     ignore : [],
    //     rules: {
    //         admission_number: {
    //             required: true,
    //         },
    //         disease: {
    //             required: true,
    //         },
    //         assigned_teacher: {
    //             required: true,
    //         },
    //         name: {
    //             required: true,
    //         },
    //         dob: {
    //             required: true,
    //         },
    //         gender: {
    //             required: true,
    //         },
    //         place_of_birth: {
    //             required: true,
    //         },
    //         address: {
    //             required: true,
    //         },
    //         street: {
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
    //         postcode: {
    //             required: true,
    //         },
    //         image: {
    //             required: true,
    //         },
    //         guardian_name: {
    //             required: true,
    //         },
    //         guardian_relationship: {
    //             required: true,
    //         },
    //         guardian_phone_number: {
    //             required: true,
    //         },
    //         guardian_address:{
    //             required: true,
    //         },
    //         guardian_email: {
    //             required: true,
    //             email: true,
    //         },
    //         em_parent_name: {
    //             required: true,
    //         },
    //         em_relationship: {
    //             required: true,
    //         },
    //         em_phone_number: {
    //             required: true,
    //         },
    //         em_email: {
    //             required: true,
    //         }
    //     },
    // });
    $('#addKids').on('submit', function(e) {
        e.preventDefault();
        // if ($(this).valid()) {
            $.ajax({
                url: "{{ route('superadmin.candidate.store') }}",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (res) {
                    if(res.success==true){
                        $('#addKidsModal').modal('hide');
                        $('#addKidsSuccessModal').modal('show');
                        $('#addKids').trigger("reset");
                        kids_table.draw();
                    }
                }
            });
        // }
    });
});

jQuery(function($) {
    // $('#editKids').validate({
    //     rules: {
    //         admission_number: {
    //             required: true,
    //         },
    //         disease: {
    //             required: true,
    //         },
    //         assigned_teacher: {
    //             required: true,
    //         },
    //         name: {
    //             required: true,
    //         },
    //         dob: {
    //             required: true,
    //         },
    //         gender: {
    //             required: true,
    //         },
    //         place_of_birth: {
    //             required: true,
    //         },
    //         address: {
    //             required: true,
    //         },
    //         street: {
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
    //         postcode: {
    //             reuired: true,
    //         },
    //         image: {
    //             required: true,
    //         },
    //         guardian_name: {
    //             required: true,
    //         },
    //         guardian_relationship: {
    //             required: true,
    //         },
    //         guardian_phone_number: {
    //             required: true,
    //         },
    //         guardian_address:{
    //             required: true,
    //         },
    //         guardian_email: {
    //             required: true,
    //             email: true,
    //         },
    //         em_parent_name: {
    //             required: true,
    //         },
    //         em_relationship: {
    //             required: true,
    //         },
    //         em_phone_number: {
    //             required: true,
    //         },
    //         em_email: {
    //             required: true,
    //         }
    //     },
    // });
    $('#editKids').on('submit', function(e) {
        e.preventDefault();
        // if ($(this).valid()) {
            $.ajax({
                url: "{{ route('superadmin.candidate.update') }}",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (res) {
                    if(res.success==true){
                        $('#editKidsModal').modal('hide');
                        $('#editKidsSuccessModal').modal('show');
                        kids_table.draw();
                    }
                }
            });
        // }
    });
});
</script>
@endpush