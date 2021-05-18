@extends('layouts.master')

@section('includes')
    @include('includes.header')
@endsection

@section('content')
 
    
    <!-- Breadcrumbs End -->            

    <!-- Intro Courses -->
    <section class="intro-section gray-bg pt-94 pb-100 md-pt-64 md-pb-70 loaded">
        <div class="container">
            <div class="row clearfix">
                <!-- Content Column -->
                <div class="col-lg-8 md-mb-50">
                    <!-- Intro Info Tabs-->
                    <div class="intro-info-tabs">
                        <ul class="nav nav-tabs intro-tabs tabs-box" id="myTab" role="tablist">
                            
                            <li class="nav-item tab-btns">
                                <a class="nav-link tab-btn active" id="prod-curriculum-tab" data-toggle="tab" href="#prod-curriculum" role="tab" aria-controls="prod-curriculum" aria-selected="true">Chapitres</a>
                            </li>
                            <li class="nav-item tab-btns">
                                <a class="nav-link tab-btn" id="prod-instructor-tab" data-toggle="tab" href="#prod-instructor" role="tab" aria-controls="prod-instructor" aria-selected="false">Enseignants</a>
                            </li>
                            
                            
                        </ul>
                        <div class="tab-content tabs-content" id="myTabContent">
                            
                            <div class="tab-pane fade active show" id="prod-curriculum" role="tabpanel" aria-labelledby="prod-curriculum-tab">
                                <div class="content">
                                    <div id="accordion" class="accordion-box">
                                    @foreach($matiere->chapitres as $key => $chapitre)
                                        <div class="card accordion block">
                                            <div class="card-header" id="headingOne">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link acc-btn collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">Chapitre {{ $key+1 }}</button>
                                                </h5>
                                            </div>
                                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion" style="">
                                                <div class="card-body acc-content current">
                                                    <div class="content">
                                                        <div class="clearfix">
                                                            <div class="pull-left">
                                                                @if($chapitre->type == "video")
                                                                <a class="popup-videos play-icon" href="https://www.youtube.com/watch?v=atMUy_bPoQI"><i class="fa fa-play"></i><strong>{{ $chapitre->titre }}</strong></a>
                                                                @else 
                                                                <a class=" play-icon" href="{{ url('download_chapitre/'.$chapitre->id) }}"><i class="fa fa-download"></i><strong>{{ $chapitre->titre }}</strong></a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @foreach($chapitre->activites as $activite)
                                                        @if($activite->type == 'td')
                                                        <div class="content">
                                                            <div class="clearfix">
                                                                <div class="pull-left">
                                                                    <a href="{{ url('download_activite/'.$activite->id) }}" class=" play-icon"><span class="fa fa-download"><i class="ripple"></i></span><strong>Travaux dirigé</strong></a>
                                                                </div>
                                                                <div class="pull-right">
                                                                    <div class="minutes">
                                                                        <a href="#" class="btn btn-primary">Mon travail</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @else 

                                                        <div class="content">
                                                            <div class="clearfix">
                                                                <div class="pull-left">
                                                                    <a href="{{ url('download_activite/'.$activite->id) }}" class=" play-icon"><span class="fa fa-download"><i class="ripple"></i></span><strong>Travaux pratique</strong></a>
                                                                </div>
                                                                <div class="pull-right">
                                                                    <div class="minutes">
                                                                        <a href="#" class="btn btn-primary">Mon travail</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    </div>                                             
                                </div>
                            </div>
                            <div class="tab-pane fade" id="prod-instructor" role="tabpanel" aria-labelledby="prod-instructor-tab">
                                <div class="content pt-30 pb-30 pl-30 pr-30 white-bg">
                                    <h3 class="instructor-title">Enseignants</h3>
                                    <div class="row rs-team style1 orange-color transparent-bg clearfix">
                                        @if($matiere->has_tp == 1)
                                        <div class="col-lg-6 col-md-6 col-sm-12 sm-mb-30">
                                            <div class="team-item">
                                                @php 
                                                    $user_id = App\Models\Enseignant::find($matiere->tp->enseignant_id)->user_id;
                                                @endphp
                                                <img src="{{ asset('storage/'.App\Models\User::find($user_id)->photo)}}" alt="">
                                                <div class="content-part">
                                                    <h4 class="name"><a href="#">{{ App\Models\User::find($user_id)->nom }} {{ App\Models\User::find($user_id)->prenom }}</a></h4>
                                                    <span class="designation">{{  App\Models\User::find($user_id)->email }}</span>
                                                    <ul class="social-links">
                                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>                                                            
                                        @endif                                                         
                                        @if($matiere->has_td == 1)
                                        <div class="col-lg-6 col-md-6 col-sm-12 sm-mb-30">
                                            <div class="team-item">
                                                @php 
                                                    $user_id = App\Models\Enseignant::find($matiere->td->enseignant_id)->user_id;
                                                @endphp
                                                <img src="{{ asset('storage/'.App\Models\User::find($user_id)->photo)}}" alt="">
                                                <div class="content-part">
                                                    <h4 class="name"><a href="#">{{ App\Models\User::find($user_id)->nom }} {{ App\Models\User::find($user_id)->prenom }}</a></h4>
                                                    <span class="designation">{{  App\Models\User::find($user_id)->email }}</span>
                                                    <ul class="social-links">
                                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>                                                            
                                        @endif                                                         
                                    </div>  
                                </div>
                            </div>
                            
                            
                        </div>
                    </div>
                </div>
                
                <!-- Video Column -->
                <div class="video-column col-lg-4">
                    <div class="inner-column">
                    <!-- Video Box -->
                        
                        <!-- End Video Box -->
                        <div class="course-features-info">
                            <ul>
                                <li class="lectures-feature">
                                    <img src="{{ asset('images/document.png') }}" width="20" height="20" alt="">
                                    <span class="label">Chapitres</span>
                                    <span class="value">{{ $matiere->chapitres()->count() }}</span>
                                </li>
                                
                                <li class="quizzes-feature">
                                    <img src="{{ asset('images/exam.png') }}" width="20" height="20" alt="">
                                    <span class="label">Quizze</span>
                                    @if($matiere->quizze()->count() > 0)
                                        <span class="value">Oui</span>
                                    @else 
                                        <span class="value">Non</span>
                                    @endif
                                </li>
                                
                                <li class="duration-feature">
                                    <img src="{{ asset('images/document.png') }}" width="20" height="20" alt="">
                                    <span class="label">Travaux dirigés</span>
                                    <span class="value">{{ $matiere->activites()->where('type', 'td')->count() }}</span>
                                </li>
                                <li class="duration-feature">
                                    <img src="{{ asset('images/document.png') }}" width="20" height="20" alt="">
                                    <span class="label">Travaux pratiques</span>
                                    <span class="value">{{ $matiere->activites()->where('type', 'tp')->count() }}</span>
                                </li>
                                
                                <li class="students-feature">
                                    <img src="{{ asset('images/students.png') }}" width="20" height="20" alt="">
                                    <span class="label">Etudiants</span>
                                    <span class="value">{{ App\Models\Etudiant::where('section_id', Auth::user()->etudiant->section_id)->where('niveau', Auth::user()->etudiant->niveau)->count() }}</span>
                                </li>
                            </ul>
                        </div>
                        
                        <div class="btn-part">
                            @if($matiere->quizze)
                                @if(App\Models\Resultat::where('etudiant_id', Auth::user()->etudiant->id)->count() > 0)
                                    <p class="quiz_message">Vous avez passé ce quizze</p>
                                @else 
                                    <a href="{{ url('matiere/'.$matiere->id.'/quizze') }}" class="btn readon2 orange-transparent">Passer examen</a>
                                @endif
                            @else 
                                <p class="quiz_message">Il n'y a pas de quizze ajouté jusqu'à maintenant</p>
                            @endif
                        </div>
                    </div>
                </div>                        
            </div>                
        </div>
    </section>
    <!-- End intro Courses -->

    <!-- Newsletter section start -->
    
    <!-- Newsletter section end -->
@endsection

