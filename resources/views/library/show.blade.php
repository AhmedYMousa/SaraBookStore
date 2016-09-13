@extends('layouts.app')
@section('content')

	<div class="container">
		<div class="row">
		<!-- Info and content section -->
			<div class="col-md-4 col-md-offset-2">
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
						<td>{{$book->category}}</td>
						<td>{{$book->year}}</td>
						</tr>
					</tbody>
				</table>
			</div>
		<!-- Cover and download link section -->
			<div class="col-md-4">
				<div class="thumbnail">
					<img src="{{asset('images/'.$book->image_path)}}">
					<h3 class="caption">Download Book</h3>
					<a href="{{url('file/'.$book->filename)}}" class="btn btn-success" >Download</a>
				</div>

			</div>

		</div>


	</div>


@stop