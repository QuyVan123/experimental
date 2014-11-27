
@extends ('page_template')

@section('title')
	<title>Javascript 2</title>
@stop
@section('pre_load_extensions')
{{ HTML::script('http://code.jquery.com/jquery-1.11.1.js') }}
{{ HTML::script('scripts/jquery_1.js') }}
@stop
@section('content')
<p id="demo">Some Lorem Ipsum stuff. Click the paragraph!</p>
<button id='button1' type='button'>Left Click Me</button>
<button type='button' onClick='onClickFunction()'>Left Click Me</button>
@stop
@section('post_load_extensions')
@stop
