<?php

namespace App\Http\Controllers\Tags;

use App\Models\tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use Illuminate\Support\Facades\Validator;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = tag::all();
        return view('Tags.tags',compact('tags'));
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
    public function store(TagRequest $request)
    {

        //Insert The Tag In database
        tag::create([
            'tag_name'=>$request->tag_name,
        ]);
        session()->flash('Add','The tag has been added successfully');
        return redirect('/Tags');
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
        //Update Tag
        $tags = tag::findorfail($request->id);
        $tags->update([
            'tag_name' => $request->tag_name,
        ]);

        session()->flash('edit','The Tag has been added successfully');
        return redirect('/Tags');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //Delete the tag
        $id = $request->id;
        tag::find($id)->delete();
        session()->flash('delete','The tag has been successfully deleted');
        return redirect('/Tags');
    }

}
