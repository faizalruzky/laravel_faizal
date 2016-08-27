    	<div class="form-group" >
            {!! Form::label("title", "Title:") !!}
            {!! Form::text("title", null, ["class" => "form-control"]) !!}
             {!! $errors->first('title') !!}
        </div>
        <div class="form-group" >
            {!! Form::label("content", "Content:") !!}
            {!! Form::textarea("content", null, ["class" => "form-control"]) !!}
             {!! $errors->first('content') !!}
        </div>
        <div class="form-group" >
            {!! Form::label("photo", "Photo:") !!}
            {!! Form::file("photo", null, ["class" => "form-control"]) !!}
             {!! $errors->first('photo') !!}
        </div>
        <div class="form-group" >
            {!! Form::label("author", "Author:") !!}
            {!! Form::text("author", null, ["class" => "form-control"]) !!}
             {!! $errors->first('author') !!}
        </div>           

    	<div class="form-actions">
            <button type="submit" name="submit" class="btn btn-primary">{!! $submitText !!}</button>
    	</div>