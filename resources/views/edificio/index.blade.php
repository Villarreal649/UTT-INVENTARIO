@extends('layouts.app')


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
                                <div class="head-text">Edificios</div>
                            </div>
                        @can('crear-rol')
                                <div class="float-right">
                                    <a href="{{ route('edificios.create') }}" class="btn btn-warning">
                                    {{ __('Agregar ') }} <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                                @endcan
                              @if ($message = Session::get('success'))
                                    <div class="alert alert-success">
                                        <p>{{ $message }}</p>
                                    </div>
                                @endif

                        <div class="table-responsive">
                        <table class="table table-striped table-hover mt-2" id="edificios">
                                <thead class="table-light">
                                    <tr>
                                        <th>No</th>

										<th>Nombre Edificio</th>
										<th>No.Teléfono</th>
										<th>Email</th>
										<th>Ubicación</th>
										<th>Encargado de Edificio</th>
                                        <th>Acciones</th>

                                
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($edificios as $edificio)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $edificio->name }}</td>
											<td>{{ $edificio->number }}</td>
											<td>{{ $edificio->email }}</td>
											<td>{{ $edificio->ubicacion }}</td>
											<td>
                                                {{ $edificio->user->name}}
                                            </td>


                                            <td>
                                            @can('editar-edificio')
                                            <a class="btn btn-sm btn-success mt-2" href="{{ route('edificios.edit',$edificio->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                            @endcan

                                            @can('borrar-edificio')
                                            <form action="{{ route('edificios.destroy',$edificio->id) }}" method="POST"style="display:inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm mt-2" onclick="
                                            return confirm('Estas seguro de que desas borrar este edificio?')" ><i class="fa fa-fw fa-trash"></i> Borrar</button>
                                        </form>
                                                    @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                    {!! $edificios->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

