@extends('layouts/app')
@section('content')
	<div class="container">
		<div class="row">
			<div class=" col-md-8 col-md-offset-2">
				<div class="panel panel-primary">
					<div class="panel-heading"><b>Add new Book</b></div>
						<div class="panel-body">
							<form method="POST" action="{{url('/library')}}" class="form-horizontal" file="true" enctype="multipart/form-data">
					<!-- You can this line to define csrf protectio or the following line both will give the same results	-->
							<!--<input type="hidden" name="_token" vale="{{csrf_token()}}">-->{{csrf_field()}}
								<div class="form-group">
									<label for="title" class="col-md-3 control-label">Title:</label>	
							<div class="col-md-9">	
								<input type="text" placeholder="Title" name="title" class="form-control">
							</div>
								</div>
						<div class="form-group">
							<label for="author" class="col-md-3 control-label">Author:</label>
								<div class="col-md-9">
							<input type="text" name="author" class="form-control" placeholder="Author">
						</div>
						</div>

						<div class="form-group">
							<label class="col-md-3 control-label" for="year">Published Year:</label>
							<div class="col-md-9">
								<input type="text" name="year" class="form-control" placeholder="Year">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-3 control-label" for="category">Category:</label>
							<div class="col-md-6">
								<select class="form-control" name="category">
									<option value="computer">Computer</option>
									<option value="science">Science</option>
									<option value="programming">Programming</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label for="cover" class="col-md-3 control-label">Book Cover:</label>
							<input type="file" name="book_cover" id="cover">
						    <p class="col-md-offset-3 help-block">Cover size 350x350</p>
						</div>

						<div class="form-group">
						<label for="cover" class="col-md-3 control-label">Upload File:</label>
						<input type="file" name="upload_book">
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-3">
						<input type="submit" class="btn btn-success form-control" value="Add Book">
						</div>
						</div>

						

							</form>
						</div>	

						@if($errors->count()>0)
		
			<ul class="alert alert-danger">
			@foreach ($errors->all() as $error)
			
			<li>{{$error}}</li>
			@endforeach
			</ul>
		
		@endif
				</div>
			</div>
		</div>
	</div>
	
@stop
