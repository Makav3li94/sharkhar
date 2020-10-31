<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Spatie\Tags\Tag;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		if (!auth()->guard('admin')->check()){
			$blogCategories = BlogCategory::all();
			$blogs = Blog::paginate(4);
			$blogsLatest = Blog::orderBy('id','DESC')->get()->take(5);
			$tags = Tag::all()->take(5);
			return view('blog.index',compact('blogs','blogCategories','tags','blogsLatest'));
		}else{
			$blogs = Blog::all();

			return view('admin.blog.index',compact('blogs'));
		}
    }
	public function create()
	{
		$blogCategories = BlogCategory::all();
		return view('admin.blogs.create',compact('blogCategories'));
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        	'title' => 'required|string',
        	'slug' => 'required|string',
        	'body' => 'required|string',
        	'image' => 'required|image',
        	'category_id' => 'required|numeric',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
         $blog = Blog::where('slug',$slug)->first();
	    $blogCategories = BlogCategory::all();
	    $blogsLatest = Blog::orderBy('id','DESC')->get()->take(5);
	    $tags = Tag::all()->take(5);
         return view('blog.single',compact('blog','blogCategories','tags','blogsLatest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
