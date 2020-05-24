<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function image()
    {
        $item = DB::table('image')->get();

        return view('image', compact('item'));
    }
    public function imagecreate(Request $request)
    {   
        $name = $request->image;
        for ($i=0; $i < count($name); $i++) { 
            $image = time() . $name[$i]->getClientOriginalName();
            $name[$i]->move(public_path('images'), $image);
            DB::table('image')->insert([
                'name'              => 'images/'.$image,
            ]);
        }
        
        return redirect()->Route('image');
    }
}
