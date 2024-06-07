@extends('superadmin.layout.master')

@section('main-content-section')
<div class="container-fluid px-lg-4 mt-4 mt-xl-5">
    <div class="row mb-3">
        <div class="col-xl-12 col-md-12">
            
        </div>
    </div>
    <div class="row">
    
            <div class="col-xl-12 col-md-12">
                <div class="card border-0 shadow">
                    <div class="card-header bg-transparent d-xl-none d-block">
                        <div class="page-title">
                        </div>
                    </div>
                    <div class="col-xl-12 col-md-12">
                        
                        <div class="card-body">
                            <div class="table-header">
                                <div class="row">
                                    <div class="col-12 col-md-12 col-lg-12">
                                        <div class="row g-2 align-items-center justify-content-lg-start mb-4">
                                            <div class="col-12 col-md-6 col-xl-9">
                                                <h2 class="table_headline">Past Events</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 text-center text-lg-end">
                                        <div class="page-action mb-4">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <table class="table table-bordered align-middle tb-light"> -->
                            <table id="newtable" class="display responsive nowrap myTable tb-light event_table" width="100%">
                                <thead class="table-light">
                                <tr>
                                    <th class="text-uppercase">Sr No.</th>
                                    <th class="text-uppercase">Event Name</th>
                                    <th class="text-uppercase">Date</th>
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
<div class="modal fade" id="delModal" tabindex="-1" aria-labelledby="delModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header">
                {{-- <h5 class="modal-title" id="delModalLabel">Success Modal</h5> --}}
                <button type="button" class="close"  data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="modal-body">
                    <form action="{{ route('superadmin.fundraising.changeEventStatus') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" id="event_id" value="">
                        <input type="hidden" name="status" id="event_status" value="">
                        <div class="modal_icon mb-4 text-center">
                            <div class="icon question_icon mb-3"><img src="{{ asset('assets/admin/images/question-mark.png') }}" alt="check"></div>
                            <h3 id="statusText"></h3>
                        </div>
                        <div class="text-center d-flex justify-content-center p-2">
                            <button class="btn-add btn btn-success" id="" type="submit" data-bs-dismiss="modal">Yes</button>
                            <button class="btn-add btn  ml-2 btn-danger ms-2" type="button" data-bs-dismiss="modal">No</button>
                        </div>
                    </form>
                </div>
            </div>
        
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
  var event_table = '';
  // All skills Listing
  $(function () {
    event_table = $('.event_table').DataTable({
          processing: true,
          serverSide: true,
          paging: true,
          pagelength: 10,
          "bDestroy": true,
          ajax: {
          url: "{{ route('superadmin.fundraising.pastEvent') }}",
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
              {data: 'created_at', name: 'created_at', orderable: false},
              {data: 'action', name: 'action', orderable: false},
              
          ]
      });
  });
function changEventStatus(id,status) {
        $("#event_id").val(id);
        $("#event_status").val(status);
        $("#statusText").empty();
        if(status==0){
            $("#statusText").append("Are you sure you want to Deactive this event ?");
        }
        else{
            $("#statusText").append("Are you sure you want to Activate this event ?");  
        }
      
    }
</script>
@endpush
