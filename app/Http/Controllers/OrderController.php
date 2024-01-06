<?php

namespace App\Http\Controllers;

use App\Models\Art;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewCart(){
        $user = Auth::user()->id;
        $carts = Cart::where('user_id',$user)->get();
        $count = Cart::where('user_id',$user)->count();
        // foreach($carts as $cart){
        //     dd($cart->art->name);
        // }
        
        $sum = 0;
        $delivery = 0;
        foreach($carts as $cart){
            $sum += $cart->art->price;
            // dd($cart->art->price);
            $delivery += 100;
        }
        $total = $sum+$delivery;
        return view('cart',compact('carts','count','sum','delivery','total'));
    }
    public function addToCart(Request $request){
        switch($request->button){
            case 'cart':
                $old = Cart::where('user_id',Auth::user()->id)->get();
                foreach($old as $ol){
                    if($ol->art_id == $request->artid){
                        $ol->delete();
                    }
                }
                $cart = new Cart();
                $cart->user_id = Auth::user()->id;
                $cart->art_id = $request->artid;
                $cart->quantity = $request->quantity;
                // dd($request);
                $cart->save();
                return back()->withErrors("Product Added to Cart");
            case 'buy':
                $values = $request->except('_token');
                // dd($values);

                $art = Art::find($request->artid)->first();
                $sum = $art->price * $request->quantity;
                $delivery = 100;
                $total = $sum+$delivery;
                return view('orderform',compact('values','sum','delivery','total'));
        }
        
    }
    public function removeFromCart(Request $request){
        $cartid = $request->cartid;
        $cart = Cart::find($cartid);
        // dd($cart);
        $cart->delete();
        return redirect()->route('cart');

    }
    public function nextCart(Request $request){
        switch($request->but){
            case 'checkout':
                $diff = "cart";
                $user = Auth::user()->id;
                $carts = Cart::where('user_id',$user)->get();
                $count = Cart::where('user_id',$user)->count();
                // foreach($carts as $cart){
                //     dd($cart->art->name);
                // }
                
                $sum = 0;
                $delivery = 0;
                foreach($carts as $cart){
                    $sum += $cart->art->price;
                    // dd($cart->art->price);
                    $delivery += 100;
                }
                $total = $sum+$delivery;
                $values = $request->except('_token');
                // dd($values);
                return view('orderform',compact('diff','sum','delivery','total'));
            case 'empty':
                $carts = Cart::where('user_id',Auth::user()->id)->get();
                // dd($carts);
                foreach($carts as $cart){
                    $cart->delete();
                }
                return redirect()->route('cart');
        }
        
    }
    public function viewAllOrders(){
        $orders = Order::all()->sortBy('created_at');
        return view('admin_orders',compact('orders'));
    }
    public function updateOrder(Request $request){
        $order = Order::find($request->orderid);
        if($request->updatetype == 'artist'){
            $order->artist_status = 'Ready';
            $order->save();
            return redirect()->route('artist.orders');
        }
        else{
            $order->status = 'Completed';
            $order->save();
            return redirect()->route('allorders');
        }
        
        
    }
    public function index()
    {
        //
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
    public function placeOrder(Request $request){
        // dd($request);
        if(isset($request->quantity)){
            $order = new Order();
            $order->user_id = Auth::user()->id;
            $order->art_id =  $request->artid;
            $order->quantity = $request->quantity;
            $order->total = $request->total;
            $order->location = $request->location;
            $order->contact = $request->contact;
            $order->status = 'Pending';
            $order->artist_status = 'Working';
            $order->save();
            return("hello");
        }
        else{
            $carts = Cart::where('user_id', Auth::user()->id);
            foreach($carts as $cart){
                $order = new Order();
                $order->user_id = Auth::user()->id;
                $order->art_id = $cart->art_id;
                $order->quantity = $cart->quantity;
                $order->total = $request->total;
                $order->location = $request->location;
                $order->contact = $request->contact;
                $order->save();
            }
            
        }
        
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
