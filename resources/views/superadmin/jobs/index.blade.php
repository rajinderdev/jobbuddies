@extends('superadmin.layout.master')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
@section('main-content-section')
<div class="container-fluid px-lg-4 mt-4 mt-xl-5">
    <div class="row">
        <div class="col-xl-12 col-md-12">
            <div class="card border-0 shadow mb-3">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-12 col-lg-4">
                            <h5 class="fw-semi mb-lg-0">Jobs</h5>
                        </div>
                        <div class="col-12 col-lg-8 text-lg-end">
                            <div class="row g-2 align-items-center justify-content-end">
                                <div class="col-auto">
                                   <button class="btn btn-success text-nowrap ms-sm-3 mt-3 mt-sm-0" data-bs-toggle="modal" data-bs-target="#addjob">
                                        Add Job
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="jobsTable" class="display responsive nowrap myTable tb-light" width="100%">
                        <thead class="table-light">
                            <tr>
                                <th class="text-uppercase">Sr No.</th>
                                <th class="text-uppercase">Job Title</th>
                                <th class="text-uppercase">Job Location</th>
                                <th class="text-uppercase">Job Contract</th>
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
 <!-- Add Job Modal -->
 <div class="modal fade" id="addjob" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h4 class="modal-title text-danger">Add Job</h4>
                <button type="button" class="close"  data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addJobsForm" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="mb-3">
                                <label for="Quantity" class="form-label">Job Title<span class="asterisk-sign">*</span></label>
                                <input type="text" class="form-control" id="jobtitle" placeholder="" name="title" required maxlength="15"/>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="mb-3">
                                <label for="Quantity" class="form-label">Job Icon<span class="asterisk-sign">*</span></label>
                                <input type="file"  accept="image/*" class="form-control" id="job_icon" placeholder="" name="job_icon" required/>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="mb-3">
                                <label for="ticketName" class="form-label">Job Location</label>
                                <input type="text" class="form-control" id="joblocation" placeholder="" name="location"/>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="mb-3">
                                <label for="chooseFile" class="form-label">Job Contract</label>
                                <input type="text" class="form-control" id="jobcontract" placeholder="" name="contract" />
                            </div>
                        </div>
                        <div class="col-12 col-lg-12">
                            <div class="mb-3">
                                <label for="Description" class="form-label">Job Description</label>
                                <textarea class="form-control" id="content" placeholder="Enter the Description" rows="5" name="description""></textarea>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary"  data-bs-dismiss="modal" id="addTaskCloseBtn">Cancel</button>
                    <button type="submit" class="btn btn-danger me-1" id="addTaskBtn">Submit</button>
                </div>
        </form>
        </div>
    </div>
</div>
<!-- Add Job Modal -->


<!-- Edit Job Modal -->
<div class="modal fade" id="editjob" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h4 class="modal-title text-danger">Edit Job</h4>
                <button type="button" class="close"  data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editJobsForm" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-lg-12">
                            <div class="mb-3">
                                <label for="Quantity" class="form-label">Job Title<span class="asterisk-sign">*</span></label>
                                <input type="text" class="form-control" id="editTitle" placeholder="" name="title"  value="" required/>
                                <input type="hidden" class="form-control" id="id" placeholder="" name="id"  value=""/>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="mb-3">
                                <label for="ticketName" class="form-label">Job Location</label>
                                <input type="text" class="form-control" id="editLocation" name="location" placeholder="" value=""/>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="mb-3">
                                <label for="Quantity" class="form-label">Job Contract</label>
                                <input type="text" class="form-control"  placeholder="" id="editContract" name="contract"  value=""/>
                            </div>
                        </div>
                        <div class="col-12 col-lg-12">
                            <div class="mb-3">
                                <label for="Description" class="form-label">Description</label>
                                 <textarea class="form-control" id="editDescription" placeholder="Enter the Description" rows="15" name="description" style="height:150px;"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-danger me-1" id="addTaskBtn">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Edit Job Modal -->
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
  <!-- Delete job Modal -->
  <div class="modal fade" id="deleteJobData" tabindex="-1" aria-hidden="true">
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
            <form id="deleteJob" enctype="multipart/form-data" method="POST">
                @csrf
                <div id="Ticket-SponsorshipId"></div>
                <input type="hidden" value="" id="deleteJobId" name="id">
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger me-1">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script>
    ClassicEditor.create( document.querySelector( '#content' ) )
        .catch( error => {
            console.error( error );
        } );
     ClassicEditor.create( document.querySelector( '#editDescription' ) )
    .then( newEditor => {
        editor = newEditor;
    } )
        .catch( error => {
            console.error( error );
        } );
