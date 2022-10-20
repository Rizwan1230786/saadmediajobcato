<?php

namespace App\Http\Controllers\Job;

use Auth;
use DB;
use Input;
use Redirect;
use Carbon\Carbon;
use App\Job;
use App\JobApply;
use App\FavouriteJob;
use App\Company;
use App\JobSkill;
use App\JobSkillManager;
use App\Country;
use App\CountryDetail;
use App\State;
use App\City;
use App\CareerLevel;
use App\FunctionalArea;
use App\JobType;
use App\JobShift;
use App\Gender;
use App\JobExperience;
use App\DegreeLevel;
use App\ProfileCv;
use App\Helpers\MiscHelper;
use App\Helpers\DataArrayHelper;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use DataTables;
use App\Http\Requests\JobFormRequest;
use App\Http\Requests\Front\ApplyJobFormRequest;
use App\Http\Controllers\Controller;
use App\Traits\FetchJobs;

use App\Events\JobApplied;
use App\OtherWebsiteJob;
use App\CustomJobs;

class JobController extends Controller
{

        //use Skills;
        use FetchJobs;

        private $functionalAreas = '';
        private $countries = '';

        /**
         * Create a new controller instance.
         *
         * @return void
         */
        public function __construct()
        {
                $this->middleware('auth', ['except' => ['otherJobDetailcountry','jobDetailcountrybase','jobsByindustry','jobsByfuncationalarea','jobsBySearch', 'jobsBycountry', 'jobDetail', 'otherJobDetail']]);

                $this->functionalAreas = DataArrayHelper::langFunctionalAreasArray();
                $this->countries = DataArrayHelper::langCountriesArray();
        }
        public function jobsByfuncationalarea(Request $request ,$id,$slug)
        {  
               
                $country=Country::where('slug',$slug)->first();
               
              
               
                $search = $request->query('search', '');

                //        echo $search;exit;
                $job_titles =  $this->determineArray($request->query('job_title', array()));
                $company_ids =  $this->determineArray($request->query('company_id', array()));
                $industry_ids =  $this->determineArray($request->query('industry_id', array()));
                $job_skill_ids =  $this->determineArray($request->query('job_skill_id', array()));
                $functional_area_ids =  $this->determineArray($request->query('functional_area_id', array()));
                $country_ids =  $this->determineArray($request->query('country_id', array()));
                $state_ids =  $this->determineArray($request->query('state_id', array()));
                $city_ids =  $this->determineArray($request->query('city_id', array()));
                $is_freelance =  $this->determineArray($request->query('is_freelance', array()));
                $career_level_ids =  $this->determineArray($request->query('career_level_id', array()));
                $job_type_ids =  $this->determineArray($request->query('job_type_id', array()));
                $job_shift_ids =  $this->determineArray($request->query('job_shift_id', array()));
                $gender_ids =  $this->determineArray($request->query('gender_id', array()));
                $degree_level_ids =  $this->determineArray($request->query('degree_level_id', array()));
                $job_experience_ids =  $this->determineArray($request->query('job_experience_id', array()));
                $salary_from = $request->query('salary_from', '');
                $salary_to = $request->query('salary_to', '');
                $salary_currency = $request->query('salary_currency', '');
                $is_featured = $request->query('is_featured', 2);
                $order_by = $request->query('order_by', 'id');
                $limit = 15;

                
                $jobs=Job::where(['country_id'=>$country->id,'functional_area_id'=>$id])->paginate(10);
               
                //        echo "<PRE>";print_r($jobs);exit;

                /*         * ************************************************** */

                $jobTitlesArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids, $functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'jobs.title');

                //        echo "<PRE>";print_r($jobTitlesArray);exit;


                /*         * ************************************************* */

