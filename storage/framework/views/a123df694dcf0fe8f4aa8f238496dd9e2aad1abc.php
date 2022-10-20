

<?php $__env->startSection('content'); ?>

    <!-- Header start -->
    <?php if(!empty($country)): ?>
        <?php echo $__env->make('includes.countryheader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php else: ?>
        <?php echo $__env->make('includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <!-- Header end -->

    <!-- Inner Page Title start -->

    <?php echo $__env->make('includes.inner_page_title', ['page_title' => __('Other Website Job Listing')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <!-- Inner Page Title end -->

    <div class="listpgWraper">

        <div class="container">



            <form action="<?php echo e(route('job.list')); ?>" method="get">

                <!-- Search Result and sidebar start -->
                <?php if(!empty($country)): ?>
                <div class="row">

                    <div class="col-lg-1">

                    </div>
                    <div class="col-lg-10 col-sm-12">

                        <br>
                        <br><br>
                        <h4 class="widget-title"><?php echo e(__('Jobs on Other Websites')); ?></h4>
                        <ul class="searchList">

                            <!-- job start -->
                            <li>

                                <div class="row">

                                    <div class="col-md-8 col-sm-8">

                                        <div class="jobimg">
                                            <?php echo e(ImgUploader::print_image("other_jobs/$getTitle->logo", 100, 100)); ?></div>

                                        <div class="jobinfo">

                                            <h3><a href="#" title="<?php echo e($getTitle->title); ?>"><?php echo e($getTitle->title); ?></a>
                                            </h3>

                                            <div class="companyName"><a href="#" target="_blank"
                                                    title=""><?php echo e($getTitle->company_name); ?></a></div>

                                            <div class="location">

                                                <label class="fulltime" title="#"><?php echo e($getTitle->job_type); ?></label>
                                                <span>Apply Before : <?php echo e($getTitle->apply_before); ?></span>
                                            </div>

                                        </div>

                                        <div class="clearfix"></div>

                                    </div>

                                    <div class="col-md-4 col-sm-4">

                                        <div class="listbtn"><a href="<?php echo e($getTitle->url); ?>"
                                                target="_blank"><?php echo e(__('Visit Site')); ?></a></div>

                                    </div>

                                </div>

                                <p><?php echo e(str_limit(strip_tags($getTitle->description), 150, '...')); ?></p>

                            </li>

                            <!-- job end -->


                            <!-- job end -->
                        </ul>
                        <br>
                        <ul class="searchList">

                            <!-- job start -->

                            <?php if(isset($other_job_details) && count($other_job_details)): ?>
                                <?php $count_1 = 1; ?> <?php $__currentLoopData = $other_job_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>

                                        <div class="row">

                                            <div class="col-md-8 col-sm-8">

                                                <div class="jobimg">
                                                    <?php echo e(ImgUploader::print_image("other_jobs/$job->logo", 100, 100)); ?></div>

                                                <div class="jobinfo">

                                                    <h3><a href="#"
                                                            title="<?php echo e($job->title); ?>"><?php echo e($job->title); ?></a></h3>

                                                    <div class="companyName"><a href="#" target="_blank"
                                                            title=""><?php echo e($job->company_name); ?></a></div>

                                                    <div class="location">

                                                        <label class="fulltime" title="#"><?php echo e($job->job_type); ?></label>
                                                        <span>Apply Before : <?php echo e($job->apply_before); ?></span>
                                                    </div>

                                                </div>

                                                <div class="clearfix"></div>

                                            </div>

                                            <div class="col-md-4 col-sm-4">

                                                <div class="listbtn"><a href="<?php echo e($job->url); ?>"
                                                        target="_blank"><?php echo e(__('Visit Site')); ?></a></div>

                                            </div>

                                        </div>

                                        <p><?php echo e(str_limit(strip_tags($job->description), 150, '...')); ?></p>

                                    </li>

                                    <!-- job end -->
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>

                            <!-- job end -->
                        </ul>





                    </div>


                </div>
                <?php else: ?>
                <div class="row">

                    <div class="col-lg-1">

                    </div>
                    <div class="col-lg-10 col-sm-12">

                        <br>
                        <br><br>
                        <h4 class="widget-title"><?php echo e(__('Jobs on Other Websites')); ?></h4>
                        <ul class="searchList">

                            <!-- job start -->
                            <li>

                                <div class="row">

                                    <div class="col-md-8 col-sm-8">

                                        <div class="jobimg">
                                            <?php echo e(ImgUploader::print_image("other_jobs/$getTitle->logo", 100, 100)); ?></div>

                                        <div class="jobinfo">

                                            <h3><a href="#" title="<?php echo e($getTitle->title); ?>"><?php echo e($getTitle->title); ?></a>
                                            </h3>

                                            <div class="companyName"><a href="#" target="_blank"
                                                    title=""><?php echo e($getTitle->company_name); ?></a></div>

                                            <div class="location">

                                                <label class="fulltime" title="#"><?php echo e($getTitle->job_type); ?></label>
                                                <span>Apply Before : <?php echo e($getTitle->apply_before); ?></span>
                                            </div>

                                        </div>

                                        <div class="clearfix"></div>

                                    </div>

                                    <div class="col-md-4 col-sm-4">

                                        <div class="listbtn"><a href="<?php echo e($getTitle->url); ?>"
                                                target="_blank"><?php echo e(__('Visit Site')); ?></a></div>

                                    </div>

                                </div>

                                <p><?php echo e(str_limit(strip_tags($getTitle->description), 150, '...')); ?></p>

                            </li>

                            <!-- job end -->


                            <!-- job end -->
                        </ul>
                        <br>
                        <ul class="searchList">

                            <!-- job start -->

                            <?php if(isset($other_job_details) && count($other_job_details)): ?>
                                <?php $count_1 = 1; ?> <?php $__currentLoopData = $other_job_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>

                                        <div class="row">

                                            <div class="col-md-8 col-sm-8">

                                                <div class="jobimg">
                                                    <?php echo e(ImgUploader::print_image("other_jobs/$job->logo", 100, 100)); ?></div>

                                                <div class="jobinfo">

                                                    <h3><a href="#"
                                                            title="<?php echo e($job->title); ?>"><?php echo e($job->title); ?></a></h3>

                                                    <div class="companyName"><a href="#" target="_blank"
                                                            title=""><?php echo e($job->company_name); ?></a></div>

                                                    <div class="location">

                                                        <label class="fulltime" title="#"><?php echo e($job->job_type); ?></label>
                                                        <span>Apply Before : <?php echo e($job->apply_before); ?></span>
                                                    </div>

                                                </div>

                                                <div class="clearfix"></div>

                                            </div>

                                            <div class="col-md-4 col-sm-4">

                                                <div class="listbtn"><a href="<?php echo e($job->url); ?>"
                                                        target="_blank"><?php echo e(__('Visit Site')); ?></a></div>

                                            </div>

                                        </div>

                                        <p><?php echo e(str_limit(strip_tags($job->description), 150, '...')); ?></p>

                                    </li>

                                    <!-- job end -->
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>

                            <!-- job end -->
                        </ul>





                    </div>


                </div>
                <?php endif; ?>

            </form>

        </div>

    </div>


    <?php echo $__env->make('includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\saadmediajobcato\resources\views/job/other-list.blade.php ENDPATH**/ ?>