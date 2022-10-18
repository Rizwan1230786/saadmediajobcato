<?php $__env->startSection('content'); ?>
<!-- Header start -->
<?php echo $__env->make('includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- Header end --> 
<!-- Inner Page Title start -->
<?php echo $__env->make('includes.inner_page_title', ['page_title'=>__('Applied Jobs')], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- Inner Page Title end -->
<div class="listpgWraper">
    <div class="container">
        <div class="row">
            <?php echo $__env->make('includes.user_dashboard_menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <div class="col-md-9 col-sm-8"> 
                <div class="myads">
                    <h3><?php echo e(__('Applied Jobs')); ?></h3>
                    <ul class="searchList">
                        <!-- job start --> 
                        <?php if(isset($jobs) && count($jobs)): ?>
                        <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $company = $job->getCompany(); ?>
                        <?php if(null !== $company): ?>
                        <li>
                            <div class="row">
                                <div class="col-md-8 col-sm-8">
                                    <div class="jobimg"><?php echo e($company->printCompanyImage()); ?></div>
                                    <div class="jobinfo">
                                        <h3><a href="<?php echo e(route('job.detail', [$job->slug])); ?>" title="<?php echo e($job->title); ?>"><?php echo e($job->title); ?></a></h3>
                                        <div class="companyName"><a href="<?php echo e(route('company.detail', $company->slug)); ?>" title="<?php echo e($company->name); ?>"><?php echo e($company->name); ?></a></div>
                                        <div class="location">
                                            <label class="fulltime" title="<?php echo e($job->getJobShift('job_shift')); ?>"><?php echo e($job->getJobShift('job_shift')); ?></label>
                                            - <span><?php echo e($job->getCity('city')); ?></span></div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="listbtn"><a href="<?php echo e(route('job.detail', [$job->slug])); ?>"><?php echo e(__('View Details')); ?></a></div>
                                </div>
                            </div>
                            <p><?php echo e(str_limit(strip_tags($job->description), 150, '...')); ?></p>
                        </li>
                        <!-- job end --> 
                        <?php endif; ?>
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
<?php $__env->startPush('scripts'); ?>
<?php echo $__env->make('includes.immediate_available_btn', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>