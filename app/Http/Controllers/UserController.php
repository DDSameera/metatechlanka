<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserProfileUpdateRequest;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(1);

        return view('users.list', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return back()->with('success', 'User created successfully!');
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

        $user = User::find($id);


        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserProfileUpdateRequest $request, $id)
    {

        $user = User::find($id);
        if ($user) {
            User::updateOrCreate([
                'name' => $request->name,

            ]);

            $destinationPath = 'public/images/users';

            $imageFileName = $id.'.'.$request->profile_image->extension();
            $request->profile_image->storeAs($destinationPath,$imageFileName);

            Profile::updateOrCreate([
                'user_id'=>$id,
                'address'=>$request->address,
                'contact_no'=>$request->contact_no,
                'profile_image'=> $imageFileName
            ]);
        }

        return redirect('users')->with('success', 'User updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $user = User::find($id);

       if($user){
          $user->delete();
            return redirect(route('users.index'))->with('success', 'User Deleted Successfully'.$user->id);
       }
    }
}
