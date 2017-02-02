@extends('layouts.app')
{!! Html::Style('assets/css/mains.css') !!}
@section('content')
    
    <div class="content">
        <a class="boton pull-right" href="{!! route('posts.create') !!}">Nuevo</a>
        <a class="pull-left" href="{!! url('home') !!}">Regresar al Sitio</a> 
    <div class="col-md-12">
        @include('flash::message')
        @include('posts.table')
    </div>
    </div>
@endsection

