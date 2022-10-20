
<?php $__env->startSection('content'); ?>
    <!-- Header start -->
    <?php if(!empty($country)): ?>
        <?php echo $__env->make('includes.countryheader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php else: ?>
        <?php echo $__env->make('includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <!-- Header end -->
    <style type="text/css">
        .newjbox.row li h4 a {
            font-weight: 400;
            text-decoration: underline;
            color: blue;
        }

        .custom-style {
            text-decoration: underline;
            color: blue;
        }
    </style>
    <!-- Inner Page Title start -->
    <?php echo $__env->make('includes.inner_page_title', ['page_title' => __('Latest Job Details')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Inner Page Title end -->
    <div class="inner-page">
        <!-- About -->
        <?php if(!empty($country)): ?>
            <div class="container">
                <div class="contact-wrap">
                    <div class="title"><span><br></span>
                        <!-- <h2><?php echo e(__('LATEST JOBS 2020')); ?></h2> -->

                    </div>

                    <?php
                    //                echo "<PRE>";
                    //                $custom_jobs = json_decode(json_encode($custom_jobs),true);
                    //                print_r($custom_jobs);
                    //                exit;
                    ?>
                    <!-- Job Header start -->
                    <div class="job-header">
                        <div class="jobinfo">

                            <h2><a href="#" class="custom-style"><?php echo e($custom_jobs->title); ?></a></h2>


                        </div>

                        <!-- Job Detail start -->
                        <div class="jobmainreq">
                            <div class="jobdetail">


                                <ul class="jbdetail">
                                    <li class="row">
                                        <div class="col-md-4 col-xs-5"><?php echo e(__('Jobs Location')); ?>:</div>
                                        <div class="col-md-8 col-xs-7">

                                            <span><?php echo e($CountryDetail->country); ?>,<?php echo e($StateDetail->state); ?>,<?php echo e($CityDetail->city); ?></span>

                                        </div>
                                    </li>
                                    <li class="row">
                                        <div class="col-md-4 col-xs-5"><?php echo e(__('Newspaper Name')); ?>:</div>
                                        <div class="col-md-8 col-xs-7"><span><?php echo e($custom_jobs->news_paper); ?></span>
                                        </div>
                                    </li>


                                    <li class="row">
                                        <div class="col-md-4 col-xs-5"><?php echo e(__('Last Date to Apply')); ?>:</div>
                                        <div class="col-md-8 col-xs-7"><span><?php
                                        
                                        $last_date = date_create($custom_jobs->last_date);
                                        echo date_format($last_date, 'F j, Y, l');
                                        ?></span></div>
                                    </li>
                                    <li class="row">
                                        <div class="col-md-4 col-xs-5"><?php echo e(__('Published Date')); ?>:</div>
                                        <div class="col-md-8 col-xs-7"><span><?php
                                        
                                        $date = date_create($custom_jobs->published_date);
                                        echo date_format($date, 'F j, Y, l');
                                        ?></span></div>
                                    </li>

                                </ul>


                            </div>
                        </div>

                        <!-- Job Description start -->
                        <div class="job-header">
                            <div class="contentbox">
                                <h3><i class="fa fa-file-text-o" aria-hidden="true"></i> <?php echo e(__('Job Description')); ?></h3>
                                <p><?php echo $custom_jobs->description; ?></p>
                                <p>
                                    <a href="<?php echo e(url('custom_jobs', $custom_jobs->image)); ?>" title="Click to view"
                                        target="_blank"> <img src="<?php echo e(url('custom_jobs/', $custom_jobs->image)); ?>"></a>
                                </p>
                            </div>
                        </div>

                        <hr>

                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="container">
                <div class="contact-wrap">
                    <div class="title"><span><br></span>
                        <!-- <h2><?php echo e(__('LATEST JOBS 2020')); ?></h2> -->

                    </div>

                    <?php
                    //                echo "<PRE>";
                    //                $custom_jobs = json_decode(json_encode($custom_jobs),true);
                    //                print_r($custom_jobs);
                    //                exit;
                    ?>
                    <!-- Job Header start -->
                    <div class="job-header">
                        <div class="jobinfo">

                            <h2><a href="#" class="custom-style"><?php echo e($custom_jobs->title); ?></a></h2>


                        </div>

                        <!-- Job Detail start -->
                        <div class="jobmainreq">
                            <div class="jobdetail">


                                <ul class="jbdetail">
                                    <li class="row">
                                        <div class="col-md-4 col-xs-5"><?php echo e(__('Jobs Location')); ?>:</div>
                                        <div class="col-md-8 col-xs-7">

                                            <span><?php echo e($CountryDetail->country); ?>,<?php echo e($StateDetail->state); ?>,<?php echo e($CityDetail->city); ?></span>

                                        </div>
                                    </li>
                                    <li class="row">
                                        <div class="col-md-4 col-xs-5"><?php echo e(__('Newspaper Name')); ?>:</div>
                                        <div class="col-md-8 col-xs-7"><span><?php echo e($custom_jobs->news_paper); ?></span>
                                        </div>
                                    </li>


                                    <li class="row">
                                        <div class="col-md-4 col-xs-5"><?php echo e(__('Last Date to Apply')); ?>:</div>
                                        <div class="col-md-8 col-xs-7"><span><?php
                                        
                                        $last_date = date_create($custom_jobs->last_date);
                                        echo date_format($last_date, 'F j, Y, l');
                                        ?></span></div>
                                    </li>
                                    <li class="row">
                                        <div class="col-md-4 col-xs-5"><?php echo e(__('Published Date')); ?>:</div>
                                        <div class="col-md-8 col-xs-7"><span><?php
                                        
                                        $date = date_create($custom_jobs->published_date);
                                        echo date_format($date, 'F j, Y, l');
                                        ?></span></div>
                                    </li>

                                </ul>


                            </div>
                        </div>

                        <!-- Job Description start -->
                        <div class="job-header">
                            <div class="contentbox">
                                <h3><i class="fa fa-file-text-o" aria-hidden="true"></i> <?php echo e(__('Job Description')); ?></h3>
                                <p><?php echo $custom_jobs->description; ?></p>
                                <p>
                                    <a href="<?php echo e(url('custom_jobs', $custom_jobs->image)); ?>" title="Click to view"
                                        target="_blank"> <img src="<?php echo e(url('custom_jobs/', $custom_jobs->image)); ?>"></a>
                                </p>
                            </div>
                        </div>

                        <hr>

                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <?php echo $__env->make('includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\saadmediajobcato\resources\views/contact/custom_jobs_details.blade.php ENDPATH**/ ?>