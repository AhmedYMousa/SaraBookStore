@extends('layouts.app')
@section('content')
		@if(Session::has('message'))
			<div class="alert alert-success">
		{{Session::get('message')}}
			</div>
		@endif
	<div class="jumbotron">
		<div class="container">
		<h1>Welcome to Sara BookStore</h1>
		<h3>We hope that you find what you're looking for</h3>
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
		
	</div>
	<div class="text-center">
		{{$book->links()}}
		</div>
	</div>
@stop