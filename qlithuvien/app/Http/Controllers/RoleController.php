<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use DB;

class RoleController extends Controller
{
    private $role;
    private $permission;
    public function __construct(Role $role, Permission $permission)
    {
        $this->role = $role;
        $this->permission = $permission;
    }

    // list all role
    public function index()
    {
        $listRole = $this->role->all();
        return view('admin.role.index', compact('listRole'));

    }

    /**
     * show form create role
     */

    public function create()
    {
        $permissions = $this->permission->all();
        return view('admin.role.add', compact('permissions'));

    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            // Insert data to role table
            $roleCreate = $this->role->create([
                'name' => static::to_slug($request->display_name),
                // 'name' => $request->name,
                'display_name' => $request->display_name
            ]);

            // Insert data to role_permission
            $roleCreate->permissions()->attach($request->permission);

            DB::commit();
            return redirect()->route('role.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            \Log::error('Loi:' . $exception->getMessage() . $exception->getLine());
        }
    }


    public function edit($id)
    {
        $permissions = $this->permission->all();
        $role = $this->role->findOrfail($id);
        $getAllPermissionOfRole = DB::table('role_permission')->where('role_id', $id)->pluck('permission_id');
        return view('admin.role.edit', compact('permissions', 'role', 'getAllPermissionOfRole'));
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            // update to role table
            $this->role->where('id', $id)->update([
                'name' => static::to_slug($request->display_name),
                // 'name' => $request->name,
                'display_name' => $request->display_name
            ]);

            // update to role_permission table
            DB::table('role_permission')->where('role_id', $id)->delete();
            $roleCreate = $this->role->find($id);
            $roleCreate->permissions()->attach($request->permission);
            DB::commit();
            return redirect()->route('role.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            \Log::error('Loi:' . $exception->getMessage() . $exception->getLine());
        }
    }

    public function delete($id)
    {
        try {
            DB::beginTransaction();
            // Delete role
            $role = $this->role->find($id);
            $role->delete($id);
            // Delete user of role_permission table
            $role->permissions()->detach();
            DB::commit();
            return redirect()->route('role.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            \Log::error('Loi:' . $exception->getMessage() . $exception->getLine());
        }

    }

    public function to_slug($string){

        $str = trim(mb_strtolower($string));
        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        $str = preg_replace('/([\s]+)/', '-', $str);

        return $str;
    }
}
