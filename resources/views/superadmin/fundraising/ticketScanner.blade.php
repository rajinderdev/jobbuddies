@extends('superadmin.layout.master')

@section('main-content-section')
<link href="{{asset('assets/css/JsQRScanner.css')}}" rel="stylesheet">
<style>

</style>
<div class="container-fluid px-lg-4 mt-4 mt-xl-5">
    <div class="row">
        <div class="col-xl-12 col-md-12">
            <div class="card border-0 shadow">
                <div class="card-header bg-transparent d-xl-none d-block">
                    <div class="page-title">
                        <h4 class="mb-0 fw-semi">Sold Tickets</h4>
                    </div>
                </div>
                
                <div class="card-body">
                    <div class="table-header">
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-12 col-xl-4">
                                <div class="row g-2 align-items-center justify-content-lg-center justify-content-xl-start mb-4">
                                    <div class="col-12 col-md-auto col-xl-auto">
                                        <label for="inputPassword6" class="col-form-label">Filter
                                            by</label>
                                    </div>
                                   
                                    <div class="col-12 col-md-auto col-xl-auto">
                                        <select class="form-control" aria-label="Default select example" name="ticket_verified" id="verifiedTicketfilter">
                                            <option value="" selected disabled>Select Status</option>
                                            <option value="All">All</option>
                                            <option value="Verified">Verified</option>
                                            <option value="Un-Verified">Un-Verified</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-12  col-lg-12 col-xl-8 text-center text-xl-right scanner-btn">
                                <button type="button" class="btn btn-danger mb-3 mb-lg-0" id="scannerBtn" {{($event && $event->status==0)?'disabled':''}}>
                                    <i class="fas fa-camera"></i>
                                    Scan Ticket
                                </button>
                                <button type="button" class="btn btn-danger mb-3 mb-lg-0"
                                    data-bs-toggle="modal" data-bs-target="#enterTicketModal" {{($event && $event->status==0)?'disabled':''}}>
                                    <i class="fas fa-tag"></i>
                                    Enter Ticket ID
                                </button>
                                 @php
                                if($event){
                                    $exportPdfUrl = "https://superschool.org/casinonight/admin-export-all-sold-ticket-pdf/".$event->id;
                                }
                                else{
                                        $exportPdfUrl = "https://superschool.org/casinonight/admin-export-all-sold-ticket-pdf";
                                }
                                
                                @endphp
                                 <a href="{{$exportPdfUrl}}" class="btn btn-danger mb-3 mb-lg-0">Export Tickets</a>
                                 <a href="{{ route('exportSoldTickets',($event)?$event->id:'') }}" class="btn btn-danger mb-3 mb-lg-0">
                                   Export To Excel
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- <table class="table table-bordered align-middle tb-light"> -->
                    <table class="display responsive nowrap myTable tb-light tickets-datatable" width="100%">
                        <thead class="table-light">
                            <tr>
                                <th class="text-uppercase">Sr No.</th>
                                <th class="text-uppercase">Ticket Name</th>
                                <th class="text-uppercase">Client Name</th>
                                <th class="text-uppercase">Ticket Type</th>
                                <th class="text-uppercase">Ticket Code</th>
                                <th class="text-uppercase">Sold Date</th>
                                <th class="text-uppercase">Status</th>
                                <th class="text-uppercase">email</th>
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
 
<!--Scan ticket Modal-->
<div class="modal fade" id="scanTicketModal" tabindex="-1" aria-labelledby="scanTicketModalLabel"aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-scrollable">
      <div class="modal-content">
          <div class="modal-header justify-content-center">
              <h4 class="modal-title text-danger" id="scanTicketModalLabel">Scan Ticket</h4>
              <button type="button" class="close"  data-bs-dismiss="modal" aria-label="Close" id="scnnerCloseBtn">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
            <div id="scannerDiv" class="">                  
              <div class="row-element">
              <div class="qrscanner" id="scanner">
              
              </div>
              </div>
              <div class="row-element">
                <div class="form-field form-field-memo">
                  <div class="form-field-caption-panel">
                   
                  </div>
                  <div class="FlexPanel form-field-input-panel">
                    <input type="hidden" id="scannedTextMemo" class="form-control form-memo">
                    <input type="hidden" id="scanCode" class="form-control form-memo">
                  </div>
                </div>
              </div>
              <br>
            </div>
          </div>
      </div>
  </div>
