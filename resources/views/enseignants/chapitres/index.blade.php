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
                            <h1 class="m-0">Liste de chapitre de matière {{ $matiere }}</h1>
                        </div><!-- /.col -->
                       
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <a href="{{ url('enseignant/cours') }}" class="btn btn-success">
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
                                <h3 class="card-title">Liste de chapitres</h3>

                                <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <a href="{{ route('chapitres.create', ['matiere_id' => $matiere_id]) }}" class="btn btn-primary">
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
                                        <th>type de contenue</th>
                                        <th>Date de creation</th>
                                        <th>Date de modification</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($chapitres as $chapitre)
                                    <tr>
                                        <td>{{ $chapitre->titre }}</td>
                                        <td>{{ $chapitre->type }}</td>
                                        <td>{{ $chapitre->created_at }}</td>
                                        <td>{{ $chapitre->updated_at }}</td>
                                        <td>
                                            <div class="d-flex justify-content-around">
                                                <form action="{{ route('chapitres.destroy', ['matiere_id' => $chapitre->matiere_id, 'chapitre' => $chapitre->id]) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn-delete" onclick="return confirm('Voules-vous supprimer ce chapitre')">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                                <a href="{{ route('chapitres.edit', ['matiere_id' => $chapitre->matiere_id, 'chapitre' => $chapitre->id]) }}" onclick="return confirm('Voules-vous modifier ce chapitre')">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>titre</th>
                                        <th>type de contenue</th>
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
