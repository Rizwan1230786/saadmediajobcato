@if(isset($customJobs) && count($customJobs))
<div class="section">
    <div class="container"> 
        <!-- title start -->
        <div class="titleTop">
            <h3>{{__('Custom')}} <span>{{__('Jobs')}} </span></h3>
        </div>
        <!-- title end --> 

        <!--Custom Job start-->
        <ul class="jobslist row">
            @foreach($customJobs as $customJob)
            <?php $newspaper = $customJob->news_paper; ?>
            @if(null !== $newspaper)
            <!--Job start-->
            <li class="col-md-6">
                <div class="jobint">
                    <div class="row">
                        <div class="col-lg-2 col-md-2">
                            <a href="{{route('custom.job.details', [$customJob->id])}}" title="{{$customJob->title}}"></a>
                        </div>
                        <div class="col-lg-7 col-md-7">
                            <h4><a href="{{route('custom.job.details', [$customJob->id])}}" title="{{$customJob->title}}">{{$customJob->title}}</a></h4>
                            <div class="newspaper">{{$newspaper}}</a></div>
                        </div>
                        <div class="col-lg-3 col-md-3"><a href="{{route('custom.job.details', [$customJob->id])}}" class="applybtn">{{__('View Detail')}}</a></div>
                    </div>
                </div>
            </li>
            <!--Job end--> 
            @endif
            @endforeach
        </ul>
        <!--Custom Job end--> 
    </div>
</div>
@endif