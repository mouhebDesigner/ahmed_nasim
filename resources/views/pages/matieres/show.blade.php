@extends('layouts.master')

@section('includes')
    @include('includes.header')
@endsection
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
@endsection

@section('content')
 
    
    <!-- Breadcrumbs End -->            

    <!-- Intro Courses -->
    <section class="intro-section gray-bg pt-94 pb-100 md-pt-64 md-pb-70 loaded">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if(session('success'))
                        <div class="alert alert_success">
                            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                            <strong>Succés! </strong>  {{ session('success') }}
                        </div>             
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <h2>{{ $matiere->titre }}</h2>
                </div>
            </div>
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
                                                                @php 
                                                                    $link = $chapitre->content;
                                                                    $code = substr($link, strpos($link, 'v=')+2, 11);
                                                                @endphp
                                                                <!-- NU_omO5KCOc -->
                                                                <!-- https://www.youtube.com/watch?v=NU_omO5KCOc&ab_channel=WataniaReplay -->
                                                             
                                                                <a class="popup-videos play-icon" href="https://www.youtube.com/watch?v={{ $code }}"><i class="fa fa-play"></i><strong>{{ $chapitre->titre }}</strong></a>
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
                                                                        <!-- Button trigger modal -->
                                                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#activite{{ $activite->id }}">
                                                                            Mon travail
                                                                        </button>

                                                                        <!-- Modal -->
                                                                        <div class="modal fade" id="activite{{ $activite->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLabel">Déposer votre travail</h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body styled-form">
                                                                                <form action="{{ url('activite/'.$activite->id.'/deposer') }}" method="post" enctype="multipart/form-data">
                                                                                @csrf
                                                                                
                                                                                <div class="form-group col-lg-12 mb-25">
                                                                                    <label for="fichier" class="fichier_label">Télécharger fichier</label>
                                                                                    <input type="file" id="fichier" name="fichier" value="{{ old('fichier') }}" class="input_file @error('fichier') error_input @enderror">
                                                                                    @error('fichier')
                                                                                        <span class="invalid-feedback" role="alert" style="display: inline">
                                                                                            <strong class="font-size_strong_strong">{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                                                                <button type="submit" class="btn btn-primary">Déposer</button>
                                                                            </div>
                                                                            </form>
                                                                            </div>
                                                                        </div>
                                                                        </div>
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
                                                                            <!-- Button trigger modal -->
                                                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#activite{{ $activite->id }}">
                                                                            Mon travail
                                                                        </button>

                                                                        <!-- Modal -->
                                                                        <div class="modal fade" id="activite{{ $activite->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLabel">Déposer votre travail</h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body styled-form">
                                                                                <form action="{{ url('activite/'.$activite->id.'/deposer') }}" method="post" enctype="multipart/form-data">
                                                                                @csrf
                                                                                <div class="form-group col-lg-12 mb-25">
                                                                                    <label for="fichier" class="fichier_label">Télécharger fichier</label>
                                                                                    <input type="file" id="fichier" name="fichier" value="{{ old('fichier') }}" class="input_file @error('fichier') error_input @enderror">
                                                                                    @error('fichier')
                                                                                        <span class="invalid-feedback" role="alert" style="display: inline">
                                                                                            <strong class="font-size_strong_strong">{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                                                                <button type="submit" class="btn btn-primary">Déposer</button>
                                                                            </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                        </div>
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
                                    <div class="row rs-team style1 orange-color transparent-bg clearfix">
                                                                                              
                                        @if($matiere->has_cour == 1)
                                            @php 
                                                $user_id = App\Models\Enseignant::find($matiere->cour->enseignant_id)->user_id;
                                            @endphp
                                            <div class="col-lg-6 col-md-6 col-sm-12 sm-mb-30">
                                            <h3 class="instructor-title">Enseignants de cours</h3>
                                                <div class="team-item">
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
                                        @if($matiere->has_td== 1)
                                            @php 
                                                $user_id_td = App\Models\Enseignant::find($matiere->td->enseignant_id)->user_id;
                                            @endphp
                                            @if($user_id_td != $user_id)
                                            <div class="col-lg-6 col-md-6 col-sm-12 sm-mb-30">
                                            <h3 class="instructor-title">Enseignants de travaux dirigé</h3>
                                                <div class="team-item">
                                                    <img src="{{ asset('storage/'.App\Models\User::find($user_id_td)->photo)}}" alt="">
                                                    <div class="content-part">
                                                        <h4 class="name"><a href="#">{{ App\Models\User::find($user_id_td)->nom }} {{ App\Models\User::find($user_id_td)->prenom }}</a></h4>
                                                        <span class="designation">{{  App\Models\User::find($user_id_td)->email }}</span>
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
                                        @endif                                                         
                                        @if($matiere->has_tp== 1)
                                            @php 
                                                $user_id_tp = App\Models\Enseignant::find($matiere->tp->enseignant_id)->user_id;
                                            @endphp
                                            @if($user_id_tp != $user_id && $user_id_tp != $user_id_td)

                                            <div class="col-lg-6 col-md-6 col-sm-12 sm-mb-30">
                                            <h3 class="instructor-title">Enseignants de travaux pratiques</h3>
                                                <div class="team-item">
                                                    <img src="{{ asset('storage/'.App\Models\User::find($user_id_tp)->photo)}}" alt="">
                                                    <div class="content-part">
                                                        <h4 class="name"><a href="#">{{ App\Models\User::find($user_id_tp)->nom }} {{ App\Models\User::find($user_id_tp)->prenom }}</a></h4>
                                                        <span class="designation">{{  App\Models\User::find($user_id_tp)->email }}</span>
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
                                @if($matiere->quizze->questions->count())
                                    @if(App\Models\Resultat::where('etudiant_id', Auth::user()->etudiant->id)->count() > 0)
                                        <p class="quiz_message">
                                            @php
                                                $note = App\Models\Resultat::where('etudiant_id', Auth::user()->etudiant->id)->where('quizze_id', $matiere->quizze->id)->first()->note;
                                                $percent = ($note / $matiere->quizze->questions->count()) * 100;
                                            @endphp

                                            Vous avez passé ce quizze avec un note de {{ round($percent) }}% 
                                            
                                        </p>
                                    @else 
                                        <a href="{{ url('matiere/'.$matiere->id.'/quizze') }}" class="btn readon2 orange-transparent">Passer examen</a>
                                    @endif
                                @else 

                                    <p class="quiz_message">Il n'y a pas de quizze ajouté jusqu'à maintenant</p>
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
    <!-- Button trigger modal -->
    <!-- End intro Courses -->

    <!-- Newsletter section start -->
    
    <!-- Newsletter section end -->
@endsection

