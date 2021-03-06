
@extends('layouts.app')

@section('content')
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="https://lorempixel.com/600/338/?50931=First slide" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="https://lorempixel.com/600/338/?50932=Second slide" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="https://lorempixel.com/600/338/?5092=Third slide" alt="Third slide">
            </div>
        </div>
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