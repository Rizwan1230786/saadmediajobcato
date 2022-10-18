<!--Footer-->
<div class="largebanner shadow3">
    <div class="adin">
        <?php echo $siteSetting->above_footer_ad; ?>

    </div>
    <div class="clearfix"></div>
</div>


<div class="footerWrap">
    <div class="container">
        <div class="row">

            <!--Quick Links-->
            <div class="col-md-3 col-sm-6">
                <h5><?php echo e(__('Quick Links')); ?></h5>
                <!--Quick Links menu Start-->
                <ul class="quicklinks">
                    <li><a href="<?php echo e(route('index')); ?>"><?php echo e(__('Home')); ?></a></li>
                    <li><a href="<?php echo e(route('contact.us')); ?>"><?php echo e(__('Contact Us')); ?></a></li>
                    <li class="postad"><a href="<?php echo e(route('post.job')); ?>"><?php echo e(__('Post a Job')); ?></a></li>
                    <li><a href="<?php echo e(route('faq')); ?>"><?php echo e(__('FAQs')); ?></a></li>
                    <li><a href="<?php echo e(route('custom.jobs')); ?>"><?php echo e(__('Custom Jobs')); ?></a></li>
                    <?php $__currentLoopData = $show_in_footer_menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $footer_menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $cmsContent = App\CmsContent::getContentBySlug($footer_menu->page_slug);
                        ?>

                        <li class="<?php echo e(Request::url() == route('cms', $footer_menu->page_slug) ? 'active' : ''); ?>"><a
                                href="<?php echo e(route('cms', $footer_menu->page_slug)); ?>"><?php echo e($cmsContent->page_title); ?></a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <!--Quick Links menu end-->

            <div class="col-md-3 col-sm-6">
                <h5><?php echo e(__('Jobs By Functional Area')); ?></h5>
                <!--Quick Links menu Start-->
                <ul class="quicklinks">
                    <?php
                        $functionalAreas = App\FunctionalArea::getUsingFunctionalAreas(10);
                    ?>
                    <?php $__currentLoopData = $functionalAreas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $functionalArea): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(!empty($country)): ?>
                            <li><a
                                    href="<?php echo e(url('functional_area_id'.'-'.$functionalArea->functional_area_id.'/jobs-in-'.$country->slug)); ?>"><?php echo e($functionalArea->functional_area); ?></a>
                            </li>
                        <?php else: ?>
                            <li><a
                                    href="<?php echo e(route('job.list', ['functional_area_id' => $functionalArea->functional_area_id])); ?>"><?php echo e($functionalArea->functional_area); ?></a>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>

            <!--Jobs By Industry-->
            <div class="col-md-3 col-sm-6">
                <h5><?php echo e(__('Jobs By Industry')); ?></h5>
                <!--Industry menu Start-->
                <ul class="quicklinks">
                    <?php
                        $industries = App\Industry::getUsingIndustries(10);
                    ?>
                    <?php $__currentLoopData = $industries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $industry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a
                                href="<?php echo e(url('industry_id'.'-'.$industry->industry_id.'/jobs-in-'.$country->slug)); ?>"><?php echo e($industry->industry); ?></a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <!--Industry menu End-->
                <div class="clear"></div>
            </div>

            <!--About Us-->
            <div class="col-md-3 col-sm-12">
                <h5><?php echo e(__('Contact Us')); ?></h5>
                <div class="address"><?php echo e($siteSetting->site_street_address); ?></div>
                <div class="email"> <a
                        href="mailto:<?php echo e($siteSetting->mail_to_address); ?>"><?php echo e($siteSetting->mail_to_address); ?></a>
                </div>
                <div class="phone"> <a
                        href="tel:<?php echo e($siteSetting->site_phone_primary); ?>"><?php echo e($siteSetting->site_phone_primary); ?></a>
                </div>
                <!-- Social Icons -->
                <div class="social"><?php echo $__env->make('includes.footer_social', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></div>
                <!-- Social Icons end -->

            </div>
            <!--About us End-->


        </div>
    </div>
</div>
<!--Footer end-->
<!--Copyright-->
<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="bttxt"><?php echo e(__('Copyright')); ?> &copy; <?php echo e(date('Y')); ?> <?php echo e($siteSetting->site_name); ?>.
                    <?php echo e(__('All Rights Reserved')); ?>.</div>
            </div>
            <div class="col-md-4">
                <!-- <div class="paylogos"><img src="<?php echo e(asset('/')); ?>images/payment-icons.png" alt="" /></div>	 -->
            </div>
        </div>

    </div>
</div>
<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            if (!customCookie.get('_loc_info')) {
                $.getJSON("<?php echo e(route('clientIP')); ?>", function(response) {
                    if (response.info) {
                        let data = JSON.parse(response.info);
                        let cookie_value = {
                            city: data.city,
                            country: data.country_name,
                            state: data.region_name,
                            zip: data.zip,
                            flag: data.location.country_flag
                        };
                        customCookie.set('_loc_info', JSON.stringify(cookie_value), 1);
                    }
                });
            }

        });
        window.customCookie = {
            set: function(cookie_name, cookie_value, expiry_in_days) {
                var d = new Date();
                d.setTime(d.getTime() + (expiry_in_days * 24 * 60 * 60 * 1000));
                var expires = "expires=" + d.toUTCString();
                document.cookie = cookie_name + "=" + cookie_value + ";" + expires + ";path=/";
            },
            get: function(cookie_name) {
                var cookie_nameEQ = cookie_name + "=";
                var ca = document.cookie.split(';');
                for (var i = 0; i < ca.length; i++) {
                    var c = ca[i];
                    while (c.charAt(0) == ' ') c = c.substring(1, c.length);
                    if (c.indexOf(cookie_nameEQ) == 0) return c.substring(cookie_nameEQ.length, c.length);
                }
                return null;
            },
            remove: function(cookie_name) {
                document.cookie = cookie_name + "='', -1, path=/";
            }
        };
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp\htdocs\JobCato\resources\views/includes/countrybase_footer.blade.php ENDPATH**/ ?>