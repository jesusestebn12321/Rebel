<?php

namespace Equivalencias\Http\Controllers;

use Equivalencias\MatterUser;
use Illuminate\Http\Request;
use Equivalencias\Http\Requests\MatterUserRequests;

use Auth;

class MatterUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        
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
    public function store(MatterUserRequests $request)
    {
        $matter_user=MatterUser::create([
                'matter_id'=>$request->matter_id,
                'user_id'=>Auth::user()->id,
            ]);
        // dd($request);
        return back()->with('success','Lleno el perfil con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Equivalencias\MatterUser  $matterUser
     * @return \Illuminate\Http\Response
     */
    public function show(MatterUser $matterUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Equivalencias\MatterUser  $matterUser
     * @return \Illuminate\Http\Response
     */
    public function edit(MatterUser $matterUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Equivalencias\MatterUser  $matterUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MatterUser $matterUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Equivalencias\MatterUser  $matterUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(MatterUser $matterUser)
    {
        //
    }
}
