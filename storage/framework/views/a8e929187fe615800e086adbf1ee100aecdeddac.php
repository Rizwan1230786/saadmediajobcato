<?php $__env->startSection('content'); ?> 
<!-- Header start --> 
<?php echo $__env->make('includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
<!-- Header end --> 
<!-- Inner Page Title start --> 
<?php echo $__env->make('includes.inner_page_title', ['page_title'=>__($page_title)], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
<!-- Inner Page Title end -->
<div class="listpgWraper">
    <div class="container">  
        <?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>  
        

        <!-- Job Detail start -->
        <div class="row">
            <div class="col-md-8"> 
				
				<!-- Job Header start -->
        <div class="job-header">
            <div class="jobinfo">
                
                   
                        <!-- Candidate Info -->
                        <div class="candidateinfo">
                            <div class="userPic"><?php echo e($user->printUserImage()); ?></div>
                            <div class="title">
                                <?php echo e($user->getName()); ?>

                                <?php if((bool)$user->is_immediate_available): ?>
                                <sup style="font-size:12px; color:#090;"><?php echo e(__('Immediate Available For Work')); ?></sup>
                                <?php endif; ?>
                            </div>
                            <div class="desi"><?php echo e($user->getLocation()); ?></div>
                            <div class="loctext"><i class="fa fa-history" aria-hidden="true"></i> <?php echo e(__('Member Since')); ?>, <?php echo e($user->created_at->format('M d, Y')); ?></div>
                            
                            <div class="clearfix"></div>
                        </div>
                    
                    
                                 
                   
                
            </div>

            <!-- Buttons -->
            <div class="jobButtons">
                <?php if(isset($job) && isset($company)): ?>
                <?php if(Auth::guard('company')->check() && Auth::guard('company')->user()->isFavouriteApplicant($user->id, $job->id, $company->id)): ?>
                <a href="<?php echo e(route('remove.from.favourite.applicant', [$job_application->id, $user->id, $job->id, $company->id])); ?>" class="btn"><i class="fa fa-floppy-o" aria-hidden="true"></i> <?php echo e(__('Short Listed Applicant')); ?> </a>
                <?php else: ?>
                <a href="<?php echo e(route('add.to.favourite.applicant', [$job_application->id, $user->id, $job->id, $company->id])); ?>" class="btn"><i class="fa fa-floppy-o" aria-hidden="true"></i> <?php echo e(__('Short List This Applicant')); ?></a>
                <?php endif; ?>
                <?php endif; ?>

                <?php if(null !== $profileCv): ?><a href="<?php echo e(asset('cvs/'.$profileCv->cv_file)); ?>" class="btn"><i class="fa fa-download" aria-hidden="true"></i> <?php echo e(__('Download CV')); ?></a><?php endif; ?>
                <!-- <a href="javascript:;" onclick="send_message()" class="btn"><i class="fa fa-envelope" aria-hidden="true"></i> <?php echo e(__('Send Message')); ?></a> -->

            </div>
        </div>
				
				
				
				
                <!-- About Employee start -->
                <div class="job-header">
                    <div class="contentbox">
                        <h3><?php echo e(__('About me')); ?></h3>
                        <p><?php echo e($user->getProfileSummary('summary')); ?></p>
                    </div>
                </div>

                <!-- Education start -->
                <div class="job-header">
                    <div class="contentbox">
                        <h3><?php echo e(__('Education')); ?></h3>
                        <div class="" id="education_div"></div>            
                    </div>
                </div>

                <!-- Experience start -->
                <div class="job-header">
                    <div class="contentbox">
                        <h3><?php echo e(__('Experience')); ?></h3>
                        <div class="" id="experience_div"></div>            
                    </div>
                </div>

                <!-- Portfolio start -->
                <div class="job-header">
                    <div class="contentbox">
                        <h3><?php echo e(__('Portfolio')); ?></h3>
                        <div class="" id="projects_div"></div>            
                    </div>
                </div>
            </div>
            <div class="col-md-4"> 
				
				 <!-- Candidate Contact -->
				<div class="job-header">
					<div class="jobdetail">
                        <h3><?php echo e(__('Candidate Contact')); ?></h3>
                        <div class="candidateinfo">            
                            <?php if(!empty($user->phone)): ?>
                            <div class="loctext"><i class="fa fa-phone" aria-hidden="true"></i> <a href="tel:<?php echo e($user->phone); ?>"><?php echo e($user->phone); ?></a></div>
                            <?php endif; ?>
                            <?php if(!empty($user->mobile_num)): ?>
                            <div class="loctext"><i class="fa fa-phone" aria-hidden="true"></i> <a href="tel:<?php echo e($user->mobile_num); ?>"><?php echo e($user->mobile_num); ?></a></div>
                            <?php endif; ?>
                            <?php if(!empty($user->email)): ?>
                            <div class="loctext"><i class="fa fa-envelope" aria-hidden="true"></i> <a href="mailto:<?php echo e($user->email); ?>"><?php echo e($user->email); ?></a></div>
                            <?php endif; ?>
							<div class="loctext"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo e($user->street_address); ?></div>
                        </div>  
					</div>
				</div>
				
				
                <!-- Candidate Detail start -->
                <div class="job-header">
                    <div class="jobdetail">
                        <h3><?php echo e(__('Candidate Detail')); ?></h3>
                        <ul class="jbdetail">

                            <li class="row">
                                <div class="col-md-6 col-xs-6"><?php echo e(__('Is Email Verified')); ?></div>
                                <div class="col-md-6 col-xs-6"><span><?php echo e(((bool)$user->verified)? 'Yes':'No'); ?></span></div>
                            </li>
                            <li class="row">
                                <div class="col-md-6 col-xs-6"><?php echo e(__('Immediate Available')); ?></div>
                                <div class="col-md-6 col-xs-6"><span><?php echo e(((bool)$user->is_immediate_available)? 'Yes':'No'); ?></span></div>
                            </li>

                            <li class="row">
                                <div class="col-md-6 col-xs-6"><?php echo e(__('Age')); ?></div>
                                <div class="col-md-6 col-xs-6"><span><?php echo e($user->getAge()); ?> Years</span></div>
                            </li>
                            <li class="row">
                                <div class="col-md-6 col-xs-6"><?php echo e(__('Gender')); ?></div>
                                <div class="col-md-6 col-xs-6"><span><?php echo e($user->getGender('gender')); ?></span></div>
                            </li>
                            <li class="row">
                                <div class="col-md-6 col-xs-6"><?php echo e(__('Marital Status')); ?></div>
                                <div class="col-md-6 col-xs-6"><span><?php echo e($user->getMaritalStatus('marital_status')); ?></span></div>
                            </li>
                            <li class="row">
                                <div class="col-md-6 col-xs-6"><?php echo e(__('Experience')); ?></div>
                                <div class="col-md-6 col-xs-6"><span><?php echo e($user->getJobExperience('job_experience')); ?></span></div>
                            </li>
                            <li class="row">
                                <div class="col-md-6 col-xs-6"><?php echo e(__('Career Level')); ?></div>
                                <div class="col-md-6 col-xs-6"><span><?php echo e($user->getCareerLevel('career_level')); ?></span></div>
                            </li>             
                            <li class="row">
                                <div class="col-md-6 col-xs-6"><?php echo e(__('Current Salary')); ?></div>
                                <div class="col-md-6 col-xs-6"><span class="permanent"><?php echo e($user->current_salary); ?> <?php echo e($user->salary_currency); ?></span></div>
                            </li>
                            <li class="row">
                                <div class="col-md-6 col-xs-6"><?php echo e(__('Expected Salary')); ?></div>
                                <div class="col-md-6 col-xs-6"><span class="freelance"><?php echo e($user->expected_salary); ?> <?php echo e($user->salary_currency); ?></span></div>
                            </li>              
                        </ul>
                    </div>
                </div>

                <!-- Google Map start -->
                <div class="job-header">
                    <div class="jobdetail">
                        <h3><?php echo e(__('Skills')); ?></h3>
                        <div id="skill_div"></div>            
                    </div>
                </div>

                <div class="job-header">
                    <div class="jobdetail">
                        <h3><?php echo e(__('Languages')); ?></h3>
                        <div id="language_div"></div>            
                    </div>
                </div>

                <div class="job-header">
                    <div class="jobdetail">
                        <h3><?php echo e(__('Intro Video')); ?></h3>
                         <?php if($user->video_link): ?>
                          <iframe src="<?php echo e($user->video_link); ?>" frameborder="0" allowfullscreen></iframe>
                         <?php endif; ?>
                         <?php if($user->video_attachment): ?>
                         <video width="320" height="240" controls>
                          <source src="<?php echo e(asset('/')); ?>user_video/<?php echo e($user->video_attachment); ?>" type="video/mp4">
                          <source src="movie.ogg" type="video/ogg">
                        Your browser does not support the video tag.
                        </video>
                        <?php endif; ?>          
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="sendmessage" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <form action="" id="send-form">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="seeker_id" id="seeker_id" value="<?php echo e($user->id); ?>">
                <div class="modal-header">                    
                    <h4 class="modal-title">Send Message</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <textarea class="form-control" name="message" id="message" cols="10" rows="7"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>

    </div>
</div>
<?php echo $__env->make('includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
    $(document).ready(function () {
    $(document).on('click', '#send_applicant_message', function () {
    var postData = $('#send-applicant-message-form').serialize();
    $.ajax({
    type: 'POST',
            url: "<?php echo e(route('contact.applicant.message.send')); ?>",
            data: postData,
            //dataType: 'json',
            success: function (data)
            {
            response = JSON.parse(data);
            var res = response.success;
            if (res == 'success')
            {
            var errorString = '<div role="alert" class="alert alert-success">' + response.message + '</div>';
            $('#alert_messages').html(errorString);
            $('#send-applicant-message-form').hide('slow');
            $(document).scrollTo('.alert', 2000);
            } else
            {
            var errorString = '<div class="alert alert-danger" role="alert"><ul>';
            response = JSON.parse(data);
            $.each(response, function (index, value)
            {
            errorString += '<li>' + value + '</li>';
            });
            errorString += '</ul></div>';
            $('#alert_messages').html(errorString);
            $(document).scrollTo('.alert', 2000);
            }
            },
    });
    });
    showEducation();
    showProjects();
    showExperience();
    showSkills();
    showLanguages();
    });
    function showProjects()
    {
    $.post("<?php echo e(route('show.applicant.profile.projects', $user->id)); ?>", {user_id: <?php echo e($user->id); ?>, _method: 'POST', _token: '<?php echo e(csrf_token()); ?>'})
            .done(function (response) {
            $('#projects_div').html(response);
            });
    }
    function showExperience()
    {
    $.post("<?php echo e(route('show.applicant.profile.experience', $user->id)); ?>", {user_id: <?php echo e($user->id); ?>, _method: 'POST', _token: '<?php echo e(csrf_token()); ?>'})
            .done(function (response) {
            $('#experience_div').html(response);
            });
    }
    function showEducation()
    {
    $.post("<?php echo e(route('show.applicant.profile.education', $user->id)); ?>", {user_id: <?php echo e($user->id); ?>, _method: 'POST', _token: '<?php echo e(csrf_token()); ?>'})
            .done(function (response) {
            $('#education_div').html(response);
            });
    }
    function showLanguages()
    {
    $.post("<?php echo e(route('show.applicant.profile.languages', $user->id)); ?>", {user_id: <?php echo e($user->id); ?>, _method: 'POST', _token: '<?php echo e(csrf_token()); ?>'})
            .done(function (response) {
            $('#language_div').html(response);
            });
    }
    function showSkills()
    {
    $.post("<?php echo e(route('show.applicant.profile.skills', $user->id)); ?>", {user_id: <?php echo e($user->id); ?>, _method: 'POST', _token: '<?php echo e(csrf_token()); ?>'})
            .done(function (response) {
            $('#skill_div').html(response);
            });
    }

    function send_message() {
        const el = document.createElement('div')
        el.innerHTML = "Please <a class='btn' href='<?php echo e(route('login')); ?>' onclick='set_session()'>log in</a> as a Employer and try again."
        <?php if(null!==(Auth::guard('company')->user())): ?>
        $('#sendmessage').modal('show');
        <?php else: ?>
        swal({
            title: "You are not Loged in",
            content: el,
            icon: "error",
            button: "OK",
        });
        <?php endif; ?>
    }
    if ($("#send-form").length > 0) {
        $("#send-form").validate({
            validateHiddenInputs: true,
            ignore: "",

            rules: {
                message: {
                    required: true,
                    maxlength: 5000
                },
            },
            messages: {

                message: {
                    required: "Message is required",
                }

            },
            submitHandler: function(form) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                <?php if(null !== (Auth::guard('company')->user())): ?>
                $.ajax({
                    url: "<?php echo e(route('submit-message-seeker')); ?>",
                    type: "POST",
                    data: $('#send-form').serialize(),
                    success: function(response) {
                        $("#send-form").trigger("reset");
                        $('#sendmessage').modal('hide');
                        swal({
                            title: "Success",
                            text: response["msg"],
                            icon: "success",
                            button: "OK",
                        });
                    }
                });
                <?php endif; ?>
            }
        })
    }
</script> 
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>