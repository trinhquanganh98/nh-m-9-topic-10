<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class BorrowBackController extends Controller
{
	public function index()
    {
    	$borrow = DB::table('user_book')
    		->where('user_book.status', '=', 2)
            ->join('items', 'items.id', '=', 'user_book.book_id')
            ->join('users', 'users.id', '=', 'user_book.user_id')
            ->join('user_detail', 'users.id', '=', 'user_detail.user_id')
            ->select('user_book.*', 'items.book_name as book_name', 'users.name as username', 'user_detail.phone as userphone')
            ->get();
        // dd($borrow);
        return view('admin.borrow_back.index', compact('borrow'));
    }

    /**
     * @param $id
     * show form edit
     */
    public function edit($id)
    {
        $borrow = DB::table('user_book')
            ->where('user_book.id', '=', $id)
            ->join('items', 'items.id', '=', 'user_book.book_id')
            ->join('users', 'users.id', '=', 'user_book.user_id')
            ->join('user_detail', 'users.id', '=', 'user_detail.user_id')
            ->select('user_book.*', 'items.book_name as book_name', 'users.name as username', 'user_detail.phone as userphone')
            ->first();
        // dd($borrow);
        return view('admin.borrow_back.edit', compact('borrow'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */

    public function update(Request $request, $id)
    {
        // dd($request);
        try {
            DB::beginTransaction();
            // update user_book
            DB::table('user_book')->where('id', $id)->update([
                'status' => $request->status_borrow,
                'date_start' => \Carbon\Carbon::now('Asia/Ho_Chi_Minh')->toDateString(),
            ]);
            $book_borrowed = DB::table('items')->where('id', $request->book_id)->first()->book_borrow;
            // kiểm tra trạng thái sách có phải đã trả hay không
            if ($request->status_borrow == 0) {
                // số sách đã mượn
                $user_borrow = DB::table('user_order')
                    ->where('user_order.user_id', '=', $request->user_id)
                    ->first()->user_borrow;
                DB::table('user_order')->where('user_order.user_id', '=', $request->user_id)->update([
                    'user_borrow' => ($user_borrow - 1),
                ]);
                // update items
                DB::table('items')->where('id', $request->book_id)->update([
                    'book_borrow' => ($book_borrowed - 1),
                ]);
            }

            DB::commit();
            return redirect()->route('borrow_back.index');
        } catch (\Exception $exception) {
                dd($exception);
            DB::rollBack();
        }


    }


    public function getBorrow(Request $request)
    {	
    	// dd($request);
        $borrow = DB::table('user_book')
    		->where('user_book.status', '=', 2)
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
