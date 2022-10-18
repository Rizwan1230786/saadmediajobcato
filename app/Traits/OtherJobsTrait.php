<?php

namespace App\Traits;

use App\Http\Requests\OtherJobRequest;
use Carbon\Carbon;
use DB;
use Redirect;
use App\Helpers\DataArrayHelper;
use App\OtherWebsiteJob as OtherJobs;
use Illuminate\Http\Request;
use ImgUploader;
use File;

trait OtherJobsTrait{

    // list all custom jobs
    public function otherJobs(){
        $countries = DataArrayHelper::defaultCountriesArray();
        $other_jobs = OtherJobs::orderBy('id', 'desc')->get();
        return view('admin.job.other')->with('other_jobs', $other_jobs)->with('countries', $countries);
    }

    // add and edit froms
    public function otherJobForm($id = null){
        $countries = DataArrayHelper::defaultCountriesArray();
        $functionalAreas = DataArrayHelper::defaultFunctionalAreasArray();
        $view = 'admin.job.create-other-job';
        $job = null;
        if( !empty($id) ){
            $job = OtherJobs::findOrFail($id);
            $view = 'admin.job.edit-other';
        }
        return view($view)->with('countries', $countries)->with('job', $job)->with('functionalAreas', $functionalAreas);
    }

    // add and update
    public function otherJobStore(OtherJobRequest $request){
        $id = null;
        $flash_message = 'Other website job has been added.';
        $other_job = new OtherJobs;
        if( $request->get('id') ){
            $flash_message = 'Other website job has been updated';
            $id = $request->get('id');
            $other_job = OtherJobs::findOrFail($id);
        }
        /*         * **************************************** */
        $file_name = $other_job->logo ?: '';
        if ($request->hasFile('image')) {
            // Old Image Remove
            $this->deleteOtherImage($other_job);
            $image = $request->file('image');
            $rand = rand(0, 9999);
            $fileName = ImgUploader::UploadImage('other_jobs', $image, $rand, 1000, 1000, false);
            $file_name = $fileName;
        }
        /*         * ************************************** */
       
        $other_job->functional_area_id = $request->get('functional_area_id');
        $other_job->title = $request->get('title');
        $other_job->url = $request->get('url');
        $other_job->country_id = $request->get('country_id');
        $other_job->state_id = $request->get('state_id');
        $other_job->city_id = $request->get('city_id');
        $other_job->job_type = $request->get('job_type');
        $other_job->company_name = $request->get('company_name');
        $other_job->apply_before = $request->get('apply_before');
        $other_job->posting_date = $request->get('posting_date');
        $other_job->description = $request->get('description');
        $other_job->logo = $file_name;

        $other_job->save();

        flash(__($flash_message))->success();
        return redirect('admin/list-other-website-jobs');
    }

    // delete job
    public function deleteOtherJob(Request $request){
        $response = 'ok';
        try {
            $id = $request->get('id');
            $job = OtherJobs::findOrFail($id);
            $job->delete();
            flash('Other Website Job Deleted.')->success();
        } catch (\Exception $e) {
            $response = 'notok';
            flash('Other Website Job Not Deleted.');
        }
        finally{
            if($request->ajax()){
                echo $response;
            }
            else{
                return redirect()->back();
            }
        }
    }

    // delete image
    private function deleteOtherImage($job){
        if ( !empty($job->logo) ) {
            File::delete(ImgUploader::real_public_path() . 'other_jobs/' . $job->logo);
        }
    }
}