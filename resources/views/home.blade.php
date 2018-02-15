@extends('includes.master')

@section('title') {{ $seo_info[0]->meta_title }} @stop
@section('keywords'){{ $seo_info[0]->meta_keyword }} @stop
@section('description'){{ $seo_info[0]->meta_descr }} @stop

@section('content')

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        @php 
		$count_indi =0;
		$banner_data = DB::table('banners')->orderBy('id', 'ASC')->get();  
		foreach($banner_data as $banner_det){ 
		@endphp
        <li data-target="#carouselExampleIndicators" data-slide-to="{{ $count_indi }}" class="@if($count_indi==0) active @endif"></li>
        @php $count_indi =$count_indi + 1; } @endphp
      </ol>
      
      <div class="carousel-inner">
        @php
        $count_banner =0;
        $banner_data = DB::table('banners')->orderBy('id', 'DESC')->get();
        foreach($banner_data as $banner_det){
        @endphp  
        <div class="carousel-item">
          <img class="d-block w-100" src="{{ asset('public/banners/'.$banner_det->banner_photo) }}" data-color="lightblue" alt="First Image">
        </div>
        @php  $count_banner =$count_banner + 1;  } @endphp
      </div>
      
      
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
      </a>
      
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
      </a>
    </div>
  
    <!--features-area start-->
    <div class="features-area pb30">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="features-body">
              <div class="features-box text-center">
                <div class="features-elements">
                    <a href="#"><img src="{{ asset('public/images/logo/Featured-Restaurant.png') }}" style="width:auto"alt=""/></a>
                    <h4 class="mb20">Featured Restaurant</h4>
                    <p class="mb20">Lorem ipsum dolor sit amet, ei veritus consetetur repudiandae eam, duo ne homero nostro moderatius.</p>
                </div>
                
                <div class="features-box-img ">
                    <a class="primary-overlay" href="#"><img src="{{ asset('public/images/feature/1.jpg') }}"  alt="feature img"></a>
                </div>
              </div>
              
              <div class="features-box text-center">
                <div class="features-elements">
                  <a href="#"><img src="{{ asset('public/images/logo/Featured-event.png') }}" style="width:auto" alt=""/></a>
                  <h4 class="mb20">Featured Event</h4>
                  <p class="mb20">Lorem ipsum dolor sit amet, ei veritus consetetur repudiandae eam, duo ne homero nostro moderatius.</p>
                </div>
                <div class="features-box-img">
                	<a class="primary-overlay" href="#"><img src="{{ asset('public/images/feature/2.jpg') }}"  alt="feature img"></a>
                </div>
              </div>
              
              <div class="features-box text-center">
                <div class="features-elements">
                  <a href="#"><img src="{{ asset('public/images/logo/Featured-bar.png') }}" style="width:auto" alt=""/></a>
                  <h4 class="mb20">BAR SPECIAL</h4>
                  <p class="mb20">Lorem ipsum dolor sit amet, ei veritus consetetur repudiandae eam, duo ne homero nostro moderatius.</p>
                </div>
                <div class="features-box-img">
                <a class="primary-overlay" href="#"><img src="{{ asset('public/images/feature/3.jpg') }}"  alt="feature img"></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--features-area end-->
    
    <!--food portfolio area start-->
    <div class="portfolio-area title-white bg1 parallax overlay pad90">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="section-title text-center">
              <h3>Food Specials</h3>
              <div class="title-bar full-width mb20">
                  <img src="{{ asset('public/images/logo/ttl-bar.png') }}" alt="title-img">
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="port-carousel port-zoom">
        <div class="port-box primary-overlay">
          <div class="port-img">
              <a href="#"><img src="{{ asset('public/images/food-special/1.jpg') }}"  alt="schedule img"></a>
          </div>
          <div class="port-dtl">
            <h5>Food Name</h5>
            <p>Lorem ipsum dolor sit amet, ei melius saperet mediocritatem quo, mea ad atomorum periculis, ne pri </p>
          </div>
        </div>

        <div class="port-box primary-overlay">
          <div class="port-img">
              <a href="#"><img src="{{ asset('public/images/food-special/2.jpg') }}"  alt="schedule img"></a>
          </div>
          <div class="port-dtl">
            <h5>Food Name</h5>
            <p>Lorem ipsum dolor sit amet, ei melius saperet mediocritatem quo, mea ad atomorum periculis, ne pri </p>
          </div>
        </div>

        <div class="port-box primary-overlay">
          <div class="port-img">
              <a href="#"><img src="{{ asset('public/images/food-special/3.jpg') }}"  alt="schedule img"></a>
          </div>
          <div class="port-dtl">
              <h5>Food Name</h5>
              <p>Lorem ipsum dolor sit amet, ei melius saperet mediocritatem quo, mea ad atomorum periculis, ne pri </p>
          </div>
        </div>

        <div class="port-box primary-overlay">
          <div class="port-img">
              <a href="#"><img src="{{ asset('public/images/food-special/4.jpg') }}"  alt="schedule img"></a>
          </div>
          <div class="port-dtl">
              <h5>Food Name</h5>
              <p>Lorem ipsum dolor sit amet, ei melius saperet mediocritatem quo, mea ad atomorum periculis, ne pri </p>
          </div>
        </div>

        <div class="port-box primary-overlay">
          <div class="port-img">
              <a href="#"><img src="{{ asset('public/images/food-special/1.jpg') }}"  alt="schedule img"></a>
          </div>
          <div class="port-dtl">
              <h5>Food Name</h5>
              <p>Lorem ipsum dolor sit amet, ei melius saperet mediocritatem quo, mea ad atomorum periculis, ne pri </p>
          </div>
        </div>
            
        <div class="port-box primary-overlay">
          <div class="port-img">
             <a href="#"><img src="{{ asset('public/images/food-special/4.jpg') }}"  alt="schedule img"></a>
          </div>
          <div class="port-dtl">
              <h5>Food Name</h5>
              <p>Lorem ipsum dolor sit amet, ei melius saperet mediocritatem quo, mea ad atomorum periculis, ne pri </p>
          </div>
        </div>
      </div>
    </div>
    <!--food portfolio area end-->
  
    <!--Drink portfolio area start-->
    <div class="portfolio-area title-black pad90">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="section-title text-center">
            <h3 >Drink Specials</h3>
              <div class="title-bar full-width mb20">
                  <img src="{{ asset('public/images/logo/ttl-bar.png') }}" alt="title-img">
              </div>
            </div>
          </div>
        </div>
      </div>
        
      <div class="port-carousel port-zoom">
        <div class="port-box primary-overlay">
          <div class="port-img">
            <a href="images/drink-special/big1.jpg"><img src="{{ asset('public/images/drink-special/1.jpg') }}"  alt="schedule img"><i class="ovrlay fa fa-search"></i></a>
          </div>
          <div class="port-dtl">
              <h5>Drink Name</h5>
              <p>Lorem ipsum dolor sit amet, ei melius saperet mediocritatem quo, mea ad atomorum periculis, ne pri </p>
          </div>
        </div>
  
        <div class="port-box primary-overlay">
          <div class="port-img">
              <a href="#"><img src="{{ asset('public/images/drink-special/2.jpg') }}"  alt="schedule img"></a>
          </div>
          <div class="port-dtl">
              <h5>Drink Name</h5>
              <p>Lorem ipsum dolor sit amet, ei melius saperet mediocritatem quo, mea ad atomorum periculis, ne pri </p>
          </div>
        </div>
  
        <div class="port-box primary-overlay">
          <div class="port-img">
              <a href="#"><img src="{{ asset('public/images/drink-special/3.jpg') }}"  alt="schedule img"></a>
          </div>
          <div class="port-dtl">
              <h5>Drink Name</h5>
              <p>Lorem ipsum dolor sit amet, ei melius saperet mediocritatem quo, mea ad atomorum periculis, ne pri </p>
          </div>
        </div>
  
        <div class="port-box primary-overlay">
          <div class="port-img">
              <a href="#"><img src="{{ asset('public/images/drink-special/4.jpg') }}"  alt="schedule img"></a>
          </div>
          <div class="port-dtl">
              <h5>Drink Name</h5>
              <p>Lorem ipsum dolor sit amet, ei melius saperet mediocritatem quo, mea ad atomorum periculis, ne pri </p>
          </div>
        </div>
  
        <div class="port-box primary-overlay">
          <div class="port-img">
              <a href="#"><img src="{{ asset('public/images/drink-special/1.jpg') }}"  alt="schedule img"></a>
          </div>
          <div class="port-dtl">
              <h5>Drink Name</h5>
              <p>Lorem ipsum dolor sit amet, ei melius saperet mediocritatem quo, mea ad atomorum periculis, ne pri </p>
          </div>
        </div>
          
        <div class="port-box primary-overlay">
          <div class="port-img">
              <a href="#"><img src="{{ asset('public/images/drink-special/4.jpg') }}"  alt="schedule img"></a>
          </div>
          <div class="port-dtl">
              <h5>Drink Name</h5>
              <p>Lorem ipsum dolor sit amet, ei melius saperet mediocritatem quo, mea ad atomorum periculis, ne pri </p>
          </div>
        </div>
      </div>
    </div>
    <!--Drink portfolio area end-->
      
    <!--My Special portfolio area start-->
    <div class="portfolio-area title-white bg3 parallax overlay pad90">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="section-title text-center">
              <h3>My Specials</h3>
              <div class="title-bar full-width mb20">
              	<img src="{{ asset('public/images/logo/ttl-bar.png') }}" alt="title-img">
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="port-carousel port-zoom">
        <div class="port-box primary-overlay">
          <div class="port-img">
             <a href="#">
              <img src="{{ asset('public/images/my-special/1.jpg') }}"  alt="schedule img"></a>
          </div>
          <div class="port-dtl">
              <h5>Food Name</h5>
              <p>Lorem ipsum dolor sit amet, ei melius saperet mediocritatem quo, mea ad atomorum periculis, ne pri </p>
          </div>
        </div>
  
        <div class="port-box primary-overlay">
          <div class="port-img">
              <a href="#"><img src="{{ asset('public/images/my-special/2.jpg') }}"  alt="schedule img"></a>
          </div>
          <div class="port-dtl">
              <h5>Food Name</h5>
              <p>Lorem ipsum dolor sit amet, ei melius saperet mediocritatem quo, mea ad atomorum periculis, ne pri </p>
          </div>
        </div>
  
        <div class="port-box primary-overlay">
          <div class="port-img">
              <a href="#"><img src="{{ asset('public/images/my-special/3.jpg') }}"  alt="schedule img"></a>
          </div>
          <div class="port-dtl">
              <h5>Food Name</h5>
              <p>Lorem ipsum dolor sit amet, ei melius saperet mediocritatem quo, mea ad atomorum periculis, ne pri </p>
          </div>
        </div>
  
        <div class="port-box primary-overlay">
          <div class="port-img">
              <a href="#">
              <img src="{{ asset('public/images/my-special/4.jpg') }}"  alt="schedule img"></a>
          </div>
          <div class="port-dtl">
              <h5>Food Name</h5>
              <p>Lorem ipsum dolor sit amet, ei melius saperet mediocritatem quo, mea ad atomorum periculis, ne pri </p>
          </div>
        </div>
  
        <div class="port-box primary-overlay">
          <div class="port-img">
              <a href="#"><img src="{{ asset('public/images/my-special/1.jpg') }}"  alt="schedule img"></a>
          </div>
          <div class="port-dtl">
              <h5>Food Name</h5>
              <p>Lorem ipsum dolor sit amet, ei melius saperet mediocritatem quo, mea ad atomorum periculis, ne pri </p>
          </div>
        </div>
      </div>
    </div>
    <!--My Special portfolio area end-->
    
    <!--Event schedule-area start-->
    <div class="schedule-area bg2 parallax pad90">
      <div class="container">
        <div class="row">
            <div class="col-md-12">
              <div class="section-title text-center">
                <h3>Events</h3>
                <div class="title-bar full-width mb20">
                    <img src="{{ asset('public/images/logo/ttl-bar.png') }}" alt="title-img">
                </div>
              </div>
            </div>
        </div>
        
        <div class="row">
          <div class="col-md-12">
            <ul id="tabsJustified" class="nav nav-tabs schdl-tab-area">
              <li class="nav-item full-width"><a href="#" data-target="#level1" data-toggle="tab" class="nav-link small text-uppercase active">Top Ten Today </a></li>
              <li class="nav-item full-width"><a href="#" data-target="#level2" data-toggle="tab" class="nav-link small text-uppercase ">This Week</a></li>
              <li class="nav-item full-width"><a href="#" data-target="#level3" data-toggle="tab" class="nav-link small text-uppercase ">All Events</a></li>
              <li class="nav-item full-width"><a href="#" data-target="#level4" data-toggle="tab" class="nav-link small text-uppercase ">My Events</a></li>
            </ul>
             
            <div id="tabsJustifiedContent" class="tab-content">
              <div id="level1" class="tab-pane fade active show">
                <div class="schdl-box">
                  <p class="mb-0 textcolor">Parties</p>
                  <h5>Event Name</h5>
                  <p class="mb-0 textcolor">06.00 am – 07.00am</p>
                </div>
                
                <div class="schdl-box">
                  <p class="mb-0 textcolor">Fashion</p>
                  <h5>Event Name</h5>
                  <p class="mb-0 textcolor">07.00 am – 08.00am</p>
                </div>
                
                <div class="schdl-box">
                  <p class="mb-0 textcolor">Comedy</p>
                  <h5>Event Name</h5>
                  <p class="mb-0 textcolor">08.00 am – 09.00am</p>
                </div>
                
                <div class="schdl-box">
                  <p class="mb-0 textcolor">Parties</p>
                  <h5>Event Name</h5>
                  <p class="mb-0 textcolor">09.00 am – 10.00am</p>
                </div>
                
                <div class="schdl-box">
                  <p class="mb-0 textcolor">Cocerts</p>
                  <h5>Event Name</h5>
                  <p class="mb-0 textcolor">10.00 am – 11.00am</p>
                </div>
                
                <div class="schdl-box">
                  <p class="mb-0 textcolor">Parties</p>
                  <h5>Event Name</h5>
                  <p class="mb-0 textcolor">1.00 am – 12.00am</p>
                </div>
                
                <div class="schdl-box">
                  <p class="mb-0 textcolor">Parties</p>
                  <h5>Event Name</h5>
                  <p class="mb-0 textcolor">04.00 pm – 05.00pm</p>
                </div>
                
                <div class="schdl-box">
                  <p class="mb-0 textcolor">Parties</p>
                  <h5>Event Name</h5>
                  <p class="mb-0 textcolor">05.00 pm – 06.00pm</p>
                </div>
                
                <div class="schdl-box">
                  <p class="mb-0 textcolor">Parties</p>
                  <h5>Event Name</h5>
                  <p class="mb-0 textcolor">07.00 pm – 08.00pm</p>
                </div>
                
                <div class="schdl-box">
                  <p class="mb-0 textcolor">Parties</p>
                  <h5>Event Name</h5>
                  <p class="mb-0 textcolor">08.00 pm – 09.00pm</p>
                </div>
              </div>
              
              <div id="level2" class="tab-pane fade">
                <div class="schdl-box">
                  <p class="mb-0 textcolor">Parties</p>
                  <h5>Event Name</h5>
                  <p class="mb-0 textcolor">06.00 am – 07.00am</p>
                </div>
                
                <div class="schdl-box">
                  <p class="mb-0 textcolor">Parties</p>
                  <h5>Event Name</h5>
                  <p class="mb-0 textcolor">07.00 am – 08.00am</p>
                </div>
                
                <div class="schdl-box">
                  <p class="mb-0 textcolor">Parties</p>
                  <h5>Event Name</h5>
                  <p class="mb-0 textcolor">08.00 am – 09.00am</p>
                </div>
                
                <div class="schdl-box">
                  <p class="mb-0 textcolor">Parties</p>
                  <h5>Event Name</h5>
                  <p class="mb-0 textcolor">09.00 am – 10.00am</p>
                </div>
                
                <div class="schdl-box">
                  <p class="mb-0 textcolor">Parties</p>
                  <h5>Event Name</h5>
                  <p class="mb-0 textcolor">10.00 am – 11.00am</p>
                </div>
                
                <div class="schdl-box">
                   <p class="mb-0 textcolor">Parties</p>
                    <h5>Event Name</h5>
                    <p class="mb-0 textcolor">1.00 am – 12.00am</p>
                </div>
                
                <div class="schdl-box">
                  <p class="mb-0 textcolor">Parties</p>
                  <h5>Event Name</h5>
                  <p class="mb-0 textcolor">04.00 pm – 05.00pm</p>
                </div>
              </div>
              
              <div id="level3" class="tab-pane fade">
                  <div class="schdl-box">
                     <p class="mb-0 textcolor">Parties</p>
                      <h5>Event Name</h5>
                      <p class="mb-0 textcolor">06.00 am – 07.00am</p>
                  </div>
                  <div class="schdl-box">
                     <p class="mb-0 textcolor">Parties</p>
                      <h5>Event Name</h5>
                      <p class="mb-0 textcolor">09.00 am – 10.00am</p>
                  </div>
                  <div class="schdl-box">
                    <p class="mb-0 textcolor">Parties</p>
                      <h5>Event Name</h5>
                      <p class="mb-0 textcolor">10.00 am – 11.00am</p>
                  </div>
                  <div class="schdl-box">
                    <p class="mb-0 textcolor">Parties</p>
                      <h5>Event Name</h5>
                      <p class="mb-0 textcolor">1.00 am – 12.00am</p>
                  </div>
                  <div class="schdl-box">
                      <p class="mb-0 textcolor">Parties</p>
                      <h5>Event Name</h5>
                      <p class="mb-0 textcolor">04.00 pm – 05.00pm</p>
                  </div>
              </div>
              
              <div id="level4" class="tab-pane fade">
                  <div class="schdl-box">
                  <p class="mb-0 textcolor">Parties</p>
                      <h5>Event Name</h5>
                      <p class="mb-0 textcolor">06.00 am – 07.00am</p>
                  </div>
                  <div class="schdl-box">
                <p class="mb-0 textcolor">Parties</p>
                      <h5>Event Name</h5>
                      <p class="mb-0 textcolor">07.00 am – 08.00am</p>
                  </div>
                  <div class="schdl-box">
                    <p class="mb-0 textcolor">Parties</p>
                      <h5>Event Name</h5>
                      <p class="mb-0 textcolor">1.00 am – 12.00am</p>
                  </div>
                  <div class="schdl-box">
                     <p class="mb-0 textcolor">Parties</p>
                      <h5>Event Name</h5>
                      <p class="mb-0 textcolor">04.00 pm – 05.00pm</p>
                  </div>
              </div>
              
              <div id="level5" class="tab-pane fade">
                  <div class="schdl-box">
                     <p class="mb-0 textcolor">Parties</p>
                      <h5>Event Name</h5>
                      <p class="mb-0 textcolor">06.00 am – 07.00am</p>
                  </div>
                  <div class="schdl-box">
                      <p class="mb-0 textcolor">Parties</p>
                      <h5>Event Name</h5>
                      <p class="mb-0 textcolor">07.00 am – 08.00am</p>
                  </div>
                  <div class="schdl-box">
                    <p class="mb-0 textcolor">Parties</p>
                      <h5>Event Name</h5>
                      <p class="mb-0 textcolor">08.00 am – 09.00am</p>
                  </div>
                  <div class="schdl-box">
                <p class="mb-0 textcolor">Parties</p>
                      <h5>Event Name</h5>
                      <p class="mb-0 textcolor">09.00 am – 10.00am</p>
                  </div>
                  <div class="schdl-box">
                   <p class="mb-0 textcolor">Parties</p>
                      <h5>Event Name</h5>
                      <p class="mb-0 textcolor">10.00 am – 11.00am</p>
                  </div>
              </div>
              
              <div id="level6" class="tab-pane fade">
                  <div class="schdl-box">
                  <p class="mb-0 textcolor">Parties</p>
                      <h5>Event Name</h5>
                      <p class="mb-0 textcolor">09.00 am – 10.00am</p>
                  </div>
                  <div class="schdl-box">
                    <p class="mb-0 textcolor">Parties</p>
                      <h5>Event Name</h5>
                      <p class="mb-0 textcolor">10.00 am – 11.00am</p>
                  </div>
                  <div class="schdl-box">
                  <p class="mb-0 textcolor">Parties</p>
                      <h5>Event Name</h5>
                      <p class="mb-0 textcolor">1.00 am – 12.00am</p>
                  </div>
                  <div class="schdl-box">
                     <p class="mb-0 textcolor">Parties</p>
                      <h5>Event Name</h5>
                      <p class="mb-0 textcolor">04.00 pm – 05.00pm</p>
                  </div>
              </div>
              
              <div id="level7" class="tab-pane fade">
                  <div class="schdl-box">
                      <p class="mb-0 textcolor">Parties</p>
                      <h5>Event Name</h5>
                      <p class="mb-0 textcolor">08.00 am – 09.00am</p>
                  </div>
                  <div class="schdl-box">
                      <p class="mb-0 textcolor">Parties</p>
                      <h5>Event Name</h5>
                      <p class="mb-0 textcolor">09.00 am – 10.00am</p>
                  </div>
                  <div class="schdl-box">
                    <p class="mb-0 textcolor">Parties</p>
                      <h5>Event Name</h5>
                      <p class="mb-0 textcolor">10.00 am – 11.00am</p>
                  </div>
                  <div class="schdl-box">
                     <p class="mb-0 textcolor">Parties</p>
                      <h5>Event Name</h5>
                      <p class="mb-0 textcolor">1.00 am – 12.00am</p>
                  </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="dwnload">
                    <a href="#"><span><i class="fa fa-eye" aria-hidden="true"></i></span>View All events</a>
                </div>
            </div>
        </div>
      </div>
    </div>
    <!--event schedule-area end-->
  
    <!--Upcoming box start-->
    <div class="container pad30">
      <div class="row">
        <div class="col-md-12">
          <div class="section-title text-center">
            <h3>Upcoming Events</h3>
            <div class="title-bar full-width mb20">
            	<img src="{{ asset('public/images/logo/ttl-bar.png') }}" alt="title-img">
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="calculate-area parallax marbot50">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6 padleft50">
            <div  class="row pad60">
              <div class="section-title text-left">
                  <h3 class="wht-txt ">Event Name Lorem Ispum Sit Amet,Dolor</h3>
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <h2 class="text-white venue"> Venue: <span class="text-white">Lorem ispum</span></h2>
                </div>
              </div>
      
              <div class="col-md-6">
                <div class="form-group">
                  <h3 class="text-white venue">Sat, May 19, 2018<br>9.00PM  4.00PM  </h3>
                </div>
              </div>
      		</div>
      
            <div class="row pad90 text-white">
              <a href="#"><i class="fa fa-info-circle"></i> More Info </a> |    
              <a href="#"><i class="fa fa-share-alt"></i> Share</a> |  
              <a href="#"> <i class="fa fa-save"></i>  Save </a>|  
              <a href="#"> <i class="fa fa-thumbs-up"></i>  I'm  Interested</a> |   
              <a href="#"> <i class="fa fa-bell"></i> Remind</a> | 
              <a href="#"><i class="fa fa-ticket"></i>   RSVP Tickets</a>
            </div>          
    	  </div>
          
          <div class="col-md-6">
            <div class="row">
            	<img src="{{ asset('public/images/banner.jpg') }}" style="width:100%;" alt=""/>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--Upcoming box end-->

@stop 

