<div class="pageTitle">
    <div class="container">
        <div class="row">
            @if (!empty($country))
                <div class="col-md-6 col-sm-6">
                    <h1 class="page-heading">{{ $page_title }} in {{ $country->country }}</h1>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="breadCrumb"><a href="{{ route('index') }}">{{ __('Home') }}</a> /
                        <span>{{ $page_title }} in {{ $country->country }}</span>
                    </div>
                </div>
            @else
                <div class="col-md-6 col-sm-6">
                    <h1 class="page-heading">{{ $page_title }}</h1>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="breadCrumb"><a href="{{ route('index') }}">{{ __('Home') }}</a> /
                        <span>{{ $page_title }}</span>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
