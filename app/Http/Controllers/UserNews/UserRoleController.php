<?php

namespace App\Http\Controllers\UserNews;

use App\Models\User;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
     $data = User::Filter($request->query())->paginate(5);
     return view('users.show_users',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();

        return view('users.Add_user',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'confirmed|min:6',
            'roles_name' => 'required',
            'image' => 'nullable',
            ]);
            $input = $request->all();

            $input['password'] = Hash::make($input['password']);
            $user = User::create($input);
            $fox = 'users';
              // Upload and associate the image
            $this->uploadImage($request, $user,$fox);
            $user->assignRole($request->input('roles_name'));
            return redirect()->route('users.index')
            ->with('success','Data has been saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        return view('users.edit',compact('user','roles','userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

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
    DB::table('model_has_roles')->where('model_id',$id)->delete();
    $user->assignRole($request->input('roles'));

    $user->update($input);

    return redirect()->back()->with('success', 'Data has been updated successfully');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        User::find($request->user_id)->delete();
        return redirect()->route('users.index')->with('success','Data has been deleted successfully');
    }
}
