@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">{{ __('Detalles del Alquiler') }}</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ __('Monto') }}</h5>
                <p class="card-text">{{ $alquiler->monto }}</p>

                <h5 class="card-title">{{ __('Fecha de Inicio') }}</h5>
                <p class="card-text">{{ $alquiler->fecha_inicio }}</p>

                <h5 class="card-title">{{ __('Fecha de Fin') }}</h5>
                <p class="card-text">{{ $alquiler->fecha_fin }}</p>

                <h5 class="card-title">{{ __('Inquilino') }}</h5>
                <p class="card-text">{{ $alquiler->inquilino ? $alquiler->inquilino->nombre : 'Sin inquilino asociado' }}</p>


                <!-- Asegúrate de que estas propiedades estén disponibles en el modelo Alquiler -->
                

                <a href="{{ route('alquileres.edit', $alquiler->id) }}" class="btn btn-warning">{{ __('Editar') }}</a>
                <form action="{{ route('alquileres.destroy', $alquiler->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">{{ __('Eliminar') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
