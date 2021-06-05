@if(Auth::user()->grade =="admin")
<div class="row">

   
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
            <h3>{{ App\Models\Section::count() }}</h3>

            <p>Les Sections</p>
            </div>
            <div class="icon">
            <i class="ion ion-bag"></i>
            </div>
            <a href="{{ url('admin/sections') }}" class="small-box-footer">Voir plus <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
            <h3>{{ App\Models\Module::count() }}</h3>

            <p>Les Modules</p>
            </div>
            <div class="icon">
            <i class="ion ion-bag"></i>
            </div>
            <a href="{{ url('admin/modules') }}" class="small-box-footer">Voir plus <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
            <h3>{{ App\Models\Matiere::count() }}</h3>

            <p>Les Matiéres</p>
            </div>
            <div class="icon">
            <i class="ion ion-bag"></i>
            </div>
            <a href="{{ url('admin/matieres') }}" class="small-box-footer">Voir plus <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
            <h3>{{ App\Models\Etudiant::count() }}</h3>

            <p>Les étudiants</p>
            </div>
            <div class="icon">
            <i class="ion ion-bag"></i>
            </div>
            <a href="{{ url('admin/etudiants') }}" class="small-box-footer">Voir plus <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ App\Models\Enseignant::count() }}</h3>

                <p>Les enseignants</p>
            </div>
            <div class="icon">
            <i class="ion ion-bag"></i>
            </div>
            <a href="{{ url('admin/enseignants') }}" class="small-box-footer">Voir plus <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    

    
    <!-- ./col -->
</div>
@else 
<div class="row">

   
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
            <h3>{{ App\Models\Section::count() }}</h3>

            <p>Les Sections</p>
            </div>
            <div class="icon">
            <i class="ion ion-bag"></i>
            </div>
            <a href="{{ url('admin/sections') }}" class="small-box-footer">Voir plus <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
            <h3>{{ App\Models\Module::count() }}</h3>

            <p>Les Modules</p>
            </div>
            <div class="icon">
            <i class="ion ion-bag"></i>
            </div>
            <a href="{{ url('admin/modules') }}" class="small-box-footer">Voir plus <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
            @php
                $matieres_cour = App\Models\Cour::with('matiere')->where('enseignant_id', Auth::user()->enseignant->id)->get('matiere_id');
                $matieres_tp = App\Models\Tp::with('matiere')->where('enseignant_id', Auth::user()->enseignant->id)->get('matiere_id');
                $matieres_td = App\Models\Td::with('matiere')->where('enseignant_id', Auth::user()->enseignant->id)->get('matiere_id');
                $matieres = [];
                foreach($matieres_cour as $value){
                    array_push($matieres, $value->matiere_id);
                }
                
                foreach($matieres_tp as $value){
                    array_push($matieres, $value->matiere_id);
                }
                
                foreach($matieres_td as $value){
                    array_push($matieres, $value->matiere_id);
                }
                $matieres_count  = App\Models\Matiere::whereIn('id', $matieres)->count();
            @endphp
            <h3>{{ $matieres_count }}</h3>

            <p>Les Matiéres</p>
            </div>
            <div class="icon">
            <i class="ion ion-bag"></i>
            </div>
            <a href="{{ url('enseignant/matieres') }}" class="small-box-footer">Voir plus <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    
   
  
    

    
    <!-- ./col -->
</div>
@endif