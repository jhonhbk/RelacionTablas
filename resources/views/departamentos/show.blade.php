@extends('layouts.admin')
 
@section('main-content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">{{ __('Detalles de Departamento') }}</h1>
 
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ __('Direccion') }}</h5>
                <p class="card-text">{{ $departamento->direccion }}</p>
 
                <h5 class="card-title">{{ __('Renta') }}</h5>
                <p class="card-text">{{ $departamento->renta }}</p>

 
                <a href="{{ route('departamentos.edit', $departamento->id) }}" class="btn btn-warning">{{ __('Editar') }}</a>
                <form action="{{ route('departamentos.destroy', $departamento->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">{{ __('Eliminar') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
