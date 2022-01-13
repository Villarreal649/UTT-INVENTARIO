@extends('layouts.app')
@section('template_title')
    Mostrar Resguardo
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Mostrar Resguardo</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">

                @includeif('partials.errors')
                    <div class="card">
                    <div class="card-body">
                    <div class="float-right">
                                    <a href="{{ route('resguardos.index') }}" class="btn btn-warning">
                                    {{ __('Regresar') }}
                                    </a>
                                </div>
                                <br>
                        <div class="form-group">
                            <strong>No. de empleado:</strong>
                            {{ $resguardo->matricula }}
                        </div>
                                <div class="form-group">
                            <strong>Nombre del solicitante:</strong>
                            {{ $resguardo->nombre_solicitante }}
                        </div>
                        <div class="form-group">
                            <strong>No. Telefónico:</strong>
                            {{ $resguardo->number }}
                        </div>
                        <div class="form-group">
                            <strong>Correo electrónico del solicitante:</strong>
                            {{ $resguardo->email }}
                        </div>
                        <div class="form-group">
                            <strong>No. de inventario de los productos </strong>
                            <ul>
                                @foreach($resguardo->productos as $key => $item)
                                    <li>{{ $item->num_inventario }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="form-group">
                            <strong>Productos </strong>
                            <ul>
                                @foreach($resguardo->productos as $key => $item)
                                    <li>{{ $item->name }} ({{ $item->pivot->quantity }})</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="form-group">
                            <strong>Fecha de resguardo:</strong>
                            {{ $resguardo->fecha_resguardo }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha de devolución:</strong>
                            {{ $resguardo->fecha_dev }}
                        </div>
                        <div class="form-group">
                            <strong>Observaciones:</strong>
                            {{ $resguardo->observaciones }}
                        </div>
                        <div class="form-group">
                            <strong>Encargado:</strong>
                            {{ $resguardo->user->name }}
                        </div>
                        <div class="form-group">
                            <strong>Area del resguardo:</strong>
                            {{ $resguardo->area->name}}

                    </div>


                    </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection



