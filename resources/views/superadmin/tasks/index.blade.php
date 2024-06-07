@extends('superadmin.layout.master')

@section('main-content-section')
<div class="container-fluid px-lg-4 mt-4 mt-xl-5">
    <div class="row">
        <div class="col-xl-12 col-md-12">
            <div class="card border-0 shadow">
                <div class="card-header bg-transparent d-xl-none d-block">
                    <div class="page-title">
                        <h4 class="mb-0 fw-semi">Goals</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-header">
                        <div class="row">
                            <div class="col-12 col-md-8">
                                <div class="row g-2 align-items-center mb-4">
                                    <div class="col-12 col-md-auto">
                                        <label for="inputPassword6" class="col-form-label">Filter by Type</label>
                                    </div>
                                    <div class="col-12 col-md-auto">
                                        <select class="form-control" aria-label="Default select example" name="skill_id" id="skillIdfilter">
                                            <option value="" disabled selected>Choose Type</option>
                                            <option value="All">All</option>
                                            @foreach($skills as $skill)
                                                <option value="{{ $skill->id }}">{{ $skill->skill_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 text-right">
                                <div class="page-action mb-4">
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#addTaskModal">
                                        <i class="fas fa-plus"></i>
                                        Add Goal
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <table class="table table-bordered align-middle tb-light"> -->
                    <table id="newtable" class="display responsive nowrap myTable tb-light task-datatable" width="100%">
                        <thead class="table-light">
                            <tr>
                                <th class="text-uppercase">Sr No.</th>
                                <th class="text-uppercase">Type Name</th>
                                <th class="text-uppercase">Goal Name</th>
                                <th class="text-uppercase">No. of Candidates</th>
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
  <!--Add Task Modal-->
  <div class="modal fade" id="addTaskModal" tabindex="-1" aria-labelledby="addTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h4 class="modal-title text-danger" id="addTaskModalLabel">Add Goal</h4>
                <button type="button" class="close"  data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addTasks" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-lg-12">
                            <div class="mb-3">
                                <label for="chooseskillInput" class="form-label">Choose Type <span class="asterisk-sign">*</span>
                                </label>
                                <select class="form-control" aria-label="Default select example" name="skill_id" id="chooseskillInput">
                                    <option selected disabled>Choose Type</option>
                                    @foreach($skills as $skill)
                                        <option value="{{ $skill->id }}">{{ $skill->skill_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="taskNameInput" class="form-label">Goal Name</label>
                                <input type="text" class="form-control" id="taskNameInput" placeholder="" name="task_name" value="">
                            </div>
                            <div class="mb-3">
                                <label for="select2MultipleKids" class="form-label">Choose Candidates <span class="asterisk-sign">*</span></label>
                                <select class="form-control select2-multiple w-100" name="kids[]" multiple="multiple" id="select2MultipleKids" required>
                                    <option value="all">All</option>
                                    @foreach($kids as $kid)
                                        <option value="{{ $kid->id }}">{{ $kid->name }}</option>
                                    @endforeach
                                </select>
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
  <!--Edit Task Modal-->
  <div class="modal fade" id="editTaskModal" tabindex="-1" aria-labelledby="editTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h4 class="modal-title text-danger" id="editTaskModalLabel">Edit Goal</h4>
                <button type="button" class="close"  data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editTasks" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-lg-12">
                            <div class="mb-3">
                                <label for="chooseEditSkillInput" class="form-label">Choose Type <span class="asterisk-sign">*</span>
                                </label>
                                <select class="form-control" aria-label="Default select example" name="skill_id" id="chooseEditSkillInput">
                                    <option selected disabled>Choose Type</option>
                                    @foreach($skills as $skill)
                                        <option value="{{ $skill->id }}">{{ $skill->skill_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="editTaskNameInput" class="form-label">Goal Name</label>
                                <input type="text" class="form-control" id="editTaskNameInput" placeholder="" name="task_name" value="">
                                <input type="hidden" class="form-control" id="id" placeholder="" name="id" value="">
                            </div>
                            <div class="mb-3">
                                <label for="editselect2MultipleKids" class="form-label">Choose Candidates <span class="asterisk-sign">*</span></label>
                                <select class="form-control select2-multiple w-100" name="kids[]" multiple="multiple" id="editselect2MultipleKids" required>
                                    <option value="all">All</option>
                                    @foreach($kids as $kid)
                                        <option value="{{ $kid->id }}">{{ $kid->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary"  data-bs-dismiss="modal" id="editTaskCloseBtn">Cancel</button>
                    <button type="submit" class="btn btn-danger me-1" id="editTaskBtn">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add task Details Successfully Modal -->
<div class="modal fade" id="taskSuccessModal" tabindex="-1" aria-labelledby="addTaskSuccessModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header">
                <h5 class="modal-title" id="addTaskSuccessModalLabel">Success Modal</h5>
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
                <a href="{{ route('superadmin.tasks.index') }}" role="button" class="btn btn-danger">Ok</a>
            </div>
        </div>
    </div>
</div>
<!-- Delete Task Modal -->
    <div class="modal fade" id="deleteTaskData" tabindex="-1" aria-hidden="true">
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
                <form id="deleteTask" enctype="multipart/form-data" method="POST">
                    @csrf
                    <input type="hidden" value="" id="deleteTaskId" name="id">
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
     $(document).ready(function() {
            let chartDataScore =[];
            let chartDataName =[];
            /* Select2 Multiple */
            $('.select2-multiple').select2({
                placeholder: "Select Candidates",
                allowClear: true
            });

        });
    var tasks_table = '';
    /* All tasks Listing */
    $(function () {
        tasks_table = $('.task-datatable').DataTable({
            processing: true,
            serverSide: true,
            paging: true,
            pagelength: 10,
            "bDestroy": true,
            ajax: {
            url: "{{ route('superadmin.tasks.index') }}",
            data: function(data) {
                data.skill_id = $('#skillIdfilter').val();
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
                {data: 'skill_name', name: 'skill_name', orderable: false},
                {data: 'task_name', name: 'task_name', orderable: false},
                {data: 'total_students', name: 'total_students', orderable: false},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    });
     /* Skill filter*/
    $(document).ready(function () {
        $("#skillIdfilter").change(function(){
            tasks_table.draw();
        })
    });
    
    /* Add tasks */
    jQuery(function($) {
        $('#addTasks').validate({
            ignore: [], 
            rules: {
                skill_id: {
                    required: true,
                },
                kids: {
                    required: true,
                }
            }
        });
    });
    $('#addTasks').on('submit', function(e) {
        
        $('#addTaskBtn').prop('disabled', true);
        e.preventDefault();
        if ($(this).valid()) {
            $.ajax({
                url: "{{ route('superadmin.tasks.store') }}",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (res) {
                    if(res.success==true){
                        $('#addTaskModal').modal('hide');
                        $('#success_message').empty();
                        $('#success_message').append("Goal has been added successfully");
                        $('#taskSuccessModal').modal('show');
                        tasks_table.draw();
                    }
                }
            });
        }
        else{
             $('#addTaskBtn').prop('disabled', false);
        }
    });
            
    $("#addTaskCloseBtn").click(function(){
        $('#taskNameInput-error').remove();
        $('#chooseskillInput-error').remove();
        $('#select2MultipleKids-error').remove();
    })

    /* EditTask */
    function editTask(id){
        $.ajax({
            url: "{{url('admin/tasks/edit')}}"+"/"+id,
            type: "get",
            success: function (res) {
                if(res.success==true){
                    console.log(res.response.kids)
                    $("#id").val(id);
                    $("#editTaskNameInput").val(res.response.task.task_name);
                    $("#chooseEditSkillInput").val(res.response.task.skill_id);
                    $("#editselect2MultipleKids").val(res.response.kids).trigger('change');
                    $('#editTaskModal').modal("show");
                }
            }
        });
    }
    jQuery(function($) {
        $('#editTasks').validate({
            ignore: [], 
            rules: {
                skill_id: {
                    required: true,
                },
                kids: {
                    required: true,
                }
            }
        });
    });
    $('#editTasks').on('submit', function(e) {
        e.preventDefault();
        if ($(this).valid()) {
            $.ajax({
                url: "{{ route('superadmin.tasks.update') }}",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (res) {
                    if(res.success==true){
                        $('#editTaskModal').modal('hide');
                        $('#success_message').empty();
                        $('#success_message').append("Goal has been updated successfully");
                        $('#taskSuccessModal').modal('show');
                        tasks_table.draw();
                    }
                }
            });
        }
    });
            
    $("#editskillCloseBtn").click(function(){
        $('#editTaskNameInput-error').remove();
        $('#chooseEditSkillInput-error').remove();
        $('#editselect2MultipleKids-error').remove();
    })

function deleteTask(id) {
    $('#deleteTaskId').val(id);
}
$('#deleteTask').on('submit', function(e) {
    e.preventDefault();
    if ($(this).valid()) {
        $.ajax({
            url: "{{  route('superadmin.tasks.delete') }}",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(res) {
                if (res.success == true) {
                        $('#deleteTaskData').modal('hide');
                        tasks_table.draw();
                    
                }
            }
        });
    }
});
</script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>

//     var options = {
//     series: [{
//         name: "Score",
//         data: chartDataScore
//     }],
//     chart: {
//       type: 'bar',
//       height: 400,

//        toolbar: {
//               show: false
//             },
//     },
//     plotOptions: {
//       bar: {
//         borderRadius: 4,
//         horizontal: false,
//         columnWidth: '20%',
//       }
//     },
//     dataLabels: {
//       enabled: false
//     },
//     xaxis: {
//       categories: chartDataName,
//     },
//     yaxis: {
//       min: 10, // Set the minimum value on Y-axis
//       max: 100, // Set the maximum value on Y-axis
//       tickAmount: 9,
//     }
//   };

//   var chart = new ApexCharts(document.querySelector("#chart"), options);
//   chart.render();


 function getChartData(id){
        $.ajax({
            url: "{{url('admin/tasks/chart-data')}}"+"/"+id,
            type: "get",
            success: function (res) {
                if(res.success==true){
                    var options = {
                    series: [
                    {
                        name: "Score",
                        data: res.response.chartDataScore
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
                    categories: res.response.chartDataName,
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
                    
                $('#chartmodal').modal('show');
                }
            }
        });
    }
</script>
@endpush
