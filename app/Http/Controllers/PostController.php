<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $post = post::all();
        return  $post;
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => ['required', 'string', 'min:3', 'max:80'],
            'name' => ['required', 'string', 'min:3', 'max:30'],
            'number' => ['required', 'integer', 'numeric'],
            'image' => ['required','image', 'mimes:png,jpg,jpeg'],
            'date' => ['required','date'],
        ]);
        if ($validator->fails()) {
            return response()->json(
                [
                    'status' => 400,
                    'icon' => 'error',
                    'message'=>$validator->getMessageBag()->first()
                ],401
            );
        } else {
            $image=$request->file('image');
            $image_name=$image->getClientOriginalName();
            $image_name=time() .'.'. $image_name;
            $image->move(public_path('uploads'),$image_name);
            $post = new post();
            $post->title = $request->title;
            $post->name = $request->name;
            $post->number = $request->number;
            $post->image = $image_name;
            $post->date = $request->date;
            $result = $post->save();
            return response()->json(
                [
                    'message' => $result ? "Book created successfully" : " faild to created Book",
                    // 'token' => $header,
                    'icon' => 'success',
                    'status' => 200,
                ]
            );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $post = post::FindOrFail($id);
        return $post;
    }
    public function edit(string $id)
    {
        //
        $post = post::FindOrFail($id);
      if ($post) {
        return response()->json(
            [
                'message' => 'Post Data',
                'status' => 200,
                'data' => $post
            ],200
        );
      }else{
        return response()->json(
            [
                'message' => 'Failed find data',
                'status' => 400,
                'data'=>[]
            ],401);
      }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = validator::make($request->all(),[
            'title' => ['required', 'string', 'min:3', 'max:80'],
            'name' => ['required', 'string', 'min:3', 'max:30'],
            'number' => ['required', 'integer', 'numeric'],
            'image' => ['nullable', 'image',  'mimes:png,jpg,jpeg'],
            'date' => ['required','date'],
        ]);
        if (!$validator->fails()) {
            $post = post::FindOrFail($id);

            $image=$request->file('image');
            $image_name=$image->getClientOriginalName();
            $image_name=time() .'.'. $image_name;
            $image->move(public_path('uploads'),$image_name);
            $post->title = $request->title;
            $post->name = $request->name;
            $post->number = $request->number;
            $post->image = $image_name;
            $post->date = $request->date;
            $result = $post->save();
            return response()->json(
                [
                    'message' => $result ? "Book Updated successfully" : " faild to Updated Book",
                    // 'token' => $header,
                    'icon' => 'success',
                    'status' => 200,
                ]
            );
        } else {
            return response()->json(
                [
                    'message'=>$validator->getMessageBag()->first(),
                    'status' => 400,
                    'icon' => 'error'
                ],401
            );
        }
    }
    public function search($query){
        $posts =Post::where('title','LIKE','%'.$query.'%')->orWhere('number','LIKE','%'.$query.'%')
        ->orWhere('name','LIKE','%'.$query.'%')->get();
        return $posts;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $post = post::findOrFail($id);
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }
        return response()->json([
            'message' => $post->delete() ? "Book deleted successfully" : "faild to delete Book",
            'icon'=> $post->delete() ? "error" : "success",
            'data'=>$post,
        ]);
    }
}
