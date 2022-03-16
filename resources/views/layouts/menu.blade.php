<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="/home">
        <i class=" fas fa-building"></i><span>Dashboard</span>
    </a>
    @can('ver-usuario')
    <a class="nav-link" href="/usuarios">
        <i class=" fas fa-user"></i><span>Usuarios</span>
    </a>
    @endcan
    
    @can('ver-rol')
    <a class="nav-link" href="/roles">
        <i class=" fas fa-lock"></i><span>Oficinas</span>
    </a>
    @endcan
    @can('ver-documento')
    <a class="nav-link" href="/documents">
        <i class="fas fa-file"></i><span>Documentos</span>
    </a>
    <a class="nav-link" href="/documento/finalizados">
        <i class="fas fa-file"></i><span>DocumentosFinalizados</span>
    </a>
    <a class="nav-link" href="/documento/rechazados">
        <i class="fas fa-file"></i><span>DocumentosRechazados</span>
    </a>
    @endcan
    
    @can('ver-tipo')
    <a class="nav-link" href="/tipos">
        <i class="fas fa-file-alt"></i><span>Tipos</span>
    </a>
    @endcan
    
</li>
