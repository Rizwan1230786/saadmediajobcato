<?php $__env->startSection('content'); ?>

    <!-- Header start -->
    <?php if(!empty($country)): ?>
        <?php echo $__env->make('includes.countryheader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php if($country == null): ?>
        <?php echo $__env->make('includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <!-- Header end -->

    <!-- Inner Page Title start -->

    <?php echo $__env->make('includes.inner_page_title', ['page_title' => __('Job Listing')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('includes.inner_top_search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <!-- Inner Page Title end -->
    <div class="listpgWraper">
        <div class="container">
            <?php if(!empty($country)): ?>
                <form action="<?php echo e(route('job.country.list',['slug'=>$country->slug])); ?>" method="get">
                    <!-- Search Result and sidebar start -->
                    <div class="row">
                        <?php echo $__env->make('includes.countrybasejobs_list_side_bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <div class="col-lg-6 col-sm-12">
                            <!-- Search List -->
                            <ul class="searchList">
                                <!-- job start -->
                                <?php if(isset($jobs) && count($jobs)): ?>
                                    <?php $count_1 = 1; ?>
                                    <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $company = $job->getCompany(); ?>
                                        <?php if(isset($company)): ?>
                                            <?php if($count_1 == 7): ?>
                                                <li class="inpostad"><?php echo $siteSetting->listing_page_horizontal_ad; ?></li>
                                            <?php else: ?>
                                                <li>
                                                    <div class="row">
                                                        <div class="col-md-8 col-sm-8">
                                                            <div class="jobimg"><?php echo e($company->printCompanyImage()); ?></div>
                                                            <div class="jobinfo">
                                                                <h3><a href=" <?php echo e(url('jobdetail' . '/' . $job->slug . '_in_' . $country->slug)); ?>"
                                                                        title="<?php echo e($job->title); ?>"><?php echo e($job->title); ?></a>
                                                                </h3>
                                                                <div class="companyName"><a
                                                                        href=" <?php echo e(url('jobdetail' . '/' . $job->slug . '_in_' . $country->slug)); ?>"
                                                                        title="<?php echo e($company->name); ?>"><?php echo e($company->name); ?></a>
                                                                </div>
                                                                <div class="location">
                                                                    <label class="fulltime"
                                                                        title="<?php echo e($job->getJobType('job_type')); ?>"><?php echo e($job->getJobType('job_type')); ?></label>
                                                                    - <span><?php echo e($job->getCity('city')); ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-4">
                                                            <div class="listbtn"><a
                                                                    href=" <?php echo e(url('jobdetail' . '/' . $job->slug . '_in_' . $country->slug)); ?>"><?php echo e(__('View Details')); ?></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p><?php echo e(str_limit(strip_tags($job->description), 150, '...')); ?></p>
                                                </li>
                                            <?php endif; ?>
                                            <?php $count_1++; ?>
                                        <?php endif; ?>
                                        <!-- job end -->
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                <!-- job end -->
                            </ul>
                            <!-- Pagination Start -->
                            <div class="pagiWrap">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="showreslt">
                                            <?php echo e(__('Showing Pages')); ?> : <?php echo e($jobs->firstItem()); ?> -
                                            <?php echo e($jobs->lastItem()); ?>

                                            <?php echo e(__('Total')); ?> <?php echo e($jobs->total()); ?>

                                        </div>
                                    </div>
                                    <div class="col-md-7 text-right">
                                        <?php if(isset($jobs) && count($jobs)): ?>
                                            <?php echo e($jobs->appends(request()->query())->links()); ?>

                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <!-- Pagination end -->
                            <?php if(isset($other_jobs) && count($other_jobs)): ?>
                                <br><br><br>
                                <?php if(!empty($country)): ?>
                                    <h4 class="widget-title">Jobs on Other Websites in <?php echo e($country->country ?? 'empty'); ?>

                                    </h4>
                                <?php else: ?>
                                    <h4 class="widget-title"><?php echo e(__('Jobs on Other Websites')); ?></h4>
                                <?php endif; ?>
                                <br>
                                <ul class="searchList">
                                    <!-- job start -->
                                    <?php $count_1 = 1; ?>
                                    <?php $__currentLoopData = $other_jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <div class="row">
                                                <div class="col-md-8 col-sm-8">
                                                    <div class="jobimg">
                                                        <?php echo e(ImgUploader::print_image("other_jobs/$job->logo", 100, 100)); ?>

                                                    </div>
                                                    <div class="jobinfo">
                                                        <h3><a href="<?php echo e(url('other-job-detail/' . $job->id . '/' . $country->slug)); ?>"
                                                                title="<?php echo e($job->title); ?>"><?php echo e($job->title); ?></a></h3>
                                                        <div class="companyName"><a href="#" target="_blank"
                                                                title=""><?php echo e($job->company_name); ?></a></div>
                                                        <div class="location">
                                                            <label class="fulltime"
                                                                title="#"><?php echo e($job->job_type); ?></label>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="col-md-4 col-sm-4">
                                                    <div class="listbtn"><a
                                                            href="<?php echo e(url('other-job-detail/' . $job->id . '/' . $country->slug)); ?>"><?php echo e(__('View All')); ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <p><?php echo e(str_limit(strip_tags($job->description), 150, '...')); ?></p>
                                        </li>
                                        <!-- job end -->
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <!-- job end -->
                                </ul>
                            <?php endif; ?>
                            <?php if(isset($custom_jobs) && count($custom_jobs)): ?>
                                <br><br><br>
                                <?php if(!empty($country)): ?>
                                    <h4 class="widget-title"><?php echo e(__('Custom')); ?> <?php echo e(__('Jobs')); ?> in
                                        <?php echo e($country->country ?? 'no'); ?></h4>
                                <?php else: ?>
                                    <h4 class="widget-title"><?php echo e(__('Custom')); ?> <?php echo e(__('Jobs')); ?></h4>
                                <?php endif; ?>
                                <br>
                                <ul class="searchList">
                                    <!-- job start -->
                                    <?php $count_1 = 1; ?>
                                    <?php $__currentLoopData = $custom_jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customjob): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <div class="row">
                                                <div class="col-md-8 col-sm-8">
                                                    <div class="jobimg"><img
                                                            src="<?php echo e(url('public/custom_jobs/' . $customjob->image)); ?>"
                                                            style="max-width=100px; max-height:100px;"alt=""></div>
                                                    
                                                    <div class="jobinfo">
                                                        <h3><a href="<?php echo e(url('custom-job-details/' . $customjob->id . '/' . $country->slug)); ?>"
                                                                title="<?php echo e($customjob->title); ?>"><?php echo e($customjob->title); ?></a>
                                                        </h3>
                                                        <div class="companyName"><a href="#" target="_blank"
                                                                title=""><?php echo e($customjob->company_name); ?></a></div>
                                                        <div class="location">
                                                            <label class="fulltime"
                                                                title="#"><?php echo e($customjob->job_type); ?></label>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="col-md-4 col-sm-4">
                                                    <div class="listbtn"><a
                                                            href="<?php echo e(url('custom-job-details/' . $customjob->id . '/' . $country->slug)); ?>"><?php echo e(__('View Details')); ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <p><?php echo e(str_limit(strip_tags($customjob->description), 150, '...')); ?></p>
                                        </li>
                                        <!-- job end -->
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <!-- job end -->
                                </ul>
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-3 col-sm-6 pull-right">
                            <!-- Sponsord By -->
                            <div class="sidebar">
                                <h4 class="widget-title"><?php echo e(__('Sponsord By')); ?></h4>
                                <div class="gad"><?php echo $siteSetting->listing_page_vertical_ad; ?></div>
                            </div>
                        </div>
                    </div>
                    <?php echo $__env->make('includes.country.states', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
                </form>
            <?php else: ?>
                <form action="<?php echo e(route('job.list')); ?>" method="get">
                    <div class="row">
                        <?php echo $__env->make('includes.job_list_side_bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <div class="col-lg-6 col-sm-12">
                            <!-- Search List -->
                            <ul class="searchList">
                                <!-- job start -->
                                <?php if(isset($jobs) && count($jobs)): ?>
                                    <?php $count_1 = 1; ?>
                                    <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $company = $job->getCompany(); ?>
                                        <?php if(isset($company)): ?>
                                            <?php if($count_1 == 7): ?>
                                                <li class="inpostad"><?php echo $siteSetting->listing_page_horizontal_ad; ?></li>
                                            <?php else: ?>
                                                <li>
                                                    <div class="row">
                                                        <div class="col-md-8 col-sm-8">
                                                            <div class="jobimg"><?php echo e($company->printCompanyImage()); ?></div>
                                                            <div class="jobinfo">
                                                                <h3><a href="<?php echo e(route('job.detail', [$job->slug])); ?>"
                                                                        title="<?php echo e($job->title); ?>"><?php echo e($job->title); ?></a>
                                                                </h3>
                                                                <div class="companyName"><a
                                                                        href="<?php echo e(route('company.detail', $company->slug)); ?>"
                                                                        title="<?php echo e($company->name); ?>"><?php echo e($company->name); ?></a>
                                                                </div>
                                                                <div class="location">
                                                                    <label class="fulltime"
                                                                        title="<?php echo e($job->getJobType('job_type')); ?>"><?php echo e($job->getJobType('job_type')); ?></label>
                                                                    - <span><?php echo e($job->getCity('city')); ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-4">
                                                            <div class="listbtn"><a
                                                                    href="<?php echo e(route('job.detail', [$job->slug])); ?>"><?php echo e(__('View Details')); ?></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p><?php echo e(str_limit(strip_tags($job->description), 150, '...')); ?></p>
                                                </li>
                                            <?php endif; ?>
                                            <?php $count_1++; ?>
                                        <?php endif; ?>
                                        <!-- job end -->
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                <!-- job end -->
                            </ul>
                            <!-- Pagination Start -->
                            <div class="pagiWrap">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="showreslt">
                                            <?php echo e(__('Showing Pages')); ?> : <?php echo e($jobs->firstItem()); ?> -
                                            <?php echo e($jobs->lastItem()); ?>

                                            <?php echo e(__('Total')); ?> <?php echo e($jobs->total()); ?>

                                        </div>
                                    </div>
                                    <div class="col-md-7 text-right">
                                        <?php if(isset($jobs) && count($jobs)): ?>
                                            <?php echo e($jobs->appends(request()->query())->links()); ?>

                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <!-- Pagination end -->
                            <?php if(isset($other_jobs) && count($other_jobs)): ?>
                                <br><br><br>
                                <?php if(!empty($country)): ?>
                                    <h4 class="widget-title">Jobs on Other Websites in <?php echo e($country->country ?? 'empty'); ?>

                                    </h4>
                                <?php else: ?>
                                    <h4 class="widget-title"><?php echo e(__('Jobs on Other Websites')); ?></h4>
                                <?php endif; ?>
                                <br>
                                <ul class="searchList">
                                    <!-- job start -->
                                    <?php $count_1 = 1; ?>
                                    <?php $__currentLoopData = $other_jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <div class="row">
                                                <div class="col-md-8 col-sm-8">
                                                    <div class="jobimg">
                                                        <?php echo e(ImgUploader::print_image("other_jobs/$job->logo", 100, 100)); ?>

                                                    </div>
                                                    <div class="jobinfo">
                                                        <h3><a href="<?php echo e(route('other.job.detail', [$job->id])); ?>"
                                                                title="<?php echo e($job->title); ?>"><?php echo e($job->title); ?></a></h3>
                                                        <div class="companyName"><a href="#" target="_blank"
                                                                title=""><?php echo e($job->company_name); ?></a></div>
                                                        <div class="location">
                                                            <label class="fulltime"
                                                                title="#"><?php echo e($job->job_type); ?></label>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="col-md-4 col-sm-4">
                                                    <div class="listbtn"><a
                                                            href="<?php echo e(route('other.job.detail', [$job->id])); ?>"><?php echo e(__('View Details')); ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <p><?php echo e(str_limit(strip_tags($job->description), 150, '...')); ?></p>
                                        </li>
                                        <!-- job end -->
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <!-- job end -->
                                </ul>
                            <?php endif; ?>
                            <?php if(isset($custom_jobs) && count($custom_jobs)): ?>
                                <br><br><br>
                                <?php if(!empty($country)): ?>
                                    <h4 class="widget-title"><?php echo e(__('Custom')); ?> <?php echo e(__('Jobs')); ?> in
                                        <?php echo e($country->country ?? 'no'); ?></h4>
                                <?php else: ?>
                                    <h4 class="widget-title"><?php echo e(__('Custom')); ?> <?php echo e(__('Jobs')); ?></h4>
                                <?php endif; ?>
                                <br>
                                <ul class="searchList">
                                    <!-- job start -->
                                    <?php $count_1 = 1; ?>
                                    <?php $__currentLoopData = $custom_jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customjob): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <div class="row">
                                                <div class="col-md-8 col-sm-8">
                                                    <div class="jobimg"><img
                                                            src="<?php echo e(url('public/custom_jobs/' . $customjob->image)); ?>"
                                                            style="max-width=100px; max-height:100px;"alt="">
                                                    </div>
                                                    
                                                    <div class="jobinfo">
                                                        <h3><a href="<?php echo e(route('custom.job.details', [$customjob->id])); ?>"
                                                                title="<?php echo e($customjob->title); ?>"><?php echo e($customjob->title); ?></a>
                                                        </h3>
                                                        <div class="companyName"><a href="#" target="_blank"
                                                                title=""><?php echo e($customjob->company_name); ?></a></div>
                                                        <div class="location">
                                                            <label class="fulltime"
                                                                title="#"><?php echo e($customjob->job_type); ?></label>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="col-md-4 col-sm-4">
                                                    <div class="listbtn"><a
                                                            href="<?php echo e(route('custom.job.details', [$customjob->id])); ?>"><?php echo e(__('View Details')); ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <p><?php echo e(str_limit(strip_tags($customjob->description), 150, '...')); ?></p>
                                        </li>
                                        <!-- job end -->
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <!-- job end -->
                                </ul>
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-3 col-sm-6 pull-right">
                            <!-- Sponsord By -->
                            <div class="sidebar">
                                <h4 class="widget-title"><?php echo e(__('Sponsord By')); ?></h4>
                                <div class="gad"><?php echo $siteSetting->listing_page_vertical_ad; ?></div>
                            </div>
                        </div>
                    </div>
                </form>
            <?php endif; ?>
        </div>
    </div>

    <div class="modal fade" id="show_alert" role="dialog">

        <div class="modal-dialog">



            <!-- Modal content-->

            <div class="modal-content">

                <form id="submit_alert">

                    <?php echo csrf_field(); ?>

                    <input type="hidden" name="search" value="<?php echo e(Request::get('search')); ?>">

                    <input type="hidden" name="country_id"
                        value="<?php if(isset(Request::get('country_id')[0])): ?> <?php echo e(Request::get('country_id')[0]); ?> <?php endif; ?>">

                    <input type="hidden" name="state_id"
                        value="<?php if(isset(Request::get('state_id')[0])): ?> <?php echo e(Request::get('state_id')[0]); ?> <?php endif; ?>">

                    <input type="hidden" name="city_id"
                        value="<?php if(isset(Request::get('city_id')[0])): ?> <?php echo e(Request::get('city_id')[0]); ?> <?php endif; ?>">

                    <input type="hidden" name="functional_area_id"
                        value="<?php if(isset(Request::get('functional_area_id')[0])): ?> <?php echo e(Request::get('functional_area_id')[0]); ?> <?php endif; ?>">

                    <div class="modal-header">

                        <h4 class="modal-title">Job Alert</h4>

                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                    </div>

                    <div class="modal-body">



                        <h3>Get the latest <strong><?php echo e(ucfirst(Request::get('search'))); ?></strong> jobs <?php if(Request::get('location') != ''): ?>
                                in <strong><?php echo e(ucfirst(Request::get('location'))); ?></strong>
                            <?php endif; ?> sent straight to your inbox</h3>



                        <div class="form-group">

                            <input type="text" class="form-control" name="email" id="email"
                                placeholder="Enter your Email"
                                value="<?php if(Auth::check()): ?> <?php echo e(Auth::user()->email); ?> <?php endif; ?>">

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
    <?php if(!empty($country)): ?>
        <?php echo $__env->make('includes.countrybase_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php else: ?>
        <?php echo $__env->make('includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
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
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
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

                        url: "<?php echo e(route('subscribe.alert')); ?>",

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

    <?php echo $__env->make('includes.country_state_city_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\saadmediajobcato\resources\views/job/list.blade.php ENDPATH**/ ?>