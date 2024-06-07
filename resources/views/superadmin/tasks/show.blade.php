@extends('superadmin.layout.master')

@section('main-content-section')
<style>
#chart {
  width: 100%;
  height: 500px;
}
</style>
<!-- content area start -->
<div class="container-fluid px-lg-4 mt-4 mt-xl-5">
    <div class="row mb-3">
        <div class="col-xl-12 col-md-12">
            <a href="{{ route('superadmin.tasks.index') }}" role="button" class="btn btn-secondary">
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
                        <h4 class="mb-0 fw-semi">Goal Details</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-6 col-xl-4">
                            <div class="row">
                                <div class="col-5">
                                    <h6 class="fw-bold my-3">
                                        Goal Name
                                    </h6>
                                </div>
                                <div class="col-2">
                                    <h6 class="my-3">
                                        :
                                    </h6>
                                </div>
                                <div class="col-5">
                                    <h6 class="text-start my-3">
                                        {{ (($task) && ($task->task_name)) ? $task->task_name : 'N/A' }}
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-4">
                            <div class="row">
                                <div class="col-5">
                                    <h6 class="fw-bold my-3">
                                        Type Associated
                                    </h6>
                                </div>
                                <div class="col-2">
                                    <h6 class="my-3">
                                        :
                                    </h6>
                                </div>
                                <div class="col-5">
                                    <h6 class="text-start my-3">
                                        {{-- @foreach ($task->kids as $kid)  
                                            {{ $loop->first ? '' : ', ' }}{{ $kid->name }} 
                                        @endforeach --}}
                                        {{ ($task->skill)?$task->skill->skill_name:"N/A" }}
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-4">
                            <div class="row">
                                <div class="col-5">
                                    <h6 class="fw-bold my-3">
                                        Created On
                                    </h6>
                                </div>
                                <div class="col-2">
                                    <h6 class="my-3">
                                        :
                                    </h6>
                                </div>
                                <div class="col-5">
                                    <h6 class="text-start my-3">
                                        {{ (($task) && ($task->created_at)) ?  date("M d, Y", strtotime($task->created_at)) : 'N/A' }}
                                    </h6>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-xl-4">
                            <div class="row">
                                <div class="col-5">
                                    <h6 class="fw-bold my-3">
                                        Created By
                                    </h6>
                                </div>
                                <div class="col-2">
                                    <h6 class="my-3">
                                        :
                                    </h6>
                                </div>
                                <div class="col-5">
                                    <h6 class="text-start my-3">
                                        {{ (($task) && ($task->user) && ($task->user->name)) ? $task->user->name : 'N/A' }}
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
                <div class="card-body">

                    <div class="table-header">
                        <div class="row align-items-center">
                            <div class="col-7 col-md-8">
                                <h5 class="mb-0 fw-semi mb-4">Candidates Data</h5>
                            </div>
                            <div class="col-5 col-md-4 text-right">
                                <div class="page-action mb-4">
                                    {{-- <a href="history.html" role="button" class="btn btn-danger">
                                        <i class="fas fa-history"></i>
                                        History
                                    </a> --}}
                                    <button type="button"
                                        class="btn btn-danger my-1 my-md-0 disabled" id="addRemarksBtn">
                                        <i class="fas fa-plus-circle"></i>
                                        <span class="d-none d-sm-inline">Update Remark</span>
                                    </button>
                                    <button type="button"
                                        class="btn btn-success my-1 my-md-0" data-bs-toggle="modal" data-bs-target="#chartmodal">
                                        <i class="fa fa-chart-bar" aria-hidden="true"></i>
                                        <span class="d-none d-sm-inline">View Chart</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- <table class="table table-bordered align-middle tb-light"> -->
                    <table id="newtable" class="display responsive nowrap myTable tb-light task-kids-datatable" id="taskKidsDatatable" width="100%">
                        <thead class="table-light">
                            <tr>
                                <th id="checkbox-th"></th>
                                <th class="text-uppercase">Sr No.</th>
                                <th class="text-uppercase">Candidate Name</th>
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
</div>
</div>
</div>

