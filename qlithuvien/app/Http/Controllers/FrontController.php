<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Session;

class FrontController extends Controller
{
    public function index(){
        $categories =  DB::table('categories')->get();
        $new_item =  DB::table('book')->limit(6)->get();
        $most_view_item =  DB::table('book')->orderBy('book_view', 'desc')->limit(6)->get();
        // dd($most_view_item);
        return view('user.index', compact('categories', 'new_item', 'most_view_item', 'customer'));
    }
    public function category($id){
        $categories =  DB::table('categories')->get();
        $category_title  =  DB::table('categories')->where('id', '=', $id)->first()->category_name;
        // dd($category_title);
        $books        =  DB::table('book')
            ->join('categories', 'book.book_category', '=', 'categories.id')
            ->where('book.book_category', '=', $id)
            ->select('book.*', 'categories.category_name as category_name')->get();
        return view('user.category', compact('categories', 'books', 'category_title'));
    }
    public function allcategory(){
        $categories =  DB::table('categories')->get();
        $category_title  =  'Tất Cả';
        // dd($category_title);
        $books        =  DB::table('book')
            ->join('categories', 'book.book_category', '=', 'categories.id')
            ->select('book.*', 'categories.category_name as category_name')->get();
        return view('user.category', compact('categories', 'books', 'category_title'));
    }
    public function book($id){
        try {
            $categories =  DB::table('categories')->get();
            $book        =  DB::table('book')
                ->join('categories', 'book.book_category', '=', 'categories.id')
                ->where('book.id', $id)
                ->select('book.*', 'categories.category_name as category_name')->first();
            $view = $book->book_view;
            $book_related = DB::table('book')
                ->where('book_category', '=', $id)->inRandomOrder()->limit(5)
                ->get();
                // ->random(5);
            // dd($book_related);
            DB::beginTransaction();
	    	DB::table('book')->where('id', $id)->update([
	                'book_view' => (int)$view + 1,
	            ]);
	        DB::commit();
	        return view('user.book', compact('categories', 'book', 'book_related'));
    	} catch (\Exception $exception) {
    		dd($exception);
            DB::rollBack();
        }
    }
    public function book_finded(Request $request) {
        // dd($request);
        $categories =  DB::table('categories')->get();
        $value = $request->book_find;
        $books = DB::table('book')->where('book_name', 'like', '%'.$value.'%')->get();
        $category_title  =  'Kết Quả Tìm Kiếm';
        return view('user.category', compact('categories', 'books', 'category_title'));
    }
    public function login(){
        return view('user.login');
    }
    
    public function register(){
        return view('user.register');
    }
}
