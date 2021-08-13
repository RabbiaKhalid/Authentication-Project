@extends('layouts.app')

@section('title')
    Details
@endsection

@section('content')

    <div class="card text-center mt-5">
        <div class="card-header">
            <b>DEVICE DETAILS</b>
        </div>
        <div class="card-body">
            <h5 class="card-title">{{$devices->name}}</h5>
            <p class="card-text">{{$devices->member_id}}</p>
            <a href="/edit/{{$devices->id}}"><span class="btn btn-primary">Edit</span></a>
            <a href="/delete/{{$devices->id}}"><span class="btn btn-danger">Delete</span></a>
        </div>
    </div>

@endsection