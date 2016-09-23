@extends('main')
@section('title','Create New Tag')
@section('content')
@section('stylesheets')
	<style type="text/css">
		h2
		{
			color:white;		
	    }
	    tr:nth-child(even)
	    {
	    	color:red;
	    }
	    tr:nth-child(odd)
	    {
	    	color:blue;
	    }
	    th
	    {
	    	text-align: center;
	    }

	</style>
@endsection

	<div class="container">
		@if(Session::has('message'))
			<p class="alert alert-success">{{Session::get('message')}}</p>
		@endif
		<div class="row">
			<div class="col-md-5 col-md-offset-1">
				<table class="table table-bordered table-striped text-center">
					<thead>
						<th >#</th>
						<th >Name</th>
					</thead>
					<tbody>
						@foreach($tags as $tag)
						<tr>
							<td >{{$tag->id}}</td>
							<td >{{$tag->name}}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<div class="col-md-4 ">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h4>Create New Tag</h4>				
					</div>
					<div class="panel-body">
						<form method="POST" action="{{url('/tag')}}" class="horizontal-form">
							{{csrf_field()}}
							<div class="form-group{{$errors->has('name') ? 'has-error':''}}">
								<label class="control-label">Name:</label>
								<input type="text" name="name" class="form-control">
								 @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
							</div>

							<div class="form-group">
								<input type="submit" name="submit" class="btn btn-info" value="Create">
							</div>

							
						</form>
							
					</div>
				</div>	
			</div>	
		</div>


	</div>


@endsection