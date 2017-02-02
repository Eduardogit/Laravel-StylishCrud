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
			<div class="col-md-12 col-xs-12 col-sm-12">
				<div class="text-post col-md-5 col-sm-12 col-xs-12 pull-right">
					<p><b>{{$post->titulo}}</b> {{$post->contenido}}</p>
				</div>
			</div>
				<img class="img-post"  src="{{asset('images')}}/{{$post->imagen}}" alt="">
			@else
				<img class="img-post-right"  src="{{asset('images')}}/{{$post->imagen}}" alt="">
				<div class="col-md-12 col-xs-12 col-sm-12">
					<div class="text-post-right col-md-5 col-sm-12 col-xs-12 pull-left">
						<p><b>{{$post->titulo}}</b> {{$post->contenido}}</p>
					</div>
				</div>

			@endif
		
		@endforeach
    </div>
</div>
@endsection
