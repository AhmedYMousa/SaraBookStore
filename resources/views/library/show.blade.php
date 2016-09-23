@extends('main')
@section('title',$book->title.' By '.$book->author)
@section('content')
@section('stylesheets')
<style type="text/css">
	
	h3
	{
		color:blue;
	}
	.well p
	{
		display: inline;
		
	}
	.btn-del
	{
		position: relative;
		display: inline;
	}
	

</style>

@endsection

	<div class="container">
		<div class="row">
		<!-- Info and content section -->
			<div class="col-md-6 col-md-offset-1">
				<h2>{{$book->title}}</h2>
				<table class="table table-bordered table-stripped">
					<thead>
						<th>Title</th>
						<th>Author</th>
						<th>Category</th>
						<th>Published Year</th>
					</thead>
					<tbody>
						<tr>
						<td>{{$book->title}}</td>
						<td>{{$book->author}}</td>
						<td>{{$book->category->name}}</td>
						<td>{{$book->year}}</td>
						</tr>
					</tbody>
				</table>
				
				<div>
				<hr>
				<h3>Book Description</h3>		
				<p>	{!!$book->description!!}</p>
				</div>
				<hr>
				<div class="well">
				<p><i class="fa fa-tags"></i>Tags:</p>
				@foreach ($book->tags as $tag)
					<span class="label label-primary">{{ $tag->name }}</span>
				@endforeach
				</div>
				<!-- Edit & Delete section -->
				
				<div class="form-group">
					<a href="{{url('/library/'.$book->id.'/edit')}}" class="btn btn-info">Edit</a>
					<form method="POST" action="{{url('/library/'.$book->id)}}" class="btn-del">
						{{csrf_field()}}
						{{method_field('DELETE')}}
						<input type="submit" name="delete" value="Delete" class="btn btn-danger">
					</form>
				</div>
			</div>
		<!-- Cover and download link section -->
			<div class="col-md-4">
				<div class="thumbnail">
					<img src="{{asset('images/'.$book->image_path)}}">
					@if ($book->filename!=null)
					<h3 class="caption">Download Book</h3>
					<a href="{{url('file/'.$book->filename)}}" class="btn btn-success" >Download</a>
					@else
					<h3 class="caption">No link for this book</h3>
					@endif
				</div>

			</div>

		</div>


	</div>


@stop