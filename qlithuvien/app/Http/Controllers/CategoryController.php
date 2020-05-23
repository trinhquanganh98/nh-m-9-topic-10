<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use DB;
use App\Category;

class CategoryController extends Controller
{

    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }


    public function index()
    {
        $total_item = DB::raw('count(*) as total');

        // lấy tất cả danh mục
        $categories = DB::table('categories')->get();
        $count_item = [];
        // thống kê số lượng sản phẩm
        foreach ($categories as $key => $value) {
            $count_item[$value->id] = 0;
            $count_item[$value->id] = DB::table('items')
                                        ->where('items.category_id', '=', $value->id)
                                        ->select( $total_item)
                                        ->groupBy('items.category_id')
                                        ->get();
        }
        // dd($count_item);
        return view('admin.category.index', compact('count_item', 'categories'));
    }

    public function create()
    {
        $categories = $this->category->all();
        return view('admin.category.add', compact('categories'));
    }

    public function store(Request $request){
    	try {
            DB::beginTransaction();
            // Insert data to user table
            $categoryCreate = $this->category->create([
                'category_name' => $request->category_name
            ]);

            DB::commit();
            return redirect()->route('category.index');
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
        $category = $this->category->findOrfail($id);
        return view('admin.category.edit', compact('category'));
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
            $this->category->where('id', $id)->update([
                'category_name' => $request->category_name
            ]);

            DB::commit();
            return redirect()->route('category.index');
        } catch (\Exception $exception) {

            DB::rollBack();
        }


    }


    public function delete($id)
    {
        try {
            DB::beginTransaction();
            // Delete category
            $category = $this->category->find($id);
            $category->delete($id);
            DB::commit();
            return redirect()->route('category.index');
        } catch (\Exception $exception) {
            DB::rollBack();
        }

    }
}