<!--Add Remark Modal-->
<div class="modal fade" id="AddRemarkModal" tabindex="-1" aria-labelledby="AddRemarkModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h4 class="modal-title text-secondary" id="AddRemarkModalLabel">Add Remark</h4>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <div class="score-header bg-light py-3 px-3 d-none d-md-block">
                <div class="row g-3">
                   <div class="col-12 col-lg-2">
                    </div>
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
            <form id="kidassessment" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-lg-12" id="assessment_row">
                            
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger me-1" id="addassessmentkidsBtn">Submit</button>
                </div>
            </form>
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


<!--chart-modal-->
<div class="modal fade" id="chartmodal" tabindex="-1" aria-labelledby="chartmodal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-secondary" id="chartmodal_label">Candidate Score Chart</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
            </div>
            <div class="chartbg p-3" id="chart">
               
            </div>
        </div>
    </div>
</div>
<!--end-->

<!-- Add add remarks Successfully Modal -->
<div class="modal fade" id="remarksSuccessModal" tabindex="-1" aria-labelledby="remarksSuccessModalModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header">
                <h5 class="modal-title" id="remarksSuccessModalModalLabel">Success Modal</h5>
                <button type="button" class="close"  data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center p-lg-5">
                    <div class="mb-3">
                        <i class="far fa-check-circle fa-4x text-success"></i>
                    </div>

                    <h5 class="mb-0" id="success_message"></h5>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button> -->
                <a href="{{ route('superadmin.tasks.show',$task->id) }}" role="button" class="btn btn-danger">Ok</a>
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
    var tasks_kids_table = '';
    var task = @json($task);
  $('#closeShowmodal').click(function(){
        $('#showRemarkModal').modal('hide');

    });
    /* All Candidates Data Listing */
    $(function () {
        tasks_kids_table = $('.task-kids-datatable').DataTable({
            processing: true,
            serverSide: true,
            paging: true,
            pagelength: 10,
            "bDestroy": true,
            'columnDefs': [
                {
                    'targets': 0,
                    'checkboxes': {
                    'selectRow': true
                    }
                }
            ],
            'select': {
                'style': 'multi'
            },
            ajax: {
            url: "{{url('admin/tasks/show')}}"+"/"+task.id,
            },
            columns: [
                {
                     data : 'checkbox' ,
                     name: 'checkbox',
                     soratable: false,
                     orderable: false,
                },
                {
                    name: 'id',
                    data: null,
                    orderable: false,
                    render: function(data, type, full, meta) {
                        return data.DT_RowIndex;
                    }
                },
                {data: 'name', name: 'name', orderable: false},
               {data: 'assessments_trial', name: 'assessments_trial', orderable: false, searchable: false},
                {data: 'score', name: 'score', orderable: false, searchable: false},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
        /* Add Remark enable/disable functionality using datatable checkbox */
        $("body").on('change','.dt-checkboxes',function(){
            var rows_selected = tasks_kids_table.column(0).checkboxes.selected();
            if(rows_selected.length>0){
                $('#addRemarksBtn').removeClass('disabled');  
            }
            else{
                $('#addRemarksBtn').addClass('disabled');  
            }
        })
        /* Add Remark enable/disable functionality using datatable header checkbox */
        $("body").on('change','#checkbox-th input',function(){
            var rows_selected = tasks_kids_table.column(0).checkboxes.selected();
            if(rows_selected.length>0){
                $('#addRemarksBtn').removeClass('disabled');  
            }
            else{
                $('#addRemarksBtn').addClass('disabled');  
            }
        });
         /* Add Remark functionality */
        $("#addRemarksBtn").click(function(){
            $('#assessment_row').empty();
            var rows_selected = tasks_kids_table.column(0).checkboxes.selected();
            if(rows_selected.length>0){
                var assessmentsHtml = getKidsAssessmentHtml(rows_selected);
                $('#assessment_row').append(assessmentsHtml);
                $('#AddRemarkModal').modal('show');
            }
        });
    });
 var addmoreTrialCount = 0;
     /* make add/edit Remark modal body html */
    function getKidsAssessmentHtml(rows_selected){
        var assessments= @json($assessments);
        var task= @json($task);
        var auth = @json($auth);
        
        var assessmentsHtml="";
        $.each(rows_selected, function(index, rowId){
           var taskId = task.id;
            var authId = auth.id;
            var kidid = $(rowId).val();
            var name = $(rowId).attr('data-name');
            var kidAssessmentId = $(rowId).attr('data-kid-assessmentId');
            var kidRemarks = $(rowId).attr('data-kid-remarks');
            var kidAssessments = $(rowId).attr('data-kid-assessments');
            var addmoreTrialCount = index+''+kidid;
            var assessmentsHtml = "";
             if(kidAssessments){
                $.ajax({
                    url: "{{ route('superadmin.assessments.kidsAssesmentsTrials') }}",
                    type: "get",
                    data: {
                        'kidAssessmentId':kidAssessmentId,
                        'kidid':kidid,
                    },
                    success: function (res) {
                        if(res.success==true && res.kidsAssesmentsTrials.length>0){
                           
                            $.each(res.kidsAssesmentsTrials, function(index1, trial){
                                console.log(trial,"trial")
                                var assessmentsHtml="";
                                var addmoreTrialCount1 = index1+''+kidid;
                               
                                assessmentsHtml +=` <div id="appendTrial`+index1+kidid+`"><div class="row align-items-center mb-3 mb-md-0">
                                    <div class="col-lg-2 vikas kidname-label">`;
                                        if(index1 == 0){
                                        assessmentsHtml +=`<label class="col-form-label">`+name+`</label>`;
                                        }
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
                                    <div class="checkbox-style my-0 my-md-2">
                                    <div class="custom-control custom-radio custom-control-inline mb-2">
                                    <input type="radio" id="IND-`+index+`sub-ass`+index1+`" name="assessments[`+index+`][sub-ass][`+index1+`]" value="IND" class="custom-control-input"`; 
                                    if(trial.assessments=="IND"){
                                       assessmentsHtml +=`checked`; 
                                    }
                                     assessmentsHtml +=`><label class="custom-control-label" for="IND-`+index+`sub-ass`+index1+`">IND</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline mb-2">
                                    <input type="radio" id="GP-`+index+`sub-ass`+index1+`" name="assessments[`+index+`][sub-ass][`+index1+`]" value="GP" class="custom-control-input"`;
                                     if(trial.assessments=="GP"){
                                       assessmentsHtml +=`checked`; 
                                    }
                                     assessmentsHtml +=`><label class="custom-control-label" for="GP-`+index+`sub-ass`+index1+`">GP</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline mb-2">
                                    <input type="radio" id="VP-`+index+`sub-ass`+index1+`" name="assessments[`+index+`][sub-ass][`+index1+`]" value="VP" class="custom-control-input"`;
                                     if(trial.assessments=="VP"){
                                      assessmentsHtml += `checked`; 
                                    }
                                     assessmentsHtml +=`><label class="custom-control-label" for="VP-`+index+`sub-ass`+index1+`">VP</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline mb-2">
                                    <input type="radio" id="PP-`+index+`sub-ass`+index1+`" name="assessments[`+index+`][sub-ass][`+index1+`]" value="PP" class="custom-control-input"`;
                                     if(trial.assessments=="PP"){
                                     assessmentsHtml +=  `checked`; 
                                    }
                                     assessmentsHtml +=`><label class="custom-control-label" for="PP-`+index+`sub-ass`+index1+`">PP</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline mb-2">
                                    <input type="radio" id="FP-`+index+`sub-ass`+index1+`" name="assessments[`+index+`][sub-ass][`+index1+`]" value="FP" class="custom-control-input"`;
                                     if(trial.assessments=="FP"){
                                      assessmentsHtml += `checked`; 
                                    }
                                     assessmentsHtml +=`><label class="custom-control-label" for="FP-`+index+`sub-ass`+index1+`">FP</label>
                                    </div>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-3">
                                    <div class="my-0 my-md-2">
                                        <label class="col-form-label d-block d-md-none">Remarks</label>
                                        <input type="text" class="form-control"
                                            aria-describedby="passwordHelpInline" name="assessments[`+index+`][remarks][`+index1+`]" value="`+trial.remarks+`">
                                        <input type="hidden" class="form-control"
                                        name="assessments[`+index+`][candidate_id]" value="`+kidid+`">
                                        <input type="hidden" class="form-control"
                                        name="assessments[`+index+`][task_id]" value="`+task.id+`">
                                        <input type="hidden" class="form-control"
                                        name="assessments[`+index+`][user_id]" value="`+auth.id+`">
                                        <input type="hidden" class="form-control"
                                        name="assessments[`+index+`][kidAssessment_id]" value="`+trial.kids_assessments_id+`">
                                        <input type="hidden" class="form-control"
                                        name="assessments[`+index+`][kidAssessment_trail_id][`+index1+`]" value="`+trial.id+`">
                                    </div>`;
                                    if(res.kidsAssesmentsTrials.length==3&& res.kidsAssesmentsTrials.length==index1+1){
                                        assessmentsHtml +=`<button type="button" class="addtrail btn-sm btn btn-success" id="trail`+addmoreTrialCount1+`" onclick="gethtml(`+index+`,`+kidid+`,`+taskId+`,`+authId+`,appendTrial`+index1+kidid+`);" disabled>Add</button>`;
                                    }
                                    else if(res.kidsAssesmentsTrials.length==index1+1){
                                        assessmentsHtml +=`<button type="button" class="addtrail btn-sm btn btn-success" id="trail`+index+kidid+`" onclick="gethtml(`+index+`,`+kidid+`,`+taskId+`,`+authId+`,'appendTrial`+index1+kidid+`','increaseCount',`+index1+`);">Add</button>`;
                                    }
                                   
                                    assessmentsHtml +=`</div>`;
                              
                                
                                assessmentsHtml +=`</div></div>`;
                                if(res.kidsAssesmentsTrials.length==index1+1){
                                    assessmentsHtml +=` <hr>`;
                                }
                            // if(index1==0){
                                $('#assessment_row').append(assessmentsHtml);
                            // }
                            // else{
                            //     $('#appendTrial'+kidid+taskId).append(assessmentsHtml);
                            // }
                            });
                        }
                        else{
                            assessmentsHtml +=` <div id="appendTrial`+index+kidid+`"><div class="row align-items-center mb-3 mb-md-0">
                                    <div class="col-lg-2 kidname-label">
                                        <label class="col-form-label">`+name+`</label>
                                    </div>
                                <div class="col-12 col-lg-2">
                                    <div class="my-0 my-md-2 kidname-label">
                                        <label class="col-form-label">First</label>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-5">
                                    <div class="checkbox-style my-0 my-md-2">
                                    <div class="custom-control custom-radio custom-control-inline mb-2">
                                    <input type="radio" id="IND-`+index+`sub-ass0" name="assessments[`+index+`][sub-ass][0]" value="IND" class="custom-control-input"`; 
                                    if(kidAssessments=="IND"){
                                       assessmentsHtml +=`checked`; 
                                    }
                                     assessmentsHtml +=`><label class="custom-control-label" for="IND-`+index+`sub-ass0">IND</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline mb-2">
                                    <input type="radio" id="GP-`+index+`sub-ass0" name="assessments[`+index+`][sub-ass][0]" value="GP" class="custom-control-input"`;
                                     if(kidAssessments=="GP"){
                                       assessmentsHtml +=`checked`; 
                                    }
                                     assessmentsHtml +=`><label class="custom-control-label" for="GP-`+index+`sub-ass0">GP</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline mb-2">
                                    <input type="radio" id="VP-`+index+`sub-ass0" name="assessments[`+index+`][sub-ass][0]" value="VP" class="custom-control-input"`;
                                     if(kidAssessments=="VP"){
                                      assessmentsHtml += `checked`; 
                                    }
                                     assessmentsHtml +=`><label class="custom-control-label" for="VP-`+index+`sub-ass0">VP</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline mb-2">
                                    <input type="radio" id="PP-`+index+`sub-ass0" name="assessments[`+index+`][sub-ass][0]" value="PP" class="custom-control-input"`;
                                     if(kidAssessments=="PP"){
                                     assessmentsHtml +=  `checked`; 
                                    }
                                     assessmentsHtml +=`><label class="custom-control-label" for="PP-`+index+`sub-ass0">PP</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline mb-2">
                                    <input type="radio" id="FP-`+index+`sub-ass0" name="assessments[`+index+`][sub-ass][0]" value="FP" class="custom-control-input"`;
                                     if(kidAssessments=="FP"){
                                      assessmentsHtml += `checked`; 
                                    }
                                     assessmentsHtml +=`><label class="custom-control-label" for="FP-`+index+`sub-ass0">FP</label>
                                    </div>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-3">
                                    <div class="my-0 my-md-2">
                                        <label class="col-form-label d-block d-md-none">Remarks</label>
                                        <input type="text" class="form-control"
                                            aria-describedby="passwordHelpInline" name="assessments[`+index+`][remarks][0]" value="`+kidRemarks+`">
                                        <input type="hidden" class="form-control"
                                        name="assessments[`+index+`][candidate_id]" value="`+kidid+`">
                                        <input type="hidden" class="form-control"
                                        name="assessments[`+index+`][task_id]" value="`+task.id+`">
                                        <input type="hidden" class="form-control"
                                        name="assessments[`+index+`][user_id]" value="`+auth.id+`">
                                        <input type="hidden" class="form-control"
                                        name="assessments[`+index+`][kidAssessment_id]" value="`+kidAssessmentId+`">
                                        <input type="hidden" class="form-control"
                                        name="assessments[`+index+`][kidAssessment_trail_id][0]" value="">
                                    </div>
                                    <button type="button" class="addtrail btn-sm btn btn-success" id="trail`+index+kidid+`" onclick="gethtml(`+index+`,`+kidid+`,`+taskId+`,`+authId+`,'appendTrial`+index+kidid+`');">Add</button>
                                </div>
                                
                               </div></div>`;
                               
                            $('#assessment_row').append(assessmentsHtml);
                        }
                    
                    },
                    error:function (res) {
                        console.log(res)
                    }
                })
            }
            else{
                assessmentsHtml +=` <div id="appendTrial`+index+kidid+`"><div class="row align-items-center mb-3 mb-md-0">
                                    <div class="col-lg-2 kidname-label">
                                        <label class="col-form-label">`+name+`</label>
                                    </div>
                                <div class="col-12 col-lg-2">
                                    <div class="my-0 my-md-2 kidname-label">
                                        <label class="col-form-label">First</label>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-5">
                                    <div class="checkbox-style my-0 my-md-2">
                                    <div class="custom-control custom-radio custom-control-inline mb-2">
                                    <input type="radio" id="IND-`+index+`sub-ass0" name="assessments[`+index+`][sub-ass][0]" value="IND" class="custom-control-input"`; 
                                    if(kidAssessments=="IND"){
                                       assessmentsHtml +=`checked`; 
                                    }
                                     assessmentsHtml +=`><label class="custom-control-label" for="IND-`+index+`sub-ass0">IND</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline mb-2">
                                    <input type="radio" id="GP-`+index+`sub-ass0" name="assessments[`+index+`][sub-ass][0]" value="GP" class="custom-control-input"`;
                                     if(kidAssessments=="GP"){
                                       assessmentsHtml +=`checked`; 
                                    }
                                     assessmentsHtml +=`><label class="custom-control-label" for="GP-`+index+`sub-ass0">GP</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline mb-2">
                                    <input type="radio" id="VP-`+index+`sub-ass0" name="assessments[`+index+`][sub-ass][0]" value="VP" class="custom-control-input"`;
                                     if(kidAssessments=="VP"){
                                      assessmentsHtml += `checked`; 
                                    }
                                     assessmentsHtml +=`><label class="custom-control-label" for="VP-`+index+`sub-ass0">VP</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline mb-2">
                                    <input type="radio" id="PP-`+index+`sub-ass0" name="assessments[`+index+`][sub-ass][0]" value="PP" class="custom-control-input"`;
                                     if(kidAssessments=="PP"){
                                     assessmentsHtml +=  `checked`; 
                                    }
                                     assessmentsHtml +=`><label class="custom-control-label" for="PP-`+index+`sub-ass0">PP</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline mb-2">
                                    <input type="radio" id="FP-`+index+`sub-ass0" name="assessments[`+index+`][sub-ass][0]" value="FP" class="custom-control-input"`;
                                     if(kidAssessments=="FP"){
                                      assessmentsHtml += `checked`; 
                                    }
                                     assessmentsHtml +=`><label class="custom-control-label" for="FP-`+index+`sub-ass0">FP</label>
                                    </div>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-3">
                                    <div class="my-0 my-md-2">
                                        <label class="col-form-label d-block d-md-none">Remarks</label>
                                        <input type="text" class="form-control"
                                            aria-describedby="passwordHelpInline" name="assessments[`+index+`][remarks][0]" value="`+kidRemarks+`">
                                        <input type="hidden" class="form-control"
                                        name="assessments[`+index+`][candidate_id]" value="`+kidid+`">
                                        <input type="hidden" class="form-control"
                                        name="assessments[`+index+`][task_id]" value="`+task.id+`">
                                        <input type="hidden" class="form-control"
                                        name="assessments[`+index+`][user_id]" value="`+auth.id+`">
                                        <input type="hidden" class="form-control"
                                        name="assessments[`+index+`][kidAssessment_id]" value="`+kidAssessmentId+`">
                                        <input type="hidden" class="form-control"
                                        name="assessments[`+index+`][kidAssessment_trail_id][0]" value="">
                                    </div>
                                    <button type="button" class="addtrail btn-sm btn btn-success" id="trail`+addmoreTrialCount+`" onclick="gethtml(`+index+`,`+kidid+`,`+taskId+`,`+authId+`,'appendTrial`+index+kidid+`');">Add</button>
                                </div>
                               
                            </div></div>`;
                            $('#assessment_row').append(assessmentsHtml);
            }
        });
       
    }
    var oldKidId ="";
var oldIndex ="";
var trialCount = 0;
    function gethtml(indexCount,kidid,taskId,authId,appendRowId=null,increaseCount=null,subindex=null){
        var index= indexCount+''+kidid;
        var assessmentsHtml = "";
       
        if(trialCount<=2){
            $('#trail'+index).remove();
        }
        if(oldIndex != index){
            trialCount=0;   
        }
        if(subindex){
            var btnId = "trail"+subindex+''+kidid
            console.log(btnId,"fff")
            $('#'+btnId).remove();
            trialCount=subindex;   
        }
        trialCount++;
        assessmentsHtml +=` <div class="row align-items-center mb-3 mb-md-0">
                                    <div class="col-lg-2 kidname-label">
                                        <label class="col-form-label"></label>
                                    </div>
                                <div class="col-12 col-lg-2">
                                    <div class="my-0 my-md-2 kidname-label">`;
                                        if(trialCount==1){
                                            assessmentsHtml +=` <label class="col-form-label">Second</label>`;
                                        }
                                        else{
                                            assessmentsHtml +=` <label class="col-form-label">Third</label> `;
                                        }
                                        
                                        assessmentsHtml +=`  </div>
                                </div>
                                <div class="col-12 col-lg-5">
                                    <div class="checkbox-style my-0 my-md-2">
                                    <div class="custom-control custom-radio custom-control-inline mb-2">
                                    <input type="radio" id="IND-`+indexCount+`sub-ass`+trialCount+`" name="assessments[`+indexCount+`][sub-ass][`+trialCount+`]" value="IND" class="custom-control-input"`; 
                                   
                                     assessmentsHtml +=`><label class="custom-control-label" for="IND-`+indexCount+`sub-ass`+trialCount+`">IND</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline mb-2">
                                    <input type="radio" id="GP-`+indexCount+`sub-ass`+trialCount+`" name="assessments[`+indexCount+`][sub-ass][`+trialCount+`]" value="GP" class="custom-control-input"`;
                                    
                                     assessmentsHtml +=`><label class="custom-control-label" for="GP-`+indexCount+`sub-ass`+trialCount+`">GP</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline mb-2">
                                    <input type="radio" id="VP-`+indexCount+`sub-ass`+trialCount+`" name="assessments[`+indexCount+`][sub-ass][`+trialCount+`]" value="VP" class="custom-control-input"`;
                                    
                                     assessmentsHtml +=`><label class="custom-control-label" for="VP-`+indexCount+`sub-ass`+trialCount+`">VP</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline mb-2">
                                    <input type="radio" id="PP-`+indexCount+`sub-ass`+trialCount+`" name="assessments[`+indexCount+`][sub-ass][`+trialCount+`]" value="PP" class="custom-control-input"`;
                                    
                                     assessmentsHtml +=`><label class="custom-control-label" for="PP-`+indexCount+`sub-ass`+trialCount+`">PP</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline mb-2">
                                    <input type="radio" id="FP-`+indexCount+`sub-ass`+trialCount+`" name="assessments[`+indexCount+`][sub-ass][`+trialCount+`]" value="FP" class="custom-control-input"`;
                                     
                                     assessmentsHtml +=`><label class="custom-control-label" for="FP-`+indexCount+`sub-ass`+trialCount+`">FP</label>
                                    </div>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-3">
                                    <div class="my-0 my-md-2">
                                        <label class="col-form-label d-block d-md-none">Remarks</label>
                                        <input type="text" class="form-control"
                                            aria-describedby="passwordHelpInline" name="assessments[`+indexCount+`][remarks][`+trialCount+`]" value="">
                                      
                                        <input type="hidden" class="form-control"
                                        name="assessments[`+indexCount+`][kidAssessment_id]" value="">
                                         <input type="hidden" class="form-control"
                                        name="assessments[`+indexCount+`][kidAssessment_trail_id][`+trialCount+`]" value="">
                                    </div>`;
                                    if(trialCount==2){
                                        assessmentsHtml +=`<button type="button" class="addtrail btn-sm btn btn-success" id="trail`+index+`" onclick="gethtml(`+indexCount+`,`+kidid+`,`+taskId+`,`+authId+`,'`+appendRowId+`');" disabled>Add</button></div>`;
                                    }
                                    else{
                                        assessmentsHtml +=`<button type="button" class="addtrail btn-sm btn btn-success" id="trail`+index+`" onclick="gethtml(`+indexCount+`,`+kidid+`,`+taskId+`,`+authId+`,'`+appendRowId+`');">Add</button></div>`;
                                    }
                                    assessmentsHtml +=`
                            </div>`;
                            if(trialCount==2){
                                // assessmentsHtml +=` <hr>`;
                               
                                addmoreTrialCount==0

                            }
                            console.log(appendRowId,"appendRowId",assessmentsHtml,"assessmentsHtml")
                            $('#'+appendRowId).append(assessmentsHtml);
                            
                            oldKidId=kidid;
                            oldIndex=index;
       
    }

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
   
    $('#kidassessment').on('submit', function(e) {
        e.preventDefault();
        if ($(this).valid()) {
            $.ajax({
                url: "{{ route('superadmin.assessments.store') }}",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (res) {
                    if(res.success==true){
                        $('#AddRemarkModal').modal('hide');
                        $('#success_message').empty();
                        $('#success_message').append("Remark has been added successfully");
                        $('#remarksSuccessModal').modal('show');
                        tasks_kids_table.draw();
                    }
                },
                error:function (res) {
                    console.log(res)
                }
            })
        }
    });
   
</script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
  var options = {
    series: [
      {
        name: "Score",
        data: @json($chartDataScore)
      }
    ],
    chart: {
      type: 'bar',
      height: 400,
      toolbar: {
        show: false
      },
    },
    plotOptions: {
      bar: {
        borderRadius: 4,
        horizontal: false,
        columnWidth: '15%',
      }
    },
    dataLabels: {
      enabled: false
    },
    xaxis: {
      categories: @json($chartDataName)
    },
    yaxis: {
      min: 0,
      max: 100,
      tickAmount: 10,
    },
    tooltip: {
      y: {
        formatter: function (val) {
          return val + "%"; // Append '%' to the tooltip value
        }
      }
    }
  };

  var chart = new ApexCharts(document.querySelector("#chart"), options);
  chart.render();
</script>
@endpush