<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('Nombre de Edificio') }}
            {{ Form::text('name', $edificio->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : '')]) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('No.Teléfono') }}
            {{ Form::text('number', $edificio->number, ['class' => 'form-control' . ($errors->has('number') ? ' is-invalid' : '')]) }}
            {!! $errors->first('number', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('email') }}
            {{ Form::text('email', $edificio->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : '')]) }}
            {!! $errors->first('email', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Ubicación') }}
            {{ Form::text('ubicacion', $edificio->ubicacion, ['class' => 'form-control' . ($errors->has('ubicacion') ? ' is-invalid' : '')]) }}
            {!! $errors->first('ubicacion', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Encargado Edificio') }}
            {{ Form::select('user_id',$users , $edificio->user_id, ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'Encargado Edificio']) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-warning">Guardar</button>
    </div>
</div>
