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
        <h1 class="page-title">Forum</h1>
        <ul>
            <li>
                <a class="active" href="index.html">Forum</a>
            </li>
            <li>Détails de forum</li>
        </ul>
    </div>
</div>
<section class="intro-section gray-bg pt-94 pb-100 md-pt-64 md-pb-70 loaded">
    <div class="container">
        <div class="row">
                <div class="col-md-12">
                    @if(session('deleted'))
                        <div class="alert alert_success">
                            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                            <strong>Succés! </strong>  {{ session('deleted') }}
                        </div>             
                    @endif
                </div>
            </div>
        <div class="row clearfix">
            <!-- Content Column -->
            <div class="col-lg-8 offset-md-2 md-mb-50">
                <!-- Intro Info Tabs-->
                <div class="intro-info-tabs">
                    <div class="tab-content tabs-content" id="myTabContent">
                        <div class="tab-pane tab fade  active show" id="prod-overview" role="tabpanel" aria-labelledby="prod-overview-tab">
                        <div class="content pt-30 mt-5 ">
                                        <!-- Cource Overview -->
                            <div class="forum_block">
                                <a href="{{ url('forums/'.$forum->id.'/show') }}" class=" course-overview">
                                    <div class="inner-box">
                                        <div class="user">
                                            <img src="{{ asset('storage/'.$forum->user->photo)}}" alt="">
                                            <div class="name_date">
                                                <h4>{{ $forum->user->nom }} {{ $forum->user->prenom }}</h4>
                                                <span style="color: #273c66;">{{ $forum->created_at->diffForHumans() }}</span>
                                            </div>
                                        </div>
                                        <h4>{{ $forum->titre }}</h4>
                                        <p>
                                            {{ $forum->description }}
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
                        </div>
                           
                        </div>

                        @foreach(App\Models\Commentaire::where('forum_id', $forum->id)->get() as $comment)
                            <div class="content pt-30 pb-30  comment mt-5">
                                <div class="cource-review-box">
                                    <div class="d-flex justify-content-between align-items-center" style="">
                                        <div class="user_coord d-flex justify-content-between">
                                            <img src="{{ asset('front/assets/images/gallery/12.jpg') }}" class="comment_imageuser" >
                                            <div class="name_d">
                                                <h4 class="">
                                                    {{ $comment->user->nom }}
                                                </h4>
                                                <span style="color: #273c66;">{{ $comment->created_at->diffForHumans() }}</span>
                                            </div>
                                        </div>
                                        @if(Auth::id() == $comment->user_id)
                                        <form action="{{ url('commentaires/'.$comment->id) }}" method="post" class="form_delete_comment">
                                            @csrf 
                                            @method('delete')

                                            <button type="submit" style="border:none; background:transparent">
                                                <i class="fa fa-trash"></i>
                                            </button>

                                        </form>
                                        @endif
                                    </div>
                                    <div class="" style="margin-left: 70px;">
                                        <p>
                                            {{ $comment->contenue }}
                                        </p>
                                    </div> 
                                </div>
                            </div>
                            @endforeach
                            <div class="content pt-30 pb-30  mt-5">
                                <div class="">
                                    <form action="{{ url('commentaires') }}" method="post">
                                        @csrf 
                                                <input type="hidden" value="{{ $forum->id }}" name="forum_id">
                                            <div class="d-flex justify-content-between">
                                                <div class="form_inputs comment_input">
                                                    <textarea name="message" id="" cols="30"  class="h-100" placeholder="saisir votre commentaire"></textarea>
                                                    @error('message')
                                                        <p class="error_input_message">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <button type="submit" class="readon submit-btn comment_button">
                                                    <i class="fa fa-paper-plane"></i>
                                                </button>
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
</section>
@endsection

