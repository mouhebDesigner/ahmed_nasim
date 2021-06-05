@extends('layouts.master')

@section('includes')
    @include('includes.header')
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
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
                    <h2 class="title mb-10">Créer un nouveau compte etudiant</h2>
                </div>
                <!-- Login Form -->
                @include('includes.etudiant_forms')
                


            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        $("#cycle").on('change', function(){
            var cycle = $(this).val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:'get',
                url:'/sections/'+cycle,
                success:function(data) {
                    console.log(data);
                    $("#section_id").empty();
                    $('#section_id').append('<option value="" selected disabled>Choisir votre section</option>');
                    $.each(data, function(index, value){
                        $('#section_id').append('<option value="'+value.id+'">'+value.titre+'</option>');
                    });
                }    
            });
        });
        $("#cycle").on('change', function(){
            var cycle = $(this).val();

            if(cycle == 'licence'){
                $('#niveau').empty();
                $("#niveau").append('<option value="" selected disbaled>Choisir niveau</option>')
                $("#niveau").append('<option value="première">Première année</option>')
                $("#niveau").append('<option value="deuxième">Deuxième année</option>')
                $("#niveau").append('<option value="troisième">Troisième année</option>')
            } else {
                $('#niveau').empty();
                $("#niveau").append('<option value="" selected disbaled>Choisir niveau</option>')
                $("#niveau").append('<option value="première">Première année</option>')
                $("#niveau").append('<option value="deuxième">Deuxième année</option>')
            }
            
            // Get sections 
           
            
        });
    </script>
@endsection

