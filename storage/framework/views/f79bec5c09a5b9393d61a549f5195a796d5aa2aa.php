<div class="container-fluid">
    <div class="titleTop">
        <h3>Papular Jobs Locations</h3>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 mt-5">
                <p style="font-weight: bold; font-size:18px;">Popular Jobs in Cities</p>
                <hr>
                <div class="row">
                    <?php $__currentLoopData = $state_base_city; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $states): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = $states->cities->take(30); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $urlslugs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-4">
                                <ul>
                                    <li style="list-style: square;">
                                        <a style="color: black;"
                                            href="<?php echo e(url('/jobs' . '/' . $states->slug . '/' . $urlslugs->slug)); ?>">Search for jobs
                                            in <?php echo e($urlslugs->city); ?>

                                        </a>
                                    </li>
                                </ul>
                                
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\saadmediajobcato\resources\views/includes/country/states.blade.php ENDPATH**/ ?>