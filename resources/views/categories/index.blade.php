@extends('app')

@section('content')
<div class="container w-25 border p-4 mt-4">
    <div class="row mx-auto">
        <form action="{{ route('categories.store')}}" method="post">
            @csrf
            @if (session('success'))
            <h6 class=alert alert-success>{{ session('success') }}</h6>
            @endif
            @error('name')
            <h6 class="alert alert-danger">{{$message}}</h6>

            @enderror
            <div class="mb-3">
                <label for="name" class="form-label">Nombre de la categoría</label>
                <input type="text" name="name" class=" form-control">
            </div>

            <div class="mb-3">
                <label for="color" class="form-label">Color de la categoría</label>
                <input type="color" name="color" class=" form-control">
            </div>

            <button type="submit" class="btn btn-primary">Crear nueva categoría</button>
        </form>
        <div>
            @foreach ($categories as $category)
            <div class="row py-1">
                <div class="col-md-9 d-flex align-center">
                    <a class="d-flex align-item-center gap-2" href="{{ route('categories.show', ['category' => $category->id]) }}">
                        <span class="color-container" style="background-color: {{ $category->color }}"></span> {{ $category->name}}
                    </a>
                </div>

                <div class="col-md-3 d-flex justify-content-end">
                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal{{ $category->id }}">Eliminar</button>
                </div>
            </div>

            <div class="modal fade" id="{{ $category->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <form action="{{ route('categories.destroy', ['category' => $category->id]) }}">
                                @method('DELETE')
                                #csrf
                                <button type="button" class="btn btn-primary">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection