<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
use App\User;
use App\Category;
use App\Product;
use App\Supplier;
use App\Purchase;
use App\Cart;
use App\Sale;
use App\Setting;
use App\Bar;
use App\Report;
use App\Package;
use App\Process;

use DB;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Session;

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

    public function log(Request $request)
    {
      $id = Auth::user()->id;
      $bar = Bar::where('deleted_at', NULL)->where('current_manager', $id)->first();

      if (isset($bar)) {
        Session::forget('cart');

        $report = Report::where('deleted_at', NULL)->where('bar', $bar->id)->orderBy('id', 'desc')->first();
        $start_time = $report->created_at;

        $amount = Sale::where('deleted_at', NULL)->where('created_at', '>=', $start_time)->sum('totalPrice');
        $product = Sale::where('deleted_at', NULL)->where('created_at', '>=', $start_time)->count();
        $report->product = $product;
        $report->amount = $amount;
        $report->updated_at = Carbon::now();
        $report->update();

        $bar->current_manager = NULL;
        $bar->update();
      }
      
      $this->middleware('guest')->except('logout');
      Auth::logout();
      return view('auth.login');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $status = request('status'); 
      $error = request('error');
      $id = Auth::user()->id;
      $role = Auth::user()->role;

      if ($role=="Customer") {
        $status = request('status'); 
        $error = request('error');
        return redirect()->route('userdashboard', array('error' => $error));
      }
      else
      {
        $bar = Bar::where('deleted_at', NULL)->where('current_manager', $id)->first();
        if (isset($bar)) {
          $report = Report::where('deleted_at', NULL)->where('amount', '!=', NULL)->where('bar', $bar->id)->orderBy('id', 'desc')->first();
          $bar_id = $bar->bar_id;
          $barid = $bar->id;
          $barproductscount = Package::where('deleted_at', NULL)->where('bar', $bar_id)->count();

          $today = request('today'); 
          $week = request('week'); 
          $month = request('month'); 
          $year = request('year'); 
          
          $todaynow = Carbon::Today();
          if (isset($today)) {
            $orders = Sale::select(DB::raw('*'))
                      ->whereRaw('Date(created_at) = CURDATE()')->where('bar', $barid)->count(); 
          }
          elseif (isset($week)) {
            Carbon::setWeekStartsAt(Carbon::SUNDAY);
            $orders = Sale::whereBetween('orders.created_at', [Carbon::now()->startOfWeek(),Carbon::now()->endOfWeek()])->where('bar', $barid)
            ->count();
          }
          elseif (isset($month)) {
            $currentMonth = date('m');
            $orders = Sale::where('deleted_at', NULL)->whereRaw('MONTH(created_at) = ?',[$currentMonth])->where('bar', $barid)->count();
          }
          elseif (isset($year)) {
            $currentYear = '20'.date('y');
            $orders = Sale::where('deleted_at', NULL)->whereRaw('YEAR(created_at) = ?',[$currentYear])->where('bar', $barid)->count();
          }
          else
          {
            $orders = Sale::where('deleted_at', NULL)->where('bar', $barid)->count();  
          }
          return view('page.index', compact('status', 'error', 'report', 'barproductscount', 'orders'));
        }
        else
        {
          return view('page.index', compact('status', 'error'));
        }
      }
    }

    //Category
    public function category()
    {
        $status = request('status'); 
        $error = request('error');
        return view('page.category', compact('status', 'error'));
    }

    public function deletecategory($id)
    {
        Category::destroy($id);
        return back();
    }

    public function storecategory(Request $request)
    {

        $category = Category::where('deleted_at', NULL)->where('name', $request->name)->first();
        if (isset($category)) {
            $error = "Category Already Exist";
            return redirect()->route('category', array('error' => $error));
        }
        else
        {
            Category::create($request->all());
            $status = "Category Added Sucessfully";
            return redirect()->route('category', array('status' => $status));
        }
    }

    //Product
    public function product()
    {
        $status = request('status'); 
        $error = request('error');
        $products = Product::where('deleted_at', NULL)->get();

        $lastproduct = Product::where('deleted_at', NULL)->orderBy('id', 'desc')->first();
        if (isset($lastproduct)) 
        {
            $lastid = $lastproduct->id + 1;
        }
        else
        {
            $lastid = "1";
        }
        $random_number = 'stock-'.rand(0,1000000).'000'.$lastid;
        
        return view('page.product', compact('products', 'status', 'error', 'random_number'));
    }

    public function deleteproduct($id)
    {
        Product::destroy($id);
        return back();
    }

    public function storeproduct(Request $request)
    {
      //Product::create($request->all());
      $product = new Product();
      $product->stock_id = $request->stock_id;  
      $product->stock_name = $request->stock_name;
      $product->category = $request->category;
      $product->selling_price = $request->selling_price;

      $imageExtensions = ['jpg', 'jpeg', 'gif', 'png', 'bmp', 'svg', 'svgz', 'cgm', 'djv', 'djvu', 'ico', 'ief','jpe', 'pbm', 'pgm', 'ppm', 'ras', 'rgb', 'tif', 'tiff', 'wbmp', 'xbm', 'xpm', 'xwd'];

      if ($request->file('image')) 
      {
        $file1 = $request->file('image');
        $path1 = Storage::disk('public')->putFile('image', $file1);
        $explodeImage = explode('.', $path1);
        $extension = end($explodeImage);

        if(in_array($extension, $imageExtensions))
        {
            $product->image = $path1;
        }
        else
        {
            $error = "Image should be an image file";
            return redirect()->route('product', array('error' => $error));
        }
      }
      $product->save();
      $status = "Product Added Sucessfully";
      return redirect()->route('product', array('status' => $status));
    }

    public function updateproduct(Request $request)
    {
        $stock_id = $request->stock_id;
        $product = Product::where('deleted_at', NULL)->where('stock_id', $stock_id)->first();
        $product->stock_id = $request->stock_id;  
        $product->stock_name = $request->stock_name;
        $product->category = $request->category;
        $product->selling_price = $request->selling_price;

        $imageExtensions = ['jpg', 'jpeg', 'gif', 'png', 'bmp', 'svg', 'svgz', 'cgm', 'djv', 'djvu', 'ico', 'ief','jpe', 'pbm', 'pgm', 'ppm', 'ras', 'rgb', 'tif', 'tiff', 'wbmp', 'xbm', 'xpm', 'xwd'];

        if ($request->file('image')) 
        {
          $file1 = $request->file('image');
          $path1 = Storage::disk('public')->putFile('image', $file1);
          $explodeImage = explode('.', $path1);
          $extension = end($explodeImage);

          if(in_array($extension, $imageExtensions))
          {
              $product->image = $path1;
          }
          else
          {
              $error = "Image should be an image file";
              return redirect()->route('product', array('error' => $error));
          }
        }
        $product->save();

        //$stock->update($request->all());
        $status = "Product Updated Successfully";
        return redirect()->route('product', array('status' => $status));
    }


    //bar
    public function bar()
    {
        $status = request('status'); 
        $error = request('error');
        $bars = bar::where('deleted_at', NULL)->get();

        $lastbar = Bar::where('deleted_at', NULL)->orderBy('id', 'desc')->first();
        if (isset($lastbar)) 
        {
            $lastid = $lastbar->id + 1;
        }
        else
        {
            $lastid = "1";
        }
        $random_number = 'GAR-'.rand(0,1000000).'0'.$lastid;
        
        return view('page.bar', compact('bars', 'status', 'error', 'random_number'));
    }

    public function deletebar($id)
    {
        Bar::destroy($id);
        return back();
    }

    public function storebar(Request $request)
    {
        Bar::create($request->all());
        $status = "Outlet Added Sucessfully";
        return redirect()->route('bar', array('status' => $status));
    }

    public function updatebar(Request $request)
    {
        $bar_id = $request->bar_id;
        $bar = Bar::where('deleted_at', NULL)->where('bar_id', $bar_id)->first();
        $bar->update($request->all());
        $status = "Outlet Updated Successfully";
        return redirect()->route('bar', array('status' => $status));
    }

    //Supplier
    public function supplier()
    {
        $status = request('status'); 
        $error = request('error');
        return view('page.supplier', compact('status', 'error'));
    }

    public function deletesupplier($id)
    {
        Supplier::destroy($id);
        return back();
    }

    public function storesupplier(Request $request)
    {
        Supplier::create($request->all());
        $status = "Supplier Added Sucessfully";
        return redirect()->route('supplier', array('status' => $status));
    }

    public function updatesupplier(Request $request)
    {
        $id = $request->id;
        $supplier = Supplier::where('deleted_at', NULL)->where('id', $id)->first();
        $supplier->update($request->all());
        $status = "Supplier Updated Successfully";
        return redirect()->route('supplier', array('status' => $status));
    }

    //Purchase
    public function purchase()
    {
        $status = request('status'); 
        $error = request('error');
        $debt = request('debt');
        $purchases = Purchase::where('deleted_at', NULL)->get();

        $lastpurchase = Purchase::where('deleted_at', NULL)->orderBy('id', 'desc')->first();
        if (isset($lastpurchase)) 
        {
            $lastid = $lastpurchase->id + 1;
        }
        else
        {
            $lastid = "1";
        }
        $random_number = 'purchase-'.rand(0,1000000).'000'.$lastid;
        return view('page.purchase', compact('purchases', 'status', 'error', 'random_number', 'debt'));
        
    }

    public function deletepurchase($id)
    {
        Purchase::destroy($id);
        return back();
    }

    public function storepurchase(Request $request)
    {
        $product = Product::findOrFail($request->product);
        $product->quantity = $product->quantity + $request->quantity;
        $product->update();

        Purchase::create($request->all());
        $status = "Purchase Added Sucessfully";
        return redirect()->route('purchase', array('status' => $status));
    }

    public function updatepurchase(Request $request)
    {
        $purchase_id = $request->purchase_id;
        $purchase = Purchase::where('deleted_at', NULL)->where('purchase_id', $purchase_id)->first();
        $purchase_quantity = $purchase->quantity;
        $product = Product::findOrFail($request->product);
        $product->quantity = $product->quantity - $purchase_quantity;
        $product->quantity = $product->quantity + $request->quantity;
        $product->update();

        $purchase->update($request->all());
        $status = "Purchase Updated Successfully";
        return redirect()->route('purchase', array('status' => $status));
    }


    public function storepackage(Request $request)
    {
        $product = $request->product;
        $bar = $request->bar;
     
        $process = Package::where('deleted_at', NULL)->where('bar', $bar)->where('product', $product)->first();

        if (isset($process)) {
          $process->available = $process->available + $request->available;
          $process->update();
        }
        else{

          Package::create($request->all());
        }
        Process::create($request->all());
        $status = "Product Pushed Successfully";
        return redirect()->route('product', array('status' => $status));
    }

    //Cart
    

    public function shoppingcart()
    {
        if (!Session::has('cart')) {
            return view('page.cart');
        }
         
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('page.cart', ['products' => $cart->items, 'totalPrice' =>$cart->totalPrice]);
    }


    public function checkout1(Request $request)
    {
      function random_num($size) {
        $alpha_key = '';
        $keys = range('A', 'Z');

        for ($i = 0; $i < 2; $i++) {
          $alpha_key .= $keys[array_rand($keys)];
        }

        $length = $size - 2;

        $key = '';
        $keys = range(0, 9);

        for ($i = 0; $i < $length; $i++) {
          $key .= $keys[array_rand($keys)];
        }
        return $alpha_key . $key;
      }
      $payment_id = 'GAP-'.random_num(8);

      if (!Session::has('cart')) {
        return redirect()->route('menu');
      }

      $oldCart = Session::get('cart');
      $cart = new Cart($oldCart);

      $sale = new Sale();
      $sale->cart = serialize($cart);  
      $sale->totalPrice = $cart->totalPrice;   
      $sale->buyer = Auth::user()->id;
      $sale->sale_id = $payment_id;
      $sale->delivery_address = $request->delivery_address;
      $sale->save();

      Session::forget('cart');
      Session::forget('product_id');
      if ( Auth::user()->role=="Attendant") {
        return redirect()->route('store');
      }
      else
      {
        return redirect()->route('checkout2', array('payment_id' => $payment_id));
      }
    }

    public function checkout2()
    {
      $payment_id = request('payment_id'); 
     
      $findsale = Sale::where('deleted_at', NULL)->where('sale_id', $payment_id)->first();
      $findsale->delivery_status = "Pending";
      $findsale->payment_status = "Paid";
      $findsale->update();

      $orders = Sale::where('sale_id', $payment_id)->first();
      $totalPrice = $orders->totalPrice;
      $order = unserialize($orders->cart);
      $orderss =  $order->items;
      $delivery_address = $orders->delivery_address;
      $delivery_status = $orders->delivery_status;
      $buyer = $orders->buyer;
      $sale_id = $orders->sale_id;
      $payment_status = $orders->payment_status;
      $iuser = User::findOrFail($buyer);
      //return $orderss;
      return view('live.vieworders', compact('orderss', 'totalPrice', 'orders', 'delivery_address', 'iuser', 'payment_status', 'sale_id', 'delivery_status'));
      //return view('admin.vieworders', ['orderss' => $orderss]);

    }
    public function checkout(Request $request)
    {
      function random_num($size) {
          $alpha_key = '';
          $keys = range('A', 'Z');

          for ($i = 0; $i < 2; $i++) {
            $alpha_key .= $keys[array_rand($keys)];
          }

          $length = $size - 2;

          $key = '';
          $keys = range(0, 9);

          for ($i = 0; $i < $length; $i++) {
            $key .= $keys[array_rand($keys)];
          }

          return $alpha_key . $key;
      }
      $payment_id = 'Sales-'.random_num(8);

      if (!Session::has('cart')) {
        return redirect()->route('product');
      }

      $oldCart = Session::get('cart');
      $cart = new Cart($oldCart);

      $sale = new Sale();
      $sale->cart = serialize($cart);  
      
      $id = Auth::user()->id;

      $sale->totalPrice = $cart->totalPrice;   
      $sale->agent = Auth::user()->id;
      $sale->mop = $request->mop;
      $sale->sale_id = $payment_id;
      $sale->bar= $barid;
      $sale->buyer = $request->buyer;
      $sale->save();

      Session::forget('cart');
      Session::forget('product_id');
      if ( Auth::user()->role=="Attendant") {
        return redirect()->route('store', array('bar' => "bar"));
      }
      else
      {
        return redirect()->route('product');
      }
    }

    public function orders()
    {
      $today = request('today'); 
      $week = request('week'); 
      $month = request('month'); 
      $year = request('year'); 
      $barrid = request('barid'); 
      $customer = request('customer'); 
      $setup = request('setup'); 
      $attendant = request('attendant'); 
      if (isset($attendant) || isset($barrid)) {
        $id = Auth::user()->id;
        if (!isset($barrid)) {
          $bar = Bar::where('deleted_at', NULL)->where('current_manager', $id)->first();
          $bar_id = $bar->id;
        }
        else
        {
          $bar_id = $barrid;
        }
        

        $todaynow = Carbon::Today();
        if (isset($today)) {
          $orders = Sale::select(DB::raw('*'))
                    ->whereRaw('Date(created_at) = CURDATE()')->where('bar', $bar_id)->get(); 
        }
        elseif (isset($week)) {
          Carbon::setWeekStartsAt(Carbon::SUNDAY);
          $orders = Sale::whereBetween('orders.created_at', [Carbon::now()->startOfWeek(),Carbon::now()->endOfWeek()])->where('bar', $bar_id)
          ->get();
        }
        elseif (isset($month)) {
          $currentMonth = date('m');
          $orders = Sale::where('deleted_at', NULL)->whereRaw('MONTH(created_at) = ?',[$currentMonth])->where('bar', $bar_id)->get();
        }
        elseif (isset($year)) {
          $currentYear = '20'.date('y');
          $orders = Sale::where('deleted_at', NULL)->whereRaw('YEAR(created_at) = ?',[$currentYear])->where('bar', $bar_id)->get();
        }
        else
        {
          $orders = Sale::where('deleted_at', NULL)->where('bar', $bar_id)->get();  
        }
      }
      
      elseif (Auth::user()->role=="Customer"){
        $id = Auth::user()->id;
        $todaynow = Carbon::Today();
        if (isset($today)) {
          $orders = Sale::select(DB::raw('*'))
                    ->whereRaw('Date(created_at) = CURDATE()')->where('buyer', $id)->get(); 
        }
        elseif (isset($week)) {
          Carbon::setWeekStartsAt(Carbon::SUNDAY);
          $orders = Sale::whereBetween('orders.created_at', [Carbon::now()->startOfWeek(),Carbon::now()->endOfWeek()])->where('buyer', $id)
          ->get();
        }
        elseif (isset($month)) {
          $currentMonth = date('m');
          $orders = Sale::where('deleted_at', NULL)->whereRaw('MONTH(created_at) = ?',[$currentMonth])->where('buyer', $id)->get();
        }
        elseif (isset($year)) {
          $currentYear = '20'.date('y');
          $orders = Sale::where('deleted_at', NULL)->whereRaw('YEAR(created_at) = ?',[$currentYear])->where('buyer', $id)->get();
        }
        else
        {
          $orders = Sale::where('deleted_at', NULL)->where('buyer', $id)->get();  
        }
      }

      else{
        $todaynow = Carbon::Today();
        if (isset($today)) {
          $orders = Sale::select(DB::raw('*'))
                    ->whereRaw('Date(created_at) = CURDATE()')->get(); 
        }
        elseif (isset($week)) {
          Carbon::setWeekStartsAt(Carbon::SUNDAY);
          $orders = Sale::whereBetween('orders.created_at', [Carbon::now()->startOfWeek(),Carbon::now()->endOfWeek()])
          ->get();
        }
        elseif (isset($month)) {
          $currentMonth = date('m');
          $orders = Sale::where('deleted_at', NULL)->whereRaw('MONTH(created_at) = ?',[$currentMonth])->get();
        }
        elseif (isset($year)) {
          $currentYear = '20'.date('y');
          $orders = Sale::where('deleted_at', NULL)->whereRaw('YEAR(created_at) = ?',[$currentYear])->get();
        }
        else
        {
          $orders = Sale::where('deleted_at', NULL)->get();  
        }
      }

      $orders->transform(function($order, $key){
          $order->cart = unserialize($order->cart);
          return $order;
      });

      if (Auth::user()->role=="Customer") {
        if (isset($setup)) {
          $findsale = Sale::where('deleted_at', NULL)->where('sale_id', $setup)->first();
          $findsale->delivery_status = "Pending";
          $findsale->payment_status = "Paid";
          $findsale->update();
        }
        return view('live.orders', ['orders' => $orders]);
      }
      else{
        return view('page.orders', ['orders' => $orders]);
      }
    }

    public function vieworders()
    {
      $pid = request('pid'); 
      $payment_id = request('payment_id'); 

      if (isset($payment_id)) {
        $findsale = Sale::where('deleted_at', NULL)->where('sale_id', $setup)->first();
        $findsale->delivery_status = "Pending";
        $findsale->payment_status = "Paid";
        $findsale->update();

        $orders = Sale::where('sale_id', $payment_id)->first();
      }
      else
      {
        $orders = Sale::where('sale_id', $pid)->first();
      }
      $totalPrice = $orders->totalPrice;
      $order = unserialize($orders->cart);
      $orderss =  $order->items;

      //return $orderss;
      return view('page.vieworders', compact('orderss', 'totalPrice', 'orders'));
      //return view('admin.vieworders', ['orderss' => $orderss]);

    }
    public function storesetting(Request $request)
    {
        $step1 = Setting::find(1);
        $step1->sitename = $request->sitename;
        $step1->email = $request->email;
        $step1->phone = $request->phone;
        $step1->address = $request->address;
        $step1->about = $request->about;
        $step1->facebook = $request->facebook;
        $step1->twitter = $request->twitter;
        $step1->instagram = $request->instagram;
        $step1->linkedin = $request->linkedin;

        $imageExtensions = ['jpg', 'jpeg', 'gif', 'png', 'bmp', 'svg', 'svgz', 'cgm', 'djv', 'djvu', 'ico', 'ief','jpe', 'pbm', 'pgm', 'ppm', 'ras', 'rgb', 'tif', 'tiff', 'wbmp', 'xbm', 'xpm', 'xwd'];

        if ($request->file('logo')) {
            $file1 = $request->file('logo');
            $path1 = Storage::disk('public')->putFile('logo', $file1);
            $explodeImage = explode('.', $path1);
            $extension = end($explodeImage);

            if(in_array($extension, $imageExtensions))
            {
                $step1->logo = $path1;
            }
            else
            {
                $error = "Logo must be a scanned image";
                return redirect()->route('setting', array('error' => $error));
            }
        }
        $status = "Site Updates Sucessfully";
        $step1->update();
        return redirect()->route('setting', array('status' => $status));
    }

    public function setting()
    {
        $status = request('status'); 
        $error = request('error');
        return view('page.setting', compact('status', 'error'));
    }



    public function store()
    {
        $status = request('status'); 
        $error = request('error');
        $product = request('product');
        $barreq = request('bar');
        $barrid = request('bar_id');
        if (isset($product)) {
          $barproducts = Package::where('deleted_at', NULL)->where('product', $product)->get();
        }
        elseif (isset($barreq)){
          $id = Auth::user()->id;
          $bar = Bar::where('deleted_at', NULL)->where('current_manager', $id)->first();
          $bar_id = $bar->bar_id;
          $barproducts = Package::where('deleted_at', NULL)->where('bar', $bar_id)->get();
        }
        else{
          $barproducts = Package::where('deleted_at', NULL)->where('bar', $barrid)->get();
        }
        return view('page.singlestore', compact('barproducts', 'status', 'error'));
    }

    public function attendants()
    {
        $status = request('status'); 
        $error = request('error');
        $attendant = "Attendant";
        $users = User::where('deleted_at', NULL)->where('role', $attendant)->get();
        return view('page.attendant', compact('users', 'status', 'error'));
    }

    public function storeuser(Request $request)
    {
      $user = new User();
      $user->name = $request->name;
      $user->username = $request->username;
      $user->email = $request->email;
      $user->phone = $request->phone;
      $user->address = $request->address;
      $user->role = "Attendant";
      $user->password = bcrypt($request->password);
      $user->save();    
      $status = "Attendant Stored Successfully";
      return redirect()->route('attendants', array('status' => $status));
    }

    public function updateuser(Request $request)
    {
        $id = $request->id;
        $user = User::where('deleted_at', NULL)->where('id', $id)->first();
        $user->update($request->all());
        $status = "User Updated Successfully";
        return redirect()->route('attendants', array('status' => $status));
    }

     public function passwordget()
    {   
        $error = request('passworderror'); 
        return view('page.password', compact('error'));
    }

    public function password(Request $request)
    {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }
 
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }
 
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);
 
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
 
        return redirect()->back()->with("success","Password changed successfully !"); 
    }


     //Category
    public function userdashboard()
    {
      $status = request('status'); 
      $error = request('error');
      return view('live.dashboard', compact('status', 'error'));
    }

    public function shoppingcart5()
    {
        if (!Session::has('cart')) {
            return view('live.cart');
        }
         
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('live.cart', ['products' => $cart->items, 'totalPrice' =>$cart->totalPrice]);
    }


    public function changestatus(Request $request)
    {
        $step1 = Sale::findOrFail($request->id);
        $step1->delivery_status = $request->delivery_status;
        $step1->update();
        return redirect()->back();
        return redirect()->route('setting', array('status' => $status));
    }

}
