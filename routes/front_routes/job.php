<?php


Route::get('other-job/{mainId}', 'Job\JobController@otherJobDetail')->name('other.job.detail');

// country base other jobs////
Route::get('other-job-detail/{mainId}/{slug}', 'Job\JobController@otherJobDetailcountry')->name('other.job.detail.country');
Route::get('custom-job-details/{id}/{slug}', 'ContactController@customJobDetailscountry')->name('custom.job.details.country');

Route::get('job/{slug}', 'Job\JobController@jobDetail')->name('job.detail');
// country base job detail
Route::prefix('jobdetail')->group(function () {
    Route::get('/{slug}_in_{slug1}', 'Job\JobController@jobDetailcountrybase')->name('job.detailcountry');
});
// end
Route::get('apply/{slug}', 'Job\JobController@applyJob')->name('apply.job');
Route::post('apply/{slug}', 'Job\JobController@postApplyJob')->name('post.apply.job');
Route::get('jobs', 'Job\JobController@jobsBySearch')->name('job.list');
//country base job////////
Route::get('jobs-in-{slug}', 'Job\JobController@jobsBycountry')->name('job.country.list');
Route::get('functional_area_id-{id}/jobs-in-{slug}', 'Job\JobController@jobsByfuncationalarea')->name('jobsfunctional.list');
Route::get('industry_id-{id}/jobs-in-{slug}', 'Job\JobController@jobsByindustry')->name('jobsByindustry.list');
Route::get('add-to-favourite-job/{job_slug}', 'Job\JobController@addToFavouriteJob')->name('add.to.favourite');
Route::get('remove-from-favourite-job/{job_slug}', 'Job\JobController@removeFromFavouriteJob')->name('remove.from.favourite');
Route::get('my-job-applications', 'Job\JobController@myJobApplications')->name('my.job.applications');
Route::get('my-favourite-jobs', 'Job\JobController@myFavouriteJobs')->name('my.favourite.jobs');
Route::get('post-job', 'Job\JobPublishController@createFrontJob')->name('post.job');
Route::post('store-front-job', 'Job\JobPublishController@storeFrontJob')->name('store.front.job');
Route::get('edit-front-job/{id}', 'Job\JobPublishController@editFrontJob')->name('edit.front.job');
Route::put('update-front-job/{id}', 'Job\JobPublishController@updateFrontJob')->name('update.front.job');
Route::delete('delete-front-job', 'Job\JobPublishController@deleteJob')->name('delete.front.job');
Route::get('job-seekers', 'Job\JobSeekerController@jobSeekersBySearch')->name('job.seeker.list');


Route::post('submit-message', 'Job\SeekerSendController@submit_message')->name('submit-message');

Route::get('subscribe-alert', 'SubscriptionController@submitAlert')->name('subscribe.alert');
