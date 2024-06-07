@extends('superadmin.layout.master')

@section('main-content-section')
<div class="container-fluid px-lg-4 mt-4 mt-xl-5">
    <div class="row">
        <div class="col-xl-12 col-md-12">
            <div class="card border-0 shadow">
                <div class="card-header bg-transparent d-xl-none d-block">
                    <div class="page-title">
                        <h4 class="mb-0 fw-semi">Assessments</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-header"> 
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="row g-2 align-items-center mb-4">
                                    <div class="col-12 col-md-auto">
                                        <label for="inputPassword6" class="col-form-label">Filter by Period</label>
                                    </div>
                                    <div class="col-12 col-md-auto">
                                        @php
                                          $secondHelfYearly = true;
                                        if($period==1){
                                            $secondHelfYearly = false;
                                        }
                                        @endphp
                                        <select class="form-control" aria-label="Default select example" name="period" id="periodfilter">
                                            <option value="" disabled selected>Choose Period</option>
                                            <option value="">All</option>
                                            @for($currentYear=$currentYear; $currentYear>=2020; $currentYear--)
                                                @php
                                                $periods =1;
                                                @endphp
                                                 @for($periods=$periods; $periods <= $period; $periods++)
                                                    @if($periods==2 && $secondHelfYearly==True)
                                                        <option value="{{ $currentYear.'-'. $periods}}">{{ 'July, '.$currentYear.' - Dec, '. $currentYear }}</option>
                                                    @elseif($periods==1)
                                                        @php
                                                        if($secondHelfYearly==false){
                                                            $secondHelfYearly = true;
                                                        }
                                                        @endphp
                                                        <option value="{{ $currentYear.'-'. $periods}}">{{ 'Jan, '.$currentYear.' - Jun, '. $currentYear }}</option>
                                                    @endif        
                                                 @endfor
                                            @endfor
                                        </select>
                                    </div>
                                     <div class="col-12 col-md-auto">
                                        <label for="inputPassword6" class="col-form-label">Filter by Teacher</label>
                                    </div>
                                    <div class="col-12 col-md-auto">
                                     
                                        <select class="form-control" aria-label="Default select example" name="user_id" id="teacherfilter">
                                            <option value="All" selected>All</option>
                                          @foreach($teachers as $teacher)
                                           <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                          @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                    <!-- <table class="table table-bordered align-middle tb-light"> -->
                    <table class="display responsive nowrap myTable tb-light assessments-datatable" width="100%">
                        <thead class="table-light">
                            <tr>
                                <th class="text-uppercase">Sr No.</th>
                                <th class="text-uppercase">Candidate Name</th>
                                <th class="text-uppercase">Period</th>
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
@endsection
@push('scripts')
<script>
    var assessments_table = '';
    /* All assessments Listing */
    $(function () {
        assessments_table = $('.assessments-datatable').DataTable({
            processing: true,
            serverSide: true,
            paging: true,
            pagelength: 10,
            "bDestroy": true,
            ajax: {
            url: "{{ route('superadmin.assessments.index') }}",
            data: function(data) {
                data.period = $('#periodfilter').val();
                data.user_id = $('#teacherfilter').val();
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
                {data: 'name', name: 'name', orderable: false},
                {data: 'period', name: 'period', orderable: false},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
          /* Period filter*/
        $(document).ready(function () {
            $("#periodfilter").change(function(){
                assessments_table.draw();
            })
            $("#teacherfilter").change(function(){
                assessments_table.draw();
            })
        });
    });
</script>
@endpush
