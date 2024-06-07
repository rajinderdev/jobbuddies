@extends('superadmin.layout.master')

@section('main-content-section')

<!-- content area start -->
<div class="container-fluid px-lg-4 mt-4 mt-xl-5">
    <div class="row mb-3">
        <div class="col-xl-12 col-md-12">
            <a href="{{ route('superadmin.assessments.index') }}" role="button" class="btn btn-secondary">
                <i class="fas fa-angle-left"></i>
                Back
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-md-12">
            <div class="card border-0 shadow mb-3">
                <div class="card-header bg-transparent d-xl-none d-block">
                    <div class="page-title">
                        <h4 class="mb-0 fw-semi">Assessments Report</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-6 col-xl-4">
                            <div class="row">
                                <div class="col-5">
                                    <h6 class="fw-bold my-3">
                                    Candidate Name
                                    </h6>
                                </div>
                                <div class="col-2">
                                    <h6 class="my-3">
                                        :
                                    </h6>
                                </div>
                                <div class="col-5">
                                    <h6 class="text-start my-3">
                                       {{$kid->name}}
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-4">
                            <div class="row">
                                <div class="col-5">
                                    <h6 class="fw-bold my-3">
                                        Period
                                    </h6>
                                </div>
                                <div class="col-2">
                                    <h6 class="my-3">
                                        :
                                    </h6>
                                </div>
                                <div class="col-5">
                                    <h6 class="text-start my-3">
                                        {{ $period }}
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-4">
                            <div class="row">
                                <div class="col-5">
                                    <h6 class="fw-bold my-3">
                                        No. of Goal
                                    </h6>
                                </div>
                                <div class="col-2">
                                    <h6 class="my-3">
                                        :
                                    </h6>
                                </div>
                                <div class="col-5">
                                    <h6 class="text-start my-3">
                                        {{ count($totalTasks) }}
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-4">
                            <div class="row">
                                <div class="col-5">
                                    <h6 class="fw-bold my-3">
                                        Incharge
                                    </h6>
                                </div>
                                <div class="col-2">
                                    <h6 class="my-3">
                                        :
                                    </h6>
                                </div>
                                <div class="col-5">
                                    <h6 class="text-start my-3">
                                        {{( $kid->assignedTeacher)?$kid->assignedTeacher->name:'N/A'}}
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-md-12">
            <div class="card border-0 shadow mb-3">
                <div class="card-header">
                    <h5 class="mb-0 fw-bold">Assessment Data</h5>
                </div>
                <div class="card-body">
                    <!-- <div class="table-header">
                        <div class="row align-items-center">
                            <div class="col-8 col-md-8">
                                <h5 class="mb-0 fw-semi mb-4">Candidate's Data</h5>
                            </div>
                            <div class="col-4 col-md-4 text-center text-lg-end">

                            </div>
                        </div>
                    </div> -->
                    <!-- <table class="table table-bordered align-middle tb-light"> -->

                    <table class="display responsive nowrap myTable tb-light kid-assessment-datatable" width="100%">
                        <thead class="table-light">
                            <tr>
                                <th class="text-uppercase">Sr No.</th>
                                <th class="text-uppercase">Type</th>
                                <th class="text-uppercase">Goal</th>
                                <th class="text-uppercase">Assessment Trail</th>
                                <th class="text-uppercase">Assessment Final Score</th>
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
    <div class="row">
        <div class="col-xl-12 col-md-12">
            <div class="card border-0 shadow mb-3">
                <div class="card-header">
                    <h5 class="mb-0 fw-bold">Summary Notes:</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="remraks">
                                <p>{{ $kid->summary }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row justify-content-between">
                        <div class="col-6 col-md-2">
                            <div class="mb-2">
                                {{ $kid->guardian_name }}
                                <hr/>
                                <label>Parent Name</label>
                            </div>
                        </div>
                        <div class="col-6 col-md-2">
                            <div class="mb-2">
                               
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-between">
                        <div class="col-6 col-md-2">
                            <div class="mb-2">
                                <hr/>
                                <label>Parent SIgnature</label>
                            </div>
                        </div>
                        <div class="col-6 col-md-2">
                            <div class="mb-2">
                                <hr/>
                                <label>Date</label>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-between">
                        <div class="col-6 col-md-2">
                            <div class="mb-2">
                                <hr/>
                                <label>Teacher Signature</label>
                            </div>
                        </div>
                        <div class="col-6 col-md-2">
                            <div class="mb-2">
                                <hr/>
                                <label>Date</label>
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
<div class="modal fade" id="showRemarkModal" tabindex="-1" aria-labelledby="showRemarkModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-secondary" id="showRemarkModalLabel">Show Remark</h4>
                <button type="button" class="close" id="closeShowmodal">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
            <div class="score-header bg-light py-3 px-3 d-none d-md-block">
                <div class="row g-3">
                   
                    <div class="col-12 col-lg-2">
                        Trail
                    </div>
                    <div class="col-12 col-lg-5">
                        <div class="">
                            <h6 class="fw-semi mb-0">Assessments</h6>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3">
                        <div class="">
                            <h6 class="fw-semi mb-0">Remarks</h6>
                        </div>
                    </div>
                </div>
            </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-lg-12" id="remarks_row">
                            
                        </div>
                    </div>
                </div>
               
        </div>
    </div>
</div>
@php
$auth = Auth::user();
@endphp
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script>
    var tasks_kid_assessment_table = '';
    var kid = @json($kid);

    /* All kid assessments Listing */
    $(function () {
        tasks_kid_assessment_table = $('.kid-assessment-datatable').DataTable({
            processing: true,
            serverSide: true,
            paging: true,
            pagelength: 10,
            searching:false,
            "bDestroy": true,
            "lengthChange": false,
            ajax: {
            url: "{{url('admin/assessments/show')}}"+"/"+kid.id,
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
                {data: 'skill_name', name: 'skill_name', orderable: false},
                {data: 'task_name', name: 'task_name', orderable: false},
                {data: 'assessments_trial', name: 'assessments_trial', orderable: false, searchable: false},
                {data: 'score', name: 'score', orderable: false, searchable: false},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    });
     $('#closeShowmodal').click(function(){
        $('#showRemarkModal').modal('hide');

    });
    function showremarks(kidId, kidAssessmentId){
        $('#remarks_row').empty();
        $.ajax({
                    url: "{{ route('superadmin.assessments.kidsAssesmentsTrials') }}",
                    type: "get",
                    data: {
                        'kidAssessmentId':kidAssessmentId,
                        'kidid':kidId ,
                    },
                    success: function (res) {
                        if(res.success==true && res.kidsAssesmentsTrials.length>0){
                            var assessmentsHtml="";
                            $.each(res.kidsAssesmentsTrials, function(index1, trial){
                                
                               
                                assessmentsHtml +=`<div class="row  mb-3 mb-md-0">
                                    <div class="my-0 my-md-2  kidname-label">`;
                                       
                                        assessmentsHtml +=`</div>
                                <div class="col-12 col-lg-2">
                                    <div class="my-0 my-md-2 kidname-label">`;
                                        if(index1 == 0){
                                            assessmentsHtml +=`<label class="col-form-label">First</label>`;
                                        }
                                        else if(index1 == 1){
                                            assessmentsHtml +=`<label class="col-form-label">Second</label>`;
                                        }
                                        else if(index1 == 2){
                                            assessmentsHtml +=`<label class="col-form-label">Third</label>`;
                                        }
                                        else{
                                            assessmentsHtml +=`<label class="col-form-label">First</label>`;
                                        }
                                      
                                        assessmentsHtml +=`</div>
                                </div>
                                <div class="col-12 col-lg-5">
                                    <div class="my-0 my-md-2">`;
                                            if(trial.assessments=="IND"){
                                                assessmentsHtml +=`<span class="">IND</span>`; 
                                            }
                                            if(trial.assessments=="GP"){
                                                assessmentsHtml +=`<span class="">GP</span>`; 
                                            }
                                            if(trial.assessments=="VP"){
                                                assessmentsHtml +=`<span class="">VP</span>`; 
                                            }
                                            if(trial.assessments=="PP"){
                                                assessmentsHtml +=`<span class="">PP</span>`; 
                                            }
                                            
                                            if(trial.assessments=="FP"){
                                                assessmentsHtml +=`<span class="">FP</span>`; 
                                            }
                                     
                                    
                                    assessmentsHtml +=`</div>
                                </div>

                                <div class="col-12 col-lg-5">
                                    <div class="col-12 col-lg-5">
                                        <span class="">`+trial.remarks+`</span>
                                      
                                    </div>`;
                                   
                                    assessmentsHtml +=`</div>
                                
                            </div>`;
                               
                            
                            });
                            $('#remarks_row').append(assessmentsHtml);
                        }
                       
                    },
                    error:function (res) {
                        console.log(res)
                    }

                })
                $('#showRemarkModal').modal('show');
    }
       
</script>
@endpush