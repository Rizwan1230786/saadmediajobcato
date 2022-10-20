@extends('layouts.app')

@section('content')

    <!-- Header start -->
    @if (!empty($country))
        @include('includes.countryheader')
    @else
        @include('includes.header')
    @endif

    <!-- Header end -->

    <!-- Inner Page Title start -->

    @include('includes.inner_page_title', ['page_title' => __('Other Website Job Listing')])


    @include('flash::message')


    <!-- Inner Page Title end -->

    <div class="listpgWraper">

        <div class="container">



            <form action="{{ route('job.list') }}" method="get">

                <!-- Search Result and sidebar start -->
                @if (!empty($country))
                    <div class="row">

                        <div class="col-lg-1">

                        </div>
                        <div class="col-lg-10 col-sm-12">

                            <br>
                            <br><br>
                            <h4 class="widget-title">{{ __('Jobs on Other Websites') }}</h4>
                            <ul class="searchList">

                                <!-- job start -->
                                <li>

                                    <div class="row">

                                        <div class="col-md-8 col-sm-8">

                                            <div class="jobimg">
                                                {{ ImgUploader::print_image("other_jobs/$getTitle->logo", 100, 100) }}</div>

                                            <div class="jobinfo">

                                                <h3><a href="#"
                                                        title="{{ $getTitle->title }}">{{ $getTitle->title }}</a>
                                                </h3>

                                                <div class="companyName"><a href="#" target="_blank"
                                                        title="">{{ $getTitle->company_name }}</a></div>

                                                <div class="location">

                                                    <label class="fulltime" title="#">{{ $getTitle->job_type }}</label>
                                                    <span>Apply Before : {{ $getTitle->apply_before }}</span>
                                                </div>

                                            </div>

                                            <div class="clearfix"></div>

                                        </div>

                                        <div class="col-md-4 col-sm-4">

                                            <div class="listbtn"><a href="{{ $getTitle->url }}"
                                                    target="_blank">{{ __('Visit Site') }}</a></div>

                                        </div>

                                    </div>

                                    <p>{{ str_limit(strip_tags($getTitle->description), 150, '...') }}</p>

                                </li>

                                <!-- job end -->


                                <!-- job end -->
                            </ul>
                            <br>
                            <ul class="searchList">

                                <!-- job start -->

                                @if (isset($other_job_details) && count($other_job_details))
                                    <?php $count_1 = 1; ?> @foreach ($other_job_details as $job)
                                        <li>

                                            <div class="row">

                                                <div class="col-md-8 col-sm-8">

                                                    <div class="jobimg">
                                                        {{ ImgUploader::print_image("other_jobs/$job->logo", 100, 100) }}
                                                    </div>

                                                    <div class="jobinfo">

                                                        <h3><a href="#"
                                                                title="{{ $job->title }}">{{ $job->title }}</a></h3>

                                                        <div class="companyName"><a href="#" target="_blank"
                                                                title="">{{ $job->company_name }}</a></div>

                                                        <div class="location">

                                                            <label class="fulltime"
                                                                title="#">{{ $job->job_type }}</label>
                                                            <span>Apply Before : {{ $job->apply_before }}</span>
                                                        </div>

                                                    </div>

                                                    <div class="clearfix"></div>

                                                </div>

                                                <div class="col-md-4 col-sm-4">

                                                    <div class="listbtn"><a href="{{ $job->url }}"
                                                            target="_blank">{{ __('Visit Site') }}</a></div>

                                                </div>

                                            </div>

                                            <p>{{ str_limit(strip_tags($job->description), 150, '...') }}</p>

                                        </li>

                                        <!-- job end -->
                                    @endforeach
                                @endif

                                <!-- job end -->
                            </ul>





                        </div>


                    </div>
                @else
                    <div class="row">

                        <div class="col-lg-1">

                        </div>
                        <div class="col-lg-10 col-sm-12">

                            <br>
                            <br><br>
                            <h4 class="widget-title">{{ __('Jobs on Other Websites') }}</h4>
                            <ul class="searchList">

                                <!-- job start -->
                                <li>

                                    <div class="row">

                                        <div class="col-md-8 col-sm-8">

                                            <div class="jobimg">
                                                {{ ImgUploader::print_image("other_jobs/$getTitle->logo", 100, 100) }}
                                            </div>

                                            <div class="jobinfo">

                                                <h3><a href="#"
                                                        title="{{ $getTitle->title }}">{{ $getTitle->title }}</a>
                                                </h3>

                                                <div class="companyName"><a href="#" target="_blank"
                                                        title="">{{ $getTitle->company_name }}</a></div>

                                                <div class="location">

                                                    <label class="fulltime"
                                                        title="#">{{ $getTitle->job_type }}</label>
                                                    <span>Apply Before : {{ $getTitle->apply_before }}</span>
                                                </div>

                                            </div>

                                            <div class="clearfix"></div>

                                        </div>

                                        <div class="col-md-4 col-sm-4">

                                            <div class="listbtn"><a href="{{ $getTitle->url }}"
                                                    target="_blank">{{ __('Visit Site') }}</a></div>

                                        </div>

                                    </div>

                                    <p>{{ str_limit(strip_tags($getTitle->description), 150, '...') }}</p>

                                </li>

                                <!-- job end -->


                                <!-- job end -->
                            </ul>
                            <br>
                            <ul class="searchList">

                                <!-- job start -->

                                @if (isset($other_job_details) && count($other_job_details))
                                    <?php $count_1 = 1; ?> @foreach ($other_job_details as $job)
                                        <li>

                                            <div class="row">

                                                <div class="col-md-8 col-sm-8">

                                                    <div class="jobimg">
                                                        {{ ImgUploader::print_image("other_jobs/$job->logo", 100, 100) }}
                                                    </div>

                                                    <div class="jobinfo">

                                                        <h3><a href="#"
                                                                title="{{ $job->title }}">{{ $job->title }}</a></h3>

                                                        <div class="companyName"><a href="#" target="_blank"
                                                                title="">{{ $job->company_name }}</a></div>

                                                        <div class="location">

                                                            <label class="fulltime"
                                                                title="#">{{ $job->job_type }}</label>
                                                            <span>Apply Before : {{ $job->apply_before }}</span>
                                                        </div>

                                                    </div>

                                                    <div class="clearfix"></div>

                                                </div>

                                                <div class="col-md-4 col-sm-4">

                                                    <div class="listbtn"><a href="{{ $job->url }}"
                                                            target="_blank">{{ __('Visit Site') }}</a></div>

                                                </div>

                                            </div>

                                            <p>{{ str_limit(strip_tags($job->description), 150, '...') }}</p>

                                        </li>

                                        <!-- job end -->
                                    @endforeach
                                @endif

                                <!-- job end -->
                            </ul>





                        </div>


                    </div>
                @endif

            </form>

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
