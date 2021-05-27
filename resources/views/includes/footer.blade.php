<footer id="rs-footer" class="rs-footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                        <img src="http://127.0.0.1:8000/front/assets//images/easy-learn.png" style="
                            position: relative;
                            right: 80px;
                        " alt="">
                        
  

                </div>
                <div class="col-lg-3 col-md-12 col-sm-12 footer-widget md-mb-50">
                    <h4 class="widget-title">Formation</h4>
                    <ul class="site-map">
                        @foreach(App\Models\Formation::all() as $formation)
                            <li><a href="{{ url('formations/'.$formation->id.'/show') }}">{{ $formation->titre }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12 footer-widget md-mb-50">
                    <h4 class="widget-title">Menu</h4>
                    <ul class="site-map">
                        @guest 
                            <li class="">
                                <a href="{{ url('/') }}" class="active">Accueil</a>
                            </li>
                            <li class="">
                                <a href="#sections">Sections</a>
                            </li>
                            <li class="">
                                <a href="#formations">Formations</a>
                            </li>
                            <li class="">
                                <a href="#enseignant">Enseignants</a>
                            </li>
                            
                            <li class="">
                                <a href="{{ url('forums') }}">forum</a>
                            </li>
                            <li class="">
                                <a href="{{ url('contact') }}" class="@if(Request::is('contact')) active @endif">Contact</a>
                            </li>
                        @else
                            <li class="">
                                <a href="{{ url('/') }}" class="@if(Request::is('home')) active @endif">Accueil</a>
                            </li>
                            <li class="">
                                <a href="{{ url('/modules') }}" class="@if(Request::is('modules')) active @endif">Modules</a>
                            </li>
                            <li class="">
                                <a href="{{ url('/matieres') }}" class="@if(Request::is('matieres*')) active @endif">Matière</a>
                            </li>
                            <li class="">
                                <a href="{{ url('formations') }}" class="@if(Request::is('formations*')) active @endif">Formations</a>
                            </li>
                            <li class="">
                                <a href="{{ url('forums') }}" class="@if(Request::is('forum')) active @endif">forum</a>
                            </li>
                            <li class="">
                                <a href="{{ url('contact') }}" class="@if(Request::is('contact')) active @endif">Contact</a>
                            </li>
                        @endif
                    </ul>
                </div>
                
                <div class="col-lg-3 col-md-12 col-sm-12 footer-widget">
                    <h4 class="widget-title">Contact</h4>
                    <ul class="address-widget">
                        <li>
                            <i class="flaticon-location"></i>
                            <div class="desc">Campus universitaire – BP 122, 6033 Cité El Amel 4, Gabès, TUNISIE</div>
                        </li>
                        <li>
                            <i class="flaticon-call"></i>
                            <div class="desc">
                                <a href="tel:(123)-456-7890">
                                Tél: (00216) 75 394 229 
                                </a> 
                                <a href="tel:(123)-456-7890">
                                Fax: (00216) 75 394 309
                                </a>
                            </div>
                        </li>
                        <li>
                            <i class="flaticon-email"></i>
                            <div class="desc">
                                <a href="mailto:infoname@gmail.com">isimg@isimg.rnu.tn</a> , 
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
  
</footer>