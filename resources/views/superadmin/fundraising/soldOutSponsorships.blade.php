@extends('superadmin.layout.master')

@section('main-content-section')
<div class="container-fluid px-lg-4 mt-4 mt-xl-5">
    <div class="row mb-3">
        <div class="col-xl-12 col-md-12">
            <a href="{{ route('superadmin.fundraising.index',($event)?$event->slug:'') }}" role="button" class="btn btn-secondary">
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
                        </div>
                    </div>
                        <div class="card-body">
                            <div class="table-header">
                                <div class="row">
                                    <ul class="nav nav-tabs mytabs col-lg-12" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="sponsor-tab" data-bs-toggle="tab" data-bs-target="#sponsor" type="button" role="tab">Sponsorships</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="casinospons-tab" data-bs-toggle="tab" data-bs-target="#casinospons" type="button" role="tab">{{($event)?$event->name:'' }} Games</button>
                                        </li>
                                    </ul>

                                    <div class="tab-content col-lg-12" id="myTabContent">
                                        <div class="tab-pane fade active show" id="sponsor" role="tabpanel">
                                            <div class="row g-2 align-items-center justify-content-lg-start mt-3 mb-4">
                                                <div class="col-12 col-md-6 col-xl-9">
                                                    <h2 class="table_headline">All Sponsors</h2>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-4 text-center text-lg-end">
                                                <div class="page-action mb-4">
                                                </div>
                                            </div>
    
                                            <table id="soldSponsorshipDatatable" class="display responsive nowrap myTable tb-light soldSponsorship-datatable" width="100%">
                                                <thead class="table-light">
                                                <tr>
                                                    <th class="text-uppercase">Sr No.</th>
                                                    <th class="text-uppercase">Name</th>
                                                    <th class="text-uppercase">Email</th>
                                                    <th class="text-uppercase">Phone</th>
                                                    <th class="text-uppercase">Sponsorship</th>
                                                    <th class="text-uppercase">Price</th>
                                                    <th class="text-uppercase">Purchase Date</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                
                                                </tbody>
                                            </table>                                   
                                        </div>
                                        
                                        <div class="tab-pane fade " id="casinospons" role="tabpanel">
                                            <div class="row g-2 align-items-center justify-content-lg-start mt-3 mb-4">
                                                <div class="col-12 col-md-6 col-xl-9">
                                                    @if($event)
                                                    <h2 class="table_headline">All {{$event->name}} Games</h2>
                                                    @else
                                                     <h2 class="table_headline">All Casino Games</h2>
                                                    @endif
                                                </div>
                                            </div>
    
                                            <table id="soldCasinoGameDatatable" class="display responsive nowrap myTable tb-light soldCasinoGame-datatable" width="100%">
                                                <thead class="table-light">
                                                <tr>
                                                    <th class="text-uppercase">Sr No.</th>
                                                    <th class="text-uppercase">Name</th>
                                                    <th class="text-uppercase">Email</th>
                                                    <th class="text-uppercase">Phone</th>
                                                    <th class="text-uppercase">Game Name</th>
                                                    <th class="text-uppercase">Price</th>
                                                    <th class="text-uppercase">Purchase Date</th>
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
    </div>
</div>

</div>
</div>
@endsection
@push('scripts')
<script>
  var soldSponsorship_table = '';
  // All skills Listing
  $(function () {
    var eventId = @json($event->id);
    var url = '{{ route("superadmin.fundraising.soldOutSponsorship", ":val") }}';
    url = url.replace(':val', eventId);
    soldSponsorship_table = $('.soldSponsorship-datatable').DataTable({
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
              {data: 'name', name: 'name', orderable: false},
              {data: 'email', name: 'email', orderable: false},
              {data: 'phone', name: 'phone', orderable: false},
              {data: 'sponsorship_name', name: 'sponsorship_name', orderable: false},
              {data: 'price', name: 'price', orderable: false},
              {data: 'created_at', name: 'created_at', orderable: false},
          ]
      });
  });
  var soldCasinoGameDatatable = '';
  // All skills Listing
  $(function () {
    var eventId = @json($event->id);
    var url1 = '{{ route("superadmin.fundraising.soldOutSponsorship", ":val") }}';
    url1 = url1.replace(':val', eventId);
    soldCasinoGameDatatable = $('#soldCasinoGameDatatable').DataTable({
          processing: true,
          serverSide: true,
          paging: true,
          pagelength: 10,
          "bDestroy": true,
          ajax: {
          url:url1,
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
              {data: 'email', name: 'email', orderable: false},
              {data: 'phone', name: 'phone', orderable: false},
              {data: 'sponsorship_name', name: 'sponsorship_name', orderable: false},
              {data: 'price', name: 'price', orderable: false},
              {data: 'created_at', name: 'created_at', orderable: false},
          ]
      });
  });

</script>
@endpush
