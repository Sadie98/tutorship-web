@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <ul>
        @foreach($users as $user)
            <li>{{$user}}</li>
        @endforeach
        </ul>
    </div>
</div>
@endsection
