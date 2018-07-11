@extends('layouts.app')

@section('content')
    <div class="text-center">
        <img src="{{ $user->avatar }}" class="rounded img-thumbnail" alt="...">
        <h1>{{ $user->name }}</h1>
        <form action="/{{ $user->username }}/follow" method="post">
            @csrf
            @if(session('success'))
                <span class="text-success">{{ session('success') }}</span>
            @endif
            <button class="btn btn-primary">Follow</button>
        </form>
    </div>
    <div class="row">
        @foreach($messages as $message)
            <div class="col-6">
                @include('messages.message')
            </div>
        @endforeach

        @if(count($messages))
            <div class="mt-2 mx-auto">
                {{ $messages->links() }}
            </div>
        @endif
    </div>



@endsection