
<?php $__env->startSection('content'); ?>
<table border="0" cellpadding="0" cellspacing="0" class="force-row" style="width: 100%;    border-bottom: solid 1px #ccc;">
    <tr>
        <td class="content-wrapper" style="padding-left:24px;padding-right:24px"><br>
            <div class="title" style="font-family: Helvetica, Arial, sans-serif; font-size: 18px;font-weight:400;color: #000;text-align: left;
                 padding-top: 20px;">Dear Admin ,</div></td>
    </tr>
    <tr>
        <td class="cols-wrapper" style="padding-left:12px;padding-right:12px"><!--[if mso]>
         <table border="0" width="576" cellpadding="0" cellspacing="0" style="width: 576px;">
            <tr>
               <td width="192" style="width: 192px;" valign="top">
                  <![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" align="left" class="force-row" style="width: 100%;">
                <tr>
                    <td class="row" valign="top" style="padding-left:12px;padding-right:12px;padding-top:18px;padding-bottom:12px"><table border="0" cellpadding="0" cellspacing="0" style="width:100%;">
                            <tr>
                                <td class="subtitle" style="font-family:Helvetica, Arial, sans-serif;font-size:14px;line-height:22px;font-weight:400;color:#333;padding-bottom:30px; text-align: left;">
                                    <p>Job Seeker with name "<?php echo e($name); ?>" has been registered on "<?php echo e($siteSetting->site_name); ?>"</p>
                                    <p>
                                        <br>
                                        Front link :
                                        <span style="color: #fff;text-decoration: none;background: #f25a55; padding: 7px 10px;text-align: center;display: inline-block;margin-top: 20px;"><a href="<?php echo e($link); ?>"><?php echo e($link); ?></a></span>
                                        <br>

                                        <br>
                                        Admin link :
                                        <span style="color: #fff;text-decoration: none;background: #f25a55; padding: 7px 10px;text-align: center;display: inline-block;margin-top: 20px;"><a href="<?php echo e($link_admin); ?>"><?php echo e($link_admin); ?></a></span>
                                        <br>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-family: Helvetica, Arial, sans-serif;font-size: 14px;line-height: 22px;font-weight: 400;color: #333; padding-bottom: 30px;text-align: left;">Thanks,<br>The <?php echo e($siteSetting->site_name); ?> Team</td>
                            </tr>
                        </table>
                        <br></td>
                </tr>
            </table>
            <!--[if mso]>
               </td>
            </tr>
         </table>
         <![endif]--></td>
    </tr>
</table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.email_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>