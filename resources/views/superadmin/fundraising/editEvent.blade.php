@extends('superadmin.layout.master')

@section('main-content-section')
<style>
.error{
    color:red;
}
label.form-label + input[type="file"] {
    padding: 3px;
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
                    <div class="col-xl-12 col-md-12 p-0">
                        
                        <div class="card-body">
                        <form id="addEvent" enctype="multipart/form-data" action ="{{route('superadmin.fundraising.updateEvent')}}" method="POST">
                        @csrf
                        <div class="modal-body whendata">
                        <div class="row" id="addmoreSponsoredByDiv">
                            <div class="col-12 col-lg-4">
                                <div class="mb-3">
                                    <label for="ticketName" class="form-label">Event Name <span
                                            class="asterisk-sign">*</span></label>
                                    <input type="text" class="form-control" id="EventName" placeholder=""
                                        name="name" value="{{$event->name}}" required />
                                    <input type="hidden" class="form-control" id="EventId" placeholder=""
                                        name="id" value="{{$event->id}}" />
                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="mb-3">
                                    <label for="date" class="form-label">Event Date <span
                                            class="asterisk-sign">*</span></label>
                                    <input type="date" class="form-control" id="date" placeholder=""
                                        name="date" value="{{$event->date}}" required />
                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="mb-3">
                                    <label for="time" class="form-label">Event Time <span class="asterisk-sign">*</span></label>
                                     <select class="form-control" aria-label="Default select example" name="time" id="time">
                                    <option selected disabled>Choose Time</option>
                                    <option value="12AM-1AM" {{($event->time)=="12AM-1AM"?'selected':''}}>12AM-1AM</option>
                                    <option value="1AM-2AM" {{($event->time)=="1AM-2AM"?'selected':''}}>1AM-2AM</option>
                                    <option value="2AM-3AM" {{($event->time)=="2AM-3AM"?'selected':''}}>2AM-3AM</option>
                                    <option value="3AM-4AM" {{($event->time)=="3AM-4AM"?'selected':''}}>3AM-4AM</option>
                                    <option value="4AM-5AM" {{($event->time)=="4AM-5AM"?'selected':''}}>4AM-5AM</option>
                                    <option value="5AM-6AM" {{($event->time)=="5AM-6AM"?'selected':''}}>5AM-6AM</option>
                                    <option value="6AM-7AM" {{($event->time)=="6AM-7AM"?'selected':''}}>6AM-7AM</option>
                                    <option value="7AM-8AM" {{($event->time)=="7AM-8AM"?'selected':''}}>7AM-8AM</option>
                                    <option value="8AM-9AM" {{($event->time)=="8AM-9AM"?'selected':''}}>8AM-9AM</option>
                                    <option value="9AM-10AM" {{($event->time)=="9AM-10AM"?'selected':''}}>9AM-10AM</option>
                                    <option value="10AM-11AM" {{($event->time)=="10AM-11AM"?'selected':''}}>10AM-11AM</option>
                                    <option value="11AM-12PM" {{($event->time)=="11AM-12PM"?'selected':''}}>11AM-12PM</option>
                                    <option value="12PM-1PM" {{($event->time)=="12PM-1PM"?'selected':''}}>12PM-1PM</option>
                                    <option value="1PM-2PM" {{($event->time)=="1PM-2PM"?'selected':''}}>1PM-2PM</option>
                                    <option value="2PM-3PM" {{($event->time)=="2PM-3PM"?'selected':''}}>2PM-3PM</option>
                                    <option value="3PM-4PM" {{($event->time)=="3PM-4PM"?'selected':''}}>3PM-4PM</option>
                                    <option value="4PM-5PM" {{($event->time)=="4PM-5PM"?'selected':''}}>4PM-5PM</option>
                                    <option value="5PM-6PM" {{($event->time)=="5PM-6PM"?'selected':''}}>5PM-6PM</option>
                                    <option value="6PM-7PM" {{($event->time)=="6PM-7PM"?'selected':''}}>6PM-7PM</option>
                                    <option value="7PM-8PM" {{($event->time)=="7PM-8PM"?'selected':''}}>7PM-8PM</option>
                                    <option value="8PM-9PM" {{($event->time)=="8PM-9PM"?'selected':''}}>8PM-9PM</option>
                                    <option value="9PM-10PM" {{($event->time)=="9PM-10PM"?'selected':''}}>9PM-10PM</option>
                                    <option value="10PM-11PM" {{($event->time)=="10PM-11PM"?'selected':''}}>10PM-11PM</option>
                                    <option value="11PM-12AM" {{($event->time)=="11PM-12AM"?'selected':''}}>11PM-12AM</option>
                                    
                                </select>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="mb-3">
                                    <label for="address" class="form-label">Address <span
                                            class="asterisk-sign">*</span></label>
                                    <input type="text" class="form-control" id="address" placeholder=""
                                        name="address" value="{{$event->address}}" required />
                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="mb-3">
                                    <label for="city" class="form-label">City <span
                                            class="asterisk-sign">*</span></label>
                                    <input type="text" class="form-control" id="city" placeholder=""
                                        name="city" value="{{$event->city}}" required />
                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="mb-3">
                                    <label for="state" class="form-label">State <span
                                            class="asterisk-sign">*</span></label>
                                    <input type="text" class="form-control" id="state" placeholder=""
                                        name="state" value="{{$event->state}}" required />
                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="mb-3">
                                    <label for="country" class="form-label">Country <span
                                            class="asterisk-sign">*</span></label>
                                    <input type="text" class="form-control" id="country" placeholder=""
                                        name="country" value="{{$event->country}}" required />
                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="mb-3">
                                    <label for="zip_code" class="form-label">Zip Code <span
                                            class="asterisk-sign">*</span></label>
                                    <input type="text" class="form-control" id="zip_code" placeholder=""
                                        name="zip_code" value="{{$event->zip_code}}" required />
                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="mb-3">
                                    <label for="goal_total_amount" class="form-label">Goal Total Amount <span
                                            class="asterisk-sign">*</span></label>
                                    <input type="text" class="form-control" placeholder=""
                                        name="goal_total_amount" id="goal_total_amount" value="{{$event->goal_total_amount}}" required />
                                </div>
                            </div>
                           
                            <div class="col-12 col-lg-4">
                                <div class="mb-3">
                                    <label for="main_heading" class="form-label">Event Main Heading <span
                                            class="asterisk-sign">*</span></label>
                                    <input type="text" class="form-control" maxlength="80" placeholder=""
                                        name="main_heading" id="main_heading" value="{{$event->main_heading}}" required/>
                                </div>
                            </div>
                            <!--<div class="col-12 col-lg-4">
                                <div class="mb-3">
                                    <label for="sub_heading" class="form-label">Event Sub Heading <span
                                            class="asterisk-sign">*</span></label>
                                    <input type="text" class="form-control" maxlength="40" placeholder=""
                                        name="sub_heading" id="sub_heading" value="" required />
                                </div>
                            </div> -->
                             <div class="col-12 col-lg-4">
                                <div class="mb-3">
                                    <label for="background_image" class="form-label">Event Background Image</label>
                                    <input type="file" class="form-control" id="background_image" placeholder=""
                                        name="background_image" value="" accept="image/*"/>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="mb-3">
                                    <label for="banner_image" class="form-label">Event Banner Image </label>
                                    <input type="file" class="form-control" id="banner_image" placeholder=""
                                        name="banner_image" value="" accept="image/*"/>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="mb-3">
                                    <label for="banner_image2" class="form-label">Event Banner Image2 </label>
                                    <input type="file" class="form-control" id="banner_image2" placeholder=""
                                        name="banner_image2" value="" accept="image/*"/>
                                </div>
                            </div>
                           
                            <div class="col-12 col-lg-4">
                                <div class="mb-3">
                                    <label for="donation_image" class="form-label">Donation Image</label>
                                    <input type="file" class="form-control" id="donation_image" placeholder=""
                                        name="donation_image" value="" accept="image/*"/>
                                </div>
                            </div>
                            @php
                            $i=0;
                            @endphp
                            @if(count($sponsoredByEventImages)>0)
                            @foreach($sponsoredByEventImages as $key=>$sponsoredByEventImage)
                            @php
                            $i=$key;
                            @endphp
                             <div class="col-12 col-lg-4">
                                <div class="mb-3">
                                    <label for="sponsoredByImage" class="form-label">Sponsored By Image </label>
                                    <input type="file" class="form-control" placeholder="" id="sponsoredByImage{{$i}}" name="sponsoredBy[{{$i}}][image]" value=""  accept="image/*"/ onchange="uploadFile('sponsoredByImage{{$i}}')">
                                </div>
                                <div id="sponsoredByImageError{{$i}}" class="error"></div>
                            </div>
                            @endforeach
                            @else
                             <div class="col-12 col-lg-4">
                                <div class="mb-3">
                                    <label for="sponsoredByImage" class="form-label">Sponsored By Image </label>
                                    <input type="file" class="form-control" placeholder="" id="sponsoredByImage{{$i}}" name="sponsoredBy[{{$i}}][image]" value=""  accept="image/*"/ onchange="uploadFile('sponsoredByImage{{$i}}')">
                                </div>
                                <div id="sponsoredByImageError{{$i}}" class="error"></div>
                            </div>
                            @endif
                        </div>
                        <div class="row">
                        <div class="col-12 col-lg-12">
                             <div class="mb-4 mt-2">
                                    <button type="button" id="addMoreBanner" class="btn btn-success">+ Add more</button>
                                </div>
                            </div>
                            <div class="col-12 col-lg-12">
                                <div class="mb-3">
                                    <label for="donation_text" class="form-label">Donation Text <span
                                            class="asterisk-sign">*</span></label>
                                   <textarea name="donation_text" class="textdata form-control"  id="donation_text" >{{$event->donation_text}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-center">
                            <button type="submit" class="btn btn-danger mx-1">Submit</button>
                    </div>
                </form>
                           
                        </div>
                </div>
            </div>
    </div>
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
 $('#EventName').on('input', function() {
      var inputValue = $(this).val();
      if (inputValue.startsWith(' ')) {
          $(this).val(inputValue.trim());
      }
  });
 CKEDITOR.replace("donation_text");
    var i=@json($i);
    $('#addMoreBanner').click(function() {
        var sponsoredByImage = $('#sponsoredByImage'+i).val();
        if(sponsoredByImage){
            i++;
            var html = ` <div class="col-12 col-lg-3">
                            <div class="mb-3">
                                <label for="chooseFile" class="form-label">Sponsored By Image</label>
                                <input type="file" class="form-control" id="sponsoredByImage`+i+`" name="sponsoredBy[`+i+`][image]" value=""  accept="image/*"/ onchange="uploadFile(`+i+`)">
                            </div>
                            <div id="sponsoredByImageError`+i+`" class="error"></div>
                        </div>`;
            $('#addmoreSponsoredByDiv').append(html);
        }
        else{
              $('#sponsoredByImage0-error').empty();
              $('#sponsoredByImageError'+i).empty();
            $('#sponsoredByImageError'+i).append('This field is required.')
        }
    
    })
    function uploadFile(id){
        $('#sponsoredByImageError'+i).empty();
    }
 $('#eventName').on('input', function() {
        var inputValue = $(this).val();
        if (inputValue.startsWith(' ')) {
            $(this).val(inputValue.trim());
        }
});
    jQuery(function($) {
            $('#addEvent').validate({
                rules: {
                    name: {
                        required: true,
                    }
                }
            });
        });
       
 
</script>
@endpush
