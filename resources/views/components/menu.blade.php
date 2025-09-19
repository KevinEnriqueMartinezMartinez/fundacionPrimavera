<li class="nav-header">Menu</li>

<li class="nav-item">
    <a href="{{url('home')}}" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>Inicio</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{url('clase_articulos')}}" class="nav-link">
        <i class="nav-icon fa fa-archive"></i>
        <p>Clase Artículo</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{url('unidad_medidas')}}" class="nav-link">
        <i class="nav-icon fa fa-balance-scale"></i>
        <p>Unidad de Medida</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{url('tipo_articulos')}}" class="nav-link">
        <i class="nav-icon fa fa-cube"></i>
        <p>Tipo de Artículos</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{url('marcas')}}" class="nav-link">
        <i class="nav-icon fa fa-tag"></i>
        <p>Marcas</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{url('proveedores')}}" class="nav-link">
        <i class="nav-icon fa fa-truck"></i>
        <p>Proveedores</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{url('articulos')}}" class="nav-link">
        <i class="nav-icon fa fa-cube"></i>
        <p>Artículos</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{url('clientes')}}" class="nav-link">
        <i class="nav-icon fa fa-users"></i>
        <p>Clientes</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{url('transacciones_salida')}}" class="nav-link">
        <i class="nav-icon fa fa-cube"></i>
        <p>Salida de Artículos</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{url('reporte_mas_vendidos')}}" class="nav-link">
        <i class="nav-icon fa fa-cube"></i>
        <p>Reporte Artículos Vendidos</p>
    </a>
</li>

<li class=" nav-item">
    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
        <p>
            <i class="nav-icon fa fa-power-off"></i><span class="menu-title text-truncate">Cerrar Sesión</span>
        </p>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </a>
</li>