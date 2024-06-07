@extends('superadmin.layout.master')

@section('main-content-section')

    <div class="container-fluid px-lg-4 mt-4 mt-xl-5">
        <div class="row">
            <div class="col-xl-12 col-md-12">
                <div class="card border-0 shadow">
                    <div class="card-header bg-transparent d-xl-none d-block">
                        <div class="page-title">
                            <h4 class="mb-0 fw-semi">Types</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-header">
                            <div class="row">
                                <div class="col-12 col-md-8">

                                </div>
                                <div class="col-12 col-md-4 text-center text-lg-end">
                                    <div class="page-action mb-4">
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#addSkillsModal">
                                            <i class="fas fa-plus"></i>
                                            Add Type
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <table class="table table-bordered align-middle tb-light"> -->
                        <table id="newtable" class="display responsive nowrap myTable tb-light skills-datatable" width="100%">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-uppercase">Sr No.</th>
                                    <th class="text-uppercase">Type Name</th>
                                    <th class="text-uppercase">Goal Associated</th>
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

<!-- Add skill Modal -->
<div class="modal fade" id="addSkillsModal" tabindex="-1" aria-labelledby="addSkillsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h4 class="modal-title text-danger" id="addSkillsModalLabel">Add Type</h4>
                <button type="button" class="close"  data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addSkills" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="modal-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-lg-12">
                                <div class="mb-3">
                                    <label for="skillnameInput" class="form-label">Type Name <span class="asterisk-sign">*</span></label>
                                    <input type="text" class="form-control" id="skillnameInput" placeholder="" name="skill_name" value="">
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary"  data-bs-dismiss="modal" id="addskillCloseBtn">Cancel</button>
                    <button type="submit" class="btn btn-danger me-1" id="addSkillBtn">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit skill Modal -->
<div class=" modal fade" id="editSkillsModal" tabindex="-1" aria-labelledby="editSkillsModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h4 class="modal-title text-danger" id="addSkillsModalLabel">Edit Type</h4>
                <button type="button" class="close"  data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editSkills" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-lg-12">
                            <div class="mb-3">
                                <label for="skill_name" class="form-label">Type Name <span class="asterisk-sign">*</span></label>
                                <input type="text" class="form-control" id="skill_name" placeholder="" name="skill_name" value="" required>
                                <input type="hidden" class="form-control" id="id" placeholder="" name="id"
                                    value="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary"  data-bs-dismiss="modal" id="editskillCloseBtn">Cancel</button>
                    <button type="submit" class="btn btn-danger me-1" id="editSkillBtn">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add Skill Details Successfully Modal -->
<div class="modal fade" id="skillSuccessModal" tabindex="-1" aria-labelledby="addSkillSuccessModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header">
                <h5 class="modal-title" id="addSkillSuccessModalLabel">Success Modal</h5>
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
                <a href="{{ route('superadmin.skills.index') }}" role="button" class="btn btn-danger">Ok</a>
            </div>
        </div>
    </div>
</div>
<!-- Delete Skill Modal -->
    <div class="modal fade" id="deleteSkillData" tabindex="-1" aria-hidden="true">
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
                <form id="deleteSkill" enctype="multipart/form-data" method="POST">
                    @csrf
                    <input type="hidden" value="" id="deleteSkillId" name="id">
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
<script>
    var skills_table = '';
    // All skills Listing
    $(function () {
        skills_table = $('.skills-datatable').DataTable({
            processing: true,
            serverSide: true,
            paging: true,
            pagelength: 10,
            "bDestroy": true,
            select: true,
            ajax: {
            url: "{{ route('superadmin.skills.index') }}",
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
                {data: 'associated_task', name: 'associated_task', orderable: false},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    });
// Add skills 
    jQuery(function($) {
        $('#addSkills').validate({
            rules: {
                skill_name: {
                    required: true,
                },
            }
        });
    });
    $('#addSkills').on('submit', function(e) {
        e.preventDefault();
        if ($(this).valid()) {
            $.ajax({
                url: "{{ route('superadmin.skills.store') }}",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (res) {
                    if(res.success==true){
                        $('#addSkillsModal').modal('hide');
                        $('#success_message').empty();
                        $('#success_message').append("Type has been added successfully");
                        $('#skillSuccessModal').modal('show');
                        skills_table.draw();
                    }
                }
            });
        }
    });
            
    $("#addskillCloseBtn").click(function(){
        $('#skillnameInput-error').remove();
    })

    /* Edit Skills */
    function editSkill(id){
        
        $.ajax({
            url: "{{url('admin/skills/edit')}}"+"/"+id,
            type: "get",
            success: function (res) {
                if(res.success==true){
                    $("#id").val(id);
                    $("#skill_name").val(res.response.skill_name);
                    $('#editSkillsModal').modal("show");
                }
            }
        });
        
    }
    jQuery(function($) {
        $('#editSkills').validate({
            rules: {
                skill_name: {
                    required: true,
                },
            }
        });
    });
    $('#editSkills').on('submit', function(e) {
        e.preventDefault();
        if ($(this).valid()) {
            $.ajax({
                url: "{{ route('superadmin.skills.update') }}",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (res) {
                    if(res.success==true){
                        $('#editSkillsModal').modal('hide');
                        $('#success_message').empty();
                        $('#success_message').append("Type has been updated successfully");
                        $('#skillSuccessModal').modal('show');
                        skills_table.draw();
                    }
                }
            });
        }
    });
            
    $("#editskillCloseBtn").click(function(){
        $('#skill_name-error').remove();
    })

   function deleteSkill(id) {
            $('#deleteSkillId').val(id);
}
 $('#deleteSkill').on('submit', function(e) {
    e.preventDefault();
    if ($(this).valid()) {
        $.ajax({
            url: "{{  route('superadmin.skills.delete') }}",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(res) {
                if (res.success == true) {
                        $('#deleteSkillData').modal('hide');
                        skills_table.draw();
                    
                }
            }
        });
    }
});
</script>
@endpush