@extends('layouts.master')

@section('includes')
    @include('includes.header')
@endsection

@section('content')
    <div class="rs-login pt-100 pb-100 md-pt-70 md-pb-70">
        <div class="container">
            <div class="noticed">
                <div class="main-part">                           
                    <div class="method-account">
                        <h2 class="login">Créer sujet</h2>
                        <form method="POST" action="{{ url('forums') }}">
                            @csrf
                            <div class="form-group col-lg-12 mb-25">
                                <input type="text" name="titre" placeholder="Saisir titre de sujet">
                                @error('titre')
                                    <p class="error_input_message">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group col-lg-12 mb-25">
                                <textarea name="description" id="" cols="30" rows="10" placeholder="Saisir description"></textarea>
                                @error('description')
                                    <p class="error_input_message">{{ $message }}</p>
                                @enderror
                            </div>
                        
                           
                            
                           
                            <button type="submit" class="readon submit-btn">enregistrer</button>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

