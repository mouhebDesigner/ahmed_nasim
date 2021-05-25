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
            <div class="col-lg-8 offset-md-2 md-mb-50">
                <!-- Intro Info Tabs-->
                <div class="intro-info-tabs">
                    <div class="tab-content tabs-content" id="myTabContent">
                        <div class="tab-pane tab fade  active show" id="prod-overview" role="tabpanel" aria-labelledby="prod-overview-tab">
                            <div class="white-bg pt-30">
                                <!-- Cource Overview -->
                                <div class="forum_block">
                                    <h4>
                                        {{ $forum->title }}
                                    </h4>                                                                                       
                                    <p>
                                        {{ $forum->description }}
                                    </p>
                                </div>      

                            </div>
                            @foreach(App\Models\Commentaire::where('forum_id', $forum->id)->get() as $comment)
                            <div class="content pt-30 pb-30 white-bg comment mt-5">
                                <div class="cource-review-box">
                                    <div class="d-flex justify-content-between align-items-center" style="width: max-content">
                                        <img src="{{ asset('front/assets/images/gallery/12.jpg') }}" class="comment_imageuser" >
                                        <h4 class="comment_username">{{ $comment->user->nom }}</h4>
                                    </div>
                                    <div class="text text-white">
                                        <p>
                                            {{ $comment->contenue }}
                                        </p>
                                    </div> 
                                </div>
                            </div>
                            @endforeach
                            <div class="content pt-30 pb-30 white-bg mt-5">
                                <div class="cource-review-box">
                                    <form action="{{ url('commentaires') }}" method="post">
                                        @csrf 
                                        <div class="row">
                                            <div class="col-md-8">
                                            <input type="hidden" value="{{ $forum->id }}" name="forum_id">
                                                <div class="form_inputs">
                                                    <textarea name="message" id="" cols="30" rows="5" placeholder="saisir votre commentaire"></textarea>
                                                    @error('message')
                                                        <p class="error_input_message">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <button type="submit" class="readon submit-btn">Envoyer</button>
                                            </div>
                                        </div>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                       
                        
                        
                        
                    </div>
                </div>
            </div>
                                  
        </div>                
    </div>
</section>
@endsection

