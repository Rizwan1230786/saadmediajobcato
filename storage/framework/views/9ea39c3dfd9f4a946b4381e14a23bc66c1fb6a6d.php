<div class="col-md-3 col-sm-6">
    <div class="jobreqbtn">
    <?php if(Request::get('search') != '' || Request::get('functional_area_id') != '' || Request::get('country_id') != ''|| Request::get('state_id') != '' || Request::get('city_id') != ''|| Request::get('city_id') != ''): ?>
        <!-- <a class="btn btn-job-alert" href="javascript:;">
		<i class="fa fa-bell" style="font-size:1.125rem;"></i> <?php echo e(__('Save Job Alert')); ?> </a> -->
    <?php else: ?>
        <!-- <a class="btn btn-job-alert-disabled" disabled href="javascript:;">
		<i class="fa fa-bell" style="font-size:1.125rem;"></i> <?php echo e(__('Save Job Alert')); ?></a> -->
        <?php endif; ?>


        <?php if(Auth::guard('company')->check()): ?>
            <a href="<?php echo e(route('post.job')); ?>" class="btn"><i class="fa fa-file-text" aria-hidden="true"></i> <?php echo e(__('Post Job')); ?></a>
        <?php else: ?>
            <a href="<?php echo e(url('my-profile#cvs')); ?>" class="btn"><i class="fa fa-file-text" aria-hidden="true"></i> <?php echo e(__('Upload Your Resume')); ?></a>
        <?php endif; ?>
    </div>
    <!-- Side Bar start -->
    <div class="sidebar">
        <input type="hidden" name="search" value="<?php echo e(Request::get('search', '')); ?>"/>
    <?php $check_filters_available = false ?>

    

    



    


    <?php if(isset($cityIdsArray) && count($cityIdsArray)): ?>
        <?php $check_filters_available = true ?>
        <!-- Jobs By City -->
            <div class="widget">
                <h4 class="widget-title"><?php echo e(__('Jobs By City')); ?></h4>
                <ul class="optionlist view_more_ul">
                    <?php $__currentLoopData = $cityIdsArray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$city_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $city = App\City::where('city_id','=',$city_id)->lang()->active()->first();
                        ?>
                        <?php if(null !== $city): ?>
                            <?php
                                $checked = (in_array($city->city_id, Request::get('city_id', array())))? 'checked="checked"':'';
                            ?>
                            <li>
                                <input type="checkbox" class="city_filter" name="city_id[]" id="city_<?php echo e($city->city_id); ?>" value="<?php echo e($city->city_id); ?>" <?php echo e($checked); ?>>
                                <label for="city_<?php echo e($city->city_id); ?>"></label>
                                <?php echo e($city->city); ?> <span><?php echo e(App\Job::countNumJobs('city_id', $city->city_id)); ?></span>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <span class="text text-primary view_more hide_vm"><?php echo e(__('View More')); ?></span>
                <button type="button" class="btn btn-sm btn-danger reset-btn" data-target=".city_filter" data-type="checkbox">Reset</button>
            </div>
            <!-- Jobs By City end-->
    <?php endif; ?>

    <?php if(isset($jobExperienceIdsArray) && count($jobExperienceIdsArray)): ?>
        <?php $check_filters_available = true ?>
        <!-- Jobs By Experience -->
            <div class="widget">
                <h4 class="widget-title"><?php echo e(__('Jobs By Experience')); ?></h4>
                <ul class="optionlist view_more_ul">
                    <?php $__currentLoopData = $jobExperienceIdsArray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$job_experience_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $jobExperience = App\JobExperience::where('job_experience_id','=',$job_experience_id)->lang()->active()->first();
                        ?>
                        <?php if(null !== $jobExperience): ?>
                            <?php
                                $checked = (in_array($jobExperience->job_experience_id, Request::get('job_experience_id', array())))? 'checked="checked"':'';
                            ?>
                            <li>
                                <input type="checkbox" class="job_experience_filter" name="job_experience_id[]" id="job_experience_<?php echo e($jobExperience->job_experience_id); ?>" value="<?php echo e($jobExperience->job_experience_id); ?>" <?php echo e($checked); ?>>
                                <label for="job_experience_<?php echo e($jobExperience->job_experience_id); ?>"></label>
                                <?php echo e($jobExperience->job_experience); ?> <span><?php echo e(App\Job::countNumJobs('job_experience_id', $jobExperience->job_experience_id)); ?></span>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <span class="text text-primary view_more hide_vm"><?php echo e(__('View More')); ?></span>
                <button type="button" class="btn btn-sm btn-danger reset-btn" data-target=".job_experience_filter" data-type="checkbox">Reset</button>
            </div>
            <!-- Jobs By Experience end -->
    <?php endif; ?>

    <?php if(isset($jobTypeIdsArray) && count($jobTypeIdsArray)): ?>
        <?php $check_filters_available = true ?>
        <!-- Jobs By Job Type -->
            <div class="widget">
                <h4 class="widget-title"><?php echo e(__('Jobs By Job Type')); ?></h4>
                <ul class="optionlist view_more_ul">
                    <?php $__currentLoopData = $jobTypeIdsArray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$job_type_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $jobType = App\JobType::where('job_type_id','=',$job_type_id)->lang()->active()->first();
                        ?>
                        <?php if(null !== $jobType): ?>
                            <?php
                                $checked = (in_array($jobType->job_type_id, Request::get('job_type_id', array())))? 'checked="checked"':'';
                            ?>
                            <li>
                                <input type="checkbox" class="job_type_filter" name="job_type_id[]" id="job_type_<?php echo e($jobType->job_type_id); ?>" value="<?php echo e($jobType->job_type_id); ?>" <?php echo e($checked); ?>>
                                <label for="job_type_<?php echo e($jobType->job_type_id); ?>"></label>
                                <?php echo e($jobType->job_type); ?> <span><?php echo e(App\Job::countNumJobs('job_type_id', $jobType->job_type_id)); ?></span>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <span class="text text-primary view_more hide_vm"><?php echo e(__('View More')); ?></span>
                <button type="button" class="btn btn-sm btn-danger reset-btn" data-target=".job_type_filter" data-type="checkbox">Reset</button>
            </div>
            <!-- Jobs By Job Type end -->
    <?php endif; ?>

    <?php if(isset($jobShiftIdsArray) && count($jobShiftIdsArray)): ?>
        <?php $check_filters_available = true ?>
        <!-- Jobs By Job Shift -->
            <div class="widget">
                <h4 class="widget-title"><?php echo e(__('Jobs By Job Shift')); ?></h4>
                <ul class="optionlist view_more_ul">
                    <?php $__currentLoopData = $jobShiftIdsArray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$job_shift_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $jobShift = App\JobShift::where('job_shift_id','=',$job_shift_id)->lang()->active()->first();
                        ?>
                        <?php if(null !== $jobShift): ?>
                            <?php
                                $checked = (in_array($jobShift->job_shift_id, Request::get('job_shift_id', array())))? 'checked="checked"':'';
                            ?>
                            <li>
                                <input type="checkbox" class="job_shift_filter" name="job_shift_id[]" id="job_shift_<?php echo e($jobShift->job_shift_id); ?>" value="<?php echo e($jobShift->job_shift_id); ?>" <?php echo e($checked); ?>>
                                <label for="job_shift_<?php echo e($jobShift->job_shift_id); ?>"></label>
                                <?php echo e($jobShift->job_shift); ?> <span><?php echo e(App\Job::countNumJobs('job_shift_id', $jobShift->job_shift_id)); ?></span>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <span class="text text-primary view_more hide_vm"><?php echo e(__('View More')); ?></span>
                <button type="button" class="btn btn-sm btn-danger reset-btn" data-target=".job_shift_filter" data-type="checkbox">Reset</button>
            </div>
            <!-- Jobs By Job Shift end -->
    <?php endif; ?>

    <?php if(isset($careerLevelIdsArray) && count($careerLevelIdsArray)): ?>
        <?php $check_filters_available = true ?>
        <!-- Jobs By Career Level -->
            <div class="widget">
                <h4 class="widget-title"><?php echo e(__('Jobs By Career Level')); ?></h4>
                <ul class="optionlist view_more_ul">
                    <?php $__currentLoopData = $careerLevelIdsArray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$career_level_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $careerLevel = App\CareerLevel::where('career_level_id','=',$career_level_id)->lang()->active()->first();
                        ?>
                        <?php if(null !== $careerLevel): ?>
                            <?php
                                $checked = (in_array($careerLevel->career_level_id, Request::get('career_level_id', array())))? 'checked="checked"':'';
                            ?>
                            <li>
                                <input type="checkbox" class="career_level_filter" name="career_level_id[]" id="career_level_<?php echo e($careerLevel->career_level_id); ?>" value="<?php echo e($careerLevel->career_level_id); ?>" <?php echo e($checked); ?>>
                                <label for="career_level_<?php echo e($careerLevel->career_level_id); ?>"></label>
                                <?php echo e($careerLevel->career_level); ?> <span><?php echo e(App\Job::countNumJobs('career_level_id', $careerLevel->career_level_id)); ?></span>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <span class="text text-primary view_more hide_vm"><?php echo e(__('View More')); ?></span>
                <button type="button" class="btn btn-sm btn-danger reset-btn" data-target=".career_level_filter" data-type="checkbox">Reset</button>
            </div>
            <!-- Jobs By Career Level end -->
    <?php endif; ?>

    <?php if(isset($degreeLevelIdsArray) && count($degreeLevelIdsArray)): ?>
        <?php $check_filters_available = true ?>
        <!-- Jobs By Degree Level -->
            <div class="widget">
                <h4 class="widget-title"><?php echo e(__('Jobs By Degree Level')); ?></h4>
                <ul class="optionlist view_more_ul">
                    <?php $__currentLoopData = $degreeLevelIdsArray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$degree_level_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $degreeLevel = App\DegreeLevel::where('degree_level_id','=',$degree_level_id)->lang()->active()->first();
                        ?>
                        <?php if(null !== $degreeLevel): ?>
                            <?php
                                $checked = (in_array($degreeLevel->degree_level_id, Request::get('degree_level_id', array())))? 'checked="checked"':'';
                            ?>
                            <li>
                                <input type="checkbox" class="degree_level_filter" name="degree_level_id[]" id="degree_level_<?php echo e($degreeLevel->degree_level_id); ?>" value="<?php echo e($degreeLevel->degree_level_id); ?>" <?php echo e($checked); ?>>
                                <label for="degree_level_<?php echo e($degreeLevel->degree_level_id); ?>"></label>
                                <?php echo e($degreeLevel->degree_level); ?> <span><?php echo e(App\Job::countNumJobs('degree_level_id', $degreeLevel->degree_level_id)); ?></span>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <span class="text text-primary view_more hide_vm"><?php echo e(__('View More')); ?></span>
                <button type="button" class="btn btn-sm btn-danger reset-btn" data-target=".degree_level_filter" data-type="checkbox">Reset</button>
            </div>
            <!-- Jobs By Degree Level end -->
    <?php endif; ?>

    <?php if(isset($genderIdsArray) && count($genderIdsArray)): ?>
        <?php $check_filters_available = true ?>
        <!-- Jobs By Gender -->
            <div class="widget">
                <h4 class="widget-title"><?php echo e(__('Jobs By Gender')); ?></h4>
                <ul class="optionlist view_more_ul">
                    <?php $__currentLoopData = $genderIdsArray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$gender_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $gender = App\Gender::where('gender_id','=',$gender_id)->lang()->active()->first();
                        ?>
                        <?php if(null !== $gender): ?>
                            <?php
                                $checked = (in_array($gender->gender_id, Request::get('gender_id', array())))? 'checked="checked"':'';
                            ?>
                            <li>
                                <input type="checkbox" class="gender_filter" name="gender_id[]" id="gender_<?php echo e($gender->gender_id); ?>" value="<?php echo e($gender->gender_id); ?>" <?php echo e($checked); ?>>
                                <label for="gender_<?php echo e($gender->gender_id); ?>"></label>
                                <?php echo e($gender->gender); ?> <span><?php echo e(App\Job::countNumJobs('gender_id', $gender->gender_id)); ?></span>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <span class="text text-primary view_more hide_vm"><?php echo e(__('View More')); ?></span>
                <button type="button" class="btn btn-sm btn-danger reset-btn" data-target=".gender_filter" data-type="checkbox">Reset</button>
            </div>
            <!-- Jobs By Gender end -->
    <?php endif; ?>

    <?php if(isset($industryIdsArray) && count($industryIdsArray)): ?>
        <?php $check_filters_available = true ?>
        <!-- Jobs By Industry -->
            <div class="widget">
                <h4 class="widget-title"><?php echo e(__('Jobs By Industry')); ?></h4>
                <ul class="optionlist view_more_ul">
                    <?php $__currentLoopData = $industryIdsArray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$industry_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $industry = App\Industry::where('id','=',$industry_id)->lang()->active()->first();
                        ?>
                        <?php if(null !== $industry): ?>
                            <?php
                                $checked = (in_array($industry->id, Request::get('industry_id', array())))? 'checked="checked"':'';
                            ?>
                            <li>
                                <input type="checkbox" class="job_industry_filter" name="industry_id[]" id="industry_<?php echo e($industry->id); ?>" value="<?php echo e($industry->id); ?>" <?php echo e($checked); ?>>
                                <label for="industry_<?php echo e($industry->id); ?>"></label>
                                <?php echo e($industry->industry); ?> <span><?php echo e(App\Job::countNumJobs('industry_id', $industry->id)); ?></span>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <span class="text text-primary view_more hide_vm"><?php echo e(__('View More')); ?></span>
                <button type="button" class="btn btn-sm btn-danger reset-btn" data-target=".job_industry_filter" data-type="checkbox">Reset</button>
            </div>
            <!-- Jobs By Industry end -->
    <?php endif; ?>

    <?php if(isset($skillIdsArray) && count($skillIdsArray)): ?>
        <?php $check_filters_available = true ?>
        <!-- Jobs By Skill -->
            <div class="widget">
                <h4 class="widget-title"><?php echo e(__('Jobs By Skill')); ?></h4>
                <ul class="optionlist view_more_ul">
                    <?php $__currentLoopData = $skillIdsArray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$job_skill_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $jobSkill = App\JobSkill::where('job_skill_id','=',$job_skill_id)->lang()->active()->first();
                        ?>
                        <?php if(null !== $jobSkill): ?>
                            <?php
                                $checked = (in_array($jobSkill->job_skill_id, Request::get('job_skill_id', array())))? 'checked="checked"':'';
                            ?>
                            <li>
                                <input type="checkbox" class="job_skill_filter" name="job_skill_id[]" id="job_skill_<?php echo e($jobSkill->job_skill_id); ?>" value="<?php echo e($jobSkill->job_skill_id); ?>" <?php echo e($checked); ?>>
                                <label for="job_skill_<?php echo e($jobSkill->job_skill_id); ?>"></label>
                                <?php echo e($jobSkill->job_skill); ?> <span><?php echo e(App\Job::countNumJobs('job_skill_id', $jobSkill->job_skill_id)); ?></span>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <span class="text text-primary view_more hide_vm"><?php echo e(__('View More')); ?></span>
                <button type="button" class="btn btn-sm btn-danger reset-btn" data-target=".job_skill_filter" data-type="checkbox">Reset</button>
            </div>
            <!-- Jobs By Industry end -->
    <?php endif; ?>

    <?php if(isset($functionalAreaIdsArray) && count($functionalAreaIdsArray)): ?>
        <?php $check_filters_available = true ?>
        <!-- Jobs By Functional Area -->
            <div class="widget">
                <h4 class="widget-title"><?php echo e(__('Jobs By Functional Areas')); ?></h4>
                <ul class="optionlist view_more_ul">
                    <?php $__currentLoopData = $functionalAreaIdsArray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$functional_area_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $functionalArea = App\FunctionalArea::where('functional_area_id','=',$functional_area_id)->lang()->active()->first();
                        ?>
                        <?php if(null !== $functionalArea): ?>
                            <?php
                                $checked = ($functionalArea->functional_area_id=Request::get('functional_area_id')) ? 'checked="checked"':'';                            ?>
                            <li>
                                <input type="checkbox" class="functional_area_filter" name="functional_area_id[]" id="functional_area_id_<?php echo e($functionalArea->functional_area_id); ?>" value="<?php echo e($functionalArea->functional_area_id); ?>" <?php echo e($checked); ?>>
                                <label for="functional_area_id_<?php echo e($functionalArea->functional_area_id); ?>"></label>
                                <?php echo e($functionalArea->functional_area); ?> <span><?php echo e(App\Job::countNumJobs('functional_area_id', $functionalArea->functional_area_id)); ?></span>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <!-- title end -->
                <span class="text text-primary view_more hide_vm"><?php echo e(__('View More')); ?></span>
                <button type="button" class="btn btn-sm btn-danger reset-btn" data-target=".functional_area_filter" data-type="checkbox">Reset</button>
            </div>
            <!-- Jobs By Functional Area end -->
    <?php endif; ?>

    <?php if(isset($companyIdsArray) && count($companyIdsArray)): ?>
        <?php $check_filters_available = true ?>
        <!-- Top Companies -->
            <div class="widget">
                <h4 class="widget-title"><?php echo e(__('Jobs By Company')); ?></h4>
                <ul class="optionlist view_more_ul">
                    <?php $__currentLoopData = $companyIdsArray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$company_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $company = App\Company::where('id','=',$company_id)->active()->first();
                        ?>
                        <?php if(null !== $company): ?>
                            <?php
                                $checked = (in_array($company->id, Request::get('company_id', array())))? 'checked="checked"':'';
                            ?>
                            <li>
                                <input type="checkbox" class="company_filter" name="company_id[]" id="company_<?php echo e($company->id); ?>" value="<?php echo e($company->id); ?>" <?php echo e($checked); ?>>
                                <label for="company_<?php echo e($company->id); ?>"></label>
                                <?php echo e($company->name); ?> <span><?php echo e(App\Job::countNumJobs('company_id', $company->id)); ?></span>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <span class="text text-primary view_more hide_vm"><?php echo e(__('View More')); ?></span>
                <button type="button" class="btn btn-sm btn-danger reset-btn" data-target=".company_filter" data-type="checkbox">Reset</button>
            </div>
            <!-- Top Companies end -->
        <?php endif; ?>

        <?php if( !$check_filters_available): ?>
            <div class="widget">
                <h4 class="widget-title"><?php echo e(__('Filters Not Applicable')); ?></h4>
            </div>
    <?php endif; ?>

    <!-- Salary -->
        <div class="widget">
            <h4 class="widget-title"><?php echo e(__('Salary Range')); ?></h4>
            <div class="form-group">
                <?php echo Form::number('salary_from', Request::get('salary_from', null), array('class'=>'form-control salary_range_filter', 'id'=>'salary_from', 'placeholder'=>__('Salary From'))); ?>

            </div>
            <div class="form-group">
                <?php echo Form::number('salary_to', Request::get('salary_to', null), array('class'=>'form-control salary_range_filter', 'id'=>'salary_to', 'placeholder'=>__('Salary To'))); ?>

            </div>
            <div class="form-group">
                <?php echo Form::select('salary_currency', ['' =>__('Select Salary Currency')]+$currencies, Request::get('salary_currency'), array('class'=>'form-control salary_range_filter', 'id'=>'salary_currency')); ?>

            </div>
            <!-- Salary end -->
            <button type="button" class="btn btn-sm btn-danger reset-btn" data-target=".salary_range_filter" data-type="number">Reset</button>
        </div>
        <!-- button -->
        <div class="searchnt">
            <button type="submit" class="btn"><i class="fa fa-search" aria-hidden="true"></i> <?php echo e(__('Search Jobs')); ?></button>
        </div>
        <!-- button end-->
        <!-- Side Bar end -->
    </div>
</div>

<style>
    .reset-btn{
        font-size: 10px;
    }
</style>
<script>
    let stateCheck = setInterval(() => {
        if (document.readyState === 'complete') {
            clearInterval(stateCheck);
            $(document).on('click', 'button.reset-btn', function(e){
                e.preventDefault();
                let form = $(this).closest("form");
                let inputs = $($(this).data('target'));
                let input_type = $(this).data('type');
                inputs.each(function(key, value){
                    if(input_type == 'checkbox'){
                        $(this).prop('checked', false);
                    }
                    else{
                        $(this).prop('value', '');
                    }
                }).promise().done(function(){
                    // form.submit();
                });
            });

        }
    }, 100);
</script>
<?php /**PATH C:\xampp\htdocs\saadmediajobcato\resources\views/includes/countrybasejobs_list_side_bar.blade.php ENDPATH**/ ?>