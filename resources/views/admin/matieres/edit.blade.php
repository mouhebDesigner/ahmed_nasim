@extends('admin.layouts.master')


@section('content')
<div class="wrapper">
        @include('admin.includes.header')
        @include('admin.includes.aside')
        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    Ajouter un titre de matière 
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
                        <form action="{{ url('admin/matieres/'.$matiere->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                            <div class="card-body" id="inputs">
                                <div class="form-group">
                                    <h2>Cette matière contient: </h2>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="tp">TP</label>
                                            <input type="checkbox" id="tp" name="has_tp" value="1" @if($matiere->has_tp == 1) checked @endif>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="td">TD</label>
                                            <input type="checkbox" id="td" name="has_td" value="1" @if($matiere->has_td == 1) checked @endif>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="cours">Cours</label>
                                            <input type="checkbox" id="cours" name="has_cour" value="1" @if($matiere->has_cour == 1) checked @endif>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" id="enseignant_tp" @if($matiere->has_tp == 1) style="display: block;" @endif>
                                    <label for="enseignant_id_tp">Enseignant de TP</label>
                                    <select name="enseignant_id_tp" id="enseignant_id_tp" class="form-control">
                                        <option value="" selected disbaled>Choisir enseignant de TP</option>
                                        @if($matiere->has_tp == 1)
                                            @foreach(App\Models\Enseignant::all() as $enseignant)
                                                <option value="{{ $enseignant->id }}" @if($enseignant->id == $matiere->tp->enseignant_id) selected @endif>{{ $enseignant->user->nom }} {{ $enseignant->user->prenom }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group" id="enseignant_td" @if($matiere->has_td == 1) style="display: block;" @endif>
                                    <label for="enseignant_id_td">Enseignant de TD</label>
                                    <select name="enseignant_id_td" id="enseignant_id_td" class="form-control">
                                        <option value="" selected disbaled>Choisir enseignant de TD</option>
                                        @if($matiere->has_td == 1)
                                            @foreach(App\Models\Enseignant::all() as $enseignant)
                                                <option value="{{ $enseignant->id }}" @if($enseignant->id == $matiere->td->enseignant_id) selected @endif>{{ $enseignant->user->nom }} {{ $enseignant->user->prenom }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group" id="enseignant_cours" @if($matiere->has_cour == 1) style="display: block;" @endif>
                                    <label for="enseignant_id_cours">Enseignant de cours</label>
                                    <select name="enseignant_id_cours" id="enseignant_id_cours" class="form-control">
                                        <option value="" selected disbaled>Choisir enseignant de cours</option>
                                        @if($matiere->has_cour == 1)
                                            @foreach(App\Models\Enseignant::all() as $enseignant)
                                                <option value="{{ $enseignant->id }}" @if($enseignant->id == $matiere->cour->enseignant_id) selected @endif>{{ $enseignant->user->nom }} {{ $enseignant->user->prenom }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                               
                                <div class="form-group">
                                    <label for="section_id">Section</label>
                                    <select name="section_id" id="section_id" class="form-control">
                                        <option value="" selected disbaled>Choisir section</option>
                                        @foreach(App\Models\Section::all() as $section)
                                            <option value="{{ $section->id }}" @if($matiere->section_id == $section->id) selected @endif>{{ $section->titre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="module_id">Module</label>
                                    <select name="module_id" id="module_id" class="form-control">
                                        <option value="" selected disbaled>Choisir module</option>
                                        @foreach(App\Models\Module::all() as $module)
                                            <option value="{{ $module->id }}" @if($matiere->module_id == $module->id) selected @endif> {{ $module->titre }} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="titre">Titre de module</label>
                                    <input type="text" class="form-control" name="titre" value="{{ $matiere->titre }}" id="titre" placeholder="Saisir titre de module">
                                    @error('titre')
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
        $("#enseignant_tp").css('display', 'block');
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
                    $('#enseignant_id_tp').append('<option value="'+value.id+'">'+value.nom+'</option>');
                });

            }    
        });
    });
    $("#td").on('click', function(){
        $("#enseignant_td").css('display', 'block');
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
                    $('#enseignant_id_td').append('<option value="'+value.id+'">'+value.nom+'</option>');
                });

            }    
        });
    });
    $("#cours").on('click', function(){
        $("#enseignant_cours").css('display', 'block');
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
                    $('#enseignant_id_cours').append('<option value="'+value.id+'">'+value.nom+'</option>');
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