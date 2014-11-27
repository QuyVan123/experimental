
@extends ('page_template')

@section('title')
	<title>Javascript 1</title>
@stop
@section('pre_load_extensions')
{{ HTML::script('scripts/javascript_1.js') }}
@stop
@section('content')
<p id="demo">Do I know how to use basic javascript??</p>
<button type='button' onclick='test_function()'>Click</button>
@stop
@section('post_load_extensions')
@stop
