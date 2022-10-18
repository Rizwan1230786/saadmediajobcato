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
                <li> <span>Custom Jobs</span> </li>
            </ul>
        </div>
        <!-- END PAGE BAR --> 
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title">Manage Jobs <small>Custom Jobs</small> </h3>
        <!-- END PAGE TITLE--> 
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12"> 
                <!-- Begin: life time stats -->
                <div class="portlet light portlet-fit portlet-datatable bordered">
                    <div class="portlet-title">
                        <div class="caption"> <i class="icon-settings font-dark"></i> <span class="caption-subject font-dark sbold uppercase">Csutom Jobs</span> </div>
                        <div class="actions"> <a href="{{ route('create.custom.job') }}" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-plus"></i> Add New Custom Job</a> </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-container">
                            <form method="post" role="form" id="job-search-form">
                                <table class="table table-striped table-bordered table-hover" id="example">
                                    <thead>
                                        
                                        <tr role="row" class="heading">
                                            <th>Title</th>
                                            <th>Location</th>
                                            <th>Pub. Date</th>
                                            <th>Last Date</th>
                                            <th>News Paper</th>
                                            <th>Details</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($custom_jobs as $custom)
                                         <tr>
                                            <td>{{substr($custom->title, 0, 40)}} ....</td>
                                            <td>{{!empty($countries[$custom->country_id]) ? $countries[$custom->country_id] : 'N/A'}}</td>
                                            <td>{{$custom->published_date}}</td>
                                            <td>{{$custom->last_date}}</td>
                                            <td>{{$custom->news_paper}}</td>
                                            <td>{{substr($custom->description, 0, 30)}} ....</td>
                                            <td>

                                                <div class="btn-group">
                                                <button class="btn blue dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Action
                                                    <i class="fa fa-angle-down"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li>
            <a target="_blank" href="{{url('custom_jobs/', $custom->image)}}"><i class="fa fa-eye" aria-hidden="true"></i>Attahment</a>
                                                    </li>
                                                    <li>
            <a href="{{route('edit.custom.job', [$custom->id])}}"><i class="fa fa-pencil" aria-hidden="true"></i>Edit</a>
                                                    </li>                       
                                                    <li>
             <a href="javascript:void(0);" onclick="deleteJob({{$custom->id}});" class=""><i class="fa fa-trash-o" aria-hidden="true"></i>Delete</a>
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
    function deleteJob(id) {
        var msg = 'Are you sure?';
        if (confirm(msg)) {
            $.post("{{ route('delete.custom.job') }}", {id: id, _method: 'DELETE', _token: '{{ csrf_token() }}'})
                    .done(function (response) {
                        if (response == 'ok')
                        {
                            alert('Success!');
                            location.reload();
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

    
   
</script>
@endpush