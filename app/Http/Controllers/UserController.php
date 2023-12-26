<?php

namespace App\Http\Controllers;

use App\Models\Art;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arts = Art::all();
        return view('index', compact('arts'));

    }
    public function adminLogin(){
        // $order = Order::whereDate('created_at', '>=', date('Y-m-d'));
        $orders = Order::all()->sortByDesc('created_at')->take(5);
        $usercount = User::all()->count();
        $ordercount = Order::where('status','pending')->count();
        // dd($order);
        $sales = Order::where('status','completed')->whereDate('updated_at','=',date('Y-m-d'))->get();
        $total = 0;
        foreach ($sales as $sale) {
            $total += $sale->total;
        }
        $tops = Art::withCount('order')->orderBy('order_count','desc')->take(3)->get();
        // dd($tops);
        return view('admin', compact('ordercount','usercount', 'total','orders','tops'));
    }
    public function adminStats(){
        $orders = Order::whereYear('created_at',date('Y'))->orderBy('created_at','asc')->get()->groupBy(function(Order $order){
            return $order->created_at->format('m');
        })->toArray();
        $months = [];
        $monthsCount = [];
        foreach($orders as $month => $values){
            $months[] = $month;
            $monthsCount[] = count($values);
        }
        for ($i=0; $i < 12; $i++) { 
           $months[$i] = $i+1;
           foreach($orders as $month => $values){
            if($month == $i+1){
                $monthsCount[$i] = count($values);
                break;
            }
            else{
                $monthsCount[$i] = 0;
            }
           }
        }
        // dd($months);
        // dd($orders);
        // return view('admin_stats')->with('month',json_encode($months, JSON_NUMERIC_CHECK))->with('monthsCount',json_encode($monthsCount, JSON_NUMERIC_CHECK));
        return view('admin_stats')->with('monthsCount',json_encode($monthsCount, JSON_NUMERIC_CHECK));
    }
    public function viewLogin(){
        return view('login');
    }
    public function viewSignup(){
        return view('signup1');
    }

    public function viewUpload(){
        return view('upload');
    }
    public function viewOrderForm(){
        return view('orderform');
    }

    public function viewProduct($id){
        $prod = Art::find($id);
        // dd($prod);
        return view('product',compact('prod'));
    }
    
    public function viewCustOrders(){
        $cust_id = Auth::user()->id;
        // $customers = User::all()->where('user_id', $cust_id)->get();
        // dd($customers);
        $orders = Order::where('user_id', $cust_id)->get();
        return view('cust_orders',compact('orders'));
    }
    public function viewArtistOrders(){
        $id = 3;
        // $orders = Order::all();
        // $artists = User::find($id);
        // $arts = $artists->art()->order()->get();
        // $arts = Art::all()->where('user_id',$id);
        // $orders = $arts->order()->get();
        // $orders = DB::table('orders')->join('arts','order.art_id','=','arts.id')->join('artists','artists.id')
        $orders = Order::all();
        foreach ($orders as $order) {
            // dd($order->user->name);
        }
        
        return view('artist_orders', compact('orders'));
    }
    public function verifyLogin(Request $request){
        $credentials = ($request->except('_token'));
        if (Auth::attempt($credentials)){
            $request->session()->regenerate();
            if(Auth::user()->usertype == 'admin')
                return redirect()->route('admin');
            else
                return redirect()->route('home');
        }
        else{
            // dd($request);
            return redirect()->route('login');
        }
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
        $newUser = new User();
        $newUser->name = $request->name;
        $newUser->username = $request->username;
        $newUser->email = $request->email;
        $newUser->password = bcrypt($request->password);
        $newUser->contact = $request->contact;
        $newUser->usertype = $request->usertype;
        $newUser->save();
        return redirect()->route('login');
    }
    public function verifyUpload1(Request $request){
        // dd($request);
        if ($request->hasFile('artimage')){
            $file = $request->file('artimage');
            // $name = $file->getClientOriginalName();
           $extension = $file->getClientOriginalExtension(); // you can also use file name
           $fileName = time().'.'.$extension;
            // dd($name);
           $path = public_path().'/images';
           $uplaod = $file->move($path,$fileName);

        //    dd($name);
         }
    }
    public function verifyUpload(Request $request){
        $validated = $request->validate([
            'artname' => 'required|string',
            'artimage' => 'required|mimes:jpeg,png,jpg',
            'artsize' => 'required|string',
            'material' => 'required|string',
            'category' => 'required|string',
            'deliver' => 'required|string',
            'description' => 'required|string',
            'stock' => 'required|numeric',
            'frame' => 'required|boolean',
            'artprice' => 'required|numeric',
        ]);
        $data = new Art();
        if($request->hasFile('artimage')){
            $file = $request->file('artimage');
            $extension = $file->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            $path = public_path().'/images/arts';
            $upload = $file->move($path,$fileName);
            $data->image = $fileName;
        }
        $data->name = $request->artname;
        $data->size = $request->artsize;
        $data->material = $request->material;
        $data->category = $request->category;
        $data->description = $request->description;
        $data->stock = $request->stock;
        $data->time = $request->deliver;
        $data->hasFrame = $request->frame;
        $data->price = $request->artprice;
        // $data->user_id = "1";
        $data->user_id = Auth::user()->id;
        // dd($data);
        $data->save();
        return redirect()->route('upload')->withErrors('Upload Complete');
    } 

    public function logout(Request $request){
        Auth::logout();
         $request->session()->invalidate();
         return redirect()->route('login');
 
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
    public function viewAllUsers(){
        
        $customers = User::where('usertype','customer')->withCount('order')->get();
        $custcount = $customers->count();
        return view('allusers', compact('customers','custcount'));
        // dd($artists);
    
    }
    public function viewAllArtists(){
        $artists = User::where('usertype','artist')->withCount('art')->get();
        $artistcount = $artists->count();
        // $custorders = $customers->get();
        foreach ($artists as $art){
            $arts = $art->art;
            $count = 0;
            foreach ($arts as $ar){
                $num = $ar->order->count();
                $count += $num;
            }
            $art->order = $count;
        }
        return view('allartists', compact('artists','artistcount'));
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
    public function editProfile(){
        return view('index');
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
    public function viewImage(){
        $imageData= Art::all();
        return view('test', compact('imageData'));
    }
//     $file = $request->file('artimage');
//             $filename = $file->getClientOriginalName();
//             // $filename = date('YmdHi').$file->getClientOriginalName();
//             // $file->move(public_path('/images/art'));
//             // // $path = public_path().'/images/art';
//             $file-> move(public_path('images/'). $filename);
//             // /uploads/{$filename}
//             // $data->image = $filename;
//             // $destinationPath = 'images';
//             // $myimage = $request->artimage->getClientOriginalName();
//             // $request->artimage->move(public_path($destinationPath), $myimage);
//             dd($file);
//
 }
