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
    public function create($slug){
        $content=new Content();
        $matter=Matter::where('slug',$slug)->first();
        $matter_user=MatterUser::where('id',Auth::user()->id)->first();
        return view('content.create',compact('matter','matter_user','content'));   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $last_content=Content::where('matter_id',$request->input('matter_id'))->first();
        $start_content_version=contentVersion::create([
            'title'=>$last_content->title,
            'slug'=>$last_content->slug,
            'version'=>$last_content->version,
            'justification'=>$last_content->justification,
            'content'=>$last_content->content,
            'purpose'=>$last_content->purpose,
            'methodology'=>$last_content->methodology,
            'evaluation'=>$last_content->evaluation,
            'matter_id'=>$last_content->matter_id,
            'content_id'=>$last_content->id,
          ]);
        $last_content->delete();
        $slug=str_slug($request->title.rand());
        $content= Content::create([
            'title'=>$request->input('title'),
            'slug'=>$slug,
            'version'=>$request->input('version'),
            'justification'=>$request->input('justification'),
            'content'=>$request->input('content'),
            'purpose'=>$request->input('purpose'),
            'methodology'=>$request->input('methodology'),
            'evaluation'=>$request->input('evaluation'),
            'matter_id'=>$request->input('matter_id'),
            'status'=>0,
            'confirmation'=>0
            ]);

        return redirect()->route('Matter.index')->with('success','<script>swal({
            title: "Exito!",
          text: "Se a creado con exito el contenido",
          icon: "success",
      })</script>');

    }

    /**
     * Display the specified resource.
     *
     * @param  \Equivalencias\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function show($slug){
        $content=Content::where('slug',$slug)->first();
        $matter_user=MatterUser::where('id',Auth::user()->id)->first();
        
        $matter= Matter::where('id',$content->matters->id)->first();
        return view('content.show',compact('content','matter','matter_user'));
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
        $content->version=$request->input('version');
        $content->justification=$request->input('justification');
        $content->purpose=$request->input('purpose');
        $content->methodology=$request->input('methodology');
        $content->evaluation=$request->input('evaluation');
        $content->content=$request->input('content');
        $content->status=0;
        $content->confirmation=false;
        $content->save();
        return redirect()->route('Matter.index')->with('success','<script>swal({
            title: "Exito!",
          text: "Se a editado con exito el contenido",
          icon: "success",
      })</script>');
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

        return back()->with('success','<script>swal({
            title: "Exito!",
          text: "Contenido Actualizado.",
          icon: "success",
      })</script>');
    }

    public function VersionBack($slug){
        $old_contentVersion=ContentVersion::where('slug',$slug)->first();
        $old_content=Content::where('matter_id',$old_contentVersion->matter_id)->first();
        $new_content=Content::create([
            'title'=>$old_contentVersion->title,
            'slug'=>$old_contentVersion->slug,
            'version'=>$old_contentVersion->version,
            'justification'=>$old_contentVersion->justification,
            'content'=>$old_contentVersion->content,
            'purpose'=>$old_contentVersion->purpose,
            'methodology'=>$old_contentVersion->methodology,
            'evaluation'=>$old_contentVersion->evaluation,
            'matter_id'=>$old_contentVersion->matter_id,
          ]);

        $new_content_version=contentVersion::create([
            'title'=>$old_content->title,
            'slug'=>$old_content->slug,
            'version'=>$old_content->version,
            'justification'=>$old_content->justification,
            'content'=>$old_content->content,
            'purpose'=>$old_content->purpose,
            'methodology'=>$old_content->methodology,
            'evaluation'=>$old_content->evaluation,
            'matter_id'=>$old_content->matter_id,
            'content_id'=>$old_content->id,
          ]);
        $old_contentVersion->delete();
        $old_content->delete();

        

            return back()->with('success','<script>swal({
            title: "Exito!",
          text: "Se produjo un cambio de version exitosamente",
          icon: "success",
      })</script>');

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
        return back()->with('success','<script>swal({
            title: "Exito!",
          text: "Borrado el Contenido",
          icon: "success",
      })</script>');
    }
}
