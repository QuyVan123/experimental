
@extends ('page_template')

@section('title')
	<title>Acronym and Initialism Generator</title>
@stop
@section('pre_load_extensions')
{{ HTML::script('http://code.jquery.com/jquery-1.11.1.js') }}
@stop
@section('content')
	<h2>Comma seperated Lists</h2>
	<h3>Will remove whitespace</h3>
	<button type='button' id='increaseListButton'>Increase Number of Lists</button>
	{{ Form::open(array('url' => 'acronym_and_initialism_generator_results')) }}
	<div id='listArea'></div>	
	{{ Form::submit() }}
	{{ Form::close() }}

@stop
@section('post_load_extensions')
{{ HTML::script ('scripts/acronym_and_initialism.js') }}
@stop
