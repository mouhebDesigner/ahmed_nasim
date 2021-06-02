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
                @include('admin.includes.error-message')

                    
                    <!-- /.col -->
                    <div class="col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                        <h3 class="card-title">Liste des messages</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm">
                            
                            <div class="input-group-append">
                                <div class="btn btn-primary">
                                <i class="fas fa-search"></i>
                                </div>
                            </div>
                            </div>
                        </div>
                        <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                        
                        <div class="table-responsive mailbox-messages">
                            <table class="table table-hover table-striped">
                            <tbody>
                            @foreach($contacts as $contact)
                            <tr>
                                <td class="mailbox-name"><a href="{{ url('admin/contacts/'.$contact->id) }}">{{ $contact->email }}</a></td>
                                <td class="mailbox-subject"><b>{{ $contact->sujet }}</b> 
                                        {{ substr($contact->message,1 , 20)}}...
                                </td>
                                <td class="mailbox-attachment"></td>
                                <td class="mailbox-date">{{ $contact->created_at->diffForHumans() }}</td>
                                <td>
                                    <form action="{{ url('admin/contacts/'.$contact->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn-delete" onclick="return confirm('Voules-vous supprimer ce message')">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                            </table>
                            <!-- /.table -->
                        </div>
                        <!-- /.mail-box-messages -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer p-0">
                            {{ $contacts->links() }}
                        </div>
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
