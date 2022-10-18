
<?php $__env->startSection('content'); ?>
<div class="page-content-wrapper"> 
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content"> 
        <!-- BEGIN PAGE HEADER--> 
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li> <a href="<?php echo e(route('admin.home')); ?>">Home</a> <i class="fa fa-circle"></i> </li>
                <li> <a href="<?php echo e(route('list.users')); ?>">Users</a> <i class="fa fa-circle"></i> </li>
                <li> <span>Add User</span> </li>
            </ul>
        </div>
        <!-- END PAGE BAR --> 
        <!-- BEGIN PAGE TITLE-->
        <!--<h3 class="page-title">Edit User <small>Users</small> </h3>-->
        <!-- END PAGE TITLE--> 
        <!-- END PAGE HEADER-->
        <br />
        <?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-red-sunglo"> <i class="icon-settings font-red-sunglo"></i> <span class="caption-subject bold uppercase">Users Form</span> </div>
                    </div>
                    <div class="portlet-body form">          
                        <ul class="nav nav-tabs">              
                            <li class="active"> <a href="#Details" data-toggle="tab" aria-expanded="false"> Details </a> </li>
                            <li><a href="#Summary" data-toggle="tab" aria-expanded="false">Summary</a></li>
                            <li><a href="#CV" data-toggle="tab" aria-expanded="false">C.V</a></li>
                            <li><a href="#Projects" data-toggle="tab" aria-expanded="false">Projects</a></li>
                            <li><a href="#Experience" data-toggle="tab" aria-expanded="false">Experience</a></li>
                            <li><a href="#Education" data-toggle="tab" aria-expanded="false">Education</a></li>
                            <li><a href="#Skills" data-toggle="tab" aria-expanded="false">Skills</a></li>
                            <li><a href="#Languages" data-toggle="tab" aria-expanded="false">Languages</a></li>

                        </ul>

                        <div class="tab-content">              
                            <div class="tab-pane fade active in" id="Details"> <?php echo $__env->make('admin.user.forms.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> </div>
                            <?php if(isset($user)): ?>
                            <div class="tab-pane fade" id="Summary"> <?php echo $__env->make('admin.user.forms.summary', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> </div>
                            <div class="tab-pane fade" id="CV"> <?php echo $__env->make('admin.user.forms.cv.cvs', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> </div>
                            <div class="tab-pane fade" id="Projects"> <?php echo $__env->make('admin.user.forms.project.projects', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> </div>
                            <div class="tab-pane fade" id="Experience"> <?php echo $__env->make('admin.user.forms.experience.experience', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> </div>
                            <div class="tab-pane fade" id="Education"> <?php echo $__env->make('admin.user.forms.education.education', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> </div>
                            <div class="tab-pane fade" id="Skills"> <?php echo $__env->make('admin.user.forms.skill.skills', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> </div>
                            <div class="tab-pane fade" id="Languages"> <?php echo $__env->make('admin.user.forms.language.languages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> </div>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY --> 
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>