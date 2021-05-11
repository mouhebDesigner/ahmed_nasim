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
                        <form action="{{ url('admin/sections/'.$section->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="titre">Titre de section</label>
                                    <input type="text" class="form-control" name="titre" value="{{ $section->titre }}" id="titre" placeholder="Saisir titre de section">
                                    @error('titre')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="section_id">Niveau</label>
                                    <select name="niveau" id="niveau" class="form-control">
                                        <option value="" selected disbaled>Choisir niveau</option>
                                        <option value="mastère" @if($section->niveau == "mastère") selected @endif>Mastère</option>
                                        <option value="licence" @if($section->niveau == "licence") selected @endif>Licence</option>
                                    </select>
                                    @error('niveau')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="icone">iconee de section</label>
                                    <input type="file" class="form-control" name="icone" value="{{ old('icone') }}" id="icone" >
                                    @error('icone')
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