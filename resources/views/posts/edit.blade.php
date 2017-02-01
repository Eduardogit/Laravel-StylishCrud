@extends('layouts.app')
{!! Html::Style('assets/css/forms.css') !!}
@section('content')
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
@endsection