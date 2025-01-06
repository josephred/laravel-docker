@extends('layouts.app')

@section('content')
    <h1>{{ $task->title }}</h1>
    <p>{{ $task->description }}</p>
    <p>Estado: {{ $task->completed ? '✅ Completada' : '❌ Pendiente' }}</p>

    <a href="{{ route('tasks.edit', $task->id) }}">Editar</a>
    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Eliminar</button>
    </form>
@endsection
