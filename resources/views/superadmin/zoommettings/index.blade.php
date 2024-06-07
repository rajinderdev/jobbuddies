@extends('superadmin.layout.master')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@section('main-content-section')

<div class="container-fluid px-lg-4 mt-4 mt-xl-5">
    <div class="row">
        <div class="col-xl-12 col-md-12">
            <div class="card border-0 shadow">
                <div class="card-header bg-transparent d-xl-none d-block">
                    <div class="page-title">
                        <h4 class="mb-0 fw-semi">Meetings list</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-header">
                        <div class="row">
                            <div class="col-12 col-md-8">

                            </div>
                            <div class="col-12 col-md-4 text-center text-lg-end">
                                <div class="page-action mb-4">
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#addMeetingsModal">
                                        <i class="fas fa-plus"></i>
                                        Create New Meeting
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <table class="table table-bordered align-middle tb-light"> -->
                    <table id="newtable" class="display responsive nowrap myTable tb-light plans-datatable" width="100%">
                        <thead class="table-light">
                            <tr>
                                <th class="text-uppercase">Sr No.</th>
                                <th class="text-uppercase">Topic</th>
                                <th class="text-uppercase">Date</th>
                                <th class="text-uppercase">Participant</th>
                                <th class="text-uppercase">status</th>
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

