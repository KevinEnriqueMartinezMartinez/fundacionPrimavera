<li class="nav-header">Menu</li>

<li class="nav-item">
    <a href="{{ url('home') }}" class="nav-link {{ Request::is('home*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>Inicio</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ url('beneficiarios') }}" class="nav-link {{ Request::is('beneficiarios*') ? 'active' : '' }}">
        <i class="nav-icon fa fa-users"></i>
        <p>Beneficiarios</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ url('evaluacion-crear') }}" class="nav-link {{ Request::is('evaluacion-crear') ? 'active' : '' }}">
        <i class="nav-icon fa fa-chalkboard-teacher"></i>
        <p>Crear Evaluación</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ url('evaluaciones') }}" class="nav-link {{ Request::is('evaluaciones*') ? 'active' : '' }}">
        <i class="nav-icon fa fa-list-alt"></i>
        <p>Evaluaciones Realizadas</p>
    </a>
</li>

<li class=" nav-item">
    <a class="nav-link" href="{{ route('logout') }}"
        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
        <p>
            <i class="nav-icon fa fa-power-off"></i><span class="menu-title text-truncate">Cerrar Sesión</span>
        </p>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </a>
</li>
