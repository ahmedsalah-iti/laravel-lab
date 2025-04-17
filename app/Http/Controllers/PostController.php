<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate(6);
        foreach($posts as $post){
            $post->title = Str::limit($post->title,15);
            $post->content = Str::limit($post->content,15);

        }
        return view("posts.index",["posts"=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("posts.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $requestData = $request->all();
        $post  = new Post();
        if ($request->hasFile('image')){
            $imgPath = $request->file('image')->store('uploads', 'public');
            $requestData['image_url'] = $imgPath;
            $post->image_url = $requestData['image_url'];;
        }
        $post->title = $requestData['title'];
        $post->content = $requestData['content'];
        $post->user_id = Auth::id();
        $post->save();
        return view('message', [
            'status' => 'success',
            'message' => 'Post is added Successfully.'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Post::where('id',$id);
        $post = Post::find($id);
        // print_r($post->count());
        if(!$post){
            return view('message', [
                'message' => 'This Post is NOT Exist.'
            ]);
        }
        // return view("posts.index",["posts"=>collect([$post])]);
        return view('posts.view',['post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post = Post::find($id);
        if(!$post){
            return view('message', [
                'message' => 'This Post is NOT Exist.'
            ]);
        }
        return view('posts.edit',['post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request,$id)
    {
        $post = Post::find($id);
        if(!$post){
            return view('message', [
                'message' => 'This Post is NOT Exist.'
            ]);
        }
        if ($request->hasFile('image')){
            $imgPath = $request->file('image')->store('uploads', 'public');
            $requestData['image_url'] = $imgPath;
            $post->image_url = $requestData['image_url'];;
        }
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();
        return view("message",["status"=>"success","message"=>"Post Updated Successfuly."]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Post::destroy($id);

        $post = Post::find($id);
        if(!$post){
            return view('message', [
                'message' => 'This Post is NOT Exist.'
            ]);
        }
        $post->delete();
        return view('message', [
            'status' => 'success',
            'message' => 'Post is Removed Successfully.'
        ]);
    }
}
