<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class PostApiController extends Controller
{
    public function index()
    {
        $post = Post::latest()->get();
        $data= array(
            'success'=>true, 
            'message'=>'Data was Found', 
            'data'=>$post
        );
        
        return response()->json($data, 201);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $post = Post::create($validatedData);

        return response()->json($post, 201);
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $data= array(
            'success'=>true, 
            'message'=>'Data was Found', 
            'data'=>$post
        );
        

        return response()->json($data,201);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $post = Post::findOrFail($id);
        $post->update($validatedData);

        return response()->json($post, 200);
    }

    public function destroy($id)
    {
        Post::destroy($id);
        $data= array(
            'success'=>true, 
            'message'=>'Data Deleted', 
            'data'=>[]
        );

        return response()->json($data, 200);
    }
}
