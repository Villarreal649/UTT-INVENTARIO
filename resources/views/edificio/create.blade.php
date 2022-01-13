@extends('layouts.app')

@section('template_title')
    Crear Edificio
@endsection

@section('content')
<section class="section">
        <div class="section-header">
            <h3 class="page__heading">Edificios</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear edificio</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('edificios.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('edificio.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
