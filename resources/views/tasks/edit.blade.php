@extends('layouts.app')

@section('content')
    <h1>Editar Tarea</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Título:</label>
        <input type="text" name="title" value="{{ old('title', $task->title) }}" required>

        <label>Descripción:</label>
        <textarea name="description">{{ old('description', $task->description) }}</textarea>

        <label>Estado:</label>
        <input type="hidden" name="completed" value="0">
        <input type="checkbox" name="completed" value="1" {{ $task->completed ? 'checked' : '' }}>

        <button type="submit">Actualizar</button>
    </form>
@endsection
