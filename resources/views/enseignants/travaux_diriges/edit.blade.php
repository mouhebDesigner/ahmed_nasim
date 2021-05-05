@extends('admin.layouts.master')


@section('content')
<div class="wrapper">
        @include('admin.includes.header')
        @include('admin.includes.aside')
        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    Modifier un travaux dirigé  
                </h1>
            </section>
            <section class="content">
                <div class="row">
                <div class="col-md-12">
                
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Formulaire de modification</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('travaux_diriges.update', ['matiere_id' => $matiere_id, 'travaux_dirige' => $activite->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="card-body" id="inputs">
                                <div class="form-group">
                                    <label for="chapitre_id">Chapitres</label>
                                    <select name="chapitre_id" id="chapitre_id" class="form-control">
                                        <option value="" selected disbaled>Choisir section</option>
                                        @foreach($chapitres as $chapitre)
                                            <option value="{{ $chapitre->id }}" @if($activite->chapitre_id == $chapitre->id) selected @endif>{{ $chapitre->titre }}</option>
                                        @endforeach
                                    </select>
                                    @error('chapitre_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="titre">Titre de travaux</label>
                                    <input type="text" class="form-control" name="titre" value="{{ $activite->titre }}" id="titre" placeholder="Saisir titre de module">
                                    @error('titre')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!-- Contenue pdf -->
                                <div class="form-group">
                                    <label for="document">Document</label>
                                    <input type="file" class="form-control" name="document"  id="document" placeholder="Saisir document de module">
                                    @error('document')
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
        $("#type").on('change', function(){
            if($(this).val() == "video")
            {
                $("#video").css('display', 'block');
                $("#document").css('display', 'none');
            }
            else {

                $("#video").css('display', 'none');
                $("#document").css('display', 'block');
            }
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
    </script>
@endsection