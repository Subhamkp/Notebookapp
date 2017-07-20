@extends('layouts.base')

@section('content')

<div class="container">
<h1>Edit Note</h1>

<form action="{{route('notes.update',$note->id)}}" method="POST">
	{{csrf_field()}}
	{{method_field('PUT')}}
	<div class="form-group">
		<label for="title">Notes Title</label>
		<input class="form-control" type="text" name="title">
	</div>

	<div class="form-group">
		<label for="body">Notes Body</label>
		<textarea class="form-control" type="text" rows="5" name="body"></textarea> 
	</div>
	<!-- <input  type="text" name="notebook_id" value=''>  -->
	<input class="btn btn-primary" type="submit" value="Done">
	
</form>
</div>
@endsection
