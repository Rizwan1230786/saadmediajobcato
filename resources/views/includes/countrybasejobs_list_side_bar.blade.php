<div class="col-md-3 col-sm-6">
    <div class="jobreqbtn">
    @if (Request::get('search') != '' || Request::get('functional_area_id') != '' || Request::get('country_id') != ''|| Request::get('state_id') != '' || Request::get('city_id') != ''|| Request::get('city_id') != '')
        <!-- <a class="btn btn-job-alert" href="javascript:;">
		<i class="fa fa-bell" style="font-size:1.125rem;"></i> {{__('Save Job Alert')}} </a> -->
    @else
        <!-- <a class="btn btn-job-alert-disabled" disabled href="javascript:;">
		<i class="fa fa-bell" style="font-size:1.125rem;"></i> {{__('Save Job Alert')}}</a> -->
        @endif


        @if(Auth::guard('company')->check())
            <a href="{{ route('post.job') }}" class="btn"><i class="fa fa-file-text" aria-hidden="true"></i> {{__('Post Job')}}</a>
        @else
            <a href="{{url('my-profile#cvs')}}" class="btn"><i class="fa fa-file-text" aria-hidden="true"></i> {{__('Upload Your Resume')}}</a>
        @endif
    </div>
    <!-- Side Bar start -->
    <div class="sidebar">
        <input type="hidden" name="search" value="{{Request::get('search', '')}}"/>
    @php $check_filters_available = false @endphp

    {{-- @if(isset($jobTitlesArray) && count($jobTitlesArray))
        @php $check_filters_available = true @endphp
        <!-- Jobs By Title -->
            <div class="widget">
                <h4 class="widget-title">{{__('Jobs By Title')}}</h4>
                <ul class="optionlist view_more_ul">
                    @foreach($jobTitlesArray as $key=>$jobTitle)
                        <li>
                            @php
                                $checked = (in_array($jobTitle, Request::get('job_title', array())))? 'checked="checked"':'';
                            @endphp
                            <input type="checkbox" class="job_title_filter" name="job_title[]" id="job_title_{{$key}}" value="{{$jobTitle}}" {{$checked}} >
                            <label for="job_title_{{$key}}"></label>
                            {{$jobTitle}} <span>{{App\Job::countNumJobs('title', $jobTitle)}}</span> </li>

                    @endforeach
                </ul>
                <!-- title end -->
                <span class="text text-primary view_more hide_vm">{{__('View More')}}</span>
                <button type="button" class="btn btn-sm btn-danger reset-btn" data-target=".job_title_filter" data-type="checkbox">Reset</button>
            </div>
    @endif --}}

    {{-- @if(isset($countryIdsArray) && count($countryIdsArray))
        @php $check_filters_available = true @endphp
        <!-- Jobs By Country -->
            <div class="widget">
                <h4 class="widget-title">{{__('Jobs By Country')}}</h4>
                <ul class="optionlist view_more_ul">
                    @foreach($countryIdsArray as $key=>$country_id)
                        @php
                            $country = App\Country::where('country_id','=',$country_id)->lang()->active()->first();
                        @endphp
                        @if(null !== $country)
                            @php
                                $checked = (in_array($country->country_id, Request::get('country_id', array())))? 'checked="checked"':'';
                            @endphp
                            <li>
                                <input type="checkbox" class="country_filter" name="country_id[]" id="country_{{$country->country_id}}" value="{{$country->country_id}}" {{$checked}}>
                                <label for="country_{{$country->country_id}}"></label>
                                {{$country->country}} <span>{{App\Job::countNumJobs('country_id', $country->country_id)}}</span>
                            </li>
                        @endif
                    @endforeach
                </ul>
                <span class="text text-primary view_more hide_vm">{{__('View More')}}</span>
                <button type="button" class="btn btn-sm btn-danger reset-btn" data-target=".country_filter" data-type="checkbox">Reset</button>
            </div>
            <!-- Jobs By Country end-->
    @endif --}}



    @if(isset($stateIdsArray) && count($stateIdsArray))
        @php $check_filters_available = true @endphp
        <!-- Jobs By State -->
            <div class="widget">
                <h4 class="widget-title">{{__('Jobs By State')}}</h4>
                <ul class="optionlist view_more_ul">
                    @foreach($stateIdsArray as $key=>$state_id)
                        @php
                            $state = App\State::where('state_id','=',$state_id->id)->lang()->active()->first();
                        @endphp
                        @if(null !== $state)
                            @php
                                $checked = (in_array($state->state_id, Request::get('state_id', array())))? 'checked="checked"':'';
                            @endphp
                            <li>
                                <input type="checkbox" class="state_filter" name="state_id[]" id="state_{{$state->state_id}}" value="{{$state->state_id}}" {{$checked}}>
                                <label for="state_{{$state->state_id}}"></label>
                                {{$state->state}} <span>{{App\Job::countNumJobs('state_id', $state->state_id)}}</span>
                            </li>
                        @endif
                    @endforeach
                </ul>
                <span class="text text-primary view_more hide_vm">{{__('View More')}}</span>
                <button type="button" class="btn btn-sm btn-danger reset-btn" data-target=".state_filter" data-type="checkbox">Reset</button>
            </div>
            <!-- Jobs By State end-->
    @endif


    @if(isset($cityIdsArray) && count($cityIdsArray))
        @php $check_filters_available = true @endphp
        <!-- Jobs By City -->
            <div class="widget">
                <h4 class="widget-title">{{__('Jobs By City')}}</h4>
                <ul class="optionlist view_more_ul">
                    @foreach($cityIdsArray as $key=>$city_id)
                        @php
                            $city = App\City::where('city_id','=',$city_id)->lang()->active()->first();
                        @endphp
                        @if(null !== $city)
                            @php
                                $checked = (in_array($city->city_id, Request::get('city_id', array())))? 'checked="checked"':'';
                            @endphp
                            <li>
                                <input type="checkbox" class="city_filter" name="city_id[]" id="city_{{$city->city_id}}" value="{{$city->city_id}}" {{$checked}}>
                                <label for="city_{{$city->city_id}}"></label>
                                {{$city->city}} <span>{{App\Job::countNumJobs('city_id', $city->city_id)}}</span>
                            </li>
                        @endif
                    @endforeach
                </ul>
                <span class="text text-primary view_more hide_vm">{{__('View More')}}</span>
                <button type="button" class="btn btn-sm btn-danger reset-btn" data-target=".city_filter" data-type="checkbox">Reset</button>
            </div>
            <!-- Jobs By City end-->
    @endif

    @if(isset($jobExperienceIdsArray) && count($jobExperienceIdsArray))
        @php $check_filters_available = true @endphp
        <!-- Jobs By Experience -->
            <div class="widget">
                <h4 class="widget-title">{{__('Jobs By Experience')}}</h4>
                <ul class="optionlist view_more_ul">
                    @foreach($jobExperienceIdsArray as $key=>$job_experience_id)
                        @php
                            $jobExperience = App\JobExperience::where('job_experience_id','=',$job_experience_id)->lang()->active()->first();
                        @endphp
                        @if(null !== $jobExperience)
                            @php
                                $checked = (in_array($jobExperience->job_experience_id, Request::get('job_experience_id', array())))? 'checked="checked"':'';
                            @endphp
                            <li>
                                <input type="checkbox" class="job_experience_filter" name="job_experience_id[]" id="job_experience_{{$jobExperience->job_experience_id}}" value="{{$jobExperience->job_experience_id}}" {{$checked}}>
                                <label for="job_experience_{{$jobExperience->job_experience_id}}"></label>
                                {{$jobExperience->job_experience}} <span>{{App\Job::countNumJobs('job_experience_id', $jobExperience->job_experience_id)}}</span>
                            </li>
                        @endif
                    @endforeach
                </ul>
                <span class="text text-primary view_more hide_vm">{{__('View More')}}</span>
                <button type="button" class="btn btn-sm btn-danger reset-btn" data-target=".job_experience_filter" data-type="checkbox">Reset</button>
            </div>
            <!-- Jobs By Experience end -->
    @endif

    @if(isset($jobTypeIdsArray) && count($jobTypeIdsArray))
        @php $check_filters_available = true @endphp
        <!-- Jobs By Job Type -->
            <div class="widget">
                <h4 class="widget-title">{{__('Jobs By Job Type')}}</h4>
                <ul class="optionlist view_more_ul">
                    @foreach($jobTypeIdsArray as $key=>$job_type_id)
                        @php
                            $jobType = App\JobType::where('job_type_id','=',$job_type_id)->lang()->active()->first();
                        @endphp
                        @if(null !== $jobType)
                            @php
                                $checked = (in_array($jobType->job_type_id, Request::get('job_type_id', array())))? 'checked="checked"':'';
                            @endphp
                            <li>
                                <input type="checkbox" class="job_type_filter" name="job_type_id[]" id="job_type_{{$jobType->job_type_id}}" value="{{$jobType->job_type_id}}" {{$checked}}>
                                <label for="job_type_{{$jobType->job_type_id}}"></label>
                                {{$jobType->job_type}} <span>{{App\Job::countNumJobs('job_type_id', $jobType->job_type_id)}}</span>
                            </li>
                        @endif
                    @endforeach
                </ul>
                <span class="text text-primary view_more hide_vm">{{__('View More')}}</span>
                <button type="button" class="btn btn-sm btn-danger reset-btn" data-target=".job_type_filter" data-type="checkbox">Reset</button>
            </div>
            <!-- Jobs By Job Type end -->
    @endif

    @if(isset($jobShiftIdsArray) && count($jobShiftIdsArray))
        @php $check_filters_available = true @endphp
        <!-- Jobs By Job Shift -->
            <div class="widget">
                <h4 class="widget-title">{{__('Jobs By Job Shift')}}</h4>
                <ul class="optionlist view_more_ul">
                    @foreach($jobShiftIdsArray as $key=>$job_shift_id)
                        @php
                            $jobShift = App\JobShift::where('job_shift_id','=',$job_shift_id)->lang()->active()->first();
                        @endphp
                        @if(null !== $jobShift)
                            @php
                                $checked = (in_array($jobShift->job_shift_id, Request::get('job_shift_id', array())))? 'checked="checked"':'';
                            @endphp
                            <li>
                                <input type="checkbox" class="job_shift_filter" name="job_shift_id[]" id="job_shift_{{$jobShift->job_shift_id}}" value="{{$jobShift->job_shift_id}}" {{$checked}}>
                                <label for="job_shift_{{$jobShift->job_shift_id}}"></label>
                                {{$jobShift->job_shift}} <span>{{App\Job::countNumJobs('job_shift_id', $jobShift->job_shift_id)}}</span>
                            </li>
                        @endif
                    @endforeach
                </ul>
                <span class="text text-primary view_more hide_vm">{{__('View More')}}</span>
                <button type="button" class="btn btn-sm btn-danger reset-btn" data-target=".job_shift_filter" data-type="checkbox">Reset</button>
            </div>
            <!-- Jobs By Job Shift end -->
    @endif

    @if(isset($careerLevelIdsArray) && count($careerLevelIdsArray))
        @php $check_filters_available = true @endphp
        <!-- Jobs By Career Level -->
            <div class="widget">
                <h4 class="widget-title">{{__('Jobs By Career Level')}}</h4>
                <ul class="optionlist view_more_ul">
                    @foreach($careerLevelIdsArray as $key=>$career_level_id)
                        @php
                            $careerLevel = App\CareerLevel::where('career_level_id','=',$career_level_id)->lang()->active()->first();
                        @endphp
                        @if(null !== $careerLevel)
                            @php
                                $checked = (in_array($careerLevel->career_level_id, Request::get('career_level_id', array())))? 'checked="checked"':'';
                            @endphp
                            <li>
                                <input type="checkbox" class="career_level_filter" name="career_level_id[]" id="career_level_{{$careerLevel->career_level_id}}" value="{{$careerLevel->career_level_id}}" {{$checked}}>
                                <label for="career_level_{{$careerLevel->career_level_id}}"></label>
                                {{$careerLevel->career_level}} <span>{{App\Job::countNumJobs('career_level_id', $careerLevel->career_level_id)}}</span>
                            </li>
                        @endif
                    @endforeach
                </ul>
                <span class="text text-primary view_more hide_vm">{{__('View More')}}</span>
                <button type="button" class="btn btn-sm btn-danger reset-btn" data-target=".career_level_filter" data-type="checkbox">Reset</button>
            </div>
            <!-- Jobs By Career Level end -->
    @endif

    @if(isset($degreeLevelIdsArray) && count($degreeLevelIdsArray))
        @php $check_filters_available = true @endphp
        <!-- Jobs By Degree Level -->
            <div class="widget">
                <h4 class="widget-title">{{__('Jobs By Degree Level')}}</h4>
                <ul class="optionlist view_more_ul">
                    @foreach($degreeLevelIdsArray as $key=>$degree_level_id)
                        @php
                            $degreeLevel = App\DegreeLevel::where('degree_level_id','=',$degree_level_id)->lang()->active()->first();
                        @endphp
                        @if(null !== $degreeLevel)
                            @php
                                $checked = (in_array($degreeLevel->degree_level_id, Request::get('degree_level_id', array())))? 'checked="checked"':'';
                            @endphp
                            <li>
                                <input type="checkbox" class="degree_level_filter" name="degree_level_id[]" id="degree_level_{{$degreeLevel->degree_level_id}}" value="{{$degreeLevel->degree_level_id}}" {{$checked}}>
                                <label for="degree_level_{{$degreeLevel->degree_level_id}}"></label>
                                {{$degreeLevel->degree_level}} <span>{{App\Job::countNumJobs('degree_level_id', $degreeLevel->degree_level_id)}}</span>
                            </li>
                        @endif
                    @endforeach
                </ul>
                <span class="text text-primary view_more hide_vm">{{__('View More')}}</span>
                <button type="button" class="btn btn-sm btn-danger reset-btn" data-target=".degree_level_filter" data-type="checkbox">Reset</button>
            </div>
            <!-- Jobs By Degree Level end -->
    @endif

    @if(isset($genderIdsArray) && count($genderIdsArray))
        @php $check_filters_available = true @endphp
        <!-- Jobs By Gender -->
            <div class="widget">
                <h4 class="widget-title">{{__('Jobs By Gender')}}</h4>
                <ul class="optionlist view_more_ul">
                    @foreach($genderIdsArray as $key=>$gender_id)
                        @php
                            $gender = App\Gender::where('gender_id','=',$gender_id)->lang()->active()->first();
                        @endphp
                        @if(null !== $gender)
                            @php
                                $checked = (in_array($gender->gender_id, Request::get('gender_id', array())))? 'checked="checked"':'';
                            @endphp
                            <li>
                                <input type="checkbox" class="gender_filter" name="gender_id[]" id="gender_{{$gender->gender_id}}" value="{{$gender->gender_id}}" {{$checked}}>
                                <label for="gender_{{$gender->gender_id}}"></label>
                                {{$gender->gender}} <span>{{App\Job::countNumJobs('gender_id', $gender->gender_id)}}</span>
                            </li>
                        @endif
                    @endforeach
                </ul>
                <span class="text text-primary view_more hide_vm">{{__('View More')}}</span>
                <button type="button" class="btn btn-sm btn-danger reset-btn" data-target=".gender_filter" data-type="checkbox">Reset</button>
            </div>
            <!-- Jobs By Gender end -->
    @endif

    @if(isset($industryIdsArray) && count($industryIdsArray))
        @php $check_filters_available = true @endphp
        <!-- Jobs By Industry -->
            <div class="widget">
                <h4 class="widget-title">{{__('Jobs By Industry')}}</h4>
                <ul class="optionlist view_more_ul">
                    @foreach($industryIdsArray as $key=>$industry_id)
                        @php
                            $industry = App\Industry::where('id','=',$industry_id)->lang()->active()->first();
                        @endphp
                        @if(null !== $industry)
                            @php
                                $checked = (in_array($industry->id, Request::get('industry_id', array())))? 'checked="checked"':'';
                            @endphp
                            <li>
                                <input type="checkbox" class="job_industry_filter" name="industry_id[]" id="industry_{{$industry->id}}" value="{{$industry->id}}" {{$checked}}>
                                <label for="industry_{{$industry->id}}"></label>
                                {{$industry->industry}} <span>{{App\Job::countNumJobs('industry_id', $industry->id)}}</span>
                            </li>
                        @endif
                    @endforeach
                </ul>
                <span class="text text-primary view_more hide_vm">{{__('View More')}}</span>
                <button type="button" class="btn btn-sm btn-danger reset-btn" data-target=".job_industry_filter" data-type="checkbox">Reset</button>
            </div>
            <!-- Jobs By Industry end -->
    @endif

    @if(isset($skillIdsArray) && count($skillIdsArray))
        @php $check_filters_available = true @endphp
        <!-- Jobs By Skill -->
            <div class="widget">
                <h4 class="widget-title">{{__('Jobs By Skill')}}</h4>
                <ul class="optionlist view_more_ul">
                    @foreach($skillIdsArray as $key=>$job_skill_id)
                        @php
                            $jobSkill = App\JobSkill::where('job_skill_id','=',$job_skill_id)->lang()->active()->first();
                        @endphp
                        @if(null !== $jobSkill)
                            @php
                                $checked = (in_array($jobSkill->job_skill_id, Request::get('job_skill_id', array())))? 'checked="checked"':'';
                            @endphp
                            <li>
                                <input type="checkbox" class="job_skill_filter" name="job_skill_id[]" id="job_skill_{{$jobSkill->job_skill_id}}" value="{{$jobSkill->job_skill_id}}" {{$checked}}>
                                <label for="job_skill_{{$jobSkill->job_skill_id}}"></label>
                                {{$jobSkill->job_skill}} <span>{{App\Job::countNumJobs('job_skill_id', $jobSkill->job_skill_id)}}</span>
                            </li>
                        @endif
                    @endforeach
                </ul>
                <span class="text text-primary view_more hide_vm">{{__('View More')}}</span>
                <button type="button" class="btn btn-sm btn-danger reset-btn" data-target=".job_skill_filter" data-type="checkbox">Reset</button>
            </div>
            <!-- Jobs By Industry end -->
    @endif

    @if(isset($functionalAreaIdsArray) && count($functionalAreaIdsArray))
        @php $check_filters_available = true @endphp
        <!-- Jobs By Functional Area -->
            <div class="widget">
                <h4 class="widget-title">{{__('Jobs By Functional Areas')}}</h4>
                <ul class="optionlist view_more_ul">
                    @foreach($functionalAreaIdsArray as $key=>$functional_area_id)
                        @php
                            $functionalArea = App\FunctionalArea::where('functional_area_id','=',$functional_area_id)->lang()->active()->first();
                        @endphp
                        @if(null !== $functionalArea)
                            @php
                                $checked = ($functionalArea->functional_area_id=Request::get('functional_area_id')) ? 'checked="checked"':'';                            @endphp
                            <li>
                                <input type="checkbox" class="functional_area_filter" name="functional_area_id[]" id="functional_area_id_{{$functionalArea->functional_area_id}}" value="{{$functionalArea->functional_area_id}}" {{$checked}}>
                                <label for="functional_area_id_{{$functionalArea->functional_area_id}}"></label>
                                {{$functionalArea->functional_area}} <span>{{App\Job::countNumJobs('functional_area_id', $functionalArea->functional_area_id)}}</span>
                            </li>
                        @endif
                    @endforeach
                </ul>
                <!-- title end -->
                <span class="text text-primary view_more hide_vm">{{__('View More')}}</span>
                <button type="button" class="btn btn-sm btn-danger reset-btn" data-target=".functional_area_filter" data-type="checkbox">Reset</button>
            </div>
            <!-- Jobs By Functional Area end -->
    @endif

    @if(isset($companyIdsArray) && count($companyIdsArray))
        @php $check_filters_available = true @endphp
        <!-- Top Companies -->
            <div class="widget">
                <h4 class="widget-title">{{__('Jobs By Company')}}</h4>
                <ul class="optionlist view_more_ul">
                    @foreach($companyIdsArray as $key=>$company_id)
                        @php
                            $company = App\Company::where('id','=',$company_id)->active()->first();
                        @endphp
                        @if(null !== $company)
                            @php
                                $checked = (in_array($company->id, Request::get('company_id', array())))? 'checked="checked"':'';
                            @endphp
                            <li>
                                <input type="checkbox" class="company_filter" name="company_id[]" id="company_{{$company->id}}" value="{{$company->id}}" {{$checked}}>
                                <label for="company_{{$company->id}}"></label>
                                {{$company->name}} <span>{{App\Job::countNumJobs('company_id', $company->id)}}</span>
                            </li>
                        @endif
                    @endforeach
                </ul>
                <span class="text text-primary view_more hide_vm">{{__('View More')}}</span>
                <button type="button" class="btn btn-sm btn-danger reset-btn" data-target=".company_filter" data-type="checkbox">Reset</button>
            </div>
            <!-- Top Companies end -->
        @endif

        @if( !$check_filters_available)
            <div class="widget">
                <h4 class="widget-title">{{__('Filters Not Applicable')}}</h4>
            </div>
    @endif

    <!-- Salary -->
        <div class="widget">
            <h4 class="widget-title">{{__('Salary Range')}}</h4>
            <div class="form-group">
                {!! Form::number('salary_from', Request::get('salary_from', null), array('class'=>'form-control salary_range_filter', 'id'=>'salary_from', 'placeholder'=>__('Salary From'))) !!}
            </div>
            <div class="form-group">
                {!! Form::number('salary_to', Request::get('salary_to', null), array('class'=>'form-control salary_range_filter', 'id'=>'salary_to', 'placeholder'=>__('Salary To'))) !!}
            </div>
            <div class="form-group">
                {!! Form::select('salary_currency', ['' =>__('Select Salary Currency')]+$currencies, Request::get('salary_currency'), array('class'=>'form-control salary_range_filter', 'id'=>'salary_currency')) !!}
            </div>
            <!-- Salary end -->
            <button type="button" class="btn btn-sm btn-danger reset-btn" data-target=".salary_range_filter" data-type="number">Reset</button>
        </div>
        <!-- button -->
        <div class="searchnt">
            <button type="submit" class="btn"><i class="fa fa-search" aria-hidden="true"></i> {{__('Search Jobs')}}</button>
        </div>
        <!-- button end-->
        <!-- Side Bar end -->
    </div>
</div>

<style>
    .reset-btn{
        font-size: 10px;
    }
</style>
<script>
    let stateCheck = setInterval(() => {
        if (document.readyState === 'complete') {
            clearInterval(stateCheck);
            $(document).on('click', 'button.reset-btn', function(e){
                e.preventDefault();
                let form = $(this).closest("form");
                let inputs = $($(this).data('target'));
                let input_type = $(this).data('type');
                inputs.each(function(key, value){
                    if(input_type == 'checkbox'){
                        $(this).prop('checked', false);
                    }
                    else{
                        $(this).prop('value', '');
                    }
                }).promise().done(function(){
                    // form.submit();
                });
            });

        }
    }, 100);
</script>
