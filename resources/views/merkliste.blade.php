<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
  <div class="max-w-4xl mx-auto px-4">
    <h1 class="text-3xl font-bold mb-6 text-center">Merkliste</h1>
    <div class="grid grid-cols-8 gap-1 border-black border-b-4 border-t-2">
      <!-- Table Headers -->
      <div class="col-span-2">
        <p class="text-lg font-semibold">Name</p>
      </div>
      <div class="col-span-6 md:col-span-2">
        <p class="text-lg font-semibold">Beschreibung</p>
      </div>
      <div class="col-span-6 md:col-span-1">
        <p class="text-lg font-semibold">Datum</p>
      </div>
      <div class="col-span-6 md:col-span-1">
        <p class="text-lg font-semibold">Uhrzeit</p>
      </div>
      <div class="col-span-6 md:col-span-1 text-center">
        <p class="text-lg font-semibold">Erledigt</p>
      </div>
      <div class="col-span-6 md:col-span-1 text-center">
        <p class="text-lg font-semibold">Aktion</p>
      </div>

      <!-- Aufgaben -->
      @foreach($todos as $todo)
    <!-- Aufgaben display -->
    <div class="col-span-6 sm:col-span-3 md:col-span-2">
        <p class="text-gray-600 mb-2">{{$todo->name}}</p>
    </div>
    <div class="col-span-6 sm:col-span-3 md:col-span-2">
        <p class="text-gray-600 mb-2">{{$todo->beschreibung}}</p>
    </div>
    <div class="col-span-6 md:col-span-1">
        <p class="text-gray-600 mb-2">{{$todo->datum}}</p>
    </div>
    <div class="col-span-6 md:col-span-1">
        <p class="text-gray-600 mb-2">{{$todo->uhrzeit}}</p>
    </div>
    <div class="col-span-6 md:col-span-1 flex items-center justify-center">
        <input type="checkbox" id="erledigt_{{$todo->id}}" class="form-checkbox mr-2" {{ $todo->erledigt ? 'checked' : '' }}>
        
    </div>
    <div class="col-span-6 md:col-span-1 flex items-center justify-center">
        <!-- Edit Button -->
        <a href="{{ route('tasks.edit', $todo->id) }}" class="text-blue-500 hover:text-blue-700 mr-3 edit-btn">Edit</a>
        
        <!-- Delete Button -->
        <form action="{{ route('tasks.destroy', $todo->id) }}" method="POST" onsubmit="return confirm('Möchten Sie diese Aufgabe wirklich löschen ?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-500 hover:text-red-700">
            Delete
            </button>
        </form>
    </div>
@endforeach
    </div>

    <!-- Neue Aufgabe Form -->
    <div class="bg-white rounded-lg shadow-md p-8 mt-8">
      <h1 class="text-3xl font-bold mb-4">Neue Aufgabe anlegen</h1>
      <form method="POST" action="{{ route('tasks.store') }}">
        @csrf <!-- CSRF token -->
        <div class="mb-4">
    <label for="name" class="block text-gray-700 font-bold mb-2">Name</label>
    <input type="text" name="name" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
</div>
<div class="mb-4">
    <label for="beschreibung" class="block text-gray-700 font-bold mb-2">Beschreibung</label>
    <input type="text" name="beschreibung" id="beschreibung" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
</div>
<div class="mb-4">
    <label for="datum" class="block text-gray-700 font-bold mb-2">Datum</label>
    <input type="date" name="datum" id="datum" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
</div>
<div class="mb-4">
    <label for="uhrzeit" class="block text-sm font-medium text-gray-700">Uhrzeit</label>
    <input type="time" id="uhrzeit" name="uhrzeit" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm border-gray-300 rounded-md" required>
</div>

        <div class="text-center">
          <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Anlegen</button>
        </div>
      </form>
    </div>
  </div>
</body>
</html>