</div>

<!--Get ticket Detail Modal-->
<div class="modal fade" id="enterTicketModal" tabindex="-1" aria-labelledby="enterTicketModalLabel"aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h4 class="modal-title text-danger" id="enterTicketModalLabel">Enter Ticket ID</h4>
                <button type="button" class="close"  data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label for="ticket_code" class="form-label">Ticket Code <span class="asterisk-sign">*</span></label>
                <input type="text" maxlength="15" class="form-control" id="ticket_code" placeholder="" name="ticket_code" value="">
              </div>
             
            </div>
            <div class="modal-footer justify-content-center">
              <button type="button" class="btn btn-danger me-1" id="getTicketDetail">Get Ticket Detail</button>
            </div>
        </div>
    </div>
</div>
 <!-- View Ticket Modal -->
 <div class="modal fade" id="viewTicketModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-md">
      <div class="modal-content">
          <div class="modal-header justify-content-center">
              <h4 class="modal-title text-danger">View Ticket</h4>
          </div>
          <form id="changeTicketVerifiedStatus" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="modal-body">
              <div id="errorMessage"></div>
              <div class="table-data">
                <div class="table-responsive">
                  <table class="table table-striped table-bordered">
                      <tr>
                          <th>Ticket Name</th>
                          <td id="ticket_name"></td>
                      </tr>
                      <tr>
                          <th>Total Price</th>
                          <td id="ticket_price"></td>
                      </tr>
                      <tr>
                        <th>Quantity</th>
                        <td id="ticket_quantity"></td>
                    </tr>
                      <tr>
                          <th>Purchased Date</th>
                          <td id="purchased_date"></td>
                      </tr>
                      <tr>
                          <th>Ticket Code</th>
                          <td id="t_code"></td>
                      </tr>
                      <tr>
                          <th>User Name</th>
                          <td id="user_name"></td>
                      </tr>
                      <tr>
                          <th>User Email</th>
                          <td id="user_email"></td>
                      </tr>
                      <tr>
                          <th>User Phone</th>
                          <td id="user_phone"></td>
                      </tr>
                      <tr>
                          <th>Status</th>
                          <td id="ticket_verified">
                            
                          </td>
                      </tr>
                  </table>
                </div>
              </div>
            </div>
            <input type="hidden" id="fundraising_order_items_id" name="fundraising_order_items_id" value="">
            <input type="hidden" id="ticket_verified" name="ticket_verified" value="Verified">
            <div class="modal-footer justify-content-center">
              <button type="submit" id="verifiedBtn" class="btn btn-success" data-bs-dismiss="modal">
                  Verify Ticket
              </button>
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="verifyTCancelBtn">
                  Cancel
              </button>
            </div>
        </form>
      </div>
  </div>
</div>
<div class="modal fade" id="skillSuccessModal" tabindex="-1" aria-labelledby="addSkillSuccessModalLabel"
  aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content border-0 shadow-lg">
          <div class="modal-header">
              <h5 class="modal-title" id="addSkillSuccessModalLabel">Success Modal</h5>
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
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ok</button>
              
          </div>
      </div>
  </div>
</div>
@endsection

@push('scripts')
<script src="{{asset('assets/js/jsqrscanner.nocache.js')}}"></script>
<script>

