<?php

namespace App\Http\Controllers;

use App\Models\Art;
use App\Models\Cart;
use App\Models\Saved;
use App\Models\Order;
use App\Models\Feature;
use App\Models\User;
use App\Models\Temp;
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
            case "save":
                $old = Saved::where('art_id',$request->artid)->where('user_id',Auth::user()->id)->count();
                if($old == 0){
                    $save = new Saved();
                    $save->user_id = Auth::user()->id;
                    $save->art_id = $request->artid;
                    $save->save();
                }
                return redirect()->back()->with('message',"Product Added to Saved");
                break;
            case "remove":
                $saved = Saved::where('user_id',Auth::user()->id)->where('art_id',$request->artid);
                // dd($save);
                $saved->delete();
                return back();
                break;
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

                $art = Art::where('id',$request->artid)->first();
                
                $price = $art->price;
                // dd($price);
                $sum = $price * $request->quantity;
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
        // dd($request);
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
    public function viewCustOrders(Request $request){
        // dd($request->button);
        
        $cust = User::find($request->custid);
        // dd($cust);

        switch($request->button){
            case 'item':
                return view("home");
            case 'custorder':
                $orders = Order::where('user_id',$request->custid)->get();
                return view('each_orders',compact('orders','cust'));
            case 'artorder':
                $orders = Order::all();
                return view('each_orders',compact('orders','cust'));
        }
        
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
            $order->payment = 'Complete';
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
    public function store(Request $request,$pay)
    {
        
    }
    public function createOrder(Request $request, $type){
        $pay = Auth::user()->id.Time();
        if(isset($request->quantity)){
            if($type == "cod"){
                $order = new Order();
                $art = Art::find($order->art_id);
                $art->stock -= $order->quantity;
                $art->save();
            }
            else{
                $order = new Temp();
                $order->pay_id = $pay;
            }
            $order->user_id = Auth::user()->id;
            $order->art_id =  $request->artid;
            $order->quantity = $request->quantity;
            $order->total = $request->total;
            $order->location = $request->location;
            $order->contact = $request->contact;
            $order->status = 'Pending';
            $order->artist_status = 'Working';
            $order->payment_method = $request->payment_method;
            $order->payment = 'Incomplete';
            $order->save();
            // return view('completed');
        }
        else{
            $carts = Cart::where('user_id', Auth::user()->id)->get();
            foreach($carts as $cart){
                if($type == "cod"){
                    $order = new Order();
                    // $order->pay_id = 
                    $art = Art::find($order->art_id);
                    $art->stock -= $order->quantity;
                    $art->save();
                }
                else{
                    $order = new Temp();
                    $order->pay_id = $pay;
                }
                // $order = new Order();
                $order->user_id = Auth::user()->id;
                $order->art_id = $cart->art_id;
                $order->cart_id = $cart->id;
                $order->quantity = $cart->quantity;
                $order->total = $request->total;
                $order->location = $request->location;
                $order->contact = $request->contact;
                $order->artist_status = "Working";
                $order->status = 'Pending';
                $order->payment_method = $request->payment_method;
                $order->payment = 'Incomplete';
                $order->save();
            }
            // return view('completed'); 
        }
        return $pay;
    }
    public function placeOrder(Request $request){
        if($request->payment_method == "cod"){
            $this->createOrder($request, "cod");
            return view("completed");
        }
        else{
            $pay = $this->createOrder($request, "khalti");
            $name = Auth::user()->name."'s Order";
            $custname = Auth::user()->name;
            $custemail = Auth::user()->email;
            $custcontact = Auth::user()->contact;
            $amount = $request->total * 10;
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://a.khalti.com/api/v2/epayment/initiate/',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS =>'{
                    "return_url": "http://127.0.0.1:8000/artstore/orders/payment/status",
                    "website_url": "http://127.0.0.1:8000/artstore",
                    "amount":"'.$amount.'",
                    "purchase_order_id": '.$pay.',
                    "purchase_order_name": "'.$name.'",
                    "customer_info": {
                        "name": "'.$custname.'",
                        "email": "'.$custemail.'",
                        "phone": "'.$custcontact.'"
                }
            }
    
            ',
            CURLOPT_HTTPHEADER => array(
                'Authorization: key 286f7475b4c943e1a656959c50389c08',
                'Content-Type: application/json',
            ),
            ));
    
            $response = curl_exec($curl);
    
            curl_close($curl);
            $parsed = json_decode($response, true);
            // dd($response);
            if ($response == FALSE){
                $orders = Temp::where('pay_id',$pay)->get();
                foreach($orders as $order){
                    $order->delete();
                }
                return view("error");
            }
            // dd($response);
            return redirect()->to($parsed['payment_url'])->send();
    
        }

    }
        
    public function deleteOutstandingOrders(){
        $orders = Temp::where('user_id',Auth::user()->id)->where('payment','Incomplete')->where('payment_method','khalti')->get();
        // dd($orders);
        foreach($orders as $order){
            $order->delete();
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

    public function paymentTest(){
        return view('payment');
    }
    public function makePayment(Request $request){
        // dd($request);
        if($request->payment_method == "cod"){
            $feature = new Feature();
            $feature->artist_name = $request->input('artist_name');
            $feature->arts = $request->input('arts');
            $feature->time = $request->input('featuring_period');
            $feature->payment_method = $request->payment_method;
            $feature->user_id = Auth::user()->id;
            $feature->art_id = $request->arts;
     
            // Save the feature
            $feature->save();
     
            return redirect()->back()->with('success', 'Art feature stored successfully.');
           }
           else{
            switch ($request->featuring_period){
                case 1:
                    $amount = 30000;
                    break;
                case 7:
                    $amount = 210000;
                    break;
                case 30: 
                    $amount = 630000;
                default:
                    $amount = 0;
            }
            $d = Time();
            $pur_id = "".Auth::user()->id.$request->arts.$d;
            $art = Art::find($request->arts);
            $name = $art->name;
            $custname = Auth::user()->name;
            $custemail = Auth::user()->email;
            $custcontact = Auth::user()->contact;
            // dd($custcontact);
            // dd($name);
            // $amount = 100;
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://a.khalti.com/api/v2/epayment/initiate/',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS =>'{
                    "return_url": "http://127.0.0.1:8000/artstore/artists/payment/status",
                    "website_url": "http://127.0.0.1:8000/artstore",
                    "amount":"'.$amount.'",
                    "purchase_order_id": '.$pur_id.',
                    "purchase_order_name": "'.$name.'",
                    "customer_info": {
                        "name": "'.$custname.'",
                        "email": "'.$custemail.'",
                        "phone": "'.$custcontact.'"
                }
            }
    
            ',
            CURLOPT_HTTPHEADER => array(
                'Authorization: key 286f7475b4c943e1a656959c50389c08',
                'Content-Type: application/json',
            ),
            ));
    
            $response = curl_exec($curl);
    
            curl_close($curl);
            $parsed = json_decode($response, true);
            // dd($response);
            return redirect()->to($parsed['payment_url'])->send();
           }
    }

    
    public function verifyPayment(Request $request){
        // dd($request);
        if ($request->status == "Completed"){
            $f = Feature::find($request->purchase_order_id);
            $f->payment = 1;
            $f->save();
            return view("payment_done");
        }
        else
            $f = Feature::find($request->purchase_order_id);
            if ($f){
                $f->delete();
            }
            return view("error");
    }

    public function verifyOrderPayment(Request $request){
        if ($request->status == "Completed"){
            $temps = Temp::where('pay_id',$request->purchase_order_id)->get();
            foreach($temps as $temp){
                $order = new Order();
                $order->user_id = Auth::user()->id;
                $order->art_id =  $temp->artid;
                $order->quantity = $temp->quantity;
                $order->total = $temp->total;
                $order->location = $temp->location;
                $order->contact = $temp->contact;
                $order->status = $temp->status;
                $order->artist_status = $temp->artist_status;
                $order->payment_method = $temp->payment_method;
                $order->pay_id = $temp->pay_id;
                $order->payment = 'Complete';
                $order->save();
                $art = Art::find($order->art_id);
                $art->stock -= $order->quantity;
                $art->save();
                $temp->delete();
            }
            return view("completed");
        }
        else{
            $orders = Temp::where('pay_id',$request->purchase_order_id)->get();
            foreach($orders as $order){
                $order->delete();
            }
            return view("error");
        }
    }

    public function paymentDone($pidx){
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://a.khalti.com/api/v2/epayment/lookup/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{
                "pidx": '.$pidx.' 
            }
        }

        ',
        CURLOPT_HTTPHEADER => array(
            'Authorization: key 286f7475b4c943e1a656959c50389c08',
            'Content-Type: application/json',
        ),
        ));

        $response = curl_exec($curl);
        dd($response);
        curl_close($curl);
        // $parsed = json_decode($response, true);
        if ($response == FALSE){
            return 1;
        }
        return 0;
    }

    
}
