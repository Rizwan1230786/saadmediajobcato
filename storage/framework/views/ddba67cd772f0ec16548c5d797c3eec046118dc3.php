<?php $__env->startSection('content'); ?>
<style type="text/css">
    .table td, .table th {
        font-size: 12px;
        line-height: 2.42857 !important;
    }	

</style>

<div class="page-content-wrapper"> 
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content"> 
        <!-- BEGIN PAGE HEADER--> 
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li> <a href="<?php echo e(route('admin.home')); ?>">Home</a> <i class="fa fa-circle"></i> </li>
                <li> <span>Custom Jobs</span> </li>
            </ul>
        </div>
        <!-- END PAGE BAR --> 
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title">Manage Jobs <small>Custom Jobs</small> </h3>
        <!-- END PAGE TITLE--> 
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12"> 
                <!-- Begin: life time stats -->
                <div class="portlet light portlet-fit portlet-datatable bordered">
                    <div class="portlet-title">
                        <div class="caption"> <i class="icon-settings font-dark"></i> <span class="caption-subject font-dark sbold uppercase">Csutom Jobs</span> </div>
                        <div class="actions"> <a href="<?php echo e(route('create.custom.job')); ?>" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-plus"></i> Add New Custom Job</a> </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-container">
                            <form method="post" role="form" id="job-search-form">
                                <table class="table table-striped table-bordered table-hover" id="example">
                                    <thead>
                                        
                                        <tr role="row" class="heading">
                                            <th>Title</th>
                                            <th>Location</th>
                                            <th>Pub. Date</th>
                                            <th>Last Date</th>
                                            <th>News Paper</th>
                                            <th>Details</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $__currentLoopData = $custom_jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $custom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                         <tr>
                                            <td><?php echo e(substr($custom->title, 0, 40)); ?> ....</td>
                                            <td><?php echo e(!empty($countries[$custom->country_id]) ? $countries[$custom->country_id] : 'N/A'); ?></td>
                                            <td><?php echo e($custom->published_date); ?></td>
                                            <td><?php echo e($custom->last_date); ?></td>
                                            <td><?php echo e($custom->news_paper); ?></td>
                                            <td><?php echo e(substr($custom->description, 0, 30)); ?> ....</td>
                                            <td>

                                                <div class="btn-group">
                                                <button class="btn blue dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Action
                                                    <i class="fa fa-angle-down"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li>
            <a target="_blank" href="<?php echo e(url('custom_jobs/', $custom->image)); ?>"><i class="fa fa-eye" aria-hidden="true"></i>Attahment</a>
                                                    </li>
                                                    <li>
            <a href="<?php echo e(route('edit.custom.job', [$custom->id])); ?>"><i class="fa fa-pencil" aria-hidden="true"></i>Edit</a>
                                                    </li>                       
                                                    <li>
             <a href="javascript:void(0);" onclick="deleteJob(<?php echo e($custom->id); ?>);" class=""><i class="fa fa-trash-o" aria-hidden="true"></i>Delete</a>
                                                    </li>
                                                                                                                                                                                        
                                                </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY --> 
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?> 
<script>
    $(document).ready(function() {
    $('#example').DataTable();
    } );
    function deleteJob(id) {
        var msg = 'Are you sure?';
        if (confirm(msg)) {
            $.post("<?php echo e(route('delete.custom.job')); ?>", {id: id, _method: 'DELETE', _token: '<?php echo e(csrf_token()); ?>'})
                    .done(function (response) {
                        if (response == 'ok')
                        {
                            alert('Success!');
                            location.reload();
                        } else
                        {
                            alert('Request Failed!');
                        }
                    });
        }
    }
    function makeActive(id) {
        $.post("<?php echo e(route('make.active.job')); ?>", {id: id, _method: 'PUT', _token: '<?php echo e(csrf_token()); ?>'})
                .done(function (response) {
                    if (response == 'ok')
                    {
                        var table = $('#jobDatatableAjax').DataTable();
                        table.row('jobDtRow' + id).remove().draw(false);
                    } else
                    {
                        alert('Request Failed!');
                    }
                });
    }
    function makeNotActive(id) {
        $.post("<?php echo e(route('make.not.active.job')); ?>", {id: id, _method: 'PUT', _token: '<?php echo e(csrf_token()); ?>'})
                .done(function (response) {
                    if (response == 'ok')
                    {
                        var table = $('#jobDatatableAjax').DataTable();
                        table.row('jobDtRow' + id).remove().draw(false);
                    } else
                    {
                        alert('Request Failed!');
                    }
                });
    }

    
   
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.admin_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>