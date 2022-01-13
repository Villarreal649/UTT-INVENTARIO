<div class="card-body">
    <form action="{{ route("resguardos.store") }}" method="POST" enctype="multipart/form-data">
        @csrf
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
            <label for="nombre_solicitante">Nombre del solicitante</label>
            <input type="text" id="nombre_solicitante" name="nombre_solicitante" class="form-control" value="{{ old('nombre_solicitante', isset($resguardo) ? $resguardo->nombre_solicitante : '') }}" required>
            @if($errors->has('nombre_solicitante'))
                <em class="invalid-feedback">
                    {{ $errors->first('nombre_solicitante') }}
                </em>
            @endif
        </div>
        <div class="form-group {{ $errors->has('number') ? 'has-error' : '' }}">
            <label for="number">Número de teléfono</label>
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
            <label for="fecha_resguardo">Fecha de resguardo</label>
            <input type="date" id="fecha_resguardo" name="fecha_resguardo" class="form-control" value="{{ old('fecha_resguardo', $now->format('Y-m-d')) }}">
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
            {{ Form::label('observaciones') }}
            {{ Form::text('observaciones', $resguardo->observaciones, ['class' => 'form-control' . ($errors->has('observaciones') ? ' is-invalid' : '')]) }}
            {!! $errors->first('observaciones', '<div class="invalid-feedback">:message</p>') !!}
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
                        @foreach (old('productos', ['']) as $index => $oldProducto)
                            <tr id="producto{{ $index }}">
                                <td>
                                    <div class="somediv">
                                        <select id="buscador" class="select2" name="productos[]" class="form-control">
                                            <option value="">-- Escoge un producto --</option>
                                            @foreach ($productos as $producto)
                                                <option value="{{ $producto->id }}"{{ $oldProducto == $producto->id ? ' selected' : '' }}>
                                                    {{$producto->num_inventario}} - {{ $producto->name }} 
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <input type="number" name="quantities[]" min="1" max="10" class="form-control" value="{{ old('quantities.' . $index) ?? '1' }}" />
                                </td>
                            </tr>
                        @endforeach
                        <tr id="producto{{ count(old('productos', [''])) }}"></tr>
                    </tbody>
                </table>

                <div class="row">
                    <div class="col-md-12">
                        <button id="add_row" class="btn btn-light pull-left"><i class="fas fa-plus"></i> Añadir registro</button>
                        <button id='delete_row' class="pull-right btn btn-danger"><i class="fas fa-minus"></i> Borrar registro</button>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <input class="btn btn-warning" type="submit" value="Guardar">
        </div>
    </form>


</div>
@section('scripts')
<script>
  $(document).ready(function(){

    let row_number = {{ count(old('productos', [''])) }};
    $("#add_row").click(function(e){
      e.preventDefault();
      let new_row_number = row_number - 1;
      $('#producto' + row_number).html($('#producto' + new_row_number).html()).find('td:first-child');
      $('#productos_table').append('<tr id="producto' + (row_number + 1) + '"></tr>');
      row_number++;
      console.log(row_number);
      
      __select();
      
      
    });
    $("#delete_row").click(function(e){
      e.preventDefault();
      if(row_number > 1){
        $("#producto" + (row_number - 1)).html('');
        row_number--;
        console.log(row_number);
      }
    });
    function __select() {
    $('.somediv')
        .find('.select2')
        .each(function(){
        $(this).select2();
    });
    };
  });
</script>
@endsection