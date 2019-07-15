@extends('layouts.app')
@section('content')
<div class="container">
<form action="{{ route('custom.update',['id'=>$custom['id']]) }}" method="post">
	  <div class="input-group mb-3">
	    <div class="input-group-prepend">
	      <span class="input-group-text">CustomName</span>
	    </div>
	    <input type="text" name="name" class="form-control" value="{{ $custom['name'] }}" placeholder="Please Input The CustomName">
	  </div>
	  <input type="hidden" name="_method" value="put"/>
	  <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
	  <button type="submit" class="btn btn-primary">Submit</button>
	</form>
 </div>
@endsection