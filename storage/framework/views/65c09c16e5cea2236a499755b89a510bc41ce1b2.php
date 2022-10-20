<div class="pageTitle">
    <div class="container">
        <div class="row">
            <?php if(!empty($country)): ?>
                <div class="col-md-6 col-sm-6">
                    <h1 class="page-heading"><?php echo e($page_title); ?> in <?php echo e($country->country); ?></h1>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="breadCrumb"><a href="<?php echo e(route('index')); ?>"><?php echo e(__('Home')); ?></a> /
                        <span><?php echo e($page_title); ?> in <?php echo e($country->country); ?></span>
                    </div>
                </div>
            <?php else: ?>
                <div class="col-md-6 col-sm-6">
                    <h1 class="page-heading"><?php echo e($page_title); ?></h1>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="breadCrumb"><a href="<?php echo e(route('index')); ?>"><?php echo e(__('Home')); ?></a> /
                        <span><?php echo e($page_title); ?></span>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\saadmediajobcato\resources\views/includes/inner_page_title.blade.php ENDPATH**/ ?>