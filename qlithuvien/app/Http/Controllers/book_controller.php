<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class book_controller extends Controller
{
    public function book_index() {
    	$book = DB::table('book')->get();

    	return view('book_index', compact('book'));
    }
    public function book_create() {
    	return view('book_create');
    }
    public function book_store(Request $request) {
    	// dd($request);
        DB::table('book')->insert([
            'book_name'             => $request->book_name,
            'book_image' 			=> '1',
            'book_category'         => $request->book_category,
            'book_view'             => '0',
            'book_writer' 			=> $request->book_writer,
            'book_status' 			=>'1',
            'book_detail' 			=> $request->book_detail,
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
        
        return redirect()->Route('book_index');
    }
    public function book_delete($id) {
        DB::table('book')->where('id', '=', $id)->delete();
        return redirect()->Route('book_index');
    }
    public function book_find() {
    	$book = DB::table('book')->get();
        return view('book_search', compact('book'));
    }
    public function book_finded(Request $request) {
    	// dd($request);
    	$value = $request->book_find;
        $book = DB::table('book')->where('book_name', 'like', '%'.$value.'%')->get();
        return view('book_search', compact('book'));
    }
}
