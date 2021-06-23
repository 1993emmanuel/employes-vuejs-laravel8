@extends('layouts.main')

@section('content')
	<div id="app">
		{{-- <employees-index></employees-index> --}}
		<router-view></router-view>
	</div>
@endsection