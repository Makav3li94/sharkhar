<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use Carbon\Carbon;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Spatie\Tags\Tag;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\JsonLd;

class BlogController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		if ( ! auth()->guard( 'admin' )->check() ) {

			SEOTools::setTitle( 'شرخر بلاگ  | تکنولوژی، فروش، بازاریابی،دستیار فروش ،دیجیتال مارکتینگ و پرداخت امن' );
			SEOTools::setDescription( 'شرخر بلاگ  | منبع جامع اخبار و مقالات تخصصی در تکنولوژی، فروش، بازاریابی،دستیار فروش ،دیجیتال مارکتینگ و پرداخت امن' );
			SEOTools::opengraph()->setUrl( 'https//sharkhar.net/blogs' );
			SEOTools::setCanonical( 'https//sharkhar.net/blogs' );
			SEOTools::opengraph()->addProperty( 'type', 'articles' );
			SEOTools::twitter()->setSite( '@sharkhar' );
			SEOTools::jsonLd()->addImage( 'https://sharkhar.net/front/img/logo-w.png' );


			$blogCategories = BlogCategory::all();
			$blogs = Blog::whereDate('published_at','<',Carbon::now()->toDateTimeString())->orderBy('id', 'desc')->paginate(4);
			$blogsLatest    = Blog::orderBy( 'id', 'DESC' )->get()->take( 5 );
			$tags           = Tag::all()->take( 5 );

