  <style>
    * {
        font-family: 'Poppins', sans-serif;
    }
.new-block-flow ul {
    padding: 0;
    display: grid;
    grid-template-columns: 33% 33% 33%;
    grid-column-gap: 8px;
}
.new-block-flow ul li {
    list-style-type: none;
    border: 1px solid #dfdfdf;
    padding: 16px;
    border-radius: 5px;
    margin-bottom: 8px;
}
.new-block-flow ul li p {
    margin: 9px 0 0 0;
}
.new-block-flow.question-answer ul {
    grid-template-columns: auto;
}
.new-block-flow.question-answer ul li {
    background: #fbfbfb;
    margin-bottom: 15px;
    padding-left: 60px;
    position: relative;
}
.new-block-flow.question-answer ul li span {
    position: absolute;
    background: #39afc7;
    left: 10px;
    top: 10px;
    width: 35px;
    height: 35px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    color: #fff;
    font-weight: 500;
    border-radius: 100px;
    text-align:center;
    line-height: 30px;
}
.headline {
    font-size: 22px;
    color: #39afc7;
    margin-bottom: 10px;
    margin-top: 8px;
}

@media all and (max-width: 991px) {
    .new-block-flow ul {
        grid-template-columns: 49% 49%;
        grid-column-gap: 19px;
    }
    .new-block-flow ul li {
        grid-area: initial !important;
        margin-bottom: 15px;
    }
}


@media all and (max-width: 767px) {
    .new-block-flow ul {
        grid-template-columns: 100%;
        grid-column-gap: 0px;
    }
    .new-block-flow ul li {
        margin-bottom: 10px;
    }
}
.page-break {
    page-break-after: always;
}
  </style>
  @forEach($summerCamps as $summerCamp)
  	<div style="width:100%; display: table; padding-bottom: 20px;">
		<div style="width: 100%; display: table-cell; text-align: right; padding:10px 30px 0 0;"><img src="https://superschool.org/wp-content/uploads/2023/02/Super_School_Logo-1.png" width="100"></div>
		<div style="width: 100%; display: table-cell;">
			<h3 style="margin:0px;">SUPER SCHOOL</h3>
			<p style="margin:0px;"><i>Masked Perfection</i></p>
			<p style="margin:0px;">4343 W Sunrise Blvd</p>
			<p style="margin:0px;">Plantation, FL 33313</p>
		</div>
	</div>
    <div class="headline mb-4"  style="text-align:center; margin-bottom: 30px; border-bottom: 1px solid #ccc; padding-bottom: 30px;"><strong>Summer Registration Invoice Detail</strong></div>
    
    <div class="row">
        <div class="col-xl-12 col-md-12">
            <div class="card border-0 shadow mb-3">
                <div class="card-header bg-transparent d-block">
                    <div class="page-title">
                        <div class="row d-flex align-items-center flex-wrap">
                            <h4 class="mb-3 mb-md-0 fw-semi col-md-5 text-danger headline">Personal Details</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="new-block-flow">
                        <ul>
                            <li>
                                <strong>Name Of Candidate:</strong>
                                <p>{{($summerCamp && $summerCamp->student_name)?$summerCamp->student_name:'N/A'}}</p>
                            </li>
                            <li>
                                <strong>Date of Birth:</strong>
                                <p>{{($summerCamp && $summerCamp->student_dob)?\Carbon\Carbon::parse($summerCamp->student_dob)->format('M d, Y'):'N/A'}}</p>
                            </li>
                            <li>
                                <strong>Name Of School:</strong>
                                <p>{{($summerCamp && $summerCamp->school_name)?$summerCamp->school_name:'N/A'}}</p>
                            </li>
                            <li>
                                <strong>T-Shirt Size:</strong>
                                <p>
                                    @if($summerCamp && $summerCamp->tshirt)
                                        @forEach($tShirts as $key1=>$value1)
                                        @if($key1 == $summerCamp->tshirt)
                                            {{$value1}} 
                                        @endif
                                        @endForeach
                                    @endif
                                </p>
                            </li>
                            <li>
                                <strong>Address:</strong>
                                <p>{{($summerCamp && $summerCamp->address)?$summerCamp->address:'N/A'}}</p>
                            </li>
                            <li>
                                <strong>Name of Parent/Guardian:</strong>
                                <p>{{($summerCamp && $summerCamp->parent_name)?$summerCamp->parent_name:'N/A'}}</p>
                            </li>
                            <li>
                                <strong>Cell Phone Number:</strong>
                                <p>{{($summerCamp && $summerCamp->phone)?$summerCamp->phone:'N/A'}}</p>
                            </li>
                            <li>
                                <strong>Email:</strong>
                                <p>{{($summerCamp && $summerCamp->email)?$summerCamp->email:'N/A'}}</p>
                            </li>
                            <li>
                                <strong>Best way to contact:</strong>
                                <p>{{($summerCamp && $summerCamp->best_way_to_contact)?$summerCamp->best_way_to_contact:'N/A'}}</p>
                            </li>
                            <li>
                                <strong>Please select what sessions you would like your child to attend:</strong>
                                <p>
                                     @if($summerCamp && $summerCamp->sessions)
                                        @forEach($sessions as $key=>$value)
                                        @if($key == $summerCamp->sessions)
                                            {{$value}} 
                                        @endif
                                        @endForeach
                                    @endif
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="card-header bg-transparent d-block">
                    <div class="page-title">
                        <div class="row d-flex align-items-center flex-wrap">
                            <h4 class="mb-3 mb-md-0 fw-semi col-md-5 text-danger headline">Emergency Details</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="new-block-flow">
                        <ul>
                            <li>
                                <strong>Emergency Contact Name 1</strong>
                                <p>{{($summerCamp && $summerCamp->emergency_contact_name1)?$summerCamp->emergency_contact_name1:'N/A'}}</p>
                            </li>
                            <li>
                                <strong>Relationship</strong>
                                <p>{{($summerCamp && $summerCamp->emergency_relationship1)?$summerCamp->emergency_relationship1:'N/A'}}</p>
                            </li>
                            <li>
                                <strong>Phone Number</strong>
                                <p>{{($summerCamp && $summerCamp->emergency_phone1)?$summerCamp->emergency_phone1:'N/A'}}</p>
                            </li>
                            <li>
                                <strong>Emergency Contact Name 2</strong>
                                <p>{{($summerCamp && $summerCamp->emergency_contact_name2)?$summerCamp->emergency_contact_name2:'N/A'}}</p>
                            </li>
                            <li>
                                <strong>Relationship</strong>
                                <p>{{($summerCamp && $summerCamp->emergency_relationship2)?$summerCamp->emergency_relationship2:'N/A'}}</p>
                            </li>
                            <li>
                                <strong>Phone Number</strong>
                                <p>{{($summerCamp && $summerCamp->emergency_phone2)?$summerCamp->emergency_phone2:'N/A'}}</p>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="card-header bg-transparent d-block">
                    <div class="page-title">
                        <div class="row d-flex align-items-center flex-wrap">
                            <h4 class="mb-3 mb-md-0 fw-semi col-md-5 text-danger headline">Safety Details</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="new-block-flow question-answer">
                        <ul>
                            <li>
                                <span>1</span>
                                <strong>Safety Information</strong>
                                <p>{{($summerCamp && $summerCamp->safety_info)?$summerCamp->safety_info:'N/A'}}</p>
                            </li>
                            <li>
                                <span>2</span>
                                <strong>Does your child have any medical conditions, allergies, or special needs the staff should know about?</strong>
                                <p>{{($summerCamp && $summerCamp->medical_conditions)?$summerCamp->medical_conditions:'N/A'}}</p>
                            </li>
                            <li>
                                <span>3</span>
                                <strong>Does your child have regular medications that you would like the staff to administer?</strong>
                                <p>{{($summerCamp && $summerCamp->regular_medications)?$summerCamp->regular_medications:'N/A'}}</p>
                            </li>
                            <li>
                                <span>4</span>
                                <strong>Does your child have any behavioral or emotional issues the staff should know about?</strong>
                                <p>{{($summerCamp && $summerCamp->behavioral_or_emotional)?$summerCamp->behavioral_or_emotional:'N/A'}}</p>
                            </li>
                            <li>
                                <span>5</span>
                                <strong>Does your child have any sensory aversions? (avoid touching/become fearful)</strong>
                                <p>{{($summerCamp && $summerCamp->sensory_aversions)?$summerCamp->sensory_aversions:'N/A'}}</p>
                            </li>
                            <li>
                                <span>6</span>
                                <strong>What are some of your child's reinforcers</strong>
                                <p>{{($summerCamp && $summerCamp->child_reinforcers)?$summerCamp->child_reinforcers:'N/A'}}</p>
                            </li>
                            <li>
                                <span>7</span>
                                <strong>Is your child on a special diet?</strong>
                                <p>{{($summerCamp && $summerCamp->special_diet)?$summerCamp->special_diet:'N/A'}}</p>
                            </li>
                            <li>
                                <span>8</span>
                                <strong>What are 4 goals that you would like your child to focus on this the summer?</strong>
                                @php 
                                $counter = 1;
                                @endphp
                                @if($summerCamp && ($summerCamp->goal_1 || $summerCamp->goal_2 || $summerCamp->goal_3 ||$summerCamp->goal_4))
                                    @if($summerCamp && $summerCamp->goal_1)
                                        <p>{{ $counter.') '.$summerCamp->goal_1}}</p>
                                        @php 
                                        $counter = $counter+1;
                                        @endphp
                                    @endif
                                    @if($summerCamp && $summerCamp->goal_2)
                                        <p>{{ $counter.') '.$summerCamp->goal_2}}</p>
                                        @php 
                                        $counter = $counter+1;
                                        @endphp
                                    @endif
                                    @if($summerCamp && $summerCamp->goal_3)
                                        <p>{{ $counter.') '.$summerCamp->goal_3}}</p>
                                        @php 
                                        $counter = $counter+1;
                                        @endphp
                                    @endif
                                    @if($summerCamp && $summerCamp->goal_4)
                                        <p>{{ $counter.') '.$summerCamp->goal_4}}</p>
                                        @php 
                                        $counter = $counter+1;
                                        @endphp
                                    @endif
                                @else
                                <p>N/A</p>
                                @endif
                            </li>
                            <li>
                                <span>9</span>
                                <strong>Please let us know anything else about your Super Candidate!</strong>
                                <p>{{($summerCamp && $summerCamp->about_super_student)?$summerCamp->about_super_student:'N/A'}}</p>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="card-header bg-transparent d-block">
                    <div class="page-title">
                        <div class="row d-flex align-items-center flex-wrap">
                            <h4 class="mb-3 mb-md-0 fw-semi col-md-5 text-danger headline">Important Details</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="new-block-flow">
                        <ul class="mb-0">
                            <li>
                                <strong>Sunscreen</strong>
                                <p>{{($summerCamp && $summerCamp->sunscreen)?$summerCamp->sunscreen:'N/A'}}</p>
                            </li>
                            <li>
                                <strong>Important Name</strong>
                                <p>{{($summerCamp && $summerCamp->important_name)?$summerCamp->important_name:'N/A'}}</p>
                            </li>
                            <li>
                                <strong>Important Date</strong>
                                <p>{{($summerCamp && $summerCamp->important_date)?\Carbon\Carbon::parse($summerCamp->important_date)->format('M d, Y'):'N/A'}}</p>
                            </li>
                           <li style="grid-area: 2 / 1 / span 2 / span 3;">
                                <strong>Photograph Release</strong>
                                <p>{{($summerCamp && $summerCamp->photograph_release=="Yes")?"As the parent or legal guardian of the camper named above, I permit Super School to take and use photographs of my child/children/ward(s), and copyright them, for the purpose of promoting Super School programs and activities. This includes permission to publish photographs of my child/children/ward(s) for such purpose and to the use of any printed matter in conjunction with the photographs. I understand that such photographs of my child/children/ward(s) remain the property of Super School.":'I decline to provide permission for Super School to use my child’s photograph.'}}
                                        </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-break"></div>
    @endForeach