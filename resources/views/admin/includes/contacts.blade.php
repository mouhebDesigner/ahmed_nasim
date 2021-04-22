<div class="col-md-3">
    <a href="{{ url('contacts/create') }}" class="btn btn-primary btn-block margin-bottom">بعث رسالة</a>
    <div class="box box-solid">
    <div class="box-header with-border">
        <h3 class="box-title">المجلدات</h3>
        <div class="box-tools">
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body no-padding">
        <ul class="nav nav-pills nav-stacked">
        <li class="@if(Request::is('contacts')) active @endif"><a href="{{ url('contacts') }}"><i class="fa fa-inbox"></i>الرسائل المستلمة<span class="label label-primary pull-right">12</span></a></li>
        <li class="@if(Request::is('contact/envoyer')) active @endif"><a href="{{ url('contact/envoyer') }}"><i class="fa fa-envelope-o"></i>الرسائل المرسلة</a></li>
        <li><a href="#"><i class="fa fa-trash-o"></i> Trash</a></li>
        </ul>
    </div><!-- /.box-body -->
    </div><!-- /. box -->
    <!-- /.box -->
</div><!-- /.col -->