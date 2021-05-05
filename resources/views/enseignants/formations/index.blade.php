@extends('admin.layouts.master')

@section('content')
    <div class="wrapper">
        
        @include('admin.includes.header')
        @include('admin.includes.aside')
        <div class="content-wrapper" style="min-height: 257px">
            <div class="content-header">
                <div class="container-fluid">
                    @include('admin.includes.error-message')
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Liste de formations</h1>
                        </div><!-- /.col -->
                       
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Liste de formations</h3>

                                <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <a href="{{ route('formations.create') }}" class="btn btn-primary">
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
                                        <th>nombre de videos</th>
                                        <th>Date de creation</th>
                                        <th>Date de modification</th>
                                        <th>Videos</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($formations as $formation)
                                    <tr>
                                        <td>{{ $formation->titre }}</td>
                                        <td>{{ $formation->videos()->count() }}</td>
                                        <td>{{ $formation->created_at }}</td>
                                        <td>{{ $formation->updated_at }}</td>
                                        <td>
                                            <a href="{{ route('videos.index', ['formation_id', $formation->id]) }}">
                                                Afficher    
                                            </a>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-around">
                                                <form action="{{ route('formations.destroy', ['formation' => $formation->id]) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn-delete" onclick="return confirm('Voules-vous supprimer cette formation')">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                                <a href="{{ route('formations.edit', ['formation' => $formation->id]) }}" onclick="return confirm('Voules-vous modifier cette formation')">
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
                                        <th>nombre de videos</th>
                                        <th>Date de creation</th>
                                        <th>Date de modification</th>
                                        <th>Videos</th>
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
