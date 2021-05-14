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
                            <h1 class="m-0">Gérer les quizzes</h1>
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
                                <h3 class="card-title">Liste de quizzes</h3>

                                <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                    <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Matiere</th>
                                        <th>Nombre de questions</th>
                                        <th>Nombre de réponses</th>
                                        <th>Date de creation</th>
                                        <th>Date de modification</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($quizzes as $quizze)
                                    <tr>
                                        <td>{{ $quizze->matiere->titre }}</td>
                                        <td>{{ $quizze->nbr_questions }}</td>
                                        <td>{{ $quizze->nbr_reponses }}</td>
                                        <td>{{ $quizze->matiere->created_at }}</td>
                                        <td>{{ $quizze->matiere->updated_at }}</td>
                                        <td>
                                            <div class="d-flex justify-content-around">
                                                <a href="{{ route('questions.index', ['quizze_id' => $quizze->id]) }}" class="btn btn-primary">
                                                    Questions
                                                </a>
                                                <form action="{{ route('quizzes.destroy', ['quiz' => $quizze->id]) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn-delete" onclick="return confirm('Voules-vous supprimer ce module')">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                                <a href="{{ route('quizzes.edit', ['quiz' => $quizze->id]) }}" onclick="return confirm('Voules-vous modifier ce module')">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Matiere</th>
                                        <th>Nombre de questions</th>
                                        <th>Nombre de réponses</th>
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
