<?php

namespace App\Http\Controllers\Categories;
use App\Models\category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Traits\ImageTrait;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = category::with(['image'])->get();


        return view('Category.category',compact('category'));

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
    use ImageTrait;
    public function store(CategoryRequest $request)
    {
        // Insert The Category In Database
         $category = new Category();
        $category->cate_name = $request->cate_name;
        $category->description =$request->description;
        $category->save();
        $fox = 'category';
        // Upload and associate the image
        $this->uploadImage($request, $category,$fox);
            session()->flash('Add','The section has been added successfully');
            return redirect('/Categories');
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
    public function update(CategoryRequest $request)
    {

        //Update The Category
        $category = category::findorfail($request->id);
          $category->cate_name = $request->cate_name;
          $category->description = $request->description;
          $category->save();
        $fox = 'category';
        // Update and associate the image
        if($request->hasFile('image')) {
        $this->updateImage($request, $category,$fox);
        }
        session()->flash('edit','The section has been added successfully');
        return redirect('/Categories');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //Delete The Category
          $id = $request->id;
          category::find($id)->delete();
          session()->flash('delete','The item has been successfully deleted');
          return redirect('/Categories');
    }
}
