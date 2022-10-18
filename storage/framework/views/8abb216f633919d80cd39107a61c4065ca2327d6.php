<ul class="row profilestat">
    <li class="col-lg-3 col-md-3 col-6">
        <div class="inbox"> <i class="fa fa-eye" aria-hidden="true"></i>
            <h6><?php echo e(Auth::user()->num_profile_views); ?></h6>
            <strong><?php echo e(__('Profile Views')); ?></strong> </div>
    </li>
    <li class="col-lg-3 col-md-3 col-6">
        <div class="inbox"> <i class="fa fa-user-o" aria-hidden="true"></i>
            <h6><a href="<?php echo e(route('my.followings')); ?>"><?php echo e(Auth::user()->countFollowings()); ?></a></h6>
            <strong><?php echo e(__('Followings')); ?></strong> </div>
    </li>
    <li class="col-lg-3 col-md-3 col-6">
        <div class="inbox"> <i class="fa fa-briefcase" aria-hidden="true"></i>
            <h6><a href="<?php echo e(url('my-profile#cvs')); ?>"><?php echo e(Auth::user()->countProfileCvs()); ?></a></h6>
            <strong><?php echo e(__('My CV List')); ?></strong> </div>
    </li>
    <!-- <li class="col-lg-3 col-md-3 col-6">
        <div class="inbox"> <i class="fa fa-envelope-o" aria-hidden="true"></i>
            <h6><a href="<?php echo e(route('my.messages')); ?>"><?php echo e(Auth::user()->countUserMessages()); ?></a></h6>
            <strong><?php echo e(__('Messages')); ?></strong> </div>
    </li> -->
</ul>