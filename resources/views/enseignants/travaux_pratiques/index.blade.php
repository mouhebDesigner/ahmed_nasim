@extends('admin.layouts.master')

@section('content')
    <div class="wrapper">
        
        @include('admin.includes.header')
        @include('admin.includes.aside')
        <div class="content-wrapper" style="min-height: 257px; margin-left: 300px !important;">
            <div class="content-header">
                <div class="container-fluid">
                    @include('admin.includes.error-message')
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Liste des travaux pratiques de matière {{ $matiere }}</h1>
                        </div><!-- /.col -->
                       
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <a href="{{ url('enseignant/tp') }}" class="btn btn-success">
                                Retour
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Liste des travaux pratiques</h3>

                                <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <a href="{{ route('travaux_pratiques.create', ['matiere_id' => $matiere_id]) }}" class="btn btn-primary">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>titre</th>
                                        <th>Date de creation</th>
                                        <th>Date de modification</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tps as $tp)
                                    <tr>
                                        <td>{{ $tp->titre }}</td>
                                        <td>{{ $tp->created_at }}</td>
                                        <td>{{ $tp->updated_at }}</td>
                                        <td>
                                            <div class="d-flex justify-content-around">
                                                <form action="{{ route('travaux_pratiques.destroy', ['matiere_id' => $tp->matiere_id, 'travaux_pratique' => $tp->id]) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn-delete" onclick="return confirm('Voules-vous supprimer ce chapitre')">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                                <a href="{{ route('travaux_pratiques.edit', ['matiere_id' => $tp->matiere_id, 'travaux_pratique' => $tp->id]) }}" onclick="return confirm('Voules-vous modifier ce chapitre')">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="{{ url('enseignant/travails/'.$tp->id) }}" onclick="return confirm('Voules-vous modifier ce chapitre')">
                                                    Compte rendu
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>titre</th>
                                        <th>Date de creation</th>
                                        <th>Date de modification</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
