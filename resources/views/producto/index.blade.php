@extends('layouts.app')

@section('template_title')
    Productos
@endsection


@section('content')

    <section class="section">
        <div class="section-header">
    
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body"> <div class="float-left">
                                <div class="head-text">Productos</div>
                            </div>
                        @if ($message = Session::get('success'))
                                    <div class="alert alert-success">
                                        <p>{{ $message }}</p>
                                    </div>
                                @endif
                            @can('crear-rol')

                            <div class="float-right">
                                <a href="{{ route('productos.create') }}" class="btn btn-warning">
                                {{ __('Agregar ') }} <i class="fa fa-plus"></i>
                                </a>
                              </div>
                            @endcan
                        <div class="table-responsive">
                        <table class="table table-striped table-hover mt-2" id="productos">
                                <thead class="table-light">
                                <tr>
                                        <th>No</th>

										<th>No. Inventario</th>
                                        <th>Nombre del producto</th>
										<th>Area </th>
										<th>Tipo de alta</th>
										<th>Fecha de alta</th>
										<th>Marca</th>
										<th>Resguardante</th>
										<th>Estado</th>
										<th>Modelo</th>
										<th>No. de serie</th>
										<th>Categoría</th>
										<th>Subcategoría</th>
                                        <th>Ubicación</th>
										<th>Imagen</th>
                                        <th>Acciones</th>

                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productos as $producto)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $producto->num_inventario }}</td>
                                            <td>{{ $producto->name }}</td>
											<td>{{ $producto->area->name }}</td>
											<td>{{ $producto->tipoalta->name}}</td>
											<td>{{ $producto->fecha_alta }}</td>
											<td>{{ $producto->marca->name }}</td>
											<td>{{ $producto->user->name }}</td>
											<td>{{ $producto->estado->estado }}</td>
											<td>{{ $producto->modelo->modelo }}</td>
											<td>{{ $producto->num_serie }}</td>
											<td>{{ $producto->categoria->name}}</td>
											<td>{{ $producto->subcategoria->name }}</td>
                                            <td>{{ $producto->ubicacion }}</td>
											<td>{{ $producto->imagen }}</td>
                                            <td>
                                           @can('editar-producto')
                                           <a class="btn btn-sm btn-success mt-2" href="{{ route('productos.edit',$producto->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                           @endcan

                                           @can('borrar-producto')
                                           <form action="{{ route('productos.destroy',$producto->id) }}" method="POST"style="display:inline">
                                           @csrf
                                           @method('DELETE')
                                           <button type="submit" class="btn btn-danger btn-sm mt-2" onclick="
                                           return confirm('Estas seguro de que deseas borrar este producto?')" ><i class="fa fa-fw fa-trash"></i> Borrar</button>
                                       </form>
                                                    @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div class="pagination justify-content end">
                    {!! $productos ->links() !!}
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