</script>
<script>

var jobsTable = '';
/* All jobs Listing */
$(function () {
    jobsTable = $('#jobsTable').DataTable({
        processing: true,
        serverSide: true,
        paging: true,
        pagelength: 10,
        "bDestroy": true,
        select: true,
        ajax: {
        url: "{{ route('superadmin.jobs.index') }}",
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
            {data: 'title', name: 'title', orderable: false},
            {data: 'location', name: 'location', orderable: false},
            {data: 'contract', name: 'contract', orderable: false},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
});
 /* Add tasks */
 jQuery(function($) {
        $('#addJobsForm').validate({
            rules: {
                title: {
                    required: true,
                },
                job_icon: {
                    required: true,
                },
            }
        });
    });
 
    $('#addJobsForm').on('submit', function(e) {
        $("#addTaskBtn").attr("disabled", true);
        e.preventDefault();
        if ($(this).valid()) {
            $.ajax({
                url: "{{ route('superadmin.jobs.store') }}",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (res) {
                    if(res.success==true){
                        $('#addjob').modal('hide');
                        $('#success_message').empty();
                        $('#success_message').append("Job has been added successfully");
                        $('#jobSuccessModal').modal('show');
                        jobsTable.draw();
                    }
                     $("#addTaskBtn").attr("disabled", false);
                }
            });
        }
        else{
             $("#addTaskBtn").attr("disabled", false);
        }
    });
     /* EditTask */
     function editJob(id){
        $.ajax({
            url: "{{url('admin/jobs/edit')}}"+"/"+id,
            type: "get",
            success: function (res) {
                if(res.success==true){
                    $("#id").val(id);
                    $("#editTitle").val(res.response.title);
                    $("#editLocation").val(res.response.location);
                    $("#editContract").val(res.response.contract);
                    // $("#editDescription").val(res.response.description);
                    editor.setData(res.response.description);
                    $("#editjob").modal('show');
                }
            }
        });
    }
    // jQuery(function($) {
    //     $('#editJobsForm').validate({
    //         ignore: [], 
    //         rules: {
    //             title: {
    //                 required: true,
    //             }
    //         }
    //     });
    // });
    $('#editJobsForm').on('submit', function(e) {
        e.preventDefault();
        // if ($(this).valid()) {
            $.ajax({
                url: "{{ route('superadmin.jobs.update') }}",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (res) {
                    if(res.success==true){
                        $('#editjob').modal('hide');
                        $('#success_message').empty();
                        $('#success_message').append("Job has been updated successfully");
                        $('#jobSuccessModal').modal('show');
                        jobsTable.draw();
                    }
                }
            });
        // }
    });
     /* Delete job */
    function deleteJob(id) {
            $('#deleteJobId').val(id);
    }
    $('#deleteJob').on('submit', function(e) {
        e.preventDefault();
        if ($(this).valid()) {
            $.ajax({
                url: "{{ route('superadmin.jobs.delete') }}",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(res) {
                    if (res.success == true) {
                        $('#deleteJobData').modal('hide');
                        $('#success_message').empty();
                        $('#success_message').append("Job has been deleted successfully");
                        $('#jobSuccessModal').modal('show');
                        jobsTable.draw();
                    }
                }
            });
        }
    });
  
</script>
@endpush
