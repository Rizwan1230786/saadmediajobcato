<?php $__env->startSection('content'); ?>
    <!-- Header start -->
    <?php if(!empty($country)): ?>
        <?php echo $__env->make('includes.countryheader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php if($country == null): ?>
        <?php echo $__env->make('includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <!-- Header end -->
    <!-- Inner Page Title start -->
    <?php echo $__env->make('includes.inner_page_title', ['page_title' => __('All Companies')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Inner Page Title end -->
    <?php if(!empty($country)): ?>
        <div class="pageSearch">
            <div class="container">
                <section id="joblisting-header" role="search" class="searchform">
                    <form id="top-search" method="GET" action="<?php echo e(url('company-in-' . $country->slug)); ?>">
                        <div class="row">
                            <div class="col-lg-9">
                                <input type="text" name="search" value="<?php echo e(Request::get('search', '')); ?>"
                                    class="form-control search" placeholder="<?php echo e(__('keywords e.g. "Google"')); ?>" />
                            </div>
                            <div class="col-lg-3">
                                <button type="submit" id="submit-form-top" class="btn"><i class="fa fa-search"
                                        aria-hidden="true"></i> <?php echo e(__('Search Company')); ?></button>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    <?php else: ?>
        <div class="pageSearch">
            <div class="container">
                <section id="joblisting-header" role="search" class="searchform">
                    <form id="top-search" method="GET" action="<?php echo e(route('company.listing')); ?>">
                        <div class="row">
                            <div class="col-lg-9">
                                <input type="text" name="search" value="<?php echo e(Request::get('search', '')); ?>"
                                    class="form-control search" placeholder="<?php echo e(__('keywords e.g. "Google"')); ?>" />
                            </div>
                            <div class="col-lg-3">
                                <button type="submit" id="submit-form-top" class="btn"><i class="fa fa-search"
                                        aria-hidden="true"></i> <?php echo e(__('Search Company')); ?></button>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    <?php endif; ?>




    <?php if(!empty($country)): ?>
        <div class="listpgWraper">
            <div class="container">
                <ul class="row compnaieslist">
                    <?php if($companies): ?>
                        <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="col-md-3 col-sm-6">
                                <div class="compint">
                                    <div class="imgwrap"><a
                                            href="<?php echo e(url('company-detail' . '/' . $company->slug . '_in_' . $country->country)); ?>"><?php echo e($company->printCompanyImage()); ?></a>
                                    </div>
                                    <h3><a
                                            href="<?php echo e(url('company-detail' . '/' . $company->slug . '_in_' . $country->country)); ?>"><?php echo e($company->name); ?></a>
                                    </h3>
                                    <div class="loctext"><i class="fa fa-map-marker" aria-hidden="true"></i>
                                        <?php echo e($company->location); ?></div>
                                    <div class="curentopen"><i class="fa fa-black-tie" aria-hidden="true"></i>
                                        <?php echo e(__('Current jobs')); ?> :
                                        <?php echo e($company->countNumJobs('company_id', $company->id)); ?>

                                    </div>
                                    <?php if($company->is_verification_cleared): ?>
                                        <div class="my-2 text-success">
                                            <i class="fa fa-check-circle text-success"></i> <?php echo e(__('Verified')); ?>

                                        </div>
                                    <?php else: ?>
                                        <div class="my-2 text-danger" style="visibility: hidden;">
                                            <i class="fa fa-times-circle text-danger"></i> <?php echo e(__('Verified')); ?>

                                        </div>
                                    <?php endif; ?>
                                </div>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>

                </ul>
                <div class="pagiWrap">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="showreslt">
                                <?php echo e(__('Showing Pages')); ?> : <?php echo e($companies->firstItem()); ?> - <?php echo e($companies->lastItem()); ?>

                                <?php echo e(__('Total')); ?> <?php echo e($companies->total()); ?>

                            </div>
                        </div>
                        <div class="col-md-7 text-right">
                            <?php if(isset($companies) && count($companies)): ?>
                                <?php echo e($companies->appends(request()->query())->links()); ?>

                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    <?php else: ?>
        <div class="listpgWraper">
            <div class="container">
                <ul class="row compnaieslist">
                    <?php if($companies): ?>
                        <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="col-md-3 col-sm-6">
                                <div class="compint">
                                    <div class="imgwrap"><a
                                            href="<?php echo e(route('company.detail', $company->slug)); ?>"><?php echo e($company->printCompanyImage()); ?></a>
                                    </div>
                                    <h3><a href="<?php echo e(route('company.detail', $company->slug)); ?>"><?php echo e($company->name); ?></a>
                                    </h3>
                                    <div class="loctext"><i class="fa fa-map-marker" aria-hidden="true"></i>
                                        <?php echo e($company->location); ?></div>
                                    <div class="curentopen"><i class="fa fa-black-tie" aria-hidden="true"></i>
                                        <?php echo e(__('Current jobs')); ?> :
                                        <?php echo e($company->countNumJobs('company_id', $company->id)); ?>

                                    </div>
                                    <?php if($company->is_verification_cleared): ?>
                                        <div class="my-2 text-success">
                                            <i class="fa fa-check-circle text-success"></i> <?php echo e(__('Verified')); ?>

                                        </div>
                                    <?php else: ?>
                                        <div class="my-2 text-danger" style="visibility: hidden;">
                                            <i class="fa fa-times-circle text-danger"></i> <?php echo e(__('Verified')); ?>

                                        </div>
                                    <?php endif; ?>
                                </div>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>

                </ul>
                <div class="pagiWrap">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="showreslt">
                                <?php echo e(__('Showing Pages')); ?> : <?php echo e($companies->firstItem()); ?> - <?php echo e($companies->lastItem()); ?>

                                <?php echo e(__('Total')); ?> <?php echo e($companies->total()); ?>

                            </div>
                        </div>
                        <div class="col-md-7 text-right">
                            <?php if(isset($companies) && count($companies)): ?>
                                <?php echo e($companies->appends(request()->query())->links()); ?>

                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    <?php endif; ?>

    <?php echo $__env->make('includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('styles'); ?>
    <style type="text/css">
        .formrow iframe {
            height: 78px;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('scripts'); ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('click', '#send_company_message', function() {
                var postData = $('#send-company-message-form').serialize();
                $.ajax({
                    type: 'POST',
                    url: "<?php echo e(route('contact.company.message.send')); ?>",
                    data: postData,
                    //dataType: 'json',
                    success: function(data) {
                        response = JSON.parse(data);
                        var res = response.success;
                        if (res == 'success') {
                            var errorString = '<div role="alert" class="alert alert-success">' +
                                response.message + '</div>';
                            $('#alert_messages').html(errorString);
                            $('#send-company-message-form').hide('slow');
                            $(document).scrollTo('.alert', 2000);
                        } else {
                            var errorString =
                                '<div class="alert alert-danger" role="alert"><ul>';
                            response = JSON.parse(data);
                            $.each(response, function(index, value) {
                                errorString += '<li>' + value + '</li>';
                            });
                            errorString += '</ul></div>';
                            $('#alert_messages').html(errorString);
                            $(document).scrollTo('.alert', 2000);
                        }
                    },
                });
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\saadmediajobcato\resources\views/company/listing.blade.php ENDPATH**/ ?>