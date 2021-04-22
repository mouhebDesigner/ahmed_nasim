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
                        <h2 class="login">{{ __('S\'inscrire') }}</h2>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <input id="nom" type="text" class="" name="nom" value="{{ old('nom') }}" placeholder="{{ __('Saisir votre nom') }}" required autocomplete="nom" autofocus>
                            @error('nom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <input id="prenom" type="text" class="" name="prenom" value="{{ old('prenom') }}" placeholder="{{ __('Saisir votre prenom') }}" required autocomplete="prenom" autofocus>
                            @error('prenom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <input id="numtel" type="numeric" class="" name="numtel" value="{{ old('email') }}" placeholder="{{ __('Saisir votre numéro de téléphone') }}" required autocomplete="email">
                            @error('numtel')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <input id="date_naissance" type="text" onclick="this.type = 'date'" class="" name="date_naissance"  value="{{ old('email') }}" placeholder="{{ __('Saisir votre date de naissance') }}" required autocomplete="email">

                            @error('date_naissance')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <input type="email" name="email" placeholder="{{ __('Saisir votre email') }}" required="">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <input type="password" name="password" placeholder="{{ __('Saisir votre mot de passe') }}" required="">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <input id="password-confirm" type="password" class="" name="password_confirmation" placeholder="{{ __('Confirmer votre mot de passe') }}" required autocomplete="new-password">

                            <button type="submit" class="readon submit-btn">{{ __('Enregistrer') }}</button>
                            <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">

                            </div>
                            </div>
                            <div class="last-password">
                                <p>{{ __('J\'ai déjà un compte?') }} <a href="{{ url('register') }}">{{ __('Se connecter') }}</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

