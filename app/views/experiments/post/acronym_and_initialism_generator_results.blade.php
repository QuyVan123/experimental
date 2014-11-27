
@extends ('page_template')

@section('title')
	<title>Acronym and Initialism Results</title>
@stop
@section('pre_load_extensions')
{{ HTML::script ('http://code.jquery.com/jquery-1.11.1.js') }}
{{ HTML::style ('css/initialsGenResults.css') }}
@stop
@section('content')
	<h2>Results</h2>
	<ul>
		{{ Experiment::getInitialsAndFullNameList(); }}
	</ul>
@stop
@section('post_load_extensions')
{{ HTML::script ('scripts/acronym_and_initialism.js') }}
@stop
