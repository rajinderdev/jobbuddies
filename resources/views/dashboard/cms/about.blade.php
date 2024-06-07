@extends('dashboard.layouts.master')

@section('main-content-section')

<div class="section-2  bg-1 ">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="banner-cont">
                    <p>About Us</p>
                    <span>A little about superschool</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section-3  ptb-65">
    <div class="container">
        <div class="grid-container">
            <div class="grid-item">
                <div class="content-box aboutus">
                    <figure>
                        <img src="{{ asset('assets/image/about.png') }}">
                    </figure>
                </div>
            </div>
            <div class="grid-item">
                <div class="content-box aboutus">
                    <div class="cont-marging">
                        <h3>Our Mission</h3>
                        <p>The Super School's primary goal is to assist students with varying disabilities reach their utmost potential in a supporting and nurturing environment. The student is embraced globally and each developmental domain is addressed both individually and collectively.
                        </p>
                    </div>
                    <div class="cont-marging">
                        <h3>Our Philosophy</h3>
                        <p>Specialize in the advanced care and treatment of all children with disabilities with both a therapeutic and educational approach including Applied Behavioral Analysis techniques.</p>
                    </div>
                    <div class="cont-marging">
                        <h3>Our Vision</h3>
                        <p>The ultimate goal is to have each individual be successful unto themselves and develop that success to the highest degree.</p>

                    </div>
                    <div class="cont-marging">
                        <h3>Founded</h3>
                        <p>March 2014</p>
                    </div>
                    <div class="cont-marging">
                        <h3>Financial Assistance</h3>
                        <p>Super School accepts Mckay and Gardiner Scholarships.</p>
                    </div>
                </div>
            </div>
            </div>

    </div>
</div>

@endsection