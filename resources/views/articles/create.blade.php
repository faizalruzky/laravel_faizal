@extends('layouts.app')

@section('content')
  <div class="container">
  	<h1>Create Article</h1>
  	<hr>
  	<ol class="breadcrumb">
  		<li><a href="{{ url('/home') }}">Home</a></li>
  		<li><a href="{{ url('articles') }}">Articles</a></li>
  		<li>Create</li>
  	</ol>
  	@include('flash::message')
    {!! Form::open(['url' => 'articles', 'class' => 'form-horizontal', 'role' => 'form', 'enctype'=>"multipart/form-data"]) !!}
      @include('articles.form', ['submitText' => '<i class="fa fa-plus"></i> Create'])
    {!! Form::close() !!}

    <!-- ================================================== -->
  </div>
@stop