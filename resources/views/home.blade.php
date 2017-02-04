@extends('layouts.app')
{!! Html::Style('assets/css/blog.css')!!}
@section('content')
<div class="container-fluid">

@if (Auth::check())
	<p>
	Bienvenido : <b>{{Auth::user()->email}}</b> | <a class="" href="{{url('auth/logout')}}">Logout</a> 
	<a id="reg" class="pull-right" href="{{ url('posts') }}">Nuevo post </a>
	</p>  
@endif
	
    <div class="row">
    	<div class="register-logo">
	        <a ><b>BLOG</b></a>
	        <p id="desc" class="text-center">Lorem ipsum dolor sit amet, voluptatum cupiditate, tenetur numquam rerum dicta consequatur libero
	        </p>
    	</div>
    	 <input type="hidden" value="{{ $i=1 }}">
		@foreach ($posts as $post)
		 <input type="hidden" value="{{$i++}}">
		
			@if( $i % 2 == 0)
			<div class=" contenedor col-md-12 col-xs-12 col-sm-12">
				<div class="text-post col-md-12 col-sm-12 col-xs-12 pull-right">
					<p class="col-md-5 pull-right"><b>{{$post->titulo}}</b> {{$post->contenido}}</p>
				</div>
				<img class="img-post col-md-6"  src="{{asset('images')}}/{{$post->imagen}}" alt="">
			@else
				<img class="img-post-right col-md-6 pull-right"  src="{{asset('images')}}/{{$post->imagen}}" alt="">
				<div class="  col-md-12 col-xs-12 col-sm-12">
					<div class="text-post-left col-md-4 col-sm-4 col-xs-4 pull-left">
						<p><b>{{$post->titulo}}</b> {{$post->contenido}}</p>
					</div>
				</div>
			</div>

			@endif
		
		@endforeach
    </div>
</div>
@endsection
