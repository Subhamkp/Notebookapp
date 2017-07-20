@extends('layouts.base')

@section('content')

<div class="container">

<h1>Create Notes</h1>

@if(count($errors)>0)
	<ul>
		@foreach($errors->all() as $error)
			<li class="alert alert-danger">{{$error}}</li>
		@endforeach
	</ul>
@endif

<form action="{{route('notes.store')}}" method="POST">
	{{csrf_field()}}
	<div class="form-group">
		<label for="title">Notes Title</label>
		<input class="form-control" type="text" name="title">
	</div>

	<div class="form-group">
		<label for="body">Notes Body</label>
		<textarea class="form-control" type="text" rows="5" name="body"></textarea> 
	</div>
	<input  type="hidden" name="notebook_id" value='{{$id}}''>
	<input class="btn btn-primary" type="submit" value="Done">
	
</form>

</div>

@endsection
