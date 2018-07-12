@extends('layouts.app')

@section('content')
<div class="col-md-10 mx-auto">
    <h1>Mensaje id: {{ $message->id }}</h1>
    <div class="card">
        <img class="card-img-top" src="{{ $message->image }}" alt="">
        <div class="card-body">
            <small class="text-muted">Escrito por <a href="/{{ $message->user->username }}">{{ $message->user->name }}</a></small>
            <p class="card-text">
                {{ $message->content }}
            </p>
        </div>
        <div class="card-footer">
            <small class="text-muted float-right">{{ $message->created_at }}</small>
        </div>
    </div>
</div>
@endsection
