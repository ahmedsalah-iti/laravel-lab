<?php

namespace App\Http\Controllers\Api;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;
use App\Models\Post;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $posts = Post::paginate(6);
        $posts = Post::all();
        // return $posts;
        return PostResource::collection($posts);
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
        return "stored";
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $post = Post::find($id);
        if(!$post){
            return "not found";
        }
        return new PostResource($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request,$id)
    {
        $post = Post::find($id);
        if(!$post){
            return "not found";
        }
        if ($request->hasFile('image')){
            $imgPath = $request->file('image')->store('uploads', 'public');
            $requestData['image_url'] = $imgPath;
            $post->image_url = $requestData['image_url'];;
        }
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();
        return "updated";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Post::destroy($id);

        $post = Post::find($id);
        if(!$post){
            return "not found";
        }
        $post->delete();
        return "deleted";
    }
}
