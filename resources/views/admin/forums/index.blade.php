@extends('admin.layouts.master')

@section('content')
    <div class="wrapper">
        
        @include('admin.includes.header')
        @include('admin.includes.aside')
        <div class="content-wrapper" style="min-height: 257px;">
            <div class="content-header">
                <div class="container-fluid">
                    @include('admin.includes.error-message')
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Gérer les forums</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <div class="d-flex justify-content-end">
                                <a href="{{ url('admin/forums/create') }}" class="btn btn-primary">
                                    <i class="fa fa-plus"></i>
                                </a>
                            </div>
                        </div><!-- /.col -->
                       
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                       @foreach($forums as $forum)
                       <div class="col-md-6">
                            <!-- Box Comment -->
                            <div class="card card-widget collapsed-card">
                                <div class="card-header">
                                    <div class="user-block">
                                    <img class="img-circle" src="{{ asset('storage/'.App\Models\User::find($forum->user_id)->photo) }}" alt="User Image">
                                        <div class="d-flex">
                                        
                                            <span class="username"><a href="#">
                                            {{ App\Models\User::find($forum->user_id)->nom }}
                                            {{ App\Models\User::find($forum->user_id)->prenom }}
                                            </a></span>
                                            <span class="ml-2">
                                            {{ $forum->titre }}
                                            </span>
                                        </div>
                                    <span class="description">{{ $forum->created_at->diffForHumans() }}</span>
                                    </div>
                                    <!-- /.user-block -->
                                    <div class="card-tools d-flex">
                                    
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                        <form action="{{ url('admin/forums/'.$forum->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn-delete" onclick="return confirm('Voules-vous supprimer ce forum')">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body" style="display: none;">
                            
                                    <!-- post text -->
                                   <p>
                                    {{ $forum->description }}
                                   </p>
                                    
                                    <span class="float-right text-muted">{{ $forum->commentaires->count() }}  commentaires</span>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer card-comments" style="display: none;">
                                    @foreach($forum->commentaires as $comment)
                                    <!-- /.card-comment -->
                                    <div class="card-comment">
                                    <!-- User image -->
                                        <img class="img-circle img-sm" src="{{ asset('storage/'.App\Models\User::find($comment->user_id)->photo) }}" alt="User Image">

                                        <div class="comment-text">
                                            <span class="username">
                                            
                                            <span class="text-muted float-right">{{ $comment->created_at->diffForHumans() }}</span>
                                            </span><!-- /.username -->
                                            {{ $comment->contenue }}
                                            <form action="{{ url('commentaires/'.$comment->id) }}" method="post" class="form_comment">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn-delete" style="background: transparent" onclick="return confirm('Voules-vous supprimer ce forum')">
                                                    <i class="fa fa-trash" style="transform: scale(1)"></i>
                                                </button>
                                            </form>
                                        </div>
                                    <!-- /.comment-text -->
                                    </div>
                                    @endforeach
                                    <!-- /.card-comment -->
                                </div>
                                <!-- /.card-footer -->
                                <div class="card-footer" style="display: none;">
                                    <form action="{{ url('commentaires') }}" class="" method="post">
                                        @csrf
                                        <input type="hidden" value="{{ $forum->id }}" name="forum_id">

                                        <img class="img-fluid img-circle img-sm" src="{{ asset('storage/'.Auth::user()->photo) }}" alt="Alt Text">
                                        <!-- .img-push is used to add margin to elements next to floating images -->
                                        <div class="img-push d-flex">
                                            <input type="text" name="message" class="form-control form-control-sm" placeholder="Saisir votre commentaire">
                                            <button type="submit" style="border: none; background: transparent">
                                                <i class="fa fa-share"></i>                                        
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            <!-- /.card-footer -->
                            </div>
                            <!-- /.card -->
                        </div>
                       @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
