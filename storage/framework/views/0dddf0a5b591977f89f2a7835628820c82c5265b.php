<?php $__env->startSection('content'); ?>
<!-- Header start -->
<?php echo $__env->make('includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- Header end --> 
<!-- Search start -->
<?php echo $__env->make('includes.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- Search End -->  

<!-- Featured Jobs start -->
<?php echo $__env->make('includes.featured_jobs', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- Featured Jobs ends -->

<!-- Other Jobs start -->
<?php echo $__env->make('includes.extra_jobs.other_jobs', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- Other Jobs ends -->
<!-- Custom Jobs start -->
<?php echo $__env->make('includes.extra_jobs.custom_jobs', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- Custom Jobs ends -->

<!-- Login box start -->
<?php echo $__env->make('includes.login_text', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- Login box ends --> 
<!-- How it Works start -->
<?php echo $__env->make('includes.how_it_works', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- How it Works Ends -->
<!-- Latest Jobs start -->
<?php echo $__env->make('includes.latest_jobs', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- Latest Jobs ends --> 
<!-- Testimonials start -->
<?php echo $__env->make('includes.testimonials', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- Testimonials End -->
<!-- Video start -->
<?php echo $__env->make('includes.video', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- Video end --> 

<!-- Subscribe start -->
<?php echo $__env->make('includes.subscribe', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- Subscribe End -->
<?php echo $__env->make('includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?> 
<script>
    $(document).ready(function ($) {
        $("form").submit(function () {
            $(this).find(":input").filter(function () {
                return !this.value;
            }).attr("disabled", "disabled");
            return true;
        });
        $("form").find(":input").prop("disabled", false);
    });
</script>
<?php echo $__env->make('includes.country_state_city_js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>