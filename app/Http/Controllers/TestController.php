<?php

namespace App\Http\Controllers;

use App\Test;
use App\User;
use App\Bar;
use App\Report;
use App\Slider;
use Auth;
use App\Cart;
use App\Category;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Input;
use Illuminate\Support\Facades\Hash;
use Session;


class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $status = request('status'); 
        $error = request('error');
        $sliders = Slider::where('deleted_at', NULL)->get();
        return view('live.index', compact('error', 'status', 'sliders'));
    }

    public function about()
    {
        $status = request('status'); 
        $error = request('error');
        return view('live.about', compact('error', 'status'));
    }

    public function contact()
    {
        $status = request('status'); 
        $error = request('error');
        return view('live.contact', compact('error', 'status'));
    }


    public function menu()
    {
        $status = request('status'); 
        $error = request('error');
        $categories = Category::where('deleted_at', NULL)->get();
        $menus = Product::where('deleted_at', NULL)->get();
        return view('live.menu', compact('error', 'status', 'menus', 'categories'));
    }


    public function stafflogin(Request $request)
    { 
        if ($request->bar!="Admin") {
            $bar = Bar::findOrFail($request->bar);
            if ($bar->current_manager==NULL) {
                $user = User::where('email', $request->email)->where('deleted_at', NULL)->first();
                $bar->current_manager = $user->id;
                $bar->update();

                if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
                    //If successful, then redirect to their intended location
                    //return $request;
                    $report = new Report();
                    $report->agent = $user->id;
                    $report->bar = $bar->id;
                    $report->save();
                    
                   return redirect('/');
                }
                else
                {
                    $error = "Either your Username/Email or Password is incorrect, try again.";
                    return redirect()->route('login', array('error' => $error));
                }
                //return redirect()->back()->withInput($request->only('email', 'remember'));
            }
            else
            {
                $error = "The current bar attendant is yet to logout.";
                return redirect()->route('login', array('error' => $error));
            }
        }
        else
        {
            $user = User::where('email', $request->email)->where('deleted_at', NULL)->first();
            if (isset($user)) {
                if ($user->role=="Attendant") {
                    $error = "You are a bar attendant, please select a bar.";
                    return redirect()->route('login', array('error' => $error));
                    //return redirect()->back()->withInput($request->only('email', 'remember'));
                }
                elseif (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password]))
                {
                    //If successful, then redirect to their intended location
                    //return $request;
                   return redirect('/');
                }
            }
            else
            {
                 $error = "Either your Username/Email or Password is incorrect, try again.";
                return redirect()->route('login', array('error' => $error));
            }
        }

        //If unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function login()
    {
        $status = request('status'); 
        $error = request('error');
        return view('auth.login', compact('error', 'status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function show(Test $test)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit(Test $test)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Test $test)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test $test)
    {
        //
    }


    public function addcart(Request $request, $id)
    {
        $product = Product::find($id); 
      
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
        $request->session()->put('cart', $cart);
        $request->session()->push('product_id', $id);
        return back();
    }

    public function getReduceByOne($id)
    {
      $oldCart = Session::has('cart') ? Session::get('cart') : null;
      $cart = new Cart($oldCart);
      $cart->reduceByOne($id);
      if (count($cart->items) > 0) {
        Session::put('cart', $cart);
        return back();
      }
      else{
        Session::forget('cart');
        return redirect()->route('product');
      }
    }


    public function getRemoveItem($id)
    {
      $oldCart = Session::has('cart') ? Session::get('cart') : null;
      $cart = new Cart($oldCart);
      $cart->removeItem($id);

      if (count($cart->items) > 0) {
        Session::put('cart', $cart);
        return back();
      }
      else{
        Session::forget('cart');
        return redirect()->route('product');
      }
    }


    public function shoppingcart()
    {
        if (!Session::has('cart')) {
            return view('live.cart');
        }
         
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('live.cart', ['products' => $cart->items, 'totalPrice' =>$cart->totalPrice]);
    }
}
