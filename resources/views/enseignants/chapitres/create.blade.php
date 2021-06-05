@extends('admin.layouts.master')


@section('content')
<div class="wrapper">
        @include('admin.includes.header')
        @include('admin.includes.aside')
        <div class="content-wrapper" style="margin-left: 300px !important;">
            <section class="content-header" >
                <h1>
                    Ajouter un chapitre de la matière : {{ App\Models\Matiere::find($matiere_id)->titre }} 
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
                        <form action="{{ route('chapitres.store', ['matiere_id' => $matiere_id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body" id="inputs">
                                <div class="form-group">
                                    <label for="titre">Titre de chapitre</label>
                                    <input type="text" class="form-control" name="titre" value="{{ old('titre') }}" id="titre" placeholder="Saisir titre de chapitre">
                                    @error('titre')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!-- type de chapitre pdf ou video -->
                                <div class="form-group">
                                    <label for="type">Type de contenue</label>
                                    <select name="type" id="type" class="form-control">
                                        <option value="" selected disbaled>Choisir type</option>
                                        <option value="document" @if(old('type') == 'document') selected @endif>document pdf</option>
                                        <option value="video" @if(old('type') == 'video') selected @endif>video</option>
                                    </select>
                                    @error('type')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!-- Contenue pdf -->
                                <div class="form-group" id="document" @if(old('type') == 'document') style="display: block" @else style="display:none" @endif>
                                    <label for="content">Document</label>
                                    <input type="file" class="form-control" name="content" value="{{ old('content') }}" id="content" placeholder="Saisir document pdf">
                                    @error('content')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <!-- Contenue video -->
                                <div class="form-group" id="video"  @if(old('type') == 'video') style="display: block" @else style="display:none" @endif>
                                    <label for="content">Video</label>
                                    <input type="text" class="form-control" name="content" value="{{ old('content') }}" id="content" placeholder="Saisir lien de video youtube">
                                    @error('content')
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
            if($(this).val() == "document"){
                $("#document").css("display", "block");
                $("#video").css("display", "none");
            }else {
                $("#document").css("display", "none");
                $("#video").css("display", "block");
            }
        });
    </script>
@endsection
