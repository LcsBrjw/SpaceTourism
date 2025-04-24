<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une Destination</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 p-10">

    <h1 class="text-3xl font-bold mb-6">Ajouter une Destination</h1>

    <form action="{{ route('resources-mgmt.destinations.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="name" class="block text-sm font-semibold mb-1">Nom de la Destination</label>
            <input type="text" id="name" name="name" class="w-full p-2 border border-gray-300 rounded" required>
            @error('name')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-semibold mb-1">Description</label>
            <textarea id="description" name="description" class="w-full p-2 border border-gray-300 rounded" required></textarea>
            @error('description')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="avgDist" class="block text-sm font-semibold mb-1">Distance moyenne (en km)</label>
            <input type="number" id="avgDist" name="avgDist" class="w-full p-2 border border-gray-300 rounded" required>
            @error('avgDist')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="timeTravel" class="block text-sm font-semibold mb-1">Temps de voyage (en heures)</label>
            <input type="number" id="timeTravel" name="timeTravel" class="w-full p-2 border border-gray-300 rounded" required>
            @error('timeTravel')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="imageUrl">URL de l'image</label>
            <input type="text" name="imageUrl" id="imageUrl" class="w-full p-2 border rounded" value="{{ old('imageUrl') }}">
        </div>
        

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Ajouter</button>
    </form>

    <a href="{{ route('dashboard') }}" class="mt-4 inline-block text-blue-500">Retour à la gestion des ressources</a>
</body>
</html>
