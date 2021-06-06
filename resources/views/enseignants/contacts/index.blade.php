@extends('admin.layouts.master')

@section('content')
    <div class="wrapper">
        
        @include('admin.includes.header')
        @include('admin.includes.aside')
        <div class="content-wrapper" style="min-height: 257px;">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Contacter l'administrateur</h1>
                    </div>
                    <div class="col-sm-6">
                        
                    </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <section class="content">
                <div class="container-fluid">
                @include('admin.includes.error-message')
                    <div class="row">
                    
                    <!-- /.col -->
                    <div class="col-md-12">
                        <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Envoyer un nouveau message</h3>
                        </div>
                        <!-- /.card-header -->
                        <form action="{{ url('contact') }}" method="post">
                            @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <input class="form-control" placeholder="Nom" name="nom">
                                @error('nom')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Numéro de téléphone" name="numtel">
                                @error('numtel')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div><div class="form-group">
                                <input class="form-control" placeholder="Email" name="email">
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div><div class="form-group">
                                <input class="form-control" placeholder="Sujet" name="sujet">
                                @error('sujet')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <textarea placeholder="Saisir message" rows="5" cols="5" name="message" class="form-control"></textarea>        
                                @error('message')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                        <div class="float-right">
                            <button type="button" class="btn btn-default"><i class="fas fa-pencil-alt"></i>Annuler</button>
                            <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i>Envoyer</button>
                        </div>
                        </form>

                            
                        </div>
                        <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
        </div>


      
@endsection
