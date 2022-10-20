@extends('layouts.app')

@section('content')

    <!-- Header start -->
    @if (!empty($country))
        @include('includes.countryheader')
    @endif
    @if ($country == null)
        @include('includes.header')
    @endif
    <!-- Header end -->

    <!-- Inner Page Title start -->

    @include('includes.inner_page_title', ['page_title' => __('Job Listing')])


    @include('flash::message')

    @include('includes.inner_top_search')


    <!-- Inner Page Title end -->
    <div class="listpgWraper">
        <div class="container">
            <form action="{{ route('job.list') }}" method="get">
                <!-- Search Result and sidebar start -->
                <div class="row">
                    @if (!empty($country))
                        @include('includes.countrybasejobs_list_side_bar')
                        <div class="col-lg-6 col-sm-12">
                            <!-- Search List -->
                            <ul class="searchList">
                                <!-- job start -->
                                @if (isset($jobs) && count($jobs))
                                    <?php $count_1 = 1; ?>
                                    @foreach ($jobs as $job)
                                        @php $company = $job->getCompany(); @endphp
                                        @if (isset($company))
                                            @if ($count_1 == 7)
                                                <li class="inpostad">{!! $siteSetting->listing_page_horizontal_ad !!}</li>
                                            @else
                                                <li>
                                                    <div class="row">
                                                        <div class="col-md-8 col-sm-8">
                                                            <div class="jobimg">{{ $company->printCompanyImage() }}</div>
                                                            <div class="jobinfo">
                                                                <h3><a href=" {{ url('jobdetail'.'/'.$job->slug.'_in_'.$country->slug) }}"
                                                                        title="{{ $job->title }}">{{ $job->title }}</a></h3>
                                                                <div class="companyName"><a
                                                                        href=" {{ url('jobdetail'.'/'.$job->slug.'_in_'.$country->slug) }}"
                                                                        title="{{ $company->name }}">{{ $company->name }}</a>
                                                                </div>
                                                                <div class="location">
                                                                    <label class="fulltime"
                                                                        title="{{ $job->getJobType('job_type') }}">{{ $job->getJobType('job_type') }}</label>
                                                                    - <span>{{ $job->getCity('city') }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-4">
                                                            <div class="listbtn"><a
                                                                    href=" {{ url('jobdetail'.'/'.$job->slug.'_in_'.$country->slug) }}">{{ __('View Details') }}</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p>{{ str_limit(strip_tags($job->description), 150, '...') }}</p>
                                                </li>
                                            @endif
                                            <?php $count_1++; ?>
                                        @endif
                                        <!-- job end -->
                                    @endforeach
                                @endif
                                <!-- job end -->
                            </ul>
                            <!-- Pagination Start -->
                            <div class="pagiWrap">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="showreslt">
                                            {{ __('Showing Pages') }} : {{ $jobs->firstItem() }} - {{ $jobs->lastItem() }}
                                            {{ __('Total') }} {{ $jobs->total() }}
                                        </div>
                                    </div>
                                    <div class="col-md-7 text-right">
                                        @if (isset($jobs) && count($jobs))
                                            {{ $jobs->appends(request()->query())->links() }}
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- Pagination end -->
                            @if (isset($other_jobs) && count($other_jobs))
                                <br><br><br>
                                @if (!empty($country))
                                    <h4 class="widget-title">Jobs on Other Websites in {{ $country->country ?? 'empty' }}</h4>
                                @else
                                    <h4 class="widget-title">{{ __('Jobs on Other Websites') }}</h4>
                                @endif
                                <br>
                                <ul class="searchList">
                                    <!-- job start -->
                                    <?php $count_1 = 1; ?>
                                    @foreach ($other_jobs as $job)
                                        <li>
                                            <div class="row">
                                                <div class="col-md-8 col-sm-8">
                                                    <div class="jobimg">
                                                        {{ ImgUploader::print_image("other_jobs/$job->logo", 100, 100) }}</div>
                                                    <div class="jobinfo">
                                                        <h3><a href="{{ url('other-job-detail/'.$job->id.'/'.$country->slug) }}"
                                                                title="{{ $job->title }}">{{ $job->title }}</a></h3>
                                                        <div class="companyName"><a href="#" target="_blank"
                                                                title="">{{ $job->company_name }}</a></div>
                                                        <div class="location">
                                                            <label class="fulltime" title="#">{{ $job->job_type }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="col-md-4 col-sm-4">
                                                    <div class="listbtn"><a
                                                            href="{{ url('other-job-detail/'.$job->id.'/'.$country->slug) }}">{{ __('View All') }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <p>{{ str_limit(strip_tags($job->description), 150, '...') }}</p>
                                        </li>
                                        <!-- job end -->
                                    @endforeach
                                    <!-- job end -->
                                </ul>
                            @endif
                            @if (isset($custom_jobs) && count($custom_jobs))
                                <br><br><br>
                                @if (!empty($country))
                                    <h4 class="widget-title">{{ __('Custom') }} {{ __('Jobs') }} in
                                        {{ $country->country ?? 'no' }}</h4>
                                @else
                                    <h4 class="widget-title">{{ __('Custom') }} {{ __('Jobs') }}</h4>
                                @endif
                                <br>
                                <ul class="searchList">
                                    <!-- job start -->
                                    <?php $count_1 = 1; ?>
                                    @foreach ($custom_jobs as $customjob)
                                        <li>
                                            <div class="row">
                                                <div class="col-md-8 col-sm-8">
                                                    <div class="jobimg"><img
                                                            src="{{ url('public/custom_jobs/' . $customjob->image) }}"
                                                            style="max-width=100px; max-height:100px;"alt=""></div>
                                                    {{--                                    <div class="jobimg">{{ ImgUploader::print_image("custom_jobs/$customjob->logo", 100, 100) }}</div> --}}
                                                    <div class="jobinfo">
                                                        <h3><a href="{{ url('custom-job-details/'.$customjob->id.'/'.$country->slug) }}"
                                                                title="{{ $customjob->title }}">{{ $customjob->title }}</a>
                                                        </h3>
                                                        <div class="companyName"><a href="#" target="_blank"
                                                                title="">{{ $customjob->company_name }}</a></div>
                                                        <div class="location">
                                                            <label class="fulltime"
                                                                title="#">{{ $customjob->job_type }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="col-md-4 col-sm-4">
                                                    <div class="listbtn"><a
                                                            href="{{ url('custom-job-details/'.$customjob->id.'/'.$country->slug) }}">{{ __('View Details') }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <p>{{ str_limit(strip_tags($customjob->description), 150, '...') }}</p>
                                        </li>
                                        <!-- job end -->
                                    @endforeach
                                    <!-- job end -->
                                </ul>
                            @endif
                        </div>
                        <div class="col-lg-3 col-sm-6 pull-right">
                            <!-- Sponsord By -->
                            <div class="sidebar">
                                <h4 class="widget-title">{{ __('Sponsord By') }}</h4>
                                <div class="gad">{!! $siteSetting->listing_page_vertical_ad !!}</div>
                            </div>
                        </div>
                   @else
                    @include('includes.job_list_side_bar')
                    <div class="col-lg-6 col-sm-12">
                        <!-- Search List -->
                        <ul class="searchList">
                            <!-- job start -->
                            @if (isset($jobs) && count($jobs))
                                <?php $count_1 = 1; ?>
                                @foreach ($jobs as $job)
                                    @php $company = $job->getCompany(); @endphp
                                    @if (isset($company))
                                        @if ($count_1 == 7)
                                            <li class="inpostad">{!! $siteSetting->listing_page_horizontal_ad !!}</li>
                                        @else
                                            <li>
                                                <div class="row">
                                                    <div class="col-md-8 col-sm-8">
                                                        <div class="jobimg">{{ $company->printCompanyImage() }}</div>
                                                        <div class="jobinfo">
                                                            <h3><a href="{{ route('job.detail', [$job->slug]) }}"
                                                                    title="{{ $job->title }}">{{ $job->title }}</a></h3>
                                                            <div class="companyName"><a
                                                                    href="{{ route('company.detail', $company->slug) }}"
                                                                    title="{{ $company->name }}">{{ $company->name }}</a>
                                                            </div>
                                                            <div class="location">
                                                                <label class="fulltime"
                                                                    title="{{ $job->getJobType('job_type') }}">{{ $job->getJobType('job_type') }}</label>
                                                                - <span>{{ $job->getCity('city') }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4">
                                                        <div class="listbtn"><a
                                                                href="{{ route('job.detail', [$job->slug]) }}">{{ __('View Details') }}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p>{{ str_limit(strip_tags($job->description), 150, '...') }}</p>
                                            </li>
                                        @endif
                                        <?php $count_1++; ?>
                                    @endif
                                    <!-- job end -->
                                @endforeach
                            @endif
                            <!-- job end -->
                        </ul>
                        <!-- Pagination Start -->
                        <div class="pagiWrap">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="showreslt">
                                        {{ __('Showing Pages') }} : {{ $jobs->firstItem() }} - {{ $jobs->lastItem() }}
                                        {{ __('Total') }} {{ $jobs->total() }}
                                    </div>
                                </div>
                                <div class="col-md-7 text-right">
                                    @if (isset($jobs) && count($jobs))
                                        {{ $jobs->appends(request()->query())->links() }}
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- Pagination end -->
                        @if (isset($other_jobs) && count($other_jobs))
                            <br><br><br>
                            @if (!empty($country))
                                <h4 class="widget-title">Jobs on Other Websites in {{ $country->country ?? 'empty' }}</h4>
                            @else
                                <h4 class="widget-title">{{ __('Jobs on Other Websites') }}</h4>
                            @endif
                            <br>
                            <ul class="searchList">
                                <!-- job start -->
                                <?php $count_1 = 1; ?>
                                @foreach ($other_jobs as $job)
                                    <li>
                                        <div class="row">
                                            <div class="col-md-8 col-sm-8">
                                                <div class="jobimg">
                                                    {{ ImgUploader::print_image("other_jobs/$job->logo", 100, 100) }}</div>
                                                <div class="jobinfo">
                                                    <h3><a href="{{ route('other.job.detail', [$job->id]) }}"
                                                            title="{{ $job->title }}">{{ $job->title }}</a></h3>
                                                    <div class="companyName"><a href="#" target="_blank"
                                                            title="">{{ $job->company_name }}</a></div>
                                                    <div class="location">
                                                        <label class="fulltime" title="#">{{ $job->job_type }}</label>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="col-md-4 col-sm-4">
                                                <div class="listbtn"><a
                                                        href="{{ route('other.job.detail', [$job->id]) }}">{{ __('View Details') }}</a>
                                                </div>
                                            </div>
                                        </div>
                                        <p>{{ str_limit(strip_tags($job->description), 150, '...') }}</p>
                                    </li>
                                    <!-- job end -->
                                @endforeach
                                <!-- job end -->
                            </ul>
                        @endif
                        @if (isset($custom_jobs) && count($custom_jobs))
                            <br><br><br>
                            @if (!empty($country))
                                <h4 class="widget-title">{{ __('Custom') }} {{ __('Jobs') }} in
                                    {{ $country->country ?? 'no' }}</h4>
                            @else
                                <h4 class="widget-title">{{ __('Custom') }} {{ __('Jobs') }}</h4>
                            @endif
                            <br>
                            <ul class="searchList">
                                <!-- job start -->
                                <?php $count_1 = 1; ?>
                                @foreach ($custom_jobs as $customjob)
                                    <li>
                                        <div class="row">
                                            <div class="col-md-8 col-sm-8">
                                                <div class="jobimg"><img
                                                        src="{{ url('public/custom_jobs/' . $customjob->image) }}"
                                                        style="max-width=100px; max-height:100px;"alt=""></div>
                                                {{--                                    <div class="jobimg">{{ ImgUploader::print_image("custom_jobs/$customjob->logo", 100, 100) }}</div> --}}
                                                <div class="jobinfo">
                                                    <h3><a href="{{ route('custom.job.details', [$customjob->id]) }}"
                                                            title="{{ $customjob->title }}">{{ $customjob->title }}</a>
                                                    </h3>
                                                    <div class="companyName"><a href="#" target="_blank"
                                                            title="">{{ $customjob->company_name }}</a></div>
                                                    <div class="location">
                                                        <label class="fulltime"
                                                            title="#">{{ $customjob->job_type }}</label>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="col-md-4 col-sm-4">
                                                <div class="listbtn"><a
                                                        href="{{ route('custom.job.details', [$customjob->id]) }}">{{ __('View Details') }}</a>
                                                </div>
                                            </div>
                                        </div>
                                        <p>{{ str_limit(strip_tags($customjob->description), 150, '...') }}</p>
                                    </li>
                                    <!-- job end -->
                                @endforeach
                                <!-- job end -->
                            </ul>
                        @endif
                    </div>
                    <div class="col-lg-3 col-sm-6 pull-right">
                        <!-- Sponsord By -->
                        <div class="sidebar">
                            <h4 class="widget-title">{{ __('Sponsord By') }}</h4>
                            <div class="gad">{!! $siteSetting->listing_page_vertical_ad !!}</div>
                        </div>
                    </div>
                    @endif
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="show_alert" role="dialog">

        <div class="modal-dialog">



            <!-- Modal content-->

            <div class="modal-content">

                <form id="submit_alert">

                    @csrf

                    <input type="hidden" name="search" value="{{ Request::get('search') }}">

                    <input type="hidden" name="country_id"
                        value="@if (isset(Request::get('country_id')[0])) {{ Request::get('country_id')[0] }} @endif">

                    <input type="hidden" name="state_id"
                        value="@if (isset(Request::get('state_id')[0])) {{ Request::get('state_id')[0] }} @endif">

                    <input type="hidden" name="city_id"
                        value="@if (isset(Request::get('city_id')[0])) {{ Request::get('city_id')[0] }} @endif">

                    <input type="hidden" name="functional_area_id"
                        value="@if (isset(Request::get('functional_area_id')[0])) {{ Request::get('functional_area_id')[0] }} @endif">

                    <div class="modal-header">

                        <h4 class="modal-title">Job Alert</h4>

                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                    </div>

                    <div class="modal-body">



                        <h3>Get the latest <strong>{{ ucfirst(Request::get('search')) }}</strong> jobs @if (Request::get('location') != '')
                                in <strong>{{ ucfirst(Request::get('location')) }}</strong>
                            @endif sent straight to your inbox</h3>



                        <div class="form-group">

                            <input type="text" class="form-control" name="email" id="email"
                                placeholder="Enter your Email"
                                value="@if (Auth::check()) {{ Auth::user()->email }} @endif">

                        </div>

                    </div>

                    <div class="modal-footer">

                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                        <button type="submit" class="btn btn-primary">Submit</button>

                    </div>

                </form>

            </div>



        </div>

    </div>
    @if (!empty($country))
        @include('includes.countrybase_footer')
    @else
        @include('includes.footer')
    @endif
@endsection

@push('styles')
    <style type="text/css">
        .searchList li .jobimg {

            min-height: 80px;

        }

        .hide_vm_ul {

            height: 100px;

            overflow: hidden;

        }

        .hide_vm {

            display: none !important;

        }

        .view_more {

            cursor: pointer;

        }
    </style>
@endpush

@push('scripts')
    <script>
        $('.btn-job-alert').on('click', function() {

            $('#show_alert').modal('show');

        })

        $(document).ready(function($) {

            $("form").submit(function() {

                $(this).find(":input").filter(function() {

                    return !this.value;

                }).attr("disabled", "disabled");

                return true;

            });

            $("form").find(":input").prop("disabled", false);



            $(".view_more_ul").each(function() {

                if ($(this).height() > 100)

                {

                    $(this).addClass('hide_vm_ul');

                    $(this).next().removeClass('hide_vm');

                }

            });

            $('.view_more').on('click', function(e) {

                e.preventDefault();

                $(this).prev().removeClass('hide_vm_ul');

                $(this).addClass('hide_vm');

            });



        });

        if ($("#submit_alert").length > 0) {

            $("#submit_alert").validate({



                rules: {

                    email: {

                        required: true,

                        maxlength: 5000,

                        email: true

                    }

                },

                messages: {

                    email: {

                        required: "Email is required",

                    }



                },

                submitHandler: function(form) {

                    $.ajaxSetup({

                        headers: {

                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                        }

                    });

                    $.ajax({

                        url: "{{ route('subscribe.alert') }}",

                        type: "GET",

                        data: $('#submit_alert').serialize(),

                        success: function(response) {

                            $("#submit_alert").trigger("reset");

                            $('#show_alert').modal('hide');

                            swal({

                                title: "Success",

                                text: response["msg"],

                                icon: "success",

                                button: "OK",

                            });

                        }

                    });

                }

            })

        }
    </script>

    @include('includes.country_state_city_js')
@endpush
