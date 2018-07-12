@extends('layouts.app')

@section('content')
    <form method="post" action="/auth/facebook/register">
        @csrf
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <img class="rounded img-thumbnail" src="{{ $user->avatar }}" alt="">
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input class="form-control" type="text" name="name" value="{{ $user->name }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control" type="text" name="email" value="{{ $user->email }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input class="form-control" type="text" name="username" value="{{ old('username') }}">
                        </div>
                    </div>

                    <div class="card-footer">
                        <button class="btn btn-primary" type="submit">Sign in</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection