@extends('layouts.admin')
 
@section('main-content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">{{ __('Editar Propietario') }}</h1>
 
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
 
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('propietarios.update', $propietario->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="id">{{ __('ID') }}</label>
                        <input type="text" name="id" class="form-control" id="id" value="{{ old('id', $propietario->id) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="nombre">{{ __('Nombre') }}</label>
                        <input type="text" name="nombre" class="form-control" id="nombre" value="{{ old('nombre', $propietario->nombre) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">{{ __('Email') }}</label>
                        <input type="text" name="email" class="form-control" id="email" value="{{ old('email', $propietario->email) }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('Actualizar') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection