<div id="rs-popular-courses" class="rs-popular-courses bg6 style1 pt-94 pb-70 md-pt-64 md-pb-40">
    <div class="container" >
        <div class="row y-middle mb-50 md-mb-30">
            <div class="col-md-6 sm-mb-30">
                <div class="sec-title">
                    <div class="sub-title primary">Formations</div>
                    <h2 class="title mb-0">Les derniérs formations</h2>
                </div>
            </div>
            <div class="col-md-6">
                <div class="btn-part text-right sm-text-left">
                    <a href="{{ url('formations') }}" class="readon">Voir tous</a>
                </div>
            </div> 
        </div>
        <div class="row">
            @foreach(App\Models\Formation::all() as $formation)

            <div class="col-lg-4 col-md-6 mb-30 wow fadeInUp" data-wow-delay="300ms" data-wow-duration="2000ms" style="visibility: visible; animation-duration: 2000ms; animation-delay: 300ms; animation-name: fadeInUp;">
                <div class="courses-item">
                    <div class="img-part">
                        <img src="{{ asset('storage/'.$formation->image) }}" alt="" style="width: 100%; height: 200px">
                    </div>
                    <div class="content-part">
                        <ul class="meta-part">
                            <li><a class="categorie" href="#">{{ $formation->titre }}</a></li>
                        </ul>
                        <div class="bottom-part">
                            <div class="info-meta">
                                <p>
                                
                                   {{ substr($formation->description, 0, 60) }}...
                                </p>
                            </div>
                            <div class="btn-part">
                                <a href="{{ url('formations/'.$formation->id.'/show') }}"><i class="flaticon-right-arrow"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
                @endforeach
            
            
            
            
            
        </div>
    </div>
</div>