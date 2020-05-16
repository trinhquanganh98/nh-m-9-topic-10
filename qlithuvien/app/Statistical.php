<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Session;
use App\Customer;
use App\Warehouse;
use App\Item;
use Carbon\Carbon;

class Statistical extends Model
{
     public function index()
    {
        $total_item = DB::raw('Count(warehouse.qty_item) as total');
        $count_ware = DB::table('warehouse')
                        ->select('warehouse.created_at', $total_item)
                        ->groupBy('warehouse.created_at')
                        ->get();
        return view('admin.statistical.index', compact('count_ware'));
    }
}
