@extends('layouts.master')

@section('includes')
    @include('includes.header')
@endsection

@section('content')
    <div id="rs-banner" class="rs-banner style1">
        <div class="container">
            <div class="banner-content text-center">
                <h1 
                class="banner-title capitalize wow fadeInLeft" 
                data-wow-delay="300ms" 
                data-wow-duration="3000ms" 
                style="visibility: visible; animation-duration: 3000ms; animation-delay: 300ms; animation-name: fadeInLeft;">Bienvenue a notre centre de formation </h1>
                <div class="desc mb-35 wow wow fadeInRight" data-wow-delay="900ms" data-wow-duration="3000ms" style="visibility: visible; animation-duration: 3000ms; animation-delay: 900ms; animation-name: fadeInRight;">Rejoinez nous maintenant<br>Inscrivez-vous comme : </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="banner-btn wow fadeInUp" data-wow-delay="1500ms" data-wow-duration="2000ms" style="visibility: visible; animation-duration: 2000ms; animation-delay: 1500ms; animation-name: fadeInUp;">
                            <a class="readon banner-style" href="{{ url('register/enseignant') }}">Enseignant</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="banner-btn wow fadeInUp" data-wow-delay="1500ms" data-wow-duration="2000ms" style="visibility: visible; animation-duration: 2000ms; animation-delay: 1500ms; animation-name: fadeInUp;">
                            <a class="readon banner-style" href="{{ url('register/etudiant') }}">Etudiant</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('includes.sections')
    @include('includes.formations')
@endsection

