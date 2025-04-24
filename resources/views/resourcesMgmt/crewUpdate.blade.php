<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body class="bg-gray-100 text-gray-800 p-10">
    <form action="{{ route('resources-mgmt.crews.update', $crew->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700" for="name">Nom</label>
            <input class="mt-1 block w-full" type="text" name="name" value="{{ old('name', $crew->name) }}" required>
            </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700" for="role">Rôle</label>
            <input class="mt-1 block w-full" type="text" name="role" value="{{ old('role', $crew->role) }}" required>
            </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700" for="description">Description</label>
            <textarea class="mt-1 block w-full" name="description" required>{{ old('description', $crew->description) }}</textarea>
            </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700" for="image">Image</label>
            <input class="mt-1 block w-full" type="text" name="image" value="{{ old('image', $crew->image) }}">
        </div>

        <button class="bg-blue-500 text-white px-3 py-1 rounded" type="submit">Mettre à jour</button>
    </form>
</body>
</html>