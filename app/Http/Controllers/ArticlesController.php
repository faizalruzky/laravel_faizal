<?php

namespace App\Http\Controllers;
use App\Http\Requests\ImageUploadRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
// use Request;
use Validator;
use Session;
use App\Article;
use App\Comment;
use Image, File;

class ArticlesController extends Controller
{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/

public function __construct(){
    $this->middleware('auth');
} 

public function index(Request $request)
{
     if($request->ajax()) {

    if($request->keywords) {

        $articles = Article::where('title', 'like', '%'.$request->keywords.'%')

          ->orWhere('content', 'like', '%'.$request->keywords.'%')

          ->paginate(3);

      }else {
       $articles = Article::orderBy('id', $request->direction)

      ->paginate(3);
    }

    $request->direction == 'asc' ? $direction = 'desc' : $direction = 'asc';

    $view = (String)view('articles._list')

      ->with('articles', $articles)

      ->render();

    return response()->json(['view' => $view, 'direction' => $direction]);

  } else {

    $articles = Article::orderBy('created_at', 'desc')->paginate(3);

    return view('articles.index')

      ->with('articles', $articles);

  }
}

/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
    return view('articles.create');
}

/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request)
{
// dd($request->all());
    $validate = Validator::make($request->all(), Article::valid());
    if($validate->fails()) {
        return back()
        ->withErrors($validate)
        ->withInput();

    } else {
        $add = new Article();
        $add->title=$request->title;
        $add->content=$request->content;
        $add->author=$request->author;
        $file = $request->file('photo');
        $add->image=$file->getClientOriginalName();

        $add->save();
        $img = Image::make($file);
        $img->backup();
        $img->crop(600, 300,0,0);
        $image_location = public_path().'/uploads/images/'.$add->id;

        if(!File::exists($image_location)) {
            File::makeDirectory($image_location, $mode=0777, true, true);
        }
// save the same file as jpeg with default quality
        $img->save($image_location.'/resize-'.$file->getClientOriginalName());
        $img->reset();
        $img->save($image_location.'/'.$file->getClientOriginalName());
        Session::flash('notice', 'Success add article');
        return Redirect::to('articles');
    }
}

/**
* Display the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function show($id)
{
    $article = Article::findOrFail($id);
    $comments = Article::find($id)->comments->sortBy('Comment.created_at');
    return view('articles.show')->with('article', $article)->with('comments', $comments);
}

/**
* Show the form for editing the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function edit($id)
{
    $article = Article::findOrFail($id);
    return view('articles.edit', compact('article'));
}

/**
* Update the specified resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function update(Request $request, $id)
{
    $validate = Validator::make($request->all(), Article::valid($id));
    if($validate->fails()) {
        return back()
        ->withErrors($validate)
        ->withInput();
    } else {
        $update_article = Article::find($id);               
        $update_article->title=$request['title'];
        $update_article->content=$request['content'];
        $update_article->author=$request['author'];
        if($request->file('photo') == "")
        {
            $update_article->image = $update_article->image;
        } 
        else{
            $file = $request->file('photo');
            $update_article->image=$file->getClientOriginalName();

            $update_article->save();
            $img = Image::make($file);
            $img->backup();
            $img->crop(600, 300,0,0);
            $image_location = public_path().'/uploads/images/'.$update_article->id;

            if(!File::exists($image_location)) {
                File::makeDirectory($image_location, $mode=0777, true, true);
            }
// save the same file as jpeg with default quality
            $img->save($image_location.'/resize-'.$file->getClientOriginalName());
            $img->reset();
            $img->save($image_location.'/'.$file->getClientOriginalName());
        }
        $update_article->update();
        Session::flash('notice', 'Success update article');
        return Redirect::to('articles');
    }
}

/**
* Remove the specified resource from storage.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function destroy($id)
{
    $article = Article::findOrFail($id);
    $image_location = public_path().'/uploads/images/'.$id.'/'.$article->image;
    unlink($image_location);
    $dir = public_path().'/uploads/images/'.$id;
    File::deleteDirectory($dir);
    if ($article->delete()) {
        Session::flash('notice', 'Article success delete');
        return Redirect::to('articles');
    } else {
        Session::flash('error', 'Article fails delete');
        return Redirect::to('articles');
    }
}
}
