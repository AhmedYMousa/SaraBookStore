@extends('main')
@section('title','Homepage')
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
	@foreach($book->chunk(3) as $chunk)
	<div class="row">	
			@foreach($chunk as $product)
		<div class="col-md-4">
			<div class="thumbnail">
				<img  class="img-rounded " src="{{'images/'.$product->image_path}}">
				<div class="caption text-center">
				<h3>{{$product->title}}</h3>
				<p>Category: {{$product->category->name}}</p>
				<p>Year: {{$product->year}}</p>
				<p>
					<a href="{{url('/library/'.$product->id)}}" class="btn btn-primary">Book details</a>
				</p>
				</div>
				
			</div>
			</div>
			@endforeach
		</div>
	@endforeach	
	
	<div class="row">
		<div class="col-md-12">
			<div class="text-center">
				{!!$book->links()!!}
			</div>
		</div>
	</div>
</div>
@stop