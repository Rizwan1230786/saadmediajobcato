<?php
$lang = config('default_lang');
if (isset($industry))
    $lang = $industry->lang;
$lang = MiscHelper::getLang($lang);
$direction = MiscHelper::getLangDirection($lang);
$queryString = MiscHelper::getLangQueryStr();
?>
<?php echo APFrmErrHelp::showErrorsNotice($errors); ?>

<?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="form-body">
    <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'lang'); ?>">
        <?php echo Form::label('lang', 'Language', ['class' => 'bold']); ?>                    
        <?php echo Form::select('lang', ['' => 'Select Language']+$languages, $lang, array('class'=>'form-control', 'id'=>'lang', 'onchange'=>'setLang(this.value)')); ?>

        <?php echo APFrmErrHelp::showErrors($errors, 'lang'); ?>                                       
    </div>
    <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'industry'); ?>">
        <?php echo Form::label('industry', 'Industry', ['class' => 'bold']); ?>                    
        <?php echo Form::text('industry', null, array('class'=>'form-control', 'id'=>'industry', 'placeholder'=>'Industry', 'dir'=>$direction)); ?>

        <?php echo APFrmErrHelp::showErrors($errors, 'industry'); ?>                                       
    </div>
    <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'is_default'); ?>">
        <?php echo Form::label('is_default', 'Is Default?', ['class' => 'bold']); ?>

        <div class="radio-list">
            <?php
            $is_default_1 = 'checked="checked"';
            $is_default_2 = '';
            if (old('is_default', ((isset($industry)) ? $industry->is_default : 1)) == 0) {
                $is_default_1 = '';
                $is_default_2 = 'checked="checked"';
            }
            ?>
            <label class="radio-inline">
                <input id="default" name="is_default" type="radio" value="1" <?php echo e($is_default_1); ?> onchange="showHideIndustryId();">
                Yes </label>
            <label class="radio-inline">
                <input id="not_default" name="is_default" type="radio" value="0" <?php echo e($is_default_2); ?> onchange="showHideIndustryId();">
                No </label>
        </div>
        <?php echo APFrmErrHelp::showErrors($errors, 'is_default'); ?>

    </div>
    <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'industry_id'); ?>" id="industry_id_div">
        <?php echo Form::label('industry_id', 'Default Industry', ['class' => 'bold']); ?>                    
        <?php echo Form::select('industry_id', ['' => 'Select Default Industry']+$industries, null, array('class'=>'form-control', 'id'=>'industry_id')); ?>

        <?php echo APFrmErrHelp::showErrors($errors, 'industry_id'); ?>                                       
    </div>
    <div class="form-group <?php echo APFrmErrHelp::hasError($errors, 'is_active'); ?>">
        <?php echo Form::label('is_active', 'Active', ['class' => 'bold']); ?>

        <div class="radio-list"><?php
            $is_active_1 = 'checked="checked"';
            $is_active_2 = '';
            if (old('is_active', ((isset($industry)) ? $industry->is_active : 1)) == 0) {
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
    <div class="form-actions">
        <?php echo Form::button('Update <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>', array('class'=>'btn btn-large btn-primary', 'type'=>'submit')); ?>

    </div>
</div>
<?php $__env->startPush('scripts'); ?>
<script type="text/javascript">
    function setLang(lang) {
        window.location.href = "<?php echo url(Request::url()) . $queryString; ?>" + lang;
    }
    function showHideIndustryId() {
        $('#industry_id_div').hide();
        var is_default = $("input[name='is_default']:checked").val();
        if (is_default == 0) {
            $('#industry_id_div').show();
        }
    }
    showHideIndustryId();
</script>
<?php $__env->stopPush(); ?>