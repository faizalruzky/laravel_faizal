@extends('layouts.app')
@section('content')
<div class="container">
  <ol class="breadcrumb">
    <li><a href="{{ url('/home') }}">Home</a></li>
    <li><a href="{{url('articles')}}">Articles</a></li>
  </ol>
  <div class="panel-heading">
    <h3 class="visible-lg-inline visible-md-inline">Articles</h3>
    <a href="{{ url('articles/create') }}" class="btn btn-primary pull-right">
      <i class="fa fa-plus"></i> Create Article
    </a>
  </div>
  <div id="articles-list">
 @include('articles.list')
</div>
 <script src="/js/custom.js"></script>
@stop