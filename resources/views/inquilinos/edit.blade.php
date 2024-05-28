@extends('layouts.admin')
 
@section('main-content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">{{ __('Editar Inquilino') }}</h1>
 
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
                <form action="{{ route('inquilinos.update', $inquilino->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nombre">{{ __('Nombre') }}</label>
                        <input type="text" name="nombre" class="form-control" id="nombre" value="{{ old('nombre', $inquilino->nombre) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="correo_electronico">{{ __('Correo') }}</label>
                        <input type="text" name="correo_electronico" class="form-control" id="correo_electronico" value="{{ old('correo_electronico', $inquilino->correo_electronico) }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('Actualizar') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection