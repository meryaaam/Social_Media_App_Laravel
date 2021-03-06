<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image ;

class PostsController extends Controller
{

    public function __construct() { $this->middleware('auth') ;}

    public function create ()
    {
        return view ('posts/create') ;
    }


    public function store()
    {
        $data = Request()->validate([
            'another'=>'' ,
            'caption'=> 'required',
            'image' => 'required|image' , //the image must be an image
        ]) ;

         $imagepath = request('image')->store('uploads' , 'public') ;

         $image = Image::make(public_path("storage/{$imagepath}"))->fit(1200,1200) ; //cut and fit 1200 1200 square
         $image->save() ;
             auth()->user()->posts()->create([
            'caption' =>$data['caption'] ,
            'image' => $imagepath ,

                  ]) ;


            return redirect('/profile/' . auth()->user()->id) ;

     //   dd(request()->all() ) ;
    }



    public function show(\App\Models\Post $post)
    {
        return view('posts.show' , compact('post')) ;
    }
}
