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
                            <div class="content white-bg pt-30">
                                <!-- Cource Overview -->
                                <div class="course-overview">
                                    <div class="inner-box">
                                        <h4>{{ $forum->titre }}</h4>
                                        <p>{{ $forum->description }}</p>                                                                                         
                                    </div>
                                </div>      

                            </div>
                                <div class="content pt-30 pb-30 white-bg comment mt-5">
                                <div class="cource-review-box">
                                    <div class="d-flex justify-content-between align-items-center" style="width: max-content">
                                        <img src="{{ asset('front/assets/images/gallery/12.jpg') }}" class="comment_imageuser" >
                                        <h4 class="comment_username">Rick O'Shea</h4>
                                    </div>
                                    <div class="text text-white">Phasellus enim magna, varius et commodo ut, ultricies vitae velit. Ut nulla tellus, eleifend euismod pellentesque vel, sagittis vel justo. In libero urna, venenatis sit amet ornare non, suscipit nec risus.</div> 
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

