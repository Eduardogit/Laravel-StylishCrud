<table class="table table-responsive" id="posts-table">
    
    @foreach($posts as $post)
    <p>titulo: <b>{!! $post->titulo !!}</b> </p>
    <p>contenido:</p><p>{!! $post->contenido !!}</p>
    <p>fecha: <b>{!! $post->updated_at !!}</b></p>
    {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('posts.edit', [$post->id]) !!}" class='btn btn-default'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-default ', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
                
    <hr>
    @endforeach
    </tbody>
</table>