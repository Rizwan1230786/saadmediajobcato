<?php

Route::get('cms/{slug}', 'CmsController@getPage')->name('cms');
Route::get('terms-of-use', 'CmsController@termsOfUse')->name('terms.of.use');
Route::get('contact-us', 'ContactController@index')->name('contact.us');
Route::post('contact-us', 'ContactController@postContact')->name('contact.us');
Route::get('contact-us-thanks', 'ContactController@thanks')->name('contact.us.thanks');

Route::get('custom-jobs', 'ContactController@showCustomJobs')->name('custom.jobs');

Route::get('custom-job-details/{id?}', 'ContactController@customJobDetails')->name('custom.job.details');

