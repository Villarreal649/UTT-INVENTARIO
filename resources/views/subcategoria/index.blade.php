@extends('layouts.app')

@section('template_title')
    Sub-Categoria
@endsection


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
                                <div class="head-text">Sub-categorias</div>
                            </div>
                        @if ($message = Session::get('success'))
                                    <div class="alert alert-success">
                                        <p>{{ $message }}</p>
                                    </div>
                                @endif
                            @can('crear-rol')

                            <div class="float-right">
                                <a href="{{ route('subcategorias.create') }}" class="btn btn-warning">
                                {{ __('Agregar ') }} <i class="fa fa-plus"></i>
                                </a>
                              </div>
                            @endcan
                        <div class="table-responsive">
                        <table class="table table-striped table-hover mt-2" id="subcategorias">
                                <thead class="table-light">
                                <tr>
                                        <th>No</th>

										<th>Nombre de subcategoría</th>
										<th>Pertenece a la categoría</th>
                                        <th>Acciones</th>

                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subcategorias as $subcategoria)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $subcategoria->name }}</td>
											<td>{{ $subcategoria->categoria->name }}</td>
                                            <td>

                                            
                                            @can('editar-subcategoria')
                                            <a class="btn btn-sm btn-success mt-2" href="{{ route('subcategorias.edit',$subcategoria->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                            @endcan

                                            @can('borrar-subcategoria')
                                            <form action="{{ route('subcategorias.destroy',$subcategoria->id) }}" method="POST"style="display:inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm mt-2" onclick="
                                            return confirm('Estas seguro de que deseas borrar esta subcategoria?')" ><i class="fa fa-fw fa-trash"></i> Borrar</button>
                                        </form>
                                                    @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div class="pagination justify-content end">
                    {!! $subcategorias ->links() !!}
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
