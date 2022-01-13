
@extends('layouts.app')
@section('template_title')
    Actualizar resguardo
@endsection
@section('content')
<section class="section">
<div class="section-header">
    <h3 class="page__heading">Resguardos</h3>
</div>
<div class="section-body">
<div class="row">
<div class="col-lg-12">
@includeif('partials.errors')
<div class="card">
    <div class="card-header">
        Actualizar resguardo
    </div>

    <div class="card-body">
        <form action="{{ route("resguardos.update", [$resguardo->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('matricula') ? 'has-error' : '' }}">
                <label for="name">Matricula</label>
                <input type="text" id="matricula" name="matricula" class="form-control" value="{{ old('matricula', isset($resguardo) ? $resguardo->matricula : '') }}" required>
                @if($errors->has('matricula'))
                    <em class="invalid-feedback">
                        {{ $errors->first('matricula') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('nombre_solicitante') ? 'has-error' : '' }}">
                <label for="name">Nombre del solicitante</label>
                <input type="text" id="nombre_solicitante" name="nombre_solicitante" class="form-control" value="{{ old('nombre_solicitante', isset($resguardo) ? $resguardo->nombre_solicitante : '') }}" required>
                @if($errors->has('nombre_solicitante'))
                    <em class="invalid-feedback">
                        {{ $errors->first('nombre_solicitante') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('number') ? 'has-error' : '' }}">
                <label for="name">Número de teléfono</label>
                <input type="text" id="number" name="number" class="form-control" value="{{ old('number', isset($resguardo) ? $resguardo->number : '') }}" required>
                @if($errors->has('number'))
                    <em class="invalid-feedback">
                        {{ $errors->first('number') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">Correo del solicitante</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($resguardo) ? $resguardo->email : '') }}">
                @if($errors->has('email'))
                    <em class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('fecha_resguardo') ? 'has-error' : '' }}">
                <label for="fecha_resguardo">Fecha de Resguardo</label>
                <input type="date" id="fecha_resguardo" name="fecha_resguardo" class="form-control" value="{{ old('fecha_resguardo', isset($resguardo) ? $resguardo->fecha_resguardo : '') }}">
                @if($errors->has('fecha_resguardo'))
                    <em class="invalid-feedback">
                        {{ $errors->first('fecha_resguardo') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('fecha_dev') ? 'has-error' : '' }}">
                <label for="fecha_dev">Fecha de devolución</label>
                <input type="date" id="fecha_dev" name="fecha_dev" class="form-control" value="{{ old('fecha_dev', isset($resguardo) ? $resguardo->fecha_dev : '') }}">
                @if($errors->has('fecha_dev'))
                    <em class="invalid-feedback">
                        {{ $errors->first('fecha_dev') }}
                    </em>
                @endif
            </div>
            <div class="form-group">
                {{ Form::label('Encargado') }}
                {{ Form::select('user_id',$users, $resguardo->user_id, ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'Encargado']) }}
                {!! $errors->first('user_id', '<div class="invalid-feedback">:message</p>') !!}
            </div>
            <div class="form-group">
                {{ Form::label('Area donde pertenece') }}
                {{ Form::select('area_id',$areas, $resguardo->area_id, ['class' => 'form-control' . ($errors->has('area_id') ? ' is-invalid' : ''), 'placeholder' => 'Area']) }}
                {!! $errors->first('area_id', '<div class="invalid-feedback">:message</p>') !!}
            </div>
            <div class="form-group">
                {{ Form::label('observaciones') }}
                {{ Form::text('observaciones', $resguardo->observaciones, ['class' => 'form-control' . ($errors->has('observaciones') ? ' is-invalid' : '')]) }}
                {!! $errors->first('observaciones', '<div class="invalid-feedback">:message</p>') !!}
            </div>
            <div class="card">
                <div class="card-header">
                    Productos
                </div>

                <div class="card-body">
                    <table class="table" id="productos_table">
                        <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach (old('productos', $resguardo->productos->count() ? $resguardo->productos : ['']) as $resguardo_producto)
                            <tr id="producto{{ $loop->index }}">
                                <td>
                                    <select name="productos[]" class="form-control">
                                        <option value="">-- Escoger producto --</option>
                                        @foreach ($productos as $producto)
                                            <option value="{{ $producto->id }}"
                                                @if (old('productos.' . $loop->parent->index, optional($resguardo_producto)->id) == $producto->id) selected @endif
                                            >{{$producto->num_inventario}} - {{ $producto->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="number" name="quantities[]" class="form-control" min="1" max="10" value="{{ (old('quantities.' . $loop->index) ?? optional(optional($resguardo_producto)->pivot)->quantity) ?? '1' }}" />
                                </td>
                            </tr>
                        @endforeach
                        <tr id="producto{{ count(old('productos', $resguardo->productos->count() ? $resguardo->productos : [''])) }}"></tr>
                        </tbody>
                    </table>

                    <div class="row">
                        <div class="col-md-12">
                            <button id="add_row" class="btn btn-light pull-left"><i class="fa fa-plus"></i> Agregar fila</button>
                            <button id='delete_row' class="pull-right btn btn-danger"><i class="fa fa-minus"></i> Borrar fila</button>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <input class="btn btn-warning" type="submit" value="Guardar">
            </div>
        </form>
    </div>
    </div>
</div>
</div>
</div>
@endsection
@section('scripts')
    <script>
      $(document).ready(function(){
        let row_number = {{ count(old('productos', $resguardo->productos->count() ? $resguardo->productos : [''])) }};
        $("#add_row").click(function(e){
          e.preventDefault();
          let new_row_number = row_number - 1;
          $('#producto' + row_number).html($('#producto' + new_row_number).html()).find('td:first-child');
          $('#productos_table').append('<tr id="producto' + (row_number + 1) + '"></tr>');
          row_number++;
        });

        $("#delete_row").click(function(e){
          e.preventDefault();
          if(row_number > 1){
            $("#producto" + (row_number - 1)).html('');
            row_number--;
          }
        });
      });
    </script>
@endsection
