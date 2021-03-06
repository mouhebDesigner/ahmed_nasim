@extends('admin.layouts.master')


@section('content')
<div class="wrapper">
        @include('admin.includes.header')
        @include('admin.includes.aside')
        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    Ajouter une formation
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
                        <form action="{{ url('admin/formations') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body" id="inputs">
                                <div class="form-group">
                                    <label for="titre">Titre de formation</label>
                                    <input type="text" class="form-control" name="titre" value="{{ old('titre') }}" id="titre" placeholder="Saisir titre de formation">
                                    @error('titre')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!-- Contenue pdf -->
                                <div class="form-group" id="document">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control" name="image" value="{{ old('image') }}" id="image" placeholder="Saisir document de module">
                                    @error('image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!-- Contenue pdf -->
                                <div class="form-group" id="document">
                                    <label for="certificat">Certificat</label>
                                    <input type="file" class="form-control" name="certificat" value="{{ old('certificat') }}" id="certificat" placeholder="Saisir document de module">
                                    @error('certificat')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <!-- Contenue video -->
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea  class="form-control" name="description" value="{{ old('description') }}" id="description" placeholder="Saisir description"></textarea>
                                    @error('description')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                            <button type="   " class="btn btn-primary">Enregistrer</button>
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