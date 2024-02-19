<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center">
    <div class="max-w-md bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-2xl font-semibold mb-4">Edit Task</h1>
        
        <form method="POST" action="{{ route('tasks.update', $todo->id) }}">
            @csrf
            @method('PATCH')

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" id="name" name="name" value="{{ $todo->name }}" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>

            <div class="mb-4">
                <label for="beschreibung" class="block text-sm font-medium text-gray-700">Beschreibung</label>
                <input type="text" id="beschreibung" name="beschreibung" value="{{ $todo->beschreibung }}" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>

            <div class="mb-4">
                <label for="datum" class="block text-sm font-medium text-gray-700">Datum</label>
                <input type="date" id="datum" name="datum" value="{{ $todo->datum }}" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>

            <div class="mb-4">
                <label for="uhrzeit" class="block text-sm font-medium text-gray-700">Uhrzeit</label>
                <input type="time" id="uhrzeit" name="uhrzeit" value="{{ $todo->uhrzeit }}" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>   
            <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Update Task</button>
        </form>
    </div>
</body>

</html>
