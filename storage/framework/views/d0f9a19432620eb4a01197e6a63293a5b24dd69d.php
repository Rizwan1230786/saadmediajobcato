<?php echo APFrmErrHelp::showErrorsNotice($errors); ?>

<?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php if(isset($user)): ?>
<?php echo Form::model($user, array('method' => 'put', 'route' => array('update.user', $user->id), 'class' => 'form', 'files'=>true)); ?>

<?php echo Form::hidden('id', $user->id); ?>

<?php else: ?>
<?php echo Form::open(array('method' => 'post', 'route' => 'store.user', 'class' => 'form', 'files'=>true)); ?>

<?php endif; ?>
<div class="form-body">    
    <input type="hidden" name="front_or_admin" value="admin" />
    <div class="row">
        <div class="col-md-6">
            <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'image'); ?>">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;"> <img src="<?php echo e(asset('/')); ?>admin_assets/no-image.png" alt="" /> </div>
                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                    <div> <span class="btn default btn-file"> <span class="fileinput-new"> Select Profile Image </span> <span class="fileinput-exists"> Change </span> <?php echo Form::file('image', null, array('id'=>'image')); ?> </span> <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a> </div>
                </div>
                <?php echo APFrmErrHelp::showErrors($errors, 'image'); ?> </div>
        </div>
        <?php if(isset($user)): ?>
        <div class="col-md-6">
            <?php echo e(ImgUploader::print_image("user_images/$user->image")); ?>        
        </div>    
        <?php endif; ?>  
    </div>
    <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'first_name'); ?>">
        <?php echo Form::label('first_name', 'First Name', ['class' => 'bold']); ?>                    
        <?php echo Form::text('first_name', null, array('class'=>'form-control', 'id'=>'first_name', 'placeholder'=>'First Name')); ?>

        <?php echo APFrmErrHelp::showErrors($errors, 'first_name'); ?>                                       
    </div>
    <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'middle_name'); ?>">
        <?php echo Form::label('middle_name', 'Middle Name', ['class' => 'bold']); ?>                    
        <?php echo Form::text('middle_name', null, array('class'=>'form-control', 'id'=>'middle_name', 'placeholder'=>'Middle Name')); ?>

        <?php echo APFrmErrHelp::showErrors($errors, 'middle_name'); ?>                                       
    </div>
    <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'last_name'); ?>">
        <?php echo Form::label('last_name', 'Last Name', ['class' => 'bold']); ?>                    
        <?php echo Form::text('last_name', null, array('class'=>'form-control', 'id'=>'last_name', 'placeholder'=>'Last Name')); ?>

        <?php echo APFrmErrHelp::showErrors($errors, 'last_name'); ?>                                       
    </div>
    <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'email'); ?>">
        <?php echo Form::label('email', 'Email', ['class' => 'bold']); ?>                    
        <?php echo Form::text('email', null, array('class'=>'form-control', 'id'=>'email', 'placeholder'=>'Email')); ?>

        <?php echo APFrmErrHelp::showErrors($errors, 'email'); ?>                                       
    </div>
    <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'password'); ?>">
        <?php echo Form::label('password', 'Password', ['class' => 'bold']); ?>                    
        <?php echo Form::password('password', array('class'=>'form-control', 'id'=>'password', 'placeholder'=>'Password')); ?>

        <?php echo APFrmErrHelp::showErrors($errors, 'password'); ?>                                       
    </div>
    <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'father_name'); ?>">
        <?php echo Form::label('father_name', 'Father Name', ['class' => 'bold']); ?>                    
        <?php echo Form::text('father_name', null, array('class'=>'form-control', 'id'=>'father_name', 'placeholder'=>'Father Name')); ?>

        <?php echo APFrmErrHelp::showErrors($errors, 'father_name'); ?>                                       
    </div>
    <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'date_of_birth'); ?>">
        <?php echo Form::label('date_of_birth', 'Date of Birth', ['class' => 'bold']); ?>                    
        <?php echo Form::text('date_of_birth', null, array('class'=>'form-control datepicker', 'id'=>'date_of_birth', 'placeholder'=>'Date of Birth', 'autocomplete'=>'off')); ?>

        <?php echo APFrmErrHelp::showErrors($errors, 'date_of_birth'); ?>                                       
    </div>
    <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'gender_id'); ?>">
        <?php echo Form::label('gender_id', 'Gender', ['class' => 'bold']); ?>                    
        <?php echo Form::select('gender_id', [''=>'Select Gender']+$genders, null, array('class'=>'form-control', 'id'=>'gender_id')); ?>

        <?php echo APFrmErrHelp::showErrors($errors, 'gender_id'); ?>                                       
    </div>
    <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'marital_status_id'); ?>">
        <?php echo Form::label('marital_status_id', 'Marital Status', ['class' => 'bold']); ?>                    
        <?php echo Form::select('marital_status_id', [''=>'Select Marital Status']+$maritalStatuses, null, array('class'=>'form-control', 'id'=>'marital_status_id')); ?>

        <?php echo APFrmErrHelp::showErrors($errors, 'marital_status_id'); ?>                                       
    </div>
    <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'nationality_id'); ?>">
        <?php echo Form::label('nationality_id', 'Nationality', ['class' => 'bold']); ?>                    
        <?php echo Form::select('nationality_id', [''=>'Select Nationality']+$nationalities, null, array('class'=>'form-control', 'id'=>'nationality_id')); ?>

        <?php echo APFrmErrHelp::showErrors($errors, 'nationality_id'); ?>                                       
    </div>
    <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'national_id_card_number'); ?>">
        <?php echo Form::label('national_id_card_number', 'National ID Card#', ['class' => 'bold']); ?>                    
        <?php echo Form::text('national_id_card_number', null, array('class'=>'form-control', 'id'=>'national_id_card_number', 'placeholder'=>'National ID Card#')); ?>

        <?php echo APFrmErrHelp::showErrors($errors, 'national_id_card_number'); ?>                                       
    </div>
    <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'country_id'); ?>">
        <?php echo Form::label('country_id', 'Country', ['class' => 'bold']); ?>                    
        <?php echo Form::select('country_id', [''=>'Select Country']+$countries, old('country_id', (isset($user))? $user->country_id:$siteSetting->default_country_id), array('class'=>'form-control', 'id'=>'country_id')); ?>

        <?php echo APFrmErrHelp::showErrors($errors, 'country_id'); ?>                                       
    </div>
    <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'state_id'); ?>">
        <?php echo Form::label('state_id', 'State', ['class' => 'bold']); ?>                    
        <span id="default_state_dd">
            <?php echo Form::select('state_id', [''=>'Select State'], null, array('class'=>'form-control', 'id'=>'state_id')); ?>

        </span>
        <?php echo APFrmErrHelp::showErrors($errors, 'state_id'); ?>                                       
    </div>
    <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'city_id'); ?>">
        <?php echo Form::label('city_id', 'City', ['class' => 'bold']); ?>                    
        <span id="default_city_dd">
            <?php echo Form::select('city_id', [''=>'Select City'], null, array('class'=>'form-control', 'id'=>'city_id')); ?>

        </span>
        <?php echo APFrmErrHelp::showErrors($errors, 'city_id'); ?>                                       
    </div>
    <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'phone'); ?>">
        <?php echo Form::label('phone', 'Phone', ['class' => 'bold']); ?>                    
        <?php echo Form::text('phone', null, array('class'=>'form-control', 'id'=>'phone', 'placeholder'=>'Phone')); ?>

        <?php echo APFrmErrHelp::showErrors($errors, 'phone'); ?>                                       
    </div>
    <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'mobile_num'); ?>">
        <?php echo Form::label('mobile_num', 'Mobile Number', ['class' => 'bold']); ?>                    
        <?php echo Form::text('mobile_num', null, array('class'=>'form-control', 'id'=>'mobile_num', 'placeholder'=>'Mobile Number')); ?>

        <?php echo APFrmErrHelp::showErrors($errors, 'mobile_num'); ?>                                       
    </div>
    <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'job_experience_id'); ?>">
        <?php echo Form::label('job_experience_id', 'Experience', ['class' => 'bold']); ?>                    
        <?php echo Form::select('job_experience_id', [''=>'Select Experience']+$jobExperiences, null, array('class'=>'form-control', 'id'=>'job_experience_id')); ?>

        <?php echo APFrmErrHelp::showErrors($errors, 'job_experience_id'); ?>                                       
    </div>
    <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'career_level_id'); ?>">
        <?php echo Form::label('career_level_id', 'Career Level', ['class' => 'bold']); ?>                    
        <?php echo Form::select('career_level_id', [''=>'Select Career Level']+$careerLevels, null, array('class'=>'form-control', 'id'=>'career_level_id')); ?>

        <?php echo APFrmErrHelp::showErrors($errors, 'career_level_id'); ?>                                       
    </div>
    <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'industry_id'); ?>">
        <?php echo Form::label('industry_id', 'Industry', ['class' => 'bold']); ?>                    
        <?php echo Form::select('industry_id', [''=>'Select Industry']+$industries, null, array('class'=>'form-control', 'id'=>'industry_id')); ?>

        <?php echo APFrmErrHelp::showErrors($errors, 'industry_id'); ?>                                       
    </div>
    <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'functional_area_id'); ?>">
        <?php echo Form::label('functional_area_id', 'Functional Area', ['class' => 'bold']); ?>                    
        <?php echo Form::select('functional_area_id', [''=>'Select Functional Area']+$functionalAreas, null, array('class'=>'form-control', 'id'=>'functional_area_id')); ?>

        <?php echo APFrmErrHelp::showErrors($errors, 'functional_area_id'); ?>                                       
    </div>
    <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'current_salary'); ?>">
        <?php echo Form::label('current_salary', 'Current Salary', ['class' => 'bold']); ?>                    
        <?php echo Form::text('current_salary', null, array('class'=>'form-control', 'id'=>'current_salary', 'placeholder'=>'Current Salary')); ?>

        <?php echo APFrmErrHelp::showErrors($errors, 'current_salary'); ?>                                       
    </div>
    <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'expected_salary'); ?>">
        <?php echo Form::label('expected_salary', 'Expected Salary', ['class' => 'bold']); ?>                    
        <?php echo Form::text('expected_salary', null, array('class'=>'form-control', 'id'=>'expected_salary', 'placeholder'=>'Expected Salary')); ?>

        <?php echo APFrmErrHelp::showErrors($errors, 'expected_salary'); ?>                                       
    </div>
    <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'salary_currency'); ?>">
        <?php echo Form::label('salary_currency', 'Salary Currency', ['class' => 'bold']); ?>                    
        <?php echo Form::text('salary_currency', null, array('class'=>'form-control', 'id'=>'salary_currency', 'placeholder'=>'Salary Currency', 'autocomplete'=>'off')); ?>

        <?php echo APFrmErrHelp::showErrors($errors, 'salary_currency'); ?>                                       
    </div>
    <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'street_address'); ?>">
        <?php echo Form::label('street_address', 'Street Address', ['class' => 'bold']); ?>                    
        <?php echo Form::textarea('street_address', null, array('class'=>'form-control', 'id'=>'street_address', 'placeholder'=>'Street Address')); ?>

        <?php echo APFrmErrHelp::showErrors($errors, 'street_address'); ?>                                       
    </div>

    <?php if((bool)config('jobseeker.is_jobseeker_package_active')): ?>
    <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'job_seeker_package_id'); ?>"> <?php echo Form::label('job_seeker_package_id', 'Package', ['class' => 'bold']); ?>  
        <?php echo Form::select('job_seeker_package_id', ['' => 'Select Package']+$packages, null, array('class'=>'form-control', 'id'=>'job_seeker_package_id')); ?>

        <?php echo APFrmErrHelp::showErrors($errors, 'job_seeker_package_id'); ?> </div>

    <?php if(isset($user) && $user->package_id > 0): ?>
    <div class="form-group">
        <?php echo Form::label('package', 'Package : ', ['class' => 'bold']); ?>         
        <strong><?php echo e($user->getPackage('package_title')); ?></strong>
    </div>
    <div class="form-group">
        <?php echo Form::label('package_Duration', 'Package Duration : ', ['class' => 'bold']); ?>

        <strong><?php echo e($user->package_start_date->format('d M, Y')); ?></strong> - <strong><?php echo e($user->package_end_date->format('d M, Y')); ?></strong>
    </div>
    <div class="form-group">
        <?php echo Form::label('package_quota', 'Availed quota : ', ['class' => 'bold']); ?>

        <strong><?php echo e($user->availed_jobs_quota); ?></strong> / <strong><?php echo e($user->jobs_quota); ?></strong>
    </div>
    <hr/>
    <?php endif; ?>
    <?php endif; ?>


    <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'is_immediate_available'); ?>">
        <?php echo Form::label('is_immediate_available', 'Is Immediate available?', ['class' => 'bold']); ?>

        <div class="radio-list">
            <?php
            $is_immediate_available_1 = 'checked="checked"';
            $is_immediate_available_2 = '';
            if (old('is_immediate_available', ((isset($user)) ? $user->is_immediate_available : 1)) == 0) {
                $is_immediate_available_1 = '';
                $is_immediate_available_2 = 'checked="checked"';
            }
            ?>
            <label class="radio-inline">
                <input id="immediate_available" name="is_immediate_available" type="radio" value="1" <?php echo e($is_immediate_available_1); ?>>
                Immediate Available </label>
            <label class="radio-inline">
                <input id="not_immediate_available" name="is_immediate_available" type="radio" value="0" <?php echo e($is_immediate_available_2); ?>>
                Not Immediate available </label>
        </div>
        <?php echo APFrmErrHelp::showErrors($errors, 'is_immediate_available'); ?>

    </div>


    <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'is_active'); ?>">
        <?php echo Form::label('is_active', 'Active', ['class' => 'bold']); ?>

        <div class="radio-list">
            <?php
            $is_active_1 = 'checked="checked"';
            $is_active_2 = '';
            if (old('is_active', ((isset($user)) ? $user->is_active : 1)) == 0) {
                $is_active_1 = '';
                $is_active_2 = 'checked="checked"';
            }
            ?>
            <label class="radio-inline">
                <input id="active" name="is_active" type="radio" value="1" <?php echo e($is_active_1); ?>>
                Active </label>
            <label class="radio-inline">
                <input id="not_active" name="is_active" type="radio" value="0" <?php echo e($is_active_2); ?>>
                In-Active </label>
        </div>
        <?php echo APFrmErrHelp::showErrors($errors, 'is_active'); ?>

    </div>
    <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'verified'); ?>">
        <?php echo Form::label('verified', 'Verified', ['class' => 'bold']); ?>

        <div class="radio-list">
            <?php
            $verified_1 = 'checked="checked"';
            $verified_2 = '';
            if (old('verified', ((isset($user)) ? $user->verified : 1)) == 0) {
                $verified_1 = '';
                $verified_2 = 'checked="checked"';
            }
            ?>
            <label class="radio-inline">
                <input id="verified" name="verified" type="radio" value="1" <?php echo e($verified_1); ?>>
                Verified </label>
            <label class="radio-inline">
                <input id="not_verified" name="verified" type="radio" value="0" <?php echo e($verified_2); ?>>
                Not Verified </label>
        </div>
        <?php echo APFrmErrHelp::showErrors($errors, 'verified'); ?>

    </div> 
    <?php echo Form::button('Update Personal Information <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>', array('class'=>'btn btn-large btn-primary', 'type'=>'submit')); ?>   
