@extends('layouts.app')

@section('content')
    <h1>Lista de Tareas</h1>
    <a href="{{ route('tasks.create') }}">Nueva Tarea</a>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <ul>
        @forelse ($tasks as $task)
            <li>
                <strong>{{ $task->title }}</strong> - {{ $task->completed ? '✅ Completada' : '❌ Pendiente' }}
                <a href="{{ route('tasks.show', $task->id) }}">Ver</a>
                <a href="{{ route('tasks.edit', $task->id) }}">Editar</a>
                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </li>
        @empty
            <p>No hay tareas disponibles.</p>
        @endforelse
    </ul>
@endsection
