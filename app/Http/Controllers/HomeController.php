<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use File;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();
        $blogs = $blogs->sortByDesc('id');

        return view('home', compact('blogs'));
    }

    public function addBlog() {
        return view('addblog');
    }

    public function postBlog(Request $request) {
        $formInput = $request->except('image');

        $this->validate($request, [
          'title' => 'required',
          'description' => 'required',
          'image' => 'required|image|mimes:png,jpg,jpeg|max:2000',
        ]);

        // image upload
        $image=$request->image;
        $location="img/blog/";
        File::makeDirectory($location, 0777, true, true);
        if ($image) {
          $imageName=$image->getClientOriginalName();
          $image->move($location, $imageName);
          $formInput['image']=$imageName;
        }

        Blog::create($formInput);

        return redirect('/home');
    }

    public function editBlog($id) {
        $blog = Blog::find($id);

        return view('editblog', compact('id', 'blog'));
    }

    public function putBlog(Request $request, $id) {
        $blog = Blog::find($id);

        $this->validate($request, [
          'title' => 'required',
          'description' => 'required',
          'image' => 'image|mimes:png,jpg,jpeg|max:2000',
        ]);

        // image upload
        $image=$request->image;
        $location="img/blog/";
        File::makeDirectory($location, 0777, true, true);
        if ($image) {
          $imageName=$image->getClientOriginalName();
          $image->move($location, $imageName);
          $blog->image = $imageName;
        }

        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->save();

        return redirect('/home');
    }

    public function deleteBlog($id) {
        $blog = Blog::find($id);
        $blog->delete();

        return redirect('/home');
    }
}
