@if(isset($otherJobs) && count($otherJobs))
<div class="section">
    <div class="container"> 
        <!-- title start -->
        <div class="titleTop">
            <h3>{{__('Other')}} <span>{{__('Jobs')}}</span></h3>
        </div>
        <!-- title end --> 

        <!--Featured Job start-->
        <ul class="jobslist row">
            @foreach($otherJobs as $otherJob)
            <?php $company = $otherJob->company_name; ?>
            @if(null !== $company)
            <!--Job start-->
            <li class="col-md-6">
                <div class="jobint">
                    <div class="row">
                        <div class="col-lg-2 col-md-2">
                            <a href="{{route('other.job.detail', [$otherJob->id])}}" title="{{$otherJob->title}}"></a>
                        </div>
                        <div class="col-lg-7 col-md-7">
                            <h4><a href="{{route('other.job.detail', [$otherJob->id])}}" title="{{$otherJob->title}}">{{$otherJob->title}}</a></h4>
                            <div class="comapny">{{$company}}</a></div>
                        </div>
                        <div class="col-lg-3 col-md-3"><a href="{{route('other.job.detail', [$otherJob->id])}}" class="applybtn">{{__('View Detail')}}</a></div>
                    </div>
                </div>
            </li>
            <!--Job end--> 
            @endif
            @endforeach
        </ul>
        <!--Featured Job end--> 
    </div>
</div>
@endif