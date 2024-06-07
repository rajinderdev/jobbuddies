@extends('superadmin.layout.master')

@section('main-content-section')
<div class="container-fluid px-lg-4 mt-4 mt-xl-5">
    <div class="row mb-3">
        <div class="col-xl-12 col-md-12">
            <a href="{{ route('superadmin.fundraising.index') }}" role="button" class="btn btn-secondary">
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
                    <div class="col-xl-12 col-md-12">
                        <div class="row stat-cards mb-3 mb-lg-4">
                            <div class="col-md-12 col-lg-12 col-xl-3 mb-3 mb-xl-0">
                                <article class="stat-cards-item flex-wrap flex-xl-nowrap">
                                    <div class="stat-cards-icon flex-shrink-0 yellow">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="38" viewBox="0 -960 960 960"
                                            width="38">
                                            <path
                                                d="M449-111v-86q-62-9-101.5-46.5T295-339l75-29q13 53 46.5 74t72.5 21q45 0 72.5-21t27.5-56q0-40-28-63.5T456-461q-69-20-105-61t-36-101q0-52 32.5-91.5T449-764v-85h68v85q46 9 81.5 34.5T652-659l-73 29q-15-30-38.5-45T482-690q-43 0-65 17t-22 48q0 31 24.5 53.5T528-524q70 24 104.5 64.5T669-354q0 65-38.5 106T517-196v85h-68Z" />
                                        </svg>
                                    </div>
                                    <div class="stat-cards-info">
                                        <p class="stat-cards-info__title">
                                            Total Donations
                                        </p>
                                        <p class="stat-cards-info__num yellow">${{ $totalDonations }}</p>
                                      
                                    </div>
                                </article>
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
  var soldSponsorship_table = '';
  // All skills Listing
  $(function () {
    soldSponsorship_table = $('.soldSponsorship-datatable').DataTable({
          processing: true,
          serverSide: true,
          paging: true,
          pagelength: 10,
          "bDestroy": true,
          ajax: {
          url: "{{ route('superadmin.fundraising.websiteDonation') }}",
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
              {data: 'action', name: 'action', orderable: false},
              
          ]
      });
  });

</script>
@endpush
