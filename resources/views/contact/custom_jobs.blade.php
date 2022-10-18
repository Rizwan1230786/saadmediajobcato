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
</style>
<!-- Inner Page Title start -->
@include('includes.inner_page_title', ['page_title'=>__('Latest Jobs')])
<!-- Inner Page Title end -->
<div class="inner-page"> 
    <!-- About -->
    <div class="container">
        <div class="contact-wrap">
            <div class="title"> <span><br></span>
                <h2>{{__('LATEST JOBS 2020')}}</h2>
              
            </div>            
                <!-- Contact Info -->
                <div class="contact-now">
    				<div class="row"> 
                                <ul class="jobslist newjbox row">
                                @if(isset($custom_jobs) && count($custom_jobs))
                                @foreach($custom_jobs as $job)
                                <!--Job start-->
                                <li class="col-md-12">
                                    <div class="jobint">
                                        <div class="row">
                                           
                                            <div class="col-md-12 col-sm-6">
                                                <h4><a href="{{route('custom.job.details', [$job->id])}}" title="{{$job->title}}">{{$job->title}}</a></h4>
                                                <div class="company">Location - <span>{{$job->location}}</span></div>
                                                <div class="jobloc">
                                                    Published Date:
                                                    <label class="fulltime" title=""> 
                                                        <?php

                                                        $date=date_create($job->published_date);
                                                        echo date_format($date,"F j, Y, l");
                                                         ?>
                                                        </label> 
                                                </div>
                                            </div>                       
                                        </div>
                                    </div>
                                </li>
                                <!--Job end--> 
                                @endforeach
                                @endif
                            </ul>
                    </div>
			</div>
        </div>
    </div>
</div>
@include('includes.footer')
@endsection