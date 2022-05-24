<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;

class LibraryController extends Controller
{
    public function showAll(){
        return view('DashboardAnonymous.library',[
            'posts' => Post::orderBy('tittle',"ASC")->paginate(16),
            'categorys'=> Category::all()
        ]);
    }
    public function category(Request $request){
        $category = $request->keyword;
        $data=[];
        if($category == "semua"){
            $data=Post::orderBy('tittle',"ASC")->paginate(16);
        }else{
            $data=Post::where('category_id','like',$category)->paginate(16);
        }
        return view('category',['posts'=>$data]);
    }
}
