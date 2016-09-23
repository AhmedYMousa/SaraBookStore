<!DOCTYPE html>
<html>
<head>
	@include('partials.head')
	@yield('stylesheets')
</head>
<body>
	@include('partials.nav')
	@yield('content')
	@include('partials.footer')
	@include('partials.javascript')
	@yield('scripts')
</body>
</html>