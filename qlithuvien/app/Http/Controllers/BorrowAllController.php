<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class BorrowAllController extends Controller
{
    public function index()
    {
    	$borrow = DB::table('user_book')
            ->join('items', 'items.id', '=', 'user_book.book_id')
            ->join('users', 'users.id', '=', 'user_book.user_id')
            ->join('user_detail', 'users.id', '=', 'user_detail.user_id')
            ->select('user_book.*', 'items.book_name as book_name', 'users.name as username', 'user_detail.phone as userphone')
            ->get();
        // dd($borrow);
        return view('admin.borrow_all.index', compact('borrow'));
    }

    public function getBorrow(Request $request)
    {	
    	// dd($request);
        $borrow = DB::table('user_book')
            ->join('items', 'items.id', '=', 'user_book.book_id')
            ->join('users', 'users.id', '=', 'user_book.user_id')
            ->join('user_detail', 'users.id', '=', 'user_detail.user_id')
            ->select('user_book.*', 'items.book_name as book_name', 'users.name as username', 'user_detail.phone as userphone')
        	->when(!empty($request->value[0]), function ($query) use ($request) {
                return $query->where('users.name', 'like', '%'.$request->value[0].'%');
            })
            ->when(!empty($request->value[1]), function ($query) use ($request) {
                return $query->where('user_detail.phone', 'like', '%'.$request->value[1].'%');
            })
            ->when(!empty($request->value[2]), function ($query) use ($request) {
                return $query->where('items.book_name', 'like', '%'.$request->value[2].'%');
            })
            ->when(!empty($request->value[3]), function ($query) use ($request) {
                return $query->where('user_book.created_at', 'like', '%'.$request->value[3].'%');
            })
            ->get();
        return $borrow;
    }
}
