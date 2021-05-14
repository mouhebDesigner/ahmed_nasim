@extends('layouts.master')

@section('includes')
    @include('includes.header')
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')
    <section class="register-section pt-100 pb-100 loaded">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if(session('signed'))
                        <div class="alert alert_success">
                            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                            <strong>Succés! </strong>  {{ session('signed') }}
                        </div>             
                    @endif
                </div>
            </div>
            <div class="register-box">
                <div class="sec-title text-center mb-30">
                    <h2 class="title mb-10">Créer un nouveau compte etudiant</h2>
                </div>
                <!-- Login Form -->
                <div class="styled-form">
                    <form  method="post" action="{{ url('etudiant') }}" enctype="multipart/form-data">         
                        @csrf
                        <div class="row clearfix">                                    
                            <!-- Form Group -->
                            <div class="form-group col-lg-12 mb-25">
                                <input type="text" id="nom" name="nom" value="{{ old('nom') }}" class="@error('nom') error_input @enderror" placeholder="Saisir votre nom">
                                @error('nom')
                                    <span class="invalid-feedback" role="alert" style="display: inline">
                                        <strong class="font-size_strong">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="form-group col-lg-12 mb-25">
                                <input type="text" id="prenom" name="prenom" value="{{ old('prenom') }}" class="@error('prenom') error_input @enderror" placeholder="Saisir votre prenom">
                                @error('prenom')
                                    <span class="invalid-feedback" role="alert" style="display: inline">
                                        <strong class="font-size_strong">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="form-group col-lg-12 mb-25">
                                <input type="text" id="email" name="email" value="{{ old('email') }}" class="@error('email') error_input @enderror" placeholder="Saisir votre email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert" style="display: inline">
                                        <strong class="font-size_strong">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-lg-12 mb-25">
                                <input type="password" id="password" name="password" value="{{ old('password') }}" class="@error('password') error_input @enderror" placeholder="Saisir votre mot de passe">
                                @error('password')
                                    <span class="invalid-feedback" role="alert" style="display:inline">
                                        <strong class="font-size_strong">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-lg-12 mb-25">
                                <input type="password" id="password_confirmation" name="password_confirmation"  class="@error('password') error_input @enderror" placeholder="Confirmer le mot de passe">

                            </div>
                            <div class="form-group col-lg-12 mb-25">
                                <input type="number" id="numtel" name="numtel" value="{{ old('numtel') }}" class="@error('numtel') error_input @enderror" placeholder="Saisir votre numtel">
                                @error('numtel')
                                    <span class="invalid-feedback" role="alert" style="display: inline">
                                        <strong class="font-size_strong_strong">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="form-group col-lg-12 mb-25">
                                <input type="text"  onclick="this.type = 'date'" id="date_naissance" name="date_naissance" value="{{ old('date_naissance') }}" class="@error('date_naissance') error_input @enderror" placeholder="Saisir votre date naissance">
                                @error('date_naissance')
                                    <span class="invalid-feedback" role="alert" style="display: inline">
                                        <strong class="font-size_strong_strong">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-lg-12 mb-25">
                                <select name="cycle" id="cycle" >
                                    <option value="" selected disbaled>Choisir votre cycle</option>
                                    <option value="licence">Licence</option>
                                    <option value="mastère">Mastère</option>
                                </select>
                                @error('cycle')
                                    <span class="invalid-feedback" role="alert" style="display: inline">
                                        <strong class="font-size_strong_strong">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-lg-12 mb-25">
                                <select name="niveau" id="niveau">
                                    <option value="" selected disbaled>Choisir votre niveau</option>
                                </select>
                                @error('niveau')
                                    <span class="invalid-feedback" role="alert" style="display: inline">
                                        <strong class="font-size_strong_strong">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-lg-12 mb-25">
                                <select name="section_id" id="">
                                    <option value="" selected disbaled>Choisir votre section</option>
                                    @foreach(App\Models\Section::all()  as $section)
                                        <option value="{{ $section->id }}">{{ $section->titre }}</option>
                                    @endforeach
                                </select>
                                @error('section')
                                    <span class="invalid-feedback" role="alert" style="display: inline">
                                        <strong class="font-size_strong_strong">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-lg-12 mb-25">
                                <input type="file" id="photo" name="photo" value="{{ old('photo') }}" class="@error('photo') error_input @enderror">
                                @error('photo')
                                    <span class="invalid-feedback" role="alert" style="display: inline">
                                        <strong class="font-size_strong_strong">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 text-center">
                                <button type="submit" class="readon register-btn">
                                    <span class="txt">Inscrire</span>
                                </button>
                            </div>
                            
                            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                <div class="users">Avez-vous un compte? <a href="login.html">Connecter</a></div>
                            </div>
                            
                        </div>
                        
                    </form>
                </div>


            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $("#cycle").on('change', function(){
            var cycle = $(this).val();

            if(cycle == 'licence'){
                $('#niveau').empty();
                $("#niveau").append('<option value="" selected disbaled>Choisir niveau</option>')
                $("#niveau").append('<option value="première">Première année</option>')
                $("#niveau").append('<option value="deuxième">Deuxième année</option>')
                $("#niveau").append('<option value="troisième">Troisième année</option>')
            } else {
                $('#niveau').empty();
                $("#niveau").append('<option value="" selected disbaled>Choisir niveau</option>')
                $("#niveau").append('<option value="première">Première année</option>')
                $("#niveau").append('<option value="deuxième">Deuxième année</option>')
            }
            
        });
    </script>
@endsection

