@extends('app')

@section('content')
<div class="container w-25 border p-4 mt-4">
    <form action="{{ route('todos-update', ['id' => $todo->id])}}" method="post">
        @method('PATCH')
        @csrf
        @if (session('success'))
        <h6 class=alert alert-success>{{ session('success') }}</h6>
        @endif
        @error('title')
        <h6 class="alert alert-danger">{{$message}}</h6>

        @enderror
        <div class="mb-3">
            <label for="title" class="form-label">Titulo de la tarea</label>
            <input type="text" name="title" class=" form-control" value="{{ $todo->title }}">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar tarea</button>
    </form>
</div>

@endsection