<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Membre de l'Équipage</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 p-10">
    <h1 class="text-3xl font-bold mb-6">Ajouter un Membre de l'Équipage</h1>

    <form action="{{ route('resources-mgmt.crews.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label for="name" class="block text-sm font-semibold mb-2">Nom</label>
            <input type="text" id="name" name="name" class="w-full p-2 border border-gray-300 rounded" required value="{{ old('name') }}">
            @error('name')
                <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="role" class="block text-sm font-semibold mb-2">Rôle</label>
            <input type="text" id="role" name="role" class="w-full p-2 border border-gray-300 rounded" required value="{{ old('role') }}">
            @error('role')
                <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-semibold mb-2">Description</label>
            <textarea id="description" name="description" class="w-full p-2 border border-gray-300 rounded" rows="4">{{ old('description') }}</textarea>
            @error('description')
                <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="image" class="block text-sm font-semibold mb-2">Image (URL)</label>
            <input type="url" id="image" name="image" class="w-full p-2 border border-gray-300 rounded" value="{{ old('image') }}">
            @error('image')
                <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Ajouter</button>
        </div>
    </form>

    <a href="{{ route('resources-mgmt.crews.index') }}" class="text-blue-500">Retour à la gestion des membres</a>
</body>
</html>
