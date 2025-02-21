@extends('layouts.app')

@section('content')
    <h1>{{ $riddle->title }}</h1>
    <p>Par {{ $riddle->user->name }}</p>
    <p>{{ $riddle->content }}</p>

    <h2>Commentaires</h2>
    @foreach ($riddle->comments as $comment)
        <div>
            <p><strong>{{ $comment->user->name }} :</strong> {{ $comment->content }}</p>
            @if (auth()->id() === $comment->user_id)
                <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Supprimer</button>
                </form>
            @endif
        </div>
    @endforeach

    <h2>Ajouter un commentaire</h2>
    <form action="{{ route('comments.store', $riddle->id) }}" method="POST">
        @csrf
        <textarea name="content" required></textarea>
        <button type="submit">Envoyer</button>
    </form>
@endsection
