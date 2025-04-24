<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="text-center space-y-4">
        @auth
            <h1 class="text-xl font-semibold">Bienvenue {{ Auth::user()->name }}</h1>

            @if(Auth::user()->role === 'admin')
                <a href="{{ route('dashboard') }}" class="text-blue-500 underline">Accéder au dashboard</a>
            @endif

            {{-- Déconnexion pour tous les utilisateurs connectés --}}
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-red-500 underline">Se déconnecter</button>
            </form>

        @else
            <a href="{{ route('login') }}" class="text-blue-500 underline">Se connecter</a>
            <a href="{{ route('register') }}" class="text-blue-500 underline">S'inscrire</a>
        @endauth
    </div>
</body>
</html>
