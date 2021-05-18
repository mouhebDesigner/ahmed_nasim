@extends('layouts.master')

@section('includes')
    @include('includes.header')
@endsection

@section('content')
 
<div id="rs-blog" class="rs-blog style1 pt-94 pb-100 md-pt-64 md-pb-70">
    <div class="container">
        <div class="sec-title mb-60 md-mb-30 text-center">
            <div class="sub-title primary">Vous avez passé votre examen</div>
            @if($note < $questions)
                <a href="{{ url('repasser/'.$quizze_id) }}">Repasser examen</a>
            @endif
        </div>
    </div>
</div>
@endsection

