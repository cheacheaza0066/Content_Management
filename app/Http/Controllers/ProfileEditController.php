<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileEditController extends Controller
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
    public function store(Request $request)
    {
        //
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
    public function edituser()
    {
        return view('user.editProfile',['profile'=> auth()->user()]);
    }
    
    public function editadmin()
    {
        return view('admin.editProfile',['profile'=> auth()->user()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateUser(Request $request)
    {
        $user = auth()->user();

        $this->validate($request, [
            'name' => ['string', 'max:255'],
            'email' => ['string', 'email', 'max:255'],
        ]);
        $input = $request->only('name','email');
        $user->update($input);
        return redirect()->route('User.profile.edit')->with('success',"อัพเดทข้อมูลเรียบร้อย");

    }
    public function updateAdmin(Request $request)
    {
        $user = auth()->user();

        $this->validate($request, [
            'name' => ['string', 'max:255'],
            'email' => ['string', 'email', 'max:255'],
        ]);
        $input = $request->only('name','email');
        $user->update($input);
        return redirect()->route('Admin.profile.edit')->with('success',"อัพเดทข้อมูลเรียบร้อย");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
