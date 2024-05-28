@extends('layouts.admin')
 
@section('main-content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">{{ __('Agregar Propietario') }}</h1>
 
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
                <form action="{{ route('propietarios.store') }}" method="POST">
                    @csrf
                    
                    <div class="form-group">
                        <label for="nombre">{{ __('Nombre') }}</label>
                        <input type="text" name="nombre" class="form-control" id="nombre" value="{{ old('nombre') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">{{ __('Email') }}</label>
                        <input type="text" name="email" class="form-control" id="email" value="{{ old('email') }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection