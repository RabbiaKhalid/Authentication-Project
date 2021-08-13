@extends('layouts.app')
@section('title')
    Edit Todo
@endsection
@section('content')

    <form action="/update/{{$devices->id}}" method="POST" class="mt-4 p-4">
           @csrf
        <div class="form-group m-3">
            <label for="name">Device Name</label>
            <input type="text" class="form-control" name="name" value="{{$devices->name}}">
        </div>
        <div class="form-group m-3">
            <label for="member_id">Member ID</label>
            <input type="number" class="form-control" name="member_id" value="{{$devices->member_id}}">
        </div>
        <div class="form-group m-3">
            <input type="submit" class="btn btn-primary float-end" value="Update">
        </div>
    </form>

@endsection