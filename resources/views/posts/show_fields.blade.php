<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $post->id !!}</p>
</div>

<!-- Titulo Field -->
<div class="form-group">
    {!! Form::label('titulo', 'Titulo:') !!}
    <p>{!! $post->titulo !!}</p>
</div>

<!-- Contenido Field -->
<div class="form-group">
    {!! Form::label('contenido', 'Contenido:') !!}
    <p>{!! $post->contenido !!}</p>
</div>

<!-- Imagen Field -->
<div class="form-group">
    {!! Form::label('imagen', 'Imagen:') !!}
    <p>{!! $post->imagen !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $post->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $post->updated_at !!}</p>
</div>

