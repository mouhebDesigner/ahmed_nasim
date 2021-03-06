@extends('layouts.master')

@section('includes')
    @include('includes.header')
@endsection

@section('content')
<div id="sections" class="rs-categories gray-bg style1 pt-94 pb-70 md-pt-64 md-pb-40">
    <div class="container">
        <div class="row y-middle mb-50 md-mb-30">
            <div class="col-md-6 sm-mb-30">
                <div class="sec-title">
                    <div class="sub-title primary">Les modules</div>
                </div>
            </div>
            <div class="col-md-6">
                
            </div>
        </div>
        <div class="row">
            @foreach($modules as  $module)
            <div class="col-lg-4 col-md-6 mb-30 wow fadeInUp" data-wow-delay="500ms" data-wow-duration="2000ms" style="visibility: visible; animation-duration: 2000ms; animation-delay: 500ms; animation-name: fadeInUp;">
                <a class="categories-item" href="{{ url('module/'.$module->id.'/matieres') }}">
                    <div class="icon-part">
                        <img src="{{ asset('images/book.png') }}" alt="">
                    </div>
                    <div class="content-part">
                        <h4 class="title">{{ $module->titre }}</h4>
                        <span class="courses">{{ $module->matieres()->count() }} Matières</span>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>  
    
@endsection

