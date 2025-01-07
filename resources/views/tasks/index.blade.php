@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold text-center mb-6 text-gray-800">Lista de Tareas</h1>

        <!-- Botón para crear una nueva tarea -->
        <div class="flex justify-end mb-6">
            <a href="{{ route('tasks.create') }}" 
               class="px-4 py-2 bg-blue-600 font-semibold rounded-lg shadow-md hover:bg-blue-700 transition duration-300">
                ➕ Nueva Tarea
            </a>
        </div>

        <!-- Mensaje de éxito -->
        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded-lg mb-4 text-center shadow-md">
                {{ session('success') }}
            </div>
        @endif

        <!-- Contenedor de tarjetas -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @forelse ($tasks as $task)
                <div class="bg-white shadow-lg rounded-lg p-6 border-l-4 
                    {{ $task->completed ? 'border-green-500' : 'border-red-500' }}">
                    
                    <!-- Título de la tarea -->
                    <h2 class="text-xl font-bold text-gray-800 mb-3">
                        {{ $task->title }}
                    </h2>

                    <!-- Descripción -->
                    <p class="text-gray-700 mb-4">
                        {{ $task->description ?? 'Sin descripción' }}
                    </p>

                    <!-- Estado -->
                    <p class="text-sm font-semibold 
                        {{ $task->completed ? 'text-green-600' : 'text-red-600' }}">
                        {{ $task->completed ? '✅ Completada' : '❌ Pendiente' }}
                    </p>

                    <!-- Acciones -->
                    <div class="mt-4 flex space-x-2">
                        <!-- Botón Ver -->
                        <a href="{{ route('tasks.show', $task->id) }}" 
                            class="px-3 py-2 bg-blue-600  text-sm font-semibold rounded-lg hover:bg-gray-700 transition duration-300">
                            👁️ Ver
                        </a>

                        <!-- Botón Editar -->
                        <a href="{{ route('tasks.edit', $task->id) }}" 
                            class="px-3 py-2 bg-yellow-500  text-sm font-semibold rounded-lg hover:bg-yellow-600 transition duration-300">
                            ✏️ Editar
                        </a>
                        
                        <!-- Botón Eliminar -->
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                class="px-3 py-2 bg-red-500  text-sm font-semibold rounded-lg hover:bg-red-600 transition duration-300">
                                🗑️ Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="col-span-2 text-center text-gray-500 text-lg font-semibold">No hay tareas disponibles.</p>
            @endforelse
        </div>
    </div>
@endsection
