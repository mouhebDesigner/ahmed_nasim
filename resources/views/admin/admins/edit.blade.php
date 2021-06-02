@extends('admin.layouts.master')


@section('content')
<div class="wrapper">
        @include('admin.includes.header')
        @include('admin.includes.aside')
        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    modifier un administrateur 
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
                        <form action="{{ url('admin/admins/'.$admin->id) }}" method="post" enctype="multipart/form-data">
                         
                            <div class="card-body" id="inputs">
                                <div class="form-group">
                                    <label for="nom">Nom d'administrateur</label>
                                    <input type="text" class="form-control" name="nom" value="{{ $admin->nom }}" id="nom" placeholder="Saisir nom d'administrateur">
                                    @error('nom')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="prenom">Préprenom d'administrateur</label>
                                    <input type="text" class="form-control" name="prenom" value="{{ $admin->prenom }}" id="prenom" placeholder="Saisir prenom d'administrateur">
                                    @error('prenom')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email d'administrateur</label>
                                    <input type="text" class="form-control" name="email" value="{{ $admin->email }}" id="email" placeholder="Saisir email d'administrateur">
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Mot de passe  d'administrateur</label>
                                    <input type="password" class="form-control" name="password"  id="password" placeholder="Saisir mot de passe d'administrateur">
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Confirmer la Mot de passe</label>
                                    <input type="password" class="form-control" name="password_confirmation"  id="password" placeholder="Saisir mot de passe d'administrateur">
                                </div>
                                <div class="form-group">
                                    <label for="numtel">Numéro de téléphone d'administrateur</label>
                                    <input type="number" class="form-control" name="numtel" value="{{ $admin->numtel }}" id="numtel" placeholder="Saisir numtel d'administrateur">
                                    @error('numtel')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="date_naissance">date naissance d'administrateur</label>
                                    <input type="date" class="form-control" name="date_naissance" value="{{ $admin->date_naissance }}" id="date_naissance" placeholder="Saisir date_naissance d'administrateur">
                                    @error('date_naissance')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
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