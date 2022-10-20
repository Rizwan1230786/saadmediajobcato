<div class="container-fluid">
    <div class="titleTop">
        <h3>Papular Jobs Locations</h3>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 mt-5">
                <p style="font-weight: bold; font-size:18px;">Popular Jobs in Cities</p>
                <hr>
                <div class="row">
                    @foreach ($state_base_city as $states)
                        @foreach ($states->cities->take(30) as $urlslugs)
                            <div class="col-md-4">
                                <ul>
                                    <li style="list-style: square;">
                                        <a style="color: black;"
                                            href="{{ url('/jobs' . '/' . $states->slug . '/' . $urlslugs->slug) }}">Search for jobs
                                            in {{ $urlslugs->city }}
                                        </a>
                                    </li>
                                </ul>
                                {{-- @if (isset($category) && !empty($category))
                                <a style="color: #338be7; margin-left: 38px;"
                                    href="{{ url('/all-city' . '/' . $category->name . '-all-property') }}">view
                                    all
                                    cities
                                </a>
                                 @endif --}}
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
