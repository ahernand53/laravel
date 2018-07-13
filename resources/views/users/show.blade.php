@extends('layouts.app')

@section('content')
    <div class="text-center" style="margin-bottom: 10px">
        <img src="{{ $user->avatar }}" class="rounded img-thumbnail" alt="...">
        <h1>{{ $user->name }}</h1>
        <a class="btn btn-link" href="/{{ $user->username }}/follows">
            Following <span class="badge badge-primary">{{ $user->follows->count() }}</span>
        </a>
        <a class="btn btn-link" href="/{{ $user->username }}/followers">
            Followers <span class="badge badge-primary">{{ $user->followers->count() }}</span>
        </a>
        @if(Auth::check())
            @if(Gate::allows('dms', $user))
                <form action="/{{ $user->username }}/dms" method="post">
                    @csrf
                    <input type="text" name="message" class="form-control">
                    <button type="submit" class="btn btn-success">Enviar DM</button>
                </form>
            @endif
            @if(Auth::user()->isFollowing($user))
                <form action="/{{ $user->username }}/unfollow" method="post">
                    @csrf
                    <button class="btn btn-danger">Unfollow</button>
                </form>
            @else
                <form action="/{{ $user->username }}/follow" method="post">
                    @csrf
                    <button class="btn btn-primary">Follow</button>
                </form>
            @endif
        @endif

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