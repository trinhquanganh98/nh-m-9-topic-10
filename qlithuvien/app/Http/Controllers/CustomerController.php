<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Hash;
use DB;
use Session;
use App\Role;
use App\User;
use App\Customer;

class CustomerController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function store(Request $request)
    {
        // dd($request);
        try {
            DB::beginTransaction();

            $id = DB::table('users')->insertGetId([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            DB::table('user_detail')->insert([
                'user_id' => $id,
                'phone' => $request->phone,
                'address' => $request->address,
            ]);
            DB::table('user_order')->insert([
                'user_id' => $id,
                'user_borrow' => '0',
            ]);

            DB::commit();
            Session::flash('success', 'Đăng Kí Thành Công');
            return redirect()->route('customer.login', ['id' => 0]);
        } catch (\Exception $exception) {
            dd($exception);
			Session::flash('error', 'Email đã tồn tại');
            return redirect()->route('customer.register');
        }
    }

    // Screen :
    // 
    public function postLogin(Request $request) {
        // dd($request);
	       // Kiểm tra dữ liệu nhập vào
    	$rules = [
    		'email' =>'required|email',
    		'password' => 'required|min:8'
    	];
    	$messages = [
    		'email.required' => 'Email là trường bắt buộc',
    		'email.email' => 'Email không đúng định dạng',
    		'password.required' => 'Mật khẩu là trường bắt buộc',
    		'password.min' => 'Mật khẩu phải chứa ít nhất 8 ký tự',
    	];
    	$validator = Validator::make($request->all(), $rules, $messages);
	
	
		if ($validator->fails()) {
			// Điều kiện dữ liệu không hợp lệ sẽ chuyển về trang đăng nhập và thông báo lỗi
			return redirect()->route('customer.login', ['id' => $request->screen])->withErrors($validator)->withInput();
		} else {
			// Nếu dữ liệu hợp lệ sẽ kiểm tra trong csdl
			$email = $request->input('email');
			$password = $request->input('password');
	 
			if( Auth::attempt(['email' => $email, 'password' =>$password])) {
				// Kiểm tra đúng email và mật khẩu sẽ chuyển trang
                // dd(Auth::User());
                $customer_session = DB::table('users')->where('email', '=', $email)->first();
                $customer       =   new Customer($customer_session);
                $customer->Create($customer_session);
                $request->session()->put('customer', $customer);
                // dd(Session('customer')->customer['id']);
                if ($request->screen == 1) {
                // dd('1 '.Session('customer')->customer['id']);
                    return redirect()->route('customer.order');
                }else{
                // dd('0 '.Session('customer')->customer['id']);
                    return redirect()->route('customer.index');
                }
			} else {
				// Kiểm tra không đúng sẽ hiển thị thông báo lỗi
				Session::flash('error', 'Email hoặc mật khẩu không đúng!');
	            return redirect()->route('customer.login', ['id' => $request->screen]);
			}
		}
	}

    /**
     * @param $id
     * show form edit
     */
    public function edit() {
        // nếu đã tồn tại giỏ hàng, lấy số lượng trong giỏ hàng, hoặc trả về 0
        $amount_item = Session('cart') ? Session::get('cart')->totalQty : 0;

        // lấy giữ liệu trong category
        $categories =  DB::table('categories')->get();

        $user_ = Session::has('customer') ? Session::get('customer')->customer : null;
        $user =  DB::table('users')
            ->where('users.id', '=', $user_['id'])
            ->join('user_detail', 'users.id', '=', 'user_detail.user_id')
            ->select('users.*', 'user_detail.phone', 'user_detail.address')
            ->first();                  
        // $items = $this->item->first();
        // dd($user);

        return view('user.user_update', compact('user', 'categories', 'amount_item'));
    }

    public function update(Request $request) {
        // dd($request);
        try {
            DB::beginTransaction();
            // // update user tabale
            DB::table('users')->where('id', '=', $request->id)->update([
                'name' => $request->name,
            ]);
            DB::table('user_detail')->where('user_id', '=', $request->id)->update([
                'phone' => $request->phone,
                'address' => $request->address,
            ]);

            DB::commit();
            Session::flash('success', 'Cập Nhật Thành Công');
            return redirect()->route('customer.order');
        } catch (\Exception $exception) {
            dd($exception);
            DB::rollBack();
        }
    }

    /**
     * @param $id
     * show form edit
     */
    public function changePassword() {
        // nếu đã tồn tại giỏ hàng, lấy số lượng trong giỏ hàng, hoặc trả về 0
        $amount_item = Session('cart') ? Session::get('cart')->totalQty : 0;

        // lấy giữ liệu trong category
        $categories =  DB::table('categories')->get();

        $user_ = Session::has('customer') ? Session::get('customer')->customer : null;
        $user =  DB::table('users')
            ->where('users.id', '=', $user_['id'])
            ->first();                  
        // $items = $this->item->first();
        // dd($user);

        return view('user.user_password_update', compact('user', 'categories', 'amount_item'));
    }

    public function admin_credential_rules(array $data) {
        $messages = [
            'current-password.required' => 'Please enter current password',
            'password.required' => 'Please enter password',
        ];

        $validator = Validator::make($data, [
            'current-password' => 'required',
            'password' => 'required|same:password',
            'password_confirmation' => 'required|same:password',     
        ], $messages);

        return $validator;
    }  
    public function updatePassword(Request $request) {
        if(Auth::Check()) {
            $request_data = $request->All();
            $validator = $this->admin_credential_rules($request_data);
            if($validator->fails()) {
                Session::flash('error', 'Mật Khẩu Nhập Lại Không Chính Xác');
                return redirect()->route('customer.changePassword');    
                // return response()->json(array('error' => $validator->getMessageBag()->toArray()), 400);
            } else {  
                $current_password = Auth::User()->password;           
                if(Hash::check($request_data['current-password'], $current_password)) {           
                    $user_id = Auth::User()->id;                       
                    $obj_user = User::find($user_id);
                    $obj_user->password = Hash::make($request_data['password']);
                    $obj_user->save(); 
                    Session::flash('success', 'Đổi Mật Khẩu Thành Công!');
                    return redirect()->route('customer.edit');
                } else {           
                    Session::flash('error', 'Mật khẩu Cũ không đúng!');
                    return redirect()->route('customer.changePassword');
                }
            }        
        } else {
            return redirect()->to('/');
        }    
    }

    public function adminpostLogin(Request $request) {
        
    // Kiểm tra dữ liệu nhập vào
        $rules = [
            'email' =>'required|email',
            'password' => 'required|min:8'
        ];
        $messages = [
            'email.required' => 'Email là trường bắt buộc',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Mật khẩu là trường bắt buộc',
            'password.min' => 'Mật khẩu phải chứa ít nhất 8 ký tự',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
    
    
        if ($validator->fails()) {
            // Điều kiện dữ liệu không hợp lệ sẽ chuyển về trang đăng nhập và thông báo lỗi
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            // Nếu dữ liệu hợp lệ sẽ kiểm tra trong csdl
            $email = $request->input('email');
            $password = $request->input('password');
     
            if( Auth::attempt(['email' => $email, 'password' =>$password])) {
                // Kiểm tra đúng email và mật khẩu sẽ chuyển trang

                $customer_session = DB::table('users')->where('email', '=', $email)->first();
                $customer       =   new Customer($customer_session);
                $customer->Create($customer_session);
                $request->session()->put('customer', $customer);

                return redirect()->route('statistical.index');
            } else {
                // Kiểm tra không đúng sẽ hiển thị thông báo lỗi
                Session::flash('error', 'Email hoặc mật khẩu không đúng!');
                return redirect()->back();
            }
        }
    }
    
    public function admingetLogin() {
        if(Auth::check()){
            return redirect()->route('item.index');
        }else{
            return view('auth.login');
        }     
    }
    public function postLogout(Request $request) {
        Auth::logout();
        Session::flush();
        return redirect()->route('customer.index');
    }

    public function postOrder(Request $request) {
    	if(Auth::check()){
    		dd('da dang nhap');
    	}else{
			Session::flash('error', 'Bạn Cần Đăng Nhập Để Đặt Hàng');
	        return redirect()->route('customer.login');
    	}
    }

    
}
