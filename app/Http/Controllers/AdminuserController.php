<?php

namespace App\Http\Controllers;

use App\Models\adminuser;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\auth\emailverify;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\adminuserRequest;
use Illuminate\Support\Facades\{Hash, Validator};

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
        return success("Retrived All Admin Data", adminuser::all());
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
        $user_find_result = false;
        $errorMessage = [];

        $users_email = adminuser::where('email', $req->email)->first();
        $users_phone = adminuser::where('phone_no', $req->phone_no)->first();


        if ($users_email && $users_phone) {
            # code...
            $errorMessage['msg'] = "Mobile No. & Email id allready Used";
            $errorMessage['data']['both'] = true;
            $errorMessage['data']['email'] = true;
            $errorMessage['data']['mobile'] = true;
            $user_find_result = true;
        } elseif ($users_email) {
            # code...
            $errorMessage['msg'] = "Email id allready Used";
            $errorMessage['data']['both'] = false;
            $errorMessage['data']['email'] = true;
            $errorMessage['data']['mobile'] = false;
            $user_find_result = true;
        } elseif ($users_phone) {
            $errorMessage['msg'] = "Mobile No. allready Used";
            $errorMessage['data']['both'] = false;
            $errorMessage['data']['email'] = false;
            $errorMessage['data']['mobile'] = true;
            $user_find_result = true;
        }

        if ($user_find_result) {
            # code...
            return unValidate($errorMessage);
        }

        $token = Str::random(32);

        $admin = new adminuser;
        $admin->name = $req->name;
        $admin->phone_no = $req->phone_no;
        $admin->profile_photo = storeFile($req, 'img', '/img/adminprofile/');
        $admin->email = $req->email;
        $admin->password = Hash::make($req->password);
        $admin->role = $req->role;
        $admin->accesstoken = $token;
        $admin->email_veryfi = true;
        $admin->save();

        Mail::to($admin->email)->send(new emailverify(route("emailveryfy", $token)));

        return created("Created Successfully");
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
    public function update(Request $req, adminuser $adminusers, $id)
    {
        // return $req;
        $adminusers->find($id)->update([
            "name" => $req->name,
            "phone_no" => $req->phone_no,
            "email" => $req->email,
            "role" => $req->role,
        ]);

        if ($req->hasFile('img')) {
            $adminusers->find($id)->update([
                'profile_photo' => storeFile($req, 'img', '/img/paper/')
            ]);
        }

        return created("Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\adminuser  $adminuser
     * @return \Illuminate\Http\Response
     */
    public function destroy(adminuser $adminuser, $id)
    {
        //
        $adminuser->destroy($id);
        return success("Deleted User Successfully");
    }
}
