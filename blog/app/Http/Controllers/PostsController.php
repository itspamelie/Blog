<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Cathegorie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
     public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
$posts= Post:: all();
return view('admin.posts')->with('posts', $posts);
    }
    public function showAdd(){
$categories= Cathegorie:: all();
return view('admin.post_add')
->with('categories',$categories);
    }


public function store(Request $request) {
$request->validate([
'title' => 'required| string | max: 255',
'description' => 'required| string |max: 255',
'content' => 'required|string',
'img' => 'nullable|image|mimes: jpeg,png,jpg,gif,webp|max:5120',
'cathegory_id'=>'required'
],[
'content. required' => 'El contenido es obligatorio.',
'img. image' => 'Debe ser una imagen válida.',
'cathegory_id'=>'Seleccione una categoria'

]);
$file = $request->file('img');
$filename = uniqid() . '.' . $file->getClientOriginalExtension();

//debe crear la carpeta posts en public
$file->move(public_path('posts/'), $filename);

$post = new Post();
$post->title=$request->title;
$post->description=$request->description;
$post->content=$request->content;
$post->img=$filename;
$post->cathegory_id=$request->cathegory_id;
$post->likes=0;
$post->user_id=Auth::User()->id;//el que esta loggeado
$post->save();
return redirect()
->back()
->with('success',"Post insertado correctamente");
}

}
