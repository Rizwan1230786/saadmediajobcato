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
                <li> <span>Other Website Jobs</span> </li>
            </ul>
        </div>
        <!-- END PAGE BAR --> 
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title">Manage Jobs <small>Other Website Jobs</small> </h3>
        <!-- END PAGE TITLE--> 
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12"> 
                <!-- Begin: life time stats -->
                <div class="portlet light portlet-fit portlet-datatable bordered">
                    <div class="portlet-title">
                        <div class="caption"> <i class="icon-settings font-dark"></i> <span class="caption-subject font-dark sbold uppercase">Other Website Jobs</span> </div>
                        <div class="actions"> <a href="{{ route('create.other.website.job') }}" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-plus"></i> Add New Other Job</a> </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-container">
                            <form method="post" role="form" id="job-search-form">
                                <table class="table table-striped table-bordered table-hover" id="example">
                                    <thead>
                                        
                                        <tr role="row" class="heading">
                                            <th>Title</th>
                                            <th>Company</th>
                                            <th>Logo</th>
                                            <th>Apply Before</th>
                                            <th>URL</th>
                                            <th>Location</th>
                                            <th>Details</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($other_jobs as $other)
                                         <tr>
                                            <td>{{$other->title}}</td>
                                            <td>{{$other->company_name}}</td>
                                            <td>{{ ImgUploader::print_image("other_jobs/$other->logo", 70, 70) }}</td>
                                            <td>{{$other->apply_before}}</td>
                                            <td><a href="{{$other->url}}" target="_blank">Link</a></td>
                                            <td>{{!empty($countries[$other->country_id]) ? $countries[$other->country_id] : 'N/A'}}</td>
                                            <td title="{{strip_tags($other->description)}}">{{strip_tags(substr($other->description, 0, 50))}} ....</td>
                                            <td>

                                                <div class="btn-group">
                                                <button class="btn blue dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Action
                                                    <i class="fa fa-angle-down"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                   
                                                    <li>
            <a href="{{route('edit.other.job', [$other->id])}}"><i class="fa fa-pencil" aria-hidden="true"></i>Edit</a>
                                                    </li>                       
                                                    <li>
             <a href="javascript:void(0);" onclick="deleteJob({{$other->id}});" class=""><i class="fa fa-trash-o" aria-hidden="true"></i>Delete</a>
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
            $.post("{{ route('delete.other.job') }}", {id: id, _method: 'DELETE', _token: '{{ csrf_token() }}'})
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