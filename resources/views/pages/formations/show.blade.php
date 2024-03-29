@extends('layouts.master')

@section('includes')
    @include('includes.header')
@endsection

@section('content')
<div class="rs-breadcrumbs breadcrumbs-overlay">
    <div class="breadcrumbs-img">
        <img src="{{asset('front/assets/images/breadcrumbs/2.jpg')}}" alt="Breadcrumbs Image">
    </div>
    <div class="breadcrumbs-text white-color">
        <h1 class="page-title">Commencer votre formation</h1>
        <ul>
            <li>
                <a class="active" href="index.html">Home</a>
            </li>
            <li>Course Details</li>
        </ul>
    </div>
</div>
<section class="intro-section gray-bg pt-94 pb-100 md-pt-64 md-pb-70 loaded">
    <div class="container">
        <div class="row clearfix">
            <!-- Content Column -->
            <div class="col-lg-8 md-mb-50">
                <!-- Intro Info Tabs-->
                <div class="intro-info-tabs">
                    <ul class="nav nav-tabs intro-tabs tabs-box" id="myTab" role="tablist">
                        <li class="nav-item tab-btns">
                            <a class="nav-link tab-btn active" id="prod-overview-tab" data-toggle="tab" href="#prod-overview" role="tab" aria-controls="prod-overview" aria-selected="false">Description</a>
                        </li>
                        <li class="nav-item tab-btns">
                            <a class="nav-link tab-btn " id="prod-curriculum-tab" data-toggle="tab" href="#prod-curriculum" role="tab" aria-controls="prod-curriculum" aria-selected="true">Videos</a>
                        </li>
                    </ul>
                    <div class="tab-content tabs-content" id="myTabContent">
                        <div class="tab-pane tab fade  active show" id="prod-overview" role="tabpanel" aria-labelledby="prod-overview-tab">
                            <div class="content white-bg pt-30">
                                <!-- Cource Overview -->
                                <div class="course-overview">
                                    <div class="inner-box">
                                        <h4>{{ $formation->titre }}</h4>
                                        <p>{{ $formation->description }}</p>
                                        <h3>ce que tu vas apprendre ?</h3>
                                        <ul class="review-list">
                                            @foreach($formation->videos as $video)
                                                <li>{{ $video->titre }}</li>
                                            @endforeach
                                        </ul>                                                                                                    
                                    </div>
                                </div>                                                
                            </div>
                        </div>
                        <div class="tab-pane fade" id="prod-curriculum" role="tabpanel" aria-labelledby="prod-curriculum-tab">
                            <div class="content">
                                <div id="accordion" class="accordion-box">
                                    <div class="card accordion block">
                                        <div class="card-header" id="headingOne">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link acc-btn" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Liste des vidéos</button>
                                            </h5>
                                        </div>

                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion" style="">
                                            <div class="card-body acc-content current">
                                                @if($formation->videos->count() > 0)
                                                    @foreach($formation->videos as $video)
                                                    <div class="content">
                                                        <div class="clearfix">
                                                            <div class="pull-left">
                                                            @php 
                                                                $link = $video->link;
                                                                $code = substr($link, strpos($link, 'v=')+2, 11);
                                                            @endphp
                                                                <a href="https://www.youtube.com/watch?v={{ $code }}"  class="video_showed popup-videos play-icon"><span class="fa fa-play"></span>{{ $video->titre }}</a>
                                                                <input type="hidden" value="{{ $video->id }}">
                                                            </div>
                                                            <div class="pull-right">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
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
                    @if($formation->videos->count() > 0)
                    <div class="intro-video media-icon orange-color2">
                        <img class="video-img" src="{{ asset('front/assets/images/about/about-video-bg2.png')}}" alt="Video Image">
                        @php 
                                $link = $formation->videos()->first()->link;
                                $code = substr($link, strpos($link, 'v=')+2, strpos($link, '&') - strpos($link, 'v=') - 2);
                        @endphp
                        <a class="popup-videos" href="https://www.youtube.com/watch?v={{ $code }}">
                            <i class="fa fa-play"></i>
                        </a>
                        <h4>Prévisualiser cette formation</h4>
                    </div>
                    @endif
                    <!-- End Video Box -->
                    <div class="btn-part" id="certificate">
                        @if($formation->videos->count() == App\Models\Participant::where('user_id', Auth::id())->first()->video_count)
                            <a href="{{ url('download_certificat/'.$formation->id) }}" class="btn readon2 orange-transparent">Télécharger certificat</a>
                        @else 
                            <p class="quiz_message">Voir toutes les vidéos afin de trouver votre certificat</p>
                        @endif
                    </div>
                </div>
            </div>                        
        </div>                
    </div>
</section>
@endsection

@section('js')
    <script>
        $(".video_showed").on('click', function(){
            var formation_id = "<?php echo $formation->id; ?>"
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:'get',
                url:'/videos/'+formation_id,
                success:function(data) {
                    if(data.success == true){
                        $("#certificate").empty();
                        $("#certificate").append(
                            '<a href="http://127.0.0.1:8000/download_certificat/'+data.formation_id+'" class="btn readon2 orange-transparent">Télécharger certificat</a>'
                        )
                    }
                    console.log("suceess");
                }    
            });
            $(this).removeClass( "video_showed" );
        });
    </script>
@endsection

