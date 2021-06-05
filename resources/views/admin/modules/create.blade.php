@extends('admin.layouts.master')


@section('content')
<div class="wrapper">
        @include('admin.includes.header')
        @include('admin.includes.aside')
        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    Ajouter un titre de module 
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
                        <form action="{{ url('admin/modules') }}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="section_id">Section</label>
                                    <select name="section_id" id="section_id" class="form-control">
                                        <option value="" selected disbaled>Choisir section</option>
                                        @foreach(App\Models\Section::all() as $section)
                                            <option value="{{ $section->id }}" @if(old('section_id') == $section->id) selected @endif>{{ $section->titre }}</option>
                                        @endforeach
                                    </select>
                                    @error('section_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="niveau">Niveau</label>
                                    <select name="niveau" id="niveau" class="form-control">
                                        <option value="" selected disbaled>Choisir niveau</option>
                                    </select>
                                    @error('niveau')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>



                                <div class="form-group">
                                    <label for="titre">Titre de module</label>
                                    <input type="text" class="form-control" name="titre" value="{{ old('titre') }}" id="titre" placeholder="Saisir titre de module">
                                    @error('titre')
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
   $("#section_id").on('change', function(){
        var section_id = $(this).val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'get',
            url:'/niveaux/'+section_id,
            data:'_token = <?php echo csrf_token() ?>',
            success:function(data) {

                if(data == 'licence'){
                    $('#niveau').empty();
                    $("#niveau").append('<option value="" selected disbaled>Choisir niveau</option>')
                    $("#niveau").append('<option value="première licence">Première année</option>')
                    $("#niveau").append('<option value="deuxième licence">Deuxième année</option>')
                    $("#niveau").append('<option value="troisième licence">Troisième année</option>')
                } else {
                    $('#niveau').empty();
                    $("#niveau").append('<option value="" selected disbaled>Choisir niveau</option>')
                    $("#niveau").append('<option value="première mastère">Première année</option>')
                    $("#niveau").append('<option value="deuxième mastère">Deuxième année</option>')
                }
            }    
        });
    });
</script>
            
@endsection