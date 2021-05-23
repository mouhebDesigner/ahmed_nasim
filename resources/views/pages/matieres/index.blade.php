@extends('layouts.master')

@section('includes')
    @include('includes.header')
@endsection

@section('content')
 
<div id="rs-blog" class="rs-blog style1 pt-94 pb-100 md-pt-64 md-pb-70">
    <div class="container">
        <div class="sec-title mb-60 md-mb-30">
            <div class="sub-title primary">Matières </div>
        </div>
            @foreach($modules as $module)
                <div class="row">
                    <div class="sub-title primary">Module {{ $module->titre }}</div>
                </div>
                <div class="row">
                    @foreach($module->matieres as  $matiere)

                        <div class="col-lg-6 col-md-12 pr-75 md-pr-15 md-mb-50">
                            <div class="row align-items-center no-gutter white-bg blog-item mb-30 wow fadeInUp" data-wow-delay="300ms" data-wow-duration="2000ms" style="visibility: visible; animation-duration: 2000ms; animation-delay: 300ms; animation-name: fadeInUp;">
                                <div class="col-md-6">
                                    <div class="image-part">
                                        <a href="#"><img src="{{ asset('front/assets/images/blog/1.jpg') }}" alt=""></a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="blog-content">
                                        <ul class="blog-meta">
                                            <li><strong>Module:</strong> {{ $matiere->module->titre }} </li>
                                            <li>{{ $matiere->chapitres()->count() }} Chapitres</li>
                                        </ul>
                                        <h3 class="title"><a href="{{ url('matieres/'.$matiere->id) }}">{{ $matiere->titre }}</a></h3>
                                        <div class="btn-part">
                                            <a class="readon-arrow" href="{{ url('matieres/'.$matiere->id) }}">Voir détails</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
    </div>
</div>
@endsection

