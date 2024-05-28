@extends('layouts.admin')
 
@section('main-content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">{{ __('Editar Alquiler') }}</h1>
 
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
                <form action="{{ route('alquileres.update', $alquiler->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="monto">{{ __('Monto') }}</label>
                        <input type="text" name="monto" class="form-control" id="monto" value="{{ old('monto', $alquiler->monto) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha_inicio">{{ __('Fecha Inicio') }}</label>
                        <input type="text" name="fecha_inicio" class="form-control" id="fecha_inicio" value="{{ old('fecha_inicio', $alquiler->fecha_inicio) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha_fin">{{ __('Fecha Fin') }}</label>
                        <input type="text" name="fecha_fin" class="form-control" id="fecha_fin" value="{{ old('fecha_fin', $alquiler->fecha_fin) }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('Actualizar') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection