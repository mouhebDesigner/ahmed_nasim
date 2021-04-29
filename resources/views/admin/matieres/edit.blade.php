@extends('admin.layouts.master')


@section('content')
<div class="wrapper">
        @include('admin.includes.header')
        @include('admin.includes.aside')
        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    Modifier un titre de section 
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
                        <form action="{{ url('admin/matieres/'.$matiere->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                            <div class="card-body">
                            <div class="form-group">
                                    <label for="enseignant_id">Enseignants</label>
                                    <select name="enseignant_id" id="enseignant_id" class="form-control">
                                        <option value="" selected disbaled>Choisir enseignant</option>
                                        @foreach(App\Models\Enseignant::all() as $enseignant)
                                            <option value="{{ $enseignant->id }}" @if($matiere->enseignant_id == $enseignant->id) selected @endif>{{ $enseignant->user->nom }} {{ $enseignant->user->prenom }}</option>
                                        @endforeach
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
                                        @foreach(App\Models\Module::where('section_id', $matiere->section_id)->get() as $module)
                                            <option value="{{ $module->id }}" @if($module->id == $matiere->module_id) selected @endif>{{ $module->titre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            <div class="form-group">
                                <label for="titre">Titre de matiére</label>
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