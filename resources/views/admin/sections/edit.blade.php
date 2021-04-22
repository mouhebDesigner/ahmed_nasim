@extends('layouts.master')


@section('content')
<div class="wrapper">
        @include('includes.header')
        @include('includes.aside')
        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                     تحديث مادة 
                </h1>
               
            </section>
            <section class="content">
                <div class="row">
                    <div class="col-md-12 box box-primary">
                        <div class="col-md-6 offset-md-3">
                            <div class="">
                                <div class="box-header with-border">
                                    <h3 class="box-title">  املأ الحقول لتحديث  المادة </h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form action="{{ url('matieres/'.$matiere->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="box-body">
                                    <div class="form-group @error('groupe_id') has-error @enderror">
                                           <label for="groupe_id">اختر المجموعة </label>
                                           <select  name="groupe_id" class="form-control" id="groupe_id">
                                               <option value="" disabled selected>إختر مجموعة</option>
                                               @foreach(App\Groupe::all() as $groupe)
                                                    <option value="{{ $groupe->id }}" @if($groupe->id == $matiere->groupe_id) selected @endif>{{ $groupe->nom }} </option>
                                               @endforeach
                                           </select>
                                            @error('groupe_id')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group @error('groupe_id') has-error @enderror">
                                           <label for="groupe_id"> الأستاذ </label>
                                           <select  name="enseignant_id" class="form-control" id="groupe_id">
                                               <option value="" disabled selected>إختر إستاذ</option>
                                               @foreach(App\Enseignant::all() as $enseignant)
                                                    <option value="{{ $enseignant->id }}" @if($enseignant->id == $matiere->enseignant_id) selected @endif>{{ $enseignant->user->name }} </option>
                                               @endforeach
                                           </select>
                                            @error('enseignant_id')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group @error('libelle') has-error @enderror">
                                            <label for="libelle">إسم المادة </label>
                                            <input type="text" class="form-control" value="{{ $matiere->libelle }}" name="libelle" id="libelle" placeholder="أدخل إسم المادة ">
                                            @error('libelle')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                       

                                        <div class="form-group @error('logo') has-error @enderror">
                                                <div class="label_file">
                                                    <label for="logo">إختر الشعار</label>
                                                </div>
                                                <input type="file" class="file_input" id="logo" name="logo">
                                            @error('logo')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div><!-- /.box-body -->
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">حفظ</button>
                                        <button type="reset" class="btn btn-default" >إلغاء </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
   


@endsection