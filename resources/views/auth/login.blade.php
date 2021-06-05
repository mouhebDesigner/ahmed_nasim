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
                        <h2 class="login">Connexion</h2>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form_inputs">
                                <input type="text" name="email" placeholder="Saisir votre email">
                                @error('email')
                                    <p class="error_input_message">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" placeholder="Saisir votre mot de passe">
                                @error('password')
                                    <p class="error_input_message">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit" class="readon submit-btn">connecter</button>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Mot de passe oubliè?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                            <div class="last-password">
                                <p>Vous n'avez pas un compte? <a href="{{ url('/') }}">S'inscrire maintenant</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

