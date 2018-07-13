@extends('layouts.app')

@section('content')

    <h1>Conversacion con {{ $conversation->users->except($user->id)->implode('name', ', ') }}</h1>
        @foreach($conversation->privateMessages as $message)
            <div class="card">
                <div class="card-header">
                    <p class="">{{ $message->user->name }} dijo...</p>
                </div>
                <div class="card-body">
                    <p>{{ $message->message }}</p>
                </div>
                <div class="card-footer">
                    <p>{{ $message->created_at }}</p>
                </div>
            </div>
        @endforeach

@endsection