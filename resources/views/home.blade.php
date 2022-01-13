@extends('layouts.app')



@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Bienvenido <h3 id="name_heading_welcome">{{ Auth::user()->name }}</h3></h3>
        </div>
		

			<div class="page-content">
				<div class="container-fluid">					
					<div class="row">
						<div class="col-xl-3 col-md-6">
							<!-- card -->
							<div class="card card-h-100">
								<!-- card body -->
								<div class="card-body">
									
										<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#3f80ea" class="bi bi-upc float-right" viewBox="0 0 16 16">
										<path d="M3 4.5a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-7zm3 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7z"/>
								  		</svg>
									
									<div class="row align-items-center">
										<div class="col-6 ">
											<span class="text-muted mb-3 lh-1 d-block text-truncate pr-1pro">Productos</span>
											<h4 class="mb-3">
												@php
												use App\Models\Producto;
												$cant_producto = Producto::count();
												@endphp
										<span class="counter-value">{{$cant_producto}}</span>
											</h4>
										</div>
	
										<div class="col-6">
											<div class="resize-triggers"><div class="expand-trigger"><div style="width: 180px; height: 100px;"></div></div><div class="contract-trigger"></div></div></div>
									</div>
									<div class="text-nowrap">
										<span></span>
										<a href="/productos" class="quittext-t ms-1 text-muted font-size-13 ">Ver más</a>
									</div>
								</div><!-- end card body -->
							</div><!-- end card -->
						</div><!-- end col -->
	
						<div class="col-xl-3 col-md-6">
							<!-- card -->
							<div class="card card-h-100">
								<!-- card body -->
								<div class="card-body"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#3f80ea" class="bi bi-calendar2 float-right" viewBox="0 0 16 16">
									<path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z"/>
									<path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z"/>
								  </svg>
									
									<div class="row align-items-center">
										<div class="col-6">
											<span class="text-muted mb-3 lh-1 d-block text-truncate pr-1pro">Resguardos</span>
											<h4 class="mb-3">
												@php
														use App\Models\Resguardo;
													    $cant_resguardo = Resguardo::count();
													    @endphp
												<span class="counter-value">{{$cant_resguardo}}</span>
											</h4>
										</div>
										<div class="col-6">
												<div class="resize-triggers"><div class="expand-trigger"><div style="width: 115px; height: 100px;"></div></div><div class="contract-trigger"></div></div></div>
									</div>
									<div class="text-nowrap">
										<span></span>
										<a href="/resguardos" class="quittext-t ms-1 text-muted font-size-13">Ver más</a>
									</div>
								</div><!-- end card body -->
							</div><!-- end card -->
						</div><!-- end col-->
	
						<div class="col-xl-3 col-md-6">
							<!-- card -->
							<div class="card card-h-100">
								<!-- card body -->
								<div class="card-body"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#3f80ea" class="bi bi-hand-thumbs-up float-right" viewBox="0 0 16 16">
									<path d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2.144 2.144 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a9.84 9.84 0 0 0-.443.05 9.365 9.365 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111L8.864.046zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a8.908 8.908 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.224 2.224 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.866.866 0 0 1-.121.416c-.165.288-.503.56-1.066.56z"/>
								  </svg>
									<div class="row align-items-center ">
										<div class="col-6 ">
											<span class="text-muted mb-3 lh-1 d-block text-truncate pr-1pro">Prestamos</span>
											<h4 class="mb-3">
												@php
														use App\Models\Prestamo;
													    $cant_prestamo = Prestamo::count();
													    @endphp
												<span class="counter-value">{{$cant_prestamo}}</span>
											</h4>
										</div>
										<div class="col-6">
											<div class="resize-triggers"><div class="expand-trigger"><div style="width: 115px; height: 100px;"></div></div><div class="contract-trigger"></div></div></div>
									</div>
									<div class="text-nowrap">
										<span></span>
										<a href="/prestamos" class="quittext-t ms-1 text-muted font-size-13t">Ver más</a>
									</div>
								</div><!-- end card body -->
							</div><!-- end card -->
						</div><!-- end col -->
	
						<div class="col-xl-3 col-md-6">
							<!-- card -->
							<div class="card card-h-100">
								<!-- card body -->
								<div class="card-body"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#3f80ea" class="bi bi-book float-right" viewBox="0 0 16 16">
									<path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
								  </svg>
									<div class="row align-items-center">
										<div class="col-6">
										
											<span class="text-muted mb-3 lh-1 d-block text-truncate pr-1pro">Modelos</span>
											<h4 class="mb-3">
												@php
														use App\Models\Modelo;
													    $cant_modelo = Modelo::count();
													    @endphp
												<span class="counter-value">{{$cant_modelo}}</span>
											</h4>
										</div>
										<div class="col-6">
											
										<div class="resize-triggers"><div class="expand-trigger"><div style="width: 115px; height: 100px;"></div></div><div class="contract-trigger"></div></div></div>
									</div>
									<div class="text-nowrap">
										<span></span>
										<a href="/modelos" class="quittext-t ms-1 text-muted font-size-13">Ver más</a>
									</div>
								</div><!-- end card body -->
							</div><!-- end card -->
						</div><!-- end col -->    
					</div><!-- end row-->

					
						
					
						<div class="row">
							<div class="col-xl-4">
								<!-- card -->
								<div class="card card-h-100">
									<!-- card body -->
									<div class="card-body"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#3f80ea" class="bi bi-check-circle float-right" viewBox="0 0 16 16">
										<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
										<path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
									  </svg>
										<div class="d-flex flex-wrap align-items-center mb-4">
											<h5 class="card-title me-2">Registros de las marcas</h5>
											
										</div>
	
										<div class="row align-items-center">
											
											<div class="col-sm align-self-center">
												<div class="mt-4 mt-sm-0">
													<div>
														<p class="mb-2"><i class="mdi mdi-circle align-middle font-size-10 me-2 text-success"></i> Estados</p>
														@php
														use App\Models\Estado;
													    $cant_estado = Estado::count();
													    @endphp
														<h6>{{$cant_estado}}</h6>
													</div>
	
													<div class="mt-4 pt-2">
														<p class="mb-2"><i class="mdi mdi-circle align-middle font-size-10 me-2 text-primary"></i> Marcas</p>
														@php
														use App\Models\Marca;
													    $cant_marca = Marca::count();
													    @endphp
														<h6>{{$cant_marca}}</h6>
													</div>
	
													<div class="mt-4 pt-2">
														<p class="mb-2"><i class="mdi mdi-circle align-middle font-size-10 me-2 text-info"></i> Categorias</p>
														@php
														use App\Models\Categoria;
													    $cant_categoria = Categoria::count();
													    @endphp
														<h6>{{$cant_categoria}}</h6>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- end card -->
							</div>
							<div class="col-xl-4">
								<!-- card -->
								<div class="card card-h-100">
									<!-- card body -->
									<div class="card-body"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#3f80ea" class="bi bi-geo-alt float-right" viewBox="0 0 16 16">
										<path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
										<path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
									  </svg>
										<div class="d-flex flex-wrap align-items-center mb-4">
												<h5 class="card-title me-2">Registro de lugares</h5>
											
										</div>
	
										<div class="row align-items-center">
											
											<div class="col-sm align-self-center">
												<div class="mt-4 mt-sm-0">
													<div>
														<p class="mb-2"><i class="mdi mdi-circle align-middle font-size-10 me-2 text-success"></i> Edificios</p>
														@php
														use App\Models\Edificio;
													    $cant_edificio = Edificio::count();
													    @endphp
														<h6>{{$cant_edificio}}</h6>
													</div>
	
													<div class="mt-4 pt-2">
														<p class="mb-2"><i class="mdi mdi-circle align-middle font-size-10 me-2 text-primary"></i> Plantas</p>
														@php
														use App\Models\Planta;
													    $cant_planta = Planta::count();
													    @endphp
														<h6>{{$cant_planta}}</h6>
													</div>
	
													<div class="mt-4 pt-2">
														<p class="mb-2"><i class="mdi mdi-circle align-middle font-size-10 me-2 text-info"></i> Áreas</p>
														@php
														use App\Models\Area;
													    $cant_area = Area::count();
													    @endphp
														<h6>{{$cant_area}}</h6>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- end card -->
							</div>
							<div class="col-xl-4">
								<!-- card -->
								<div class="card card-h-100">
									<!-- card body -->
									<div class="card-body"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#3f80ea" class="bi bi-info-circle float-right" viewBox="0 0 16 16">
										<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
										<path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
									  </svg>
										<div class="d-flex flex-wrap align-items-center mb-4">
											<h5 class="card-title me-2">Otros registros</h5>
											
										</div>
	
										<div class="row align-items-center">
											
											<div class="col-sm align-self-center">
												<div class="mt-4 mt-sm-0">
													<div>
														<p class="mb-2"><i class="mdi mdi-circle align-middle font-size-10 me-2 text-success"></i> Tipos de altas</p>
														@php
														use App\Models\Tipoalta;
													    $cant_tipoalta = Tipoalta::count();
													    @endphp
														<h6>{{$cant_tipoalta}}</h6>
													</div>
	
													<div class="mt-4 pt-2">
														<p class="mb-2"><i class="mdi mdi-circle align-middle font-size-10 me-2 text-primary"></i> Sub-categorias</p>
														@php
														use App\Models\Subcategoria;
													    $cant_subcategorias = Subcategoria::count();
													    @endphp
														<h6>{{$cant_subcategorias}}</h6>
													</div>
	
													<div class="mt-4 pt-2">
														<p class="mb-2"><i class="mdi mdi-circle align-middle font-size-10 me-2 text-info"></i>Usuarios</p>
														@php
                                                 		use App\Models\User;
                                                		$cant_user = User::count();
                                                		@endphp
														<h6>{{$cant_user}} </h6>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- end card -->
							</div>
						
						
						
						
						<div class="content container-fluid"><div class="card card-table flex-fill">
							<div class="card-header">
							<h4 class="card-title">Historial de productos</h4><i class="far fa-clock"></i>
							</div>
							<div class="card-body">
							<div class="table-responsive">
							<table class="table table-center" id="productos">
								<thead class="table-light">
									<tr>
											<th>Encargado</th>
											<th>Marca</th>
											<th>Modelo</th>
											<th>N. Inventario</th>
											<th>N. Serie</th>
											<th>Ubicacion</th>
											<th>Fecha de creacion</th>
											<th>Ultima modificacion</th>
											</tr>
									</thead>
									<tbody>
										
										@foreach ($productos as $producto)
										<tr>	
												<td>{{ $producto->user->name }}</td>
												<td>{{ $producto->marca->name }}</td>
												<td>{{ $producto->modelo->modelo }}</td>
												<td>{{ $producto->num_inventario }}</td>
												<td>{{ $producto->num_serie }}</td>
												<td>{{ $producto->area->name }}</td>
												<td>{{ $producto->fecha_alta }}</td>
												<td>{{ $producto->updated_at->diffForHumans()}}</td>
										</tr>
										@endforeach
										
									</tbody>
								</table>
							</div>
						
							</div>
							</div>
							
							
							</div>
							
							
							
							</div>
							</div>
						

							</main>



                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection


