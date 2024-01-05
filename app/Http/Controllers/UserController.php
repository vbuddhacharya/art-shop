<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Artist;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }
    public function viewLogin(){
        return view('login');
    }


    public function verifyLogin(Request $request){
        
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)){
            // dd($request);
            $request->session()->regenerate();
            return redirect()->route('home');
        }
        else{
            return redirect()->route('login');
        }
    }


    public function artistSignupStore(Request $request)
    {
        //  dd($request);
        $validated = $request->validate([
            'name'=> 'required|string',
            'address'=> 'required|string',
            'contact'=> 'required|string',
            'email'=>'required|email:filter|unique:users',
            'username'=> 'required|string|unique:users',
            'password'=>'required|string|min:8',
            'facebook' => 'nullable|string',
            'twitter' => 'nullable|string',
            'instagram' => 'nullable|string',
            'bio' => 'nullable|text',
        ]);

        $user = User::create($validated);

        // $newUser = new User();
        // $newArtist = new Artist();

        // $newUser->name = $request->name;
        // $newUser->address = $request->address;
        // $newUser->contact = $request->contact;
        // $newUser->email = $request->email;
        // $newUser->username = $request->username;
        // $newUser->password = bcrypt($request->password);
        // $newUser->user_type = $request->user_type;

        // $newUser = User::find($request->id);
        // $newArtist->artist_id = $request->$newUser->id;
        $artistData = $request->only(['facebook_profile', 'twitter_profile', 'instagram_profile', 'bio']);
        // $newArtist->facebook = $request->facebook;
        // $newArtist->twitter = $request->twitter;
        // $newArtist->instagram = $request->instagram;
        // $newArtist->bio = $request->bio;

        $user->artist()->create($artistData);
        // $newUser->save();
        // $newArtist->save();

        return redirect()->route('login');
    }


    public function viewArtistSignup(){
        return view('signup_artist');
    }

    public function viewUpload(){
        return view('upload');
    }
    public function viewOrderForm(){
        return view('orderform');
    }

    public function viewProduct(){
        return view('product');
    }
    public function viewCustOrders(){
        return view('cust_orders');
    }
    public function viewArtistOrders(){
        return view('artist_orders');
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
