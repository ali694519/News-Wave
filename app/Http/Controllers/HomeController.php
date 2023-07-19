<?php

namespace App\Http\Controllers;

use App\Models\tag;
use App\Models\post;
use App\Models\User;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Traits\ImageTrait;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tags = tag::all();
        $news = post::with(['tags','image'])
        ->get();
        $category = category::with(['posts','image'])->get();
        return view('home',compact('category','news','tags'));
    }


    public function edit() {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('auth.editprofile',compact('user'));
    }

    use ImageTrait;
   public function update(Request $request)
    {
    $input = $request->all();
    $id = $input['id'];

    $this->validate($request, [
        'name' => 'required',
        'email' => 'required|email|unique:users,email,'.$id,
        'password' => 'same:confirm-password',
        'image' => 'nullable',
    ]);

    if (!empty($input['password'])) {
        $input['password'] = Hash::make($input['password']);
    } else {
        $input = array_except($input, ['password']);
    }

    $user = User::find($id);

    if (!$user) {
        return response()->json(['error' => 'User not found'], 404);
    }

      $fox = 'users';
        // Update and associate the image
        if($request->hasFile('image')) {
        $this->updateImage($request, $user,$fox);
        }

    $user->update($input);

    return redirect()->back()->with('success', 'Data has been updated successfully');
}


}
