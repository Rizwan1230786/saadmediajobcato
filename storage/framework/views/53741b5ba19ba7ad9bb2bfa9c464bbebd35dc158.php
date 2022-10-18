<?php if($packages->count()): ?>
<div class="paypackages"> 
    <!---four-paln-->
    <div class="four-plan">
        <h3><?php echo e(__('Upgrade Package')); ?></h3>
        <div class="row"> <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <ul class="boxes">
                    <li class="plan-name"><?php echo e($package->package_title); ?></li>
                    <li>
                        <div class="main-plan">
                            <div class="plan-price1-1">$</div>
                            <div class="plan-price1-2"><?php echo e($package->package_price); ?></div>
                            <div class="clearfix"></div>
                        </div>
                    </li>
                    <li class="plan-pages"><?php echo e(__('Can post jobs')); ?> : <?php echo e($package->package_num_listings); ?></li>
                    <li class="plan-pages"><?php echo e(__('Package Duration')); ?> : <?php echo e($package->package_num_days); ?> <?php echo e(__('Days')); ?></li>
                    <?php if((bool)$siteSetting->is_paypal_active): ?>
                    <li class="order paypal"><a href="<?php echo e(route('order.upgrade.package', $package->id)); ?>"><i class="fa fa-cc-paypal" aria-hidden="true"></i> <?php echo e(__('pay with paypal')); ?></a></li>
                    <?php endif; ?>
                    <?php if((bool)$siteSetting->is_stripe_active): ?>
                    <li class="order"><a href="<?php echo e(route('stripe.order.form', [$package->id, 'upgrade'])); ?>"><i class="fa fa-cc-stripe" aria-hidden="true"></i> <?php echo e(__('pay with stripe')); ?></a></li>
                    <?php endif; ?>
                </ul>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> </div>
    </div>
    <!---end four-paln--> 
</div>
<?php endif; ?>