@extends('admin.layouts.admin_layout')
@section('content')
<style type="text/css">
    .table td, .table th {
        font-size: 12px;
        line-height: 2.42857 !important;
    }	

</style>

<div class="page-content-wrapper"> 
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content"> 
        <!-- BEGIN PAGE HEADER--> 
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li> <a href="{{ route('admin.home') }}">Home</a> <i class="fa fa-circle"></i> </li>
                <li> <span>Jobs</span> </li>
            </ul>
        </div>
        <!-- END PAGE BAR --> 
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title">Manage Jobs <small>Admin Jobs</small> </h3>
        <!-- END PAGE TITLE--> 
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12"> 
                <!-- Begin: life time stats -->
                <div class="portlet light portlet-fit portlet-datatable bordered">
                    <div class="portlet-title">
                        <div class="caption"> <i class="icon-settings font-dark"></i> <span class="caption-subject font-dark sbold uppercase">Admin Jobs</span> </div>
                        <div class="actions"> <a href="{{ route('create.job') }}" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-plus"></i> Add New Job</a> </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-container">
                            <form method="post" role="form" id="job-search-form">
                                <table class="table table-striped table-bordered table-hover" id="example">
                                    <thead>
                                        
                                        <tr role="row" class="heading">
                                            <th>Company</th>
                                            <th>Job title</th>
                                            <th>Job description</th>
                                            <th>City</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($jobs as $job)
                                         <tr>
                                            <td>{{$job->company->name}}</td>
                                            <td>{{$job->title}}</td>
                                            <td>{{substr($job->description, 0, 30)}} ....</td>
                                            <td>{{$job->city->city}}</td>
                                            <td>

                                                <div class="btn-group">
                                                <button class="btn blue dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Action
                                                    <i class="fa fa-angle-down"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li>
            <a href="{{route('list.applied.users.back', [$job->id])}}"><i class="fa fa-eye" aria-hidden="true"></i>List Candidates</a>
                                                    </li>
                                                    <li>
            <a href="{{route('edit.job', [$job->id])}}"><i class="fa fa-pencil" aria-hidden="true"></i>Edit</a>
                                                    </li>                       
                                                    <li>
             <a href="javascript:void(0);" onclick="deleteJob({{$job->id}},{{$job->is_default}});" class=""><i class="fa fa-trash-o" aria-hidden="true"></i>Delete</a>
                                                    </li>
                                                                                                                                                                                        
                                                </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY --> 
</div>
@endsection
@push('scripts') 
<script>
    $(document).ready(function() {
    $('#example').DataTable();
    } );

    $(function () {
        var oTable = $('#jobDatatableAjax').DataTable({
            processing: true,
            serverSide: true,
            stateSave: true,
            searching: false,
            /*		
             "order": [[1, "asc"]],            
             paging: true,
             info: true,
             */
            ajax: {
                url: '{!! route('fetch.data.jobs') !!}',
                data: function (d) {
                    d.company_id = $('#company_id').val();
                    d.title = $('#title').val();
                    d.description = $('#description').val();
                    d.country_id = $('#country_id').val();
                    d.state_id = $('#state_id').val();
                    d.city_id = $('#city_id').val();
                    d.is_active = $('#is_active').val();
                    d.is_featured = $('#is_featured').val();
                }
            }, columns: [
                {data: 'company_id', name: 'company_id'},
                {data: 'title', name: 'title'},
                {data: 'description', name: 'description'},
                {data: 'city_id', name: 'city_id'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
        $('#job-search-form').on('submit', function (e) {
            oTable.draw();
            e.preventDefault();
        });
        $('#company_id').on('change', function (e) {
            oTable.draw();
            e.preventDefault();
        });
        $('#title').on('keyup', function (e) {
            oTable.draw();
            e.preventDefault();
        });
        $('#description').on('keyup', function (e) {
            oTable.draw();
            e.preventDefault();
        });
        $('#country_id').on('change', function (e) {
            oTable.draw();
            e.preventDefault();
            filterDefaultStates(0);
        });
        $(document).on('change', '#state_id', function (e) {
            oTable.draw();
            e.preventDefault();
            filterDefaultCities(0);
        });
        $(document).on('change', '#city_id', function (e) {
            oTable.draw();
            e.preventDefault();
        });
        $('#is_active').on('change', function (e) {
            oTable.draw();
            e.preventDefault();
        });
        $('#is_featured').on('change', function (e) {
            oTable.draw();
            e.preventDefault();
        });
        filterDefaultStates(0);
    });
    function deleteJob(id, is_default) {
        var msg = 'Are you sure?';
        if (confirm(msg)) {
            $.post("{{ route('delete.job') }}", {id: id, _method: 'DELETE', _token: '{{ csrf_token() }}'})
                    .done(function (response) {
                        if (response == 'ok')
                        {
                            alert('Success!');
                            location.reload();
                            // var table = $('#jobDatatableAjax').DataTable();
                            // table.row('jobDtRow' + id).remove().draw(false);
                        } else
                        {
                            alert('Request Failed!');
                        }
                    });
        }
    }
    function makeActive(id) {
        $.post("{{ route('make.active.job') }}", {id: id, _method: 'PUT', _token: '{{ csrf_token() }}'})
                .done(function (response) {
                    if (response == 'ok')
                    {
                        var table = $('#jobDatatableAjax').DataTable();
                        table.row('jobDtRow' + id).remove().draw(false);
                    } else
                    {
                        alert('Request Failed!');
                    }
                });
    }
    function makeNotActive(id) {
        $.post("{{ route('make.not.active.job') }}", {id: id, _method: 'PUT', _token: '{{ csrf_token() }}'})
                .done(function (response) {
                    if (response == 'ok')
                    {
                        var table = $('#jobDatatableAjax').DataTable();
                        table.row('jobDtRow' + id).remove().draw(false);
                    } else
                    {
                        alert('Request Failed!');
                    }
                });
    }
    function makeFeatured(id) {
        $.post("{{ route('make.featured.job') }}", {id: id, _method: 'PUT', _token: '{{ csrf_token() }}'})
                .done(function (response) {
                    if (response == 'ok')
                    {
                        var table = $('#jobDatatableAjax').DataTable();
                        table.row('jobDtRow' + id).remove().draw(false);
                    } else
                    {
                        alert('Request Failed!');
                    }
                });
    }
    function makeNotFeatured(id) {
        $.post("{{ route('make.not.featured.job') }}", {id: id, _method: 'PUT', _token: '{{ csrf_token() }}'})
                .done(function (response) {
                    if (response == 'ok')
                    {
                        var table = $('#jobDatatableAjax').DataTable();
                        table.row('jobDtRow' + id).remove().draw(false);
                    } else
                    {
                        alert('Request Failed!');
                    }
                });
    }
    function filterDefaultStates(state_id)
    {
        var country_id = $('#country_id').val();
        if (country_id != '') {
            $.post("{{ route('filter.default.states.dropdown') }}", {country_id: country_id, state_id: state_id, _method: 'POST', _token: '{{ csrf_token() }}'})
                    .done(function (response) {
                        $('#default_state_dd').html(response);
                    });
        }
    }
    function filterDefaultCities(city_id)
    {
        var state_id = $('#state_id').val();
        if (state_id != '') {
            $.post("{{ route('filter.default.cities.dropdown') }}", {state_id: state_id, city_id: city_id, _method: 'POST', _token: '{{ csrf_token() }}'})
                    .done(function (response) {
                        $('#default_city_dd').html(response);
                    });
        }
    }
</script>
@endpush