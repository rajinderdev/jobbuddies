@extends('superadmin.layout.master')

@section('main-content-section')
    <div class="container-fluid px-lg-4 mt-4 mt-xl-5">
        <div class="row">
            <div class="col-xl-12 col-md-12">
                <div class="card border-0 shadow">
                    <div class="card-header bg-transparent d-xl-none d-block">
                        <div class="page-title">
                            <h4 class="mb-0 fw-semi">Attendance</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-header">
                            <div class="row">
                                <div class="col-12 col-md-8">
                                    <div class="row align-items-center mb-0 mb-lg-3">
                                        <div class="col-12 col-md-auto">
                                            <label for="addInput" class="form-label mb-md-0">Name</label>
                                        </div>
                                        <div class="col-12 col-md-auto">
                                            <div class="mb-3 mb-lg-0">
                                                <input type="text" class="form-control" placeholder="Candidate Name"
                                                    id="name">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 text-center text-lg-right">
                                    <div class="page-action mb-4">
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#takeAttendanceModal">
                                            <i class="fas fa-plus"></i>
                                            Take Attendance
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <table class="table table-bordered align-middle tb-light"> -->
                        <table class="display responsive nowrap myTable tb-light attendances-datatable" width="100%">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-uppercase">Sr No.</th>
                                    <th class="text-uppercase">Candidate Name</th>
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
    <!--Add Attendance Modal-->
    <div class="modal fade" id="takeAttendanceModal" tabindex="-1"
        aria-labelledby="takeAttendanceModalLabel"aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <h4 class="modal-title text-danger" id="takeAttendanceModalLabel">Add Attendance</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action={{ route('superadmin.attendances.store') }} enctype="multipart/form-data"
                        method="POST">
                        @csrf

                        <div class="row align-items-center mb-3">
                            <div class="col-12">
                                <input type="date" class="form-control" name="date" id="atten_date"
                                    value="@php echo date('Y-m-d'); @endphp">
                            </div>
                        </div>
                        <div id="attendences_div">
                            @foreach ($kids as $key => $kid)
                                <div class="row align-items-center mb-3">
                                    <div class="col-12 col-sm-12 col-lg-4">
                                        <label class="mb-0">{{ $kid->name }}</label>
                                    </div>
                                    <div class="col-12 col-sm-12 col-lg-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio"
                                                name="kids[{{ $key }}][attendance_status]" value="1" {{ ((count($attendances)>0) && array_key_exists($kid->id,$attendances) && $attendances[$kid->id]==1)?'checked':'' }}>
                                            <label class="form-check-label mt-1">
                                                Present
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-lg-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio"
                                                name="kids[{{ $key }}][attendance_status]" value="0" {{ ((count($attendances)>0) && array_key_exists($kid->id,$attendances) && $attendances[$kid->id]===0)?'checked':'' }}>
                                            <label class="form-check-label mt-1">
                                                Absent
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <input class="form-check-input" type="hidden" name="kids[{{ $key }}][id]" value="{{ $kid->id }}">
                            @endforeach
                        </div>

                        <div class="d-flex align-items-center justify-content-center mt-4">
                            <button type="submit" class="btn btn-danger mx-1" id="addKidsBtn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Add Attendance Details Successfully Modal-->
    <div class="modal fade" id="addAttendanceuccessModal" tabindex="-1" aria-labelledby="addAttendanceuccessModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content border-0 shadow-lg">
                <div class="modal-header">
                    <h5 class="modal-title" id="addKidsSuccessModalLabel">Success Modal</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text-center p-lg-5">
                        <div class="mb-3">
                            <i class="far fa-check-circle fa-4x text-success"></i>
                        </div>
                        <h5 class="mb-0">Attendance has been Added successfully</h5>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button> -->
                    <a href="{{ route('superadmin.attendances.index') }}" role="button"
                        class="btn btn-danger">Ok</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $('#atten_date').change(function(){
            var html="";
            var date = $('#atten_date').val();
            $.ajax({
                url: "{{url('admin/attendances/attendancesDateWise')}}"+"/"+date,
                type: "get",
                success: function (res) {
                    $('#attendences_div').empty();
                    $.each(res.kids, function( key, value ){
                        var present = ((res.attendances) && (res.attendances[value.id]==1));
                        var absent = ((res.attendances) && (res.attendances[value.id]==0));
                        html +=`<div class="row align-items-center mb-3">
                                    <div class="col-12 col-sm-12 col-lg-4">
                                        <label>`+value.name+`</label>
                                    </div>
                                    <div class="col-12 col-sm-12 col-lg-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio"
                                                name="kids[`+key+`][attendance_status]" value="1"`;
                                                if(present==true){
                                                    html +=`checked>`;
                                                }
                                                else{
                                                    html +=`>`;  
                                                }
                                                html +=`<label class="form-check-label">
                                                Present
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-lg-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio"
                                                name="kids[`+key+`][attendance_status]" value="0"`;
                                                if(absent==true){
                                                    html +=`checked>`;
                                                }
                                                else{
                                                    html +=`>`;  
                                                }
                                                html +=`<label class="form-check-label">
                                                Absent
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <input class="form-check-input" type="hidden" name="kids[`+key+`][id]" value="`+value.id +`">`;
                    });
                    $('#attendences_div').html(html);
                }
            })
        })
        var attendances_table = '';
        /* All attendances Listing */
        $(function() {
            attendances_table = $('.attendances-datatable').DataTable({
                processing: true,
                serverSide: true,
                paging: true,
                pagelength: 10,
                searching: false,
                "bDestroy": true,
                "lengthChange": false,
                ajax: {
                    url: "{{ route('superadmin.attendances.index') }}",
                    data: function(data) {
                        data.name = $('#name').val();
                        search = data.search.value;
                    },
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
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
            /* name filter*/
            $('#name').keyup(function() {
                attendances_table.draw();
            })
        });
        $('document').ready(function() {
            if ("{{ Session::has('successMessage') }}") {
                $('#addAttendanceuccessModal').modal('show');
            }
        })
    </script>
@endpush
