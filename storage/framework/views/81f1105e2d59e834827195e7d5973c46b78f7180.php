
<div class="userloginbox">
	<div class="container">		
		<div class="titleTop">
           <h3><?php echo e(__('The Easiest Way to Find Job!')); ?> </h3>
        </div>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nunc ex, maximus vel felis ut, vestibulum tristique enim. Proin eu nulla est. Maecenas tempor euismod suscipit. Sed at libero ante. Vestibulum nec odio lacus.</p>
		
		<?php if(!Auth::user() && !Auth::guard('company')->user()): ?>
		<div class="viewallbtn"><a href="<?php echo e(route('register')); ?>"> <?php echo e(__('Get Started Today')); ?> </a></div>
		<?php else: ?>
		<div class="viewallbtn"><a href="<?php echo e(url('my-profile')); ?>"><?php echo e(__('Build Your CV')); ?> </a></div>
		<?php endif; ?>
	</div>
</div>