                $jobIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids, $functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'jobs.id');

                //        echo "<PRE>";print_r($jobIdsArray);exit;

                /*         * ************************************************** */

                $skillIdsArray = $this->fetchSkillIdsArray($jobIdsArray);

                //        echo "<PRE>";print_r($skillIdsArray);exit;


                /*         * ************************************************** */

                $countryIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids, $functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'jobs.country_id');

                //        echo "<PRE>";print_r($countryIdsArray);exit;


                /*         * ************************************************** */

                $stateIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids, $functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'jobs.state_id');

                //        echo "<PRE>";print_r($stateIdsArray);exit;


                /*         * ************************************************** */

                $cityIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids, $functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'jobs.city_id');

                //        echo "<PRE>";print_r($cityIdsArray);exit;


                /*         * ************************************************** */

                $companyIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids, $functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'jobs.company_id');

                //        echo "<PRE>";print_r($companyIdsArray);exit;


                /*         * ************************************************** */

                $industryIdsArray = $this->fetchIndustryIdsArray($companyIdsArray);

                //        echo "<PRE>";print_r($industryIdsArray);

                /*         * ************************************************** */


                /*         * ************************************************** */

                $functionalAreaIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids, $functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'jobs.functional_area_id');

                //        echo "<PRE>";print_r($functionalAreaIdsArray);


                /*         * ************************************************** */

                $careerLevelIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids, $functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'jobs.career_level_id');


                //        echo "<PRE>";print_r($careerLevelIdsArray);

                /*         * ************************************************** */

                $jobTypeIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids, $functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'jobs.job_type_id');

                //        echo "<PRE>";print_r($jobTypeIdsArray);


                /*         * ************************************************** */

                $jobShiftIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids, $functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'jobs.job_shift_id');

                //        echo "<PRE>";print_r($jobShiftIdsArray);


                /*         * ************************************************** */

                $genderIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids, $functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'jobs.gender_id');


                //        echo "<PRE>";print_r($genderIdsArray);


                /*         * ************************************************** */

                $degreeLevelIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids, $functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'jobs.degree_level_id');

                //        echo "<PRE>";print_r($degreeLevelIdsArray);


                /*         * ************************************************** */

                $jobExperienceIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids, $functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'jobs.job_experience_id');

                //        echo "<PRE>";print_r($jobExperienceIdsArray);


                /*         * ************************************************** */

                $seoArray = $this->getSEOCountry($functional_area_ids, $country_ids, $state_ids, $city_ids, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids);
                

                //        echo "<PRE>";print_r($seoArray);


                /*         * ************************************************** */

                $currencies = DataArrayHelper::currenciesArray();

                /*         * ************************************************** */


                //
                //        $seoArray = json_decode(json_encode($seoArray),true);
                //        echo "<PRE>";print_r($seoArray);exit;
                //
                //        exit;

            
                $seo = (object) array(
                        'seo_title' => $seoArray['description'].' In '.$country->country,
                        'seo_description' => $seoArray['description'].' In '.$country->country,
                        'seo_keywords' => $seoArray['keywords'],
                        'seo_other' => ''
                );
                //        echo $search;echo "<BR>";

                $other_jobs = new OtherWebsiteJob;
                if (!empty($search)) {
                        $other_jobs = $other_jobs->orWhere(function ($query) use ($search) {
                                $query->where('title', 'LIKE', '%' . $search . '%');
                                $query->where('description', 'LIKE', '%' . $search . '%');
                               
                        });
                }
                if (!empty($country_ids)) {
                        $other_jobs = $other_jobs->where('country_id', $country_ids);
                }
                $today = date('Y-m-d');
                $other_jobs = $other_jobs->where('status', 1)
                        ->whereRaw("apply_before > '$today'")
                        ->where('country_id',$country->id)
                        ->where('functional_area_id',$id)
                        ->take(5)
                        ->orderBy('id', 'DESC')
                        ->get();
                
                //        $other_jobs = json_decode(json_encode($other_jobs),true);
                //        echo "<PRE>";print_r($other_jobs);exit;



                //        echo $search;echo "<BR>";
                $custom_jobs = new CustomJobs;
                if (!empty($search)) {
                        $custom_jobs = $custom_jobs->orWhere(function ($query) use ($search) {
                                $query->where('title', 'LIKE', '%' . $search . '%');
                                $query->orWhere('description', 'LIKE', '%' . $search . '%');
                        });
                }
                if (!empty($country_ids)) {
                        $custom_jobs = $custom_jobs->where('country_id', $country_ids);
                }
                $today = date('Y-m-d');
                $custom_jobs = $custom_jobs->where('status', 1)
                        ->whereRaw("last_date > '$today'")
                        ->where('country_id',$country->id)
                        ->where('functional_area_id',$id)
                        ->take(5)
                        ->orderBy('id', 'DESC')
                        ->get();
                //        ->toSql();

                //        $custom_jobs = json_decode(json_encode($custom_jobs),true);
                //        echo "<PRE>";print_r($custom_jobs);exit;

                // $q = $search;
                // $other_jobs = OtherWebsiteJob::where('title','LIKE','%'.$q.'%')
                //                                 ->orWhere('description','LIKE','%'.$q.'%')
                //                                 ->where()
                //                                 ->take(5)
                //                                 ->orderBy('id', 'DESC')
                //                                 ->get();

                return view('job.list')
                        ->with('custom_jobs', $custom_jobs)
                        ->with('other_jobs', $other_jobs)
                        ->with('functionalAreas', $this->functionalAreas)
                        ->with('countries', $this->countries)
                        ->with('currencies', array_unique($currencies))
                        ->with('jobs', $jobs)
                        ->with('jobTitlesArray', $jobTitlesArray)
                        ->with('skillIdsArray', $skillIdsArray)
                        ->with('countryIdsArray', $countryIdsArray)
                        ->with('stateIdsArray', $stateIdsArray)
                        ->with('cityIdsArray', $cityIdsArray)
                        ->with('companyIdsArray', $companyIdsArray)
                        ->with('industryIdsArray', $industryIdsArray)
                        ->with('functionalAreaIdsArray', $functionalAreaIdsArray)
                        ->with('careerLevelIdsArray', $careerLevelIdsArray)
                        ->with('jobTypeIdsArray', $jobTypeIdsArray)
                        ->with('jobShiftIdsArray', $jobShiftIdsArray)
                        ->with('genderIdsArray', $genderIdsArray)
                        ->with('degreeLevelIdsArray', $degreeLevelIdsArray)
                        ->with('jobExperienceIdsArray', $jobExperienceIdsArray)
                        ->with('seo', $seo)
                        ->with('country',$country);
        }
        public function jobsByindustry(Request $request ,$id,$slug)
        {  
               
                $country=Country::where('slug',$slug)->first();
               
              
               
                $search = $request->query('search', '');

                //        echo $search;exit;
                $job_titles =  $this->determineArray($request->query('job_title', array()));
                $company_ids =  $this->determineArray($request->query('company_id', array()));
                $industry_ids =  $this->determineArray($request->query('industry_id', array()));
                $job_skill_ids =  $this->determineArray($request->query('job_skill_id', array()));
                $functional_area_ids =  $this->determineArray($request->query('functional_area_id', array()));
                $country_ids =  $this->determineArray($request->query('country_id', array()));
                $state_ids =  $this->determineArray($request->query('state_id', array()));
                $city_ids =  $this->determineArray($request->query('city_id', array()));
                $is_freelance =  $this->determineArray($request->query('is_freelance', array()));
                $career_level_ids =  $this->determineArray($request->query('career_level_id', array()));
                $job_type_ids =  $this->determineArray($request->query('job_type_id', array()));
                $job_shift_ids =  $this->determineArray($request->query('job_shift_id', array()));
                $gender_ids =  $this->determineArray($request->query('gender_id', array()));
                $degree_level_ids =  $this->determineArray($request->query('degree_level_id', array()));
                $job_experience_ids =  $this->determineArray($request->query('job_experience_id', array()));
                $salary_from = $request->query('salary_from', '');
                $salary_to = $request->query('salary_to', '');
                $salary_currency = $request->query('salary_currency', '');
                $is_featured = $request->query('is_featured', 2);
                $order_by = $request->query('order_by', 'id');
                $limit = 15;

                $company=Company::where('industry_id',$id)->first();
               
                $jobs=Job::where(['country_id'=>$country->id,'company_id'=>$company->id])->paginate(10);
                
               
                //        echo "<PRE>";print_r($jobs);exit;

                /*         * ************************************************** */

                $jobTitlesArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids, $functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'jobs.title');

                //        echo "<PRE>";print_r($jobTitlesArray);exit;


                /*         * ************************************************* */

                $jobIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids, $functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'jobs.id');

                //        echo "<PRE>";print_r($jobIdsArray);exit;

                /*         * ************************************************** */

                $skillIdsArray = $this->fetchSkillIdsArray($jobIdsArray);

                //        echo "<PRE>";print_r($skillIdsArray);exit;


                /*         * ************************************************** */

                $countryIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids, $functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'jobs.country_id');

                //        echo "<PRE>";print_r($countryIdsArray);exit;


                /*         * ************************************************** */

                $stateIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids, $functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'jobs.state_id');

                //        echo "<PRE>";print_r($stateIdsArray);exit;


                /*         * ************************************************** */

                $cityIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids, $functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'jobs.city_id');

                //        echo "<PRE>";print_r($cityIdsArray);exit;


                /*         * ************************************************** */

                $companyIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids, $functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'jobs.company_id');

                //        echo "<PRE>";print_r($companyIdsArray);exit;


                /*         * ************************************************** */

                $industryIdsArray = $this->fetchIndustryIdsArray($companyIdsArray);

                //        echo "<PRE>";print_r($industryIdsArray);

                /*         * ************************************************** */


                /*         * ************************************************** */

                $functionalAreaIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids, $functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'jobs.functional_area_id');

                //        echo "<PRE>";print_r($functionalAreaIdsArray);


                /*         * ************************************************** */

                $careerLevelIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids, $functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'jobs.career_level_id');


                //        echo "<PRE>";print_r($careerLevelIdsArray);

                /*         * ************************************************** */

                $jobTypeIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids, $functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'jobs.job_type_id');

                //        echo "<PRE>";print_r($jobTypeIdsArray);


                /*         * ************************************************** */

                $jobShiftIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids, $functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'jobs.job_shift_id');

                //        echo "<PRE>";print_r($jobShiftIdsArray);


                /*         * ************************************************** */

                $genderIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids, $functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'jobs.gender_id');


                //        echo "<PRE>";print_r($genderIdsArray);


                /*         * ************************************************** */

                $degreeLevelIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids, $functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'jobs.degree_level_id');

                //        echo "<PRE>";print_r($degreeLevelIdsArray);


                /*         * ************************************************** */

                $jobExperienceIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids, $functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'jobs.job_experience_id');

                //        echo "<PRE>";print_r($jobExperienceIdsArray);


                /*         * ************************************************** */

                $seoArray = $this->getSEOCountry($functional_area_ids, $country_ids, $state_ids, $city_ids, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids);
                

                //        echo "<PRE>";print_r($seoArray);


                /*         * ************************************************** */

                $currencies = DataArrayHelper::currenciesArray();

                /*         * ************************************************** */


                //
                //        $seoArray = json_decode(json_encode($seoArray),true);
                //        echo "<PRE>";print_r($seoArray);exit;
                //
                //        exit;

            
                $seo = (object) array(
                        'seo_title' => $seoArray['description'].' In '.$country->country,
                        'seo_description' => $seoArray['description'].' In '.$country->country,
                        'seo_keywords' => $seoArray['keywords'],
                        'seo_other' => ''
                );
                //        echo $search;echo "<BR>";

                $other_jobs = new OtherWebsiteJob;
                if (!empty($search)) {
                        $other_jobs = $other_jobs->orWhere(function ($query) use ($search) {
                                $query->where('title', 'LIKE', '%' . $search . '%');
                                $query->where('description', 'LIKE', '%' . $search . '%');
                               
                        });
                }
                if (!empty($country_ids)) {
                        $other_jobs = $other_jobs->where('country_id', $country_ids);
                }
                $today = date('Y-m-d');
                $other_jobs = $other_jobs->where('status', 1)
                        ->whereRaw("apply_before > '$today'")
                        ->where('country_id',$country->id)
                        ->where('functional_area_id',$id)
                        ->take(5)
                        ->orderBy('id', 'DESC')
                        ->get();
                
                //        $other_jobs = json_decode(json_encode($other_jobs),true);
                //        echo "<PRE>";print_r($other_jobs);exit;



                //        echo $search;echo "<BR>";
                $custom_jobs = new CustomJobs;
                if (!empty($search)) {
                        $custom_jobs = $custom_jobs->orWhere(function ($query) use ($search) {
                                $query->where('title', 'LIKE', '%' . $search . '%');
                                $query->orWhere('description', 'LIKE', '%' . $search . '%');
                        });
                }
                if (!empty($country_ids)) {
                        $custom_jobs = $custom_jobs->where('country_id', $country_ids);
                }
                $today = date('Y-m-d');
                $custom_jobs = $custom_jobs->where('status', 1)
                        ->whereRaw("last_date > '$today'")
                        ->where('country_id',$country->id)
                        ->where('functional_area_id',$id)
                        ->take(5)
                        ->orderBy('id', 'DESC')
                        ->get();
                //        ->toSql();

                //        $custom_jobs = json_decode(json_encode($custom_jobs),true);
                //        echo "<PRE>";print_r($custom_jobs);exit;

                // $q = $search;
                // $other_jobs = OtherWebsiteJob::where('title','LIKE','%'.$q.'%')
                //                                 ->orWhere('description','LIKE','%'.$q.'%')
                //                                 ->where()
                //                                 ->take(5)
                //                                 ->orderBy('id', 'DESC')
                //                                 ->get();

                return view('job.list')
                        ->with('custom_jobs', $custom_jobs)
                        ->with('other_jobs', $other_jobs)
                        ->with('functionalAreas', $this->functionalAreas)
                        ->with('countries', $this->countries)
                        ->with('currencies', array_unique($currencies))
                        ->with('jobs', $jobs)
                        ->with('jobTitlesArray', $jobTitlesArray)
                        ->with('skillIdsArray', $skillIdsArray)
                        ->with('countryIdsArray', $countryIdsArray)
                        ->with('stateIdsArray', $stateIdsArray)
                        ->with('cityIdsArray', $cityIdsArray)
                        ->with('companyIdsArray', $companyIdsArray)
                        ->with('industryIdsArray', $industryIdsArray)
                        ->with('functionalAreaIdsArray', $functionalAreaIdsArray)
                        ->with('careerLevelIdsArray', $careerLevelIdsArray)
                        ->with('jobTypeIdsArray', $jobTypeIdsArray)
                        ->with('jobShiftIdsArray', $jobShiftIdsArray)
                        ->with('genderIdsArray', $genderIdsArray)
                        ->with('degreeLevelIdsArray', $degreeLevelIdsArray)
                        ->with('jobExperienceIdsArray', $jobExperienceIdsArray)
                        ->with('seo', $seo)
                        ->with('country',$country);
        }
        public function jobsBycountry(Request $request , $slug)
        {  
                
                $country=Country::where('slug',$slug)->first();
                $search = $request->query('search', '');

                //        echo $search;exit;
                $job_titles =  $this->determineArray($request->query('job_title', array()));
                $company_ids =  $this->determineArray($request->query('company_id', array()));
                $industry_ids =  $this->determineArray($request->query('industry_id', array()));
                $job_skill_ids =  $this->determineArray($request->query('job_skill_id', array()));
                $functional_area_ids =  $this->determineArray($request->query('functional_area_id', array()));
                $country_ids =  $this->determineArray($request->query('country_id', array()));
                $state_ids =  $this->determineArray($request->query('state_id', array()));
                $city_ids =  $this->determineArray($request->query('city_id', array()));
                $is_freelance =  $this->determineArray($request->query('is_freelance', array()));
                $career_level_ids =  $this->determineArray($request->query('career_level_id', array()));
                $job_type_ids =  $this->determineArray($request->query('job_type_id', array()));
                $job_shift_ids =  $this->determineArray($request->query('job_shift_id', array()));
                $gender_ids =  $this->determineArray($request->query('gender_id', array()));
                $degree_level_ids =  $this->determineArray($request->query('degree_level_id', array()));
                $job_experience_ids =  $this->determineArray($request->query('job_experience_id', array()));
                $salary_from = $request->query('salary_from', '');
                $salary_to = $request->query('salary_to', '');
                $salary_currency = $request->query('salary_currency', '');
                $is_featured = $request->query('is_featured', 2);
                $order_by = $request->query('order_by', 'id');
                $limit = 15;

                
                $jobs=Job::where('country_id',$country->id)->paginate(10);
               
                //        echo "<PRE>";print_r($jobs);exit;

                /*         * ************************************************** */

                $jobIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids, $functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'jobs.id');

                //        echo "<PRE>";print_r($jobIdsArray);exit;

                /*         * ************************************************** */

                $skillIdsArray = $this->fetchSkillIdsArray($jobIdsArray);

                //        echo "<PRE>";print_r($skillIdsArray);exit;


                /*         * ************************************************** */

                $stateIdsArray = State::where('country_id',$country->id)->get();
               

                //        echo "<PRE>";print_r($stateIdsArray);exit;


                /*         * ************************************************** */
                $cityid='jobs.city_id';
               
                $cityIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids, $functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'jobs.city_id');
                

                //        echo "<PRE>";print_r($cityIdsArray);exit;


                /*         * ************************************************** */

                $companyIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids, $functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'jobs.company_id');

                //        echo "<PRE>";print_r($companyIdsArray);exit;


                /*         * ************************************************** */

                $industryIdsArray = $this->fetchIndustryIdsArray($companyIdsArray);

                //        echo "<PRE>";print_r($industryIdsArray);

                /*         * ************************************************** */


                /*         * ************************************************** */

                $functionalAreaIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids, $functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'jobs.functional_area_id');

                //        echo "<PRE>";print_r($functionalAreaIdsArray);


                /*         * ************************************************** */

                $careerLevelIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids, $functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'jobs.career_level_id');


                //        echo "<PRE>";print_r($careerLevelIdsArray);

                /*         * ************************************************** */

                $jobTypeIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids, $functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'jobs.job_type_id');

                //        echo "<PRE>";print_r($jobTypeIdsArray);


                /*         * ************************************************** */

                $jobShiftIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids, $functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'jobs.job_shift_id');

                //        echo "<PRE>";print_r($jobShiftIdsArray);


                /*         * ************************************************** */

                $genderIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids, $functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'jobs.gender_id');


                //        echo "<PRE>";print_r($genderIdsArray);


                /*         * ************************************************** */

                $degreeLevelIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids, $functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'jobs.degree_level_id');

                //        echo "<PRE>";print_r($degreeLevelIdsArray);


                /*         * ************************************************** */

                $jobExperienceIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids, $functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'jobs.job_experience_id');

                //        echo "<PRE>";print_r($jobExperienceIdsArray);


                /*         * ************************************************** */

                $seoArray = $this->getSEOCountry($functional_area_ids, $country_ids, $state_ids, $city_ids, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids);
                

                //        echo "<PRE>";print_r($seoArray);


                /*         * ************************************************** */

                $currencies = DataArrayHelper::currenciesArray();

                /*         * ************************************************** */


                //
                //        $seoArray = json_decode(json_encode($seoArray),true);
                //        echo "<PRE>";print_r($seoArray);exit;
                //
                //        exit;

            
                $seo = (object) array(
                        'seo_title' => $seoArray['description'].' In '.$country->country,
                        'seo_description' => $seoArray['description'].' In '.$country->country,
                        'seo_keywords' => $seoArray['keywords'],
                        'seo_other' => ''
                );
                //        echo $search;echo "<BR>";

                $other_jobs = new OtherWebsiteJob;
                if (!empty($search)) {
                        $other_jobs = $other_jobs->orWhere(function ($query) use ($search) {
                                $query->where('title', 'LIKE', '%' . $search . '%');
                                $query->where('description', 'LIKE', '%' . $search . '%');
                               
                        });
                }
                if (!empty($country_ids)) {
                        $other_jobs = $other_jobs->where('country_id', $country_ids);
                }
                $today = date('Y-m-d');
                $other_jobs = $other_jobs->where('status', 1)
                        ->whereRaw("apply_before > '$today'")
                        ->where('country_id',$country->id)
                        ->take(5)
                        ->orderBy('id', 'DESC')
                        ->get();
                
                //        $other_jobs = json_decode(json_encode($other_jobs),true);
                //        echo "<PRE>";print_r($other_jobs);exit;



                //        echo $search;echo "<BR>";
                $custom_jobs = new CustomJobs;
                if (!empty($search)) {
                        $custom_jobs = $custom_jobs->orWhere(function ($query) use ($search) {
                                $query->where('title', 'LIKE', '%' . $search . '%');
                                $query->orWhere('description', 'LIKE', '%' . $search . '%');
                        });
                }
                if (!empty($country_ids)) {
                        $custom_jobs = $custom_jobs->where('country_id', $country_ids);
                }
                $today = date('Y-m-d');
                $custom_jobs = $custom_jobs->where('status', 1)
                        ->whereRaw("last_date > '$today'")
                        ->where('country_id',$country->id)
                        ->take(5)
                        ->orderBy('id', 'DESC')
                        ->get();
                //        ->toSql();

                //        $custom_jobs = json_decode(json_encode($custom_jobs),true);
                //        echo "<PRE>";print_r($custom_jobs);exit;

                // $q = $search;
                // $other_jobs = OtherWebsiteJob::where('title','LIKE','%'.$q.'%')
                //                                 ->orWhere('description','LIKE','%'.$q.'%')
                //                                 ->where()
                //                                 ->take(5)
                //                                 ->orderBy('id', 'DESC')
                //                                 ->get();

                return view('job.list')
                        ->with('custom_jobs', $custom_jobs)
                        ->with('other_jobs', $other_jobs)
                        ->with('functionalAreas', $this->functionalAreas)
                        ->with('countries', $this->countries)
                        ->with('currencies', array_unique($currencies))
                        ->with('jobs', $jobs)
                        ->with('skillIdsArray', $skillIdsArray)
                        ->with('stateIdsArray', $stateIdsArray)
                        ->with('cityIdsArray', $cityIdsArray)
                        ->with('companyIdsArray', $companyIdsArray)
                        ->with('industryIdsArray', $industryIdsArray)
                        ->with('functionalAreaIdsArray', $functionalAreaIdsArray)
                        ->with('careerLevelIdsArray', $careerLevelIdsArray)
                        ->with('jobTypeIdsArray', $jobTypeIdsArray)
                        ->with('jobShiftIdsArray', $jobShiftIdsArray)
                        ->with('genderIdsArray', $genderIdsArray)
                        ->with('degreeLevelIdsArray', $degreeLevelIdsArray)
                        ->with('jobExperienceIdsArray', $jobExperienceIdsArray)
                        ->with('seo', $seo)
                        ->with('country',$country);
        }
        public function jobsBySearch(Request $request)
        {
                $country=null;
                $search = $request->query('search', '');

                //        echo $search;exit;


                $job_titles =  $this->determineArray($request->query('job_title', array()));
               
                $company_ids =  $this->determineArray($request->query('company_id', array()));
                $industry_ids =  $this->determineArray($request->query('industry_id', array()));
                $job_skill_ids =  $this->determineArray($request->query('job_skill_id', array()));
                $functional_area_ids =  $this->determineArray($request->query('functional_area_id', array()));
                $country_ids =  $this->determineArray($request->query('country_id', array()));
                $state_ids =  $this->determineArray($request->query('state_id', array()));
                $city_ids =  $this->determineArray($request->query('city_id', array()));
                $is_freelance =  $this->determineArray($request->query('is_freelance', array()));
                $career_level_ids =  $this->determineArray($request->query('career_level_id', array()));
                $job_type_ids =  $this->determineArray($request->query('job_type_id', array()));
                $job_shift_ids =  $this->determineArray($request->query('job_shift_id', array()));
                $gender_ids =  $this->determineArray($request->query('gender_id', array()));
                $degree_level_ids =  $this->determineArray($request->query('degree_level_id', array()));
                $job_experience_ids =  $this->determineArray($request->query('job_experience_id', array()));
                $salary_from = $request->query('salary_from', '');
                $salary_to = $request->query('salary_to', '');
                $salary_currency = $request->query('salary_currency', '');
                $is_featured = $request->query('is_featured', 2);
                $order_by = $request->query('order_by', 'id');
                $limit = 15;

                $jobs = $this->fetchJobs(
                        $search,
                        $job_titles,
                        $company_ids,
                        $industry_ids,
                        $job_skill_ids,
                        $functional_area_ids,
                        $country_ids,
                        $state_ids,
                        $city_ids,
                        $is_freelance,
                        $career_level_ids,
                        $job_type_ids,
                        $job_shift_ids,
                        $gender_ids,
                        $degree_level_ids,
                        $job_experience_ids,
                        $salary_from,
                        $salary_to,
                        $salary_currency,
                        $is_featured,
                        $order_by,
                        $limit
                );

                //        echo "<PRE>";print_r($jobs);exit;

                /*         * ************************************************** */

                $jobTitlesArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids, $functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'jobs.title');

                //        echo "<PRE>";print_r($jobTitlesArray);exit;


                /*         * ************************************************* */

                $jobIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids, $functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'jobs.id');

                //        echo "<PRE>";print_r($jobIdsArray);exit;

                /*         * ************************************************** */

                $skillIdsArray = $this->fetchSkillIdsArray($jobIdsArray);

                //        echo "<PRE>";print_r($skillIdsArray);exit;


                /*         * ************************************************** */

                $countryIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids, $functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'jobs.country_id');

                //        echo "<PRE>";print_r($countryIdsArray);exit;


                /*         * ************************************************** */

                $stateIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids, $functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'jobs.state_id');

                //        echo "<PRE>";print_r($stateIdsArray);exit;


                /*         * ************************************************** */

                $cityIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids, $functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'jobs.city_id');

                //        echo "<PRE>";print_r($cityIdsArray);exit;


                /*         * ************************************************** */

                $companyIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids, $functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'jobs.company_id');

                //        echo "<PRE>";print_r($companyIdsArray);exit;


                /*         * ************************************************** */

                $industryIdsArray = $this->fetchIndustryIdsArray($companyIdsArray);

                //        echo "<PRE>";print_r($industryIdsArray);

                /*         * ************************************************** */


                /*         * ************************************************** */

                $functionalAreaIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids, $functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'jobs.functional_area_id');

                //        echo "<PRE>";print_r($functionalAreaIdsArray);


                /*         * ************************************************** */

                $careerLevelIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids, $functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'jobs.career_level_id');


                //        echo "<PRE>";print_r($careerLevelIdsArray);

                /*         * ************************************************** */

                $jobTypeIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids, $functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'jobs.job_type_id');

                //        echo "<PRE>";print_r($jobTypeIdsArray);


                /*         * ************************************************** */

                $jobShiftIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids, $functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'jobs.job_shift_id');

                //        echo "<PRE>";print_r($jobShiftIdsArray);


                /*         * ************************************************** */

                $genderIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids, $functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'jobs.gender_id');


                //        echo "<PRE>";print_r($genderIdsArray);


                /*         * ************************************************** */

                $degreeLevelIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids, $functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'jobs.degree_level_id');

                //        echo "<PRE>";print_r($degreeLevelIdsArray);


                /*         * ************************************************** */

                $jobExperienceIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids, $functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'jobs.job_experience_id');

                //        echo "<PRE>";print_r($jobExperienceIdsArray);


                /*         * ************************************************** */

                $seoArray = $this->getSEO($functional_area_ids, $country_ids, $state_ids, $city_ids, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids);

                //        echo "<PRE>";print_r($seoArray);


                /*         * ************************************************** */

                $currencies = DataArrayHelper::currenciesArray();

                /*         * ************************************************** */


                //
                //        $seoArray = json_decode(json_encode($seoArray),true);
                //        echo "<PRE>";print_r($seoArray);exit;
                //
                //        exit;


                $seo = (object) array(
                        'seo_title' => $seoArray['description'],
                        'seo_description' => $seoArray['description'],
                        'seo_keywords' => $seoArray['keywords'],
                        'seo_other' => ''
                );

                //        echo $search;echo "<BR>";

                $other_jobs = new OtherWebsiteJob;
                if (!empty($search)) {
                        $other_jobs = $other_jobs->orWhere(function ($query) use ($search) {
                                $query->where('title', 'LIKE', '%' . $search . '%');
                                $query->where('description', 'LIKE', '%' . $search . '%');
                        });
                }
                if (!empty($country_ids)) {
                        $other_jobs = $other_jobs->where('country_id', $country_ids);
                }
                $today = date('Y-m-d');
                $other_jobs = $other_jobs->where('status', 1)
                        ->whereRaw("apply_before > '$today'")
                        ->take(5)
                        ->orderBy('id', 'DESC')
                        ->get();

                //        $other_jobs = json_decode(json_encode($other_jobs),true);
                //        echo "<PRE>";print_r($other_jobs);exit;



                //        echo $search;echo "<BR>";
                $custom_jobs = new CustomJobs;
                if (!empty($search)) {
                        $custom_jobs = $custom_jobs->orWhere(function ($query) use ($search) {
                                $query->where('title', 'LIKE', '%' . $search . '%');
                                $query->orWhere('description', 'LIKE', '%' . $search . '%');
                        });
                }
                if (!empty($country_ids)) {
                        $custom_jobs = $custom_jobs->where('country_id', $country_ids);
                }
                $today = date('Y-m-d');
                $custom_jobs = $custom_jobs->where('status', 1)
                        ->whereRaw("last_date > '$today'")
                        ->take(5)
                        ->orderBy('id', 'DESC')
                        ->get();
                //        ->toSql();

                //        $custom_jobs = json_decode(json_encode($custom_jobs),true);
                //        echo "<PRE>";print_r($custom_jobs);exit;

                // $q = $search;
                // $other_jobs = OtherWebsiteJob::where('title','LIKE','%'.$q.'%')
                //                                 ->orWhere('description','LIKE','%'.$q.'%')
                //                                 ->where()
                //                                 ->take(5)
                //                                 ->orderBy('id', 'DESC')
                //                                 ->get();

                return view('job.list')
                        ->with('custom_jobs', $custom_jobs)
                        ->with('other_jobs', $other_jobs)
                        ->with('functionalAreas', $this->functionalAreas)
                        ->with('countries', $this->countries)
                        ->with('currencies', array_unique($currencies))
                        ->with('jobs', $jobs)
                        ->with('jobTitlesArray', $jobTitlesArray)
                        ->with('skillIdsArray', $skillIdsArray)
                        ->with('countryIdsArray', $countryIdsArray)
                        ->with('stateIdsArray', $stateIdsArray)
                        ->with('cityIdsArray', $cityIdsArray)
                        ->with('companyIdsArray', $companyIdsArray)
                        ->with('industryIdsArray', $industryIdsArray)
                        ->with('functionalAreaIdsArray', $functionalAreaIdsArray)
                        ->with('careerLevelIdsArray', $careerLevelIdsArray)
                        ->with('jobTypeIdsArray', $jobTypeIdsArray)
                        ->with('jobShiftIdsArray', $jobShiftIdsArray)
                        ->with('genderIdsArray', $genderIdsArray)
                        ->with('degreeLevelIdsArray', $degreeLevelIdsArray)
                        ->with('jobExperienceIdsArray', $jobExperienceIdsArray)
                        ->with('country',$country)
                        ->with('seo', $seo);
        }


        public function otherJobDetail($mainId = '')
        {
                $getTitle = OtherWebsiteJob::where('id', $mainId)->first();
                $title = $getTitle->title;
                $other_job_details = OtherWebsiteJob::where('id', '!=', $mainId)->where('title', 'LIKE', '%' . $title . '%')->orWhere('description', 'LIKE', '%' . $title . '%')->orderBy('id', 'DESC')->get();

                return view('job.other-list')
                        ->with('getTitle', $getTitle)
                        ->with('other_job_details', $other_job_details);
        }
        public function otherJobDetailcountry($mainId = '' , $slug)
        {
                $country=Country::where('slug',$slug)->first();
                $getTitle = OtherWebsiteJob::where(['id'=> $mainId,'country_id'=>$country->id])->first();
               
                $title = $getTitle->title;
                $metatitle="Other Website Jobs In " .$country->country;
                $seo = (object) array(
                        'seo_title' => $metatitle,
                        'seo_description' => $metatitle,
                        'seo_keywords' => $metatitle,
                        'seo_other' => ''
                );
                $other_job_details = OtherWebsiteJob::where('id', '!=', $mainId)->where('title', 'LIKE', '%' . $title . '%')->orWhere('description', 'LIKE', '%' . $title . '%')->orWhere('country_id',$country->id)->orderBy('id', 'DESC')->get();
                return view('job.other-list',compact('getTitle','other_job_details','country','seo'));
        }

        public function jobDetail(Request $request, $job_slug)
        {

                $job = Job::where('slug', 'like', $job_slug)->firstOrFail();

                //        $job = json_decode(json_encode($job),true);
                //        echo "<PRE>";print_r($job);exit;

                /*         * ************************************************** */
                $search = '';
                $job_titles = array();
                $company_ids = array();
                $industry_ids = array();
                $job_skill_ids = (array) $job->getJobSkillsArray();
                $functional_area_ids = (array) $job->getFunctionalArea('functional_area_id');
                $country_ids = (array) $job->getCountry('country_id');
                $state_ids = (array) $job->getState('state_id');
                $city_ids = (array) $job->getCity('city_id');
                $is_freelance = $job->is_freelance;
                $career_level_ids = (array) $job->getCareerLevel('career_level_id');
                $job_type_ids = (array) $job->getJobType('job_type_id');
                $job_shift_ids = (array) $job->getJobShift('job_shift_id');
                $gender_ids = (array) $job->getGender('gender_id');
                $degree_level_ids = (array) $job->getDegreeLevel('degree_level_id');
                $job_experience_ids = (array) $job->getJobExperience('job_experience_id');
                $salary_from = 0;
                $salary_to = 0;
                $salary_currency = '';
                $is_featured = 2;
                $order_by = 'id';
                $limit = 5;

                //        echo "<PRE>";print_r($country_ids);exit;

                $relatedJobs = $this->fetchJobs(
                        $search,
                        $job_titles,
                        $company_ids,
                        $industry_ids,
                        $job_skill_ids,
                        //            $functional_area_ids,
                        //            $country_ids,
                        //            $state_ids,
                        //            $city_ids,
                        //            $is_freelance,
                        //            $career_level_ids,
                        //            $job_type_ids,
                        //            $job_shift_ids,
                        //            $gender_ids,
                        //            $degree_level_ids,
                        //            $job_experience_ids,
                        //            $salary_from,
                        //            $salary_to,
                        //            $salary_currency,
                        //            $is_featured,
                        //            $order_by,
                        $limit
                );

                //        echo "<PRE>";print_r($relatedJobs);exit;


                /*         * ***************************************** */

                $seoArray = $this->getSEO((array) $job->functional_area_id, (array) $job->country_id, (array) $job->state_id, (array) $job->city_id, (array) $job->career_level_id, (array) $job->job_type_id, (array) $job->job_shift_id, (array) $job->gender_id, (array) $job->degree_level_id, (array) $job->job_experience_id);
                /*         * ************************************************** */
                $seo = (object) array(
                        'seo_title' => $job->title,
                        'seo_description' => $seoArray['description'],
                        'seo_keywords' => $seoArray['keywords'],
                        'seo_other' => ''
                );
                return view('job.detail')
                        ->with('job', $job)
                        ->with('relatedJobs', $relatedJobs)
                        ->with('seo', $seo);
        }
        public function jobDetailcountrybase(Request $request, $job_slug , $slug1)
        {
                $country=Country::where('slug',$slug1)->first();
                $job = Job::where(['slug'=>$job_slug,'country_id'=>$country->id])->firstOrFail();

                //        $job = json_decode(json_encode($job),true);
                //        echo "<PRE>";print_r($job);exit;

                /*         * ************************************************** */
                $search = '';
                $job_titles = array();
                $company_ids = array();
                $industry_ids = array();
                $job_skill_ids = (array) $job->getJobSkillsArray();
                $functional_area_ids = (array) $job->getFunctionalArea('functional_area_id');
                $country_ids = (array) $job->getCountry('country_id');
                $state_ids = (array) $job->getState('state_id');
                $city_ids = (array) $job->getCity('city_id');
                $is_freelance = $job->is_freelance;
                $career_level_ids = (array) $job->getCareerLevel('career_level_id');
                $job_type_ids = (array) $job->getJobType('job_type_id');
                $job_shift_ids = (array) $job->getJobShift('job_shift_id');
                $gender_ids = (array) $job->getGender('gender_id');
                $degree_level_ids = (array) $job->getDegreeLevel('degree_level_id');
                $job_experience_ids = (array) $job->getJobExperience('job_experience_id');
                $salary_from = 0;
                $salary_to = 0;
                $salary_currency = '';
                $is_featured = 2;
                $order_by = 'id';
                $limit = 5;

                //        echo "<PRE>";print_r($country_ids);exit;

                $relatedJobs = $this->fetchJobs(
                        $search,
                        $job_titles,
                        $company_ids,
                        $industry_ids,
                        $job_skill_ids,
                        //            $functional_area_ids,
                        //            $country_ids,
                        //            $state_ids,
                        //            $city_ids,
                        //            $is_freelance,
                        //            $career_level_ids,
                        //            $job_type_ids,
                        //            $job_shift_ids,
                        //            $gender_ids,
                        //            $degree_level_ids,
                        //            $job_experience_ids,
                        //            $salary_from,
                        //            $salary_to,
                        //            $salary_currency,
                        //            $is_featured,
                        //            $order_by,
                        $limit
                );
              
                

                //        echo "<PRE>";print_r($relatedJobs);exit;


                /*         * ***************************************** */

                $seoArray = $this->getSEO((array) $job->functional_area_id, (array) $job->country_id, (array) $job->state_id, (array) $job->city_id, (array) $job->career_level_id, (array) $job->job_type_id, (array) $job->job_shift_id, (array) $job->gender_id, (array) $job->degree_level_id, (array) $job->job_experience_id);
                /*         * ************************************************** */
                $seo = (object) array(
                        'seo_title' => $job->title,
                        'seo_description' => $seoArray['description'],
                        'seo_keywords' => $seoArray['keywords'],
                        'seo_other' => ''
                );
                return view('job.detail',get_defined_vars());
        }

        /*     * ************************************************** */

        public function addToFavouriteJob(Request $request, $job_slug)
        {
                $data['job_slug'] = $job_slug;
                $data['user_id'] = Auth::user()->id;
                $data_save = FavouriteJob::create($data);
                flash(__('Job has been added in favorites list'))->success();
                return \Redirect::route('job.detail', $job_slug);
        }

        public function removeFromFavouriteJob(Request $request, $job_slug)
        {
                $user_id = Auth::user()->id;
                FavouriteJob::where('job_slug', 'like', $job_slug)->where('user_id', $user_id)->delete();

                flash(__('Job has been removed from favorites list'))->success();
                return \Redirect::route('job.detail', $job_slug);
        }

        public function applyJob(Request $request, $job_slug)
        {
                $user = Auth::user();
                $job = Job::where('slug', 'like', $job_slug)->first();

                if ((bool)$user->is_active === false) {
                        flash(__('Your account is inactive contact site admin to activate it'))->error();
                        return \Redirect::route('job.detail', $job_slug);
                        exit;
                }

                if ((bool) config('jobseeker.is_jobseeker_package_active')) {
                        if (
                                ($user->jobs_quota <= $user->availed_jobs_quota) ||
                                ($user->package_end_date->lt(Carbon::now()))
                        ) {
                                flash(__('Please subscribe to package first'))->error();
                                return \Redirect::route('home');
                                exit;
                        }
                }
                if ($user->isAppliedOnJob($job->id)) {
                        flash(__('You have already applied for this job'))->success();
                        return \Redirect::route('job.detail', $job_slug);
                        exit;
                }



                $myCvs = ProfileCv::where('user_id', '=', $user->id)->pluck('title', 'id')->toArray();

                return view('job.apply_job_form')
                        ->with('job_slug', $job_slug)
                        ->with('job', $job)
                        ->with('myCvs', $myCvs);
        }

        public function postApplyJob(ApplyJobFormRequest $request, $job_slug)
        {
                $user = Auth::user();
                $user_id = $user->id;
                $job = Job::where('slug', 'like', $job_slug)->first();

                $jobApply = new JobApply();
                $jobApply->user_id = $user_id;
                $jobApply->job_id = $job->id;
                $jobApply->cv_id = $request->post('cv_id');
                $jobApply->current_salary = $request->post('current_salary');
                $jobApply->expected_salary = $request->post('expected_salary');
                $jobApply->salary_currency = $request->post('salary_currency');
                $jobApply->save();

                /*         * ******************************* */
                if ((bool) config('jobseeker.is_jobseeker_package_active')) {
                        $user->availed_jobs_quota = $user->availed_jobs_quota + 1;
                        $user->update();
                }
                /*         * ******************************* */
                event(new JobApplied($job, $jobApply));

                flash(__('You have successfully applied for this job'))->success();
                return \Redirect::route('job.detail', $job_slug);
        }

        public function myJobApplications(Request $request)
        {
                $myAppliedJobIds = Auth::user()->getAppliedJobIdsArray();
                $jobs = Job::whereIn('id', $myAppliedJobIds)->paginate(10);
                return view('job.my_applied_jobs')
                        ->with('jobs', $jobs);
        }

        public function myFavouriteJobs(Request $request)
        {
                $myFavouriteJobSlugs = Auth::user()->getFavouriteJobSlugsArray();
                $jobs = Job::whereIn('slug', $myFavouriteJobSlugs)->paginate(10);
                return view('job.my_favourite_jobs')
                        ->with('jobs', $jobs);
        }

        // this function is to compensate the wrong implimentation for filters AND search terms (in Footer and search)
        /** 
         * @parameter: string|array
         * @description: check if parameter is set, if not an array convert to array, otherwise return parameter as is
         * @retrun: array|mix(parameter type)
         */
        private function determineArray($variable)
        {
                if (isset($variable) && !is_array($variable)) {
                        return [$variable];
                }
                return $variable;
        }
}
