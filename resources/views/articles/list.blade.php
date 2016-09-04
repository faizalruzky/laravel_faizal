  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <h1>Training Candidates</h1>

    <table class="table table-bordered table-hover">

      <thead>

        <tr>

          <th class="text-center"><a id="id">ID<i id="ic-direction"></i></a></th>

          <th class="text-center">Title</th>

          <th class="text-center">Content</th>

          <th class="text-center">Action</th>

        </tr>

      </thead>

      <tbody>

        @foreach($articles as $article)

          <tr>

            <td class="text-center">{!! $article->id !!}</td>

            <td class="text-center">{!! $article->title !!}</td>
            <td class="text-center">{!! $article->content !!}</td>

            <td class="text-center">

              {!!link_to('articles/'.$article->id, 'Show', array('class' => 'btn btn-info'))!!}

              {!!link_to('articles/'.$article->id.'/edit', 'Edit', array('class' => 'btn btn-warning'))!!}

              {!! Form::open(array('route' => array('articles.destroy', $article->id), 'method' => 'delete','style' => 'display:inline')) !!}

                {!! Form::button('Delete', array('class' => 'btn btn-danger', "onclick" => "return confirm('are you sure?')")) !!}

              {!! Form::close() !!}

            </td>

          </tr>

        @endforeach

      </tbody>

    </table>

    <div>

      {!! $articles->render() !!}

    </div>

<script src="/js/custom.js"></script>

