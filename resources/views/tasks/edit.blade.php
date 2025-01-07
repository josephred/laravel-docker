@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg p-6 border-l-4 border-blue-500">
        <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">✏️ Editar Tarea</h1>

        <!-- Mensajes de error -->
        @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-3 rounded-lg mb-4 shadow-md">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-sm">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulario -->
        <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <!-- Campo Título -->
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Título:</label>
                <input type="text" name="title" value="{{ old('title', $task->title) }}" required 
                       class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Campo Descripción -->
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Descripción:</label>
                <textarea name="description" 
                          class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description', $task->description) }}</textarea>
            </div>

            <!-- Checkbox Estado -->
            <div class="flex items-center space-x-3">
                <input type="hidden" name="completed" value="0">
                <input type="checkbox" name="completed" value="1" 
                       {{ $task->completed ? 'checked' : '' }}
                       class="h-5 w-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                <label class="text-gray-700 font-semibold">Marcar como completada</label>
            </div>

            <!-- Botón de Envío -->
            <div class="flex justify-center">
                <button type="submit" 
                        class="px-6 py-3 bg-blue-600 font-semibold rounded-lg shadow-md hover:bg-blue-700 transition duration-300">
                    💾 Actualizar
                </button>
            </div>
        </form>
    </div>
@endsection
