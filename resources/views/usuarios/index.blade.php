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
                                <div class="head-text">Usuarios</div>
                            </div>

                            <div class="float-right">
                                <a href="{{ route('usuarios.create') }}" class="btn btn-warning">
                                {{ __('Agregar ') }} <i class="fa fa-plus"></i>
                                </a>
                              </div>
                              @if ($message = Session::get('success'))
                                    <div class="alert alert-success">
                                        <p>{{ $message }}</p>
                                    </div>
                                @endif

                        <div class="table-responsive">
                            <table class="table table-striped table-hover mt-2" id="usuarios">
                                <thead class="table-light">
                                    <tr>
                                        <th>No.</th>
										<th>Matricula</th>
										<th>Nombre</th>
										<th>Email</th>
										<th>Rol</th>
										<th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($usuarios as $usuario)
                                        <tr>
                                            <td>{{++$i}}</td>

											<td>{{ $usuario->matricula }}</td>
											<td>{{ $usuario->name }}</td>
											<td>{{ $usuario->email }}</td>
                                            <td>
                                                @if(!empty($usuario->getRoleNames()))
                                                    @foreach($usuario->getRoleNames() as $roleName)
                                                    <h5><span class="badge badge-dark">{{$roleName}}</span></h5>
                                                    @endforeach
                                                @endif


                                            <td>


                                            @can('editar-usuario')
                                            <a class="btn btn-sm btn-success mt-2" href="{{ route('usuarios.edit',$usuario->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                            @endcan

                                            @can('borrar-usuario')
                                            <form action="{{ route('usuarios.destroy',$usuario->id) }}" method="POST"style="display:inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm mt-2" onclick="
                                            return confirm('Estas seguro de que deseas borrar este usuario?')" ><i class="fa fa-fw fa-trash"></i> Borrar</button>
                                        </form>
                                                    @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div class="pagination justify-content end">
                    {!! $usuarios->links() !!}
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