</div>
<?php echo Form::close(); ?>

<?php $__env->startPush('css'); ?>
<style type="text/css">
    .datepicker>div {
        display: block;
    }
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('scripts'); ?>
<script type="text/javascript">
    $(document).ready(function () {
        initdatepicker();
        $('#salary_currency').typeahead({
            source: function (query, process) {
                return $.get("<?php echo e(route('typeahead.currency_codes')); ?>", {query: query}, function (data) {
                    console.log(data);
                    data = $.parseJSON(data);
                    return process(data);
                });
            }
        });

        $('#country_id').on('change', function (e) {
            e.preventDefault();
            filterDefaultStates(0);
        });
        $(document).on('change', '#state_id', function (e) {
            e.preventDefault();
            filterDefaultCities(0);
        });
        filterDefaultStates(<?php echo old('state_id', (isset($user)) ? $user->state_id : 0); ?>);
    });
    function filterDefaultStates(state_id)
    {
        var country_id = $('#country_id').val();
        if (country_id != '') {
            $.post("<?php echo e(route('filter.default.states.dropdown')); ?>", {country_id: country_id, state_id: state_id, _method: 'POST', _token: '<?php echo e(csrf_token()); ?>'})
                    .done(function (response) {
                        $('#default_state_dd').html(response);
                        filterDefaultCities(<?php echo old('city_id', (isset($user)) ? $user->city_id : 0); ?>);
                    });
        }
    }
    function filterDefaultCities(city_id)
    {
        var state_id = $('#state_id').val();
        if (state_id != '') {
            $.post("<?php echo e(route('filter.default.cities.dropdown')); ?>", {state_id: state_id, city_id: city_id, _method: 'POST', _token: '<?php echo e(csrf_token()); ?>'})
                    .done(function (response) {
                        $('#default_city_dd').html(response);
                    });
        }
    }
    function initdatepicker() {
        $(".datepicker").datepicker({
            autoclose: true,
            format: 'yyyy-m-d'
        });
    }
</script>
<?php $__env->stopPush(); ?>