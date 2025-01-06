@extends('layouts.app')

@section('content')
    <h1>Crear Nueva Tarea</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <label>Título:</label>
        <input type="text" name="title" required>

        <label>Descripción:</label>
        <textarea name="description"></textarea>

        <button type="submit">Guardar</button>
    </form>
@endsection
