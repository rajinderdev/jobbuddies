@extends('superadmin.layout.master')

@section('main-content-section')

<!-- content area start -->
<div class="container-fluid px-lg-4 mt-4 mt-xl-5">
    <div class="row mb-3">
        <div class="col-xl-12 col-md-12">
            <a href="{{ route('superadmin.jobs.index') }}" role="button" class="btn btn-secondary">
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
                        <h4 class="mb-0 fw-semi">Job Details</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-6 col-xl-4">
                         <div class="detail-box box-shadow-3 d-block mb-3">
                                            <p class="label">Job Title:</p>
                                            <span class="value">{{ ($job)?$job->title:'N/A' }}</span>
                                        </div>
                            
                        </div>
                        <div class="col-12 col-md-6 col-xl-4">
                        <div class="detail-box box-shadow-3 d-block mb-3">
                                            <p class="label">Job Location:</p>
                                            <span class="value">{{ ($job)?$job->location:'N/A' }}</span>
                                        </div>
                            
                        </div>
                        <div class="col-12 col-md-6 col-xl-4">
                        <div class="detail-box box-shadow-3 d-block mb-3">
                                            <p class="label">Job Contract:</p>
                                            <span class="value">{{ ($job)?$job->contract:'N/A' }}</span>
                                        </div>
                           
                        </div>
                        <div class="col-12 col-md-12 col-xl-12">
                        <div class="detail-box box-shadow-3 d-block mb-3" style="max-height:300px; overflow-y:auto;">
                                            <p class="label">Job Description:</p>
                                            <span class="value">{!! ($job)?$job->description:'N/A' !!}</span>
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
                    <div class="row align-items-center">
                    <div class="col-12 col-lg-4">
                            <h5 class="mb-0 fw-semi mb-0">Job Skills</h5>
                        </div>
                        <div class="col-12 col-lg-8 text-lg-end">
                            <div class="row g-2 align-items-center justify-content-end">
                                <div class="col-auto">
                                <button class="btn btn-success text-nowrap ms-sm-3 mt-3 mt-sm-0" data-bs-toggle="modal" data-bs-target="#addjobSkills">
                                    Add Job Skills
                                </button>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
               
                <div class="card-body">
                    <table id="jobSkilltable" class="display responsive nowrap myTable tb-light" width="100%">
                        <thead class="table-light">
                            <tr>
                                <th class="text-uppercase">Sr No.</th>
                                <th class="text-uppercase">Skill</th>
                                
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
                    <div class="row align-items-center">
                        <div class="col-12 col-md-12">
                            <h5 class="mb-0 fw-semi mb-0">Candidates</h5>
                        </div>
                        
                    </div>
                </div>
                <div class="card-body">
                    <table id="newtable" class="display responsive nowrap myTable tb-light candidates-datatable" width="100%">
                        <thead class="table-light">
                            <tr>
                                <th class="text-uppercase">Sr No.</th>
                                <th class="text-uppercase">Candidate Name</th>
                                <th class="text-uppercase">Applied Date</th>
                                <th class="text-uppercase">Phone</th>
                                <th class="text-uppercase">Email</th>
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
<!-- Add Candidate Details Successfully Modal -->
<div class="modal fade" id="candidateSuccessModal" tabindex="-1" aria-labelledby="addJobSuccessModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header">
                <h5 class="modal-title" id="addJobSuccessModalLabel">Success Modal</h5>
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
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ok</button>
            </div>
        </div>
    </div>
