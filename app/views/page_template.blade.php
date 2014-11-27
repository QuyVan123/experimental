<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	@yield('title')
	@yield('pre_load_extensions')
	{{ HTML::style('css/main_stylesheet.css') }}
</head>
<body>
	<button id='return_button'><a href='/'>Return to List</a></button>
	@yield('content')
	
	@yield('post_load_extensions')
	{{ HTML::script('scripts/hide_return_list.js') }}

</body>
</html>

