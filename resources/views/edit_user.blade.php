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
            <form action="{{route('edit_action')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="hidden" name="user_id" id="user_id" value="{{$user_data->id}}">
                <div class="form-group">
                    <label for="username">User Name</label>
                    <input type="text" name="username" placeholder="Enter user name" id="usernameid" value="{{$user_data->username}}"class="form-control">
                    <a href="" style="color: red;">{{$errors->first('username')}}</a>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" placeholder="Enter email address" id="email" value="{{$user_data->email}}"class="form-control">
                    <a href="" style="color: red;">{{$errors->first('email')}}</a>
                </div>

                <div class="form-group">
                    <label for="profilepicture">Profile Picture</label>
                    <input type="file" name="image" placeholder="Choose a file" id="imageId" class="btn btn-default">
                    <a href="" style="color: red;">{{$errors->first('image')}}</a>
                </div>


                <div class="form-group">
                    <button class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i>Edit Record</button>
                </div>

            </form>
        </div>

    

    <div class="col-md-4">
        <img src="{{url('lib/images/'.$user_data->image)}}" alt="" class="img-responsive thumbnail" style="margin-top: 20px">
    </div>
</div>


@stop