<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('No. de inventario') }}
            {{ Form::text('num_inventario', $producto->num_inventario, ['class' => 'form-control' . ($errors->has('num_inventario') ? ' is-invalid' : ''), 'placeholder' => 'Ej. 123456789']) }}
            {!! $errors->first('num_inventario', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Nombre del producto') }}
            {{ Form::text('name', $producto->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre del producto']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Área') }}
            {{ Form::select('area_id',$areas, $producto->area_id, ['class' => 'form-control' . ($errors->has('area_id') ? ' is-invalid' : ''), 'placeholder' => 'Área']) }}
            {!! $errors->first('area_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Tipo de alta') }}
            {{ Form::select('tipo_id',$tipoaltas, $producto->tipo_id, ['class' => 'form-control' . ($errors->has('tipo_id') ? ' is-invalid' : ''), 'placeholder' => 'Tipo de alta']) }}
            {!! $errors->first('tipo_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('fecha_alta') ? 'has-error' : '' }}">
            <label for="fecha_sali">Fecha de Alta</label>
            <input type="date" id="fecha_alta" name="fecha_alta" class="form-control" value="{{ old('fecha_alta', $now->format('Y-m-d')) }}">
            @if($errors->has('fecha_alta'))
                <em class="invalid-feedback">
                    {{ $errors->first('fecha_alta') }}
                </em>
            @endif
        </div>
        <div class="form-group">
            {{ Form::label('Marca') }}
            {{ Form::select('marca_id',$marcas, $producto->marca_id, ['class' => 'form-control' . ($errors->has('marca_id') ? ' is-invalid' : ''), 'placeholder' => 'Marca']) }}
            {!! $errors->first('marca_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Resguardante') }}
            {{ Form::select('user_id',$users, $producto->user_id, ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'Resguardante']) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Estado') }}
            {{ Form::select('status_id',$estados, $producto->status_id, ['class' => 'form-control' . ($errors->has('status_id') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('status_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Modelo') }}
            {{ Form::select('modelo_id',$modelos, $producto->modelo_id, ['class' => 'form-control' . ($errors->has('modelo_id') ? ' is-invalid' : ''), 'placeholder' => 'Modelo']) }}
            {!! $errors->first('modelo_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('No. de serie') }}
            {{ Form::text('num_serie', $producto->num_serie, ['class' => 'form-control' . ($errors->has('num_serie') ? ' is-invalid' : ''), 'placeholder' => 'Ej. 123456789']) }}
            {!! $errors->first('num_serie', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('categoría') }}
            {{ Form::select('categoria_id',$categorias, $producto->categoria_id, ['class' => 'form-control' . ($errors->has('categoria_id') ? ' is-invalid' : ''), 'placeholder' => 'Categoría']) }}
            {!! $errors->first('categoria_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Subcategoría') }}
            {{ Form::select('subcategoria_id',$subcategorias, $producto->subcategoria_id, ['class' => 'form-control' . ($errors->has('subcategoria_id') ? ' is-invalid' : ''), 'placeholder' => 'Subcategoría']) }}
            {!! $errors->first('subcategoria_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Ubicación') }}
            {{ Form::text('ubicacion', $producto->ubicacion, ['class' => 'form-control' . ($errors->has('ubicacion') ? ' is-invalid' : ''), 'placeholder' => 'Ubicación']) }}
            {!! $errors->first('ubicacion', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('imagen') }}
            {{ Form::text('imagen', $producto->imagen, ['class' => 'form-control' . ($errors->has('imagen') ? ' is-invalid' : ''), 'placeholder' => 'Imagen']) }}
            {!! $errors->first('imagen', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-warning">Guardar</button>
    </div>
</div>
