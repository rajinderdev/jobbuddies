@extends('superadmin.layout.master')

@section('main-content-section')
<div class="container-fluid px-lg-4 mt-4 mt-xl-5">
    
    <div class="row">
        <div class="col-xl-12 col-md-12">
            <div class="card border-0 shadow mb-3">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-12 col-lg-4">
                            <h5 class="fw-semi mb-lg-0">Candidates</h5>
                        </div>
                        <div class="col-12 col-lg-8 text-lg-end">
                            <div class="row g-2 align-items-center justify-content-end">
                               
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="candidatesDatatable" class="display responsive nowrap myTable tb-light candidates-datatable" width="100%">
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
               <a href="{{ route('superadmin.candidates.index') }}" role="button" class="btn btn-danger">Ok</a>
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
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script>
var candidatesDatatable = '';
/* All jobs Listing */
$(function () {
    candidatesDatatable = $('.candidates-datatable').DataTable({
        processing: true,
        serverSide: true,
        paging: true,
        pagelength: 10,
        "bDestroy": true,
        select: true,
        ajax: {
        url: "{{ route('superadmin.candidates.index') }}",
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
 /* Delete ticket */
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
