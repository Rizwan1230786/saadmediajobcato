<?php echo APFrmErrHelp::showErrorsNotice($errors); ?>

<?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="form-body">        
    <?php echo Form::hidden('id', null); ?>

    <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'title'); ?>">
        <?php echo Form::label('title', 'Job Title', ['class' => 'bold']); ?>

        <?php echo Form::text('title', null, array('class'=>'form-control', 'id'=>'title', 'placeholder'=>'Job title')); ?>

        <?php echo APFrmErrHelp::showErrors($errors, 'title'); ?>

    </div>
    <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'country_id'); ?>" id="country_id_div">
        <?php echo Form::label('country_id', 'Country', ['class' => 'bold']); ?>                    
        <?php echo Form::select('country_id', ['' => 'Select Country']+$countries, old('country_id', (isset($job))? $job->country_id:$siteSetting->default_country_id), array('class'=>'form-control', 'id'=>'country_id')); ?>

        <?php echo APFrmErrHelp::showErrors($errors, 'country_id'); ?>                                       
    </div>
    <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'state_id'); ?>" id="state_id_div">
        <?php echo Form::label('state_id', 'State', ['class' => 'bold']); ?>                    
        <span id="default_state_dd">
            <?php echo Form::select('state_id', ['' => 'Select State'], null, array('class'=>'form-control', 'id'=>'state_id')); ?>

        </span>
        <?php echo APFrmErrHelp::showErrors($errors, 'state_id'); ?>                                       
    </div>
    <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'city_id'); ?>" id="city_id_div">
        <?php echo Form::label('city_id', 'City', ['class' => 'bold']); ?>                    
        <span id="default_city_dd">
            <?php echo Form::select('city_id', ['' => 'Select City'], null, array('class'=>'form-control', 'id'=>'city_id')); ?>

        </span>
        <?php echo APFrmErrHelp::showErrors($errors, 'city_id'); ?>                                       
    </div>
    <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'functional_area_id'); ?>" id="functional_area_id_div">
        <?php echo Form::label('functional_area_id', 'Functional Area', ['class' => 'bold']); ?>                    
        <?php echo Form::select('functional_area_id', ['' => 'Select Functional Area']+$functionalAreas, null, array('class'=>'form-control', 'id'=>'functional_area_id')); ?>

        <?php echo APFrmErrHelp::showErrors($errors, 'functional_area_id'); ?>                                       
    </div>
    <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'news_paper'); ?>">
        <?php echo Form::label('news_paper', 'News Paper Name', ['class' => 'bold']); ?>

        <?php echo Form::text('news_paper', null, array('class'=>'form-control', 'id'=>'news_paper', 'placeholder'=>'News Paper Name')); ?>

        <?php echo APFrmErrHelp::showErrors($errors, 'news_paper'); ?>

    </div>
    <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'description'); ?>">
        <?php echo Form::label('description', 'Job description', ['class' => 'bold']); ?>

        <?php echo Form::textarea('description', null, array('class'=>'form-control', 'id'=>'description', 'placeholder'=>'Job description')); ?>

        <?php echo APFrmErrHelp::showErrors($errors, 'description'); ?>

    </div>
    <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'last_date'); ?>">
        <?php echo Form::label('last_date', 'Last Date To Apply', ['class' => 'bold']); ?>

        <?php echo Form::text('last_date', null, array('class'=>'form-control datepicker', 'id'=>'last_date', 'placeholder'=>'Last date To Apply', 'autocomplete'=>'off')); ?>

        <?php echo APFrmErrHelp::showErrors($errors, 'last_date'); ?>

    </div>
    <div>
        <?php if(isset($job)): ?>
        <div class="form-group">
        <div class="formrow">
            <label><?php echo e(__('Attachment')); ?></label>
            <?php echo e(ImgUploader::print_image("custom_jobs/$job->image", 100, 100)); ?> </div>
        </div>
        <?php endif; ?>
    </div>
    <div class="form-group>
        <div class="formrow">
            <div id="thumbnail"></div>
            <label class="btn btn-success"> <?php echo e(__('Attachment/ Image')); ?>

                <input type="file" name="image" id="image" style="display: none;">
            </label>
            <?php echo APFrmErrHelp::showErrors($errors, 'image'); ?> 
        </div>
    </div>
    <div class="form-actions">
        <?php echo Form::button('Update <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>', array('class'=>'btn btn-large btn-primary', 'type'=>'submit')); ?>

    </div>
</div>
<?php $__env->startPush('css'); ?>
<style type="text/css">
    .datepicker>div {
        display: block;
    }
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('scripts'); ?>
<?php echo $__env->make('admin.shared.tinyMCEFront', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
<script type="text/javascript">
    $(document).ready(function () {
        $(".datepicker").datepicker({
            autoclose: true,
            format: 'yyyy-m-d'
        });
    /*******************************/
        var fileInput = document.getElementById("image");
        fileInput.addEventListener("change", function (e) {
            var files = this.files
            showThumbnail(files)
        }, false);

        $('#country_id').on('change', function (e) {
            e.preventDefault();
            filterDefaultStates(0);
        });
        $(document).on('change', '#state_id', function (e) {
            e.preventDefault();
            filterDefaultCities(0);
        });
        filterDefaultStates(<?php echo old('state_id', (isset($job)) ? $job->state_id : 0); ?>);
    });
    function showThumbnail(files) {
        $('#thumbnail').html('');
        for (var i = 0; i < files.length; i++) {
            var file = files[i]
            var imageType = /image.*/
            if (!file.type.match(imageType)) {
                console.log("Not an Image");
                continue;
            }
            var reader = new FileReader()
            reader.onload = (function (theFile) {
                return function (e) {
                    $('#thumbnail').append('<div class="fileattached"><img height="100px" src="' + e.target.result + '" > <div>' + theFile.name + '</div><div class="clearfix"></div></div>');
                };
            }(file))
            var ret = reader.readAsDataURL(file);
        }
    }

    function filterDefaultStates(state_id)
    {
        var country_id = $('#country_id').val();
        if (country_id != '') {
            $.post("<?php echo e(route('filter.default.states.dropdown')); ?>", {country_id: country_id, state_id: state_id, _method: 'POST', _token: '<?php echo e(csrf_token()); ?>'})
                    .done(function (response) {
                        $('#default_state_dd').html(response);
                        filterDefaultCities(<?php echo old('city_id', (isset($job)) ? $job->city_id : 0); ?>);
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
<?php $__env->stopPush(); ?><?php /**PATH C:\xampp\htdocs\JobCato\resources\views/admin/job/forms/custom.blade.php ENDPATH**/ ?>