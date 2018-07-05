<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Interfaces\AdsInterface;

class AdsController extends Controller
{
    protected $ads;
    public function __construct(AdsInterface $ads) {
        $this->middleware('auth')->only('create');
        $this->ads = $ads;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ads = $this->ads->show('home');
        return view('ads.index', [
            'ads'   =>  $ads,
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
        return view("ads.post");
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
        \Validator::make($request->all(), [
            'state'	                    =>	'required|integer',
            'location'	                =>	'required|string',
            'move_on'	                =>	'required|date_format:Y-m-d',
            'room_type'	                =>	'required|string',
            'title'	                    =>	'required|string',
            'description'	            =>	'required|string|min:50',
            'total_units'	            =>	'nullable|integer',
            'bathrooms'	                =>	'nullable|integer',
            'bedrooms'	                =>	'nullable|integer',
            'toilets'	                =>	'nullable|integer',
            'price_range'	            =>	'required',
            'terms'                     =>  'required',
            'image1'                    =>  'nullable|mimes:jpeg,bmp,png,jpg,JPEG,BMP,PNG,JPG',
            'image2'                    =>  'nullable|mimes:jpeg,bmp,png,jpg,JPEG,BMP,PNG,JPG',
            'image3'                    =>  'nullable|mimes:jpeg,bmp,png,jpg,JPEG,BMP,PNG,JPG',
            'image4'                    =>  'nullable|mimes:jpeg,bmp,png,jpg,JPEG,BMP,PNG,JPG',
            'image5'                    =>  'nullable|mimes:jpeg,bmp,png,jpg,JPEG,BMP,PNG,JPG',
        ])->validate();

        $data = array(
            'user_id'                   =>  \Auth::user()->id,
            'state'	                    =>	$request->state,
            'area'                      =>  191,
            'exact_location'	        =>	$request->location,
            'move_on'	                =>	$request->move_on,
            'room_type'	                =>	$request->room_type,
            'title'	                    =>	$request->title,
            'slug'                      =>  str_slug($request->title) .'-'. date('di:s'),
            'description'	            =>	$request->description,
            'total_units'	            =>	$request->total_units,
            'max_bath'	                =>	$request->bathrooms,
            'max_bed'	                =>	$request->bedrooms,
            'max_toilet'	            =>	$request->toilets,
            'max_rent'  	            =>	$request->price_range,
            'ad_contact'	            =>	TRUE,
        );
        
        $store = $this->ads->store($data);

        $save_ad = 0;
        if($store->id) {
            if($request->file('image1')) {
                $this->uploadAdImage($request->file('image1'), $store->id);
            }
            if($request->file('image2')) {
                $this->uploadAdImage($request->file('image2'), $store->id);
            }
            if($request->file('image3')) {
                $this->uploadAdImage($request->file('image3'), $store->id);
            }
            if($request->file('image4')) {
                $this->uploadAdImage($request->file('image4'), $store->id);
            }
            if($request->file('image5')) {
                $this->uploadAdImage($request->file('image5'), $store->id);
            }

            \App\User::find(\Auth::id())->notify(new \App\Notifications\NewAdvert($store));

            $profiles_near_by = \App\Profile::where('current_address', 'LIKE', '%' . $data['exact_location'] . '%')->get();
            foreach($profiles_near_by as $profile):
                $user = \App\User::find($profile->user_id);
                $user->notify(new \App\Notifications\NotifyPeopleNearby($store, $user));
            endforeach;
            
            session(['post-ad' => 'Successful! Your ad has been posted. You will receive notifications once theres a request.']);
            return redirect("/ads/result/" . $store->slug);
        }
        session(['post-ad' => 'unable to post ad please check your network settings and re-try']);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //
        if($id == "create-ad") {
            return view("ads.post");
        } else if ($id == "get-area") {
            $id = $request->id;
            $area = \Utility::getArea($id);
            if($request->ajax()) {
                return response()->json($area);
            }
            dd($area);
        } else if($id == "me") {
            return view("ads.me", [
                'ads'   =>  \Auth::user()->ads
            ]);
        } else if($id == "search") {
            return redirect("ads/");
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

    public function adsSlug($slug) {
        $ad = $this->ads->findAd($slug);
        //return \Auth::user()->adsComment;
        //return $ad->adComment;
        return view('ads.show', [
            'ad'            =>  $ad,
            'ad_images'     =>  $ad->adsImage,
            'ad_comments'   =>  $ad->adComment,
        ]);
    }

    public function home() {
        $ads = $this->ads->show('home');
        
        return $ads;
    }

    public function similar() {
        $ads = $this->ads->show('similar');

        return $ads;
    }

    public function myAds($id) {
        $ads = $this->ads->myAds($id);

        return $ads;
    }

    public function uploadAdImage($file, $id) {
        $ext        =   $file->getClientOriginalExtension();
        $file_path  =   $file->getRealPath();
        $file_name  =   hash_file('md5', $file_path) .'.'. $ext;
        $path       =   $file->move('img/ads/', $file_name);
        $path       =   str_replace('\\', '/', $path);

        $adsImage = array(
            'adid'  =>  $id,
            'image' =>  $path,
        );

        $storeImage = $this->ads->storeAdsImage($adsImage);

        return $storeImage;
    }

    public function asdSearch(Request $request) {
        $data = array(
            'location'      =>  $request->location,
            'state'         =>  $request->state,
            'room_type'     =>  $request->room_type,
            'min_price'     =>  explode(",", $request->min_price)[0],
            'max_price'     =>  explode(",", $request->min_price)[1],
            'min_bath'      =>  explode(",", $request->min_bath)[0],
            'max_bath'      =>  explode(",", $request->min_bath)[1],
            'min_bed'       =>  explode(",", $request->min_bed)[0],
            'max_bed'       =>  explode(",", $request->min_bed)[1],
            'min_toilet'    =>  explode(",", $request->min_toilet)[0],
            'max_toilet'    =>  explode(",", $request->min_toilet)[0],
        );

        $result = $this->ads->search($data);
        session(['search' => 1]);
        return view('ads.index', [
            'ads'   =>  $result,
        ]);
    }

    public function asdSearchHome(Request $request) {
        $data = array(
            'room_option'   =>  $request->room_option,
            'location'      =>  $request->location
        );

        $result = $this->ads->searchHome($data);
        session(['search' => 1]);
        return view('ads.index', [
            'ads'   =>  $result,
        ]);
    }

    public function get_ads() {
        $ads = $this->ads->show('vue');
        return $ads;
    }

    public function delete_ad($adid) {
        $ad = \App\Ads::find($adid);

        $ad->delete();

        return 1;
    }

    public function testnearby() {
        $location = \Auth::user()->profile->current_address;

        $profiles_near_by = \App\Profile::where('current_address',  'LIKE',  '%' . $location . '%')->get();

        $users = [];
        foreach($profiles_near_by as $profile):
            $users[] = \App\User::find($profile->user_id);
        endforeach;

        dd($users);
    }
}
