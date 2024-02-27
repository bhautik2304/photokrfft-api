<?php

namespace App\Http\Controllers;

use App\Models\adminuser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminuserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response(["users" => adminuser::all()], 200);
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
    public function store(Request $req)
    {
        //
        $admin= new adminuser;
        $admin->name = $req->name;
        $admin->phone_no = $req->phone_no;
        $admin->profile_photo = storeFile($req,'img','/img/adminprofile/');
        $admin->email = $req->email;
        $admin->password = Hash::make($req->password);
        $admin->save();

        return response(["msg"=>"Created Successfully","code"=>"$admin->name Created Successfully"],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\adminuser  $adminuser
     * @return \Illuminate\Http\Response
     */
    public function show(adminuser $adminuser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\adminuser  $adminuser
     * @return \Illuminate\Http\Response
     */
    public function edit(adminuser $adminuser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\adminuser  $adminuser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, adminuser $adminuser,$id)
    {
        //

        $adminuser->find($id)->update([
            "name"=>$req->name,
            "phone_no"=>$req->phone_no,
            "email"=>$req->email,
        ]);

        if ($req->hasFile('img')) {
            $adminuser->find($id)->update([
                'profile_photo' => storeFile($req, 'img', '/img/paper/')
            ]);
        }

        return response(["msg"=>"Updated Successfully","code"=>200],200);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\adminuser  $adminuser
     * @return \Illuminate\Http\Response
     */
    public function destroy(adminuser $adminuser,$id)
    {
        //
        $adminuser->destroy($id);
        return response(["msg"=>"Updated Successfully","code"=>200],200);
    }
}
