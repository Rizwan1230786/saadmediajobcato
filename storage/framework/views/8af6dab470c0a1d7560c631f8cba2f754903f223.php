<?php if(APAuthHelp::check(['SUP_ADM'])): ?>
<li class="heading">
    <h3 class="uppercase">Admin Users</h3>
</li>
<li class="nav-item  "> <a href="javascript:;" class="nav-link nav-toggle"> <i class="icon-user"></i> <span class="title">Admin Users</span> <span class="arrow"></span> </a>
    <ul class="sub-menu">
        <li class="nav-item  "> <a href="<?php echo e(route('list.admin.users')); ?>" class="nav-link "> <i class="icon-user"></i> <span class="title">List All Admin Users</span> </a> </li>
        <li class="nav-item  "> <a href="<?php echo e(route('create.admin.user')); ?>" class="nav-link "> <i class="icon-users"></i> <span class="title">Add Admin User</span> </a> </li>
    </ul>
</li>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\JobCato\resources\views/admin/shared/side_bars/admin_user.blade.php ENDPATH**/ ?>