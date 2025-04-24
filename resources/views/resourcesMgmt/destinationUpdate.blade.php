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
    <form action="{{ route('resources-mgmt.destinations.update', $destination->id) }}" method="POST">
        @csrf
        @method('PUT')
    
        <div class="mb-4">
            <labelclass="block text-sm font-medium text-gray-700" for="name">Nom de la destination</labelclass=>
            <input class="mt-1 block w-full" type="text" name="name" id="name" class="w-full p-2 border rounded" value="{{ old('name', $destination->name) }}">
            @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
    
        <div class="mb-4">
            <labelclass="block text-sm font-medium text-gray-700" for="description">Description</labelclass=>
            <textarea class="mt-1 block w-full" name="description" id="description" class="w-full p-2 border rounded">{{ old('description', $destination->description) }}</textarea>
            @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
    
        <div class="mb-4">
            <labelclass="block text-sm font-medium text-gray-700" for="avgDist">Distance moyenne</labelclass=>
            <input class="mt-1 block w-full" type="text" name="avgDist" id="avgDist" class="w-full p-2 border rounded" value="{{ old('avgDist', $destination->avgDist) }}">
            @error('avgDist') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
    
        <div class="mb-4">
            <labelclass="block text-sm font-medium text-gray-700" for="timeTravel">Temps de voyage</labelclass=>
            <input class="mt-1 block w-full" type="text" name="timeTravel" id="timeTravel" class="w-full p-2 border rounded" value="{{ old('timeTravel', $destination->timeTravel) }}">
            @error('timeTravel') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
    
        <div class="mb-4">
            <labelclass="block text-sm font-medium text-gray-700" for="imageUrl">URL de l'image (optionnel)</labelclass=>
            <input class="mt-1 block w-full" type="text" name="imageUrl" id="imageUrl" class="w-full p-2 border rounded" value="{{ old('imageUrl', $destination->imageUrl) }}">
            @error('imageUrl') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
    
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-4">Mettre à jour</button>
    </form>
    
</body>
</html>