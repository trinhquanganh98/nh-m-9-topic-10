<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use DB;
use App\Item;
use App\Category;
use App\Gallery;

class ItemController extends Controller
{
    private $item;
    private $category;
    private $gallery;

    public function __construct(Item $item, Category $category, Gallery $gallery)
    {
        $this->item = $item;
        $this->category = $category;
        $this->gallery = $gallery;
    }


    public function index()
    {
        $items = DB::table('items')
            ->join('categories', 'items.category_id', '=', 'categories.id')
            ->select('items.*', 'categories.category_name as category_name')
            ->get();
        return view('admin.item.index', compact('items'));
    }

    public function create()
    {
        $items = $this->item->all();
        $categories = DB::table('categories')->get();
        $gallery = $this->gallery->all();
        return view('admin.item.add', compact('items', 'categories', 'gallery'));
    }

    public function store(Request $request){
    	// dd($request);
    	try {
            // dd($request->book_image->getClientOriginalName());    
            DB::beginTransaction();
            // Insert data to user table
            $itemCreate = $this->item->create([
                'book_name' => $request->book_name,
                'book_image' => $request->book_image,
                'category_id' => $request->category_index,
                'book_view' => '1',
                'book_writer' => $request->book_writer,
                'book_status' => '1',
                'book_detail' => $request->book_detail,
                'book_amount' => '0',
                'book_borrow' => '0',
            ]);

            DB::commit();
            return redirect()->route('item.index');
        } catch (\Exception $exception) {
            dd($exception);
            DB::rollBack();
        }
    }

    /**
     * @param $id
     * show form edit
     */
    public function edit($id)
    {
        $item = DB::table('items')
            ->join('categories', 'items.category_id', '=', 'categories.id')
            ->where('items.id', '=', $id)
            ->select('items.*', 'categories.category_name as category_name')
            ->first();
        $gallery = $this->gallery->all();
        $categories = $this->category->all();;
        return view('admin.item.edit', compact('item','categories', 'gallery'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */

    public function update(Request $request, $id)
    {
        try {
            // dd($request);
            DB::beginTransaction();
            // update user tabale
            $this->item->where('id', $id)->update([
                'book_name' => $request->book_name,
                'book_image' => $request->book_image,
                'book_writer' => $request->book_writer,
                'book_category' => $request->category_index,
                'book_detail' => $request->book_detail,
            ]);

            DB::commit();
            return redirect()->route('item.index');
        } catch (\Exception $exception) {

            DB::rollBack();
        }


    }


    public function delete($id)
    {
        try {
            DB::beginTransaction();
            // Delete category
            $item = $this->item->find($id);
            $item->delete($id);
            DB::commit();
            return redirect()->route('item.index');
        } catch (\Exception $exception) {
            DB::rollBack();
        }

    }
}
