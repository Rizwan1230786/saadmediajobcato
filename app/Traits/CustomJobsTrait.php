<?php

namespace App\Traits;

use App\Http\Requests\CustomJobRequest;
use Carbon\Carbon;
use DB;
use Redirect;
use App\Helpers\DataArrayHelper;
use App\CustomJobs;
use Illuminate\Http\Request;
use ImgUploader;
use File;

trait CustomJobsTrait{

    // list all custom jobs
    public function customJobs(){
        $countries = DataArrayHelper::defaultCountriesArray();
        $custom_jobs = CustomJobs::orderBy('id', 'DESC')->get();
        return view('admin.job.custom')->with('custom_jobs', $custom_jobs)->with('countries', $countries);
    }

    // add and edit froms
    public function customJobForm($id = null){
        $countries = DataArrayHelper::defaultCountriesArray();
        $functionalAreas = DataArrayHelper::defaultFunctionalAreasArray();
        $view = 'admin.job.create-custom';
        $job = null;
        if( !empty($id) ){
            $job = CustomJobs::findOrFail($id);
            $view = 'admin.job.edit-custom';
        }
        return view($view)->with('countries', $countries)->with('functionalAreas', $functionalAreas)->with('job', $job);
    }

    // add and update
    public function customJobStore(CustomJobRequest $request){
        $id = null;
        $flash_message = 'Custom job has been added.';
        $custom_job = new CustomJobs;
        if( $request->get('id') ){
            $flash_message = 'Custom job has been updated';
            $id = $request->get('id');
            $custom_job = CustomJobs::findOrFail($id);
        }
        /*         * **************************************** */
        $file_name = $custom_job->image ?: '';
        if ($request->hasFile('image')) {
            // Old Image Remove
            $this->deleteCustomImage($custom_job);
            $image = $request->file('image');
            $rand = rand(0, 9999);
            $fileName = ImgUploader::UploadImage('custom_jobs', $image, $rand, 1000, 1000, false);
            $file_name = $fileName;
        }
        /*         * ************************************** */
        $custom_job->functional_area_id = $request->get('functional_area_id');
        $custom_job->title = $request->get('title');
        $custom_job->country_id = $request->get('country_id');
        $custom_job->state_id = $request->get('state_id');
        $custom_job->city_id = $request->get('city_id');
        $custom_job->news_paper = $request->get('news_paper');
        $custom_job->published_date = date("Y-m-d");
        $custom_job->last_date = $request->get('last_date');
        $custom_job->description = $request->get('description');
        $custom_job->image = $file_name;

        $custom_job->save();

        flash(__($flash_message))->success();
        return redirect('admin/list-admin-custom-jobs');
    }

    // delete job
    public function deleteCustomJob(Request $request){
        $response = 'ok';
        try {
            $id = $request->get('id');
            $job = CustomJobs::findOrFail($id);
            $job->delete();
            flash('Custom Job Deleted.')->success();
        } catch (\Exception $e) {
            $response = 'notok';
            flash('Custom Job Not Deleted.');
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
    private function deleteCustomImage($job){
        if ( !empty($job->image) ) {
            File::delete(ImgUploader::real_public_path() . 'custom_jobs/' . $job->image);
        }
    }
}