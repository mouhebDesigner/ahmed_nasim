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
        <div class="row">
            <div class="col-lg-8 offset-lg-2 md-mb-50">
                <div class="d-flex justify-content-between">
                    <div class="sec-title mb-60 md-mb-30">
                        <div class="sub-title primary">Sujets </div>
                    </div>
                    <a href="{{ url('forums/create') }}" class="btn-add">
                        Créer sujet <i class="fa fa-plus"></i>
                    </a>
                </div>
            </div>

        </div>
        <div class="row clearfix">
            <!-- Content Column -->
            <div class="col-lg-8 offset-lg-2 md-mb-50">
                <!-- Intro Info Tabs-->
                <div class="intro-info-tabs">
                    
                    <div class="tab-content tabs-content" id="myTabContent">
                        <div class="tab-pane tab fade  active show" id="prod-overview" role="tabpanel" aria-labelledby="prod-overview-tab">
                                @foreach($forums as $forum)
                                    <div class="content white-bg pt-30 mt-5 forum_block">
                                        <!-- Cource Overview -->
                                        <a href="{{ url('forums/'.$forum->id.'/show') }}" class=" course-overview">
                                            <div class="inner-box">
                                                <div class="user">
                                                    <img src="{{ asset('storage/'.$forum->user->photo)}}" alt="">
                                                    <div class="name_date">
                                                        <p>{{ $forum->user->nom }} {{ $forum->user->prenom }}</p>
                                                        <span>{{ $forum->created_at->diffForHumans() }}</span>
                                                    </div>
                                                </div>
                                                <h4>{{ $forum->titre }}</h4>
                                                <p>
                                                    {{ substr($forum->description, 0, 100) }}...
                                                </p>

                                                <div class="nbr_comments">
                                                    <p>
                                                        <span>
                                                            {{ $forum->commentaires->count() }}
                                                        </span>
                                                        Commentaires
                                                    </p>
                                                </div>
                                            </div>
                                        </a>                                                
                                    </div>
                                @endforeach
                        </div>
                        
                    </div>
                </div>
            </div>
            
        </div>                
    </div>
</section>
@endsection

