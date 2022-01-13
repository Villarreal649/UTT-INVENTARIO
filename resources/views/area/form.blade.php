<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('nombre del área') }}
            {{ Form::text('name', $area->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : '')]) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Se encuentra en la planta') }}
            {{ Form::select('planta_id',$plantas, $area->planta_id, ['class' => 'form-control' . ($errors->has('planta_id') ? ' is-invalid' : ''), 'placeholder' => 'Planta']) }}
            {!! $errors->first('planta_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Se encuentra en el edificio') }}
            {{ Form::select('edificio_id',$edificios, $area->edificio_id, ['class' => 'form-control' . ($errors->has('edificio_id') ? ' is-invalid' : ''), 'placeholder' => 'Edificio']) }}
            {!! $errors->first('edificio_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-warning">Guardar</button>
    </div>
</div>
