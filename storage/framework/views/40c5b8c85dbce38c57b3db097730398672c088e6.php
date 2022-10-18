<script type="text/javascript">
    function changeImmediateAvailableStatus(user_id, old_status) {
        $.post("<?php echo e(route('update.immediate.available.status')); ?>", {user_id: user_id, old_status: old_status, _method: 'POST', _token: '<?php echo e(csrf_token()); ?>'})
                .done(function (response) {
                    if (responce == 'ok') {
                        if (old_status == 0)
                            $('#is_immediate_available').attr('checked', 'checked');
                        else
                            $('#is_immediate_available').removeAttr('checked');
                    }
                });

    }
</script><?php /**PATH C:\xampp\htdocs\JobCato\resources\views/includes/immediate_available_btn.blade.php ENDPATH**/ ?>