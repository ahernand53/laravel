@extends('layouts.app')

@section('content')

    <h1>Mensaje id: {{ $message->id }}</h1>
    @include('messages.message')

@endsection