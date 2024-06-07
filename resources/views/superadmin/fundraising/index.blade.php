@extends('superadmin.layout.master')

@section('main-content-section')
    <div class="container-fluid px-lg-4 mt-4 mt-xl-5">
        <div class="row">
            <div class="card-header bg-transparent d-lg-none d-block mb-4 pb-4">
                <div class="page-title">
                    <h4 class="mb-0 fw-semi">Fundraising</h4>
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
                                <a href="{{ route('superadmin.fundraising.totalDonations', ($event)?$event->slug:'') }}" class="btn btn-danger viewAll-page">View All</a>
                            </div>
                        </article>
                    </div>
                    <div class="col-md-12 col-lg-12 col-xl-3 mb-3 mb-xl-0">
                        <article class="stat-cards-item flex-wrap flex-xl-nowrap">
                            <div class="stat-cards-icon flex-shrink-0 warning">
                                <svg xmlns="http://www.w3.org/2000/svg" height="35" viewBox="0 -960 960 960"
                                    width="35">
                                    <path
                                        d="m376-318 104-81 104 81-40-128 98-82H522l-42-122-42 122H318l98 82-40 128ZM140-160q-25 0-42.5-17.5T80-220v-132q0-10 5.5-17.5T100-380q31-11 48.5-39.5T166-480q0-31-17.5-60T100-580q-9-3-14.5-10.5T80-608v-132q0-25 17.5-42.5T140-800h680q25 0 42.5 17.5T880-740v132q0 10-5.5 17.5T860-580q-31 11-48.5 40T794-480q0 32 17.5 60.5T860-380q9 3 14.5 10.5T880-352v132q0 25-17.5 42.5T820-160H140Zm0-60h680v-109q-38-26-62-65t-24-86q0-47 24-86t62-65v-109H140v109q39 26 62.5 65t23.5 86q0 47-23.5 86T140-329v109Zm340-260Z" />
                                </svg>
                            </div>
                            <div class="stat-cards-info">
                                <p class="stat-cards-info__title">
                                    Total Sold Out Tickets
                                </p>
                                <p class="stat-cards-info__num warning">{{ $totalTickets }}</p>
                                <a href="{{ route('superadmin.fundraising.soldOutTickets', ($event)?$event->id:'') }}"
                                    class="btn btn-danger viewAll-page">View All</a>
                            </div>
                        </article>
                    </div>
                    <div class="col-md-12 col-lg-12 col-xl-3 mb-3 mb-xl-0">
                        <article class="stat-cards-item flex-wrap flex-xl-nowrap">
                            <div class="stat-cards-icon flex-shrink-0 primary">
                                <svg xmlns="http://www.w3.org/2000/svg" height="35" viewBox="0 -960 960 960"
                                    width="35">
                                    <path
                                        d="M480-440q-66 0-113-47t-47-113v-140q0-25 17.5-42.5T380-800q15 0 28.5 7t21.5 20q8-13 21.5-20t28.5-7q15 0 28.5 7t21.5 20q8-13 21.5-20t28.5-7q25 0 42.5 17.5T640-740v140q0 66-47 113t-113 47Zm0-60q42 0 71-29t29-71v-120H380v120q0 42 29 71t71 29ZM160-120v-94q0-38 19-65t49-41q67-30 128.5-45T480-380q62 0 123 15.5t127.921 44.694q31.301 14.126 50.19 40.966Q800-252 800-214v94H160Zm60-60h520v-34q0-16-9.5-30.5T707-266q-64-31-117-42.5T480-320q-57 0-111 11.5T252-266q-14 7-23 21.5t-9 30.5v34Zm260 0Zm0-540Z" />
                                </svg>
                            </div>
                            <div class="stat-cards-info">
                                <p class="stat-cards-info__title">
                                    Total Sponsorships / {{($event)?$event->name:''}} Games
                                </p>
                                <p class="stat-cards-info__num primary">{{ $totalSponsorships }}</p>
                                <a href="{{ route('superadmin.fundraising.soldOutSponsorship', ($event)?$event->id:'') }}"
                                    class="btn btn-danger viewAll-page">View All</a>
                            </div>
                        </article>
                    </div>
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
                                    Our Goal to Achieve $100,000
                                </p>
                                <p class="stat-cards-info__num yellow">${{ $totalAcheve }}</p>
                                
                            </div>
                        </article>
                    </div>
                </div>

                <div class="card border-0 shadow mb-4">
                    <div class="card-body">
                        <div class="table-header">
                            <div class="row">
                                <div class="col-12 col-md-12 col-lg-12">
                                    <div class="row g-2 align-items-center justify-content-lg-start mb-4">
                                        <div class="col-12 col-md-6 col-xl-8">
                                            <h2 class="table_headline">All Tickets</h2>
                                        </div>
                                        <div class="col-12 col-md-6 col-xl-4 d-flex flex-sm-nowrap flex-wrap justify-content-end">
                                            @if($event && $event->status==1)
                                            <button class="btn btn-success text-nowrap ml-sm-3 mt-3 mt-sm-0 "
                                                data-bs-toggle="modal" data-bs-target="#addTicketModal">
                                                Add Ticket
                                            </button>
                                            @endif
                                             <a class="btn btn-danger text-nowrap ms-sm-3 mt-3 mt-sm-0 ml-3" href="{{ route('superadmin.fundraising.ticketScanner', ($event)?$event->id:'') }}">
                                                Sold Tickets
                                            </a>
                                        </div
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <table id="newtable" class="display responsive nowrap myTable tb-light tickets-datatable"
                            width="100%">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-uppercase">Sr No.</th>
                                    <th class="text-uppercase">Ticket Name</th>
                                    <th class="text-uppercase">Price</th>
                                    <th class="text-uppercase">Created Date</th>
                                    <th class="text-uppercase">Quantity</th>
                                    <th class="text-uppercase">Pending Tickets</th>
                                    <th class="text-uppercase">Status</th>
                                    <th class="text-uppercase">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card border-0 shadow mb-4">
                    <div class="card-body">
                        <div class="table-header">
                            <div class="row">
                                <ul class="nav nav-tabs mytabs col-lg-12" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="sponsor-tab" data-bs-toggle="tab" data-bs-target="#sponsor" type="button" role="tab">Sponsorships</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="casinospons-tab" data-bs-toggle="tab" data-bs-target="#casinospons" type="button" role="tab">{{($event)?$event->name:''}} Games</button>
                                    </li>
                                </ul>

                                <div class="tab-content col-lg-12" id="myTabContent">
                                    <div class="tab-pane fade active show" id="sponsor" role="tabpanel">
                                        <div class="row g-2 align-items-center justify-content-lg-start mt-3 mb-4">
                                            <div class="col-12 col-md-6 col-xl-8">
                                                <h2 class="table_headline">All Sponsorships</h2>
                                            </div>
                                            <div class="col-12 col-md-6 col-xl-4 d-flex flex-sm-nowrap flex-wrap justify-content-end">
                                            @if($event && $event->status==1)
                                                <button class="btn btn-success text-nowrap ml-sm-3 mt-3 mt-sm-0"
                                                    data-bs-toggle="modal" data-bs-target="#addSponsorshipModal">
                                                    Add Sponsorship
                                                </button>
                                            @endif
                                            </div>
                                        </div>

                                        <table id="sponsorshipsDatatable" class="display responsive nowrap myTable tb-light sponsorships-datatable"
                                        width="100%">
                                        <thead class="table-light">
                                            <tr>
                                                <th class="text-uppercase">Sr No.</th>
                                                <th class="text-uppercase">Sponsorship Name</th>
                                                <th class="text-uppercase">Price</th>
                                                <th class="text-uppercase">Created Date</th>
                                                <th class="text-uppercase">Status</th>
                                                <th class="text-uppercase">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>                                        
                                    </div>
                                    
                                    <div class="tab-pane fade " id="casinospons" role="tabpanel">
                                        <div class="row g-2 align-items-center justify-content-lg-start mt-3 mb-4">
                                            <div class="col-12 col-md-6 col-xl-8">
                                                <h2 class="table_headline">{{($event)?$event->name:''}} Games</h2>
                                            </div>
                                            <div class="col-12 col-md-6 col-xl-4 d-flex flex-sm-nowrap flex-wrap justify-content-end">
                                            @if($event && $event->status==1)
                                                <button class="btn btn-success text-nowrap ml-sm-3 mt-3 mt-sm-0"
                                                    data-bs-toggle="modal" data-bs-target="#addCasinogameModal">
                                                    Add {{($event)?$event->name:''}} Game
                                                </button>
                                            @endif
                                            </div>
                                        </div>

                                        <table id="casinogamesDatatable" class="display responsive nowrap myTable tb-light casinogames-datatable"
                                        width="100%">
                                        <thead class="table-light">
                                            <tr>
                                                <th class="text-uppercase">Sr No.</th>
                                                <th class="text-uppercase">Game Name</th>
                                                <th class="text-uppercase">Price</th>
                                                <th class="text-uppercase">Created Date</th>
                                                <th class="text-uppercase">Status</th>
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
        </div>
    </div>

    </div>
    </div>

    <!-- Add Sponsorship Modal -->
    <div class="modal fade" id="addSponsorshipModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <h4 class="modal-title text-danger">Create Sponsorship</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addSponsorship" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="modal-body whendata">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label for="sponsorName" class="form-label">Sponsorship Name<span
                                            class="asterisk-sign">*</span></label>
                                    <input type="text" name="name" class="form-control" id="sponsorName"
                                        placeholder="" required />
                                        <input type="hidden" name="type" class="form-control" value="1" placeholder=""  />
                                        <input type="hidden" name="event_id" class="form-control" value="{{$event->id}}"
                                    placeholder=""  />
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label for="chooseFilesponsor" class="form-label">Sponsorship Image<span
                                            class="asterisk-sign">*</span></label>
                                    <input type="file" name="image" class="form-control" id="chooseFilesponsor"
                                        placeholder="" required  accept="image/*"/>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label for="priceSponsor" class="form-label">Price<span
                                            class="asterisk-sign">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1">$</span>
                                        <input type="text" name="price" class="form-control" id="priceSponsor"
                                            placeholder="" required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label for="ticketQuantity" class="form-label">Tickets Quantity</label>
                                    <div class="input-group">
                                        <input type="text" name="tickets_quantity" class="form-control" id="ticketQuantity"
                                            placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-12">
                                <div class="mb-3">
                                    <label for="Status" class="form-label">Status<span
                                            class="asterisk-sign">*</span></label>
                                    <select class="form-control" name="status" id="sponsorStatus" required>
                                        <option selected disabled>Select Status</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-lg-12">
                                <div class="mb-3 all_benefits">
                                    <label for="benefits" class="form-label">Sponsorship Benefits<span
                                            class="asterisk-sign">*</span></label>
                                    <div class="d-flex errorspecific">
                                        <input type="text" class="form-control" name="benefits[0]" placeholder="" maxlength="70" required />
                                        <button type="button" class="btn btn-success add_benefit ml-2" id="add_benefit">+
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-secondary mx-1" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-danger mx-1">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Sponsorship Modal -->
    <div class="modal fade" id="editSponsorshipModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <h4 class="modal-title text-danger">Edit Sponsorship</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editSponsorship" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="modal-body whendata">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label for="edit_sponsorName" class="form-label">Sponsorship Name<span
                                        class="asterisk-sign">*</span></label>
                                    <input type="text" class="form-control" id="edit_sponsorName" placeholder="" value="" name="name" required/>
                                    <input type="hidden" class="form-control" id="edit_sponsorId" value="" name="id" />
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label for="edit_sponsorImage" class="form-label">Sponsorship Image</label>
                                   <div class="flexbox">
                                    <input type="file" class="form-control" id="edit_sponsorImage" placeholder="" name="image" onchange="pressed()" style="color:transparent;" accept="image/*" ><label id="edit_sponsorImageLabel">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label for="edit_sponsorPrice" class="form-label">Price<span
                                        class="asterisk-sign">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1">$</span>
                                        <input type="text" class="form-control" id="edit_sponsorPrice" value="" name="price" placeholder="" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label for="edit_sponsorPrice" class="form-label">Tickets Quantity</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="edit_tickets_quantity" value="" name="tickets_quantity" placeholder=""/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label for="edit_sponsorStatus" class="form-label">Status<span
                                        class="asterisk-sign">*</span></label>
                                    <select class="form-control" name="status" id="edit_sponsorStatus" required>
                                        <option selected disabled>Select</option>
                                        <option value="1">Active</option>
                                        <option value="0">Deactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-lg-12">
                                <div class="mb-3 all_benefits"  id="edit_sponsorBenefitsDiv">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-secondary mx-1" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger mx-1">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- View Sponsorship Modal -->
    <div class="modal fade" id="viewSponsorshipModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <h4 class="modal-title text-danger">View Sponsorship</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <div class="table-image" id="spo_image">
                    </div>
                    <div class="table-data">
                        <div class="table-responsive">
                            <table class="table detail-table">
                                <tr>
                                    <td><strong>Sponsorship Name</strong></td>
                                    <td id="spo_name"></td>
                                </tr>
                                <tr>
                                    <td><strong>Price</strong></td>
                                    <td id="spo_price"></td>
                                </tr>
                                <tr>
                                    <td><strong>Tickets Quantity</strong></td>
                                    <td id="spo_tickets_quantity"></td>
                                </tr>
                                <tr>
                                    <td><strong>Created Date</strong></td>
                                    <td id="spo_createdDate"></td>
                                </tr>
                                <tr>
                                    <td><strong>Status</strong></td>
                                    <td id="spo_status"></td>
                                </tr>
                            </table>
                        </div>

                        <div class="benefits_data">
                            <strong>Benefits</strong>
                            <ul id="spo_benefits">
                               
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Ticket Modal -->
    <div class="modal fade" id="addTicketModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <h4 class="modal-title text-danger">Create Ticket</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addTicket" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label for="ticketName" class="form-label">Ticket Name <span
                                            class="asterisk-sign">*</span></label>
                                    <input type="text" class="form-control" id="ticketName" placeholder=""
                                        name="name" value="" required />
                                         <input type="hidden" name="event_id" class="form-control" value="{{$event->id}}"
                                    placeholder=""  />
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label for="chooseFile" class="form-label">Ticket Image <span
                                            class="asterisk-sign">*</span></label>
                                    <input type="file" class="form-control" id="chooseFile" placeholder=""
                                        name="image" value="" required  accept="image/*"/>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label for="Quantity" class="form-label">Quantity <span
                                            class="asterisk-sign">*</span></label>
                                    <input type="number" class="form-control" id="Quantity" placeholder=""
                                        name="quantity" value="" required />
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label for="TicketPrice" class="form-label">Price <span
                                            class="asterisk-sign">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1">$</span>
                                        <input type="text" class="form-control" id="TicketPrice" placeholder=""
                                            name="price" value="" required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label for="Quantity" class="form-label">Status <span
                                            class="asterisk-sign">*</span></label>
                                    <select class="form-control" name="status" required>
                                        <option selected disabled>Select</option>
                                        <option value="1">Active</option>
                                        <option value="0">Deactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger me-1">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Ticket Modal -->
    <div class="modal fade" id="editTicketModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <h4 class="modal-title text-danger">Edit Ticket</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editTicket" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label for="editTicketName" class="form-label">Ticket Name <span
                                            class="asterisk-sign">*</span></label></label>
                                    <input type="text" class="form-control" id="editTicketName" name="name"
                                        placeholder="" required />
                                    <input type="hidden" class="form-control" id="editTicketId" name="id"
                                        placeholder="" />
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label for="chooseFile" class="form-label">Ticket Image</label>
                                    <div class="flexbox">
                                        <input type="file" class="form-control" id="edit_ticketImage" name="image" placeholder="" accept="image/*" onchange="editTicketImage()" style="color:transparent;" /><label id="edit_ticketImageLabel">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label for="editTicketQuantity" class="form-label">Quantity <span
                                            class="asterisk-sign">*</span></label></label>
                                    <input type="number" class="form-control" id="editTicketQuantity" name="quantity"
                                        placeholder="" required />
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label for="editTicketPrice" class="form-label">Price <span
                                            class="asterisk-sign">*</span></label></label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1">$</span>
                                        <input type="text" class="form-control" id="editTicketPrice" placeholder=""
                                            name="price" required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label for="editTicketStatus" class="form-label">Status <span
                                            class="asterisk-sign">*</span></label></label>
                                    <select class="form-control" name="status" id="editTicketStatus" required>
                                        <option selected disabled>Select status</option>
                                        <option value="1">Active</option>
                                        <option value="0">Deactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger me-1">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- View Ticket Modal -->
    <div class="modal fade" id="viewTicketModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <h4 class="modal-title text-danger">View Ticket</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <div class="table-image" id="ticketImage">
                        <img src="imgs/ticket.png" class="img-fluid" />
                    </div>
                    <div class="table-data">
                        <div class="table-responsive">
                            <table class="table detail-table">
                                <tr>
                                    <td><strong>Ticket Name</strong></td>
                                    <td id="ticket_name"></td>
                                </tr>
                                <tr>
                                    <td><strong>Price</strong></td>
                                    <td id="ticket_price"></td>
                                </tr>
                                <tr>
                                    <td><strong>Created Date</strong></td>
                                    <td id="ticket_createdDate"></td>
                                </tr>
                                <tr>
                                    <td><strong>Quantity</strong></td>
                                    <td id="ticket_quantity">300</td>
                                </tr>
                                <tr>
                                    <td><strong>Status</strong></td>
                                    <td id="ticket_status"></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Ticket Modal -->
    <div class="modal fade" id="deleteTicketData" tabindex="-1" aria-hidden="true">
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
                <form id="deleteTicket" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div id="Ticket-SponsorshipId"></div>
                    <input type="hidden" value="" id="deleteTicketId" name="id">
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger me-1">Ok</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Delete Sponsorship Modal -->
    <div class="modal fade" id="deleteSponsorshipData" tabindex="-1" aria-hidden="true">
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
                <form id="deleteSponsorship" enctype="multipart/form-data" method="POST">
                    @csrf
                    <input type="hidden" value="" id="deleteSponsorshipId" name="id">
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger me-1">Ok</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Success Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content border-0 shadow-lg">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Success Modal</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
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
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button> -->
                     <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ok</button> -->
                    <a href="{{ route('superadmin.fundraising.index',($event)?$event->slug:'') }}" role="button"
                        class="btn btn-danger">Ok</a> 
                </div>
            </div>
        </div>
    </div>
     <!-- activate/deactivate ticket model -->


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
                    <form action="{{ route('superadmin.fundraising.changeTicketStatus') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" id="ticketId" value="">
                        <input type="hidden" name="status" id="ticketStatus" value="">
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

 <!-- Add Casino games Modal -->
 <div class="modal fade" id="addCasinogameModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h4 class="modal-title text-danger">Create {{($event)?$event->name:''}} Game</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addCasinogame" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="modal-body whendata">
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="mb-3">
                                <label for="casinoName" class="form-label">{{($event)?$event->name:''}} Game Name<span
                                        class="asterisk-sign">*</span></label>
                                <input type="text" name="name" class="form-control" id="casinoName"
                                    placeholder="" required />
                                <input type="hidden" name="type" class="form-control" value="2"
                                    placeholder=""  />
                                     <input type="hidden" name="event_id" class="form-control" value="{{$event->id}}"
                                    placeholder=""  />
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="mb-3">
                                <label for="chooseFilecasinogame" class="form-label">{{($event)?$event->name:''}} Game Image<span
                                        class="asterisk-sign">*</span></label>
                                <input type="file" name="image" class="form-control" id="chooseFilecasinogame"
                                    placeholder="" required  accept="image/*"/>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="mb-3">
                                <label for="priceCasinogame" class="form-label">Price<span
                                        class="asterisk-sign">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">$</span>
                                    <input type="text" name="price" class="form-control" id="priceCasinogame"
                                        placeholder="" required />
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="mb-3">
                                <label for="casinogameTicketQuantity" class="form-label">Tickets Quantity</label>
                                <div class="input-group">
                                    <input type="text" name="tickets_quantity" class="form-control" id="casinogameTicketQuantity"
                                        placeholder="" value="2" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-12">
                            <div class="mb-3">
                                <label for="casinogame" class="form-label">Status<span
                                        class="asterisk-sign">*</span></label>
                                <select class="form-control" name="status" id="casinogameStatus" required>
                                    <option selected disabled>Select Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-lg-12">
                            <div class="mb-3 casinogame_all_benefits ">
                                <label for="benefits" class="form-label">{{($event)?$event->name:''}} Game Benefits<span
                                        class="asterisk-sign">*</span></label>
                                <div class="d-flex errorspecific">
                                    <input type="text" class="form-control" name="benefits[0]" placeholder="" maxlength="70" required/>
                                    <button type="button" class="btn btn-success add_benefitt ml-2" id="add_casinogame_benefit">+
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary mx-1" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger mx-1">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

 <!-- Edit Casino games Modal -->
 <div class="modal fade" id="editCasinogameModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h4 class="modal-title text-danger">Edit {{($event)?$event->name:''}} Game</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editCasinogame" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="modal-body whendata">
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="mb-3">
                                <label for="edit_CasinogameName" class="form-label">{{($event)?$event->name:''}} Game Name<span
                                    class="asterisk-sign">*</span></label>
                                <input type="text" class="form-control" id="edit_CasinogameName" placeholder="" value="" name="name" required/>
                                <input type="hidden" class="form-control" id="edit_CasinogameId" value="" name="id" />
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="mb-3">
                                <label for="edit_CasinogameImage" class="form-label">Casino Game Image</label>
                               <div class="flexbox">
                                <input type="file" class="form-control" id="edit_CasinogameImage" placeholder="" name="image" onchange="pressed()" style="color:transparent;" accept="image/*" ><label id="edit_CasinogameImageLabel">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="mb-3">
                                <label for="edit_CasinogamePrice" class="form-label">Price<span
                                    class="asterisk-sign">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">$</span>
                                    <input type="text" class="form-control" id="edit_CasinogamePrice" value="" name="price" placeholder="" required/>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="mb-3">
                                <label for="edit_Casinogame_tickets_quantity" class="form-label">Tickets Quantity</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="edit_Casinogame_tickets_quantity" value="" name="tickets_quantity" placeholder="" readonly/>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="mb-3">
                                <label for="edit_CasinogameStatus" class="form-label">Status<span
                                    class="asterisk-sign">*</span></label>
                                <select class="form-control" name="status" id="edit_CasinogameStatus" required>
                                    <option selected disabled>Select</option>
                                    <option value="1">Active</option>
                                    <option value="0">Deactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-lg-12">
                            <div class="mb-3 all_benefits"  id="edit_CasinogameBenefitsDiv">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary mx-1" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger mx-1">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
  <!-- View Casino games Modal -->
  <div class="modal fade" id="viewCasinogameModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h4 class="modal-title text-danger">View {{($event)?$event->name:''}} Game</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <div class="table-image" id="cgame_image">
                </div>
                <div class="table-data">
                    <div class="table-responsive">
                        <table class="table detail-table">
                            <tr>
                                <td><strong>{{($event)?$event->name:''}} Game Name</strong></td>
                                <td id="cgame_name"></td>
                            </tr>
                            <tr>
                                <td><strong>Price</strong></td>
                                <td id="cgame_price"></td>
                            </tr>
                            <tr>
                                <td><strong>Tickets Quantity</strong></td>
                                <td id="cgame_tickets_quantity"></td>
                            </tr>
                            <tr>
                                <td><strong>Created Date</strong></td>
                                <td id="cgame_createdDate"></td>
                            </tr>
                            <tr>
                                <td><strong>Status</strong></td>
                                <td id="cgame_status"></td>
                            </tr>
                        </table>
                    </div>

                    <div class="benefits_data">
                        <strong>Benefits</strong>
                        <ul id="cgame_benefits">
                           
                        </ul>
                    </div>
                </div>
            </div>

            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script>
        window.pressed = function(){
            var a = document.getElementById('edit_sponsorImage');
            {
                var theSplit = a.value.split('\\');
                edit_sponsorImageLabel.innerHTML = theSplit[theSplit.length-1];
            }
        };
        window.pressed = function(){
            var a = document.getElementById('edit_CasinogameImage');
            {
                var theSplit = a.value.split('\\');
                edit_CasinogameImageLabel.innerHTML = theSplit[theSplit.length-1];
            }
        };
        window.editTicketImage = function(){
            var a = document.getElementById('edit_ticketImage');
            {
                var theSplit = a.value.split('\\');
                edit_ticketImageLabel.innerHTML = theSplit[theSplit.length-1];
            }
        };
        var benefitKey = 0;
        $("body").on("click", "#add_benefit", function() {
             $('#add_casinogame_benefit1').prop('disabled', true);
            benefitKey= parseInt(benefitKey)+parseInt(1);
            $(".all_benefits").append(
                '<div class="d-flex appendid_list mt-3"><input type="text" class="form-control"  name="benefits['+benefitKey+']" placeholder="" maxlength="70"><button type="button" class="btn btn-danger remove_benefit ml-2">-</button></div>'
            );
        });
        var casinogamebenefitKey = 0;
        $("body").on("click", "#add_casinogame_benefit", function() {
            $('#add_casinogame_benefit').prop('disabled', true);
            casinogamebenefitKey= parseInt(casinogamebenefitKey)+parseInt(1);
            $(".casinogame_all_benefits").append(
                '<div class="d-flex appendid_list mt-3"><input type="text" class="form-control"  name="benefits['+casinogamebenefitKey+']" placeholder=""><button type="button" class="btn btn-danger remove_benefit_casinogame ml-2">-</button></div>'
            );
        });
        var editcasinogamebenefitKey = 0;
        $("body").on("click", "#add_casinogame_benefit1", function() {
            $('#add_casinogame_benefit1').prop('disabled', true);
            editcasinogamebenefitKey= parseInt(editcasinogamebenefitKey)+parseInt(1);
            $("#edit_CasinogameBenefitsDiv").append(
                '<div class="d-flex appendid_list mt-3"><input type="text" class="form-control"  name="benefits['+editcasinogamebenefitKey+']" placeholder="" maxlength="70"><button type="button" class="btn btn-danger remove_benefit_casinogame ml-2">-</button></div>'
            );
        });

        $("body").on("click", ".remove_benefit", function() {
            $(this).parent().remove();
        });
        $("body").on("click", ".remove_benefit_casinogame", function() {
             $('#add_casinogame_benefit').prop('disabled', false);
             $('#add_casinogame_benefit1').prop('disabled', false);
            $(this).parent().remove();
        });

    </script>
    <script>
        var ticket_table = '';
        // All ticket Listing
         var eventId = @json($event->id);
  
        $(function() {
            var url = '{{ route("superadmin.fundraising.tickets", ":val") }}';
            url = url.replace(':val', eventId);
            ticket_table = $('.tickets-datatable').DataTable({
                processing: true,
                serverSide: true,
                paging: true,
                pagelength: 10,
                "bDestroy": true,
                "lengthChange": false,
                ajax: {
                    url:url,
                },
                columns: [{
                        name: 'id',
                        data: null,
                        orderable: false,
                        render: function(data, type, full, meta) {
                            return data.DT_RowIndex;
                        }
                    },
                    {
                        data: 'name',
                        name: 'name',
                        orderable: false
                    },
                    {
                        data: 'price',
                        name: 'price',
                        orderable: false
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                        orderable: false
                    },
                    {
                        data: 'quantity',
                        name: 'quantity',
                        orderable: false
                    },
                    {
                        data: 'pending_quantity',
                        name: 'pending_quantity',
                        orderable: false
                    },
                    {
                        data: 'status',
                        name: 'status',
                        orderable: false
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false
                    }
                ]
            });
        });
        // Add ticket 
        jQuery(function($) {
            $('#addTicket').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    image: {
                        required: true,
                    },
                    quantity: {
                        required: true,
                    },
                    price: {
                        required: true,
                    },
                    status: {
                        required: true,
                    },
                }
            });
        });
        $('#addTicket').on('submit', function(e) {
            e.preventDefault();
            if ($(this).valid()) {
                $.ajax({
                    url: "{{ route('superadmin.fundraising.createTicket') }}",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(res) {
                        if (res.success == true) {
                            $('#addTicketModal').modal('hide');
                            $('#success_message').empty();
                            $('#success_message').append("Ticket has been added successfully");
                            $('#successModal').modal('show');
                           
                            ticket_table.draw();
                        }
                    }
                });
            }
        });
        /* Get ticket Detail*/
        function showTicket(id) {
            $.ajax({
                url: "{{ url('admin/fundraising/show-ticket') }}" + "/" + id,
                type: "get",
                success: function(res) {
                    if (res.success == 'true') {
                        var APP_URL = {!! json_encode(url('/')) !!};
                        var cardImg = APP_URL + '/storage/app/storage/images/' + res.data.image;
                        var image_html = '<img src="' + cardImg + '" class="img-fluid" />';
                        var date = new Date(res.data.created_at);
                        var options = {
                            year: 'numeric',
                            month: 'long',
                            day: 'numeric'
                        };
                        date = date.toLocaleDateString("en-US", options)
                        $("#ticket_name").html(res.data.name ?? 'N/A');
                        $("#ticket_price").html('$'+res.data.price ?? 'N/A');
                        $("#ticket_createdDate").html(date ?? 'N/A');
                        $("#ticket_quantity").html(res.data.quantity ?? 'N/A');
                        $("#ticket_status").html((res.data.status == 1) ?
                            '<span class="fw-bold text-success">Active</span>' :
                            '<span class="fw-bold text-danger">Deactive</span>');
                        $("#ticketImage").empty();
                        $("#ticketImage").append(image_html);
                        $('#viewTicketModal').modal('show');
                    }
                }
            });
        }
        /* Delete ticket */
        function deleteTicket(id) {
            $('#deleteTicketId').val(id);
        }
        $('#deleteTicket').on('submit', function(e) {
            e.preventDefault();
            if ($(this).valid()) {
                $.ajax({
                    url: "{{ route('superadmin.fundraising.deleteTicket') }}",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(res) {
                        if (res.success == true) {
                            $('#deleteTicketData').modal('hide');
                            $('#success_message').empty();
                            $('#success_message').append("Ticket has been deleted successfully");
                            $('#successModal').modal('show');
                            ticket_table.draw();
                        }
                    }
                });
            }
        });
        /* Get ticket Detail for edit*/
        function editTicket(id) {
            $.ajax({
                url: "{{ url('admin/fundraising/edit-ticket') }}" + "/" + id,
                type: "get",
                success: function(res) {
                    if (res.success == true) {
                        var edit_ticketImage = document.getElementById('edit_ticketImage');
                        if(res.response.image){
                            edit_ticketImageLabel.innerHTML =res.response.image;
                        }
                        $("#editTicketId").val(id);
                        $("#editTicketName").val(res.response.name);
                        $("#editTicketQuantity").val(res.response.quantity);
                        $("#editTicketPrice").val(res.response.price);
                        $('#editTicketStatus').val(res.response.status);
                        $("editTicketStatus").removeAttr('selected');
                        $('#editTicketModal').modal("show");
                    }
                }
            });
        }
        //edit ticket 
        jQuery(function($) {
            $('#editTicket').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    quantity: {
                        required: true,
                    },
                    price: {
                        required: true,
                    },
                    status: {
                        required: true,
                    },
                }
            });
        });
        $('#editTicket').on('submit', function(e) {
            e.preventDefault();
            if ($(this).valid()) {
                $.ajax({
                    url: "{{ route('superadmin.fundraising.updateTicket') }}",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(res) {
                        if (res.success == true) {
                            $('#editTicketModal').modal('hide');
                            $('#success_message').empty();
                            $('#success_message').append("Ticket has been updated successfully");
                            $('#successModal').modal('show');
                            ticket_table.draw();
                        }
                    }
                });
            }
        });
    </script>
    <script>
        var sponsorships_table = '';
        // All Sponsorship Listing
          var eventId = @json($event->id);
        $(function() {
            var url1 = '{{ route("superadmin.fundraising.sponsorships", ":val") }}';
            url1 = url1.replace(':val', eventId);
            sponsorships_table = $('.sponsorships-datatable').DataTable({
                processing: true,
                serverSide: true,
                paging: true,
                pagelength: 10,
                "bDestroy": true,
                "lengthChange": false,
                ajax: {
                    url: url1,
                },
                columns: [{
                        name: 'id',
                        data: null,
                        orderable: false,
                        render: function(data, type, full, meta) {
                            return data.DT_RowIndex;
                        }
                    },
                    {
                        data: 'name',
                        name: 'name',
                        orderable: false
                    },
                    {
                        data: 'price',
                        name: 'price',
                        orderable: false
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                        orderable: false
                    },
                    {
                        data: 'status',
                        name: 'status',
                        orderable: false
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false
                    }
                ]
            });
        });
        // Add Sponsorship 
        jQuery(function($) {
            $('#addSponsorship').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    image: {
                        required: true,
                    },
                    price: {
                        required: true,
                    },
                    status: {
                        required: true,
                    },
                    'benefits[]': {
                        required: true,
                    },
                }
            });
        });
        $('#addSponsorship').on('submit', function(e) {
            e.preventDefault();
            if ($(this).valid()) {
                $.ajax({
                    url: "{{ route('superadmin.fundraising.createSponsorship') }}",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(res) {
                        if (res.success == true) {
                            $('#addSponsorshipModal').modal('hide');
                            $('#success_message').empty();
                            $('#success_message').append("Sponsorship has been added successfully");
                            $('#successModal').modal('show');
                            
                            sponsorships_table.draw();
                        }
                    }
                });
            }
        });
           /* Get Sponsorship Detail*/
        function showSponsorship(id) {
            $.ajax({
                url: "{{ url('admin/fundraising/show-sponsorship') }}" + "/" + id,
                type: "get",
                success: function(res) {
                    if (res.success == 'true') {
                        if (res.data.type == 1) {
                            var APP_URL = {!! json_encode(url('/')) !!};
                            var cardImg = APP_URL + '/storage/app/storage/images/' + res.data.image;
                            var image_html = '<img src="' + cardImg + '" class="img-fluid" />';
                            var date = new Date(res.data.created_at);
                            var options = {
                                year: 'numeric',
                                month: 'long',
                                day: 'numeric'
                            };
                            date = date.toLocaleDateString("en-US", options)
                            $("#spo_name").html(res.data.name ?? 'N/A');
                            $("#spo_price").html('$'+res.data.price ?? 'N/A');
                            $("#spo_tickets_quantity").html(res.data.tickets_quantity ?? 'N/A');
                            $("#spo_createdDate").html(date ?? 'N/A');
                            $("#spo_status").html((res.data.status == 1) ?
                                '<span class="fw-bold text-success">Active</span>' :
                                '<span class="fw-bold text-danger">Deactive</span>');
                            $("#spo_image").empty();
                            $("#spo_image").append(image_html);
                            if(res.data.sponsorship_benefits){
                            var benefitsHTML = "";
                                $.each(res.data.sponsorship_benefits, function( index, value ) {
                                    benefitsHTML +='<li>'+value.benefit+'</li>';
                                });
                                $("#spo_benefits").empty();
                                $("#spo_benefits").append(benefitsHTML);
                            }
                            $('#viewSponsorshipModal').modal('show');
                        }
                        if (res.data.type == 2) {
                            var APP_URL = {!! json_encode(url('/')) !!};
                            var cardImg = APP_URL + '/storage/app/storage/images/' + res.data.image;
                            var image_html = '<img src="' + cardImg + '" class="img-fluid" />';
                            var date = new Date(res.data.created_at);
                            var options = {
                                year: 'numeric',
                                month: 'long',
                                day: 'numeric'
                            };
                            date = date.toLocaleDateString("en-US", options)
                            $("#cgame_name").html(res.data.name ?? 'N/A');
                            $("#cgame_price").html('$'+res.data.price ?? 'N/A');
                            $("#cgame_tickets_quantity").html(res.data.tickets_quantity ?? 'N/A');
                            $("#cgame_createdDate").html(date ?? 'N/A');
                            $("#cgame_status").html((res.data.status == 1) ?
                                '<span class="fw-bold text-success">Active</span>' :
                                '<span class="fw-bold text-danger">Deactive</span>');
                            $("#cgame_image").empty();
                            $("#cgame_image").append(image_html);
                            if(res.data.sponsorship_benefits){
                            var benefitsHTML = "";
                                $.each(res.data.sponsorship_benefits, function( index, value ) {
                                    benefitsHTML +='<li>'+value.benefit+'</li>';
                                });
                                $("#cgame_benefits").empty();
                                $("#cgame_benefits").append(benefitsHTML);
                            }
                            $('#viewCasinogameModal').modal('show');
                        }
                    }
                }
            });
        }
        /* Get Sponsorship Detail for edit*/
        function editSponsorship(id) {
            $.ajax({
                url: "{{ url('admin/fundraising/edit-sponsorship') }}" + "/" + id,
                type: "get",
                success: function(res) {
                    if (res.success == true) {
                        if(res.response.type==1){
                            var edit_sponsorImage = document.getElementById('edit_sponsorImage');
                            if(res.response.image){
                                edit_sponsorImageLabel.innerHTML =res.response.image;
                            }
                            $("#edit_sponsorId").val(id);
                            $("#edit_sponsorName").val(res.response.name);
                            $("#edit_sponsorImage").text(res.response.image);
                            $("#edit_sponsorPrice").val(res.response.price);
                            $("#edit_tickets_quantity").val(res.response.tickets_quantity);
                            $('#edit_sponsorStatus').val(res.response.status);
                            $("edit_sponsorStatus").removeAttr('selected');
                            if(res.response.sponsorship_benefits){
                                var benefitsHTML = "";
                                $.each(res.response.sponsorship_benefits, function( index, value ) {
                                    if(index==0){
                                        benefitsHTML +='<label for="edit_sponsorBenefits" class="form-label">Sponsorship Benefits<span class="asterisk-sign">*</span></label><div class="d-flex appendid_list mt-3"><input type="text" class="form-control"  name="benefits['+index+']" value="'+value.benefit+'" placeholder="" maxlength="70"><button type="button" class="btn btn-success add_benefit ml-2" id="add_benefit">+</button></div>';
                                    }
                                    else{
                                        benefitsHTML +='<div class="d-flex appendid_list mt-3"><input type="text" class="form-control"  name="benefits['+index+']" value="'+value.benefit+'" placeholder="" maxlength="70"><button type="button" class="btn btn-danger remove_benefit ml-2">-</button></div>';
                                    }
                                });
                                benefitKey= res.response.sponsorship_benefits.length;
                                $("#edit_sponsorBenefitsDiv").empty();
                                $("#edit_sponsorBenefitsDiv").append(benefitsHTML);
                            }
                            $('#editSponsorshipModal').modal("show");
                        }
                        if(res.response.type==2){
                            var edit_CasinogameImage = document.getElementById('edit_CasinogameImage');
                            if(res.response.image){
                                edit_CasinogameImageLabel.innerHTML =res.response.image;
                            }
                            $("#edit_CasinogameId").val(id);
                            $("#edit_CasinogameName").val(res.response.name);
                            $("#edit_CasinogameImage").text(res.response.image);
                            $("#edit_CasinogamePrice").val(res.response.price);
                            $("#edit_Casinogame_tickets_quantity").val(res.response.tickets_quantity);
                            $('#edit_CasinogameStatus').val(res.response.status);
                            $("edit_CasinogameStatus").removeAttr('selected');
                            if(res.response.sponsorship_benefits){
                                var benefitsHTML = "";
                                var addBtnDisable= false;
                                $.each(res.response.sponsorship_benefits, function( index, value ) {
                                    if(index==0){
                                        benefitsHTML +='<label for="edit_CasinogameBenefits" class="form-label">Casino Game Benefits<span class="asterisk-sign">*</span></label><div class="d-flex appendid_list mt-3"><input type="text" class="form-control"  name="benefits['+index+']" value="'+value.benefit+'" placeholder="" maxlength="70"><button type="button" class="btn btn-success add_benefit ml-2" id="add_casinogame_benefit1">+</button></div>';
                                    }
                                    else{
                                        addBtnDisable= true;
                                        benefitsHTML +='<div class="d-flex appendid_list mt-3"><input type="text" class="form-control"  name="benefits['+index+']" value="'+value.benefit+'" placeholder="" maxlength="70"><button type="button" class="btn btn-danger remove_benefit_casinogame ml-2">-</button></div>';
                                    }
                                });
                                console.log(benefitsHTML,"benefitsHTML")
                                benefitKey= res.response.sponsorship_benefits.length;
                                $("#edit_CasinogameBenefitsDiv").empty();
                                $("#edit_CasinogameBenefitsDiv").append(benefitsHTML);
                                if(addBtnDisable==true){
                                     $('#add_casinogame_benefit1').prop('disabled', true);
                                }
                            }
                            $('#editCasinogameModal').modal("show");
                        }
                        
                }
                }
            });
        }
         //edit Sponsorship 
         jQuery(function($) {
            $('#editSponsorship').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    price: {
                        required: true,
                    },
                    status: {
                        required: true,
                    },
                    benefits: {
                        required: true,
                    },
                }
            });
        });
        $('#editSponsorship').on('submit', function(e) {
            e.preventDefault();
            if ($(this).valid()) {
                $.ajax({
                    url: "{{ route('superadmin.fundraising.updateSponsorship') }}",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(res) {
                        if (res.success == true) {
                            $('#editSponsorshipModal').modal('hide');
                            $('#success_message').empty();
                            $('#success_message').append("Sponsorship has been updated successfully");
                            $('#successModal').modal('show');
                            sponsorships_table.draw();
                        }
                    }
                });
            }
        });
        /* Delete Sponsorship */
        function deleteSponsorship(id) {
            $('#deleteSponsorshipId').val(id);
        }
        $('#deleteSponsorship').on('submit', function(e) {
            e.preventDefault();
            if ($(this).valid()) {
                $.ajax({
                    url: "{{ route('superadmin.fundraising.deleteSponsorship') }}",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(res) {
                        if (res.success == true) {
                            if(res.type==1){
                                $('#deleteSponsorshipData').modal('hide');
                                $('#success_message').empty();
                                $('#success_message').append("Sponsorship has been deleted successfully");
                                $('#successModal').modal('show');
                                sponsorships_table.draw();
                            }
                            if(res.type==2){
                                $('#deleteSponsorshipData').modal('hide');
                                $('#success_message').empty();
                                $('#success_message').append("Casino game has been deleted successfully");
                                $('#successModal').modal('show');
                                casinogamesDatatable.draw();
                            }
                            
                            
                        }
                    }
                });
            }
        });
    </script>
    <script>
         var casinogamesDatatable = '';
        // All Sponsorship Listing
          var eventId = @json($event->id);

        $(function() {
            var url2 = '{{ route("superadmin.fundraising.casinogames", ":val") }}';
            url2 = url2.replace(':val', eventId);
            casinogamesDatatable = $('#casinogamesDatatable').DataTable({
                processing: true,
                serverSide: true,
                paging: true,
                pagelength: 10,
                responsive: true,
                "bDestroy": true,
                "lengthChange": false,
                ajax: {
                    url:url2,
                },
                columns: [{
                        name: 'id',
                        data: null,
                        orderable: false,
                        render: function(data, type, full, meta) {
                            return data.DT_RowIndex;
                        }
                    },
                    {
                        data: 'name',
                        name: 'name',
                        orderable: false
                    },
                    {
                        data: 'price',
                        name: 'price',
                        orderable: false
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                        orderable: false
                    },
                    {
                        data: 'status',
                        name: 'status',
                        orderable: false
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false
                    }
                ]
            });
        });
         // Add Sponsorship 
         jQuery(function($) {
            $('#addCasinogame').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    image: {
                        required: true,
                    },
                    price: {
                        required: true,
                    },
                    status: {
                        required: true,
                    },
                    'benefits[]': {
                        required: true,
                    },
                }
            });
        });
        $('#addCasinogame').on('submit', function(e) {
            e.preventDefault();
            if ($(this).valid()) {
                $.ajax({
                    url: "{{ route('superadmin.fundraising.createSponsorship') }}",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(res) {
                        if (res.success == true) {
                            $('#addCasinogameModal').modal('hide');
                             var form = document.getElementById("addCasinogame");
                           form.reset();
                            $('#success_message').empty();
                            $('#success_message').append("Casino game has been added successfully");
                            $('#successModal').modal('show');
                            casinogamesDatatable.draw();
                        }
                    }
                });
            }
        });
         //edit Sponsorship 
         jQuery(function($) {
            $('#editCasinogame').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    price: {
                        required: true,
                    },
                    status: {
                        required: true,
                    },
                    benefits: {
                        required: true,
                    },
                }
            });
        });
        $('#editCasinogame').on('submit', function(e) {
            e.preventDefault();
            if ($(this).valid()) {
                $.ajax({
                    url: "{{ route('superadmin.fundraising.updateSponsorship') }}",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(res) {
                        if (res.success == true) {
                            $('#editCasinogameModal').modal('hide');
                            $('#success_message').empty();
                            $('#success_message').append("Casino game has been updated successfully");
                            $('#successModal').modal('show');
                            casinogamesDatatable.draw();
                        }
                    }
                });
            }
        });
    </script>
    <script>
        function changTicketStatus(id,status) {
        $("#ticketId").val(id);
        $("#ticketStatus").val(status);
        $("#statusText").empty();
        if(status==0){
            $("#statusText").append("Are you sure you want to Deactive this ticket ?");
        }
        else{
            $("#statusText").append("Are you sure you want to Activate this ticket ?");  
        }
      
    }

   
    </script>
@endpush
