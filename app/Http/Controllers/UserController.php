<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
Use App\Models\Art;
use App\Models\Order;
use App\Models\Saved;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Feature;

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
        $arts = Art::inRandomOrder()->take(3)->get();
        return view('home', compact('arts'));

    }
    public function viewAll(){
        $arts = Art::inRandomOrder()->paginate(16);
        return view('explore', compact('arts'));
    }
    public function viewCategory($id){
        $arts = Art::where('category',$id)->paginate(16);
        return view('category', compact('arts','id'));
    }
    public function viewSaved(){
        $saveds = Saved::where('user_id',Auth::user()->id)->orderBy('created_at','desc')->get();
        return view('saved', compact('saveds'));
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

        $users = User::whereYear('created_at',date('Y'))->orderBy('created_at','asc')->get()->groupBy(function (User $user){
            return $user->created_at->format('m');
        })->toArray();
        $usersCount = [];
        for ($i= 0; $i < 12; $i++) {
            $usersCount[$i] = 0;
            foreach($users as $month => $user){
                if($month-1 == $i)
                    $usersCount[$i] = count($user);
            }
        }
        // $articles=Order::->get();
        $sales = Order::where('status','Completed')->where("updated_at",">", Carbon::now()->subMonths(6))->orderBy('updated_at','asc')->get()->groupBy(function(Order $order){
            return $order->updated_at->format('m');
        })->toArray();
        $salesCount = [];
        $d = Carbon::now()->subMonths(5)->month;
        // dd($sales);
        for($i=0;$i<6;$i++){
            
            $salesCount[$d] = 0;
            foreach($sales as $month => $values){
                if($month== $d){
                    $sale = 0;
                    foreach ($values as $value) {
                        $sale += $value['total'];
                    }
                    // $salesCount[$month-1] = $sale;
                    $salesCount[$d] = $sale;
                }  
            }
            if($d==12){
                $d = 1;
            }
            else
                $d++;
        }
        $salesCount = array_values($salesCount);
        // dd($salesCount);
        $completed = Order::where('status','Completed')->whereYear('updated_at',date('Y'))->count();
        $pending = Order::where('status','Pending')->count();
        $orderCount = [$pending, $completed];

        $yearly = Order::where('status','Completed')->orderBy('updated_at','desc')->get()->groupBy(function(Order $order){
            return $order->updated_at->format('Y');
        })->toArray();
        // dd($yearly);
        $users = User::orderBy('created_at','desc')->get()->groupBy(function(User $user){
            return $user->created_at->format('Y');
        })->toArray();
        $order_data = [];
        $i =0;
        foreach($yearly as $year => $values){
            $sales = 0;
            $user_count = 0;
            foreach($values as $value){
                $sales += $value['total'];
            }
            foreach($users as $year1=> $data){
                if ($year1 == $year){
                    $user_count = count($data); 
                }
            }
            $order_data[$year] = [count($values),$sales,$user_count];
            $i++;
            if($i==5){
                break;
            }
        }
        // dd($order_data);
        // return view('admin_stats')->with('month',json_encode($months, JSON_NUMERIC_CHECK))->with('monthsCount',json_encode($monthsCount, JSON_NUMERIC_CHECK));
        $all_sales = Order::where('status','Completed')->get();
        $total = 0;
        foreach($all_sales as $sales){
            $total+= $sales->total;
        }
        
        return view('admin_stats',compact('completed','pending','order_data','total'))->with('monthsCount',json_encode($monthsCount, JSON_NUMERIC_CHECK))->with('orderCount',json_encode($orderCount, JSON_NUMERIC_CHECK))->with('salesCount',json_encode($salesCount, JSON_NUMERIC_CHECK))->with('usersCount',json_encode($usersCount, JSON_NUMERIC_CHECK));
    }
    public function viewLogin(){
        return view('login');
    }



    public function artistSignupStore(Request $request)
    {
        //  dd($request);
        // $Validated = $request->validate([
        //     'name'=> 'required|string',
        //     'address'=> 'required|string',
        //     'contact'=> 'required|string',
        //     'email'=>'required|email:filter|unique:users',
        //     'username'=> 'required|string|unique:users',
        //     'password'=>'required|string|min:8',
        //     'facebook' => 'nullable|string',
        //     'twitter' => 'nullable|string',
        //     'instagram' => 'nullable|string',
        //     'bio' => 'nullable|text',
        // ]);

        $newUser = new User();
        $newUser->name = $request->name;
        $newUser->address = $request->address;
        $newUser->contact = $request->contact;
        $newUser->email = $request->email;
        $newUser->username = $request->username;
        $newUser->password = bcrypt($request->password);
        $newUser->user_type = $request->user_type;
        $newUser->facebook = $request->facebook;
        $newUser->twitter = $request->twitter;
        $newUser->instagram = $request->instagram;
        $newUser->bio = $request->bio;

        $newUser->save();

        return redirect()->route('login');
    }


    public function viewArtistSignup(){
        return view('signup_artist');
    }

    public function viewUpload(){
        return view('upload');
    }

    public function viewCustomers(){
        return view('customer_artist');
    }

    public function viewArtistFeature(){
        $user = Auth::User();
        // Access the username
        $username = $user->name;
        $arts = Art::all();
        // $art = Auth::user()->Arts;
        return view('feature_artist',compact('username', 'arts'));
    }

    public function viewArtist(){
        // $order = Order::whereDate('created_at', '>=', date('Y-m-d'));
        $user = Auth::User();
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
        return view('artist_home', compact('user', 'ordercount','usercount', 'total','orders','tops'));
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
            if(Auth::user()->user_type == 'admin')
                return redirect()->route('admin');
            elseif(Auth::user()->user_type == 'artist')
                return redirect()->route('artist.home');
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
        // dd($request);
        // $validated = $request->validate([
        //     'artname' => 'required|string',
        //     'image' => 'required|mimes:jpeg,png,jpg',
        //     'artsize' => 'required|string',
        //     'material' => 'required|string',
        //     'category' => 'required|string',
        //     'deliver' => 'required|string',
        //     'description' => 'required|string',
        //     'stock' => 'required|numeric',
        //     'frame' => 'required|boolean',
        //     'artprice' => 'required|numeric',
        // ]);
            // Your code for storing data
            $data = new Art();
            if($request->hasFile('image')){
                // dd($request);
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $fileName = time().'.'.$extension;
                $path = public_path().'/images/arts';
                $upload = $file->move($path,$fileName);
                $data->image = $fileName;
            }
            // $imagePath = $request->file('image')->verifyUpload('image', 'public');
            $data->name = $request->artname;
            // $data->image = $imagePath;
            $data->size = $request->artsize;
            $data->material = $request->material;
            $data->category = $request->category;
            $data->description = $request->description;
            $data->stock = $request->stock;
            // $data->time = $request->deliver;
            $data->hasFrame = $request->frame;
            $data->price = $request->artprice;
            // $data->user_id = "1";
            $data->user_id = Auth::user()->id;
            // dd($data);
            $data->save();
            return redirect()->route('upload')->withErrors('Upload Complete');
        } 

    public function verifyFeature(Request $request){
        // dd($request);
        // $validated = $request->validate([
        //     'artist_name' => 'required|string',
        //     'art_title' => 'required|string',
        //     'art_creation_date' => 'required|date',
        //     'artworkImages' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        //     'art_size' => 'required|string',
        // ]);
        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }
       // Store the feature
       $feature = new Feature();
       $feature->artist_name = $request->input('artist_name');
       $feature->arts = $request->input('arts');
       $feature->featureprice = $request->input('featureprice');
    //    $art = Art::find($request->arts);
// $art_id = Art::find($art_id);
       $feature->user_id = Auth::user()->id;
       $feature->art_id = $request->arts;

       // Save the feature
       $feature->save();

       return redirect()->back()->with('success', 'Art feature stored successfully.');
   
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
        
        $customers = User::where('user_type','customer')->withCount('order')->get();
        $custcount = $customers->count();
        forEach($customers as $c){
            $c->joined = $c->created_at->format('Y-m-d');
        }
        // dd($customers);
        $orders = Order::all();
        return view('allusers', compact('customers','custcount','orders'));
        // with('custs',json_decode($custs));
        // dd($artists);
    
    }
    public function viewAllArtists(){
        $artists = User::where('user_type','artist')->withCount('art')->get();
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
        forEach($artists as $a){
            $a->joined = $a->created_at->format('Y-m-d');
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
