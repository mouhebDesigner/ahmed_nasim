@extends('layouts.master')

@section('includes')
    @include('includes.header')
@endsection

@section('content')
 
<div id="rs-blog" class="rs-blog style1 pt-94 pb-100 md-pt-64 md-pb-70">
    <div class="container">
        <div class="sec-title mb-60 md-mb-30 text-center display_flex">
            @if($note >= round($questions / 2))
                <div class="sub-title primary congratulation">
                    Félicitation
                </div>
                @php 
                    $percent = ($note / $questions) * 100;
                @endphp
                <div class="circle_score" style="
                    background: linear-gradient(270deg, #21a7d0  {{{ $percent }}}%, transparent 0%), linear-gradient(0deg, black 0%, lightgray 0%);
                ">
                    <div class="circle">
                        {{ round($percent) }}%
                    </div>
                </div>
            @else 
                <div class="sub-title primary congratulation">
                    On vous souhaite bon chance pour la prochaine fois 
                </div>
                @php 
                    $percent = ($note / $questions) * 100;
                @endphp
                <div class="circle_score" style="
                    background: linear-gradient(270deg, #d73333 {{{ $percent }}}%, transparent 0%), linear-gradient(0deg, black 0%, lightgray 0%);
                ">
                    <div class="circle">
                        {{ round($percent) }}%
                    </div>
                </div>


            @endif
        </div>
    </div>
</div>
@endsection

