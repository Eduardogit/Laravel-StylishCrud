@extends('layouts.app')
{!! Html::Style('assets/css/forms.css') !!}
@include('flash::message')

@section('content')
@if(!empty($post))      
    <div class="register-logo">
            <a ><b>ACTUALIZA ENTRADA</b></a>
    </div>
    <div class="content">
        @include('adminlte-templates::common.errors')
            <div class="box-body">
                <div class="row">

                   {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'patch', 'files' => true]) !!}

                        @include('posts.fields')

                   {!! Form::close() !!}
                </div>
            </div>
        </div>
@else
    <a class="text-center btn btn-default" href="{{ url('posts') }}">Regresar</a>
@endif
@endsection
