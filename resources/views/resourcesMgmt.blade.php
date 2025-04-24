<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Ressources</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 p-10">

    <div class="flex justify-end p-4">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                Déconnexion
            </button>
        </form>
    </div>

    <h1 class="text-3xl font-bold mb-6">Gestion des Ressources</h1>

    {{-- Message de succès --}}
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    {{-- Membres d'équipage --}}
    <section class="mb-10">
        <h2 class="text-2xl font-semibold mb-2">Membres d'équipage</h2>
        <a href="{{ route('resources-mgmt.crews.create') }}" class="bg-green-500 text-white px-3 py-1 rounded mb-4 inline-block">+ Ajouter un membre</a>
        <table class="table-auto w-full bg-white shadow rounded">
            <thead>
                <tr class="bg-gray-200 text-left">
                    <th class="p-3">Nom</th>
                    <th class="p-3">Rôle</th>
                    <th class="p-3">Description</th>
                    <th class="p-3">Image</th>
                    <th class="p-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($crews as $crew)
                    <tr class="border-b">
                        <td class="p-3">{{ $crew->name }}</td>
                        <td class="p-3">{{ $crew->role }}</td>
                        <td class="p-3">{{ $crew->description }}</td>
                        <td class="p-3">{{ $crew->image }}</td>
                        <td class="p-3 flex gap-2">
                            <a href="{{ route('resources-mgmt.crews.edit', $crew->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Modifier</a>
                            <form action="{{ route('resources-mgmt.crews.destroy', $crew->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce membre ?')">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-500 text-white px-2 py-1 rounded">Supprimer</button>
                            </form>
                            
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="p-3 text-center">Aucun membre trouvé.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </section>

    {{-- Destinations --}}
    <section class="mb-10">
        <h2 class="text-2xl font-semibold mb-2">Destinations</h2>
        <a href="{{ route('resources-mgmt.destinations.create') }}" class="bg-green-500 text-white px-3 py-1 rounded mb-4 inline-block">+ Ajouter une destination</a>
        <table class="table-auto w-full bg-white shadow rounded">
            <thead>
                <tr class="bg-gray-200 text-left">
                    <th class="p-3">Nom</th>
                    <th class="p-3">Description</th>
                    <th class="p-3">Distance Moy.</th>
                    <th class="p-3">Durée Voyage</th>
                    <th class="p-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($destinations as $destination)
                    <tr class="border-b">
                        <td class="p-3">{{ $destination->name }}</td>
                        <td class="p-3">{{ $destination->description }}</td>
                        <td class="p-3">{{ $destination->avgDist }}</td>
                        <td class="p-3">{{ $destination->timeTravel }}</td>
                        <td class="p-3 flex gap-2">
                            <a href="{{ route('resources-mgmt.destinations.edit', $destination->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Modifier</a>
                            <form action="{{ route('resources-mgmt.destinations.destroy', $destination->id) }}" method="POST" onsubmit="return confirm('Supprimer cette destination ?')">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-500 text-white px-2 py-1 rounded">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="p-3 text-center">Aucune destination trouvée.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </section>

    {{-- Technologies --}}
    <section>
        <h2 class="text-2xl font-semibold mb-2">Technologies</h2>
        <a href="{{ route('resources-mgmt.technologies.create') }}" class="bg-green-500 text-white px-3 py-1 rounded mb-4 inline-block">+ Ajouter une technologie</a>
        <table class="table-auto w-full bg-white shadow rounded">
            <thead>
                <tr class="bg-gray-200 text-left">
                    <th class="p-3">Nom</th>
                    <th class="p-3">Description</th>
                    <th class="p-3">Image Mobile</th>
                    <th class="p-3">Image Desktop</th>
                    <th class="p-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($technologies as $technology)
                    <tr class="border-b">
                        <td class="p-3">{{ $technology->name }}</td>
                        <td class="p-3">{{ $technology->description }}</td>
                        <td class="p-3">{{ $technology->imgMob }}</td>
                        <td class="p-3">{{ $technology->imgDesk }}</td>
                        <td class="p-3 flex gap-2">
                            <a href="{{ route('resources-mgmt.technologies.edit', $technology->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Modifier</a>
                            <form action="{{ route('resources-mgmt.technologies.destroy', $technology->id) }}" method="POST" onsubmit="return confirm('Supprimer cette technologie ?')">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-500 text-white px-2 py-1 rounded">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="p-3 text-center">Aucune technologie trouvée.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </section>
</body>
</html>
