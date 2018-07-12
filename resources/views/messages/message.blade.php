<div class="card" style="margin-bottom: 10px">
    <img class="card-img-top" src="{{ $message->image }}" alt="">
    <div class="card-body">
        <small class="text-muted">Escrito por <a href="/{{ $message->user->username }}">{{ $message->user->name }}</a></small>
        <p class="card-text">
            {{ str_limit($message->content, 50, '...') }}
            <a href="/messages/{{ $message->id }}">Leer más</a>
        </p>
    </div>
    <div class="card-footer">
        <small class="text-muted float-right">{{ $message->created_at }}</small>
    </div>
</div>
