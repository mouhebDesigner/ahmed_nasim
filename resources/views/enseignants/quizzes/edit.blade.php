@extends('admin.layouts.layout')

@section('title')
    {{ __('messages.edit_quiz_page') }}
@endsection

@section('content')
    <div class="container page__container page-section pb-0 ">
        <div class="row header_content">    
            <h1 class="h2 mb-0">
                {{ __('messages.add_quiz') }}
            </h1>
        </div>
    </div>

    <div class="container page__container page-section">
        <form action="{{ url('admin/course/'.$course_id.'/quizzes/'.$quiz->id) }}" method='post' enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row mb-32pt">
                <!-- <div class="col-lg-4">
                <div class="page-separator">
                    <div class="page-separator__text">Default Forms</div>
                </div>
                <p class="card-subtitle text-70 mb-16pt mb-lg-0">
                    Luma supports all of Bootstrap's default form styling in addition to a handful of new input types and features. Please <a href="https://getbootstrap.com/docs/4.1/components/forms/" target="_blank">read the official documentation</a> for a full list of options from Bootstrap's core library.
                    </p>
                </div> -->
                <div class="col-lg-6  d-flex align-items-center form_design">
                    <div class="flex" style="max-width: 100%">
                      
                        
                        <!-- Number of questions -->
                        
                        <div class="form-group">
                            <input 
                            type="number"
                             name="nbr_questions" 
                             value="{{ $quiz->nbr_questions }}"
                             class="form-control" 
                            placeholder="{{ __('messages.nbr_questions') }}">
                            @error('nbr_questions')
                                <div class="invalid-message">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <button type="submit" class="btn btn-primary">{{ __('messages.edit_button')  }}</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection