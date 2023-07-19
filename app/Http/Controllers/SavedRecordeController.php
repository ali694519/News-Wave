<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SavedRecordeController extends Controller
{

    public function store(Request $request)
    {
        $user = Auth::guard('web')->user()->id;

        $post = post::with(['image','tags','users'])->where('id',$request->id)->first();
      // To insert the post ...
        $post->users()->attach($user);

        session()->flash('Add','The news has been Saved successfully');
        return redirect('/News');
    }

    public function showSave() {
        $user = Auth::guard('web')->user();
        if($user) {
            $posts = $user->posts;
       return view('SavedRecords.SavedRecords',compact('posts'));

        }else {
            return "error";
        }

    }

    public function deleteSaved(Request $request) {

        $user = Auth::guard('web')->user();

        if($user) {

            $post = post::findOrFail($request->id);

        $user->posts()->detach($post->id);

    }


        session()->flash('delete','The News has been successfully deleted');
        return redirect('/home');
    }


}
