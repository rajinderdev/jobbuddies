@extends('superadmin.layout.master')

@section('main-content-section')
<style>
.hideBanner{
    display:none;
}
</style>
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
                                            <div class="col-12 col-md-6 col-xl-8">
                                                <h2 class="table_headline">Live Events</h2>
                                            </div>
                                            <div class="col-12 col-md-6 col-xl-4 d-flex flex-sm-nowrap flex-wrap justify-content-end">
                                                <a href="{{ route('superadmin.fundraising.createEvent')}}" class="btn btn-success text-nowrap ml-sm-3 mt-3 mt-sm-0">
                                                    Add Event
                                                </a>
                                            </div
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
    <div class="modal-dialog modal-md">
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

  <!-- Add Event Modal -->
    <div class="modal fade" id="addEventModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg ">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <h4 class="modal-title text-danger">Create Event</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addEvent" enctype="multipart/form-data" method="POST">
                    @csrf
                     <div class="modal-body whendata">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label for="ticketName" class="form-label">Event Name <span
                                            class="asterisk-sign">*</span></label>
                                    <input type="text" class="form-control" id="EventName" placeholder=""
                                        name="name" value="" required />
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label for="EventDate" class="form-label">Event Date <span
                                            class="asterisk-sign">*</span></label>
                                    <input type="date" class="form-control" id="EventDate" placeholder=""
                                        name="date" value="" required />
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label for="EventTime" class="form-label">Event Time <span class="asterisk-sign">*</span></label>
                                     <select class="form-control" aria-label="Default select example" name="time" id="EventTime">
                                    <option selected disabled>Choose Time</option>
                                    <option value="">12AM-1AM</option>
                                    <option value="">1AM-2AM</option>
                                    <option value="">2AM-3AM</option>
                                    <option value="">3AM-4AM</option>
                                    <option value="">4AM-5AM</option>
                                    <option value="">5AM-6AM</option>
                                    <option value="">6AM-7AM</option>
                                    <option value="">7AM-8AM</option>
                                    <option value="">8AM-9AM</option>
                                    <option value="">9AM-10AM</option>
                                    <option value="">10AM-11AM</option>
                                    <option value="">11AM-12PM</option>
                                    <option value="">12PM-1PM</option>
                                    <option value="">1PM-2PM</option>
                                    <option value="">2PM-3PM</option>
                                    <option value="">3PM-4PM</option>
                                    <option value="">4PM-5PM</option>
                                    <option value="">5PM-6PM</option>
                                    <option value="">6PM-7PM</option>
                                    <option value="">7PM-8PM</option>
                                    <option value="">8PM-9PM</option>
                                    <option value="">9PM-10PM</option>
                                    <option value="">10PM-11PM</option>
                                    <option value="">11PM-12AM</option>
                                    
                                </select>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label for="ticketName" class="form-label">Address <span
                                            class="asterisk-sign">*</span></label>
                                    <input type="text" class="form-control" id="EventName" placeholder=""
                                        name="name" value="" required />
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label for="ticketName" class="form-label">City <span
                                            class="asterisk-sign">*</span></label>
                                    <input type="text" class="form-control" id="EventName" placeholder=""
                                        name="name" value="" required />
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label for="ticketName" class="form-label">state <span
                                            class="asterisk-sign">*</span></label>
                                    <input type="text" class="form-control" id="EventName" placeholder=""
                                        name="name" value="" required />
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label for="ticketName" class="form-label">country <span
                                            class="asterisk-sign">*</span></label>
                                    <input type="text" class="form-control" id="EventName" placeholder=""
                                        name="name" value="" required />
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label for="ticketName" class="form-label">Zip Code <span
                                            class="asterisk-sign">*</span></label>
                                    <input type="text" class="form-control" id="EventName" placeholder=""
                                        name="name" value="" required />
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label for="ticketName" class="form-label">Goal Amount <span
                                            class="asterisk-sign">*</span></label>
                                    <input type="text" class="form-control" id="EventName" placeholder=""
                                        name="name" value="" required />
                                </div>
                            </div>
                           
                            <div class="col-12 col-lg-5">
                                <div class="mb-3">
                                    <label for="chooseFile" class="form-label">Event Main Heading <span
                                            class="asterisk-sign">*</span></label>
                                    <input type="text" class="form-control" maxlength="40" placeholder=""
                                        name="image" value="" required  accept="image/*"/>
                                </div>
                            </div>
                            <div class="col-12 col-lg-5">
                                <div class="mb-3">
                                    <label for="chooseFile" class="form-label">Event Sub Heading <span
                                            class="asterisk-sign">*</span></label>
                                    <input type="text" class="form-control" maxlength="40" placeholder=""
                                        name="image" value="" required  accept="image/*"/>
                                </div>
                            </div>
                             <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label for="chooseFile" class="form-label">Event Background Image <span
                                            class="asterisk-sign">*</span></label>
                                    <input type="file" class="form-control" id="chooseFile" placeholder=""
                                        name="image" value="" required  accept="image/*"/>
                                </div>
                            </div>
                            <div class="col-12 col-lg-5">
                                <div class="mb-3">
                                    <label for="chooseFile" class="form-label">Event Banner Image <span
                                            class="asterisk-sign">*</span></label>
                                    <input type="file" class="form-control" id="chooseFile" placeholder=""
                                        name="image" value="" required  accept="image/*"/>
                                </div>
                            </div>
                             <div class="col-12 col-lg-1">
                                <div class="mb-3">
                                    <button type="button" id="addMoreBanner">+</button>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 hideBanner" id="banner2">
                                <div class="mb-3">
                                    <label for="chooseFile" class="form-label">Event Banner2 Image
                                    <input type="file" class="form-control" id="chooseFile" placeholder=""
                                        name="image" value="" required  accept="image/*"/>
                                </div>
                            </div>
                           
                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label for="chooseFile" class="form-label">Event Background Image <span
                                            class="asterisk-sign">*</span></label>
                                    <input type="file" class="form-control" id="chooseFile" placeholder=""
                                        name="image" value="" required  accept="image/*"/>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label for="chooseFile" class="form-label">Donation Image <span
                                            class="asterisk-sign">*</span></label>
                                    <input type="file" class="form-control" id="chooseFile" placeholder=""
                                        name="image" value="" required  accept="image/*"/>
                                </div>
                            </div>
                            <div class="col-12 col-lg-12">
                                <div class="mb-3">
                                    <label for="chooseFile" class="form-label">Donation Text <span
                                            class="asterisk-sign">*</span></label>
                                   <textarea name="description"  class="textdata form-control"  id="textdata" ></textarea>
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
  <!-- Edit Event Modal -->
    <div class="modal fade" id="editEventModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm ">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <h4 class="modal-title text-danger">Edit Event</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editEvent" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="modal-body whendata">
                        <div class="row">
                            <div class="col-12 col-lg-12">
                                <div class="mb-3">
                                    <label for="editName" class="form-label">Event Name<span
                                            class="asterisk-sign">*</span></label>
                                    <input type="text" name="name" class="form-control" id="editName"
                                        placeholder="" required />
                                    <input type="hidden" name="id" class="form-control" id="editId"
                                        placeholder=""  />
                                        
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
                    <a href="{{ route('superadmin.fundraising.liveEvent') }}" role="button"
                        class="btn btn-danger">Ok</a> 
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<script>
 CKEDITOR.replace("textdata");
 $('#addMoreBanner').click(function() {
     $('#banner2').removeClass('hideBanner');
 })
 $('#editName').on('input', function() {
        var inputValue = $(this).val();
        if (inputValue.startsWith(' ')) {
            $(this).val(inputValue.trim());
        }
});
 $('#eventName').on('input', function() {
        var inputValue = $(this).val();
        if (inputValue.startsWith(' ')) {
            $(this).val(inputValue.trim());
        }
});
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
          url: "{{ route('superadmin.fundraising.liveEvent') }}",
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
    jQuery(function($) {
            $('#addEvent').validate({
                rules: {
                    name: {
                        required: true,
                    }
                }
            });
        });
        $('#addEvent').on('submit', function(e) {
            e.preventDefault();
            if ($(this).valid()) {
                $.ajax({
                    url: "{{ route('superadmin.fundraising.createEvent') }}",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(res) {
                        if (res.success == true) {
                            $('#addEventModal').modal('hide');
                            $('#success_message').empty();
                            $('#success_message').append("Event has been added successfully");
                            $('#successModal').modal('show');
                            
                            event_table.draw();
                        }
                    }
                });
            }
        });
        /* Get ticket Detail for edit*/
        function editEvent(id) {
            var url = '{{ route("superadmin.fundraising.editEvent", ":val") }}';
            url = url.replace(':val', id);
            $.ajax({
                url: url,
                type: "get",
                success: function(res) {
                    if (res.success == true) {
                        $("#editId").val(id);
                        $("#editName").val(res.response.name);
                        $('#editEventModal').modal("show");
                    }
                }
            });
          
        }
         //edit ticket 
        jQuery(function($) {
            $('#editEvent').validate({
                rules: {
                    name: {
                        required: true,
                    }
                }
            });
        });
        $('#editEvent').on('submit', function(e) {
            e.preventDefault();
            if ($(this).valid()) {
                $.ajax({
                    url: "{{ route('superadmin.fundraising.updateEvent') }}",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(res) {
                        if (res.success == true) {
                            $('#editEventModal').modal('hide');
                            $('#success_message').empty();
                            $('#success_message').append("Event has been updated successfully");
                            $('#successModal').modal('show');
                            event_table.draw();
                        }
                    }
                });
            }
        });
</script>
@endpush
