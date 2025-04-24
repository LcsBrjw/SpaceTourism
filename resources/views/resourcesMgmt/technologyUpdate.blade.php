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
    <form action="{{ route('resources-mgmt.technologies.update', $technology->id) }}" method="POST">
        @csrf
        @method('PUT')
    
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Nom</label>
            <input type="text" id="name" name="name" value="{{ old('name', $technology->name) }}" class="border-2 mt-1 block w-full" required>
        </div>
    
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea id="description" name="description" class="border-2 mt-1 block w-full" required>{{ old('description', $technology->description) }}</textarea>
        </div>
    
        <div class="mb-4">
            <label for="imgMob" class="block text-sm font-medium text-gray-700">Image Mobile (URL)</label>
            <input type="url" id="imgMob" name="imgMob" value="{{ old('imgMob', $technology->imgMob) }}" class="border-2 mt-1 block w-full">
        </div>
    
        <div class="mb-4">
            <label for="imgDesk" class="block text-sm font-medium text-gray-700">Image Desktop (URL)</label>
            <input type="url" id="imgDesk" name="imgDesk" value="{{ old('imgDesk', $technology->imgDesk) }}" class="border-2 mt-1 block w-full">
        </div>
    
        <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded">Mettre à jour la Technologie</button>
    </form>
    
</body>
</html>