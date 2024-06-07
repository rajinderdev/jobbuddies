@extends('dashboard.layouts.master')

@section('main-content-section')

{{\Cart::clear()}}
<div class="section-2">
    <div class="container">
        <div class="outer-side">
            <figure>
                <img src="{{ asset('assets/image/pledged-img.svg') }}">
            </figure>
            <h4>Thanks For The Pledge</h4>
            <p class="heading">You are doing something great <i class="fa fa-smile-o" aria-hidden="true"></i></p>
            <div class="pledged-card-detail">
                <p class="sub-heading">Pledge Detail</p>
                <ul>
                    <li><span>Date :</span><p>{{$orderData->created_at ? date_format($orderData->created_at,"Y/m/d") : 'N/A'}}</p></li>
                    <li><span>Pledge ID :</span><p>{{$orderData->pledge_id ? $orderData->pledge_id : 'N/A'}}</p></li>
                    <li><span>Pledge Amount :</span><p>${{$orderData->price ? $orderData->price : 'N/A'}}</p></li>
                    <li><span>Quantity :</span><p>{{$orderData->quantity ? $orderData->quantity : 'N/A'}}</p></li>
                    <li><span>Gift Card Name :</span><p>{{$orderData->card_name ? $orderData->card_name : 'N/A'}}</p></li>
                    <li><span>Discount :</span><p class="yellow-text">{{$orderData->discount!="0" ? $orderData->discount.'% off' : 'N/A'}}</p></li>
                    <li><span>Name :</span><p>{{$orderData->name ? $orderData->name : 'N/A'}}</p></li>
                    <li><span>Email :</span><p>{{$orderData->email ? $orderData->email : 'N/A'}}</p></li>
                    <li><span>Associated Child :</span><p>{{$orderData->child_name ? \Helper::getAssociatedChild($orderData->child_name) : 'N/A'}}</p></li>
                    <li><span>Phone Number :</span><p>{{$orderData->phone_number ? $orderData->phone_number : 'N/A'}}</p></li>
                    <!-- <li><span>Gift Card Status :</span><p>{{$orderData->status ? $orderData->status : 'N/A'}}</p></li> -->
                    <li><span>Pledge Type :</span><p class="green-text">{{$orderData->pledge_type ? $orderData->pledge_type : 'N/A'}}</p></li>
                    <li><span>Donation Category :</span><p>{{$orderData->variety ? $orderData->variety : 'Pledge Gift Cards'}}</p></li>
                </ul>
                <div class="donld-invoice">
                    <a target="_blank" href="{{route('pledge.invoice.download', $orderData->id)}}" class="cstm-btn download-invoice ">Download Invoice</a>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        toastr.options.timeOut = 5000;
        @if (Session::has('error'))
            toastr.error('{{ Session::get('error') }}');
        @elseif(Session::has('success'))
            toastr.success('{{ Session::get('success') }}');
        @endif
    });
</script>
@endpush