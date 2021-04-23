@extends('admin.layout.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>  </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="/configs" title="Go back"> <i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>

    <div class="row">
           
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Configuration Name:</strong>
				{{$config->config_name}}

            </div>
        </div>
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Configuration Value:</strong>
				{{$config->config_value}}

            </div>
        </div>
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Short Code:</strong>
				{{$config->short_code}}

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Created at:</strong>
				{{$config->created_at}}

            </div>
        </div>
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                 <strong>Updated at:</strong>
				{{$config->updated_at}}
            </div>
        </div>
    </div>
@endsection