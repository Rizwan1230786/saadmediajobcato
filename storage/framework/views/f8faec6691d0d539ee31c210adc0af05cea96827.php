<div class="instoretxt">
    <div class="credit"><?php echo e(__('Your Package is')); ?>: <strong><?php echo e($package->package_title); ?> - <?php echo e($siteSetting->default_currency_code); ?><?php echo e($package->package_price); ?></strong></div>
    <div class="credit"><?php echo e(__('Package Duration')); ?> : <strong><?php echo e(Auth::guard('company')->user()->package_start_date->format('d M, Y')); ?></strong> - <strong><?php echo e(Auth::guard('company')->user()->package_end_date->format('d M, Y')); ?></strong></div>
    <div class="credit"><?php echo e(__('Availed quota')); ?> : <strong><?php echo e(Auth::guard('company')->user()->availed_jobs_quota); ?></strong> / <strong><?php echo e(Auth::guard('company')->user()->jobs_quota); ?></strong></div>

</div>
