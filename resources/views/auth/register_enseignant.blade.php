@extends('layouts.master')

@section('includes')
    @include('includes.header')
@endsection

@section('content')
    <section class="register-section pt-100 pb-100 loaded">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if(session('signed'))
                        <div class="alert alert_success">
                            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                            <strong>Succés! </strong>  {{ session('signed') }}
                        </div>             
                    @endif
                </div>
            </div>
            <div class="register-box">
                <div class="sec-title text-center mb-30">
                    <h2 class="title mb-10">Créer un nouveau compte enseignant</h2>
                </div>
                <!-- Login Form -->
                @include('includes.enseignant_forms')
            </div>
        </div>
    </section>
@endsection

