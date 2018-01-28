<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Interfaces\ProfileInterface;

class ProfileController extends Controller
{
    protected $profile;
    public function __construct(ProfileInterface $profile){
        $this->middleware('auth');
        $this->profile = $profile;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $profile = \Auth::user()->profile;
        $social = \Auth::user()->social;
        $state = \Utility::getState('all');
        $country = \Utility::getCountry('all');
        return view('profile.index', [
            'profile'   =>  $profile,
            'social'    =>  $social,
            'states'    =>  $state,
            'countries' =>  $country
        ]);
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
        $opcode = $request->opcode;
        \Validator::make($request->all(), [
            'first_name'        =>  'required|string',
            'last_name'         =>  'required|string',
            'username'          =>  'required|string',
            'email'             =>  'nullable|email',
            'facebook_handle'   =>  'nullable|url',
            'twitter_handle'    =>  'nullable|url',
            'google_handle'     =>  'nullable|url',
            'address'           =>  'required|string',
            'city'              =>  'required',
            'state'             =>  'required',
            'country'           =>  'required',
            'phone'             =>  'required',
            'about'             =>  'nullable|string',
            'profile'           =>  'nullable|mimes:JPG,JPEG,PNG,BMP,jpg,jpeg,png,bmp'
        ])->validate();


        $data = array(
            'fname'             =>  $request->first_name ? $request->first_name : \Auth::user()->fname,
            'lname'             =>  $request->last_name ? $request->last_name : \Auth::user()->lname,
            'username'          =>  $request->username ? $request->username : \Auth::user()->username,
            'email'             =>  $request->email ? $request->email : \Auth::user()->email,
            'address'           =>  $request->address ? $request->address : \Auth::user()->profile->current_address,
            'city'              =>  $request->city ? $request->city : \Auth::user()->profile->city,
            'state'             =>  $request->state ? $request->state : \Auth::user()->profile->state_id,
            'country_id'        =>  $request->country ? $request->country : \Auth::user()->profile->country_id,
            'phone'             =>  $request->phone ? $request->phone : \Auth::user()->profile->phone1,
            'about'             =>  $request->about ? $request->about : \Auth::user()->profile->about,
            'facebook'          =>  $request->facebook_handle ? $request->facebook_handle : \Auth::user()->social->facebook,
            'twitter'           =>  $request->twitter_handle ? $request->twitter_handle : \Auth::user()->social->twitter,
            'google'            =>  $request->google_handle ? $request->google_handle : \Auth::user()->social->google,
        );

        if($request->profile) {
            $file       =   $request->profile;
            $ext        =   $file->getClientOriginalExtension();
            $file_path  =   $file->getRealPath();
            $file_name  =   hash_file('md5', $file_path) .'.'. $ext;
            $path       =   $file->move('img/profiles/', $file_name);
            $path       =   str_replace('\\', '/', $path);
            $data['image'] = $path;
        } else {
            $data['image'] = \Auth::user()->image;
        }

        \Auth::user()->update([
            'fname'     =>  $data['fname'],
            'lname'     =>  $data['lname'],
            'username'  =>  $data['username'],
            'image'     =>  $data['image'],
        ]);

        \Auth::user()->profile()->update([
            'current_address'   =>  $data['address'],
            'city'              =>  $data['city'],
            'state_id'          =>  $data['state'],
            'country_id'        =>  $data['country_id'],
            'about'             =>  $data['about'],
            'phone'            =>  $data['phone'],
        ]);

        \Auth::user()->social()->update([
            'facebook'  =>  $data['facebook'],
            'twitter'   =>  $data['twitter'],
            'google'    =>  $data['google']
        ]);
        
        return redirect()->back()->with([
            'status'    =>  'Profile successfully updated'
        ]);
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
        if($id == "me") {
            $profile = \Auth::user()->profile;
            $state = \Utility::getState('all');
            $country = \Utility::getCountry('all');
            return view("users.profile-edit", [
                'profile'   =>  $profile,
                'states'     =>  $state,
                'countries' =>  $country
            ]);
        } else if($id == "update-password") {
            return view("profile.update-password");
        }
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
        \Validator::make($request->all(), [
            'password'  =>  'required|string|min:6|confirmed'
        ])->validate();

        $data = array(
            'password'  =>  bcrypt($request->password),
        );

        \Auth::user()->update($data);

        return redirect()->back()->with([
            'status'    =>  'Profile successfully updated'
        ]);
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

    public function activate($username) {
        return $username;
    }
}
