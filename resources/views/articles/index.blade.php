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
<script type="text/javascript">
  $(function(){
  $.ajaxSetup({
    headers: {
      'X-XSRF-Token': $('meta[name="_token"]').attr('content')
    }
  });
});
$(document).ready(function() {

  $(document).on('click', '.pagination a', function(e) {

    get_page($(this).attr('href').split('page=')[1]);

    e.preventDefault();

  });

});

function get_page(page) {

  $.ajax({

    url : '/articles?page=' + page,

    type : ‘GET’,

    dataType : 'json',

    success : function(data) {
      console.log(data);

      $('#articles-list').html(data['view']);

    },

    error : function(xhr, status, error) {

      console.log(xhr.error + "\n ERROR STATUS : " + status + "\n" + error);

    },

    complete : function() {

      alreadyloading = false;

    }

  });

}
</script>
 
@stop