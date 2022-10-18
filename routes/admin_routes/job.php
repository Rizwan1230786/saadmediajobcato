<?php

/* * ******  Job Start ********** */

// Custom Jobs
Route::get('list-admin-custom-jobs', array_merge(['uses' => 'Admin\JobController@customJobs'], $all_users))->name('list.admin.custom.jobs');
Route::get('create-custom-job', array_merge(['uses' => 'Admin\JobController@customJobForm'], $all_users))->name('create.custom.job');
Route::post('store-custom-job', array_merge(['uses' => 'Admin\JobController@customJobStore'], $all_users))->name('store.custom.job');
Route::get('edit-custom-job/{id}', array_merge(['uses' => 'Admin\JobController@customJobForm'], $all_users))->name('edit.custom.job');
Route::delete('delete-custom-job', array_merge(['uses' => 'Admin\JobController@deleteCustomJob'], $all_users))->name('delete.custom.job');
Route::put('update-custom-job', array_merge(['uses' => 'Admin\JobController@customJobStore'], $all_users))->name('update.custom.job');

// Other Jobs
Route::get('list-other-website-jobs', array_merge(['uses' => 'Admin\JobController@otherJobs'], $all_users))->name('list.other.website.jobs');
Route::get('create-other-website-job', array_merge(['uses' => 'Admin\JobController@otherJobForm'], $all_users))->name('create.other.website.job');
Route::get('edit-other-job/{id}', array_merge(['uses' => 'Admin\JobController@otherJobForm'], $all_users))->name('edit.other.job');
Route::post('store-other-job', array_merge(['uses' => 'Admin\JobController@otherJobStore'], $all_users))->name('store.other.job');
Route::put('update-other-job', array_merge(['uses' => 'Admin\JobController@otherJobStore'], $all_users))->name('update.other.job');
Route::delete('delete-other-job', array_merge(['uses' => 'Admin\JobController@deleteOtherJob'], $all_users))->name('delete.other.job');

// jobs listing
Route::get('list-admin-jobs', array_merge(['uses' => 'Admin\JobController@indexAdminJobs'], $all_users))->name('list.admin.jobs');

// Route::get('list-other-website-jobs', array_merge(['uses' => 'Admin\JobController@indexOtherWebsiteJobs'], $all_users))->name('list.other.website.jobs');

// Route::get('create-other-website-job', array_merge(['uses' => 'Admin\JobController@createOtherWebsiteJob'], $all_users))->name('create.other.website.job');

// Route::post('store-other-job', array_merge(['uses' => 'Admin\JobController@storeOtherWebsiteJob'], $all_users))->name('store.other.job');

// Route::get('edit-other-job/{id}', array_merge(['uses' => 'Admin\JobController@editOtherWebsiteJob'], $all_users))->name('edit.other.job');

// Route::delete('delete-other-job', array_merge(['uses' => 'Admin\JobController@deleteOtherWebsiteJob'], $all_users))->name('delete.other.job');

// Route::put('update-other-job/{id}', array_merge(['uses' => 'Admin\JobController@updateOtherWebsiteJob'], $all_users))->name('update.other.job');










Route::get('list-jobs', array_merge(['uses' => 'Admin\JobController@indexJobs'], $all_users))->name('list.jobs');
Route::get('create-job', array_merge(['uses' => 'Admin\JobController@createJob'], $all_users))->name('create.job');
Route::post('store-job', array_merge(['uses' => 'Admin\JobController@storeJob'], $all_users))->name('store.job');
Route::get('edit-job/{id}', array_merge(['uses' => 'Admin\JobController@editJob'], $all_users))->name('edit.job');
Route::put('update-job/{id}', array_merge(['uses' => 'Admin\JobController@updateJob'], $all_users))->name('update.job');
Route::get('delete-job/{id}', array_merge(['uses' => 'Admin\JobController@deleteJob'], $all_users))->name('delete.job');
Route::get('fetch-jobs', array_merge(['uses' => 'Admin\JobController@fetchJobsData'], $all_users))->name('fetch.data.jobs');
Route::put('make-active-job', array_merge(['uses' => 'Admin\JobController@makeActiveJob'], $all_users))->name('make.active.job');
Route::put('make-not-active-job', array_merge(['uses' => 'Admin\JobController@makeNotActiveJob'], $all_users))->name('make.not.active.job');
Route::put('make-featured-job', array_merge(['uses' => 'Admin\JobController@makeFeaturedJob'], $all_users))->name('make.featured.job');
Route::put('make-not-featured-job', array_merge(['uses' => 'Admin\JobController@makeNotFeaturedJob'], $all_users))->name('make.not.featured.job');
/* * ****** End Job ********** */