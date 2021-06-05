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
                        <form action="{{ url('admin/modules/'.$module->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                            <div class="card-body">
                            <div class="form-group">
                                    <label for="section_id">Section</label>
                                <select name="section_id" id="section_id" class="form-control">
                                    <option value="" selected disbaled>Choisir section</option>
                                    @foreach(App\Models\Section::all() as $section)
                                        <option value="{{ $section->id }}" @if($module->section_id == $section->id) selected @endif>{{ $section->titre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="niveau">Niveau</label>
                                <select name="niveau" id="niveau" class="form-control">
                                    <option value="" selected disbaled>Choisir niveau</option>
                                    @if(App\Models\Section::find($module->section_id)->niveau == "mastère")
                                        <option value="première mastère" @if($module->niveau == "première mastère") selected @endif>Première année</option>
                                        <option value="deuxième mastère" @if($module->niveau == "deuxième mastère") selected @endif>Deuxième année</option>
                                    @else 
                                        <option value="première licence" @if($module->niveau == "première licence") selected @endif>Première année</option>
                                        <option value="deuxième licence" @if($module->niveau == "deuxième licence") selected @endif>Deuxième année</option>
                                        <option value="troisième licence" @if($module->niveau == "troisième licence") selected @endif>Troisième année</option>
                                    @endif

                                </select>
                                @error('niveau')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="titre">Titre de section</label>
                                <input type="text" class="form-control" name="titre" value="{{ $module->titre }}" id="titre" placeholder="Saisir titre de module">
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