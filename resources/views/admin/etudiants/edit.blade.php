@extends('admin.layouts.master')


@section('content')
<div class="wrapper">
        @include('admin.includes.header')
        @include('admin.includes.aside')
        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    Ajouter un etudiant 
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
                        <form action="{{ url('admin/etudiants/'.$etudiant->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                            <div class="card-body" id="inputs">
                               
                               
                                
                                <div class="form-group">
                                    <label for="nom">Nom d'etudiant</label>
                                    <input type="text" class="form-control" name="nom" value="{{ $etudiant->nom }}" id="nom" placeholder="Saisir nom de matiére">
                                    @error('nom')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="prenom">Préprenom d'etudiant</label>
                                    <input type="text" class="form-control" name="prenom" value="{{ $etudiant->prenom }}" id="prenom" placeholder="Saisir prenom de matiére">
                                    @error('prenom')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email d'etudiant</label>
                                    <input type="text" class="form-control" name="email" value="{{ $etudiant->email }}" id="email" placeholder="Saisir email de matiére">
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Mot de passe  d'etudiant</label>
                                    <input type="password" class="form-control" name="password"  id="password" placeholder="Saisir password de matiére">
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Confirmer la Mot de passe</label>
                                    <input type="password" class="form-control" name="password_confirmation"  id="password" placeholder="Saisir password de matiére">
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="numtel">Numéro de téléphone d'etudiant</label>
                                    <input type="number" class="form-control" name="numtel" value="{{ $etudiant->numtel }}" id="numtel" placeholder="Saisir numtel de matiére">
                                    @error('numtel')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="date_naissance">date naissance d'etudiant</label>
                                    <input type="date" class="form-control" name="date_naissance" value="{{ $etudiant->date_naissance }}" id="date_naissance" placeholder="Saisir date_naissance de matiére">
                                    @error('date_naissance')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="section_id">Section</label>
                                    <select name="section_id" id="section_id" class="form-control">
                                        <option value="" selected disbaled>Choisir section</option>
                                        @foreach(App\Models\Section::all() as $section)
                                            <option value="{{ $section->id }}" @if($etudiant->etudiant->section_id == $section->id) selected @endif>{{ $section->titre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="niveau">Niveau</label>
                                    <select name="niveau" id="niveau" class="form-control">
                                        <option value="" selected disbaled>Choisir niveau</option>
                                        @foreach($niveaux as $niveau)
                                            <option value="{{ $niveau }}" @if($etudiant->etudiant->niveau == $niveau) selected @endif>{{ $niveau }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
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
<script>
    $("#tp").on('click', function(){
        $("#etudiant_tp").css('display', 'block');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'get',
            url:'/teachers/',
            data:'_token = <?php echo csrf_token() ?>',
            success:function(data) {
                console.log(data);

                $.each(data, function(index, value){
                    $('#etudiant_id_tp').append('<option value="'+value.etudiant.id+'">'+value.nom+'</option>');
                });

            }    
        });
    });
    $("#td").on('click', function(){
        $("#etudiant_td").css('display', 'block');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'get',
            url:'/teachers/',
            data:'_token = <?php echo csrf_token() ?>',
            success:function(data) {
                console.log(data);

                $.each(data, function(index, value){
                    $('#etudiant_id_td').append('<option value="'+value.etudiant.id+'">'+value.nom+'</option>');
                });

            }    
        });
    });
    $("#cours").on('click', function(){
        $("#etudiant_cours").css('display', 'block');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'get',
            url:'/teachers/',
            data:'_token = <?php echo csrf_token() ?>',
            success:function(data) {
                console.log(data);

                $.each(data, function(index, value){
                    $('#etudiant_id_cours').append('<option value="'+value.etudiant.id+'">'+value.nom+'</option>');
                });

            }    
        });
    });
    $("#section_id").on('change', function(){
        var section_id = $(this).val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'get',
            url:'/module_list/'+section_id,
            data:'_token = <?php echo csrf_token() ?>',
            success:function(data) {
                console.log("test");
                $("#module_id").empty();
                $("#module_id").append('<option value="" disabled selected> Choisir module</option>')
                $.each(data, function(index, value){
                    $("#module_id").append('<option value="'+value.id+'">'+value.titre+'</option>')
                });
            }    
        });
    });
</script>

@endsection