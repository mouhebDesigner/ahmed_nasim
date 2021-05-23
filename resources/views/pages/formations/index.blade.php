@extends('layouts.master')

@section('includes')
    @include('includes.header')
@endsection

@section('content')
 
<div id="rs-popular-courses" class="rs-popular-courses bg6 style1 pt-94 pb-70 md-pt-64 md-pb-40">
    <div class="container">
        <div class="row y-middle mb-50 md-mb-30">
            <div class="col-md-6 sm-mb-30">
                <div class="sec-title">
                    <div class="sub-title primary">Formations</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="btn-part text-right sm-text-left">
                </div>
            </div> 
        </div>
        <div class="row">
            @foreach($formations as $formation)
            <div class="col-lg-4 col-md-6 mb-30 wow fadeInUp" data-wow-delay="300ms" data-wow-duration="2000ms" style="visibility: visible; animation-duration: 2000ms; animation-delay: 300ms; animation-name: fadeInUp;">
                <div class="courses-item">
                    <div class="img-part">
                        <img src="{{ asset('storage/'.$formation->image) }}" style="width: 100%; height: 200px" alt="">
                    </div>
                    <div class="content-part">
                        <ul class="meta-part">
                            <li><a class="categorie" href="#"><strong>{{ $formation->titre }} {{ $formation->videos->count() }}</strong></a></li>
                        </ul>
                        <div class="bottom-part">
                            <div class="info-meta">
                                <p>
                                
                                   {{ substr($formation->description, 0, 100) }}...
                                </p>
                            </div>
                            <div class="btn-part">
                            
                                @if($formation->videos)
                                    <a href="{{ url('formations/'.$formation->id) }}"><i class="flaticon-right-arrow"></i></a>
                                @else 
                                    <a href="#" onclick="alert('Cette formation n a pas des videos pour le moment')"><i class="flaticon-right-arrow"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                @endforeach
        </div>

            
            
            
            
            
        </div>
    </div>
</div>
@endsection

