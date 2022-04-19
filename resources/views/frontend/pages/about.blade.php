@extends('layouts.frontend_master')
@section('title')
@if(session()->get('language') == 'bangla')  এবাউট পেইজ  @else About Page @endif
@endsection
@section('frontend_content')
<section class="breadcrumb-area" style="background: url({{ asset($about->bg_image) }})">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-content">
                    <h1 class="breadcrumb-hrading">
                        @if(session()->get('language')== 'bangla')
                        এবাউট পেইজ
                        @else
                        About Page
                        @endif
                    </h1>
                    <ul class="breadcrumb-links">
                        <li><a href="{{ url('/') }}">
                            @if(session()->get('language')== 'bangla')
                            হোম
                            @else
                            Home
                            @endif
                            </a></li>
                        <li>
                            @if(session()->get('language')== 'bangla')
                            এবাউট পেইজ
                            @else
                            About Page
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
    .sec-title {
    text-align: center; }
        .sec-title .sub-title {
        font-size: 1rem; }

        .sec-title h2 span {
        color: #8bc34a; }
        .bottom-style {
        position: relative;
        width: 4rem;
        background: #8bc34a;
        height: .3rem;
        margin: auto;
        top: .7rem; }

        .bottom-style:after {
        content: "";
        position: absolute;
        background: #e8e8e8;
        left: -1rem;
        right: -1rem;
        height: .1rem;
        top: .1rem;
        z-index: -9; }
        h2 {
        font-size: 30px;
        font-weight: 600; }
</style>
 <!-- About Area Start -->
 <section class="about-area">
    <div class="container container-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="about-content">
                    <div class="about-title">
                         <!-- *****section-title**** -->
                    <div class="sec-title mb-5">
                        <h2>Welcome To <span>OSUD LAGBE</span></h2>
                        <div class="bottom-style"></div>
                    </div> <!--sec-title-->
                    </div>
                    <p class="mb-30px">{{ $about->title_description }}</p>
                </div>
            </div>
        </div>
        <div class="row mt-60px">
             <!-- *****section-title**** -->
                 <div class="col-lg-12">
                    <div class="sec-title mb-5">
                        <h2>Our <span>Team</span></h2>
                        <div class="bottom-style"></div>
                    </div> <!--sec-title-->
                 </div>
            <div class="col-lg-3">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{asset('public/admin/images/page-img/Raihan_Khan.jpg')}}" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">MD Raihan Khan</h5>
                      <h6 class="card-title">Cell: +88 01738 950 996</h6>
                      <h6 class="card-title">Email: raihankhancs@gmail.com</h6>
                      <h6 class="card-title">ID: 1831118042</h6>
                    </div>
                  </div>
            </div>
            <div class="col-lg-3">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{asset('public/admin/images/page-img/Proma.jpg')}}" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">Zannatul Islam Proma</h5>
                      <h6 class="card-title">Cell: +88 01706 919 061</h6>
                      <h6 class="card-title">Email: zannatul.proma@northsouth.edu</h6>
                      <h6 class="card-title">ID: 1911916642</h6>
                
                    </div>
                  </div>
            </div>
            <div class="col-lg-3">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{asset('public/admin/images/page-img/OrkBabu.jpg')}}" alt="Card image cap">
                    <div class="card-body">
                      <h5  class="card-title">Md Gulam Rahman Ork Babu </h5>
                      <h6 class="card-title">Cell: +88 01783 436 838</h6>
                      <h6 class="card-title">Email: gulam.babu@northsouth.edu</h6>
                      <h6 class="card-title">ID: 1831112042</h6>
                
                    </div>
                  </div>
            </div>

            <div class="col-lg-3">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{asset('public/admin/images/page-img/Oishee.jpg')}}" alt="Card image cap">
                    <div class="card-body">
                      <h5  class="card-title">Fairuz Nawar </h5>
                      <h6 class="card-title">Cell: +88 01738 950 996</h6>
                      <h6 class="card-title">Email: fairuz.nawar01@northsouth.edu </h6>
                      <h6 class="card-title">ID: 1831244642 </h6>
                
                    </div>
                  </div>
            </div>
        
        </div>
    </div>
</section>
<!-- About Area End -->
@endsection
