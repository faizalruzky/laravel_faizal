@extends('layouts.app')

@section('content')
  <div class="container">
    <ol class="breadcrumb">
      <li><a href="{{ url('/home') }}">Home</a></li>
      <li><a href="{{ url('articles') }}">Articles</a></li>
    </ol>
    <div class="panel panel-info">
      <div class="panel-heading">
        <h3 class="visible-lg-inline visible-md-inline">Articles</h3>
        <a href="{{ url('articles/create') }}" class="btn btn-primary pull-right">
          <i class="fa fa-plus"></i> Create Article
        </a>
      </div>
      <div class="panel-body">
        @include('flash::message')
        <div class="table-responsive">
          <table class="table table-bordered table-striped table-hover">
          <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Image</th>
            
            <th>Edit</th>
            <th>Delete</th>
          </tr>
          @foreach ($articles as $article)
            <tr>
              <td><a href="{{ url("articles", $article->id) }}">{{ $article->title }}</a></td>
              <td><a href="{{ url("articles", $article->id) }}">{{ $article->author }}</a></td>
              <td><a href="{{ url("articles", $article->id) }}">{{ $article->image }}</a></td>
              
              <td>
                <a class="btn btn-info" href="{{ action('ArticlesController@edit', $article->id) }}"><i class="fa fa-pencil"></i> Edit</a>
              </td>
              <td>
              {!! Form::open(['action' => ['ArticlesController@destroy', $article->id], 'method' => 'DELETE']) !!}
                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
              {!! Form::close() !!}
              </td>
            </tr>
          @endforeach
          </table>
          {!! $articles->links() !!}
        </div>
      </div>
    </div>
    <!-- ================================================== -->
  </div>
@stop