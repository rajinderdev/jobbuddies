@extends('superadmin.layout.master')

@section('main-content-section')

<!-- content area start -->
<div class="container-fluid px-lg-4 mt-4 mt-xl-5">
    <div class="row mb-3">
        <div class="col-xl-12 col-md-12">
            <a href="{{ route('superadmin.attendances.index') }}" role="button" class="btn btn-secondary">
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
                        <h4 class="mb-0 fw-semi">Attendance Report</h4>
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
                                        {{ $kid->name }}
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
                                        {{date('Y') }}
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-4">
                            <div class="row">
                                <div class="col-5">
                                    <h6 class="fw-bold my-3">
                                        No. of Presents
                                    </h6>
                                </div>
                                <div class="col-2">
                                    <h6 class="my-3">
                                        :
                                    </h6>
                                </div>
                                <div class="col-5">
                                    <h6 class="text-start my-3">
                                        {{ $kid->present_attendances_count }}
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-4">
                            <div class="row">
                                <div class="col-5">
                                    <h6 class="fw-bold my-3">
                                        No. of Absents
                                    </h6>
                                </div>
                                <div class="col-2">
                                    <h6 class="my-3">
                                        :
                                    </h6>
                                </div>
                                <div class="col-5">
                                    <h6 class="text-start my-3">
                                        {{ $kid->absent_attendances_count }}
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
                    <div class="row align-items-center">
                        <div class="col-6 col-md-8">
                            <h5 class="mb-0 fw-semi mb-0">Attendance Report</h5>
                        </div>
                        <div class="col-6 col-md-4 text-center text-lg-end">
                            <div class="row g-2 align-items-center justify-content-end">
                                <!-- <div class="col-12 col-md-auto">
                                    <label for="addInput" class="form-label mb-md-0">Month</label>
                                </div>
                                <div class="col-12 col-md-auto">
                                    <select class="form-select form-select-sm">
                                        <option value="0" selected>May</option>
                                        <option value="a">April</option>
                                        <option value="b">March</option>
                                    </select>
                                </div> -->
                                <div class="col-auto">
                                    <label for="addInput" class="form-label mb-0">Period</label>
                                </div>
                                <div class="col-auto">
                                    <select class="form-control form-control-sm"  name="year" id="year" onchange="location = this.value;">
                                        @for($selectedyear=$currentYear; $selectedyear>=2020; $selectedyear--)
                                            <option value="{{ route('superadmin.attendances.show', ['id' => $kid->id, 'year'=>$selectedyear])}}"  {{ ($year==$selectedyear)?'selected':'' }}>{{ $selectedyear }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-auto">
                                    <a href="{{  route('superadmin.attendances.generateAttendencesPDF',$kid->id) }}" role="button"class="btn btn-sm btn-light border">
                                        <i class="fa fa-download"></i></a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <!-- <div class="table-header">
                        <div class="row align-items-center">
                            <div class="col-8 col-md-8">
                                <h5 class="mb-0 fw-semi mb-4">Assessment Data</h5>
                            </div>
                            <div class="col-4 col-md-4 text-center text-lg-end">

                            </div>
                        </div>
                    </div> -->
                    <!-- <table class="table table-bordered align-middle tb-light"> -->

                    <div class="table-responsive">
                        <table class="table bs-table table-striped table-bordered text-nowrap">
                            <thead>
                                <tr>
                                    <th class="text-left">Months</th>
                                    <th>1</th>
                                    <th>2</th>
                                    <th>3</th>
                                    <th>4</th>
                                    <th>5</th>
                                    <th>6</th>
                                    <th>7</th>
                                    <th>8</th>
                                    <th>9</th>
                                    <th>10</th>
                                    <th>11</th>
                                    <th>12</th>
                                    <th>13</th>
                                    <th>14</th>
                                    <th>15</th>
                                    <th>16</th>
                                    <th>17</th>
                                    <th>18</th>
                                    <th>19</th>
                                    <th>20</th>
                                    <th>21</th>
                                    <th>22</th>
                                    <th>23</th>
                                    <th>24</th>
                                    <th>25</th>
                                    <th>26</th>
                                    <th>27</th>
                                    <th>28</th>
                                    <th>29</th>
                                    <th>30</th>
                                    <th>31</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                @foreach($attendances as $attendance)
                                <tr>
                                    <td class="text-left">{{ $attendance['month'] }}</td>
                                        @foreach($attendance['monthAtt'] as $att)
                                            @if($att['status']==1)
                                                <td><i class="fas fa-check text-success"></i></td>
                                            @elseif($att['status']===0)
                                                <td><i class="fas fa-times text-danger"></i></td>
                                            @else
                                                <td>-</td>
                                            @endif
                                        @endforeach
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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