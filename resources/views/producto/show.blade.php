

@extends('layouts.app')
@section('template_title')
    Mostrar Producto
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Mostrar Producto</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">

                @includeif('partials.errors')
                    <div class="card">
                    <div class="card-body">
                    <div class="float-right">
                                    <a href="{{ route('productos.index') }}" class="btn btn-warning">
                                    {{ __('Regresar') }}
                                    </a>
                                </div>
                                <br>

                                <div class="form-group">
                            <strong>N. Inventario:</strong>
                            {{ $producto->num_inventario }}
                        </div>
                        <div class="form-group">
                            <strong>Area:</strong>
                            {{ $producto->area->name }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo alta:</strong>
                            {{ $producto->tipoalta->name }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Alta:</strong>
                            {{ $producto->fecha_alta }}
                        </div>
                        <div class="form-group">
                            <strong>Marca:</strong>
                            {{ $producto->marca->name }}
                        </div>
                        <div class="form-group">
                            <strong>Encargado:</strong>
                            {{ $producto->user->name }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $producto->estado->estado }}
                        </div>
                        <div class="form-group">
                            <strong>Modelo:</strong>
                            {{ $producto->modelo->modelo }}
                        </div>
                        <div class="form-group">
                            <strong>N. Serie:</strong>
                            {{ $producto->num_serie }}
                        </div>
                        <div class="form-group">
                            <strong>Categoría:</strong>
                            {{ $producto->categoria->name}}
                        </div>
                        <div class="form-group">
                            <strong>Subcategoría:</strong>
                            {{ $producto->subcategoria->name }}
                        </div>
                        <div class="form-group">
                            <strong>Imagen:</strong>
                            {{ $producto->imagen }}
                        </div>


                    </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection



