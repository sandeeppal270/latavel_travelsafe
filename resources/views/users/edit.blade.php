<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Travel Safely</title>
</head>
{{-- @include('header') --}}
<body>

    @extends('users.layout')
    {{-- @include('sidebar') --}}
    @section('content')
<div class="row g-4">
                    <div class="col-md-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Basic Form</h6>
                            
   <form action="{{ url('users/' .$app_users->id) }}" method="post">
        		{!! csrf_field() !!}
        	@method("PATCH")
      	  <input type="hidden" name="id" id="id" value="{{$app_users->id}}" id="id" />
       	 <label>Name</label></br>
        <input type="text" name="name" id="name" value="{{$app_users->app_user}}" class="form-control"></br>
        <label>Email</label></br>
        <input type="email" name="email" id="email" value="{{$app_users->contact_person}}" class="form-control"></br>
        <label>Telephone</label></br>
        <input type="text" name="telephone" id="telephone" value="{{$app_users->email_id}}" class="form-control"></br>
        <label>Image</label></br>
        <input type="file" name="avatar" id="avatar" value="{{$app_users->address}}" class="form-control"></br>
        <label>Latitude</label></br>
        <input type="text" name="latitude" id="latitude" value="{{$app_users->image_attachment}}" class="form-control"></br>
        <label>Longitude</label></br>
        <input type="text" name="longitude" id="longitude" value="{{$app_users->city_name}}" class="form-control"></br>
        <label>Gender</label></br>
        <input type="text" name="gender" id="gender" value="{{$app_users->latitude}}" class="form-control"></br>
        <label>Age</label></br>
        <input type="text" name="age" id="age" value="{{$app_users->longitude}}" class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
        </div>
    </div>
@stop
</body>
</html>
