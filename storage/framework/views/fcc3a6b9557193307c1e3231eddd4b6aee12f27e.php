<div class="col-lg-3">
	<div class="usernavwrap">
    <div class="switchbox">
        <div class="txtlbl"><?php echo e(__('Immediate Available')); ?> <i class="fa fa-info-circle" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="<?php echo e(__('Are you immediate available')); ?>?" data-original-title="<?php echo e(__('Are you immediate available')); ?>?" title="<?php echo e(__('Are you immediate available')); ?>?"></i>
        </div>
        <div class="">
            <label class="switch switch-green"> <?php
                $checked = ((bool)Auth::user()->is_immediate_available)? 'checked="checked"':'';
                ?>
                <input type="checkbox" name="is_immediate_available" id="is_immediate_available" class="switch-input" <?php echo e($checked); ?> onchange="changeImmediateAvailableStatus(<?php echo e(Auth::user()->id); ?>, <?php echo e(Auth::user()->is_immediate_available); ?>);">
                <span class="switch-label" data-on="On" data-off="Off"></span> <span class="switch-handle"></span> </label>
        </div>
        <div class="clearfix"></div>
    </div>
    <ul class="usernavdash">
        <li class="active"><a href="<?php echo e(route('home')); ?>"><i class="fa fa-tachometer" aria-hidden="true"></i> <?php echo e(__('Dashboard')); ?></a>
        </li>
        <li><a href="<?php echo e(route('my.profile')); ?>"><i class="fa fa-pencil" aria-hidden="true"></i> <?php echo e(__('Edit Profile')); ?></a>
        </li>
        <li><a href="<?php echo e(route('view.public.profile', Auth::user()->id)); ?>"><i class="fa fa-eye" aria-hidden="true"></i> <?php echo e(__('View Public Profile')); ?></a>
        </li>
        <li><a href="<?php echo e(route('my.job.applications')); ?>"><i class="fa fa-desktop" aria-hidden="true"></i> <?php echo e(__('My Job Applications')); ?></a>
        </li>
        <li><a href="<?php echo e(route('my.favourite.jobs')); ?>"><i class="fa fa-heart" aria-hidden="true"></i> <?php echo e(__('My Favourite Jobs')); ?></a>
        </li>
        <!-- <li><a href="<?php echo e(route('my-alerts')); ?>"><i class="fa fa-bullhorn" aria-hidden="true"></i> <?php echo e(__('My Job Alerts')); ?></a>
        </li> -->
        <li><a href="<?php echo e(url('my-profile#cvs')); ?>"><i class="fa fa-file-text" aria-hidden="true"></i> <?php echo e(__('Manage Resume')); ?></a>
        </li>
       <!--  <li><a href="<?php echo e(route('my.messages')); ?>"><i class="fa fa-envelope-o" aria-hidden="true"></i> <?php echo e(__('My Messages')); ?></a>
        </li> -->
      <!--   <li><a href="<?php echo e(route('my.followings')); ?>"><i class="fa fa-user-o" aria-hidden="true"></i> <?php echo e(__('My Followings')); ?></a>
        </li> -->
        <li><a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i> <?php echo e(__('Logout')); ?></a>
            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                <?php echo e(csrf_field()); ?>

            </form>
        </li>
    </ul>
		</div>
    <div class="row">
        <div class="col-md-12"><?php echo $siteSetting->dashboard_page_ad; ?></div>
    </div>
		
</div><?php /**PATH C:\xampp\htdocs\saadmediajobcato\resources\views/includes/user_dashboard_menu.blade.php ENDPATH**/ ?>