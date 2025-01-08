<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">


        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
        <style>
          
        </style>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

<nav class="main-header navbar navbar-expand-md navbar-white">
      <div class="me-4">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
      </div>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="d-flex justify-content-between w-100 me-4">
                <!-- Parte Izquierda -->
                <div class="d-flex align-items-center">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                        </li>
                        <li class="nav-item">
                          <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                              <p>
                                  Inicio               
                              </p>
                          </a>
                        </li>
                    </ul>
                </div>

                 <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>Opciones</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('admin.profile.edit')">
                            {{ __('Perfil') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('admin.logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('admin.logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
                

        <!-- Responsive Navigation Menu -->

    <div class="d-md-none">
    <div class="pt-4 pb-1 border-t border-gray-200">
        <div class="px-4">
            <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
            <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
        </div>

        <div class="mt-3 space-y-1">
            <x-responsive-nav-link :href="route('admin.profile.edit')">
                {{ __('Profile') }}
            </x-responsive-nav-link>

            <!-- Authentication -->
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <x-responsive-nav-link :href="route('admin.logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-responsive-nav-link>
            </form>
        </div>
    </div>
</div>
</nav>
  <!-- /.navbar -->


<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3">
        <div class="image">
          <img src="/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image" style="width: 40px; hight: 40px;">
        </div>
        <div class="info">
          <h1 style="color: white;">{{ Auth::user()->name }}</h1>
        </div>
      </div>

      <!-- SidebarSearch Form -->
     

      <!-- Sidebar Menu -->
      <nav class="mt-2">
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Buscar" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
          <x-side :href="route('admin.student.view')" :active="request()->routeIs('admin.student.view')" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>{{ __('Panel estudiantes') }}</p>
                </x-side>
          </li>
        
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Grados
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
              <x-side :href="route('admin.grades.first')" :active="request()->routeIs('admin.grades.first')" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('1er Grado') }}</p>
              </x-side>
          </li>
          <li class="nav-item">
              <x-side :href="route('admin.grades.second')" :active="request()->routeIs('admin.grades.second')" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('2do Grado') }}</p>
              </x-side>
          </li>
          <li class="nav-item">
              <x-side :href="route('admin.grades.third')" :active="request()->routeIs('admin.grades.third')" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('3er Grado') }}</p>
              </x-side>
          </li>
          <li class="nav-item">
              <x-side :href="route('admin.grades.fourth')" :active="request()->routeIs('admin.grades.fourth')" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('4to Grado') }}</p>
              </x-side>
          </li>
          <li class="nav-item">
              <x-side :href="route('admin.grades.fifth')" :active="request()->routeIs('admin.grades.fifth')" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('5to Grado') }}</p>
              </x-side>
          </li>
          <li class="nav-item">
              <x-side :href="route('admin.grades.sixth')" :active="request()->routeIs('admin.grades.sixth')" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('6to Grado') }}</p>
              </x-side>
          </li>
            </ul>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Usuarios
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('register') }}" class="nav-link {{ request()->routeIs('register') ? 'active' : '' }}">
              <i class="far fa-circle nav-icon"></i>
                <p><span style="font-weight: 500;">Registrar usuario</span></p>
              </a>
            </li>
            <li class="nav-item">
            <x-side :href="route('admin.usuarios.representante')" :active="request()->routeIs('admin.usuarios.representante')" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('Representante') }}</p>
              </x-side>
              </li>
              <li class="nav-item">
              <x-side :href="route('admin.usuarios.profesor')" :active="request()->routeIs('admin.usuarios.profesor')" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('Profesor') }}</p>
              </x-side>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Forms
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/forms/general.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>General Elements</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/forms/advanced.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Advanced Elements</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/forms/editors.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Editors</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/forms/validation.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Validation</p>
                </a>
              </li>
            </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

