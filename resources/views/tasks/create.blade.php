@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg p-6 border-l-4 border-blue-500">
        <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">📝 Crear Nueva Tarea</h1>

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
        <form action="{{ route('tasks.store') }}" method="POST" class="space-y-5">
            @csrf

            <!-- Campo Título -->
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Título:</label>
                <input type="text" name="title" required 
                       class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Campo Descripción -->
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Descripción:</label>
                <textarea name="description" 
                          class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
            </div>

            <!-- Botón de Envío -->
            <div class="flex justify-center">
                <button type="submit" 
                        class="px-6 py-3 bg-blue-600 font-semibold rounded-lg shadow-md hover:bg-blue-700 transition duration-300">
                    💾 Guardar
                </button>
            </div>
        </form>
    </div>
@endsection
