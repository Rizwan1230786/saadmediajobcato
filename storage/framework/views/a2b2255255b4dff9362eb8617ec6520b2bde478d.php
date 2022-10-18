
<?php $__env->startSection('content'); ?> 
<!-- Header start --> 
<?php echo $__env->make('includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
<!-- Header end --> 
<!-- Inner Page Title start --> 
<?php echo $__env->make('includes.inner_page_title', ['page_title'=>__('Job Seekers')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
<!-- Inner Page Title end -->

<?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <form action="<?php echo e(route('job.seeker.list')); ?>" method="get">
            <!-- Page Title start -->
            <div class="pageSearch">
				<div class="container-fluid">
                <div class="row">
                    <div class="col-lg-2">
                        <?php if(Auth::guard('company')->check()): ?>
                        <a href="<?php echo e(route('post.job')); ?>" class="btn"><i class="fa fa-file-text" aria-hidden="true"></i> <?php echo e(__('Post Job')); ?></a>
                        <?php else: ?>
                        <a href="<?php echo e(url('my-profile#cvs')); ?>" class="btn"><i class="fa fa-file-text" aria-hidden="true"></i> <?php echo e(__('Upload Your Resume')); ?></a>
                        <?php endif; ?>

                    </div>
                    <div class="col-lg-10">
                        <div class="searchform">
                            <div class="row">
                                <div class="col-md-<?php echo e(((bool)$siteSetting->country_specific_site)? 5:3); ?>">
                                    <input type="text" name="search" value="<?php echo e(Request::get('search', '')); ?>" class="form-control" placeholder="<?php echo e(__('Enter Skills or job seeker details')); ?>" />
                                </div>
                                <div class="col-md-2"> <?php echo Form::select('functional_area_id[]', ['' => __('Select Functional Area')]+$functionalAreas, Request::get('functional_area_id', null), array('class'=>'form-control', 'id'=>'functional_area_id')); ?> </div>


                                <?php if((bool)$siteSetting->country_specific_site): ?>
                                <?php echo Form::hidden('country_id[]', Request::get('country_id[]', $siteSetting->default_country_id), array('id'=>'country_id')); ?>

                                <?php else: ?>
                                <div class="col-md-2">
                                    <?php echo Form::select('country_id[]', ['' => __('Select Country')]+$countries, Request::get('country_id', $siteSetting->default_country_id), array('class'=>'form-control', 'id'=>'country_id')); ?>

                                </div>
                                <?php endif; ?>

                                <div class="col-md-2">
                                    <span id="state_dd">
                                        <?php echo Form::select('state_id[]', ['' => __('Select State')], Request::get('state_id', null), array('class'=>'form-control', 'id'=>'state_id')); ?>

                                    </span>
                                </div>
                                <div class="col-md-2">
                                    <span id="city_dd">
                                        <?php echo Form::select('city_id[]', ['' => __('Select City')], Request::get('city_id', null), array('class'=>'form-control', 'id'=>'city_id')); ?>

                                    </span>
                                </div>
                                <div class="col-md-1">
                                    <button type="submit" class="btn"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
					</div>
            </div>
            <!-- Page Title end -->
        </form>



<div class="listpgWraper">
    <div class="container">
        
        <form action="<?php echo e(route('job.seeker.list')); ?>" method="get">
            <!-- Search Result and sidebar start -->
            <div class="row"> <?php echo $__env->make('includes.job_seeker_list_side_bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>                
                <div class="col-lg-6"> 
                    <!-- Search List -->
                    <ul class="searchList">
                        <!-- job start --> 
                        <?php if(isset($jobSeekers) && count($jobSeekers)): ?>
                        <?php $__currentLoopData = $jobSeekers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jobSeeker): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <div class="row">
                                <div class="col-lg-8 col-md-8">
                                    <div class="jobimg"><?php echo e($jobSeeker->printUserImage(100, 100)); ?></div>
                                    <div class="jobinfo">
                                        <h3><a href="<?php echo e(route('user.profile', $jobSeeker->id)); ?>"><?php echo e($jobSeeker->getName()); ?></a></h3>
                                        <div class="location"> <?php echo e($jobSeeker->getLocation()); ?></div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="listbtn"><a href="<?php echo e(route('user.profile', $jobSeeker->id)); ?>"><?php echo e(__('View Profile')); ?></a></div>
                                </div>
                            </div>
                            <p><?php echo e(str_limit($jobSeeker->getProfileSummary('summary'),150,'...')); ?></p>
                        </li>
                        <!-- job end --> 
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </ul>

                    <!-- Pagination Start -->
                    <div class="pagiWrap">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="showreslt">
                                    <?php echo e(__('Showing Pages')); ?> : <?php echo e($jobSeekers->firstItem()); ?> - <?php echo e($jobSeekers->lastItem()); ?> <?php echo e(__('Total')); ?> <?php echo e($jobSeekers->total()); ?>

                                </div>
                            </div>
                            <div class="col-md-7 text-right">
                                <?php if(isset($jobSeekers) && count($jobSeekers)): ?>
                                <?php echo e($jobSeekers->appends(request()->query())->links()); ?>

                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <!-- Pagination end --> 
                    <div class=""><br /><?php echo $siteSetting->listing_page_horizontal_ad; ?></div>

                </div>
				<div class="col-lg-3">
                    <!-- Sponsord By -->
                    <div class="sidebar">
                        <h4 class="widget-title"><?php echo e(__('Sponsord By')); ?></h4>
                        <div class="gad"><?php echo $siteSetting->listing_page_vertical_ad; ?></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php echo $__env->make('includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('styles'); ?>
<style type="text/css">
    .searchList li .jobimg {
        min-height: 80px;
    }
    .hide_vm_ul{
        height:100px;
        overflow:hidden;
    }
    .hide_vm{
        display:none !important;
    }
    .view_more{
        cursor:pointer;
    }
</style>
<?php $__env->stopPush(); ?>
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

        $(".view_more_ul").each(function () {
            if ($(this).height() > 100)
            {
                $(this).addClass('hide_vm_ul');
                $(this).next().removeClass('hide_vm');
            }
        });
        $('.view_more').on('click', function (e) {
            e.preventDefault();
            $(this).prev().removeClass('hide_vm_ul');
            $(this).addClass('hide_vm');
        });

    });
</script>
<?php echo $__env->make('includes.country_state_city_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\JobCato\resources\views/user/list.blade.php ENDPATH**/ ?>