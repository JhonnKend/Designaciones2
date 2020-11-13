@extends('layouts.app4')
@section('content')
<div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
        </div>
        <div class="sidebar-brand-text mx-3">Designaciones</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item">
        <a class="nav-link" href="/">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Panel de Control</span></a>
      </li>
	  <hr class="sidebar-divider">
	  @can('index_configurations')
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="far fa-fw fa-window-maximize"></i>
          <span>Configuracion</span>
        </a>
        <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item load_url" href="{{ route('index_departments') }}">Departamentos</a>
            <a class="collapse-item load_url" href="{{ route('index_provinces') }}">Privincias</a>
            <a class="collapse-item load_url" href="{{ route('index_municipalities') }}">Municipios</a>
            <a class="collapse-item load_url" href="{{ route('index_communities') }}">Comunidades</a>
          </div>
        </div>
	  </li>
	  @endcan
	  @can('index_medicalCenter')
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true"
          aria-controls="collapseTable">
          <i class="fas fa-fw fa-table"></i>
          <span>G. Centros Medicos</span>
        </a>
        <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item load_url" href="{{ route('index_medicalCenter') }}">Centros Medicos</a>
          </div>
        </div>
	  </li>
	  @endcan
	  @can('index_universities')
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUni" aria-expanded="true"
          aria-controls="collapseUni">
          <i class="fas fa-fw fa-table"></i>
          <span>G. Universidades</span>
        </a>
        <div id="collapseUni" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
			<a class="collapse-item load_url" href="{{ route('index_universities') }}">Universidades</a>
			<a class="collapse-item load_url" href="{{ route('index_faculties') }}">Facultades</a>
			<a class="collapse-item load_url" href="{{ route('index_careers') }}">Carreras</a>
          </div>
        </div>
	  </li>
	  @endcan
	  @can('index_institutes')
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInst" aria-expanded="true"
          aria-controls="collapseInst">
          <i class="fas fa-fw fa-table"></i>
          <span>G. Institutos</span>
        </a>
        <div id="collapseInst" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
			<a class="collapse-item load_url" href="{{ route('index_institutes') }}">Institutos</a>
			<a class="collapse-item load_url" href="{{ route('index_careers_institutes') }}">Carreras</a>
          </div>
        </div>
	  </li>
	  @endcan
	  @can('index_students')
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage" aria-expanded="true"
          aria-controls="collapsePage">
          <i class="fas fa-fw fa-columns"></i>
          <span>Gestión Estudiantes</span>
        </a>
        <div id="collapsePage" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item load_url" href="{{ route('index_students') }}">Estudiantes</a>
          </div>
        </div>
	  </li>
    @endcan
    @can('index_designations')
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse_designations" aria-expanded="true"
          aria-controls="collapse_designations">
          <i class="fas fa-fw fa-columns"></i>
          <span>Gestión Disgnaciones</span>
        </a>
        <div id="collapse_designations" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item load_url" href="{{ route('index_internship_types') }}">Tipos de Internado</a>
            <a class="collapse-item load_url" href="{{ route('index_quotas') }}">Cupos</a>
          </div>
        </div>
	  </li>
	  @endcan
    @can('designation')
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse_designation" aria-expanded="true"
          aria-controls="collapse_designation">
          <i class="fas fa-fw fa-columns"></i>
          <span>Designacionar</span>
        </a>
        <div id="collapse_designation" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item load_url" href="{{ route('index_internship_draw') }}">Ver Designaciones</a>
            <a class="collapse-item load_url" href="{{ route('start_designation') }}">Sorteo Internados</a>
          </div>
        </div>
      </li>
    @endcan
	  @can('index_users')
	  <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage_user" aria-expanded="true"
          aria-controls="collapsePage_user">
          <i class="fas fa-fw fa-columns"></i>
          <span>Gestión Usuarios</span>
        </a>
        <div id="collapsePage_user" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item load_url" href="{{ route('index_users') }}">Usuarios</a>
          </div>
        </div>
	  </li>
    @endcan
    @can('administrar_universidades')
	  <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage_index_university" aria-expanded="true"
          aria-controls="collapsePage_index_university">
          <i class="fas fa-fw fa-columns"></i>
          <span>Universidades</span>
        </a>
        <div id="collapsePage_index_university" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item load_url" href="{{ route('view_perfil') }}"> Ver Perfil Univesidad</a>
            <a class="collapse-item load_url" href="{{ route('index_my_faculties') }}">Mis Facultades</a>
			      <a class="collapse-item load_url" href="{{ route('index_my_careers') }}">Mis Carreras</a>
          </div>
        </div>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage_perfil_students" aria-expanded="true"
        aria-controls="collapsePage_perfil_students">
        <i class="fas fa-fw fa-columns"></i>
        <span>Mis Estudiantes</span>
      </a>
      <div id="collapsePage_perfil_students" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item load_url" href="{{ route('view_students_university') }}"> Ver Estudiantes</a>
          <a class="collapse-item load_url" href="{{ route('register_new_student') }}"> Registrar Estudiantes</a>
        </div>
      </div>
  </li>
	  @endcan     
	  @can('index_roles')
	  <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage_roles" aria-expanded="true"
          aria-controls="collapsePage_roles">
          <i class="fas fa-fw fa-columns"></i>
          <span>Gestión Roles</span>
        </a>
        <div id="collapsePage_roles" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item load_url" href="{{ route('index_roles') }}">Roles</a>
          </div>
        </div>
	  </li>
    @endcan      
    <hr class="sidebar-divider">
    <div class="version" id="version-ruangadmin">Version 1.0.3</div>
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
            
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="ml-2 d-none d-lg-inline text-white small"> {{ Auth::user()->name }} </span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                
                <div class="dropdown-divider"></div>
                @guest
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                @else
                    <a class="dropdown-item" href="{{ route('logout') }}" 
                    onclick="event.preventDefault();
					document.getElementById('logout-form').submit();">
					<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Cerrar Sesión
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                @endguest    
                
              </div>
            </li>
          </ul>
        </nav>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
			<div id="global_content"></div>


        </div>
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> - developed by
              <b><a href="https://indrijunanda.gitlab.io/" target="_blank">indrijunanda</a></b>
            </span>
          </div>
        </div>
      </footer>
      <!-- Footer -->
    </div>
  </div>
@endsection
