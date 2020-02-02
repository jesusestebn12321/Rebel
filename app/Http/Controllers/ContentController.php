<?php

namespace Equivalencias\Http\Controllers;

use Equivalencias\Content;
use Equivalencias\contentVersion;
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
    public function error($id)
    {

        $content=Content::where('status',1)->where('matter_id',$id)->get();
        return view('content.error',compact('content'));
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
    public function store(Request $request)
    {
        $slug=str_slug($request->title.rand());

        $content= Content::create([
            'title'=>$request->input('title'),
            'content'=>$request->input('content'),
            'version'=>$request->input('version'),
            'introdution'=>$request->input('introdution'),
            'slug'=>$slug,
            'matter_id'=>$request->input('matter_id'),
            'status'=>1,
            'confirmation'=>0
            ]);
        return back()->with('success','Se a creado con exito el contenido');

    }

    /**
     * Display the specified resource.
     *
     * @param  \Equivalencias\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function show($slug){
        $content=Content::where('slug',$slug)->first();
        
        $matter= Matter::where('id',$content->matters->id)->first();
        return view('content.show',compact('content','matter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Equivalencias\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        //
        $matter_U=MatterUser::where('user_id',Auth::user()->id)->firstOrFail();
        $matter_user=Teacher::where('user_id',Auth::user()->id)->firstOrFail();
        $teacher=Teacher::where('user_id',Auth::user()->id)->firstOrFail();
        $content=Content::where('matter_id','=',$matter_U->matter_id)->where('slug',$slug)->first();


        return view('content.edit',compact('content','teacher','matter_user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Equivalencias\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $content=Content::where('slug',$slug)->firstOrFail();
        $contentV=ContentVersion::where('content_id',$content->id)->get();
        $version=$contentV->count();
        $slug=str_slug($content->version.$content->title.rand());
        $contentV=ContentVersion::create([
                'slug'=>$slug,
                'version'=>$content->version,
                'justification'=>$content->justification,
                'purpose'=>$content->purpose,
                'content'=>$content->content,
                'methodology'=>$content->methodology,
                'evaluation'=>$content->evaluation,
                'content_id'=>$content->id,
            ]);
        $content->version=$version+1;
        $content->justification=$request->input('justification');
        $content->purpose=$request->input('purpose');
        $content->methodology=$request->input('methodology');
        $content->evaluation=$request->input('evaluation');
        $content->content=$request->input('content');
        $content->status=0;
        $content->confirmation=false;
        $content->save();
        return redirect()->route('Matter.index')->with('success','Se a editado con exito el contenido');
    }

    public function update_status($slug){
        $content=Content::where('slug',$slug)->first();
        $content_verify=Content::where('matter_id',$content->matters->id)->get();

        foreach ($content_verify as $item) {
            # code...
            $item->status=0;
            $item->save();
        }
        //dd($content);
        $content->status=1;
        $content->save();

        return back()->with('success','Contenido Actualizado.');
    }

    public function VersionBack(Request $request){
        $contentVersion=ContentVersion::where('slug',$request->input('slug'))->first();
        $content=Content::where('id',$contentVersion->content_id)->first();
        $contentAll=ContentVersion::where('content_id',$contentVersion->content_id)->get();
        $if=0;
        $else=0;
        foreach ($contentAll as $item) {
            if ($item->content==$content->content && $item->title==$content->title && $item->introdution==$content->introdution) {
                $if++;
            } else {
                $else++;
                
            }    
        }

        if ($if>=1) {
            $content->version=$contentVersion->version;
            $content->title=$contentVersion->title;
            $content->introdution=$contentVersion->introdution;
            $content->content=$contentVersion->content;
            $content->status=0;
            $content->confirmation=false;
            $content->save();

            return back()->with('success','Se a cambiado la version deñ contenido con exito.');
        } else {
            $slug=str_slug($content->version.$content->title.rand());
            $contentV=ContentVersion::create([
                'slug'=>$slug,
                'title'=>$content->title,
                'content'=>$content->content,
                'version'=>$content->version,
                'introdution'=>$content->introdution,
                'content_id'=>$content->id,
            ]);

            $content->version=$contentVersion->version;
            $content->title=$contentVersion->title;
            $content->introdution=$contentVersion->introdution;
            $content->content=$contentVersion->content;
            $content->status=0;
            $content->confirmation=false;
            $content->save();


            return back()->with('success','Se a cambiado la version deñ contenido con exito.');

        }
        //dd('else='.$else.'if='.$if);
        
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
