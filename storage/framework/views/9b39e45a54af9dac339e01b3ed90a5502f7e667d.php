<?php $__env->startSection('content'); ?>
    <!-- Header start -->
    <?php echo $__env->make('includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Header end -->
    <!-- Search start -->
    <?php echo $__env->make('includes.search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Search End -->

    <!-- Featured Jobs start -->
    
    <!-- Featured Jobs ends -->

    <!-- Other Jobs start -->
    
    <!-- Other Jobs ends -->
    <!-- Custom Jobs start -->
    
    <!-- Custom Jobs ends -->

    <!-- Login box start -->
    
    <!-- Login box ends -->
    <!-- How it Works start -->
    
    <!-- How it Works Ends -->
    <!-- Latest Jobs start -->
    
    <!-- Latest Jobs ends -->
    <!-- Testimonials start -->
    
    <!-- Testimonials End -->
    <?php if(!empty($country)): ?>
        <?php echo $__env->make('includes.country.countries', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
    <?php endif; ?>

    <!-- Video start -->
    <?php echo $__env->make('includes.video', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Video end -->

    <!-- Subscribe start -->
    <?php echo $__env->make('includes.subscribe', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Subscribe End -->
    <?php echo $__env->make('includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function($) {
            $("form").submit(function() {
                $(this).find(":input").filter(function() {
                    return !this.value;
                }).attr("disabled", "disabled");
                return true;
            });
            $("form").find(":input").prop("disabled", false);
        });
    </script>
    <?php echo $__env->make('includes.country_state_city_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\saadmediajobcato\resources\views/welcome.blade.php ENDPATH**/ ?>