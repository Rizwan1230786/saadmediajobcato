<?php

namespace App\Http\Controllers;

use Mail;
use View;
use DB;
use Auth;
use Input;
use Carbon\Carbon;
use Redirect;
use App\Seo;
use App\CustomJobs;
use App\Job;
use App\Company;
use App\ContactMessage;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\ReportAbuseMessage;
use App\ReportAbuseCompanyMessage;
use App\SendToFriendMessage;
use App\Mail\ContactUs;
use App\Mail\EmailToFriend;
use App\Mail\ReportAbuse;
use App\Mail\ReportAbuseCompany;
use App\Http\Requests\Front\ContactFormRequest;
use App\Http\Requests\Front\EmailToFriendFormRequest;
use App\Http\Requests\Front\ReportAbuseFormRequest;
use App\Http\Requests\Front\ReportAbuseCompanyFormRequest;
use App\Country;
use App\State;
use App\City;

class ContactController extends Controller
{

    public function index()
    {
        $seo = SEO::where('seo.page_title', 'like', 'contact')->first();
        return view('contact.contact_page')->with('seo', $seo);
    }

    public function showCustomJobs()
    {
        $custom_jobs = CustomJobs::where('status', 1)->orderBy('id', 'DESC')->get();
        return view('contact.custom_jobs')->with('custom_jobs', $custom_jobs);
    }

    public function customJobDetails($id='')
    {
        if (!empty($id)) {

            $custom_jobs = CustomJobs::where('id', $id)->first();

            $custom_jobs1 = json_decode(json_encode($custom_jobs),true);

//          echo "<PRE>";  print_r($custom_jobs1);

             $country_id = $custom_jobs1['country_id'];
             $state_id = $custom_jobs1['state_id'];
             $city_id = $custom_jobs1['city_id'];

//            echo "<PRE>";print_r($custom_jobs1);exit;


            $CountryDetail = Country::where('id', $country_id)->first();
//            $CountryDetail = json_decode(json_encode($CountryDetail),true);

//            echo "<PRE>";print_r($CountryDetail);exit;

            $StateDetail = State::where('id', $state_id)->first();
//            $StateDetail = json_decode(json_encode($StateDetail),true);

//            echo "<PRE>";print_r($StateDetail);exit;


            $CityDetail = City::where('id', $city_id)->first();
//            $CityDetail = json_decode(json_encode($CityDetail),true);

//            echo "<PRE>";print_r($CityDetail);exit;


            return view('contact.custom_jobs_details')->with(compact('custom_jobs','CountryDetail', 'StateDetail','CityDetail'));

        } else {

            $custom_jobs = CustomJobs::where('status', 1)->orderBy('id', 'DESC')->get();

            $custom_jobs1 = json_decode(json_encode($custom_jobs),true);

            $custom_jobs1 = json_decode(json_encode($custom_jobs),true);
//            print_r($custom_jobs1);

            $country_id = $custom_jobs1['country_id'];
            $state_id = $custom_jobs1['state_id'];
            $city_id = $custom_jobs1['city_id'];

//            echo "<PRE>";print_r($custom_jobs1);exit;


            $CountryDetail = Country::where('id', $country_id)->first();
            $CountryDetail = json_decode(json_encode($CountryDetail),true);

//            echo "<PRE>";print_r($CountryDetail);exit;

            $StateDetail = State::where('id', $state_id)->first();
            $StateDetail = json_decode(json_encode($StateDetail),true);

//            echo "<PRE>";print_r($StateDetail);exit;


            $CityDetail = City::where('id', $city_id)->first();
            $CityDetail = json_decode(json_encode($CityDetail),true);

//            echo "<PRE>";print_r($CityDetail);exit;




            return view('contact.custom_jobs')->with(compact('custom_jobs','CountryDetail', 'StateDetail','CityDetail'));
        }
    }

    public function postContact(ContactFormRequest $request)
    {
        $data['full_name'] = $request->input('full_name');
        $data['email'] = $request->input('email');
        $data['phone'] = $request->input('phone');
        $data['subject'] = $request->input('subject');
        $data['message_txt'] = $request->input('message_txt');
        $msg_save = ContactMessage::create($data);
        $when = Carbon::now()->addMinutes(5);
        Mail::send(new ContactUs($data));
        return Redirect::route('contact.us.thanks');
    }

    public function thanks()
    {
        $seo = SEO::where('seo.page_title', 'like', 'contact')->first();
        return view('contact.contact_page_thanks')->with('seo', $seo);
    }

    /*     * ******************************************************** */

    public function emailToFriend($slug)
    {
        $job = Job::where('slug', $slug)->first();
        $seo = SEO::where('seo.page_title', 'like', 'email_to_friend')->first();
        return view('contact.email_to_friend_page')->with('job', $job)->with('slug', $slug)->with('seo', $seo);
    }

    public function emailToFriendPost(EmailToFriendFormRequest $request, $slug)
    {
        $data['your_name'] = $request->input('your_name');
        $data['your_email'] = $request->input('your_email');
        $data['friend_name'] = $request->input('friend_name');
        $data['friend_email'] = $request->input('friend_email');
        $data['job_url'] = $request->input('job_url');
        $msg_save = SendToFriendMessage::create($data);
        $when = Carbon::now()->addMinutes(5);
        Mail::send(new EmailToFriend($data));
        return Redirect::route('email.to.friend.thanks');
    }

    public function emailToFriendThanks()
    {
        $seo = SEO::where('seo.page_title', 'like', 'email_to_friend')->first();
        return view('contact.email_to_friend_page_thanks')->with('seo', $seo);
    }

    /*     * ******************************************************** */

    public function reportAbuse($slug)
    {
        $job = Job::where('slug', $slug)->first();
        $seo = SEO::where('seo.page_title', 'like', 'report_abuse')->first();
        return view('contact.report_abuse_page')->with('job', $job)->with('slug', $slug)->with('seo', $seo);
    }

    public function reportAbusePost(ReportAbuseFormRequest $request, $slug)
    {
        $data['your_name'] = $request->input('your_name');
        $data['your_email'] = $request->input('your_email');
        $data['job_url'] = $request->input('job_url');
        $msg_save = ReportAbuseMessage::create($data);
        $when = Carbon::now()->addMinutes(5);
        Mail::send(new ReportAbuse($data));
        return Redirect::route('report.abuse.thanks');
    }

    public function reportAbuseThanks()
    {
        $seo = SEO::where('seo.page_title', 'like', 'report_abuse')->first();
        return view('contact.report_abuse_page_thanks')->with('seo', $seo);
    }

    /*     * ******************************************************** */

    public function reportAbuseCompany($slug)
    {
        $company = Company::where('slug', $slug)->first();
        $seo = SEO::where('seo.page_title', 'like', 'report_abuse')->first();
        return view('contact.report_abuse_company_page')->with('company', $company)->with('slug', $slug)->with('seo', $seo);
    }

    public function reportAbuseCompanyPost(ReportAbuseCompanyFormRequest $request, $slug)
    {
        $data['your_name'] = $request->input('your_name');
        $data['your_email'] = $request->input('your_email');
        $data['company_url'] = $request->input('company_url');
        $msg_save = ReportAbuseCompanyMessage::create($data);
        $when = Carbon::now()->addMinutes(5);
        Mail::send(new ReportAbuseCompany($data));
        return Redirect::route('report.abuse.company.thanks');
    }

    public function reportAbuseCompanyThanks()
    {
        $seo = SEO::where('seo.page_title', 'like', 'report_abuse')->first();
        return view('contact.report_abuse_company_page_thanks')->with('seo', $seo);
    }

}
