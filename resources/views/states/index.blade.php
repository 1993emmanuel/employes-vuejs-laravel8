@extends('layouts.main')

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">States</h1>
</div>
<div class="row">
	<div class="card mx-auto">
		<div>
			@if( session()->has('message') )
				<div class="alert alert-success">
					{{session('message')}}
				</div>
			@endif
		</div>
		<div class="card-header">
			<div class="row">
				<div class="col">
					<form method="GET" action="{{route('states.index')}}">
						<div class="form-row align-items-center">
							<div class="col">
								<input type="search" name="search" class="form-control mb-2" id="search" placeholder="search">
							</div>
							<div class="col">
								<button type="submit" class="btn btn-primary mb-2 btn-small">Search</button>
							</div>
						</div>
					</form>
				</div>
				<div>
					<a href="{{route('states.create')}}" class="btn btn-primary mb-2">create country</a>
				</div>
			</div>
		</div>
		<div class="card-body">
			<table class="table">
			  	<thead>
			    	<tr>
			      		<th scope="col">#id</th>
			      		<th scope="col">Country code</th>
			      		<th scope="col">name</th>
			      		<th scope="col">Manage</th>
			    	</tr>
			  	</thead>
			  	<tbody>
			  		@foreach($states as $state)
				    	<tr>
				      		<th scope="row">{{$state->id}}</th>
				      		<th>{{$state->country->country_code}}</th>
				      		<th>{{$state->name}}</th>
				      		<td>
				      			<a href="{{ route('states.edit',$state->id) }}" class="btn btn-info">Editar</a>
				      		</td>
				    	</tr>
			    	@endforeach
			  	</tbody>
			</table>
		</div>
	</div>
</div>
@endsection