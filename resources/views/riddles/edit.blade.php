@extends('layouts.app')

@section('content')
    <h1>Modifier la Devinette</h1>
    <form action="{{ route('riddles.update', $riddle->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="title">Titre :</label>
        <input type="text" name="title" value="{{ $riddle->title }}" required>

        <label for="content">Contenu :</label>
        <textarea name="content" required>{{ $riddle->content }}</textarea>

        <button type="submit">Modifier</button>
    </form>
@endsection
