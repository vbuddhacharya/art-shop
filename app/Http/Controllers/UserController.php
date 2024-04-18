<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
Use App\Models\Art;
use App\Models\Order;
use App\Models\Saved;
use App\Models\Temp;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Feature;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $arts = Art::inRandomOrder()->take(3)->get();
        $features = Feature::where('status','running')->inRandomOrder()->take(3)->get();
        return view('home', compact('features'));

    }
    public function viewAll(){
        $arts = Art::inRandomOrder()->paginate(16);
        return view('explore', compact('arts'));
    }
    public function viewCategory($id){
        $arts = Art::where('category',$id)->paginate(16);
        return view('category', compact('arts','id'));
    }
    public function viewAllFeatured(){
        $arts = Feature::where('status','running')->paginate(16);
        // dd($arts);
        return view ('featured', compact('arts'));
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

    public function viewCustomerOrders(){
        return view('orders_artist');
    }

    public function viewArtistFeature(){
    //    dd(url()->previous());
        $this->deleteFeature();
        $user = Auth::User();
        // Access the username
        $username = $user->name;
        $arts = Art::all();
        // $art = Auth::user()->Arts;
        return view('feature_artist',compact('username', 'arts'));
    }

    public function verifyFeature(Request $request){
        $this->deleteFeature();
        $old = Feature::where('user_id',Auth::user()->id)->where('art_id',$request->arts)->count();
        if($old == 0){
            $feature = new Feature();
            $feature->artist_name = $request->input('artist_name');
            $feature->arts = $request->input('arts');
            $feature->time = $request->input('featuring_period');
            $feature->payment_method = "khalti";
            $feature->user_id = Auth::user()->id;
            $feature->art_id = $request->arts;
            $feature->payment = 0;
            $feature->save();
            $featureid = $feature->id;
            // Save the feature
            
           if($request->payment_method == "cod"){
            return redirect()->back()->with('success', 'Art feature stored successfully.');
           }
           else{
            switch ($request->featuring_period){
                case 1:
                    $amount = 30000;
                    break;
                case 7:
                    $amount = 21000;
                    break;
                case 30: 
                    $amount = 63000;
                default:
                    $amount = 0;
            }
            $d = Time();
            // $pur_id = "".Auth::user()->id.$request->arts.$d;
            $art = Art::find($request->arts);
            $name = $art->name;
            $custname = Auth::user()->name;
            $custemail = Auth::user()->email;
            $custcontact = Auth::user()->contact;
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
                    "purchase_order_id": '.$featureid.',
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
            if ($response == FALSE){
                $feature->delete();
                // dd($response);
                return redirect()->back();
            }
            else
                return redirect()->to($parsed['payment_url'])->send();
        }
    }
        else{
            return redirect()->back()->with('message','Already Featuring');
        }
    }
    public function deleteFeature(){
        $feature = Feature::where('user_id',Auth::user()->id)->where('payment',0)->get();
        foreach($feature as $f){
            $f->delete();
        }
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
        $orders = Order::where('user_id',Auth::user()->id)->where('payment','Incomplete')->where('payment_method','khalti')->get();
        // dd($orders);
        foreach($orders as $order){
            $art = Art::find($order->art_id);
            $art->stock += $order->quantity;
            $art->save();
            $order->delete();
        } // to delete outstanding orders
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
            elseif(Auth::user()->usertype == 'artist')
                // dd("yo");
                return redirect()->route('artist.home');
            else{
                $this->deleteOutstandingOrders();
                return redirect()->route('home');
            }

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
            $data->time = "7 days";
            $data->hasFrame = $request->frame;
            $data->price = $request->artprice;
            // $data->user_id = "1";
            $data->user_id = Auth::user()->id;
            // dd($data);
            $data->save();
            return redirect()->route('upload')->withErrors('Upload Complete');
        } 

     public function  adminFeatures(){
        $this->updateFeature();
        $pending = Feature::where('status','pending')->where('payment',1)->orderBy('created_at')->get();
        foreach($pending as $p){
            $p->date = $p->created_at->format('d-M-Y');
        }
        $running = Feature::where('status','running')->where('payment',1)->orderBy('expiry')->get();
        $completed = Feature::where('status','completed')->orderBy('updated_at')->get();
        foreach($completed as $c){
            $exp = Carbon::parse($c->expiry);
            $c->start_date = $exp->addDays($c->time);
        }
        // dd($completed);
        return view('admin_features',compact('pending','running','completed'));
     }
    public function addFeature(Request $request){
        $id = $request->featureid;
        $feature = Feature::find($id);
        // dd($feature);
        $feature->status = 'running';
        switch ($feature->time){
        case 1:
            $feature->expiry = Carbon::now()->addDays(1);
            break;
        case 7:
            $feature->expiry = Carbon::now()->addDays(7);
            break;
        case 30:
            $feature->expiry = Carbon::now()->addDays(30);
            break;
        default:
            $feature->expiry = Carbon::now();
       }

        $feature->save();
        return redirect()->back();
    }
    public function updateFeature(){
        $feature = Feature::where('status','running')->get();
            $now = Carbon::now();
            foreach($feature as $f){
                // dd($now->diffInDays($f->expiry,false));
                if ($now->diffInDays($f->expiry,false)<0){
                    $f->status = "Completed";
                    $f->save();
                }
            }
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

    public function editProfile(){
        $user = User::find(Auth::user()->id);
        return view('edit_profile',compact('user'));
    }
    public function updateProfile(Request $request){
        
        $user = User::find(Auth::user()->id);
        if(isset($request->newpassword) && !Hash::check($request->oldpassword,$user->password)){
            return redirect()->back()->with('message','Incorrect Password');
        }
        
        if($request->hasFile('image')){
            if($user->image){
                $image_path = public_path("/images/profile/".$user->image);
                // dd($image_path);
                if(File::exists($image_path)) {
                    File::delete($image_path);
                }
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            $path = public_path().'/images/profile';
            $upload = $file->move($path,$fileName);
            $user->image = $fileName;
        }

        if($request->name)
            $user->name = $request->name;
        if($request->email)
            $user->email = $request->email;
        if($request->contact)
            $user->contact = $request->contact;
        if($request->newpassword)
            $user->password = bcrypt($request->newpassword);
        if($request->username)
            $user->username = $request->username;
        $user->save();
        return redirect()->back();
        // dd($user);
    }

    public function deleteOutstandingOrders(){
        $orders = Temp::where('user_id',Auth::user()->id)->where('payment','Incomplete')->where('payment_method','khalti')->get();
        // dd($orders);
        foreach($orders as $order){
            $order->delete();
        }
    }

    public function contactAdmin(){
        $user = User::where('usertype','admin')->get();
        return view('contact',compact('user'));
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
