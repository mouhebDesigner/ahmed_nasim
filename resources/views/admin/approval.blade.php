@extends('admin.layouts.master')

@section('content')
    <div class="wrapper">
        
        @include('admin.includes.header')
        @include('admin.includes.aside')
        <div class="content-wrapper" style="min-height: 257px; margin-left: 300px">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">
                                Vous n'êtes pas approuvé
                            </h1>
                        </div><!-- /.col -->
                       
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection
