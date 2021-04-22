@if(session('added'))
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4> {{ session('added') }}	</h4>
        
    </div>              
@endif
@if(session('success'))
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4> {{ session('success') }}	</h4>
        
    </div>              
@endif
@if(session('updated'))
    <div class="alert alert-info alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4> {{ session('updated') }}	</h4>
        
    </div>              
@endif
@if(session('deleted'))
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4> {{ session('deleted') }}	</h4>
        
    </div>              
@endif
@if(session('exist'))
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4> {{ session('exist') }}	</h4>
        
    </div>              
@endif
