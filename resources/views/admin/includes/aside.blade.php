<aside class="main-sidebar sidebar-dark-primary elevation-4" @if(Auth::user()->grade== 'enseignant') style="width: 300px !important" @endif>
    <!-- Brand Logo -->
    <a href="/acceuil" class="brand-link">
      <img src="{{ asset('front/assets//images/easy-learn.png') }}" width="200" alt="">

      
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('storage/'.Auth::user()->photo)}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
      @if(Auth::user()->grade == "admin")
          <a href="{{ url('admin/profile') }}" class="d-block"><strong>{{ Auth::user()->nom  }} {{ Auth::user()->prenom }}</strong> </a>

      @else 

          <a href="{{ url('enseignant/profile') }}" class="d-block"><strong>{{ Auth::user()->nom  }} {{ Auth::user()->prenom }}</strong> </a>
      @endif
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div><div class="sidebar-search-results"><div class="list-group"><a href="#" class="list-group-item">
        <div class="search-title">
          <b class="text-light"></b>N<b class="text-light"></b>o<b class="text-light"></b> <b class="text-light"></b>e<b class="text-light"></b>l<b class="text-light"></b>e<b class="text-light"></b>m<b class="text-light"></b>e<b class="text-light"></b>n<b class="text-light"></b>t<b class="text-light"></b> <b class="text-light"></b>f<b class="text-light"></b>o<b class="text-light"></b>u<b class="text-light"></b>n<b class="text-light"></b>d<b class="text-light"></b>!<b class="text-light"></b>
        </div>
        <div class="search-path">
          
        </div>
      </a></div></div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
      @if(Auth::user()->grade == 'admin')
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ url('acceuil') }}" class="nav-link @if(Request::is('acceuil')) active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Acceuil
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/users') }}" class="nav-link @if(Request::is('admin/users*')) active @endif">
              <i class="nav-icon fas fa-registered"></i>
              <p>
                {{ __('Gérer les inscriptions') }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/enseignants') }}" class="nav-link @if(Request::is('admin/enseignants*')) active @endif">
              <i class="nav-icon fas fa-chalkboard-teacher"></i>
              <p>
                {{ __('Gérer les enseignants') }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/etudiants') }}" class="nav-link @if(Request::is('admin/etudiants*')) active @endif">
              <i class="nav-icon fas fa-user-graduate"></i>
              <p>
                {{ __('Gérer les etudiants') }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/admins') }}" class="nav-link @if(Request::is('admin/admins*')) active @endif">
              <i class="nav-icon fas fa-user-graduate"></i>
              <p>
                {{ __('Gérer les administrateurs') }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/sections') }}" class="nav-link @if(Request::is('admin/sections*')) active @endif">
              <i class="nav-icon fas fa-puzzle-piece"></i>
              <p>
                {{ __('Gérer les sections') }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/modules') }}" class="nav-link @if(Request::is('admin/modules*')) active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                {{ __('Gérer les modules') }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/matieres') }}" class="nav-link @if(Request::is('admin/matieres*')) active @endif">
              <i class="nav-icon fas fa-book"></i>
              <p>
                {{ __('Gérer les matieres') }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/formations') }}" class="nav-link @if(Request::is('admin/formations*')) active @endif">
              <i class="nav-icon fas fa-book-reader"></i>
              <p>
                {{ __('Gérer  formations') }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/contacts') }}" class="nav-link @if(Request::is('admin/contacts*')) active @endif">
              <i class="nav-icon fas fa-book-reader"></i>
              <p>
                {{ __('Gérer  contacts') }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          
        </ul>
      @endif
      @if(Auth::user()->grade == 'enseignant')
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ url('acceuil') }}" class="nav-link @if(Request::is('acceuil')) active @endif">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Acceuil
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-item @if(Request::is('enseignant/matieres') || Request::is('enseignant/cours') || Request::is('enseignant/tp') || Request::is('enseignant/td') ||  Request::is('*chapitres') || Request::is('*travaux_diriges') ||  Request::is('*travaux_pratiques')) menu-is-opening menu-open @endif">
            <a href="#" class="nav-link  @if(Request::is('enseignant/matiere*') || Request::is('enseignant/cours') || Request::is('enseignant/tp') || Request::is('enseignant/td')) active @endif">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Gérer matières
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" @if(Request::is('enseignant/matieres')) style="display: block;" @else  style="display: none;" @endif>
              <li class="nav-item @if(Request::is('enseignant/matieres')) active_treeview @endif">
                <a href="{{ url('enseignant/matieres') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Consulter matières</p>
                </a>
              </li>
              <li class="nav-item @if(Request::is('enseignant/cours') || Request::is('*chapitres')) active_treeview @endif">
                <a href="{{ url('enseignant/cours') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Gérer chapitres</p>
                </a>
              </li>
              <li class="nav-item @if(Request::is('enseignant/tp') ||   Request::is('*travaux_pratiques')) active_treeview @endif">
                <a href="{{ url('enseignant/tp') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Gérer travaux pratiques</p>
                </a>
              </li>
              <li class="nav-item @if(Request::is('enseignant/td') ||  Request::is('*travaux_diriges')) active_treeview @endif">
                <a href="{{ url('enseignant/td') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Gérer travaux dirigés</p>
                </a>
              </li>
            </ul>
          </li>

          
          <li class="nav-item">
            <a href="{{ url('enseignant/quizzes') }}" class="nav-link @if(Request::is('enseignant/quizze*')) active @endif">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                {{ __('Gérer  quizzes') }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('enseignant/contacts/create') }}" class="nav-link @if(Request::is('enseignant/contacts/create*')) active @endif">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                {{ __('Contacter l\'admininstrateur') }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
     
          
        
          
            <!-- <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="./index.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index3.html" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v3</p>
                </a>
              </li>
            </ul> -->
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
        </ul>
      @endif
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>