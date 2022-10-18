<?php echo APFrmErrHelp::showOnlyErrorsNotice($errors); ?>

<?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="form-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'logo'); ?>">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;"> <img src="<?php echo e(asset('/')); ?>admin_assets/no-image.png" alt="" /> </div>
                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                    <div> <span class="btn default btn-file"> <span class="fileinput-new"> Select Company logo </span> <span class="fileinput-exists"> Change </span> <?php echo Form::file('logo', null, array('id'=>'logo')); ?> </span> <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a> </div>
                </div>
                <?php echo APFrmErrHelp::showErrors($errors, 'logo'); ?> </div>
        </div>
        <?php if(isset($company)): ?>
        <div class="col-md-6">
            <?php echo e(ImgUploader::print_image("company_logos/$company->logo")); ?>        
        </div>    
        <?php endif; ?>  
    </div>
    <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'company_type'); ?>">
        <?php echo Form::label('company_type', 'Company Type?', ['class' => 'bold']); ?>

        <div class="radio-list">
            <?php
            $is_active_1 = 'checked="checked"';
            $is_active_2 = '';
            if(isset($company))
{
            if (old('company_type', ((isset($company)) ? $company->company_type : 1)) == 0) {
                $is_active_1 = '';
                $is_active_2 = 'checked="checked"';
            }
            }
            ?>
            <label class="radio-inline">
                <input id="not_active" name="company_type" type="radio" value="1" <?php echo e($is_active_2); ?>>
                Is Admin </label>
            <label class="radio-inline">
                <input id="active" name="company_type" type="radio" value="0" <?php echo e($is_active_1); ?>>
                Is Employer </label>
        </div>
        <?php echo APFrmErrHelp::showErrors($errors, 'company_type'); ?>

    </div>
    <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'name'); ?>"> <?php echo Form::label('name', 'Company Name', ['class' => 'bold']); ?>

        <?php echo Form::text('name', null, array('class'=>'form-control', 'id'=>'name', 'placeholder'=>'Company Name')); ?>

        <?php echo APFrmErrHelp::showErrors($errors, 'name'); ?> </div>
    <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'email'); ?>"> <?php echo Form::label('email', 'Company Email', ['class' => 'bold']); ?>

        <?php echo Form::text('email', null, array('class'=>'form-control', 'id'=>'email', 'placeholder'=>'Company Email')); ?>

        <?php echo APFrmErrHelp::showErrors($errors, 'email'); ?> </div>
    <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'password'); ?>"> <?php echo Form::label('password', 'Password', ['class' => 'bold']); ?>

        <?php echo Form::password('password', array('class'=>'form-control', 'id'=>'password', 'placeholder'=>'Password')); ?>

        <?php echo APFrmErrHelp::showErrors($errors, 'password'); ?> </div>
    <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'ceo'); ?>"> <?php echo Form::label('ceo', 'Company CEO', ['class' => 'bold']); ?>

        <?php echo Form::text('ceo', null, array('class'=>'form-control', 'id'=>'ceo', 'placeholder'=>'Company CEO')); ?>

        <?php echo APFrmErrHelp::showErrors($errors, 'ceo'); ?> </div>
    <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'industry_id'); ?>"> <?php echo Form::label('industry_id', 'Industry', ['class' => 'bold']); ?>                    
        <?php echo Form::select('industry_id', ['' => 'Select Industry']+$industries, null, array('class'=>'form-control', 'id'=>'industry_id')); ?>

        <?php echo APFrmErrHelp::showErrors($errors, 'industry_id'); ?> </div>
    <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'ownership_type'); ?>"> <?php echo Form::label('ownership_type', 'Ownership Type', ['class' => 'bold']); ?>

        <?php echo Form::select('ownership_type_id', ['' => 'Select Ownership type']+$ownershipTypes, null, array('class'=>'form-control', 'id'=>'ownership_type_id')); ?>

        <?php echo APFrmErrHelp::showErrors($errors, 'ownership_type_id'); ?> </div>
    <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'description'); ?>"> <?php echo Form::label('description', 'Company details', ['class' => 'bold']); ?>

        <?php echo Form::textarea('description', null, array('class'=>'form-control', 'id'=>'description', 'placeholder'=>'Company details')); ?>

        <?php echo APFrmErrHelp::showErrors($errors, 'description'); ?> </div>
    <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'location'); ?>"> <?php echo Form::label('location', 'Location', ['class' => 'bold']); ?>

        <?php echo Form::text('location', null, array('class'=>'form-control', 'id'=>'location', 'placeholder'=>'Location')); ?>

        <?php echo APFrmErrHelp::showErrors($errors, 'location'); ?> </div>     
    <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'map'); ?>"> <?php echo Form::label('map', 'Google Map', ['class' => 'bold']); ?>

        <?php echo Form::textarea('map', null, array('class'=>'form-control', 'id'=>'map', 'placeholder'=>'Google Map')); ?>

        <?php echo APFrmErrHelp::showErrors($errors, 'map'); ?> </div>
    <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'no_of_offices'); ?>"> <?php echo Form::label('no_of_offices', 'Number of offices', ['class' => 'bold']); ?>

        <?php echo Form::select('no_of_offices', ['' => 'Select num. of offices']+MiscHelper::getNumOffices(), null, array('class'=>'form-control', 'id'=>'no_of_offices')); ?>

        <?php echo APFrmErrHelp::showErrors($errors, 'no_of_offices'); ?> </div>
    <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'website'); ?>"> <?php echo Form::label('website', 'Website', ['class' => 'bold']); ?>

        <?php echo Form::text('website', null, array('class'=>'form-control', 'id'=>'website', 'placeholder'=>'Website')); ?>

        <?php echo APFrmErrHelp::showErrors($errors, 'website'); ?> </div>
    <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'no_of_employees'); ?>"> <?php echo Form::label('no_of_employees', 'Number of employees', ['class' => 'bold']); ?>

        <?php echo Form::select('no_of_employees', ['' => 'Select num. of employees']+MiscHelper::getNumEmployees(), null, array('class'=>'form-control', 'id'=>'no_of_employees')); ?>

        <?php echo APFrmErrHelp::showErrors($errors, 'no_of_employees'); ?> </div>
    <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'established_in'); ?>"> <?php echo Form::label('established_in', 'Established in', ['class' => 'bold']); ?>

        <?php echo Form::select('established_in', ['' => 'Select Established In']+MiscHelper::getEstablishedIn(), null, array('class'=>'form-control', 'id'=>'established_in')); ?>

        <?php echo APFrmErrHelp::showErrors($errors, 'established_in'); ?> </div>
    <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'fax'); ?>"> <?php echo Form::label('fax', 'Fax #', ['class' => 'bold']); ?>

        <?php echo Form::text('fax', null, array('class'=>'form-control', 'id'=>'fax', 'placeholder'=>'Fax #')); ?>

        <?php echo APFrmErrHelp::showErrors($errors, 'fax'); ?> </div>
    <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'phone'); ?>"> <?php echo Form::label('phone', 'Phone #', ['class' => 'bold']); ?>

        <?php echo Form::text('phone', null, array('class'=>'form-control', 'id'=>'phone', 'placeholder'=>'Phone #')); ?>

        <?php echo APFrmErrHelp::showErrors($errors, 'phone'); ?> </div>




    <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'facebook'); ?>"> <?php echo Form::label('facebook', 'Facebook Address', ['class' => 'bold']); ?>

        <?php echo Form::text('facebook', null, array('class'=>'form-control', 'id'=>'facebook', 'placeholder'=>'Facebook address')); ?>

        <?php echo APFrmErrHelp::showErrors($errors, 'facebook'); ?> </div>
    <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'twitter'); ?>"> <?php echo Form::label('twitter', 'Twitter', ['class' => 'bold']); ?>

        <?php echo Form::text('twitter', null, array('class'=>'form-control', 'id'=>'twitter', 'placeholder'=>'Twitter')); ?>

        <?php echo APFrmErrHelp::showErrors($errors, 'twitter'); ?> </div>

    <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'linkedin'); ?>"> <?php echo Form::label('linkedin', 'Linkedin', ['class' => 'bold']); ?>

        <?php echo Form::text('linkedin', null, array('class'=>'form-control', 'id'=>'linkedin', 'placeholder'=>'Linkedin')); ?>

        <?php echo APFrmErrHelp::showErrors($errors, 'linkedin'); ?> </div>
    <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'google_plus'); ?>"> <?php echo Form::label('google_plus', 'Google+', ['class' => 'bold']); ?>

        <?php echo Form::text('google_plus', null, array('class'=>'form-control', 'id'=>'google_plus', 'placeholder'=>'Google+')); ?>

        <?php echo APFrmErrHelp::showErrors($errors, 'google_plus'); ?> </div>
    <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'pinterest'); ?>"> <?php echo Form::label('pinterest', 'Pinterest', ['class' => 'bold']); ?>

        <?php echo Form::text('pinterest', null, array('class'=>'form-control', 'id'=>'pinterest', 'placeholder'=>'Pinterest')); ?>

        <?php echo APFrmErrHelp::showErrors($errors, 'pinterest'); ?> </div>
    <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'country_id'); ?>"> <?php echo Form::label('country_id', 'Country', ['class' => 'bold']); ?>                    
        <?php echo Form::select('country_id', ['' => 'Select Country']+$countries, old('country_id', (isset($company))? $company->country_id:$siteSetting->default_country_id), array('class'=>'form-control', 'id'=>'country_id')); ?>

        <?php echo APFrmErrHelp::showErrors($errors, 'country_id'); ?> </div>
    <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'state_id'); ?>"> <?php echo Form::label('state_id', 'State', ['class' => 'bold']); ?>

        <span id="default_state_dd">                    
            <?php echo Form::select('state_id', ['' => 'Select State'], null, array('class'=>'form-control', 'id'=>'state_id')); ?>

        </span>
        <?php echo APFrmErrHelp::showErrors($errors, 'state_id'); ?> </div>
    <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'city_id'); ?>"> <?php echo Form::label('city_id', 'City', ['class' => 'bold']); ?>  
        <span id="default_city_dd">                  
            <?php echo Form::select('city_id', ['' => 'Select City'], null, array('class'=>'form-control', 'id'=>'city_id')); ?>

        </span>
        <?php echo APFrmErrHelp::showErrors($errors, 'city_id'); ?> </div>


    <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'company_package_id'); ?>"> <?php echo Form::label('company_package_id', 'Package', ['class' => 'bold']); ?>  
        <?php echo Form::select('company_package_id', ['' => 'Select Package']+$packages, null, array('class'=>'form-control', 'id'=>'company_package_id')); ?>

        <?php echo APFrmErrHelp::showErrors($errors, 'company_package_id'); ?> </div>

    <?php if(isset($company) && $company->package_id > 0): ?>
    <div class="form-group">
        <?php echo Form::label('package', 'Package : ', ['class' => 'bold']); ?>         
        <strong><?php echo e($company->getPackage('package_title')); ?></strong>
    </div>
    <div class="form-group">
        <?php echo Form::label('package_Duration', 'Package Duration : ', ['class' => 'bold']); ?>

        <strong><?php echo e($company->package_start_date->format('d M, Y')); ?></strong> - <strong><?php echo e($company->package_end_date->format('d M, Y')); ?></strong>
    </div>
    <div class="form-group">
        <?php echo Form::label('package_quota', 'Availed quota : ', ['class' => 'bold']); ?>

        <strong><?php echo e($company->availed_jobs_quota); ?></strong> / <strong><?php echo e($company->jobs_quota); ?></strong>
    </div>
    <hr/>
    <?php endif; ?>

    <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'is_active'); ?>">
        <?php echo Form::label('is_active', 'Is Active?', ['class' => 'bold']); ?>

        <div class="radio-list">
            <?php
            $is_active_1 = 'checked="checked"';
            $is_active_2 = '';
            if (old('is_active', ((isset($company)) ? $company->is_active : 1)) == 0) {
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
    <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'is_featured'); ?>">
        <?php echo Form::label('is_featured', 'Is Featured?', ['class' => 'bold']); ?>

        <div class="radio-list">
            <?php
            $is_featured_1 = '';
            $is_featured_2 = 'checked="checked"';
            if (old('is_featured', ((isset($company)) ? $company->is_featured : 0)) == 1) {
                $is_featured_1 = 'checked="checked"';
                $is_featured_2 = '';
            }
            ?>
            <label class="radio-inline">
                <input id="featured" name="is_featured" type="radio" value="1" <?php echo e($is_featured_1); ?>>
                Featured </label>
            <label class="radio-inline">
                <input id="not_featured" name="is_featured" type="radio" value="0" <?php echo e($is_featured_2); ?>>
                Not Featured </label>
        </div>
        <?php echo APFrmErrHelp::showErrors($errors, 'is_featured'); ?> </div>

        <!-- Verification -->
        <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'is_verified'); ?>">
            <div class="row">
                <div class="col-md-5 col-sm-5">
                <?php echo Form::label('is_verified', 'Is Verified?', ['class' => 'bold']); ?>

                    <div class="radio-list">
                        <label class="radio-inline">
                            <input id="verified" name="is_verification_cleared" type="radio" value="1"
                            <?php if(isset($company)): ?>
                                <?php echo e($company->is_verification_cleared ? 'checked' : ''); ?>

                                <?php endif; ?>
                                >
                            Verified </label>
                        <label class="radio-inline">
                            <input id="not_verified" name="is_verification_cleared" type="radio" value="0"                             <?php if(isset($company)): ?>

                                <?php echo e($company->is_verification_cleared ? '' : 'checked'); ?>

                                    <?php endif; ?>

                            >
                            Not Verified </label>
                    </div>
                </div>
                <div class="col-md-7 col-sm-7">
                <?php if( !empty($verifications) ): ?>
                <?php echo Form::label('verification_files', 'Verification Files?', ['class' => 'bold']); ?>

                    <div class="row">
                    <?php $__currentLoopData = $verifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $verification_file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-12 my-2">
                            <a href="#" old-href="<?php echo e(asset($verification_file->download)); ?>" download>
                                <?php echo e($verification_file->file_name); ?>

                            </a>
                        </div>  
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>
                </div>
                <div class="col-md-12">
                <?php echo APFrmErrHelp::showErrors($errors, 'is_verified'); ?>

                </div>
            </div>
        
        </div>
        <!-- Verification -->

    <div class="form-actions"> <?php echo Form::button('Update <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>', array('class'=>'btn btn-large btn-primary', 'type'=>'submit')); ?> </div>
</div>
<?php $__env->startPush('scripts'); ?>
<?php echo $__env->make('admin.shared.tinyMCEFront', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
<script type="text/javascript">
    $(document).ready(function () {
        $('#country_id').on('change', function (e) {
            e.preventDefault();
            filterDefaultStates(0);
        });
        $(document).on('change', '#state_id', function (e) {
            e.preventDefault();
            filterDefaultCities(0);
        });
        filterDefaultStates(<?php echo old('state_id', (isset($company)) ? $company->state_id : 0); ?>);
    });
    function filterDefaultStates(state_id)
    {
        var country_id = $('#country_id').val();
        if (country_id != '') {
            $.post("<?php echo e(route('filter.default.states.dropdown')); ?>", {country_id: country_id, state_id: state_id, _method: 'POST', _token: '<?php echo e(csrf_token()); ?>'})
                    .done(function (response) {
                        $('#default_state_dd').html(response);
                        filterDefaultCities(<?php echo old('city_id', (isset($company)) ? $company->city_id : 0); ?>);
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
</script>
<?php $__env->stopPush(); ?>