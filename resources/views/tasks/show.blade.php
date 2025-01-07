@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg p-6 border-l-4 
        {{ $task->completed ? 'border-green-500' : 'border-red-500' }}">

        <!-- Título de la tarea -->
        <h1 class="text-2xl font-bold text-gray-800 mb-4">
            {{ $task->title }}
        </h1>

        <!-- Descripción -->
        <p class="text-gray-700 mb-4">
            {{ $task->description ?? 'Sin descripción' }}
        </p>

        <!-- Estado -->
        <p class="text-lg font-semibold 
            {{ $task->completed ? 'text-green-600' : 'text-red-600' }}">
            Estado: {{ $task->completed ? '✅ Completada' : '❌ Pendiente' }}
        </p>

        <!-- Acciones -->
        <div class="mt-6 flex space-x-4">
            <!-- Botón Editar -->
            <a href="{{ route('tasks.edit', $task->id) }}" 
                class="px-4 py-2 bg-yellow-500 text-sm font-semibold rounded-lg hover:bg-yellow-600 transition duration-300">
                ✏️ Editar
            </a>
            
            <!-- Botón Eliminar -->
            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" 
                    class="px-4 py-2 bg-red-500 text-sm font-semibold rounded-lg hover:bg-red-600 transition duration-300">
                    🗑️ Eliminar
                </button>
            </form>
        </div>
    </div>
@endsection
