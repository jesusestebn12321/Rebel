<?php

namespace Equivalencias\Http\Controllers;

use Equivalencias\Matter;
use Auth;
use Equivalencias\MatterUser;
use Equivalencias\Content;
use Equivalencias\Career;
use Equivalencias\Http\Controllers\ContentController;
use Illuminate\Http\Request;

class MatterController extends Controller
{
   public function index()
    {

        $matter_user=MatterUser::where('user_id','=',Auth::user()->id)->first();
        $matter=Matter::all();
        return view('matter.teacher.index',compact('matter','matter_user'));
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
     * @param  \Equivalencias\Matter  $Matter
     * @return \Illuminate\Http\Response
     */
    
    public function show($slug){
        $matter=Matter::where('slug','=',$slug)->firstOrFail();
        $content=Content::where('matter_id','=',$matter->id)->get();
        return view('matter.teacher.show',compact('matter','content'));
    }


    public function showTwo($id){
        $matter=Matter::where('career_id','=',$id)->get();
        return $matter;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Equivalencias\Matter  $Matter
     * @return \Illuminate\Http\Response
     */
    public function edit(Matter $Matter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Equivalencias\Matter  $Matter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Matter $Matter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Equivalencias\Matter  $Matter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Matter $Matter)
    {
        //
    }
}
