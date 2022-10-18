@extends('layouts.app')
@section('content')
<!-- Header start -->
@include('includes.header')
<!-- Header end --> 
<style type="text/css">
    .newjbox.row li h4 a {
    font-weight: 400;
    text-decoration: underline;
    color: blue;
}
.custom-style{
    text-decoration: underline;
    color: blue;
}
</style>
<!-- Inner Page Title start -->
@include('includes.inner_page_title', ['page_title'=>__('Latest Job Details')])
<!-- Inner Page Title end -->
<div class="inner-page"> 
    <!-- About -->
    <div class="container">
        <div class="contact-wrap">
            <div class="title"> <span><br></span>
                <!-- <h2>{{__('LATEST JOBS 2020')}}</h2> -->
              
            </div>            
                            
                 <!-- Job Header start -->
        <div class="job-header">
            <div class="jobinfo">
               
                        <h2><a href="#" class="custom-style">{{$custom_jobs->title}}</a></h2>
                        
                    
            </div>
            
            <!-- Job Detail start -->
                <div class="jobmainreq">
                    <div class="jobdetail">
                      
                        
                            
                             <ul class="jbdetail">
                            <li class="row">
                                <div class="col-md-4 col-xs-5">{{__('Jobs Location')}}:</div>
                                <div class="col-md-8 col-xs-7">
                                   
                                    <span>{{$custom_jobs->location}}</span>
                                   
                                </div>
                            </li>
                            <li class="row">
                                <div class="col-md-4 col-xs-5">{{__('Newspaper Name')}}:</div>
                                <div class="col-md-8 col-xs-7"><span>{{$custom_jobs->news_paper}}</span>
                                                            </div>
                                                            </li>
                          
                           
                            <li class="row">
                                <div class="col-md-4 col-xs-5">{{__('Last Date to Apply')}}:</div>
                                <div class="col-md-8 col-xs-7"><span><?php

                                                        $last_date=date_create($custom_jobs->last_date);
                                                        echo date_format($last_date,"F j, Y, l");
                                                         ?></span></div>
                            </li>
                            <li class="row">
                                <div class="col-md-4 col-xs-5">{{__('Published Date')}}:</div>
                                <div class="col-md-8 col-xs-7"><span><?php

                                                        $date=date_create($custom_jobs->published_date);
                                                        echo date_format($date,"F j, Y, l");
                                                         ?></span></div>
                            </li> 
                            
                        </ul>
                            
                            
                       
                    </div>
                </div>

                <!-- Job Description start -->
                <div class="job-header">
                    <div class="contentbox">
                        <h3><i class="fa fa-file-text-o" aria-hidden="true"></i> {{__('Job Description')}}</h3>
                        <p>{!! $custom_jobs->description !!}</p> 
                        <p>
                           <a href="{{url('custom_jobs', $custom_jobs->image)}}" title="Click to view" target="_blank"> <img src="{{url('custom_jobs/', $custom_jobs->image)}}"></a>
                        </p>                      
                    </div>
                </div>
            
            <hr>
          
        </div>
        </div>
    </div>
</div>
@include('includes.footer')
@endsection