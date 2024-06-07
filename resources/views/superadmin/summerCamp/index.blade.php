@extends('superadmin.layout.master')

@section('main-content-section')

    <div class="container-fluid px-lg-4 mt-4 mt-xl-5">
        <div class="row">
            <div class="col-xl-12 col-md-12">
                <div class="card border-0 shadow">
                    <div class="card-header bg-transparent d-block">
                    <div class="page-title">
                        <div class="row d-flex align-items-center flex-wrap">
                            <div class="col-md-12 d-flex justify-content-md-end align-items-center flex-wrap">
                                <a href="{{route('downloadCampDetailPdf')}}" class="btn btn-danger btn-del" ta>Download Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="card-body">
                        <div class="table-header">
                            <div class="row">
                               
                            </div>
                        </div>
                        <!-- <table class="table table-bordered align-middle tb-light"> -->
                        <table id="newtable" class="display responsive nowrap myTable tb-light summerCamp-datatable" width="100%">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-uppercase">Sr No.</th>
                                    <th class="text-uppercase">Candidate Name</th>
                                    <th class="text-uppercase">Email</th>
                                    <th class="text-uppercase">Phone</th>
                                    <th class="text-uppercase">DOB</th>
                                    <th class="text-uppercase">Registration Date</th>
                                    <th class="text-uppercase">Payment Status</th>
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
    var summerCamp_table = '';
    // All skills Listing
    $(function () {
        summerCamp_table = $('.summerCamp-datatable').DataTable({
            processing: true,
            serverSide: true,
            paging: true,
            pagelength: 10,
            "bDestroy": true,
            select: true,
            ajax: {
            url: "{{ route('superadmin.summerCamp.index') }}",
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
                {data: 'student_name', name: 'student_name', orderable: false},
                {data: 'email', name: 'email', orderable: false},
                {data: 'phone', name: 'phone', orderable: false},
                {data: 'student_dob', name: 'student_dob', orderable: false},
                {data: 'created_at', name: 'created_at', orderable: false},
                {data: 'payment_status', name: 'payment_status', orderable: false},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    });

</script>
@endpush