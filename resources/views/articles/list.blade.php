@foreach ($articles as $article)
<div>
  {!! Form::open(['action' => ['ArticlesController@destroy', $article->id], 'method' => 'DELETE']) !!}
 <!--  <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
  <div class="row">
    <div class="col s4 m4">
      <div class="card small">
        <div class="card-image">
          <img class="materialboxed" src="{{ asset('/uploads/images/'. $article->id . '/' . $article->image) }} " class="img-responsive">
          <span class="card-title">{{($article->title)}} </span>
        </div>
        <div class="card-content">
          <p>{!!substr($article->content,0,20)!!}...</p>
        </div>
        <div class="card-action">
          <a href="{{url('articles/'.$article->id)}}">Read more</a>
          <a href="{{ url('articles/'.$article->id. '/edit') }}"><button type="button" class="btn-floating waves-effect waves-light blue"><span class="glyphicon glyphicon-edit"></span></button></a> 
          <button type="submit" class="btn-floating waves-effect waves-light red"><span class="glyphicon glyphicon-trash"> </span>Delete</button>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
    @endforeach

  </div>
</div>
{!! $articles->render() !!}
<!-- ================================================== -->
</div>