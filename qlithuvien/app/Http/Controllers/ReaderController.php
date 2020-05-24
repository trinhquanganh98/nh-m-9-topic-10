<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use DB;

class ReaderController extends Controller
{
    public function index() {
        // $user = DB::table('users')
        //     ->whereNotExists( function($query){
        //     	$query->select(DB::raw('role_user.user_id'))
        //     	->from('role_user')
        //     	->whereRow('role_user.user_id = users.id');
        //     })
        //     ->get();
        // $get_user_no_class = 'select * from users join user_order on user_order.user_id = users.id where not exists (select role_user.user_id from role_user where role_user.user_id = users.id) ';
        
  //   	select * from users 
		// where( 
		// 	not exists (select role_user.user_id from role_user where role_user.user_id = users.id) 
		// 	and 
		// 	not exists (select user_order.user_id from user_order where user_order.user_id = users.id)
		// )

        // lấy đối tượng ở bảng A mà không tồn tại trong bảng B
        $get_user_no_class = 'select * from users where( not exists (select role_user.user_id from role_user where role_user.user_id = users.id) and not exists (select user_order.user_id from user_order where user_order.user_id = users.id))';
        $get_user_class = 'select * from users where not exists (select role_user.user_id from role_user where role_user.user_id = users.id) ';
        // dd($user);

        $user_all = DB::table('users')
            ->join('user_order', 'users.id', '=', 'user_order.user_id')
            ->get();

        $user_new = DB::table('users')
            ->join('user_order', 'users.id', '=', 'user_order.user_id')
            ->where('user_order.user_classification', '=', null)
            ->get();
        $user = DB::table('users')
            ->join('user_order', 'users.id', '=', 'user_order.user_id')
            ->join('user_class', 'user_order.user_classification', '=', 'user_class.id')
            ->get();

        $reader = DB::select($get_user_class);
        $no_class = DB::select($get_user_no_class);
        // dd($user_new);
        return view('admin.reader.index', compact('user_all', 'user_new', 'user'));
    }


    public function edit($id)
    {
        $reader = DB::table('user_class')->get();
        $user = DB::table('users')
            ->join('user_order', 'users.id', '=', 'user_order.user_id')
            ->where('users.id', '=', $id)
            ->first();
        // dd($reader);
        return view('admin.reader.edit', compact('reader', 'user'));
    }

    public function update(Request $request, $id)
    {
        // dd($request);
        try {
            DB::beginTransaction();
            // update to role table
            DB::table('user_order')->where('user_id', $id)->update([
                'user_classification' =>  $request->reader,
            ]);
            
            DB::commit();
            return redirect()->route('reader.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            \Log::error('Loi:' . $exception->getMessage() . $exception->getLine());
        }
    }
}
