<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Product;
use App\Models\Seller;
use App\Models\ShopCategory;
use Illuminate\Http\Request;
use Spatie\Tags\Tag;

class SitemapController extends Controller {
	public function index() {
		return response()->view( 'sitemap.index',)->header( 'Content-Type', 'text/xml' );
	}
	public function main() {
		return response()->view( 'sitemap.main',)->header( 'Content-Type', 'text/xml' );
	}
	public function blogs() {
		$blogs = Blog::latest()->get();

		return response()->view( 'sitemap.blogs', [
			'articles' => $blogs,
		] )->header( 'Content-Type', 'text/xml' );
	}

	public function tags() {
		$tags = Tag::latest()->get();

		return response()->view( 'sitemap.tags', [
			'tags' => $tags,
		] )->header( 'Content-Type', 'text/xml' );
	}

//	public function blogCategories() {
//		$blogCategories = ShopCategory::where('parent_id',0)->get();
//
//		return response()->view( 'sitemap.blog_categories', [
//			'categories' => $blogCategories,
//		] )->header( 'Content-Type', 'text/xml' );
//	}

	public function shopCategories() {
		$blogCategories = ShopCategory::where('parent_id',0)->get();

		return response()->view( 'sitemap.shop_categories', [
			'categories' => $blogCategories,
		] )->header( 'Content-Type', 'text/xml' );
	}

	public function vendors() {
		$vendors = Seller::latest()->get();

		return response()->view( 'sitemap.vendors', [
			'vendors' => $vendors,
		] )->header( 'Content-Type', 'text/xml' );
	}

	public function products1() {
		$products = Product::where('id','<=',10000)->get();

		return response()->view( 'sitemap.products', [
			'products' => $products,
		] )->header( 'Content-Type', 'text/xml' );
	}
	public function products2() {
		$products = Product::where([['id','<=',20000],['id','>',10000]])->get();

		return response()->view( 'sitemap.products', [
			'products' => $products,
		] )->header( 'Content-Type', 'text/xml' );
	}
	public function products3() {
		$products = Product::where([['id','<=',30000],['id','>',20000]])->get();

		return response()->view( 'sitemap.products', [
			'products' => $products,
		] )->header( 'Content-Type', 'text/xml' );
	}
	public function products4() {
		$products = Product::where([['id','<=',40000],['id','>',30000]])->get();

		return response()->view( 'sitemap.products', [
			'products' => $products,
		] )->header( 'Content-Type', 'text/xml' );
	}
	public function products5() {
		$products = Product::where([['id','<=',50000],['id','>',40000]])->get();

		return response()->view( 'sitemap.products', [
			'products' => $products,
		] )->header( 'Content-Type', 'text/xml' );
	}
	public function products6() {
		$products = Product::where([['id','<=',60000],['id','>',50000]])->get();

		return response()->view( 'sitemap.products', [
			'products' => $products,
		] )->header( 'Content-Type', 'text/xml' );
	}
	public function products7() {
		$products = Product::where([['id','<=',70000],['id','>',60000]])->get();

		return response()->view( 'sitemap.products', [
			'products' => $products,
		] )->header( 'Content-Type', 'text/xml' );
	}
	public function products8() {
		$products = Product::where([['id','<=',80000],['id','>',70000]])->get();

		return response()->view( 'sitemap.products', [
			'products' => $products,
		] )->header( 'Content-Type', 'text/xml' );
	}
//	public function products9() {
//		$products = Product::where([['id','<=',90000],['id','>',80000]])->get();
//
//		return response()->view( 'sitemap.products', [
//			'products' => $products,
//		] )->header( 'Content-Type', 'text/xml' );
//	}
//	public function products10() {
//		$products = Product::where([['id','<=',100000],['id','>',90000]])->get();
//
//		return response()->view( 'sitemap.products', [
//			'products' => $products,
//		] )->header( 'Content-Type', 'text/xml' );
//	}
}