$(document).ready(function () {
         
        //     navigator.getMedia = ( navigator.getUserMedia || // use the proper vendor prefix
        //                navigator.webkitGetUserMedia ||
        //                navigator.mozGetUserMedia ||
        //                navigator.msGetUserMedia);
		// 	console.log( navigator.getMedia,"dssd");	   
        // navigator.getMedia({video: true}, function() {
         
            // var jbScanner = new JsQRScanner(onQRCodeScanned);
            //     //var jbScanner = new JsQRScanner(onQRCodeScanned, provideVideo);
            // //reduce the size of analyzed image to increase performance on mobile devices
            // jbScanner.setSnapImageMaxSize(300);
            // var scannerParentElement = document.getElementById("scanner");
            // if(scannerParentElement)
            // {
               
            //     //append the jbScanner to an existing DOM element
            //     jbScanner.appendTo(scannerParentElement);
            // }    
        // }, 
        // function() {
        //     // toastr.error('Requested device not found');
        // });    
            });
       
$('#verifyTCancelBtn').click(function(){
 
//  location.reload();
    var scannerElement = document.getElementById("scanner");
    jbScanner.removeFrom( scannerElement )
//   scannerElement.innerHTML = "";
    if (jbScanner) {
        jbScanner.stopScanning();    
    }
})
$('#scnnerCloseBtn').click(function(){
    // location.reload();
     var scannerElement = document.getElementById("scanner");
    // scannerElement.innerHTML = "";
    jbScanner.removeFrom( scannerElement )
    if (jbScanner) {
        jbScanner.stopScanning();    
    }
})

var jbScanner;

