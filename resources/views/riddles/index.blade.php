@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto py-10 px-4">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Liste des Devinettes</h1>
            <a href="{{ route('riddles.create') }}" 
               class="px-4 py-2 bg-indigo-600 text-white rounded-lg shadow hover:bg-indigo-700 transition">
                Créer une nouvelle devinette
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($riddles as $riddle)
                <div class="bg-white p-6 rounded-2xl shadow-md hover:shadow-lg transition">
                    <h2 class="text-xl font-semibold text-indigo-700 mb-2">
                        <a href="{{ route('riddles.show', $riddle->id) }}" class="hover:underline">
                            {{ $riddle->title }}
                        </a>
                    </h2>
                    <p class="text-sm text-gray-500 mb-4">Par <span class="font-medium">{{ $riddle->user->name }}</span></p>
                    <p class="text-gray-700">{{ Str::limit($riddle->content, 100) }}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection

