<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="/home">
        <i class=" fas fa-tachometer-alt"></i><span>Dashboard</span>
        
    </a>
    @if(@Auth::user()->hasRole('Administrador')||@Auth::user()->hasRole('Editor'))
    <a class="nav-link" href="/usuarios">
        <i class=" fas fa-users"></i><span>Usuarios</span>
        
    </a>
@endif
  
@if(@Auth::user()->hasRole('Administrador')||@Auth::user()->hasRole('Editor'))
    <a class="nav-link" href="/roles">
        <i class=" fas fa-user-lock"></i><span>Roles y permisos</span>
        
    </a>
    @endif
    @if(@Auth::user()->hasRole('Administrador')||@Auth::user()->hasRole('Editor'))
   <a class="nav-link" href="/edificios">
        <i class=" fas fa-building"></i><span>Edificios</span>
        
    </a>
    @endif
  @if(@Auth::user()->hasRole('Administrador')||@Auth::user()->hasRole('Editor'))
  <a class="nav-link" href="/plantas">
        <i class=" fas fa-bookmark"></i><span>Plantas</span>
        
        @endif
  @if(@Auth::user()->hasRole('Administrador')||@Auth::user()->hasRole('Editor'))
  <a class="nav-link" href="/areas">
        <i class=" fas fa-map-marker-alt"></i><span>Areas</span>
        
    </a>
    @endif
  @if(@Auth::user()->hasRole('Administrador')||@Auth::user()->hasRole('Editor'))
   <a class="nav-link" href="/resguardos">
        <i class=" fas fa-lock"></i><span>Resguardos</span>
        
    </a>
    @endif
  @if(@Auth::user()->hasRole('Administrador')||@Auth::user()->hasRole('Editor'))
   <a class="nav-link" href="/prestamos">
        <i class=" fas fa-handshake"></i><span>Prestamos</span>
        
    </a>
    @endif
  @if(@Auth::user()->hasRole('Administrador')||@Auth::user()->hasRole('Editor'))
  <a class="nav-link" href="/tipoaltas">
        <i class=" fas fa-file"></i><span>Tipo de Altas</span>
        
    </a>
    @endif
  @if(@Auth::user()->hasRole('Administrador')||@Auth::user()->hasRole('Editor'))
    <a class="nav-link" href="/estados">
        <i class=" fas fa-info-circle"></i><span>Estados</span>
        
    </a>
    @endif
  @if(@Auth::user()->hasRole('Administrador')||@Auth::user()->hasRole('Editor'))
   <a class="nav-link" href="/marcas">
        <i class=" fas fa-copyright"></i><span>Marcas</span>
        
    </a>
    @endif
  @if(@Auth::user()->hasRole('Administrador')||@Auth::user()->hasRole('Editor'))
  <a class="nav-link" href="/categorias">
        <i class=" fas fa-tags"></i><span>Categorias</span>
        
    </a>
    @endif
  @if(@Auth::user()->hasRole('Administrador')||@Auth::user()->hasRole('Editor'))
  <a class="nav-link" href="/subcategorias">
        <i class=" fas fa-tag"></i><span>Subcategorias</span>
        
    </a>
    @endif
  @if(@Auth::user()->hasRole('Administrador')||@Auth::user()->hasRole('Editor'))
  <a class="nav-link" href="/modelos">
        <i class=" fas fa-clipboard"></i><span>Modelos</span>
        
    </a>
    @endif
    
    <a class="nav-link" href="/productos">
        <i class=" fas fa-book-open"></i><span>Productos</span>
        
    </a>

</li>
