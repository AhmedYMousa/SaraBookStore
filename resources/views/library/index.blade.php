@extends('layouts.app')
@section('content')
	<div class="jumbotron">
		<div class="container">
		<h1>We have what you look For</h1>
		<p>Knowledge is power and with power comes great resposibility</p>
		<a href="" class="btn btn-success">Learn more</a>
		</div>
	</div>	
	
	<div class="container">
	<div class="row">
	@foreach($book as $post)	
		<div class="col-md-4">
			<div class="thumbnail">
				<img  class="img-rounded" src="{{'images/'.$post->image_path}}">
				<div class="caption text-center">
				<h3>{{$post->title}}</h3>
				<p>Category: {{$post->category}}</p>
				<p>Year: {{$post->year}}</p>
				<p>
					<a href="{{url('/library/'.$post->id)}}" class="btn btn-primary">Book details</a>
				</p>
				</div>
				
			</div>
		</div>

	@endforeach	
		<div class="text-center">
		{{$book->links()}}
		</div>
		<!-- <div class="col-md-4">
			<div class="thumbnail">
				<img src="images/html.jpg">
				<div class="caption text-center">
				<h3>HTML 5</h3>
				<p>HTML is really easy to learn</p>
				<p>
					<a href="" class="btn btn-primary">Click here to Download</a>
				</p>
				</div>
			</div>
		</div>

		<div class="col-md-4">
			<div class="thumbnail">
				<img src="images/javascript.jpg" width="350" height="218">
				<div class="caption text-center">
				<h3>JavaScript</h3>
				<p>JS is like battries to a car</p>
				<p>
					<a href="" class="btn btn-primary">Click here to Download</a>
				</p>
				</div>
			</div>
		</div> -->
	</div>
	</div>
@stop