@extends('layouts.app')
@section('content')
<!-- Header start -->
@include('includes.header')
<!-- Header end --> 
<!-- Inner Page Title start -->
@include('includes.inner_page_title', ['page_title'=>__('Company Posted Jobs')])
<!-- Inner Page Title end -->
<div class="listpgWraper">
    <div class="container">
        <div class="row">
            @include('includes.company_dashboard_menu')

            <div class="col-md-9 col-sm-8"> 
                <div class="myads">
                    <h3>{{__('Company Posted Jobs')}}</h3>
                    <ul class="searchList">
                        <!-- job start --> 
                        @if(isset($jobs) && count($jobs))
                        @foreach($jobs as $job)
                        @php $company = $job->getCompany(); @endphp
                        @if(null !== $company)
                        <li id="job_li_{{$job->id}}">
                            <div class="row">
                                <div class="col-md-9 col-sm-9">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="jobimg">{{$company->printCompanyImage()}}</div>
                                            <div class="jobinfo">
                                                <h3><a href="{{route('job.detail', [$job->slug])}}" title="{{$job->title}}">{{$job->title}}</a></h3>
                                                <div class="companyName"><a href="{{route('company.detail', $company->slug)}}" title="{{$company->name}}">{{$company->name}}</a></div>
                                                <div class="location">
                                                    <label class="fulltime" title="{{$job->getJobShift('job_shift')}}">{{$job->getJobShift('job_shift')}}</label>
                                                    - <span>{{$job->getCity('city')}}</span></div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 py-3">
                                            <a class="job-list-btn btn btn-primary fa fa-pencil" href="{{route('edit.front.job', [$job->id])}}" title="{{__('Edit')}}"> &nbsp;{{__('Edit')}}</a>
                                            <a class="job-list-btn btn btn-danger fa fa-trash" href="javascript:;" onclick="deleteJob({{$job->id}});" title="{{__('Delete')}}"> &nbsp;{{__('Delete')}}</a>
                                        </div>
                                        <div class="col-md-12 col-sm-12 py-3">
                                            <p>{{str_limit(strip_tags($job->description), 150, '...')}}</p>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-md-3 col-sm-3"> 
                                    <a class="no-decoration" title="List of all applied candidates to this job" href="{{route('list.applied.users', [$job->id])}}">    
                                        <div class="card text-center">
                                            <div class="card-body">
                                                <h1>{{$job->applied}}</h1>
                                                <h3>Applied</h3>
                                            </div>
                                        </div>           
                                    </a>
                                    <a class="job-list-btn btn btn-info btn-block my-2 btn-lg fa fa-user" href="{{route('list.favourite.applied.users', [$job->id])}}" title="{{__('Short List')}}">&nbsp;{{__('Short List')}}</a>
                                </div>
                            </div>
                            
                        </li>
                        <!-- job end --> 
                        @endif
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
@push('scripts')
<script type="text/javascript">
    function deleteJob(id) {
    var msg = 'Are you sure?';
    if (confirm(msg)) {
    $.post("{{ route('delete.front.job') }}", {id: id, _method: 'DELETE', _token: '{{ csrf_token() }}'})
            .done(function (response) {
            if (response == 'ok')
            {
            $('#job_li_' + id).remove();
            } else
            {
            alert('Request Failed!');
            }
            });
    }
    }
</script>
@endpush
