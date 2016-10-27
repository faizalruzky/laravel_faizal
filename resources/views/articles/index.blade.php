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
  <div class="row">

    <div class="col-md-12 search">

      <div class="col-md-6">

        <div class="input-group input-group-sm">

          <input type="text" class="form-control" id="keywords" placeholder="Keywords">

          <span class="input-group-btn">

            <button id="search" class="btn btn-info btn-flat" type="button">

              Go!

            </button>

          </span>

        </div><!-- /input-group -->

      </div>

    </div>

  </div>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <div id="articles-list">
 
 @include('articles.list')
 </div>
<script src="/js/custom.js"></script>
@stop