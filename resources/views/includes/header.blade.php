<header id="rs-header" class="rs-header">
    <!-- Topbar Area Start -->
    <div class="topbar-area dark-parimary-bg">
        <div class="container pt-2 pb-2">
            <div class="row y-middle">
                <div class="col-md-7">
                    <ul class="topbar-contact">
                        <li>
                            <i class="flaticon-email"></i>
                            <a href="mailto:support@rstheme.com">isimg@isimg.rnu.tn</a>
                        </li>
                        <li>
                            <i class="flaticon-location"></i>
                            Campus universitaire – BP 122, 6033 Cité El Amel 4, Gabès, TUNISIE
                        </li>
                    </ul>
                </div>
                <div class="col-md-5 text-right">
                    <ul class="topbar-right">
                       
                        <li class="btn-part @guest @else d-flex @endif">
                        @guest
                            <a class="apply-btn" href="{{ url('login') }}">
                                <i class="fa fa-sign-in"></i>Se connecter
                            </a>
                        @else 
                            <a class="" href="{{ url('login') }}" style="
                                display: flex;
                                margin-right: 25px;
                                align-items: center;
                            ">
                                <img src="{{ asset('storage/'.Auth::user()->photo) }}" alt="" style="
                                    width: 50px;
                                    height: 50px;
                                    border-radius: 50px;
                                    margin-right: 10px;
                                ">
                                {{  Auth::user()->nom }} {{ Auth::user()->prenom }}
                            </a>

                            <a class="apply-btn" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Déconnecter') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar Area End -->

    <!-- Menu Start -->
    <div class="menu-area menu-sticky" style="box-shadow: 0px 0px 4px black;">
        <div class="container">
            <div class="row y-middle">
                <div class="col-lg-2">
                    <div class="logo-cat-wrap">
                        <div class="logo-part">
                            <a href="{{ url('/') }}">
                                <img src="http://127.0.0.1:8000/front/assets//images/easy-learn.png" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-10 text-right">
                    <div class="rs-menu-area">
                        <div class="main-menu">
                            <div class="mobile-menu">
                                <a class="rs-menu-toggle rs-menu-toggle-close">
                                    <i class="fa fa-bars"></i>
                                </a>
                            </div>
                            @guest 
                            <nav class="rs-menu rs-menu-close" style="height: 0px;">
                                <ul class="nav-menu">
                                    <li class="menu-item-has-children">
                                        <a href="{{ url('/') }}" class="active">Accueil</a>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#sections">Sections</a>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#formations">Formations</a>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#enseignant">Enseignants</a>
                                    </li>
                                    
                                    <li class="menu-item-has-children">
                                        <a href="{{ url('forums') }}">forum</a>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="{{ url('contact') }}" class="@if(Request::is('contact')) active @endif">Contact</a>
                                    </li>
                                </ul> <!-- //.nav-menu -->
                            </nav>  
                            @else 
                            <nav class="rs-menu rs-menu-close" style="height: 0px;">
                                <ul class="nav-menu">
                                    <li class="menu-item-has-children">
                                        <a href="{{ url('/') }}" class="@if(Request::is('home')) active @endif">Accueil</a>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="{{ url('/modules') }}" class="@if(Request::is('modules')) active @endif">Modules</a>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="{{ url('/matieres') }}" class="@if(Request::is('matieres*')) active @endif">Matière</a>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="{{ url('formations') }}" class="@if(Request::is('formations*')) active @endif">Formations</a>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="{{ url('forums') }}" class="@if(Request::is('forum')) active @endif">forum</a>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="{{ url('contact') }}" class="@if(Request::is('contact')) active @endif">Contact</a>
                                    </li>
                                </ul> <!-- //.nav-menu -->
                            </nav>  
                            @endif                                       
                        </div> <!-- //.main-menu -->                                
                    </div>
                </div>
               
            </div>
        </div>
    </div>
    <!-- Menu End --> 

    <!-- Canvas Menu start -->
    
    <!-- Canvas Menu end -->
</header>