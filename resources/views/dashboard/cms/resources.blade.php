@extends('dashboard.layouts.master')
@push('page_css')
<style>
    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .dropdown-content input {
        margin: 5px;
    }

    .dropdown-content button {
        display: block;
        background-color: #4CAF50;
        color: white;
        padding: 10px;
        text-align: center;
        border: none;
        cursor: pointer;
    }

    .dropdown-content button:hover {
        background-color: #3e8e41;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    .dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

/* Container for the dropdown */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown content (hidden by default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
  right: 0; /* Aligns dropdown content to the right side of the button */
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {
  background-color: #f1f1f1;
}
</style>
@endpush
@section('main-content-section')
<main id="homepage">
    <section class="interviews-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 offset-lg-2 offset-md-2 offset-sm-0 my-auto">
                    <div class="interviews-wrap text-center">
                        <div class="heading-wrap mb-5">
                            <h2 class="heading">Practice 1:1 interviews with top tech experts</h2>
                            <p class="sub-heading">Crack your next tech-interview with us</p>
                        </div>
                        <form class="search_profile">
                            <div class="search-box search_pop">
                                <div class="seach_box_warp">
                                    <div class="input-form-search">
                                        <input type="text" class="form-control" name="" placeholder="Search Profile">
                                        <div class="button-search"><i class="bi bi-search"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="feateure_items mt-4 mb-5">
                                <div class="feature_items_home" id="job_list">
                                    @foreach($jobs as $job)
                                    <div class="feature_wrap job_list" onclick="getJobSkill({{$job->id}})">
                                        @if($job->job_icon)
                                        <img class="job_image" src="{{asset('storage/images/'.$job->job_icon)}}">
                                        @endif
                                        <p>{{$job->title}}</p>
                                    </div>
                                    @endforeach
                                    @if($jobCount>4)
                                    <div class="feature_wrap view_all" id="viewAllJob">
                                        <i class="bi bi-plus-circle-fill"></i>
                                        <p>View All</p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="button-wrap">
                                <button type="button" class="btn btn-dark rounded-pill request_now" id="jobSkillRequestBtn" disabled>Request now <i class="bi bi-arrow-right-short"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="expert-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="interviews-wrap text-center">
                        <div class="heading-wrap mb-5">
                            <h2 class="heading">Our elite expert panel</h2>
                            <p class="sub-heading">1000+ qualified interviewers available round the clock</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <a href="#" class="expert-wrap">
                        <div class="expert_image">
                            <img src="{{ asset('assets/frontend/images/avtar-1.jpg') }}" class="img-fluid w-100">
                            <p class="rating-text">4.70 <i class="bi bi-star-fill"></i></p>
                        </div>
                        <div class="expert_name">
                            <h4 class="Name">Name</h4>
                            <p class="sub-heading">Engineer</p>
                        </div>
                    </a>
                </div>
                <div class="col-sm-3">
                    <a href="#" class="expert-wrap">
                        <div class="expert_image">
                            <img src="{{ asset('assets/frontend/images/avtar-1.jpg') }}" class="img-fluid w-100">
                            <p class="rating-text">4.70 <i class="bi bi-star-fill"></i></p>
                        </div>
                        <div class="expert_name">
                            <h4 class="Name">Name</h4>
                            <p class="sub-heading">Engineer</p>
                        </div>
                    </a>
                </div>
                <div class="col-sm-3">
                    <a href="#" class="expert-wrap">
                        <div class="expert_image">
                            <img src="{{ asset('assets/frontend/images/avtar-1.jpg') }}" class="img-fluid w-100">
                            <p class="rating-text">4.70 <i class="bi bi-star-fill"></i></p>
                        </div>
                        <div class="expert_name">
                            <h4 class="Name">Name</h4>
                            <p class="sub-heading">Engineer</p>
                        </div>
                    </a>
                </div>
                <div class="col-sm-3">
                    <a href="#" class="expert-wrap">
                        <div class="expert_image">
                            <img src="{{ asset('assets/frontend/images/avtar-1.jpg') }}" class="img-fluid w-100">
                            <p class="rating-text">4.70 <i class="bi bi-star-fill"></i></p>
                        </div>
                        <div class="expert_name">
                            <h4 class="Name">Name</h4>
                            <p class="sub-heading">Engineer</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>
<div class="sarch_practice_model" style="display: none">
    <div class="model_practice_wrap">
        <div class="close_btn">
            <i class="bi bi-x-circle-fill"></i>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 offset-lg-2 offset-md-2 offset-sm-0 my-auto">
                    <div class="interviews-wrap text-center">
                        <div class="heading-wrap mb-5">
                            <h2 class="heading">Practice 1:1 interviews with top tech experts</h2>
                            <p class="sub-heading">Crack your next tech-interview with us</p>
                        </div>
                        <form class="search_profile">
                            <div class="search-box">
                                <div class="seach_box_warp">
                                    <div class="input-form-search">
                                        <input type="text" class="form-control" name="" placeholder="Search Profile">
                                        <div class="button-search"><i class="bi bi-search"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="feateure_items mt-4 mb-5">
                                <div class="feature_items_home" id="all_job_list">




                                </div>
                            </div>
                            <div class="button-wrap btn-blur py-3">
                                <button type="button" class="btn btn-dark rounded-pill request_now">Request now <i class="bi bi-arrow-right-short"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="sidebar_model" style="display: none">
    <div class="feature_content_pop">
        <div class="feature_wrap-skills">
            <form method="POST" action="{{ route('user.createUser') }}" id="msform">
                @csrf
                <!-- fieldsets -->
                <fieldset>
                    <div class="heading-model">
                        <h2><span class="close_model"><i class="bi bi-arrow-left"></i></span> <span id="job_title"></span></h2>
                    </div>
                    <div class="skil_wrap_pop">
                        <div class="skil-bansed" id="jobSkillList">
                        </div>
                        <div class="skil-bansed">
                            <div class="heading_skil">
                                <h3>Round based</h3>
                            </div>
                            <div class="feature_items_home">
                                <div class="radio_check">
                                    <input class="form-check-input" type="radio" name="round_type" id="Structure">
                                    <label class="form-check-label" for="Structure">
                                        <div class="skil_wrap">
                                            <div class="skil_icon">
                                                <img src="{{ asset('assets/frontend/images/skill-icon/dsa.svg') }}">
                                            </div>
                                            <p>Data Structure & Algorithms</p>
                                        </div>
                                    </label>
                                </div>
                                <div class="radio_check">
                                    <input class="form-check-input" type="radio" name="round_type" id="Machine">
                                    <label class="form-check-label" for="Machine">
                                        <div class="skil_wrap">
                                            <div class="skil_icon">
                                                <img src="{{ asset('assets/frontend/images/skill-icon/machine-coding.svg') }}">
                                            </div>
                                            <p>Machine Coding</p>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="button" name="next" id="skilledbtn" class="next btn btn-dark d-block w-100 action-button" value="Confirm Details" disabled />
                </fieldset>
                <fieldset>
                    <button type="button" name="previous" class="previous action-button-previous"><i class="bi bi-arrow-left"></i></button>
                    <div class="heading-model">
                        <h2><span>Select Seniority</span></h2>
                    </div>
                    <div class="check-seniority">
                        <div class="seniority_check">
                            <input class="form-check-input" type="radio" name="experience_level" id="Internship">
                            <label class="form-check-label" for="Internship">
                                <div class="skil_wrap_seniority">
                                    <p>Internship</p>
                                    <p>0 Year of Experience</p>
                                </div>
                            </label>
                        </div>
                        <div class="seniority_check">
                            <input class="form-check-input" type="radio" name="experience_level" id="Entry">
                            <label class="form-check-label" for="Entry">
                                <div class="skil_wrap_seniority">
                                    <p>Entry Level</p>
                                    <p>0-1 Year of Experience</p>
                                </div>
                            </label>
                        </div>
                        <div class="seniority_check">
                            <input class="form-check-input" type="radio" name="experience_level" id="Intermediate">
                            <label class="form-check-label" for="Intermediate">
                                <div class="skil_wrap_seniority">
                                    <p>Intermediate</p>
                                    <p>1-3 Year of Experience</p>
                                </div>
                            </label>
                        </div>
                        <div class="seniority_check">
                            <input class="form-check-input" type="radio" name="experience_level" id="Mid-Senior">
                            <label class="form-check-label" for="Mid-Senior">
                                <div class="skil_wrap_seniority">
                                    <p>Mid-Senior</p>
                                    <p>3-5 Year of Experience</p>
                                </div>
                            </label>
                        </div>
                        <div class="seniority_check">
                            <input class="form-check-input" type="radio" name="experience_level" id="Mid-Senior">
                            <label class="form-check-label" for="team-lead">
                                <div class="skil_wrap_seniority">
                                    <p>Team Lead</p>
                                    <p>7+ Year of Experience</p>
                                </div>
                            </label>
                        </div>
                        <div class="seniority_check">
                            <input class="form-check-input" type="radio" name="experience_level" id="Mid-Senior">
                            <label class="form-check-label" for="manager">
                                <div class="skil_wrap_seniority">
                                    <p>Manager</p>
                                    <p>9+ Year of Experience</p>
                                </div>
                            </label>
                        </div>
                    </div>
                    <input type="button" name="next" class="next btn btn-dark d-block w-100 action-button" value="Continue" />
                </fieldset>

                <fieldset>
                    <button type="button" name="previous" class="previous action-button-previous"><i class="bi bi-arrow-left"></i></button>
                    <div class="heading-model">
                        <h2><span>Schedule your mock interview</span></h2>
                    </div>
                    <h3 class="fs-subtitle">Fill out your details</h3>

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{Auth::check()?Auth::user()->name:''}}" placeholder="Enter full name" {{Auth::check()?'readonly':''}} required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" value="{{Auth::check()?Auth::user()->email:''}}" {{Auth::check()?'readonly':''}} required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Enter your phone number</label>
                        <input type="text" name="phone" minlength="14" maxlength="14" class="form-control" id="phone" value="{{Auth::check()?Auth::user()->phone:''}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '')" placeholder="" required {{Auth::check()?'readonly':''}}>
                    </div>
                    @if(!Auth::check())
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="Password" name="password" class="form-control" id="password" placeholder="Create password" required>
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="Password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Re-enter your Password" required>
                    </div>
                    <button type="button" class="submit next btn btn-dark d-block w-100 action-button" data-bs-toggle="modal" data-bs-target="#exampleModal">Continue</button>
                    @else
                    <button type="button" class="submit next btn btn-dark d-block w-100 action-button">
                        Confirm Detail
                    </button>
                    @endif


                </fieldset>

                <fieldset>
                    <button type="button" name="previous" class="previous action-button-previous"><i class="bi bi-arrow-left"></i></button>
                    <div class="heading-model">
                        <h2><span>Choose availability</span></h2>
                    </div>
                    <div class="choose_availability-wrap">
                        @php
                        use Carbon\Carbon;

                        // Calculate the current date
                        $currentDate = Carbon::now()->format('j M');
                        $todayDate = Carbon::now();
                        $daysToAdd = 7 - $todayDate->dayOfWeek;

                        // Add the calculated number of days to the current date to get the next Sunday
                        $newDate = $todayDate->copy()->addDays($daysToAdd);
                        $formattedDate = $newDate->format('j M');

                        // Generate dates for the next 7 days
                        $weekDates = [];

                        for ($i = 0; $i <= $daysToAdd; $i++) { $date=$todayDate->copy()->addDays($i);
                            $weekDates[] = [
                            'day' => $date->format('D'),
                            'date' => $date->format('j M')
                            ];
                            }
                            @endphp

                            <div class="choose_availability-pagination">
                                <a href="javascript:void(0)" class="prev" id="prevBtn" style="display:none">
                                    <i class="bi bi-chevron-left"></i> Prev
                                </a>
                                <div class="date_pagi">
                                    <a href="javascript:void(0)" class="start-date">{{ $currentDate }}</a>
                                    <span>-</span>
                                    <a href="javascript:void(0)" class="end-date">{{ $formattedDate }}</a>
                                </div>
                                <a href="javascript:void(0)" class="nextbtn">
                                    Next <i class="bi bi-chevron-right"></i>
                                </a>
                            </div>

                            <div class="choose_availability-time">
                                @foreach ($weekDates as $weekDate)
                                <div class="table_tr">
                                    <div class="table_date"><strong>{{ $weekDate['day'] }}</strong>{{ $weekDate['date'] }}</div>
                                    <div class="table_time">
                                        <input type="time" name="starttime" value="Select">
                                        <span>-</span>
                                        <input type="time" name="endtime" value="Select">
                                    </div>
                                    <div class="table_add_more" onclick="addavailability('{{ $weekDate['day'].$weekDate['date'] }}')">
                                        <div class="plus_items-table"><i class="bi bi-plus-circle-fill"></i></div>
                                    </div>
                                    <div class="table_add_more">
                                        <!-- <div class="copy_items-table"><i class="bi bi-copy"></i></div> -->
                                        <div class="dropdown">
                                            <button class="copy_items-table dropbtn"><i class="bi bi-copy"></i></button>
                                            <div class="dropdown-content">
                                                <input type="checkbox" id="saturday" name="day" value="Saturday">
                                                <label for="saturday">Saturday</label><br>
                                                <input type="checkbox" id="sunday" name="day" value="Sunday">
                                                <label for="sunday">Sunday</label><br>
                                                <input type="checkbox" id="monday" name="day" value="Monday">
                                                <label for="monday">Monday</label><br>
                                                <button onclick="applyTimes()">Apply</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table_time" id="{{ $weekDate['day'].$weekDate['date'] }}">
                                    </div </div>
                                    @endforeach
                                </div>

                                <!-- <div class="mb-3">
                            <label for="timezone" class="form-label">Timezone</label>
                            <select class="form-control" id="timezone">
                                <option>(UTC-08:00) Pacific Time (US & Canada)</option>
                                <option>(UTC-08:00) Pacific Time (US & Canada)</option>
                                <option>(UTC-08:00) Pacific Time (US & Canada)</option>
                                <option>(UTC-08:00) Pacific Time (US & Canada)</option>
                                <option>(UTC-08:00) Pacific Time (US & Canada)</option>
                                <option>(UTC-08:00) Pacific Time (US & Canada)</option>
                            </select>
                        </div> -->
                            </div>
                            <input type="submit" name="submit" class="submit next btn btn-dark d-block w-100 action-button" value="Schedule" />
                </fieldset>
                <!-- <fieldset>
                    <button type="button" name="previous" class="previous action-button-previous"><i class="bi bi-arrow-left"></i></button>
                    <div class="heading-model">
                        <h2><span>Choose Company Type</span></h2>
                    </div>
                    <div class="check-company">
                        <div class="company_check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="FAANG">
                            <label class="form-check-label" for="FAANG">
                                <div class="skil_wrap_Companies that build the best tech products in the world">
                                    <p class="company-names">FAANG</p>
                                    <p class="company-info">Companies that build the best tech products in the world
                                    </p>
                                    <div class="logo-svg-company">
                                        <img src="{{ asset('assets/frontend/images/skill-icon/java.svg') }}">
                                        <img src="{{ asset('assets/frontend/images/skill-icon/java.svg') }}">
                                        <img src="{{ asset('assets/frontend/images/skill-icon/java.svg') }}">
                                        <img src="{{ asset('assets/frontend/images/skill-icon/java.svg') }}">
                                        <img src="{{ asset('assets/frontend/images/skill-icon/java.svg') }}">
                                    </div>
                                </div>
                                <div class="price">
                                    <p>₹<span>2300</span></p>
                                </div>
                            </label>
                        </div>
                        <div class="company_check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="Product companies">
                            <label class="form-check-label" for="Product companies">
                                <div class="skil_wrap_Companies that build the best tech products in the world">
                                    <p class="company-names">Product companies</p>
                                    <p class="company-info">Companies that build the best tech products in the world
                                    </p>
                                    <div class="logo-svg-company">
                                        <img src="{{ asset('assets/frontend/images/skill-icon/java.svg') }}">
                                        <img src="{{ asset('assets/frontend/images/skill-icon/java.svg') }}">
                                        <img src="{{ asset('assets/frontend/images/skill-icon/java.svg') }}">
                                        <img src="{{ asset('assets/frontend/images/skill-icon/java.svg') }}">
                                        <img src="{{ asset('assets/frontend/images/skill-icon/java.svg') }}">
                                    </div>
                                </div>
                                <div class="price">
                                    <p>₹<span>2300</span></p>
                                </div>
                            </label>
                        </div>

                    </div>
                    <input type="button" name="next" class="next btn btn-dark d-block w-100 action-button" value="Confrim and Continue" />
                </fieldset> -->
            </form>
        </div>
    </div>
</div>
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Enter OTP</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="otp-submit">
                    <div class="input_otp">
                        <input type="number" name="otp" max="1">
                        <input type="number" name="otp" max="1">
                        <input type="number" name="otp" max="1">
                        <input type="number" name="otp" max="1">
                        <input type="number" name="otp" max="1">
                        <input type="number" name="otp" max="1">
                    </div>
                    <div class="text-form_otp my-4">
                        <p>We have sent an OTP to your email</p>
                        <p>Haven't recieved? <a href="#">Resend</a></p>
                    </div>
                    <div class="text-center">
                        <button type="button" class="btn btn-dark">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">

    function applyTimes() {
        // Example: Copy times logic
        const days = [];
        if (document.getElementById('saturday').checked) {
            days.push('Saturday');
        }
        if (document.getElementById('sunday').checked) {
            days.push('Sunday');
        }
        if (document.getElementById('monday').checked) {
            days.push('Monday');
        }
        
        alert('Times copied to: ' + days.join(', '));
    }

    function openSidebar() {
        document.getElementById("sidebar").style.width = "300px";
    }

    function closeSidebar() {
        document.getElementById("sidebar").style.width = "0";
    }
    $('#viewAllJob').click(function() {
        $.ajax({
            url: "{{ route('all.job') }}",
            type: "get",
            success: function(res) {
                if (res.success == true) {
                    if (res.jobs.length > 0) {
                        var jobList = "";
                        var APP_URL = {!!json_encode(url('/')) !!};
                        $.each(res.jobs, function(key, value) {

                            var img = (value.job_icon) ? APP_URL + '/storage/images/' + value.job_icon : '';
                            jobList += `<div class="feature_wrap job_list">`;
                            if (img) {
                                jobList += `<img class="job_image"  src="` + img + `">`;
                            }
                            jobList += `<p>` + value.title + `</p></div>`;
                        })

                        $('#all_job_list').empty();
                        $('#all_job_list').html(jobList);
                        $(".sarch_practice_model").show();
                    }


                }

            }
        });
    });

    function getJobSkill(id) {
        var url = "{{ route('frontend.job.skill', ':id') }}";
        url = url.replace(':id', id);
        $.ajax({
            url: url,
            type: "get",
            success: function(res) {
                $('#jobSkillList').empty();
                if (res.success == true) {
                    $('#job_title').empty();
                    $('#job_title').text(res.job.title);
                    if (res.jobSkills.length > 0) {
                        var jobSkillList = "";
                        var APP_URL = {!!json_encode(url('/')) !!};

                        jobSkillList += `  <div style="color:red;">Note: Please select atleast one skill.</div><div class="heading_skil">
                                                <h3>Skill based</h3>
                                            </div>

                                            <div class="feature_items_home">`;
                        $.each(res.jobSkills, function(key, value) {

                            var img = (value.image) ? APP_URL + '/storage/images/' + value.image : APP_URL + '/assets/frontend/images/placeholder-img.jpg';

                            jobSkillList += `<div class="radio_check skilledDiv" onclick="skilledbtn()">
                                                    <input class="form-check-input" type="checkbox" value="` + value.id + `" id="` + value.skill + `">
                                                    <label class="form-check-label" for="` + value.skill + `">
                                                        <div class="skil_wrap">`;
                            if (img) {
                                jobSkillList += `<div class="skil_icon">
                                                               
                                                                   <img class="job_image"  src="` + img + `">
                                                                   </div>`;
                            }

                            jobSkillList += ` <p>` + value.skill + `</p>
                                                        </div>
                                                    </label>
                                                </div>`;

                        })
                        jobSkillList += `</div>
                        `;

                        $('#jobSkillList').html(jobSkillList);
                        $('#skilledbtn').attr('disabled', true);

                    }


                }

            }
        });
    }
    $('.job_list').click(function() {
        $('#jobSkillRequestBtn').attr('disabled', false);
    })
</script>

<script>
    function parseDate(dateString) {
        return new Date(Date.parse(dateString + " 2024")); // Append year to handle Date parsing correctly
    }

    function formatDate(date) {
        const options = {
            day: 'numeric',
            month: 'short'
        };
        return date.toLocaleDateString('en-GB', options); // Using 'en-GB' locale to ensure day-first format
    }

    function formatDay(date) {
        const options = {
            weekday: 'short'
        };
        return date.toLocaleDateString('en-GB', options);
    }

    var addDays = @json($daysToAdd);


    function updateAvailabilityDates(startDate) {
        let html = '';
        for (let i = 0; i <= addDays; i++) {
            let current = new Date(startDate);
            current.setDate(startDate.getDate() + i);
            let day = formatDay(current);
            let date = formatDate(current);
            html += `
                <div class="table_tr">
              
                    <div class="table_date"><strong>${day}</strong>${date}</div>
                    <div class="table_time">
                        <div class="time_pair">
                            <input type="time" name="starttime" value="Select">
                            <span>-</span>
                            <input type="time" name="endtime" value="Select">
                        </div>
                    </div>
                    <div class="table_add_more" onclick="addavailability('addMoreTr${i}')">
                        <div class="plus_items-table"><i class="bi bi-plus-circle-fill"></i></div>
                    </div>
                    <div class="table_add_more">
                    <div class="dropdown">
                        <button class="copy_items-table dropbtn"><i class="bi bi-copy"></i></button>
                        <div class="dropdown-content">
                            <input type="checkbox" id="saturday" name="day" value="Saturday">
                            <label for="saturday">Saturday</label><br>
                            <input type="checkbox" id="sunday" name="day" value="Sunday">
                            <label for="sunday">Sunday</label><br>
                            <input type="checkbox" id="monday" name="day" value="Monday">
                            <label for="monday">Monday</label><br>
                            <button onclick="applyTimes()">Apply</button>
                        </div>
                    </div>
                    </div>
                </div>
                <div id="addMoreTr${i}"></div>`;
        }
        $('.choose_availability-time').html(html);
    }


    $(document).ready(function() {
        const todayDay = @json($currentDate);
        const currentDate = parseDate(@json($currentDate));
        const formattedDate = @json($formattedDate);

        let startDate = parseDate($('.start-date').text());
        updateAvailabilityDates(startDate);

        $('#prevBtn').click(function(e) {
            e.preventDefault();
            startDate.setDate(startDate.getDate() - 7);
            let endDate = new Date(startDate);
            endDate.setDate(endDate.getDate() + 6);

            if (startDate < currentDate) {
                $('#prevBtn').css('display', 'none');
                startDate = new Date(currentDate);
                dateParts = todayDay.split(' ');
                addDays = @json($daysToAdd);
                console.log(addDays);
            } else {
                $('#prevBtn').css('display', 'block');
            }

            $('.start-date').text(formatDate(startDate));
            $('.end-date').text(formatDate(endDate));
            updateAvailabilityDates(startDate);
        });

        $('.nextbtn').click(function(e) {
            e.preventDefault();
            addDays = 6;
            let oldendDate = parseDate($('.end-date').text());
            startDate.setDate(oldendDate.getDate() + 1);
            let endDate = new Date(startDate);
            endDate.setDate(endDate.getDate() + 6);

            $('#prevBtn').css('display', 'block');

            $('.start-date').text(formatDate(startDate));
            $('.end-date').text(formatDate(endDate));
            updateAvailabilityDates(startDate);
        });
    });

    function addavailability(id) {
        var html = ` <div class="table_tr" id="">
                    <div class="table_date"><strong></strong></div>
                    <div class="table_time">
                        <div class="time_pair">
                            <input type="time" name="starttime" value="Select">
                            <span>-</span>
                            <input type="time" name="endtime" value="Select">
                        </div>
                    </div>
                    <div class="table_add_more">
                        <div class="plus_items-table remove_feature"><i class="bi bi-dash-circle-fill"></i></div>
                    </div>
                    <div class="table_add_more">
                        <div class="dropdown">
                            <button class="copy_items-table dropbtn"><i class="bi bi-copy"></i></button>
                            <div class="dropdown-content">
                                <input type="checkbox" id="saturday" name="day" value="Saturday">
                                <label for="saturday">Saturday</label><br>
                                <input type="checkbox" id="sunday" name="day" value="Sunday">
                                <label for="sunday">Sunday</label><br>
                                <input type="checkbox" id="monday" name="day" value="Monday">
                                <label for="monday">Monday</label><br>
                                <button onclick="applyTimes()">Apply</button>
                            </div>
                        </div>
                    </div>
                </div>`;
        $('#' + id).append(html)
    }
    $("body").on("click", ".remove_feature", function() {
        $(this).parent().parent().remove();
    });

    function skilledbtn() {
        $('#skilledbtn').attr('disabled', false);
    };
</script>
@endpush