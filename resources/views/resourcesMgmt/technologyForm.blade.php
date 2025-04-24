<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une Technologie</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 p-10">
    <h1 class="text-3xl font-bold mb-6">Ajouter une Technologie</h1>

    <form action="{{ route('resources-mgmt.technologies.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Nom</label>
            <input type="text" id="name" name="name" class="mt-1 block w-full" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea id="description" name="description" class="mt-1 block w-full" required></textarea>
        </div>

        <div class="mb-4">
            <label for="imgMob" class="block text-sm font-medium text-gray-700">Image Mobile (URL)</label>
            <input type="url" id="imgMob" name="imgMob" class="mt-1 block w-full">
        </div>

        <div class="mb-4">
            <label for="imgDesk" class="block text-sm font-medium text-gray-700">Image Desktop (URL)</label>
            <input type="url" id="imgDesk" name="imgDesk" class="mt-1 block w-full">
        </div>

        <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded">Ajouter la Technologie</button>
    </form>
</body>
</html>
