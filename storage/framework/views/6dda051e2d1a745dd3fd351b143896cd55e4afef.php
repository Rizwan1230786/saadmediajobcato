<?php $__env->startSection('content'); ?>
<!-- Header start -->
<?php echo $__env->make('includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- Header end --> 
<!-- Inner Page Title start -->
<?php echo $__env->make('includes.inner_page_title', ['page_title'=>__('Company Posted Jobs')], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- Inner Page Title end -->
<div class="listpgWraper">
    <div class="container">
        <div class="row">
            <?php echo $__env->make('includes.company_dashboard_menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <div class="col-md-9 col-sm-8"> 
                <div class="myads">
                    <h3><?php echo e(__('Company Posted Jobs')); ?></h3>
                    <ul class="searchList">
                        <!-- job start --> 
                        <?php if(isset($jobs) && count($jobs)): ?>
                        <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $company = $job->getCompany(); ?>
                        <?php if(null !== $company): ?>
                        <li id="job_li_<?php echo e($job->id); ?>">
                            <div class="row">
                                <div class="col-md-9 col-sm-9">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="jobimg"><?php echo e($company->printCompanyImage()); ?></div>
                                            <div class="jobinfo">
                                                <h3><a href="<?php echo e(route('job.detail', [$job->slug])); ?>" title="<?php echo e($job->title); ?>"><?php echo e($job->title); ?></a></h3>
                                                <div class="companyName"><a href="<?php echo e(route('company.detail', $company->slug)); ?>" title="<?php echo e($company->name); ?>"><?php echo e($company->name); ?></a></div>
                                                <div class="location">
                                                    <label class="fulltime" title="<?php echo e($job->getJobShift('job_shift')); ?>"><?php echo e($job->getJobShift('job_shift')); ?></label>
                                                    - <span><?php echo e($job->getCity('city')); ?></span></div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 py-3">
                                            <a class="job-list-btn btn btn-primary fa fa-pencil" href="<?php echo e(route('edit.front.job', [$job->id])); ?>" title="<?php echo e(__('Edit')); ?>"> &nbsp;<?php echo e(__('Edit')); ?></a>
                                            <a class="job-list-btn btn btn-danger fa fa-trash" href="javascript:;" onclick="deleteJob(<?php echo e($job->id); ?>);" title="<?php echo e(__('Delete')); ?>"> &nbsp;<?php echo e(__('Delete')); ?></a>
                                        </div>
                                        <div class="col-md-12 col-sm-12 py-3">
                                            <p><?php echo e(str_limit(strip_tags($job->description), 150, '...')); ?></p>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-md-3 col-sm-3"> 
                                    <a class="no-decoration" title="List of all applied candidates to this job" href="<?php echo e(route('list.applied.users', [$job->id])); ?>">    
                                        <div class="card text-center">
                                            <div class="card-body">
                                                <h1><?php echo e($job->applied); ?></h1>
                                                <h3>Applied</h3>
                                            </div>
                                        </div>           
                                    </a>
                                    <a class="job-list-btn btn btn-info btn-block my-2 btn-lg fa fa-user" href="<?php echo e(route('list.favourite.applied.users', [$job->id])); ?>" title="<?php echo e(__('Short List')); ?>">&nbsp;<?php echo e(__('Short List')); ?></a>
                                </div>
                            </div>
                            
                        </li>
                        <!-- job end --> 
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $__env->make('includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script type="text/javascript">
    function deleteJob(id) {
    var msg = 'Are you sure?';
    if (confirm(msg)) {
    $.post("<?php echo e(route('delete.front.job')); ?>", {id: id, _method: 'DELETE', _token: '<?php echo e(csrf_token()); ?>'})
            .done(function (response) {
            if (response == 'ok')
            {
            $('#job_li_' + id).remove();
            } else
            {
            alert('Request Failed!');
            }
            });
    }
    }
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>