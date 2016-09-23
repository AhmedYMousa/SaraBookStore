@extends('main')
@section('title','Edit book ')
@section('content')
@section('stylesheets')
	<link type="text/css" rel="stylesheet" href="/css/select2.min.css">
	<!-- TinyMCE WYSIWYG Editor -->
	 <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
     <script>
     tinymce.init(
     {
		    selector: 'textarea',
			plugins: 'link code',
			menubar: false
	 });
     </script>


@endsection 
	<div class="container">
		<div class="row">
			<div class=" col-md-8 col-md-offset-2">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<b>Edit Book details</b></div>
						<div class="panel-body">
							<form method="POST" action="{{url('/library/'.$book->id)}}" class="form-horizontal" file="true" enctype="multipart/form-data">
							{{csrf_field()}}
							{{method_field('PUT')}}
							@include('partials.form')
							</form>
					</div>
				</div>
			</div>
		</div>					
	</div>
@endsection

@section('scripts')
<script type="text/javascript" src="/js/select2.min.js"></script> 

<script type="text/javascript">
	$('.select2-multi').select2();
</script>

@endsection