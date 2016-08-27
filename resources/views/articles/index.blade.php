@extends('layouts.app')
@section('content')
  <div class="container">
    <ol class="breadcrumb">
      <li><a href="{{ url('/home') }}">Home</a></li>
      <li><a href="{{ url('articles') }}">Articles</a></li>
    </ol>
      <div class="panel-heading">
        <h3 class="visible-lg-inline visible-md-inline">Articles</h3>
        <a href="{{ url('articles/create') }}" class="btn btn-primary pull-right">
          <i class="fa fa-plus"></i> Create Article
        </a>
      </div>
        @foreach ($articles as $article)
          <div>
          {!! Form::open(['action' => ['ArticlesController@destroy', $article->id], 'method' => 'DELETE']) !!}
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
  <script type="text/javascript">
    $(document).ready(function(){
    $('.materialboxed').materialbox();
    });
  </script>

  
    <!-- ================================================== -->

@stop