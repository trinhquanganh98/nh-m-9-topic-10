<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Session;
use App\Book;

class FrontController extends Controller
{
    public function index(){
        $categories =  DB::table('categories')->get();
        $new_item =  DB::table('items')->limit(6)->get();
        $most_view_item =  DB::table('items')->orderBy('book_view', 'desc')->limit(6)->get();
        // dd($most_view_item);
        return view('user.index', compact('categories', 'new_item', 'most_view_item', 'customer'));
    }
    public function category($id){
        $categories =  DB::table('categories')->get();
        $category_title  =  DB::table('categories')->where('id', '=', $id)->first()->category_name;
        // dd($category_title);
        $books        =  DB::table('items')
            ->join('categories', 'items.category_id', '=', 'categories.id')
            ->where('items.category_id', '=', $id)
            ->select('items.*', 'categories.category_name as category_name')->get();
        return view('user.category', compact('categories', 'books', 'category_title'));
    }
    public function allcategory(){
        $categories =  DB::table('categories')->get();
        $category_title  =  'Tất Cả';
        // dd($category_title);
        $books        =  DB::table('items')
            ->join('categories', 'items.book_category', '=', 'categories.id')
            ->select('items.*', 'categories.category_name as category_name')->get();
        return view('user.category', compact('categories', 'books', 'category_title'));
    }
    public function book($id){
        try {
            $categories =  DB::table('categories')->get();
            $book        =  DB::table('items')
                ->join('categories', 'items.category_id', '=', 'categories.id')
                ->where('items.id', $id)
                ->select('items.*', 'categories.category_name as category_name')->first();
            $view = $book->book_view;
            $book_related = DB::table('items')
                ->where('category_id', '=', $id)->inRandomOrder()->limit(5)
                ->get();
                // ->random(5);
            // dd($book_related);
            DB::beginTransaction();
	    	DB::table('items')->where('id', $id)->update([
	                'book_view' => (int)$view + 1,
	            ]);
	        DB::commit();
	        return view('user.book', compact('categories', 'book', 'book_related'));
    	} catch (\Exception $exception) {
    		dd($exception);
            DB::rollBack();
        }
    }
    public function book_finded() {
        // dd($request);
        $categories =  DB::table('categories')->get();
        $value = $request->book_find;
        $books = DB::table('items')->where('book_name', 'like', '%'.$value.'%')->get();
        $category_title  =  'Kết Quả Tìm Kiếm';
        return view('user.category', compact('categories', 'books', 'category_title'));
    }
    public function user_order() {
        dd(Session::get('book')->items['id']);

        // Kiểm tra đăng nhập
        if(Auth::check()){
            // id người dùng
            $user_id = Session('customer')->customer['id'];
            // thông tin người dùng
            $user = DB::table('users')->where('users.id', '=', $user_id)
                ->join('user_detail', 'users.id', '=', 'user_detail.user_id')
                ->select('users.*', 'user_detail.phone', 'user_detail.address')
                ->first();
            // thông sô sách đã mượn. có thể mượn
            $user_book = DB::table('users')->where('users.id', '=', $user_id)
                ->join('user_order', 'users.id', '=', 'user_order.user_id')
                ->join('user_class', 'user_order.user_classification', '=', 'user_class.id')
                ->select('users.*', 'user_order.user_borrow', 'user_class.classification_name', 'user_class.can_borrow')
                ->first();

            // số sách đã mượn
            $user_borrow = 0;
            // dd($user);
            $user_borrow = DB::table('users')->where('users.id', '=', $user_id)
                ->join('user_order', 'users.id', '=', 'user_order.user_id')
                ->select('user_borrow')
                ->first();

            // số sách có thể mượn
            $can_borrow = DB::table('users')->where('users.id', '=', $user_id)
                ->join('user_order', 'users.id', '=', 'user_order.user_id')
                ->join('user_class', 'user_order.user_classification', '=', 'user_class.id')
                ->select('can_borrow')
                ->first();

            // dd($user_borrow);
            // kiểm tra điều kiện mượn tối đa
            if ($user_borrow != null & $can_borrow != null) {
                if ( $can_borrow->can_borrow == $user_borrow->user_borrow ) {
                    Session::flash('error', 'Cảnh Báo : Bạn Đã Đến Giới Hạn Đặt Mượn Sách');
                    return view('user.user_book', compact('user', 'user_book'));
                }else{
                    return view('user.user_book', compact('user', 'user_book'));
                }
            }else{
                return redirect()->route('customer.you-are-admin');
            }
        }else{
            Session::flash('error', 'Bạn Cần Đăng Nhập Để Mượn Sách');
            return redirect()->route('customer.login', ['id' => 1]);
        }
    }

    public function user_bookorder(Request $request){
        // dd($request);
        $oldBook    =   Session('book') ? Session::get('book') : null;
        $book       =   new Book($oldBook);
        $book->add($request);
        $request->session()->put('book', $book);

        return redirect()->route('customer.order');
    }
    public function you_are_admin(){
        return view('user.you-are-admin');
    }
    public function login($id){
        return view('user.login', compact('id'));
    }
    
    public function register(){
        return view('user.register');
    }
}
