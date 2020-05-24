<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User_class;

class UserClassController extends Controller
{
    private $user_class;

    public function __construct(User_class $user_class)
    {
        $this->user_class = $user_class;
    }

    public function index()
    {
        // $listUser = $this->user->all();
        $user_class = DB::table('user_class')->get();
        return view('admin.user_class.index', compact('user_class'));
    }

    public function create()
    {
        return view('admin.user_class.add');
    }

    public function store(Request $request)
    {
        // dd($request);
        try {
            DB::beginTransaction();
            // Insert data to user table
            $user_class = $this->user_class->create([
                'classification_name' => $request->classification_name,
                'can_borrow' => $request->classification_borrow
            ]);

            DB::commit();
            return redirect()->route('user_class.index');
        } catch (\Exception $exception) {
            DB::rollBack();
        }

    }

    /**
     * @param $id
     * show form edit
     */
    public function edit($id)
    {
        $user_class = $this->user_class->findOrfail($id);
        // dd($user_class);
        return view('admin.user_class.edit', compact('user_class'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            // update user tabale
            $this->user_class->where('id', $id)->update([
                'classification_name' => $request->classification_name,
                'can_borrow' => $request->classification_borrow
            ]);

            DB::commit();
            return redirect()->route('user_class.index');
        } catch (\Exception $exception) {
            dd($exception);
            DB::rollBack();
        }


    }


    public function delete($id)
    {
        try {
            DB::beginTransaction();
            // Delete user_class
            $user = $this->user_class->find($id);
            $user->delete($id);
            
            DB::commit();
            return redirect()->route('user_class.index');
        } catch (\Exception $exception) {
            dd($exception);
            DB::rollBack();
        }

    }
}
