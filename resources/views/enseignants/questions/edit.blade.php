@extends('admin.layouts.master')


@section('content')
<div class="wrapper">
        @include('admin.includes.header')
        @include('admin.includes.aside')
        <div class="content-wrapper" style="margin-left: 300px !important;">
            <section class="content-header" >
                <h1>
                    Ajouter une question 
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
                        <form action="{{ route('questions.update', ['question' => $question->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="content">Question</label>
                                    <input type="text" class="form-control" name="content" value="{{ $question->content }}" id="content" placeholder="Saisir question">
                                    @error('content')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                @foreach($question->reponses as $key => $reponse)
                                    <div class="form-group">
                                        <label for="reponse_{{ $key+1 }}">Réponse {{ $key+1 }}</label>
                                        <input type="text" class="form-control" name="reponse_{{ $key+1 }}" value="{{ $reponse->titre }}" id="reponse_{{ $key+1 }}" placeholder="Saisir réponse">
                                        @error('reponse_{{ $key+1 }}')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                @endforeach
                                <div class="form-group">
                                    <label for="reponse_correct">Réponse correcte</label>
                                    <select name="reponse_correct" id="reponse_correct" class="form-control">
                                        <option value="" selected disbaled>Choisir réponse correct</option>
                                        @for($i = 1; $i <= App\Models\Quizze::find($question->quizze_id)->nbr_reponses; $i++)
                                            <option value="reponse_{{ $i }}" @if($question->reponses[$i-1]->reponse) selected @endif>Réponse {{ $i }}</option>
                                        @endfor
                                    </select>
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