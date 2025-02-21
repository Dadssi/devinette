@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold text-gray-800">{{ $riddle->title }}</h1>
    <p class="text-gray-600 mt-2">Par <span class="font-semibold">{{ $riddle->user->name }}</span></p>
    <p class="mt-4 text-gray-700">{{ $riddle->content }}</p>

    {{-- Section des commentaires --}}
    <div class="mt-6">
        <h2 class="text-xl font-semibold text-gray-800">Commentaires</h2>
        @foreach ($riddle->comments as $comment)
            <div class="bg-gray-100 p-4 mt-3 rounded-lg">
                <p class="text-gray-700"><strong>{{ $comment->user->name }} :</strong> {{ $comment->content }}</p>
                @if (auth()->id() === $comment->user_id)
                    <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="mt-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700 text-sm">🗑 Supprimer</button>
                    </form>
                @endif
            </div>
        @endforeach
    </div>

    {{-- Formulaire d'ajout de commentaire --}}
    <div class="mt-6">
        <h2 class="text-xl font-semibold text-gray-800">Ajouter un commentaire</h2>
        <form action="{{ route('comments.store', $riddle->id) }}" method="POST" class="mt-4">
            @csrf
            <textarea name="content" required class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-400" placeholder="Écrivez votre commentaire ici..."></textarea>
            <button type="submit" class="mt-3 bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg shadow">💬 Envoyer</button>
        </form>
    </div>
</div>
@endsection

