<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Interfaces\AdsCommentInterface;

class AdsCommentController extends Controller
{
    protected $adsComment;
    public function __construct(AdsCommentInterface $adsComment) {
        $this->middleware('auth');
        $this->adsComment = $adsComment;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $data = array(
            'comment'   =>  $request->comment,
            'ads_id'      =>  $request->house_ad,
            'user_id'   =>  \Auth::user()->id
        );

        $validator = \Validator::make($data, [
            'comment'   =>  'required|string'
        ]);

        if($validator->fails()) {
            return $validator->errors();
        }

        $store = $this->adsComment->store($data);

        if($request->ajax()) {
            return response()->json('ok');
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
