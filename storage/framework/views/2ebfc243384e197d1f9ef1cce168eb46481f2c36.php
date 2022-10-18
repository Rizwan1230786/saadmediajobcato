<?php if(isset($customJobs) && count($customJobs)): ?>
<div class="section">
    <div class="container"> 
        <!-- title start -->
        <div class="titleTop">
            <h3><?php echo e(__('Custom')); ?> <span><?php echo e(__('Jobs')); ?> </span></h3>
        </div>
        <!-- title end --> 

        <!--Custom Job start-->
        <ul class="jobslist row">
            <?php $__currentLoopData = $customJobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customJob): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $newspaper = $customJob->news_paper; ?>
            <?php if(null !== $newspaper): ?>
            <!--Job start-->
            <li class="col-md-6">
                <div class="jobint">
                    <div class="row">
                        <div class="col-lg-2 col-md-2">
                            <a href="<?php echo e(route('custom.job.details', [$customJob->id])); ?>" title="<?php echo e($customJob->title); ?>"></a>
                        </div>
                        <div class="col-lg-7 col-md-7">
                            <h4><a href="<?php echo e(route('custom.job.details', [$customJob->id])); ?>" title="<?php echo e($customJob->title); ?>"><?php echo e($customJob->title); ?></a></h4>
                            <div class="newspaper"><?php echo e($newspaper); ?></a></div>
                        </div>
                        <div class="col-lg-3 col-md-3"><a href="<?php echo e(route('custom.job.details', [$customJob->id])); ?>" class="applybtn"><?php echo e(__('View Detail')); ?></a></div>
                    </div>
                </div>
            </li>
            <!--Job end--> 
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <!--Custom Job end--> 
    </div>
</div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\JobCato\resources\views/includes/extra_jobs/custom_jobs.blade.php ENDPATH**/ ?>