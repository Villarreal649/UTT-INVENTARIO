@extends('layouts.app')
@section('template_title')
    Mostrar Prestamo
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Mostrar Prestamo</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">

                @includeif('partials.errors')
                    <div class="card">
                    <div class="card-body">
                    <div class="float-right">
                                    <a href="{{ route('prestamos.index') }}" class="btn btn-warning">
                                    {{ __('Regresar') }}
                                    </a>
                                </div>
                                <br>

                        <div class="form-group">
                            <strong>Matrícula del solicitante: </strong>
                            {{ $prestamo->matricula }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre del solicitante: </strong>
                            {{ $prestamo->name }}
                        </div>
                        <div class="form-group">
                            <strong>Correo del solicitante: </strong>
                            {{ $prestamo->email }}
                        </div>
                        <div class="form-group">
                            <strong>N. de inventario de los productos </strong>
                            <ul>
                                @foreach($prestamo->productos as $key => $item)
                                    <li>{{ $item->num_inventario }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="form-group">
                            <strong>Productos </strong>
                            <ul>
                                @foreach($prestamo->productos as $key => $item)
                                    <li>{{ $item->name }} ({{ $item->pivot->quantity }})</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="form-group">
                            <strong>Fecha de salida: </strong>
                            {{ $prestamo->fecha_sali }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha de devolución: </strong>
                            {{ $prestamo->fecha_dev }}
                        </div>

                        <div class="form-group">
                            <strong>Observaciones: </strong>
                            {{ $prestamo->observaciones }}
                        </div>
                        <div class="form-group">
                            <strong>Encargado: </strong>
                            {{ $prestamo->user->name }}
                        </div>
                        <div class="form-group">
                            <strong>Area del prestamo: </strong>
                            {{ $prestamo->area->name}}
                        </div>


                    </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection



