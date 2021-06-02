@extends('admin.layouts.master')


@section('content')
<div class="wrapper">
        @include('admin.includes.header')
        @include('admin.includes.aside')
   
        <div class="content-wrapper" 
        @if(Auth::user()->grade == "enseignant")
            style="margin-left: 300px"
        @endif
        >
        @include('admin.includes.error-message')

            <section class="content-header">
                <h1>
                    Editer votre profile 
                </h1>
            </section>
            <section class="content">
                <div class="row">
                <div class="col-md-12">
                
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Formulaire d'ajout</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ url('enseignant/profile/'.Auth::user()->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="card-body" id="inputs">
                               
                               
                                
                                <div class="form-group">
                                    <label for="nom">Nom d'enseignant</label>
                                    <input type="text" class="form-control" name="nom" value="{{ Auth::user()->nom }}" id="nom" placeholder="Saisir votre nom ">
                                    @error('nom')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="prenom">Préprenom d'enseignant</label>
                                    <input type="text" class="form-control" name="prenom" value="{{ Auth::user()->prenom }}" id="prenom" placeholder="Saisir votre prenom ">
                                    @error('prenom')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email d'enseignant</label>
                                    <input type="text" class="form-control" name="email" value="{{ Auth::user()->email }}" id="email" placeholder="Saisir votre email ">
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Mot de passe  d'enseignant</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Saisir votre mot de passe ">
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Confirmer la Mot de passe</label>
                                    <input type="password" class="form-control" name="password_confirmation" id="password" placeholder="Saisir votre mot de passe ">
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="numtel">Numéro de téléphone d'enseignant</label>
                                    <input type="number" class="form-control" name="numtel" value="{{ Auth::user()->numtel }}" id="numtel" placeholder="Saisir votre numtel ">
                                    @error('numtel')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="date_naissance">date naissance d'enseignant</label>
                                    <input type="date" class="form-control" name="date_naissance" value="{{ Auth::user()->date_naissance }}" id="date_naissance" placeholder="Saisir votre date_naissance ">
                                    @error('date_naissance')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Modifier</button>
                            <button type="reset" class="btn btn-info">Annuler</button>
                            </div>
                        </form>
                        </div>
                </div>
                  
                </div>
            </section>
        </div>
   


@endsection
@section('script')


@endsection