
<?php $__env->startSection('content'); ?>
<!-- Header start -->
<?php echo $__env->make('includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- Header end --> 
<style type="text/css">
    .newjbox.row li h4 a {
    font-weight: 400;
    text-decoration: underline;
    color: blue;
}
</style>
<!-- Inner Page Title start -->
<?php echo $__env->make('includes.inner_page_title', ['page_title'=>__('Latest Jobs')], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- Inner Page Title end -->
<div class="inner-page"> 
    <!-- About -->
    <div class="container">
        <div class="contact-wrap">
            <div class="title"> <span><br></span>
                <h2><?php echo e(__('LATEST JOBS 2020')); ?></h2>
              
            </div>            
                <!-- Contact Info -->
                <div class="contact-now">
    				<div class="row"> 
                                <ul class="jobslist newjbox row">
                                <?php if(isset($custom_jobs) && count($custom_jobs)): ?>
                                <?php $__currentLoopData = $custom_jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <!--Job start-->
                                <li class="col-md-12">
                                    <div class="jobint">
                                        <div class="row">
                                           
                                            <div class="col-md-12 col-sm-6">
                                                <h4><a href="<?php echo e(route('custom.job.details', [$job->id])); ?>" title="<?php echo e($job->title); ?>"><?php echo e($job->title); ?></a></h4>
                                                <div class="company">Location - <span><?php echo e($job->location); ?></span></div>
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
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </ul>
                    </div>
			</div>
        </div>
    </div>
</div>
<?php echo $__env->make('includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>