$('#scannerBtn').click(function(){
   
    
    var scannerElement = document.getElementById("scanner");
    scannerElement.innerHTML = "";
    if (jbScanner) {
        jbScanner.stopScanning();    
    }
    // setTimeout(() => {
		
            jbScanner = new JsQRScanner(onQRCodeScanned);
            jbScanner.setScanInterval(1000)
            jbScanner.setSnapImageMaxSize(800);
            jbScanner.appendTo(scannerElement);
            if(jbScanner.isActive()){
            $('#scanTicketModal').modal('show');
         
            }
    // },500)
    
})
$("#ticket_code").keyup(function(){
  var ticketCode = $('#ticket_code').val();
   $('#ticket_code').val(ticketCode.trim());
});
  $('#getTicketDetail').click(function(){
   var ticketCode = $('#ticket_code').val();
   if(ticketCode){
    showTicket(ticketCode,type="ticket_code")
   }
   else{
    toastr.error('Enter Ticket Code.');
   }
  })
    function beep() {
        var snd = new Audio("data:audio/wav;base64,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qJrx4KOQjahZxWbcZgztj2c49nKmkId44S71j0c8eV9yDK6uPRzx5X18eDvjvQ6yKo9ZSS6l//8elePK/Lf//IInrOF/FvDoADYAGBMGb7FtErm5MXMlmPAJQVgWta7Zx2go+8xJ0UiCb8LHHdftWyLJE0QIAIsI+UbXu67dZMjmgDGCGl1H+vpF4NSDckSIkk7Vd+sxEhBQMRU8j/12UIRhzSaUdQ+rQU5kGeFxm+hb1oh6pWWmv3uvmReDl0UnvtapVaIzo1jZbf/pD6ElLqSX+rUmOQNpJFa/r+sa4e/pBlAABoAAAAA3CUgShLdGIxsY7AUABPRrgCABdDuQ5GC7DqPQCgbbJUAoRSUj+NIEig0YfyWUho1VBBBA//uQZB4ABZx5zfMakeAAAAmwAAAAF5F3P0w9GtAAACfAAAAAwLhMDmAYWMgVEG1U0FIGCBgXBXAtfMH10000EEEEEECUBYln03TTTdNBDZopopYvrTTdNa325mImNg3TTPV9q3pmY0xoO6bv3r00y+IDGid/9aaaZTGMuj9mpu9Mpio1dXrr5HERTZSmqU36A3CumzN/9Robv/Xx4v9ijkSRSNLQhAWumap82WRSBUqXStV/YcS+XVLnSS+WLDroqArFkMEsAS+eWmrUzrO0oEmE40RlMZ5+ODIkAyKAGUwZ3mVKmcamcJnMW26MRPgUw6j+LkhyHGVGYjSUUKNpuJUQoOIAyDvEyG8S5yfK6dhZc0Tx1KI/gviKL6qvvFs1+bWtaz58uUNnryq6kt5RzOCkPWlVqVX2a/EEBUdU1KrXLf40GoiiFXK///qpoiDXrOgqDR38JB0bw7SoL+ZB9o1RCkQjQ2CBYZKd/+VJxZRRZlqSkKiws0WFxUyCwsKiMy7hUVFhIaCrNQsKkTIsLivwKKigsj8XYlwt/WKi2N4d//uQRCSAAjURNIHpMZBGYiaQPSYyAAABLAAAAAAAACWAAAAApUF/Mg+0aohSIRobBAsMlO//Kk4soosy1JSFRYWaLC4qZBYWFRGZdwqKiwkNBVmoWFSJkWFxX4FFRQWR+LsS4W/rFRb/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////VEFHAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAU291bmRib3kuZGUAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAMjAwNGh0dHA6Ly93d3cuc291bmRib3kuZGUAAAAAAAAAACU=");  
        snd.play();
    }
    function onQRCodeScanned(scannedText)
    {
      var scannedTextMemo = document.getElementById("scannedTextMemo");
      if(scannedTextMemo)
      {
        scannedTextMemo.value = scannedText;
      }
      if(scannedText){
        beep()
		
        showTicket(scannedTextMemo.value, type="bar_code")
      }
    }
    function showTicket(code,type) {
        
      $.ajax({
          url: "{{ url('admin/fundraising/get-sold-ticket-detail') }}" + "/" + code+"/"+type,
          type: "get",
          success: function(res) {
              if (res.success == 'true') {
                  
                    if (jbScanner) {
                        jbScanner.stopScanning();    
                    }
                   
                  var date = new Date(res.data.created_at);
                  var options = {
                      year: 'numeric',
                      month: 'long',
                      day: 'numeric'
                  };
                  date = date.toLocaleDateString("en-US", options)
                  $("#ticket_name").html(res.data.ticket?res.data.ticket.name:'N/A');
                  $("#fundraising_order_items_id").val(res.data.id?res.data.id:null);
                  $("#ticket_price").html((res.data.price)?'$'+res.data.price*res.data.quantity:'0');
                  $("#purchased_date").html(date ?? 'N/A');
                  $("#ticket_quantity").html((res.data.quantity)?res.data.quantity:'0');
                  $("#t_code").html((res.data.ticket_code)?res.data.ticket_code:'N/A');
                  $("#ticket_verified").html((res.data.ticket_verified == "Un-Verified") ?'<span class="badge badge-danger" style="font-size: 16px;">Un-Verified</span>'
                      : '<span class="badge badge-success h4 mb-0" style="font-size: 16px;">Verified</span>' 
                      );
                      $("#user_name").html(res.data.user?res.data.user.name:'N/A');
                      $("#user_email").html(res.data.user?res.data.user.email:'N/A');
                      $("#user_phone").html(res.data.user?res.data.user.phone:'N/A');
                  $('#viewTicketModal').modal('show');
                  $('#verifiedBtn').prop('disabled', false);
                    $('#verifiedBtn').empty();
                    $('#verifiedBtn').append("Verify Ticket");
                  $('#errorMessage').empty();
                    if(res.data.ticket_verified == "Verified"){
                        $('#errorMessage').append('<span class="fw-bold text-danger" style="font-size: 16px;">This ticket already used.</span>');
                         $('#verifiedBtn').empty();
                        $('#verifiedBtn').append("Verified Ticket");
                        $('#verifiedBtn').prop('disabled', true);
                    }
                $('#scanTicketModal').modal('hide'); 
                $('#enterTicketModal').modal('hide'); 
                $('#ticket_code').val('');
                scan =false;
              }
              else{
				   scan =false;
                toastr.options.timeOut = 5000;
                toastr.error('Your ticket code is invalid');
              }
          }
      });
    }
    function provideVideo()
    {
        var n = navigator;
        if (n.mediaDevices && n.mediaDevices.getUserMedia)
        {
          return n.mediaDevices.getUserMedia({
            video: {
              facingMode: "environment"
            },
            audio: false
          });
        } 
        
        return Promise.reject('Your browser does not support getUserMedia');
    }

    function provideVideoQQ()
    {
        console.log('test')
        return navigator.mediaDevices.enumerateDevices()
        .then(function(devices) {
            var exCameras = [];
            devices.forEach(function(device) {
            if (device.kind === 'videoinput') {
              exCameras.push(device.deviceId)
            }
         });
            
            return Promise.resolve(exCameras);
        }).then(function(ids){
            if(ids.length === 0)
            {
              return Promise.reject('Could not find a webcam');
            }
            
            return navigator.mediaDevices.getUserMedia({
                video: {
                  'optional': [{
                    'sourceId': ids.length === 1 ? ids[0] : ids[1]//this way QQ browser opens the rear camera
                    }]
                }
            });        
        });                
    }
    
    //this function will be called when JsQRScanner is ready to use

    function JsQRScannerReady()
    { //create a new scanner passing to it a callback function that will be invoked when
        //the scanner succesfully scan a QR code
        navigator.getMedia = ( navigator.getUserMedia || // use the proper vendor prefix
                       navigator.webkitGetUserMedia ||
                       navigator.mozGetUserMedia ||
                       navigator.msGetUserMedia);
        navigator.getMedia({video: true}, function() {
          
            // var jbScanner = new JsQRScanner(onQRCodeScanned);
            //     //var jbScanner = new JsQRScanner(onQRCodeScanned, provideVideo);
            // //reduce the size of analyzed image to increase performance on mobile devices
            // jbScanner.setSnapImageMaxSize(300);
            // var scannerParentElement = document.getElementById("scanner");
            // if(scannerParentElement)
            // {
               
            //     //append the jbScanner to an existing DOM element
            //     jbScanner.appendTo(scannerParentElement);
            // }    
        }, 
        function() {
            // toastr.error('Requested device not found');
        });   
    }
    
    $('#changeTicketVerifiedStatus').on('submit', function(e) {
      e.preventDefault();
      $.ajax({
          url: "{{ route('superadmin.fundraising.changeVerifiedTicketStatus') }}",
          type: "POST",
          data: new FormData(this),
          contentType: false,
          cache: false,
          processData: false,
          success: function (res) {
              if(res.success=='true'){
                  $('#viewTicketModal').modal('hide');
                  $('#success_message').empty();
                  $('#success_message').append("Ticket Verified successfully");
                  $('#skillSuccessModal').modal('show');
                  ticket_table.draw();
                //  location.reload();
              }
          }
      });
    });
</script>
<script>
  var ticket_table = "";
  $(function () {
        var eventId = @json($event->id);
        var url = '{{ route("superadmin.fundraising.ticketScanner", ":val") }}';
        url = url.replace(':val', eventId);
    ticket_table = $('.tickets-datatable').DataTable({
        processing: true,
        serverSide: true,
        // "bFilter": false,   
        paging: true,
        pagelength: 10,
		
        ajax: {
        url:url,
        data: function(data) {
            data.ticket_verified = $('#verifiedTicketfilter').val();
            search = data.search.value;
        },
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
            {data: 'ticket_name', name: 'ticket_name', orderable: false},
            {data: 'username', name: 'username', orderable: false},
            {data: 'sold_as', name: 'sold_as', orderable: false},
            {data: 'ticket_code', name: 'ticket_code', orderable: false},
            {data: 'created_at', name: 'created_at', orderable: false,searchable: false},
            {data: 'ticket_verified', name: 'ticket_verified', orderable: false},
            {data: 'email', name: 'email', orderable: false, visible:false},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
});
$(document).ready(function () {
  
    $("#verifiedTicketfilter").change(function(){
        ticket_table.draw();
    })
});

</script>
@endpush
