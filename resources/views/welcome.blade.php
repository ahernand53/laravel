
@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h1>Wake up your site</h1>
    </div>
    <div class="row">
        <form action="/messages/create" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="text" name="message" class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}" placeholder="Que estas pensando?">
                @if($errors->has('message'))
                    @foreach($errors->get('message') as $error)
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('message') }}</strong>
                        </span>
                    @endforeach
                @endif
                <input type="file" class="form-control-file" name="image">
            </div>
        </form>
    </div>
    <div class="row">
        @forelse($messages as $message)
            <div class="col-6">
                @include('messages.message')
            </div>
        @empty
            <p>No hay mensajes destacados.</p>
        @endforelse

        @if(count($messages))
            <div class="mt-2 mx-auto">
                {{ $messages->links() }}
            </div>
        @endif
    </div>
@endsection