<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Customer;
use App\Warehouse;
use App\Item;
use Carbon\Carbon;

class WarehouseController extends Controller
{
    private $warehouse;
    private $item;

    public function __construct(Warehouse $warehouse, Item $item)
    {
        $this->warehouse = $warehouse;
        $this->item = $item;
    }


    public function index()
    {
        $warehouse = DB::table('warehouse')
            ->join('book', 'warehouse.id_item', '=', 'book.id')
            ->select('warehouse.*', 'book.book_name as book_name')
            ->get();
        $total_item = DB::raw('Count(warehouse.qty_item) as total');
        // $count_ware = DB::table('warehouse')->where('warehouse.created_at', '=', '2020-05-10')->get();
        // $count_ware = DB::table('warehouse')
        //                 ->select('warehouse.created_at', $total_item)
        //                 ->groupBy('warehouse.created_at')
        //                 ->get();
        $count_ware = DB::table('warehouse')
                        ->select('warehouse.created_at', $total_item)
                        ->groupBy('warehouse.created_at')
                        ->get();
        // dd($count_ware);
        return view('admin.warehouse.index', compact('warehouse'));
    }

    public function create()
    {
        $items = DB::table('book')->get();
        return view('admin.warehouse.add', compact('items'));
    }

    public function store(Request $request){
        $item = $request->item_id;
        $amount = $request->item_amount;
    	try {
            DB::beginTransaction();
            $admin = Session('customer') ? Session::get('customer')->customer['username'] : null;
            // dd($admin);
        // dd(Session);
	        foreach ($item as $key => $value) {
                $amount_ = DB::table('book')->where('id', '=', $item[$key])->first()->book_amount + $amount[$key];
                $this->item->where('id', '=', $item[$key])->update([
                    'book_amount' => $amount_
                ]);
                // DB::table('users')->where->where('id', '=', $item[$key])->update(['item_amounts' => $amount_]);
                $this->warehouse->create([
                    'username' => $admin,
                    'id_item' => $item[$key],
                    'qty_item' => $amount[$key],
                    "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh')->toDateString(),
                    "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
                ]);
	        }
            // die;
            DB::commit();
            return redirect()->route('warehouse.index');
        } catch (\Exception $exception) {
            dd($exception);
            DB::rollBack();
        }
    }

}
