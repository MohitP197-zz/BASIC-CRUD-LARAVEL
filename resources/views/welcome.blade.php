@extends('layouts.master')
@section('content')

@if(session('success'))

<div class="row">
	<div class="alert-success">
		{{session('success')}}
	</div>
</div>

@endif

<div class="row">
	<div class="col-md-4">
		<form action="{{route('add')}}" method="post" enctype="multipart/form-data">
			{{csrf_field()}} 

			<div class="form-group">
				<label for="username">User Name</label>
				<input type="text" name="username" placeholder="Enter user name" id="usernameid" class="form-control">
				<a href="" style="color: red;">{{$errors->first('username')}}</a>
			</div>

			<div class="form-group">
				<label for="email">Email</label>
				<input type="text" name="email" placeholder="Enter email address" id="email" class="form-control">
				<a href="" style="color: red;">{{$errors->first('email')}}</a>
			</div>

			<div class="form-group">
				<label for="profilepicture">Profile Picture</label>
				<input type="file" name="image" placeholder="Choose a file" id="imageId" class="btn btn-default">
				<a href="" style="color: red;">{{$errors->first('image')}}</a>
			</div>

			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" name="password" id="password" class="form-control">
				<a href="" style="color: red;">{{$errors->first('password')}}</a>
			</div>

			<div class="form-group">
				<label for="cpassword">Confirm Password</label>
				<input type="password" name="password_confirmation" placeholder="Enter password" id="cpassword" class="form-control">
			</div>

			<div class="form-group">
				<button class="btn btn-primary">Add Record</button>
			</div>

		</form>
	</div>
	<div class="col-md-8">
		<table class="table table-hover">
			<tr>
				<th>S.No.</th>
				<th>UserName</th>
				<th>Email</th>
				<th>Image</th>
				<th>Action</th>
				<th>Created</th>
			</tr>
			@foreach($userData as $key=>$userDatum)
				<tr>

					<td>{{++$key}}</td>
					<td>{{$userDatum->username}}</td>
					<td>{{$userDatum->email}}</td>
					<td><img src="{{url('lib/images/'.$userDatum->image)}}" width="40" height="30" alt="no image"></td>
					
					<td>
						<a href="{{route('edit').'/'.$userDatum->id}}}" class="btn btn-primary btn-xs">Edit</a>
					<a href="{{route('delete').'/'.$userDatum->id}}}" class="btn btn-danger btn-xs">Delete </a>
				</td>
					<td>{{$userDatum->created_at}}</td>

				</tr>
			@endforeach


		</table>
		{{$userData->links()}}
		{{--for pagination, if data exceeds too much, adds in a new page--}}



	</div>
</div>


@stop