@extends('superadmin.layout.master')

@section('main-content-section')

<div class="container-fluid px-lg-4 mt-4 mt-xl-5">
    <h2 class="main-title d-xl-none d-block">Dashboard</h2>
    <div class="row align-items-stretch mb-3 mb-lg-5 h-100">
        <div class="col-md-12 col-xl-9 align-items-stretch mb-3">
            <div class="row stat-cards mb-3 mb-lg-4">
                <div class="col-md-6 col-xl-4 mb-3 mb-xl-0">
                    <article class="stat-cards-item">
                        <div class="stat-cards-icon warning">
                            <svg height="28" viewBox="0 96 720 720" width="28" version="1.1" id="svg4" sodipodi:docname="865313bbb36baa0af284c674af01bd60.svg" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns="http://www.w3.org/2000/svg" xmlns:svg="http://www.w3.org/2000/svg">
                                <defs id="defs8" />
                                <sodipodi:namedview id="namedview6" pagecolor="#ffffff" bordercolor="#666666" borderopacity="1.0" inkscape:pageshadow="2" inkscape:pageopacity="0.0" inkscape:pagecheckerboard="0" />
                                <path d="m 464,434 q -19,0 -32,-13 -13,-13 -13,-32 0,-19 13,-32 13,-13 32,-13 19,0 32,13 13,13 13,32 0,19 -13,32 -13,13 -32,13 z m -209,0 q -19,0 -32,-13 -13,-13 -13,-32 0,-19 13,-32 13,-13 32,-13 19,0 32,13 13,13 13,32 0,19 -13,32 -13,13 -32,13 z m 105,216 q -56,0 -102,-30 -46,-30 -72,-79 h 348 q -26,49 -72,79 -46,30 -102,30 z m 0,166 Q 286,816 220.5,787.5 155,759 106,710 57,661 28.5,595.5 0,530 0,456 0,382 28.5,316.5 57,251 106,202 155,153 220.5,124.5 286,96 360,96 434,96 499.5,124.5 565,153 614,202 663,251 691.5,316.5 720,382 720,456 720,530 691.5,595.5 663,661 614,710 565,759 499.5,787.5 434,816 360,816 Z m 0,-60 Q 483,756 571.5,668.5 660,581 660,458 660,335 573,243 486,151 358,151 h -18 q -7,0 -18,1 -2,8 -3.5,19 -1.5,11 -1.5,19 0,25 16.5,41.5 16.5,16.5 41.5,16.5 12,0 20,-1.5 8,-1.5 15,-1.5 10,0 17,5 7,5 7,15 0,16 -15,24.5 -15,8.5 -44,8.5 -46,0 -77,-31 -31,-31 -31,-77 0,-5 0.5,-13 0.5,-8 2.5,-13 Q 179,197 119.5,274 60,351 60,454 60,577 148.5,666.5 237,756 360,756 Z m 0,-302 z" id="path2" />
                            </svg>
                        </div>
                        <div class="stat-cards-info">
                            <p class="stat-cards-info__title">Total Candidates</p>
                            <p class="stat-cards-info__num warning">{{ $totalKids }}</p>
                        </div>
                    </article>
                </div>
                <div class="col-md-6 col-xl-4 mb-3 mb-xl-0">
                    <article class="stat-cards-item">
                        <div class="stat-cards-icon primary">
                            <svg height="28" viewBox="0 96 720 720" width="28" version="1.1" id="svg4" sodipodi:docname="ddbfa4bd61d105709326ce458daa647e.svg" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns="http://www.w3.org/2000/svg" xmlns:svg="http://www.w3.org/2000/svg">
                                <defs id="defs8" />
                                <sodipodi:namedview id="namedview6" pagecolor="#ffffff" bordercolor="#666666" borderopacity="1.0" inkscape:pageshadow="2" inkscape:pageopacity="0.0" inkscape:pagecheckerboard="0" />
                                <path d="m 180,650 q 12,0 21,-9 9,-9 9,-21 0,-12 -9,-21 -9,-9 -21,-9 -12,0 -21,9 -9,9 -9,21 0,12 9,21 9,9 21,9 z m 0,-164 q 12,0 21,-9 9,-9 9,-21 0,-12 -9,-21 -9,-9 -21,-9 -12,0 -21,9 -9,9 -9,21 0,12 9,21 9,9 21,9 z m 0,-164 q 12,0 21,-9 9,-9 9,-21 0,-12 -9,-21 -9,-9 -21,-9 -12,0 -21,9 -9,9 -9,21 0,12 9,21 9,9 21,9 z M 312,650 H 556 V 590 H 312 Z m 0,-164 H 556 V 426 H 312 Z m 0,-164 H 556 V 262 H 312 Z M 60,816 Q 36,816 18,798 0,780 0,756 V 156 Q 0,132 18,114 36,96 60,96 h 600 q 24,0 42,18 18,18 18,42 v 600 q 0,24 -18,42 -18,18 -42,18 z m 0,-60 H 660 V 156 H 60 Z m 0,-600 v 600 z" id="path2" />
                            </svg>
                        </div>
                        <div class="stat-cards-info">
                            <p class="stat-cards-info__title">Total Interviewers</p>
                            <p class="stat-cards-info__num primary">{{ $totalPendingTask }}</p>
                        </div>
                    </article>
                </div>
                <div class="col-md-6 col-xl-4 mb-3 mb-xl-0">
                    <article class="stat-cards-item">
                        <div class="stat-cards-icon yellow">
                            <svg height="28" viewBox="0 96 400 800" width="28" version="1.1" id="svg4" sodipodi:docname="5dedfc07a36042049981de6629d68d42.svg" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns="http://www.w3.org/2000/svg" xmlns:svg="http://www.w3.org/2000/svg">
                                <defs id="defs8" />
                                <sodipodi:namedview id="namedview6" pagecolor="#ffffff" bordercolor="#666666" borderopacity="1.0" inkscape:pageshadow="2" inkscape:pageopacity="0.0" inkscape:pagecheckerboard="0" />
                                <path d="m 0,96 h 400 v 333 q 0,23 -11.316,42.149 Q 377.368,490.298 357,502 l -141,82 26,97 H 376 L 267,762 309,896 200,815 90,896 132,762 23,681 H 158.111 L 183,584 43,502 Q 22.632,490.298 11.316,471.149 0,452 0,429 Z m 60,60 v 273 q 0,7 4.5,13 4.5,6 13.5,11 l 96,53 V 156 Z m 280,0 H 234 v 350 l 88,-53 q 9,-5 13.5,-11 4.5,-6 4.5,-13 z M 204,339 Z m -30,-8 z m 60,0 z" id="path2" />
                            </svg>
                        </div>
                        <div class="stat-cards-info">
                            <p class="stat-cards-info__title">Subscribers</p>
                            <p class="stat-cards-info__num yellow">{{ $totalSkills }}</p>
                        </div>
                    </article>
                </div>
            </div>
            <div class="card border-0 shadow">
                <div class="card-header">
                    <h5 class="mb-0 fw-bold">
                        Academic Progress
                    </h5>
                </div>
                <div class="card-body">
                    <!-- <table class="table table-bordered align-middle tb-light"> -->
                    <table id="academic-progress-kids" class="display responsive nowrap myTable tb-light" width="100%">
                        <thead class="table-light">
                            <tr>
                                <th class="text-uppercase">Sr No.</th>
                                <th class="text-uppercase">Candidate Name</th>
                                <th class="text-uppercase">Assessment</th>
                                <th class="text-uppercase">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $counter=1;
                            @endphp
                            @foreach($academicProgressKids as $academicProgressKid)
                            <tr>
                                <td>{{ $counter }}</td>
                                <td class="">{{ $academicProgressKid['name'] }}</td>
                                <td>{{$academicProgressKid['assessments'] }}</td>
                                <td class="">
                                    <a href="{{ route('superadmin.assessments.show',$academicProgressKid['candidate_id']) }}" role="button" class="btn btn-sm btn-light border">
                                        <i class="fa fa-solid fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            @php
                            $counter=$counter+1;
                            @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-xl-3 align-items-stretch mb-3">
            <div class="card border-0 shadow mb-3 h-100">
                <!-- <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-12 col-md-4">
                            <label for="inputPassword6" class="col-form-label fw-bold">Filter by</label>
                        </div>
                        <div class="col-12 col-md-8">
                            <select id="select-records" class="form-control form-select-sm"
                                aria-label="Default select example">
                               <option selected value="option0">Select</option> 
                                <option value="option1" selected>Gender</option>
                            </select>
                        </div>
                    </div>
                </div> -->
                <div class="card-body">
                    <h5 class="filter-title fw-bold mb-3">All Candidates records</h5>
                    <div id="option1" class="gender-kids-records kids-filter-records scrollbar mt-2">
                        <div class="geneder-records border rounded-3 bg-light mb-2 py-2 px-2">
                            <div class="d-flex justify-content-between">
                                <h6 class="mb-0 text-dark">Male</h6>
                                <h6 class="ms-3 mb-0 text-secondary">{{ $totalMaleKids }}</h6>
                            </div>
                        </div>
                        <div class="geneder-records border rounded-3 bg-light mb-2 py-2 px-2">
                            <div class="d-flex justify-content-between">
                                <h6 class="mb-0 text-dark">Female</h6>
                                <h6 class="ms-3 mb-0 text-secondary">{{ $totalFemaleKids }}</h6>
                            </div>
                        </div>
                        <div class="geneder-records border rounded-3 bg-light mb-2 py-2 px-2">
                            <div class="d-flex justify-content-between">
                                <h6 class="mb-0 text-dark">Other</h6>
                                <h6 class="ms-3 mb-0 text-secondary">{{ $totalOtherKids }}</h6>
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
    $('#need-attention-kid-datable').DataTable({
        pageLength: 3,
        searching: false,
        "bDestroy": true,
        "lengthChange": false,
    });
    $('#academic-progress-kids').DataTable({
        pageLength: 3,
        searching: false,
        "bDestroy": true,
        "lengthChange": false,
    });
</script>
@endpush