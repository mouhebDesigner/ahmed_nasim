@extends('layouts.master')

@section('includes')
    @include('includes.header')
@endsection

@section('content')
 
    <div class="rs-inner-blog orange-color pt-100 pb-100 md-pt-70 md-pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 pr-50 md-pr-15">
                    <img src="{{ asset('storage/'.Auth::user()->photo) }}" alt="">
                    <p class="name_profile">{{ Auth::user()->nom }} {{ Auth::user()->prenom }}</p>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-12 styled-form">
                            <form  method="post" action="{{ url('profile') }}" enctype="multipart/form-data">         
                                @csrf
                                @method('put')
                                <div class="row clearfix">                                    
                                    <!-- Form Group -->
                                    <div class="form-group col-lg-12 mb-25">
                                        <input type="text" id="nom" name="nom" value="{{ Auth::user()->nom }}" class="" placeholder="Saisir votre nom">
                                        @error('nom')
                                            <span class="invalid-feedback" role="alert" style="display: inline">
                                                <strong class="font-size_strong">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group col-lg-12 mb-25">
                                        <input type="text" id="prenom" name="prenom" value="{{ Auth::user()->prenom }}" class="" placeholder="Saisir votre prenom">
                                        @error('prenom')
                                            <span class="invalid-feedback" role="alert" style="display: inline">
                                                <strong class="font-size_strong">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group col-lg-12 mb-25">
                                        <input type="text" id="email" name="email" value="{{ Auth::user()->email }}" class="" placeholder="Saisir votre email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert" style="display: inline">
                                                <strong class="font-size_strong">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-12 mb-25">
                                        <input type="password" id="password" name="password" class="" placeholder="Saisir votre mot de passe">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert" style="display:inline">
                                                <strong class="font-size_strong">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-12 mb-25">
                                        <input type="password" id="password_confirmation" name="password_confirmation"  class="" placeholder="Confirmer le mot de passe">

                                    </div>
                                    <div class="form-group col-lg-12 mb-25">
                                        <input type="number" id="numtel" name="numtel" value="{{ Auth::user()->numtel }}" class="" placeholder="Saisir votre numtel">
                                        @error('numtel')
                                            <span class="invalid-feedback" role="alert" style="display: inline">
                                                <strong class="font-size_strong_strong">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-12 mb-25">
                                        <input type="text"  onclick="this.type = 'date'" id="date_naissance" name="date_naissance" value="{{ Auth::user()->date_naissance }}" class="" placeholder="Saisir votre date naissance">
                                        @error('date_naissance')
                                            <span class="invalid-feedback" role="alert" style="display: inline">
                                                <strong class="font-size_strong_strong">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-12 mb-25">
                                        <label for="photo" class="photo_label">Télécharger photo</label>
                                        <input type="file" id="photo" name="photo" value="" class="input_file ">
                                    </div>
                                    
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 text-center">
                                        <button type="submit" class="readon register-btn">
                                            <span class="txt">Editer</span>
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
@endsection

