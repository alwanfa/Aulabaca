<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        return view('dashboard.posts.index', ["posts" =>  Post::paginate(5)] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create',[
            'categories'=> Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $validatedData=$request->validate([
            'tittle'=>'required|max:255',
            'slug'=>'required|unique:posts',
            'category_id'=>'required',
            'image'=>'image|file|max:10024',
            'dokumen'=>'mimes:pdf',
            'author'=>'required',
            'body'=>''
        ]);
        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('images');
        }
        $dokumen=$request->file('dokumen');
        $nama_dokumen='FT'.date('Ymdhis').'.'.$request->file('dokumen')->getClientOriginalExtension();
        $dokumen->move('dokumen/',$nama_dokumen);
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt']= Str::limit(strip_tags($request->body),1000);
        $validatedData['dokumen']=$nama_dokumen;
        Post::create($validatedData);
        return redirect('/dashboard/posts')->with('success','New post has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {    
        return view('dashboard.posts.show',[
            'post'=>$post
            
        ]) ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
{{      }} * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', [
            'post' => $post, 
            'categories' => Category::all() 
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $validatedData=$request->validate([
            'tittle'=>'required|max:255',
            'category_id'=>'required',
            'image'=>'image|file|max:10024',
            'document'=>'mimes:pdf|max:500000',
            'author'=>'required',
            'body'=>''
        ]);
        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('images');
        }
        if($request->file('dokumen')){
            $validatedData['dokumen'] = $request->file('dokumen')->store('dokumen');
        }
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt']= Str::limit(strip_tags($request->body),1000);
        $post->update($validatedData);
        return redirect('/dashboard/posts')->with('success','Post has been edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Post::destroy($post->id);
        return redirect('/dashboard/posts')->with('success','Post has beed deleted!');
    }
    public function checkSlug(Request $request)
    {
        $slug =SlugService::createSlug(Post::class,'slug',$request->tittle);
        return response()->json(['slug'=>$slug]);
    }

    public function postAll(){
        return view('DashboardAnonymous/Anonymous', ['postPilihan'=>Post::orderBy('view',"DESC")->limit(10)->get(),'postlike'=>Post::orderBy('view',"ASC")->limit(10)->get()]);
  
    }
  
    public function search(Request $request){
        $keyword= $request->keyword;
        $dataSearch = Post::where('tittle','like','%'.$keyword.'%')
        ->orWhere('author','like','%'.$keyword.'%')->get();
        if(count($dataSearch)>0){
            return view('search', ['posts'=>$dataSearch, 'condition'=>true]);
            // return $dataSearch->dd();
        }else{
            return view('search', ['posts'=>$dataSearch, 'condition'=>false]);;
        }

    }
    
}

