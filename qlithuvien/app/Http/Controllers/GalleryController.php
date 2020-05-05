<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use DB;
use App\Gallery;

class GalleryController extends Controller
{
    private $gallery;

    public function __construct(Gallery $gallery)
    {
        $this->gallery = $gallery;
    }


    public function index()
    {
        $gallery = DB::table('gallery')->get();
        return view('admin.gallery.index', compact('gallery'));
    }

    public function create()
    {
        $gallery = $this->gallery->all();
        return view('admin.gallery.add', compact('gallery'));
    }

    public function store(Request $request){
    	try {
            DB::beginTransaction();

	        $image = $request->image;
        // dd($image);
	        foreach ($image as $key => $value) {
	            $imageitem = time() . $value->getClientOriginalName();
	        	// dd($imageitem);
	            $value->move(public_path('images'), $imageitem);
	            DB::table('gallery')->insert([
	                'image_url'               => 'images/'.$imageitem,
	                'image_name'              =>  $value->getClientOriginalName(),
	                "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	                "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	            ]);
	        }

            DB::commit();
            return redirect()->route('gallery.index');
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
        $resource = $this->resource->findOrfail($id);
        return view('admin.resource.edit', compact('resource'));
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
            $this->resource->where('id', $id)->update([
                'resource_name' => $request->resource_name,
            ]);

            DB::commit();
            return redirect()->route('resource.index');
        } catch (\Exception $exception) {

            DB::rollBack();
        }


    }


    public function delete($id)
    {
        try {
            DB::beginTransaction();
            // Delete resource
            $resource = $this->resource->find($id);
            $resource->delete($id);
            DB::commit();
            return redirect()->route('resource.index');
        } catch (\Exception $exception) {
            DB::rollBack();
        }

    }
}
