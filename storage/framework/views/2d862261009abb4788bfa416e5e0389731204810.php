<?php if(isset($otherJobs) && count($otherJobs)): ?>
<div class="section">
    <div class="container"> 
        <!-- title start -->
        <div class="titleTop">
            <h3><?php echo e(__('Other')); ?> <span><?php echo e(__('Jobs')); ?></span></h3>
        </div>
        <!-- title end --> 

        <!--Featured Job start-->
        <ul class="jobslist row">
            <?php $__currentLoopData = $otherJobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $otherJob): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $company = $otherJob->company_name; ?>
            <?php if(null !== $company): ?>
            <!--Job start-->
            <li class="col-md-6">
                <div class="jobint">
                    <div class="row">
                        <div class="col-lg-2 col-md-2">
                            <a href="<?php echo e(route('other.job.detail', [$otherJob->id])); ?>" title="<?php echo e($otherJob->title); ?>"></a>
                        </div>
                        <div class="col-lg-7 col-md-7">
                            <h4><a href="<?php echo e(route('other.job.detail', [$otherJob->id])); ?>" title="<?php echo e($otherJob->title); ?>"><?php echo e($otherJob->title); ?></a></h4>
                            <div class="comapny"><?php echo e($company); ?></a></div>
                        </div>
                        <div class="col-lg-3 col-md-3"><a href="<?php echo e(route('other.job.detail', [$otherJob->id])); ?>" class="applybtn"><?php echo e(__('View Detail')); ?></a></div>
                    </div>
                </div>
            </li>
            <!--Job end--> 
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <!--Featured Job end--> 
    </div>
</div>
<?php endif; ?>