</div>
  <!-- Delete job Modal -->
  <div class="modal fade" id="deleteCandidateData" tabindex="-1" aria-hidden="true">
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
            <form id="deleteCandidate" enctype="multipart/form-data" method="POST">
                @csrf
                <div id="Ticket-SponsorshipId"></div>
                <input type="hidden" value="" id="deleteCandidateId" name="id">
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger me-1">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>


 <!-- Add Job Skills Modal -->
 <div class="modal fade" id="addjobSkills" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h4 class="modal-title text-danger">Add Job Skills</h4>
                <button type="button" class="close"  data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addJobskillsForm" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="mb-3">
                                <label for="skilltitle" class="form-label">Skill Title<span class="asterisk-sign">*</span></label>
                                <input type="text" class="form-control" id="skilltitle" placeholder="" name="title" required maxlength="15"/>
                                <input type="hidden" class="form-control" id="job_id" placeholder="" name="job_id" value="{{ ($job)?$job->id:'' }}"/>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="mb-3">
                                <label for="skill_image" class="form-label">Job Icon</label>
                                <input type="file"  accept="image/*" class="form-control" id="skill_image" placeholder="" name="image"/>
                            </div>
                        </div>
                        
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary"  data-bs-dismiss="modal" id="addTaskCloseBtn">Cancel</button>
                    <button type="submit" class="btn btn-danger me-1" id="addskillBtn">Submit</button>
                </div>
        </form>
        </div>
    </div>
</div>

<!-- Add job Details Successfully Modal -->
<div class="modal fade" id="jobSuccessModal" tabindex="-1" aria-labelledby="addJobSuccessModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header">
                <h5 class="modal-title" id="addJobSuccessModalLabel">Success Modal</h5>
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
               <a href="{{ route('superadmin.jobs.index') }}" role="button" class="btn btn-danger">Ok</a>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

<script>

jQuery(function($) {
        $('#addJobskillsForm').validate({
            rules: {
                title: {
                    required: true,
                }
            }
        });
    });

    $('#addJobskillsForm').on('submit', function(e) {
        $("#addskillBtn").attr("disabled", true);
        e.preventDefault();
        if ($(this).valid()) {
            $.ajax({
                url: "{{ route('superadmin.jobs.slill.store') }}",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (res) {
                    if(res.success==true){
                        $('#addjobSkills').modal('hide');
                        $('#success_message').empty();
                        $('#success_message').append("Job skill has been added successfully");
                        $('#jobSuccessModal').modal('show');
                        
                    }
                     $("#addskillBtn").attr("disabled", false);
                }
            });
        }
        else{
             $("#addskillBtn").attr("disabled", false);
        }
    });
    var job = @json($job);
    var jobSkillDatatable = "";
    $(function () {
        jobSkillDatatable = $('#jobSkilltable').DataTable({
            processing: true,
            serverSide: true,
            paging: true,
            pagelength: 10,
            responsive: true,
            bLengthChange: false,
            bFilter: false,
            "bDestroy": true,
            ajax: {
            url: "{{url('admin/jobs/job-skill-show')}}"+"/"+job.id,
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
                {data: 'skill', name: 'skill', orderable: false},
               {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    });  
    var candidatesDatatable = "";
   
    /* All candidate Data Listing */
    $(function () {
        candidatesDatatable = $('.candidates-datatable').DataTable({
            processing: true,
            serverSide: true,
            paging: true,
            pagelength: 10,
            responsive: true,
            bLengthChange: false,
            bFilter: false,
            "bDestroy": true,
            ajax: {
            url: "{{url('admin/jobs/show')}}"+"/"+job.id,
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
                {data: 'created_at', name: 'created_at', orderable: false, searchable: false},
                {data: 'phone', name: 'phone', orderable: false, searchable: false},
                {data: 'email', name: 'email', orderable: false, searchable: false},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    });   
/* Delete Candidate */
    function deleteCandidate(id) {
        $('#deleteCandidateId').val(id);
    }
    $('#deleteCandidate').on('submit', function(e) {
        e.preventDefault();
            $.ajax({
                url: "{{ route('superadmin.candidates.delete') }}",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(res) {
                    if (res.success == true) {
                        $('#deleteCandidateData').modal('hide');
                        $('#success_message').empty();
                        $('#success_message').append("Candidate has been deleted successfully");
                        $('#candidateSuccessModal').modal('show');
                        candidatesDatatable.draw();
                    }
                }
            });
    });
</script>
@endpush