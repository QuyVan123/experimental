
@extends('page_template')
@section('title')
	<title>Display Experiments</title>
@stop

@section('content')
	<h1>List of Experiments</h1>
	{{ Experiment::list_experiments(); }}
@stop

