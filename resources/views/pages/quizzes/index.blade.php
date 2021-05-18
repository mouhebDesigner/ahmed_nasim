@extends('layouts.master')

@section('includes')
    @include('includes.header')
@endsection

@section('content')
 
<div id="rs-blog" class="rs-blog style1 pt-94 pb-100 md-pt-64 md-pb-70">
    <div class="container">
        <div class="sec-title mb-60 md-mb-30 text-center">
            <div class="sub-title primary">Bon chance pour l'examen</div>
        </div>
            <form action="{{ url('quizze/'.$quizze_id) }}" method="post">
                @csrf
                @foreach($questions as $question)
                    <div class="row mt-5">
                        <div class="col-md-8 offset-md-2">
                            <div class="question">{{ $question->content }} ?</div>
                            <input type="hidden" value="{{ $question->id }}" name="question_ids[]">
                        </div>
                    </div>
                    <div class="row mt-5">
                        @foreach($question->reponses as $key => $reponse)
                        <div class="col-md-8 offset-md-2">
                            <div class="reponse">
                                <input type="radio" value="{{ $reponse->id }}" id="reponse{{ $reponse->id }}" name="reponse{{ $question->id }}">
                                <label for="reponse{{ $reponse->id }}">{{ $reponse->titre }}</label>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @endforeach
                <div class="row mt-5">
                    <div class="col-md-8 offset-md-2">
                        <input type="submit" class="button_quiz" value="Envoyer">
                    </div>
                </div>
            </form>
    </div>
</div>
@endsection

