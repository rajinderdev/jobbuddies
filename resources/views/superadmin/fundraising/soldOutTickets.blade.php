@extends('superadmin.layout.master')

@section('main-content-section')
<div class="container-fluid px-lg-4 mt-4 mt-xl-5">
    <div class="row mb-3">
        <div class="col-xl-12 col-md-12">
            <a href="{{ route('superadmin.fundraising.index' , ($event)?$event->slug:'') }}" role="button" class="btn btn-secondary">
                <i class="fas fa-angle-left"></i>
                Back
            </a>
        </div>
    </div>
    <div class="row">
            <div class="col-xl-12 col-md-12">
                    <div class="card border-0 shadow">
                            <div class="card-header bg-transparent d-xl-none d-block">
                                <div class="page-title">
                                    <h4 class="mb-0 fw-semi"></h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-header">
                                    <div class="row">
                                        <div class="col-12 col-md-12 col-lg-12">
                                            <div class="row g-2 align-items-center justify-content-lg-start mb-4">
                                                <div class="col-12 col-md-6 col-xl-9">
                                                    <h2 class="table_headline">All Participants</h2>
                                                </div>
                                            </div>
                                            <div class="row g-2 align-items-right justify-content-lg-start mb-4">
                                                <div class="col-12 col-md-6 col-xl-9">
                                                @php
                                                if($event){
                                                    $exportPdfUrl = "https://superschool.org/casinonight/admin-export-all-sold-ticket-pdf/".$event->id;
                                                }
                                                else{
                                                     $exportPdfUrl = "https://superschool.org/casinonight/admin-export-all-sold-ticket-pdf";
                                                }
                                               
                                                @endphp
                                                    <a href="{{$exportPdfUrl}}" class="btn btn-danger btn-del">Export Tickets</a>
                                                     <a href="{{ route('exportSoldTickets', ($event)?$event->id:'') }}" class="btn btn-danger mb-3 mb-lg-0"> Export To Excel </a>
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
                                <table id="newtable" class="display responsive nowrap myTable tb-light soldTickets-datatable" width="100%">
                                    <thead class="table-light">
                                    <tr>
                                        <th class="text-uppercase">Sr No.</th>
                                         <th class="text-uppercase">Sold As</th>
                                        <th class="text-uppercase">Participant</th>
                                        <th class="text-uppercase">Email</th>
                                        <th class="text-uppercase">Phone</th>
                                        <th class="text-uppercase">Ticket</th>
                                        <th class="text-uppercase">Quantity</th>
                                        <th class="text-uppercase">Total Price</th>
                                        <th class="text-uppercase">Purchase Date</th>
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
  var soldTicket_table = '';
  // All skills Listing
  $(function () {
    var eventId = @json($event->id);
    var url = '{{ route("superadmin.fundraising.soldOutTickets", ":val") }}';
    url = url.replace(':val', eventId);
    soldTicket_table = $('.soldTickets-datatable').DataTable({
          processing: true,
          serverSide: true,
          paging: true,
          pagelength: 10,
          "bDestroy": true,
          ajax: {
          url: url,
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
              {data: 'sold_as', name: 'sold_as', orderable: false},
              {data: 'name', name: 'name', orderable: false},
              {data: 'email', name: 'email', orderable: false},
              {data: 'phone', name: 'phone', orderable: false},
              {data: 'ticket_name', name: 'ticket_name', orderable: false},
              {data: 'quantity', name: 'quantity', orderable: false},
              {data: 'price', name: 'price', orderable: false},
              {data: 'created_at', name: 'created_at', orderable: false},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });
  });

</script>
@endpush
