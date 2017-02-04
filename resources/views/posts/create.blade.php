@extends('layouts.app')
{!! Html::Style('assets/css/forms.css') !!}
@include('flash::message')
@section('content')
    <div class="register-logo">
            <a ><b>NUEVA ENTRADA</b></a>
    </div>
    <div class="content">
        @include('adminlte-templates::common.errors')
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'posts.store', 'files' => true]) !!}

                        @include('posts.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    @section('scripts')
        <script>

        var cont = 25;
        $('.contenidoform').keydown(function(event){
            
            var keyCount = parseInt($('#cont').html())
            if(event.keyCode != 8 && keyCount > 0){   
                cont+=.2;
                $('#cont').css('font-size',cont)
                $('#cont').html(keyCount-1)
            }else if(keyCount < 145 && keyCount > 0){
                $('#cont').html(keyCount+1)
            }else if(keyCount<0){
                $('#cont').html('0')
            }
        })
        </script>

    @endsection
@endsection
