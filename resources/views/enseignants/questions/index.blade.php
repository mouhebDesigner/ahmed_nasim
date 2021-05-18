@extends('admin.layouts.master')

@section('content')
    @php

    $question_rest = App\Models\Quizze::find($quizze_id)->nbr_questions - App\Models\Quizze::find($quizze_id)->questions->count();

    @endphp
    <div class="wrapper">
        
        @include('admin.includes.header')
        @include('admin.includes.aside')
        <div class="content-wrapper" style="min-height: 257px">
            <div class="content-header">
                <div class="container-fluid">
                    @include('admin.includes.error-message')
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Gérer les questions</h1>
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
                                <div class="row">
                                    <div class="col">
                                        <div class="d-flex justify-content-between">

                                            <h3 class="card-title">Liste de questions</h3>
                                            @if($question_rest == 0)
                                                <a href="#" onclick="alert('Vous avez créé toutes les questions')" class="btn btn-primary">
                                                    <i class="fa fa-plus"></i>
                                                    {{ $question_rest }}
                                                </a>
                                            @else 
                                                <a href="{{ route('questions.create', ['quizze_id' => $quizze_id]) }}" class="btn btn-primary">
                                                    <i class="fa fa-plus"></i>
                                                    {{ $question_rest }}
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Question</th>
                                        <th>Nombre de réponses</th>
                                        <th>Date de creation</th>
                                        <th>Date de modification</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($questions as $question)
                                    <tr>
                                        <td>{{ $question->content }}</td>
                                        <td>{{ $question->reponses()->count() }}</td>
                                       
                                        <td>{{ $question->created_at }}</td>
                                        <td>{{ $question->updated_at }}</td>
                                        <td>
                                            <div class="d-flex justify-content-around">
                                                <form action="{{ route('questions.destroy', ['question' => $question->id]) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn-delete" onclick="return confirm('Voules-vous supprimer cet question')">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                                <a href="{{ route('questions.edit', ['question' => $question->id]) }}" onclick="return confirm('Voules-vous modifier cet question')">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Question</th>
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
