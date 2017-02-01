

<div class="col-md-12">
	<div class="form-group">
	    {!! Form::text('titulo', null, array('placeholder'=>'titulo', 'class' => 'tituloform','maxlength'=>'50')) !!}
	</div>
</div>
<div class="col-md-12">
	<div class="form-group">
	    {!! Form::textarea('contenido', null, array('placeholder'=>'contenido', 'class' => 'contenidoform','maxlength'=>'300')) !!}
	</div>
</div>
<div class="col-md-1 text-primary pull-right" id="cont">300 </div>

<div class="col-md-12">
	<div class="form-group">
	   <label class="fileContainer">
    	Seleccione su imagen
	    {!! Form::file('imagen', null, array('class' => 'inputfile')) !!}
	    </label>
	</div>
</div>

<div class="form-group col-md-12">
    <input type="submit">
</div>

