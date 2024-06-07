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
                                <th class="text-uppercase">Assessment</th>
                                <th class="text-uppercase">Remark</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="card-body">
                    <form action={{ route('superadmin.assessments.update') }} enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="remraks">
                                    <h6>Summary Notes:</h6>
                                    <textarea class="form-control"rows="5" name="summary" required>{{ $kid->summary }}</textarea>
                                    <input type="hidden" name="id" value="{{ $kid->id }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-center text-lg-right">
                                <div class="remraks">
                                    <button type="submit" class="btn btn-danger mt-3 mr-2" id="addTaskBtn">Add</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <div class="row justify-content-between">
                        <div class="col-6 col-md-2">
                            <div class="mb-2">
                                <span>{{ $kid->guardian_name }}</span>
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
                {data: 'assessments', name: 'assessments', orderable: false, searchable: false},
                {data: 'remarks', name: 'remarks', orderable: false, searchable: false}
            ]
        });
    });
       
</script>
@endpush