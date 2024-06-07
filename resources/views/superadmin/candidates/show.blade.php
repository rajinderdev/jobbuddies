@extends('superadmin.layout.master')

@section('main-content-section')

<!-- content area start -->
<div class="container-fluid px-lg-4 mt-4 mt-xl-5">
    <div class="row mb-3">
        <div class="col-xl-12 col-md-12">
            <a href="{{ url()->previous() }}" role="button" class="btn btn-secondary">
                <i class="fas fa-angle-left"></i>
                Back
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-md-12">
            <div class="card border-0 shadow mb-3">
                <div class="card-header bg-transparent d-xl-none d-block">
                    <div class="page-title">
                        <h4 class="mb-0 fw-semi">Candidate Details</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-6 col-xl-3">
                        <div class="detail-box box-shadow-3 d-block mb-3">
                                            <p class="label">Candidate Name:</p>
                                            <span class="value">{{ ($candidate)?$candidate->name:"N/A" }}</span>
                                        </div>
                            
                        </div>
                        <div class="col-12 col-md-6 col-xl-3">
                         <div class="detail-box box-shadow-3 d-block mb-3">
                                            <p class="label">Phone:</p>
                                            <span class="value">{{ ($candidate)?$candidate->phone:"N/A" }}</span>
                                        </div>
                            
                        </div>
                        <div class="col-12 col-md-6 col-xl-3">
                        <div class="detail-box box-shadow-3 d-block mb-3">
                                            <p class="label">Email:</p>
                                            <span class="value">{{ ($candidate)?$candidate->email:"N/A" }}</span>
                                        </div>
                            
                        </div>
                        <div class="col-12 col-md-6 col-xl-3">
                        <div class="detail-box box-shadow-3 d-block mb-3">
                                            <p class="label">Position:</p>
                                            <span class="value">{{ ($candidate)?$candidate->position:"N/A" }}</span>
                                        </div>
                            
                        </div>
                        <div class="col-12 col-md-12 col-xl-12">
                        <div class="detail-box box-shadow-3 d-block mb-3">
                                            <p class="label">Tell Us About Experience:</p>
                                            <span class="value">{!! ($candidate)?$candidate->tell_us_about_experience:"N/A" !!}</span>
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

@endpush