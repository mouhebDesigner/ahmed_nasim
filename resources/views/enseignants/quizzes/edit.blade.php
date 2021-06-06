@extends('admin.layouts.master')


@section('content')
<div class="wrapper">
        @include('admin.includes.header')
        @include('admin.includes.aside')
        <div class="content-wrapper"  style="">
            <section class="content-header">
                <h1>
                    Ajouter un quizze
                </h1>
            </section>
            <section class="content">
                <div class="row">
                <div class="col-md-12">
                
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Formulaire d'ajout</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('quizzes.update', ['quiz' => $quizze->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="card-body" id="inputs">
                                <div class="form-group">
                                    <label for="matiere_id">Matiére</label>
                                    <select name="matiere_id" id="matiere_id" class="form-control">
                                        <option value="" selected disbaled>Choisir matière</option>
                                        @foreach(App\Models\Matiere::all() as $matiere)
                                            @if(!$matiere->quizze || $matiere->id == $quizze->matiere_id )
                                            <option value="{{ $matiere->id }}" @if($quizze->matiere_id == $matiere->id) selected @endif>{{ $matiere->titre }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nbr_questions">Nombre de question</label>
                                    <input type="number" class="form-control" name="nbr_questions" value="{{ $quizze->nbr_questions }}" id="nbr_questions" placeholder="Saisir la nombre de question">
                                    @error('nbr_questions')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nbr_reponses">Nombre de réponses</label>
                                    <input type="number" class="form-control" name="nbr_reponses" value="{{ $quizze->nbr_reponses }}" id="nbr_reponses" placeholder="Saisir la nombre de question">
                                    @error('nbr_reponses')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
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

@section('script')
    <script>
        $("#type").on('change', function(){
            if($(this).val() == "video")
            {
                $("#video").css('display', 'block');
                $("#document").css('display', 'none');
            }
            else {

                $("#video").css('display', 'none');
                $("#document").css('display', 'block');
            }
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:'get',
                url:'/teachers/',
                data:'_token = <?php echo csrf_token() ?>',
                success:function(data) {
                    console.log(data);

                    $.each(data, function(index, value){
                        $('#enseignant_id_tp').append('<option value="'+value.id+'">'+value.nom+'</option>');
                    });

                }    
            });
        });
    </script>
@endsection