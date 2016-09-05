<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Article;
use DB;
use Excel; 

class ExcelController extends Controller
{
    public function getImport(){
    	return view('excels.importArticle');
    }
    public function postImport(){
    	Excel::load(Input::file('article'),function($reader){
    		$reader->each(function($sheet){
    			Article::firstOrCreate($sheet->toArray());
    		});
    	});
    	return redirect('articles');
    }
    public function getExport(){
    	$article=Article::select('id','title','content')->get();
    	Excel::create('Export Data',function($excel) use ($article){
    		$excel->sheet('Sheet 1',function($sheet) use ($article){
    			$sheet->fromArray($article);
    		});
    	})->export('xlsx');
    }
    public function deleteAll(){
    	DB::table('articles')->delete();
    	return redirect('articles');
    }
}
