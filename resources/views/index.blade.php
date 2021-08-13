@extends('layouts.app')
@section('title')
    My Todo App
@endsection
@section('content')

    <div class="row mt-3">
        <div class="col-12 align-self-center">
        @foreach($devices as $device)
                    <li class="list-group-item"><a href="details/{{$device->id}}" style="color: cornflowerblue">{{$device->name}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>

@endsection