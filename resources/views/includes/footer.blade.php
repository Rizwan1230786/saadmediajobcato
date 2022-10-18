<!--Footer-->
<div class="largebanner shadow3">
<div class="adin">
{!! $siteSetting->above_footer_ad !!}
</div>
<div class="clearfix"></div>
</div>


<div class="footerWrap"> 
    <div class="container">
        <div class="row"> 

            <!--Quick Links-->
            <div class="col-md-3 col-sm-6">
                <h5>{{__('Quick Links')}}</h5>
                <!--Quick Links menu Start-->
                <ul class="quicklinks">
                    <li><a href="{{ route('index') }}">{{__('Home')}}</a></li>
                    <li><a href="{{ route('contact.us') }}">{{__('Contact Us')}}</a></li>
                    <li class="postad"><a href="{{ route('post.job') }}">{{__('Post a Job')}}</a></li>
                    <li><a href="{{ route('faq') }}">{{__('FAQs')}}</a></li>
                    <li><a href="{{ route('custom.jobs') }}">{{__('Custom Jobs')}}</a></li>
                    @foreach($show_in_footer_menu as $footer_menu)
                    @php
                    $cmsContent = App\CmsContent::getContentBySlug($footer_menu->page_slug);
                    @endphp

                    <li class="{{ Request::url() == route('cms', $footer_menu->page_slug) ? 'active' : '' }}"><a href="{{ route('cms', $footer_menu->page_slug) }}">{{ $cmsContent->page_title }}</a></li>
                    @endforeach
                </ul>
            </div>
            <!--Quick Links menu end-->

            <div class="col-md-3 col-sm-6">
                <h5>{{__('Jobs By Functional Area')}}</h5>
                <!--Quick Links menu Start-->
                <ul class="quicklinks">
                    @php
                    $functionalAreas = App\FunctionalArea::getUsingFunctionalAreas(10);
                    @endphp
                    @foreach($functionalAreas as $functionalArea)
                    <li><a href="{{ route('job.list', ['functional_area_id'=>$functionalArea->functional_area_id]) }}">{{$functionalArea->functional_area}}</a></li>
                    @endforeach
                </ul>
            </div>

            <!--Jobs By Industry-->
            <div class="col-md-3 col-sm-6">
                <h5>{{__('Jobs By Industry')}}</h5>
                <!--Industry menu Start-->
                <ul class="quicklinks">
                    @php
                    $industries = App\Industry::getUsingIndustries(10);
                    @endphp
                    @foreach($industries as $industry)
                    <li><a href="{{ route('job.list', ['industry_id'=>$industry->industry_id]) }}">{{$industry->industry}}</a></li>
                    @endforeach
                </ul>
                <!--Industry menu End-->
                <div class="clear"></div>
            </div>

            <!--About Us-->
            <div class="col-md-3 col-sm-12">
                <h5>{{__('Contact Us')}}</h5>
                <div class="address">{{ $siteSetting->site_street_address }}</div>
                <div class="email"> <a href="mailto:{{ $siteSetting->mail_to_address }}">{{ $siteSetting->mail_to_address }}</a> </div>
                <div class="phone"> <a href="tel:{{ $siteSetting->site_phone_primary }}">{{ $siteSetting->site_phone_primary }}</a></div>
                <!-- Social Icons -->
                <div class="social">@include('includes.footer_social')</div>
                <!-- Social Icons end --> 

            </div>
            <!--About us End--> 


        </div>
    </div>
</div>
<!--Footer end--> 
<!--Copyright-->
<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="bttxt">{{__('Copyright')}} &copy; {{date('Y')}} {{ $siteSetting->site_name }}. {{__('All Rights Reserved')}}.</div>
            </div>
            <div class="col-md-4">
                <!-- <div class="paylogos"><img src="{{asset('/')}}images/payment-icons.png" alt="" /></div>	 -->
            </div>
        </div>

    </div>
</div>
@push('scripts')
<script>
    $(document).ready(function(){
        if( !customCookie.get('_loc_info') ){
            $.getJSON("{{route('clientIP')}}", function(response){
                if(response.info){
                    let data = JSON.parse(response.info);
                    let cookie_value = {
                        city: data.city,
                        country: data.country_name,
                        state: data.region_name,
                        zip: data.zip,
                        flag: data.location.country_flag
                    };
                    customCookie.set('_loc_info', JSON.stringify(cookie_value), 1);
                }
            });    
        }
        
    });
    window.customCookie = {
        set: function(cookie_name, cookie_value, expiry_in_days) {
                var d = new Date();
                d.setTime(d.getTime() + (expiry_in_days*24*60*60*1000));
                var expires = "expires="+ d.toUTCString();
                document.cookie = cookie_name + "=" + cookie_value + ";" + expires + ";path=/";
            },
        get: function(cookie_name) {
            var cookie_nameEQ = cookie_name + "=";
            var ca = document.cookie.split(';');
            for(var i=0;i < ca.length;i++) {
                var c = ca[i];
                while (c.charAt(0)==' ') c = c.substring(1,c.length);
                if (c.indexOf(cookie_nameEQ) == 0) return c.substring(cookie_nameEQ.length,c.length);
                }
                return null;
            },
        remove: function(cookie_name) {
            document.cookie = cookie_name + "='', -1, path=/";
            }
    };
</script>
@endpush