<!-- Add Meeting Modal -->
<div class="modal fade" id="addMeetingsModal" tabindex="-1" aria-labelledby="addMeetingsModalLabel" aria-hidden="true">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h4 class="modal-title text-danger" id="addMeetingsModalLabel">Create Zoom Meeting </h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addMeetings" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-lg-6">
                            <div class="mb-3">
                                <label for="edit_assigned_teacher" class="form-label">Assign Interviewer </label>

                                <select class="form-control" name="interviewer" id="edit_assigned_teacher" aria-label="Default select example">
                                    <option value="" id="diseaseNullValue" disabled selected>Select Interviewer</option>
                                    @foreach($interviewers as $interviewer)
                                    <option value="{{ $interviewer->id }}">{{ $interviewer->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-6">
                            <div class="mb-3">
                                <label for="edit_assigned_teacher" class="form-label">Candidate </label>

                                <select class="form-control" name="candidate" id="edit_assigned_teacher" aria-label="Default select example">
                                    <option value="" id="diseaseNullValue" disabled selected>Select Candidate</option>
                                    @foreach($candidates as $candidate)
                                    <option value="{{ $candidate->id }}">{{ $candidate->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-12">
                            <div class="mb-3">
                                <label for="edit_assigned_teacher" class="form-label">Topic </label>
                                <input type="text" class="form-control" name="topic" id="topic" placeholder="" value="">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-6">
                            <div class="mb-3">
                                <label for="edit_assigned_teacher" class="form-label">Start Time</label>
                                <input type="text" class="form-control" name="start_time" id="start_time" placeholder="" value="">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-6">
                            <div class="mb-3">
                                <label for="edit_assigned_teacher" class="form-label">End Time</label>
                                <input type="text" class="form-control" name="end_time" id="end_time" placeholder="" value="">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-6">
                            <div class="mb-3">
                                <label for="edit_assigned_teacher" class="form-label">Duration</label>
                                <input type="text" class="form-control" name="duration" id="duration" placeholder="" value="" readonly>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-6">
                            <div class="mb-3">
                                <label for="edit_assigned_teacher" class="form-label">Password </label>
                                <input type="password" class="form-control" name="meeting_password" id="meeting_password" placeholder="" value="">
                            </div>
                        </div>


                    </div>
                </div>
                <div class=" modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="addplanCloseBtn">Cancel</button>
                    <button type="submit" class="btn btn-danger me-1" id="addSkillBtn">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit plan Modal -->
<div class=" modal fade" id="editSkillsModal" tabindex="-1" aria-labelledby="editSkillsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h4 class="modal-title text-danger" id="addMeetingsModalLabel">Edit Plan</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editSkills" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-lg-12">
                            <div class="mb-3">
                                <label for="name" class="form-label">Plan Name <span class="asterisk-sign">*</span></label>
                                <input type="text" class="form-control" id="name" placeholder="" name="name" value="" required>
                                <input type="hidden" class="form-control" id="id" placeholder="" name="id" value="">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="mb-3">
                                <label for="ticketName" class="form-label">Total Interviews<span class="asterisk-sign">*</span></label>
                                <input type="number" class="form-control" id="interviews" placeholder="0" name="interviews" />
                            </div>
                        </div>

                        <div class="col-12 col-lg-6">
                            <div class="mb-3">
                                <label for="ticketName" class="form-label">Plan Price<span class="asterisk-sign">*</span></label>
                                <input type="text" class="form-control" id="price" placeholder="0.00" name="price" />
                            </div>
                        </div>

                        <div class="col-12 col-lg-6">
                            <div class="mb-3">
                                <label for="chooseFile" class="form-label">Plan Duration<span class="asterisk-sign">*</span></label>
                                <input type="number" class="form-control" id="duration" placeholder="0" name="duration" />
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="mb-3">
                                <label for="chooseFile" class="form-label">Duration Type<span class="asterisk-sign">*</span></label>
                                <select class="form-control" name="plan_type" id="plan_type">
                                    <option value="day">Day</option>
                                    <option value="month">Month</option>
                                    <option value="year">Year</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-lg-12">
                            <div class="mb-3">
                                <label for="Description" class="form-label">Plan Description</label>
                                <textarea class="form-control" id="description" placeholder="Enter the Description" rows="5" name="description"></textarea>
                            </div>
                        </div>

                        <div class=" col-12 col-lg-12">
                            <div class="mb-3 all_features">
                                <label for="features" class="form-label">Plan Features<span class="asterisk-sign">*</span></label>
                                <div class="d-flex errorspecific">
                                    <input type="text" class="form-control" name="features[0]" placeholder="" maxlength="70" required />
                                    <button type="button" class="btn btn-success add_features ml-2" id="add_features">+
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="editplanCloseBtn">Cancel</button>
                    <button type="submit" class="btn btn-danger me-1" id="editSkillBtn">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add Skill Details Successfully Modal -->
<div class="modal fade" id="planSuccessModal" tabindex="-1" aria-labelledby="addSkillSuccessModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header">
                <h5 class="modal-title" id="addSkillSuccessModalLabel">Success Modal</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
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
                <a href="{{ route('superadmin.plans.index') }}" role="button" class="btn btn-danger">Ok</a>
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
<script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script>
    $('#start_time').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        timePicker: true,
        timePicker24Hour: true,
        timePickerIncrement: 1,
        locale: {
            format: 'DD/MM/YYYY HH:mm'
        }
    }, calculateDuration);

    $('#end_time').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        timePicker: true,
        timePicker24Hour: true,
        timePickerIncrement: 1,
        locale: {
            format: 'DD/MM/YYYY HH:mm'
        }
    }, calculateDuration);

    function calculateDuration() {

        console.log("change....");
        const startTime = $('#start_time').data('daterangepicker').startDate;
        const endTime = $('#end_time').data('daterangepicker').startDate;

        if (startTime && endTime) {
            const durationMs = endTime.diff(startTime);

            if (durationMs >= 0) {
                const durationHours = Math.floor(durationMs / (1000 * 60 * 60));
                const durationMinutes = Math.floor((durationMs % (1000 * 60 * 60)) / (1000 * 60));
                $('#duration').val(durationHours + ' ' + durationMinutes);
            } else {
                $('#duration').val('End time must be after start time');
            }
        }
    }
    var plans_table = '';
    // All plans Listing
    $(function() {
        plans_table = $('.plans-datatable').DataTable({
            processing: true,
            serverSide: true,
            paging: true,
            pagelength: 10,
            "bDestroy": true,
            select: true,
            ajax: {
                url: "{{ route('superadmin.plans.index') }}",
            },
            columns: [{
                    name: 'id',
                    data: null,
                    orderable: false,
                    render: function(data, type, full, meta) {
                        return data.DT_RowIndex;
                    }
                },
                {
                    data: 'name',
                    name: 'name',
                    orderable: false
                },
                {
                    data: 'price',
                    name: 'price',
                    orderable: false
                },
                {
                    data: 'duration',
                    name: 'duration',
                    orderable: false
                },
                {
                    data: 'interviews',
                    name: 'interviews',
                    orderable: false
                },
                // {
                //     data: 'features',
                //     name: 'features',
                //     orderable: false
                // },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });
    });

    // Add More Features

    var featureKey = 0;
    $("body").on("click", "#add_features", function() {
        featureKey = parseInt(featureKey) + parseInt(1);
        $(".all_features").append(
            '<div class="d-flex appendid_list mt-3"><input type="text" class="form-control"  name="features[' + featureKey + ']" placeholder="" maxlength="70"><button type="button" class="btn btn-danger remove_feature ml-2">-</button></div>'
        );
    });
    $("body").on("click", ".remove_feature", function() {
        $(this).parent().remove();
    });
    // Add meetings 
    jQuery(function($) {
        $('#addMeetings').validate({
            rules: {
                topic: {
                    required: true,
                },
                start_date: {
                    required: true,
                },
                end_date: {
                    required: true,
                },
                duration: {
                    required: true,
                },
                interviewer: {
                    required: true,
                },
                candidate: {
                    required: true,
                },
                meeting_password: {
                    required: true,
                },
            }
        });
    });
    $('#addMeetings').on('submit', function(e) {
        e.preventDefault();
        if ($(this).valid()) {
            $.ajax({
                url: "{{ route('superadmin.meetings.store') }}",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(res) {
                    if (res.success == true) {
                        $('#addMeetingsModal').modal('hide');
                        $('#success_message').empty();
                        $('#success_message').append("Plan has been added successfully");
                        $('#planSuccessModal').modal('show');
                        plans_table.draw();
                    }
                }
            });
        }
    });

    $("#addplanCloseBtn").click(function() {
        $('#plannameInput-error').remove();
    })

    /* Edit Skills */
    function editSkill(id) {

        $.ajax({
            url: "{{url('admin/plans/edit')}}" + "/" + id,
            type: "get",
            success: function(res) {
                if (res.success == true) {
                    $("#id").val(id);
                    $("#name").val(res.response.name);
                    $("#description").val(res.response.description);
                    $("#duration").val(res.response.duration);
                    $("#plan_type").val(res.response.plan_type);
                    $("#price").val(res.response.price);
                    $("#interviews").val(res.response.interviews);
                    $('input[name="features[0]"]').val(res.response.features[0].name);
                    loadFeatures(res.response.features);
                    $('#editSkillsModal').modal("show");

                }
            }
        });

    }

    function loadFeatures(features) {
        for (var i = 1; i < features.length; i++) {
            var feature = features[i];
            var existingFeatureInput = `
                <div class="d-flex mb-2 feature-input">
                    <input type="text" class="form-control" name="features[]" value="${feature.name}" placeholder="" maxlength="70" required />
                    <button type="button" class="btn btn-danger remove_features ml-2">-</button>
                </div>`;
            $('.all_features').append(existingFeatureInput);
        }
    }
    jQuery(function($) {
        $('#editSkills').validate({
            rules: {
                name: {
                    required: true,
                },
            }
        });
    });
    $('#editSkills').on('submit', function(e) {
        e.preventDefault();
        if ($(this).valid()) {
            $.ajax({
                url: "{{ route('superadmin.plans.update') }}",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(res) {
                    if (res.success == true) {
                        $('#editSkillsModal').modal('hide');
                        $('#success_message').empty();
                        $('#success_message').append("Plan has been updated successfully");
                        $('#planSuccessModal').modal('show');
                        plans_table.draw();
                    }
                }
            });
        }
    });

    $("#editplanCloseBtn").click(function() {
        $('#name-error').remove();
    })

    function deleteSkill(id) {
        $('#deleteSkillId').val(id);
    }
    $('#deleteSkill').on('submit', function(e) {
        e.preventDefault();
        if ($(this).valid()) {
            $.ajax({
                url: "{{  route('superadmin.plans.delete') }}",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(res) {
                    if (res.success == true) {
                        $('#deleteSkillData').modal('hide');
                        plans_table.draw();

                    }
                }
            });
        }
    });
</script>
@endpush