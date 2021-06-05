@extends('admin.layouts.master')

@section('content')
    <div class="wrapper">
        
        @include('admin.includes.header')
        @include('admin.includes.aside')
        <div class="content-wrapper" style="min-height: 257px; margin-left: 300px !important;">
            <div class="content-header">
                <div class="container-fluid">
                    @include('admin.includes.error-message')
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Liste des matières</h1>
                        </div><!-- /.col -->
                       
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Liste des matiéres</h3>

                                <div class="card-tools">
                            
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>titre</th>
                                        <th>enseigne</th>
                                        <th>Date de creation</th>
                                        <th>Date de modification</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($matieres_list as $matiere)
                                    <tr>
                                        <td>{{ $matiere->titre }}</td>
                                        <td>
                                        @if($matiere->has_tp == TRUE)
                                            @if($matiere->tp->enseignant_id == Auth::user()->enseignant->id)
                                                Tp
                                            @endif
                                        @endif
                                        @if($matiere->has_td == TRUE)
                                            @if($matiere->td->enseignant_id == Auth::user()->enseignant->id)
                                                Td
                                            @endif
                                        @endif

                                        @if($matiere->has_cour == TRUE)
                                            @if($matiere->cour->enseignant_id == Auth::user()->enseignant->id)
                                                Cour
                                            @endif
                                        @endif
                                        </td>
                                        <td>{{ $matiere->created_at }}</td>
                                        <td>{{ $matiere->updated_at }}</td>
                                      
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>titre</th>
                                        <th>enseigne</th>
                                        <th>Date de creation</th>
                                        <th>Date de modification</th>
                                    </tr>
                                </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
