
@extends('layouts.app')
@section('template_title')
    Mostrar Planta
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Mostrar Planta</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">

                @includeif('partials.errors')
                    <div class="card">
                    <div class="card-body">
                    <div class="float-right">
                                    <a href="{{ route('planta.index') }}" class="btn btn-warning">
                                    {{ __('Regresar') }}
                                    </a>
                                </div>
                                <br>
                            <div class="form-group">
                            <strong>Nombre Planta:</strong>
                            {{ $planta->name }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre Edificio:</strong>
                            {{ $planta->edificio-name }}
                        </div>


                    </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection



