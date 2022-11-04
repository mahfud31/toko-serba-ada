<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="" />
		<meta name="author" content="" />


		<!-- CSRF Token -->
		{{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

		<title>@yield('title')</title>

		<!-- Styles -->
		@stack('prepend-style')
		@include('includes.style')
		@stack('addon-style')

	</head>
	<body>
		{{-- page content --}}
		@yield('content')

		{{-- footer --}}
		@include('includes.footer')

		{{-- script --}}
		@stack('prepend-script')
		@include('includes.script')
		@stack('addon-script')
	</body>
</html>