			return view( 'blog.index', compact( 'blogs', 'blogCategories', 'tags', 'blogsLatest' ) );
		} else {
			$blogs = Blog::latest()->paginate( 10 );

			return view( 'admin.blogs.index', compact( 'blogs' ) );
		}
	}

	public function create() {
		$blogCategories = BlogCategory::all();

		return view( 'admin.blogs.create', compact( 'blogCategories' ) );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store( Request $request ) {
		$request->validate( [
			'title'       => 'required|string',
			'slug'        => 'required|string|unique:blogs',
			'body'        => 'required|string',
			'meta'        => 'required|string',
			'keywords'    => 'required|string',
			'image'       => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
			'category_id' => 'required|numeric',
		] );
		if (isset($request->published_at)) {

			$published_at = $this->convertNumbers($request->published_at);
			$published_at = explode('/', $published_at);
			$published_at = Verta::getGregorian($published_at[0], $published_at[1], $published_at[2]);
			$published_at = $published_at[0] . "-" . $published_at[1] . "-" . $published_at[2];
			if (isset($request->publish_time)) {
				if (strlen($request->publish_time) == 5) {
					$published_at .= " " . $request->publish_time . ":00";
				} else {
					$published_at .= " " . $request->publish_time;
				}

			}
			$published_at = Carbon::createFromFormat('Y-m-d H:i:s', $published_at)->toDateTimeString();
		} else {

			$published_at = Carbon::now()->toDateTimeString();
		}
		$path  = '/uploads/files/blogs/';
		$image = null;
		if ( $request->hasFile( 'image' ) ) {
			$image = $request->file( 'image' );
			$image = $this->FileUploader( $image, $path );
		}


		$blog = Blog::create( [
			'title'       => $request->title,
			'slug'        => Str::slug( $request->slug ),
			'body'        => $request->body,
			'meta'        => $request->meta,
			'keywords'    => $request->keywords,
			'image'       => $image,
			'category_id' => $request->category_id,
			'published_at' => $published_at,
		] );

		$blog->attachTags( explode( ',', $request->tags ) );

		return redirect()->back()->with( 'success', 'بلاگ با موفقیت ثبت شد.' );
	}

	protected function FileUploader( $file, $path ) {
		$date        = Verta::instance()->formatDate();
		$fileName    = $file->getClientOriginalName();
		$fileNewName = time() . '-' . $date . '-' . $fileName;
		$file->move( public_path( $path ), $fileNewName );

		return $path . $fileNewName;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param \App\Models\Blog $blog
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show( $slug ) {
		$blog           = Blog::where( 'slug', $slug )->first();
		$blogCategories = BlogCategory::all();
		$blogsLatest    = Blog::orderBy( 'id', 'DESC' )->get()->take( 5 );
		$tags           = Tag::all()->take( 5 );


		SEOMeta::setTitle( $blog->title );
		SEOMeta::setDescription( $blog->meta );
		SEOMeta::addMeta( 'article:published_time', $blog->updated_at->toW3CString(), 'property' );
		SEOMeta::addMeta( 'article:section', $blog->category->title, 'property' );
		$keywords = explode( ',', $blog->keywords );
		SEOMeta::addKeyword( $keywords );

		OpenGraph::setDescription( $blog->meta );
		OpenGraph::setTitle( $blog->title );
		OpenGraph::setUrl( route( 'news.show', $blog->slug ) );
		OpenGraph::addProperty( 'type', 'article' );
		OpenGraph::addProperty( 'locale:alternate', [ 'pt-pt', 'fa-ir' ] );

		OpenGraph::addImage( asset( $blog->image ), [ 'height' => 300, 'width' => 300 ] );

		JsonLd::setTitle( $blog->title );
		JsonLd::setDescription( $blog->meta );
		JsonLd::setType( 'Article' );
		JsonLd::addImage( asset( $blog->image ) );


		return view( 'blog.single', compact( 'blog', 'blogCategories', 'tags', 'blogsLatest' ) );
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param \App\Models\Blog $blog
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit( Blog $blog ) {

		$blogCategories = BlogCategory::all();
		$tags           = $blog->tags()->get();
		$blogTags       = '';
		foreach ( $tags as $tag ) {
			$blogTags .= $tag['name'].", ";
		 }

		if(!empty($blog->published_at)){
			$time = explode(' ', $blog->published_at);
			$time = $time[1];
			$date = $this->convertToJalali($blog->published_at);
		}else{
			$time = '';
			$date = '';
		}
		return view( 'admin.blogs.edit', compact( 'blog', 'blogCategories', 'blogTags','time','date' ) );
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param \App\Models\Blog $blog
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update( Request $request, Blog $blog ) {
		$request->validate( [
			'title'       => 'required|string',
			'body'        => 'required|string',
			'meta'        => 'required|string',
			'keywords'    => 'required|string',
			'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
			'category_id' => 'required|numeric',
		] );

		if (isset($request->published_at)) {

			$published_at = $this->convertNumbers($request->published_at);
			$published_at = explode('/', $published_at);
			$published_at = Verta::getGregorian($published_at[0], $published_at[1], $published_at[2]);
			$published_at = $published_at[0] . "-" . $published_at[1] . "-" . $published_at[2];
			if (isset($request->publish_time)) {
				if (strlen($request->publish_time) == 5) {
					$published_at .= " " . $request->publish_time . ":00";
				} else {
					$published_at .= " " . $request->publish_time;
				}
			}
			$published_at = Carbon::createFromFormat('Y-m-d H:i:s', $published_at)->toDateTimeString();

		}

		$path = '/uploads/files/blogs/';
		if ( $request->hasFile( 'image' ) ) {
			$image = $request->file( 'image' );
			$image = $this->FileUploader( $image, $path );
			File::delete( public_path( $blog->image ) );

			$blog->update( [
				'title'       => $request->title,
				'body'        => $request->body,
				'meta'        => $request->meta,
				'keywords'    => $request->keywords,
				'image'       => $image,
				'category_id' => $request->category_id,
				'published_at' => $published_at,
			] );
		} else {
			$blog->update( [
				'title'       => $request->title,
				'body'        => $request->body,
				'meta'        => $request->meta,
				'keywords'    => $request->keywords,
				'category_id' => $request->category_id,
				'published_at' => $published_at,
			] );
		}
		$blog->syncTags( explode( ',', $request->tags ) );



		return redirect()->back()->with( 'success', 'با موفقیت بروزرسانی شد.' );
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param \App\Models\Blog $blog
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function destroy( Blog $blog ) {
		//
	}
	function convertNumbers($srting, $toPersian = false)
	{
		$en_num = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
		$fa_num = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
		if ($toPersian) return str_replace($en_num, $fa_num, $srting);
		else return str_replace($fa_num, $en_num, $srting);
	}

	public function convertToGoregian($start_date)
	{
		$start_day = explode(' ', $start_date);
		$start_day = $start_day[0];
		$start_day = explode('-', $start_day);
		$start_day = Verta::getJalali($start_day[0], $start_day[1], $start_day[2]);
		$start_day = $this->convertNumbers($start_day, true);
		return $start_day = $start_day[0] . '/' . $start_day[1] . '/' . $start_day[2];
	}

	public function convertToJalali($start_date)
	{
		$start_day = explode(' ', $start_date);
		$start_day = $start_day[0];
		$start_day = explode('-', $start_day);
		$start_day = Verta::getJalali($start_day[0], $start_day[1], $start_day[2]);
		$start_day = $this->convertNumbers($start_day, true);
		return $start_day = $start_day[0] . '/' . $start_day[1] . '/' . $start_day[2];
	}

}
