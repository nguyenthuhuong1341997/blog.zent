<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests\CreateRequestPost;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');  //kiem tra dang nhap hay chua
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::All();

        return view('post',['posts'=> $posts]);
    }

    public function getList()
    {
    	$posts = Post::join('users','users.id','=','posts.user_id')
        ->select('posts.id','posts.title','users.name');
        return datatables()->of($posts)
            ->addColumn('action', function($post){
                return ' 
                	<button data-title="show" PostId="'. $post->id .'" data-toggle="modal" data-target="#show" class="btn btn-info show"><i class="fas fa-eye"></i></button>
                    <button data-title="edit" PostId="'. $post->id .'" data-toggle="modal" data-target="#edit" class="btn btn-sm btn-primary edit"><i class="fas fa-edit"></i> </button>
                    <button PostId="'. $post->id .'" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>';

            })
        // ->addColumn('photo', function($post){
        //     return '<img class="img-fluid" src="'. $post->thumnail .'">';
        // })
        ->rawColumns(['action'])
        ->toJson();
    }

    public function show($id){
        $posts= Post::find($id);
        return response()->json($posts);
    }
    public function store(CreateRequestPost $resq){
        $data=$resq->all();

        $post= new Post;
        $post->title=$data['title'];
        $post->thumbnail=$data['thumbnail'];
        $post->description=$data['description'];
        $post->content=$data['content'];
        $post->slug=$data['slug'];
        $post->user_id=1;
        $post->category_id=1;
        $post->save();

        return redirect('admin/posts')->with('flag','Success. You have added a post');
    }

    public function update( CreateRequestPost $request,$id){
        $post= Post::find($id);        
         $data=$request->all();

         $post->update($data);
         return redirect('admin/posts')->with('flag','Success. You have updated a post');
    }
    public function destroy($id)
    {
        Post::find($id)->first()->delete();
        return response()->json(['eror'=>false]);
    }
}
