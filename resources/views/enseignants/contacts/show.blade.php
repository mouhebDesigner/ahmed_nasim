@extends('admin.layouts.master')

@section('content')
    <div class="wrapper">
        
        @include('admin.includes.header')
        @include('admin.includes.aside')
        <div class="content-wrapper" style="min-height: 257px">
             <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Contact</h1>
                    </div>
                    <div class="col-sm-6">
                        
                    </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                            <h3 class="card-title">Lire message</h3>

                            <div class="card-tools">
                            </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                            <div class="mailbox-read-info">
                                <h5>{{ $contact->sujet }}</h5>
                                <h6>De: <span style="font-weight: bold">{{ $contact->email }}</span><span class="mailbox-read-time float-right">{{ $contact->created_at }}</span></h6>
                            </div>
                            <!-- /.mailbox-read-info -->
                            
                            <!-- /.mailbox-controls -->
                            <div class="mailbox-read-message">
                                <p>
                                    {{ $contact->message }}
                                </p>
                            </div>
                            <!-- /.mailbox-read-message -->
                            </div>
                            <!-- /.card-body -->
                            
                            <!-- /.card-footer -->
                            <div class="card-footer">
                            <div class="float-right">
                                <a href="{{ url('admin/contacts') }}" type="button" class="btn btn-default"><i class="fas fa-reply"></i>Retour</a>
                            </div>
                            </div>
                            <!-- /.card-footer -->
                        </div>
                    <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
        </div>
    </div>
@endsection
