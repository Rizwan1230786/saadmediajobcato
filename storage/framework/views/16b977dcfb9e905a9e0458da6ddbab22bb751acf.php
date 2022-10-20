
<?php $__env->startSection('content'); ?>
    <!-- Header start -->
    <?php if(!empty($country)): ?>
        <?php echo $__env->make('includes.countryheader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php else: ?>
        <?php echo $__env->make('includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <!-- Header end -->
    <!-- Inner Page Title start -->
    <?php echo $__env->make('includes.inner_page_title', ['page_title' => __('Job Detail')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Inner Page Title end -->
    <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('includes.inner_top_search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <?php
        $company = $job->getCompany();
    ?>






    <div class="listpgWraper">
        <?php if(!empty($country)): ?>
            <div class="container">
                <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


                <!-- Job Detail start -->
                <div class="row">
                    <div class="col-lg-7">

                        <!-- Job Header start -->
                        <div class="job-header">
                            <div class="jobinfo">

                                <h2><?php echo e($job->title); ?> - <?php echo e($company->name); ?></h2>
                                <div class="ptext"><?php echo e(__('Date Posted')); ?>: <?php echo e($job->created_at->format('M d, Y')); ?></div>

                                <?php if(!Auth::user() && !Auth::guard('company')->user()): ?>
                                    <a href="<?php echo e(route('login')); ?>"><i class="fa fa-sign-in" aria-hidden="true"></i>
                                        <?php echo e(__('Login to View Salary')); ?> </a>
                                <?php else: ?>
                                    <?php if(!(bool) $job->hide_salary): ?>
                                        <div class="salary"><?php echo e(__('Monthly Salary')); ?>:
                                            <strong><?php echo e($job->salary_from . ' ' . $job->salary_currency); ?> -
                                                <?php echo e($job->salary_to . ' ' . $job->salary_currency); ?></strong>
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>

                            </div>

                            <!-- Job Detail start -->
                            <div class="jobmainreq">
                                <div class="jobdetail">
                                    <h3><i class="fa fa-align-left" aria-hidden="true"></i> <?php echo e(__('Job Detail')); ?></h3>


                                    <ul class="jbdetail">
                                        <li class="row">
                                            <div class="col-md-4 col-xs-5"><?php echo e(__('Location')); ?>:</div>
                                            <div class="col-md-8 col-xs-7">
                                                <?php if((bool) $job->is_freelance): ?>
                                                    <span>Freelance</span>
                                                <?php else: ?>
                                                    <span><?php echo e($job->getLocation()); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </li>
                                        <li class="row">
                                            <div class="col-md-4 col-xs-5"><?php echo e(__('Company')); ?>:</div>
                                            <div class="col-md-8 col-xs-7"><a
                                                    href="<?php echo e(url('company-detail'.'/'.$company->slug.'_in_'.$country->slug)); ?>"><?php echo e($company->name); ?></a>
                                            </div>
                                        </li>
                                        <li class="row">
                                            <div class="col-md-4 col-xs-5"><?php echo e(__('Type')); ?>:</div>
                                            <div class="col-md-8 col-xs-7"><span
                                                    class="permanent"><?php echo e($job->getJobType('job_type')); ?></span></div>
                                        </li>
                                        <li class="row">
                                            <div class="col-md-4 col-xs-5"><?php echo e(__('Shift')); ?>:</div>
                                            <div class="col-md-8 col-xs-7"><span
                                                    class="freelance"><?php echo e($job->getJobShift('job_shift')); ?></span></div>
                                        </li>
                                        <li class="row">
                                            <div class="col-md-4 col-xs-5"><?php echo e(__('Career Level')); ?>:</div>
                                            <div class="col-md-8 col-xs-7">
                                                <span><?php echo e($job->getCareerLevel('career_level')); ?></span>
                                            </div>
                                        </li>
                                        <li class="row">
                                            <div class="col-md-4 col-xs-5"><?php echo e(__('Positions')); ?>:</div>
                                            <div class="col-md-8 col-xs-7"><span><?php echo e($job->num_of_positions); ?></span></div>
                                        </li>
                                        <li class="row">
                                            <div class="col-md-4 col-xs-5"><?php echo e(__('Experience')); ?>:</div>
                                            <div class="col-md-8 col-xs-7">
                                                <span><?php echo e($job->getJobExperience('job_experience')); ?></span>
                                            </div>
                                        </li>
                                        <li class="row">
                                            <div class="col-md-4 col-xs-5"><?php echo e(__('Gender')); ?>:</div>
                                            <div class="col-md-8 col-xs-7"><span><?php echo e($job->getGender('gender')); ?></span>
                                            </div>
                                        </li>
                                        <li class="row">
                                            <div class="col-md-4 col-xs-5"><?php echo e(__('Degree')); ?>:</div>
                                            <div class="col-md-8 col-xs-7">
                                                <span><?php echo e($job->getDegreeLevel('degree_level')); ?></span>
                                            </div>
                                        </li>
                                        <li class="row">
                                            <div class="col-md-4 col-xs-5"><?php echo e(__('Apply Before')); ?>:</div>
                                            <div class="col-md-8 col-xs-7">
                                                <span><?php echo e($job->expiry_date->format('M d, Y')); ?></span>
                                            </div>
                                        </li>

                                    </ul>



                                </div>
                            </div>

                            <hr>
                            <div class="jobButtons">
                                <!-- <a href="<?php echo e(route('email.to.friend', $job->slug)); ?>" class="btn"><i class="fa fa-envelope" aria-hidden="true"></i> <?php echo e(__('Email to Friend')); ?></a> -->
                                <?php if(Auth::check() && Auth::user()->isFavouriteJob($job->slug)): ?>
                                    <a href="<?php echo e(route('remove.from.favourite', $job->slug)); ?>" class="btn"><i
                                            class="fa fa-floppy-o" aria-hidden="true"></i> <?php echo e(__('Favourite Job')); ?> </a>
                                <?php else: ?>
                                    <a href="<?php echo e(route('add.to.favourite', $job->slug)); ?>" class="btn"><i
                                            class="fa fa-floppy-o" aria-hidden="true"></i> <?php echo e(__('Add to Favourite')); ?></a>
                                <?php endif; ?>
                                <!-- <a href="<?php echo e(route('report.abuse', $job->slug)); ?>" class="btn report"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> <?php echo e(__('Report Abuse')); ?></a> -->
                            </div>
                        </div>



                        <!-- Job Description start -->
                        <div class="job-header">
                            <div class="contentbox">
                                <h3><i class="fa fa-file-text-o" aria-hidden="true"></i> <?php echo e(__('Job Description')); ?></h3>
                                <p><?php echo $job->description; ?></p>
                            </div>
                        </div>


                        <div class="job-header benefits">
                            <div class="contentbox">
                                <h3><i class="fa fa-file-text-o" aria-hidden="true"></i> <?php echo e(__('Benefits')); ?></h3>
                                <p><?php echo $job->benefits; ?></p>
                            </div>
                        </div>

                        <div class="job-header">
                            <div class="contentbox">
                                <h3><i class="fa fa-puzzle-piece" aria-hidden="true"></i> <?php echo e(__('Skills Required')); ?></h3>
                                <ul class="skillslist">
                                    <?php echo $job->getJobSkillsList(); ?>

                                </ul>
                            </div>
                        </div>


                        <!-- Job Description end -->


                    </div>
                    <!-- related jobs end -->

                    <div class="col-lg-5">
                        <div class="jobButtons applybox">
                            <?php if($job->isJobExpired()): ?>
                                <span class="jbexpire"><i class="fa fa-paper-plane" aria-hidden="true"></i>
                                    <?php echo e(__('Job is expired')); ?></span>
                            <?php elseif(Auth::check() && Auth::user()->isAppliedOnJob($job->id)): ?>
                                <a href="javascript:;" class="btn apply applied"><i class="fa fa-paper-plane"
                                        aria-hidden="true"></i> <?php echo e(__('Already Applied')); ?></a>
                            <?php else: ?>
                                <a href="<?php echo e(route('apply.job', $job->slug)); ?>" class="btn apply"><i
                                        class="fa fa-paper-plane" aria-hidden="true"></i> <?php echo e(__('Apply Now')); ?></a>
                            <?php endif; ?>
                        </div>


                        <div class="companyinfo">
                            <h3><i class="fa fa-building-o" aria-hidden="true"></i> <?php echo e(__('Company Overview')); ?></h3>
                            <div class="companylogo"><a
                                    href="<?php echo e(url('company-detail'.'/'.$company->slug.'_in_'.$country->slug)); ?>"><?php echo e($company->printCompanyImage()); ?></a>
                            </div>
                            <div class="title"><a
                                    href="<?php echo e(url('company-detail'.'/'.$company->slug.'_in_'.$country->slug)); ?>"><?php echo e($company->name); ?></a></div>
                            <div class="ptext"><?php echo e($company->getLocation()); ?></div>
                            <div class="opening">
                                <a href="<?php echo e(url('company-detail'.'/'.$company->slug.'_in_'.$country->slug)); ?>">
                                    <?php echo e(App\Company::countNumJobs('company_id', $company->id)); ?>

                                    <?php echo e(__('Current Jobs Openings')); ?>

                                </a>
                            </div>
                            <div class="clearfix"></div>
                            <hr>
                            <div class="companyoverview">

                                <p><?php echo e(str_limit(strip_tags($company->description), 250, '...')); ?> <a
                                        href="<?php echo e(url('company-detail'.'/'.$company->slug.'_in_'.$country->country)); ?>">Read More</a></p>
                            </div>
                        </div>



                        <!-- related jobs start -->
                        <div class="relatedJobs">
                            <h3><?php echo e(__('Related Jobs')); ?></h3>
                            <ul class="searchList">
                                <?php if(isset($relatedJobs) && count($relatedJobs)): ?>
                                    <?php $__currentLoopData = $relatedJobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relatedJob): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($relatedJob->country_id == $country->id): ?>
                                            <?php $relatedJobCompany = $relatedJob->getCompany(); ?>
                                            <?php if(null !== $relatedJobCompany): ?>
                                                <!--Job start-->
                                                <li>
                                                    <div class="jobinfo">
                                                        <h3><a href="<?php echo e(url('jobdetail'.'/'.$relatedJob->slug.'_in_'.$country->slug)); ?>"
                                                                title="<?php echo e($relatedJob->title); ?>"><?php echo e($relatedJob->title); ?></a>
                                                        </h3>
                                                        <?php if($relatedJobCompany->country_id == $country->id): ?>
                                                        <div class="companyName"><a
                                                                href="<?php echo e(url('company-detail'.'/'.$relatedJobCompany->slug.'_in_'.$country->slug)); ?>"
                                                                title="<?php echo e($relatedJobCompany->name); ?>"><?php echo e($relatedJobCompany->name); ?></a>
                                                        </div>
                                                        <?php endif; ?>
                                                        <div class="location">
                                                            <span><?php echo e($relatedJob->getCity('city')); ?></span>
                                                        </div>
                                                        <div class="location">
                                                            <label
                                                                class="fulltime"><?php echo e($relatedJob->getJobType('job_type')); ?></label>
                                                            <label
                                                                class="partTime"><?php echo e($relatedJob->getJobShift('job_shift')); ?></label>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>

                                                </li>
                                                <!--Job end-->
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>

                                <!-- Job end -->
                            </ul>
                        </div>

                        <!-- Google Map start -->
                        <div class="job-header">
                            <div class="jobdetail">
                                <h3><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo e(__('Google Map')); ?></h3>
                                <div class="gmap">
                                    <?php echo $company->map; ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="container">
                <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


                <!-- Job Detail start -->
                <div class="row">
                    <div class="col-lg-7">

                        <!-- Job Header start -->
                        <div class="job-header">
                            <div class="jobinfo">

                                <h2><?php echo e($job->title); ?> - <?php echo e($company->name); ?></h2>
                                <div class="ptext"><?php echo e(__('Date Posted')); ?>: <?php echo e($job->created_at->format('M d, Y')); ?>

                                </div>

                                <?php if(!Auth::user() && !Auth::guard('company')->user()): ?>
                                    <a href="<?php echo e(route('login')); ?>"><i class="fa fa-sign-in" aria-hidden="true"></i>
                                        <?php echo e(__('Login to View Salary')); ?> </a>
                                <?php else: ?>
                                    <?php if(!(bool) $job->hide_salary): ?>
                                        <div class="salary"><?php echo e(__('Monthly Salary')); ?>:
                                            <strong><?php echo e($job->salary_from . ' ' . $job->salary_currency); ?> -
                                                <?php echo e($job->salary_to . ' ' . $job->salary_currency); ?></strong>
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>

                            </div>

                            <!-- Job Detail start -->
                            <div class="jobmainreq">
                                <div class="jobdetail">
                                    <h3><i class="fa fa-align-left" aria-hidden="true"></i> <?php echo e(__('Job Detail')); ?></h3>


                                    <ul class="jbdetail">
                                        <li class="row">
                                            <div class="col-md-4 col-xs-5"><?php echo e(__('Location')); ?>:</div>
                                            <div class="col-md-8 col-xs-7">
                                                <?php if((bool) $job->is_freelance): ?>
                                                    <span>Freelance</span>
                                                <?php else: ?>
                                                    <span><?php echo e($job->getLocation()); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </li>
                                        <li class="row">
                                            <div class="col-md-4 col-xs-5"><?php echo e(__('Company')); ?>:</div>
                                            <div class="col-md-8 col-xs-7"><a
                                                    href="<?php echo e(route('company.detail', $company->id)); ?>"><?php echo e($company->name); ?></a>
                                            </div>
                                        </li>
                                        <li class="row">
                                            <div class="col-md-4 col-xs-5"><?php echo e(__('Type')); ?>:</div>
                                            <div class="col-md-8 col-xs-7"><span
                                                    class="permanent"><?php echo e($job->getJobType('job_type')); ?></span></div>
                                        </li>
                                        <li class="row">
                                            <div class="col-md-4 col-xs-5"><?php echo e(__('Shift')); ?>:</div>
                                            <div class="col-md-8 col-xs-7"><span
                                                    class="freelance"><?php echo e($job->getJobShift('job_shift')); ?></span></div>
                                        </li>
                                        <li class="row">
                                            <div class="col-md-4 col-xs-5"><?php echo e(__('Career Level')); ?>:</div>
                                            <div class="col-md-8 col-xs-7">
                                                <span><?php echo e($job->getCareerLevel('career_level')); ?></span>
                                            </div>
                                        </li>
                                        <li class="row">
                                            <div class="col-md-4 col-xs-5"><?php echo e(__('Positions')); ?>:</div>
                                            <div class="col-md-8 col-xs-7"><span><?php echo e($job->num_of_positions); ?></span></div>
                                        </li>
                                        <li class="row">
                                            <div class="col-md-4 col-xs-5"><?php echo e(__('Experience')); ?>:</div>
                                            <div class="col-md-8 col-xs-7">
                                                <span><?php echo e($job->getJobExperience('job_experience')); ?></span>
                                            </div>
                                        </li>
                                        <li class="row">
                                            <div class="col-md-4 col-xs-5"><?php echo e(__('Gender')); ?>:</div>
                                            <div class="col-md-8 col-xs-7"><span><?php echo e($job->getGender('gender')); ?></span>
                                            </div>
                                        </li>
                                        <li class="row">
                                            <div class="col-md-4 col-xs-5"><?php echo e(__('Degree')); ?>:</div>
                                            <div class="col-md-8 col-xs-7">
                                                <span><?php echo e($job->getDegreeLevel('degree_level')); ?></span>
                                            </div>
                                        </li>
                                        <li class="row">
                                            <div class="col-md-4 col-xs-5"><?php echo e(__('Apply Before')); ?>:</div>
                                            <div class="col-md-8 col-xs-7">
                                                <span><?php echo e($job->expiry_date->format('M d, Y')); ?></span>
                                            </div>
                                        </li>

                                    </ul>



                                </div>
                            </div>

                            <hr>
                            <div class="jobButtons">
                                <!-- <a href="<?php echo e(route('email.to.friend', $job->slug)); ?>" class="btn"><i class="fa fa-envelope" aria-hidden="true"></i> <?php echo e(__('Email to Friend')); ?></a> -->
                                <?php if(Auth::check() && Auth::user()->isFavouriteJob($job->slug)): ?>
                                    <a href="<?php echo e(route('remove.from.favourite', $job->slug)); ?>" class="btn"><i
                                            class="fa fa-floppy-o" aria-hidden="true"></i> <?php echo e(__('Favourite Job')); ?>

                                    </a>
                                <?php else: ?>
                                    <a href="<?php echo e(route('add.to.favourite', $job->slug)); ?>" class="btn"><i
                                            class="fa fa-floppy-o" aria-hidden="true"></i>
                                        <?php echo e(__('Add to Favourite')); ?></a>
                                <?php endif; ?>
                                <!-- <a href="<?php echo e(route('report.abuse', $job->slug)); ?>" class="btn report"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> <?php echo e(__('Report Abuse')); ?></a> -->
                            </div>
                        </div>



                        <!-- Job Description start -->
                        <div class="job-header">
                            <div class="contentbox">
                                <h3><i class="fa fa-file-text-o" aria-hidden="true"></i> <?php echo e(__('Job Description')); ?>

                                </h3>
                                <p><?php echo $job->description; ?></p>
                            </div>
                        </div>


                        <div class="job-header benefits">
                            <div class="contentbox">
                                <h3><i class="fa fa-file-text-o" aria-hidden="true"></i> <?php echo e(__('Benefits')); ?></h3>
                                <p><?php echo $job->benefits; ?></p>
                            </div>
                        </div>

                        <div class="job-header">
                            <div class="contentbox">
                                <h3><i class="fa fa-puzzle-piece" aria-hidden="true"></i> <?php echo e(__('Skills Required')); ?>

                                </h3>
                                <ul class="skillslist">
                                    <?php echo $job->getJobSkillsList(); ?>

                                </ul>
                            </div>
                        </div>


                        <!-- Job Description end -->


                    </div>
                    <!-- related jobs end -->

                    <div class="col-lg-5">
                        <div class="jobButtons applybox">
                            <?php if($job->isJobExpired()): ?>
                                <span class="jbexpire"><i class="fa fa-paper-plane" aria-hidden="true"></i>
                                    <?php echo e(__('Job is expired')); ?></span>
                            <?php elseif(Auth::check() && Auth::user()->isAppliedOnJob($job->id)): ?>
                                <a href="javascript:;" class="btn apply applied"><i class="fa fa-paper-plane"
                                        aria-hidden="true"></i> <?php echo e(__('Already Applied')); ?></a>
                            <?php else: ?>
                                <a href="<?php echo e(route('apply.job', $job->slug)); ?>" class="btn apply"><i
                                        class="fa fa-paper-plane" aria-hidden="true"></i> <?php echo e(__('Apply Now')); ?></a>
                            <?php endif; ?>
                        </div>


                        <div class="companyinfo">
                            <h3><i class="fa fa-building-o" aria-hidden="true"></i> <?php echo e(__('Company Overview')); ?></h3>
                            <div class="companylogo"><a
                                    href="<?php echo e(route('company.detail', $company->slug)); ?>"><?php echo e($company->printCompanyImage()); ?></a>
                            </div>
                            <div class="title"><a
                                    href="<?php echo e(route('company.detail', $company->slug)); ?>"><?php echo e($company->name); ?></a></div>
                            <div class="ptext"><?php echo e($company->getLocation()); ?></div>
                            <div class="opening">
                                <a href="<?php echo e(route('company.detail', $company->slug)); ?>">
                                    <?php echo e(App\Company::countNumJobs('company_id', $company->id)); ?>

                                    <?php echo e(__('Current Jobs Openings')); ?>

                                </a>
                            </div>
                            <div class="clearfix"></div>
                            <hr>
                            <div class="companyoverview">

                                <p><?php echo e(str_limit(strip_tags($company->description), 250, '...')); ?> <a
                                        href="<?php echo e(route('company.detail', $company->slug)); ?>">Read More</a></p>
                            </div>
                        </div>



                        <!-- related jobs start -->
                        <div class="relatedJobs">
                            <h3><?php echo e(__('Related Jobs')); ?></h3>
                            <ul class="searchList">
                                <?php if(isset($relatedJobs) && count($relatedJobs)): ?>
                                    <?php $__currentLoopData = $relatedJobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relatedJob): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $relatedJobCompany = $relatedJob->getCompany(); ?>
                                        <?php if(null !== $relatedJobCompany): ?>
                                            <!--Job start-->
                                            <li>


                                                <div class="jobinfo">
                                                    <h3><a href="<?php echo e(route('job.detail', [$relatedJob->slug])); ?>"
                                                            title="<?php echo e($relatedJob->title); ?>"><?php echo e($relatedJob->title); ?></a>
                                                    </h3>
                                                    <div class="companyName"><a
                                                            href="<?php echo e(route('company.detail', $relatedJobCompany->slug)); ?>"
                                                            title="<?php echo e($relatedJobCompany->name); ?>"><?php echo e($relatedJobCompany->name); ?></a>
                                                    </div>
                                                    <div class="location"><span><?php echo e($relatedJob->getCity('city')); ?></span>
                                                    </div>
                                                    <div class="location">
                                                        <label
                                                            class="fulltime"><?php echo e($relatedJob->getJobType('job_type')); ?></label>
                                                        <label
                                                            class="partTime"><?php echo e($relatedJob->getJobShift('job_shift')); ?></label>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>

                                            </li>
                                            <!--Job end-->
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>

                                <!-- Job end -->
                            </ul>
                        </div>

                        <!-- Google Map start -->
                        <div class="job-header">
                            <div class="jobdetail">
                                <h3><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo e(__('Google Map')); ?></h3>
                                <div class="gmap">
                                    <?php echo $company->map; ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <?php if(!empty($country)): ?>
        <?php echo $__env->make('includes.countrybase_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php else: ?>
        <?php echo $__env->make('includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('styles'); ?>
    <style type="text/css">
        .view_more {
            display: none !important;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function($) {
            $("form").submit(function() {
                $(this).find(":input").filter(function() {
                    return !this.value;
                }).attr("disabled", "disabled");
                return true;
            });
            $("form").find(":input").prop("disabled", false);

            $(".view_more_ul").each(function() {
                if ($(this).height() > 100) {
                    $(this).css('height', 100);
                    $(this).css('overflow', 'hidden');
                    //alert($( this ).next());
                    $(this).next().removeClass('view_more');
                }
            });



        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\saadmediajobcato\resources\views/job/detail.blade.php ENDPATH**/ ?>