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
                        <h2 class="login">Login</h2>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <input type="text" name="nom" placeholder="Saisir votre nom">
                            @error('nom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            
                            <input type="text" name="prenom" placeholder="Saisir votre prenom">
                            @error('prenom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <input type="numeric" name="numtel" placeholder="Saisir votre numtel">
                            @error('numtel')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <input type="date" name="date_naissance" placeholder="Saisir votre date de naissance">
                            @error('date_naissance')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <input type="email" name="email" placeholder="Saisir votre email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <input type="password" name="password" placeholder="Saisir votre mot de passe">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <input type="password" name="password_confirmation" placeholder="Saisir votre mot de passe">
                            <button type="submit" class="readon submit-btn">connecter</button>
                            <div class="last-password">
                                <p>J'ai déjà un compte? <a href="{{ url('login') }}">Se connecter maintenant</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

