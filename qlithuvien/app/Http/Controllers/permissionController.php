<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;

class permissionController extends Controller
{
    //

    public function index() {
	    // DB::table('permissions')->insert([
	    //     'name'              => 'user-list',
	    //     'display_name' 			=> 'Danh Sách Admin',
	    //     "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	    //     "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	    // ]);
	    DB::table('permissions')->insert([
	        'name'              => 'user-add',
	        'display_name' 			=> 'Thêm Admin',
	        "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	        "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	    ]);
	    DB::table('permissions')->insert([
	        'name'              => 'user-edit',
	        'display_name' 			=> 'Sửa Admin',
	        "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	        "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	    ]);
	    DB::table('permissions')->insert([
	        'name'              => 'user-delete',
	        'display_name' 			=> 'Xóa Admin',
	        "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	        "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	    ]);

	    DB::table('permissions')->insert([
	        'name'              => 'role-list',
	        'display_name' 			=> 'danh sách Quyền',
	        "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	        "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	    ]);
	    DB::table('permissions')->insert([
	        'name'              => 'role-add',
	        'display_name' 			=> 'Thêm Quyền',
	        "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	        "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	    ]);
	    DB::table('permissions')->insert([
	        'name'              => 'role-edit',
	        'display_name' 			=> 'Sửa Quyền',
	        "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	        "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	    ]);
	    DB::table('permissions')->insert([
	        'name'              => 'role-delete',
	        'display_name' 			=> 'Xóa Quyền',
	        "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	        "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	    ]);
        DB::table('users')->insert([
            'name'              => 'admin',
            'email'             => 'admin@admin.com',
            'password'          => Hash::make('12345678'),
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
        DB::table('layout_user')->insert([
            'logo'              => ' ',
            'timestart'              => ' ',
            'address'              => ' ',
            'fax'              => ' ',
            'phone'              => ' ',
            'email'              => ' ',
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
        DB::table('layout_home')->insert([
            'content_gallery'              => ' ',
            'banner1'              => ' ',
            'content_history'              => ' ',
            'banner2'              => ' ',
            'content_service'              => ' ',
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
	    DB::table('permissions')->insert([
	        'name'              => 'add-stone',
	        'display_name' 			=> 'Thêm bài viết',
	        "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	        "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	    ]);
	    DB::table('permissions')->insert([
	        'name'              => 'edit-stone',
	        'display_name' 			=> 'Sửa bài viết',
	        "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	        "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	    ]);
	    DB::table('permissions')->insert([
	        'name'              => 'delete-stone',
	        'display_name' 			=> 'Xóa bài viết',
	        "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	        "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	    ]);
	    DB::table('permissions')->insert([
	        'name'              => 'add-category',
	        'display_name' 			=> 'Thêm Danh Mục',
	        "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	        "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	    ]);
	    DB::table('permissions')->insert([
	        'name'              => 'edit-category',
	        'display_name' 			=> 'Sửa Danh Mục',
	        "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	        "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	    ]);
	    DB::table('permissions')->insert([
	        'name'              => 'delete-category',
	        'display_name' 			=> 'Xóa Danh Mục',
	        "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	        "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	    ]);
	    DB::table('permissions')->insert([
	        'name'              => 'edit-layout',
	        'display_name' 			=> 'Sửa Giao Diện',
	        "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	        "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	    ]);
	    DB::table('permissions')->insert([
	        'name'              => 'edit-image',
	        'display_name' 			=> 'Thao Tác Thư Viện Ảnh',
	        "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	        "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	    ]);
    }

    
}
