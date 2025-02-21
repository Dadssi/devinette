<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devinettes</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900">

    <!-- Navbar -->
    <nav class="bg-white shadow-md py-4">
        <div class="container mx-auto flex justify-between items-center px-6">
            <a href="{{ route('riddles.index') }}" class="text-lg font-semibold text-blue-600">Accueil</a>
            
            <div class="flex items-center space-x-4">
                @auth
                    <a href="{{ route('riddles.create') }}" class="text-blue-600 hover:text-blue-800">Créer une Devinette</a>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">
                            Se Déconnecter
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800">Connexion</a>
                    <a href="{{ route('register') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Inscription</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Contenu principal -->
    <div class="container mx-auto mt-6 p-6 bg-white shadow-lg rounded-lg">
        @yield('content')
    </div>

</body>
</html>

