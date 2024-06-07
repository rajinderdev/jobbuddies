@extends('superadmin.layout.master')

@section('main-content-section')

<!-- content area start -->
<div class="container-fluid px-lg-4 mt-4 mt-xl-5">
    <div class="row mb-3">
        <div class="col-xl-12 col-md-12">
            <a href="{{ route('superadmin.summerCamp.index') }}" role="button" class="btn btn-secondary">
                <i class="fas fa-angle-left"></i>
                Back
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 col-md-12">
            <div class="card border-0 shadow mb-3">
                <div class="card-header bg-transparent d-block">
                    <div class="page-title">
                        <div class="row d-flex align-items-center flex-wrap">
                            <h4 class="mb-3 mb-md-0 fw-semi col-md-5 text-danger">Personal Details</h4>
                            <div class="col-md-7 d-flex justify-content-md-end align-items-center flex-wrap">
                                <a href="{{route('downloadCampinvoicePdf',$summerCamp->id)}}" class="btn btn-danger btn-del mr-2" ta>Download Recipt</a>
                                <a href="{{route('downloadCampDetailPdf',$summerCamp->id)}}" class="btn btn-danger btn-del" ta>Download Detail</a>
                            </div>
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
                            <h4 class="mb-3 mb-md-0 fw-semi col-md-5 text-danger">Emergency Details</h4>
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
                            <h4 class="mb-3 mb-md-0 fw-semi col-md-5 text-danger">Safety Details</h4>
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
                                <span>9</span><p>{{($summerCamp && $summerCamp->goals_description)?$summerCamp->goals_description:'N/A'}}</p>
                            </li>
                            <li>
                                <span>9</span>
                                <strong>Please let us know anything else about your Super Candidate!</strong>
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
                        </ul>
                    </div>
                </div>

                <div class="card-header bg-transparent d-block">
                    <div class="page-title">
                        <div class="row d-flex align-items-center flex-wrap">
                            <h4 class="mb-3 mb-md-0 fw-semi col-md-5 text-danger">Important Details</h4>
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

 
</div>
</div>
</div>

@endsection

@push('scripts')

@endpush