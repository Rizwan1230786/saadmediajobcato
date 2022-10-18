<?php $__env->startSection('content'); ?> 
<!-- Header start --> 
<?php echo $__env->make('includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
<!-- Header end --> 
<!-- Inner Page Title start --> 
<?php echo $__env->make('includes.inner_page_title', ['page_title'=>__('Dashboard')], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
<!-- Inner Page Title end -->
<div class="listpgWraper">
    <div class="container"><?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="row"> <?php echo $__env->make('includes.user_dashboard_menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="col-lg-9">
				
		<div class="profileban">
			<div class="abtuser">
				<div class="row">
					<div class="col-lg-2 col-md-2">
						<div class="uavatar"><?php echo e(auth()->user()->printUserImage()); ?></div>
					</div>
					<div class="col-lg-10 col-md-10">
						<div class="row">
							<div class="col-lg-7">
								<h4><?php echo e(auth()->user()->name); ?></h4> 
								<h6><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo e(Auth::user()->getLocation()); ?></h6>
							</div>
							<div class="col-lg-5"><div class="editbtbn"><a href="<?php echo e(route('my.profile')); ?>"><i class="fas fa-pencil-alt" aria-hidden="true"></i> Edit Profile</a>
						</div></div>
						</div>

						<ul class="row userdata">
							<li class="col-lg-6 col-md-6"><i class="fa fa-phone" aria-hidden="true"></i> <?php echo e(auth()->user()->phone); ?></li>							
							<li class="col-lg-6 col-md-6"><i class="fa fa-envelope" aria-hidden="true"></i> <?php echo e(auth()->user()->email); ?></li>
						</ul>

					</div>
				</div>
			</div>
		</div>
				
				
				
				
				
				
				
				
				
				
				
				
				<?php echo $__env->make('includes.user_dashboard_stats', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php if((bool)config('jobseeker.is_jobseeker_package_active')): ?>
                <?php        
                $packages = App\Package::where('package_for', 'like', 'job_seeker')->get();
                $package = Auth::user()->getPackage();
                if(null !== $package){
                $packages = App\Package::where('package_for', 'like', 'job_seeker')->where('id', '<>', $package->id)->where('package_price', '>=', $package->package_price)->get();
                }
                ?>

                <?php if(null !== $package): ?>
                <?php echo $__env->make('includes.user_package_msg', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('includes.user_packages_upgrade', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php else: ?>

                <?php if(null !== $packages): ?>
                <?php echo $__env->make('includes.user_packages_new', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php endif; ?>
                <?php endif; ?>
                <?php endif; ?> 
			
			
			 <div class="row">
                        <div class="col-lg-7">
                            <div class="profbox">
                                <h3><i class="fa fa-black-tie" aria-hidden="true"></i> Recommended Jobs</h3>
                                <ul class="recomndjobs">
                                    <?php if(null!==($matchingJobs)): ?> <?php $__currentLoopData = $matchingJobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $match): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <h4><a href="<?php echo e(route('job.detail', [$match->slug])); ?>"><?php echo e($match->title); ?></a></h4>
                                        <p><?php echo e($match->getCompany()->name); ?></p>
                                    </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>
                                </ul>
                            </div>
                        </div>

                   <div class="col-lg-5">
							<div class="profbox followbox">
								<h3><i class="fa fa-users"></i> My Followings</h3>

								<ul class="followinglist">
									<?php if(isset($followers) && null!==($followers)): ?> <?php $__currentLoopData = $followers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $follow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php $company = DB::table('companies')->where('slug',$follow->company_slug)->where('is_active',1)->first(); ?>
									<li>
										<span><?php echo e($company->name); ?></span>
										<p><?php echo e($company->location); ?></p>
										<a href="<?php echo e(route('company.detail',$company->slug)); ?>"><?php echo e(__('View Details')); ?></a>
									</li>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>

								</ul>

								<div class="allbtn"><a href="<?php echo e(route('my.followings')); ?>"><i class="fas fa-users"></i> View All</a>
								</div>
							</div>
						</div>

                    </div>
			
			
			</div>
               
        </div>
    </div>
</div>
<?php echo $__env->make('includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<?php echo $__env->make('includes.immediate_available_btn', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>