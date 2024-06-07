@extends('superadmin.layout.master')

@section('main-content-section')
<div class="container-fluid px-lg-4 mt-4 mt-xl-5">
    <div class="row mb-3">
        <div class="col-xl-12 col-md-12">
            <a href="{{ route('superadmin.fundraising.index', ($event)?$event->slug:'') }}" role="button" class="btn btn-secondary">
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
                                    <div class="col-12 col-md-12 col-lg-12">
                                        <div class="row g-2 align-items-center justify-content-lg-start mb-4">
                                            <div class="col-12 col-md-6 col-xl-9">
                                                <h2 class="table_headline">All Donators</h2>
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
                            <table id="newtable" class="display responsive nowrap myTable tb-light soldSponsorship-datatable" width="100%">
                                <thead class="table-light">
                                <tr>
                                    <th class="text-uppercase">Sr No.</th>
                                    <th class="text-uppercase">Email</th>
                                    <th class="text-uppercase">Donation</th>
                                    <th class="text-uppercase">Dedicatee's Name</th>
                                    <th class="text-uppercase">Recipient Email</th>
                                    <th class="text-uppercase">Donation Date</th>
                                    <th class="text-uppercase">Donation Type</th>
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
  var soldSponsorship_table = '';
  // All skills Listing
  $(function () {
    var eventId = @json($event->id);
    var url = '{{ route("superadmin.fundraising.totalDonations", ":val") }}';
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
              {data: 'dedicatees_email', name: 'dedicatees_email', orderable: false},
              {data: 'amount', name: 'amount', orderable: false},
              {data: 'dedicatees_name', name: 'dedicatees_name', orderable: false},
              {data: 'recipient_email', name: 'recipient_email', orderable: false},
              {data: 'created_at', name: 'created_at', orderable: false},
              {data: 'donate_type', name: 'donate_type', orderable: false},
              
          ]
      });
  });

</script>
@endpush
