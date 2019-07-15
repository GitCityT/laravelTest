@extends('layouts.app')
@section('content')
<div class="container">
	@if (count($errors) > 0)
	<div class="alert alert-danger" data-dismiss="alert">
		<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
		</ul>
	</div>
	@endif
	<form action="{{ route('custom.store') }}" method="post">
	  <div class="input-group mb-3">
	    <div class="input-group-prepend">
	      <span class="input-group-text">CustomName</span>
	    </div>
	    <input type="text" name="name" class="form-control" placeholder="Please Input The CustomName" value="{{ old('name') }}">
	  </div>
	  <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
	  <button type="submit" class="btn btn-primary">Submit</button>
	</form>
 </div>
@endsection