
@extends('layouts.app')

@section('template_title')
    Resguardos
@endsection

<?php
use Carbon\Carbon;
?>
@section('content')

    <section class="section">
        <div class="section-header">
        
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                        <div class="float-left">
                                <div class="head-text">Resguardos</div>
                            </div>
                        @if ($message = Session::get('success'))
                                    <div class="alert alert-success">
                                        <p>{{ $message }}</p>
                                    </div>
                                @endif
                            @can('crear-rol')

                            <div class="float-right">
                                <a href="{{ route('resguardos.create') }}" class="btn btn-warning">
                                {{ __('Agregar ') }} <i class="fa fa-plus"></i>
                                </a>
                              </div>
                            @endcan
                        <div class="table-responsive">
                        <table class="table table-striped table-hover mt-2" id="resguardos">
                                <thead class="table-light">
                                <tr>
                                        <th>No</th>
										<th>No. de empleado</th>
										<th>Nombre del solicitante</th>
                                        <th>Numero telefónico</th>
                                        <th>No. de inventario</th>
                                        <th>Productos</th>
                                        <th>Fecha de resguardo</th>
										<th>Fecha de devolución</th>
										<th>Observaciones</th>
										<th>Encargado</th>
										<th>Area donde se presto</th>
                                        <th>Tiempo faltante entrega</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($resguardos as $resguardo)
                                        <tr>
                                            <td>{{++$i}}</td>
											<td>{{ $resguardo->matricula }}</td>
											<td>{{ $resguardo->nombre_solicitante }}</td>
                                            <td>{{ $resguardo->number }}</td>
                                            <td>
                                                <ul>
                                                    @foreach($resguardo->productos as $key => $item)
                                                        <li>{{ $item->num_inventario }}</li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                            <td>
                                                <ul>
                                                    @foreach($resguardo->productos as $key => $item)
                                                        <li>{{ $item->name }}({{ $item->pivot->quantity }})</li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                            <td>{{ $resguardo->fecha_resguardo }}</td>
											<td>{{ $resguardo->fecha_dev }}</td>
											<td>{{ $resguardo->observaciones }}</td>
											<td>{{ $resguardo->user->name }}</td>
											<td>{{ $resguardo->area->name }}</td>
                                            <td>{{Carbon::today()->diffInWeeks($resguardo->fecha_dev)}} semana(s) restantes</td>
                                            <td>
                                            @can('editar-resguardo')
                                                <a class="btn btn-sm btn-info mt-2 " href="{{ route('resguardos.show',$resguardo->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                            @endcan
                                            @can('editar-resguardo]')
                                                <a class="btn btn-sm btn-success mt-2" href="{{ route('resguardos.edit',$resguardo->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                            @endcan
                                            @can('borrar-resguardo')
                                                <form action="{{ route('resguardos.destroy',$resguardo->id) }}" method="POST"style="display:inline">
                                            @csrf
                                            @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm mt-2" onclick="
                                            return confirm('Estas seguro de que deseas borrar este resguardo?')" ><i class="fa fa-fw fa-trash"></i> Borrar</button>
                                            </form>
                                            @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
