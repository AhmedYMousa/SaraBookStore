
		
<!-- You can this line to define csrf protectio or the following line both will give the same results	-->
		<!--<input type="hidden" name="_token" vale="{{csrf_token()}}">-->
		<div class="form-group">
				<label for="title" class="col-md-2 control-label">Title:</label>
			<div class="col-md-9">	
				<input type="text" value="{{old('title')}}" placeholder="Title" name="title" class="form-control">
			</div>
		</div>
		<div class="form-group">
				<label for="author" class="col-md-2 control-label">Author:</label>
			<div class="col-md-9">
				<input type="text" value="{{old('author')}}" name="author" class="form-control" placeholder="Author">
			</div>
		</div>

		<div class="form-group">
				<label class="col-md-2 control-label" for="year">Published Year:</label>
			<div class="col-md-9">
				<input type="text" name="year" class="form-control" placeholder="Year">
			</div>
		</div>

		<div class="form-group">
				<label class="col-md-2 control-label" for="category">Category:</label>
			<div class="col-md-6">
				<select class="form-control" name="category">
				<option value="">---------------</option>
				@foreach($categories as $category)
				<option value="{{$category->id}}">{{$category->name}}</option>
				@endforeach
				</select>
			</div>
		</div>

		<div class="form-group">
				<label class="col-md-2 control-label" for="tags">Tags</label>
			<div class="col-md-6">
				<select class="form-control select2-multi" name="tags[]" multiple="multiple">
				@foreach($tags as $tag)
					<option value="{{$tag->id}}">{{$tag->name}}</option>
				@endforeach
				</select>
			</div>
		</div>

		<div class="form-group">
				<label class=" col-md-2 control-label" for="description">Book Description:</label>
			<div class="col-md-9">
				<textarea name="description" class="form-control"></textarea> 
			</div>
		</div>	

	<div class="form-group">
		<label for="cover" class="col-md-2 control-label">Book Cover:</label>
		<div class="col-md-3">
		<input type="file" name="book_cover" id="cover">
	    <p class="help-block">Cover size 300x300</p>
	</div>
	</div>

	<div class="form-group">
	<label for="cover" class="col-md-2 control-label">Upload File:</label>
	<div class="col-md-3">
	<input type="file" name="upload_book">
	<p class=" help-block">Max file size : 10MB</p>
	</div>
	</div>

	<div class="form-group">
		<div class="col-md-6 col-md-offset-3">
		<input type="submit" class="btn btn-success form-control" value="Add Book">

	</div>
	</div>

	

	
	

	@if($errors->count()>0)

<ul class="alert alert-danger">
@foreach ($errors->all() as $error)

<li>{{$error}}</li>
@endforeach
</ul>

@endif
