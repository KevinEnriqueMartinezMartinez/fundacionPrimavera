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
    <a href="{{ url('evaluaciones') }}" class="nav-link {{ Request::is('evaluaciones*') ? 'active' : '' }}">
        <i class="nav-icon fa fa-list-alt"></i>
        <p>Evaluaciones Realizadas</p>
    </a>
</li>

<li class="nav-item">
    <a href="#" class="nav-link {{ Request::is('reportes*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-cube"></i>
        <p>
            Reportes
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ url('reportes/alertas') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Alertas Críticas</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('reportes/tecnicos') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Evaluaciones Técnicos</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('reportes/indicadores') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Indicadores</p>
            </a>    
        </li>
        <li class="nav-item">
            <a href="{{ url('reportes/dimensiones') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Dimensiones</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('reportes/comunidades') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Comunidades</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('reportes/beneficiario') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Beneficiario</p>
            </a>
        </li>
    </ul>
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
