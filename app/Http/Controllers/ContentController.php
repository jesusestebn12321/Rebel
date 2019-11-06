<?php

namespace Equivalencias\Http\Controllers;

use Equivalencias\Content;
use Equivalencias\MatterUser;
use Equivalencias\Matter;
use Equivalencias\Teacher;
use Auth;
use Illuminate\Http\Request;
use Equivalencias\Http\Requests\ContentRequests;

class ContentController extends Controller
{
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
    public function create(){
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContentRequests $request)
    {
        $slug=str_slug($request->title.rand());
        $content= Content::create([
            'title'=>$request->input('title'),
            'content'=>$request->input('content'),
            'version'=>$request->input('version'),
            'introdution'=>$request->input('introdution'),
            'slug'=>$slug,
            'matter_id'=>$request->input('matter_id')
            ]);
        return back()->with('success','Se a creado con exito el contenido');

    }

    /**
     * Display the specified resource.
     *
     * @param  \Equivalencias\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $matter_U=MatterUser::where('user_id',Auth::user()->id)->firstOrFail();
        $matter_user=Teacher::where('user_id',Auth::user()->id)->firstOrFail();
        $content=Content::where('matter_id','=',$matter_U->matter_id)->get();
        $matter= Matter::where('id',$matter_U->matter_id)->firstOrFail();
        return view('content.show',compact('content','matter_user','matter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Equivalencias\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function edit(Content $content)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Equivalencias\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function update(ContentRequests $request, $slug)
    {
       
        $content=Content::where('slug',$slug)->firstOrFail();
        $content->title=$request->input('title');
        $content->content=$request->input('content');
        $content->save();
        return back()->with('success','Se la editado con exito el contenido');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Equivalencias\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {   
        $content=Content::where('slug',$slug)->firstOrFail();
        $content->delete();
        return back()->with('success','Se a borrado con exito el contenido');
    }
}
