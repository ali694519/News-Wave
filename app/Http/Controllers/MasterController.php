<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\category;

class MasterController extends Controller
{

     public function cards() {
        $category = category::with('image')->get();
        return view('home2',compact('category'));
    }

    public function showNews($id) {

        if (auth()->check()) {
        // User is logged in
         $news = post::with(['tags','image','comments'])->where('id',$id)
         ->first();
        return view('ShowNews',compact('news'));

    } else {
        // User is not logged in
        return redirect()->route('login');
    }



    }
}
