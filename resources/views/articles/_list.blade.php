<!-- @extends('layouts.application') -->
<div id="articles-list">
     <div class="col-lg-12" id="enrolls-list">
      <h1>Training Candidates</h1>
      <div class="row">
        <a href="{{URL::to('/deleteAll')}}" class="btn btn-danger">Delete All</a>
        <a href="{{URL::to('/getImport')}}" class="btn btn-success">Import</a>
        <div class="btn-group">
          <button type="button" class="btn btn-info">Export</button>
          <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
            <span class="caret"></span>
            <span class="sr-only">Toggole Dropdown</span>
          </button>
          <ul class="dropdown-menu" role="menu" id="export-menu">
            <li id="export-to-excel"><a href="{{URL::to('/getExport')}}">Export to Excel</a></li>
            <li class="divider"></li>
            <li><a href="#">Other</a></li>
          </ul>
        </div>
      </div>

      <table class="table table-bordered table-hover">

        <thead>

          <tr>

            <th class="text-center"><a id="id">ID<i id="ic-direction"></i></a></th>

            <th class="text-center">Title</th>

            <th class="text-center">Content</th>
            <th class="text-center">Author</th>
            <th class="text-center">Image</th>


            <th class="text-center">Action</th>

          </tr>

        </thead>

        <tbody>

          @foreach($articles as $article)

          <tr>

            <td class="text-center">{!! $article->id !!}</td>

            <td class="text-center">{!! $article->title !!}</td>
            <td class="text-center">{!! $article->content !!}</td>
            <td class="text-center">{!! $article->author !!}</td>
            <td class="text-center">{!! $article->image !!}</td>


            <td class="text-center">

              {!!link_to('articles/'.$article->id, 'Show', array('class' => 'btn btn-info'))!!}

              {!!link_to('articles/'.$article->id.'/edit', 'Edit', array('class' => 'btn btn-warning'))!!}

              {!! Form::open(array('route' => array('articles.destroy', $article->id), 'method' => 'delete','style' => 'display:inline')) !!}

              {!! Form::submit('Delete', array('class' => 'btn btn-danger',"onclick" => "return confirm('are you sure?')")) !!}

              {!! Form::close() !!}

            </td>

          </tr>

          @endforeach

        </tbody>

      </table>

      <div>

        {!! $articles->render() !!}

      </div>
    </div>

    <input id="direction" type="hidden" value="asc" />
</div>

