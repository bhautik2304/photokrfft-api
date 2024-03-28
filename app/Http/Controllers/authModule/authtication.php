<?php

namespace App\Http\Controllers\authModule;

use App\Http\Controllers\Controller;
use App\Mail\auth\sendResetPasswordOtp;
use App\Models\{adminuser, customer};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class authtication extends Controller
{
    //

    public function adminEmailVerifications($token)
    {
        $users = adminuser::where('accesstoken', $token)->first();

        if (!$users) {
            # code...
            return "invalid access token";
        }

        $users->update([
            "email_veryfi" => true
        ]);

        return redirect("https://admin.photokrafft.com/");
    }
    public function customerEmailVerifications($token)
    {
        $users = customer::where('access_token', $token)->first();

        if (!$users) {
            # code...
            return "invalid access token";
        }

        $users->update([
            "email_veryfi" => true
        ]);

        return redirect("https://photokrafft.com/Login");
    }

    public function session(Request $req)
    {
        $users = adminuser::where('token', $req->token)->first();

        if (!$users) {
            # code...
            return response(["msg" => "Users Not Found", "code" => 404], 200);
        }

        // $token = Str::random(60);

        // $users->update([
        //     "token" => $token,
        // ]);

        return response([
            "msg" => "Login Successfully",
            "code" => 200,
            "user" => $users,
            "accessToken" => $users->token,
        ], 200);
    }

    public function login(Request $req)
    {
        $users = adminuser::where('email', $req->email)->orWhere('phone_no', $req->email)->first();

        if (!$users) {
            # code...
            return response(["msg" => "Users Not Found", "code" => 404], 200);
        }

        if (!$users->email_veryfi) {
            # code...
            return response(["msg" => "Pls Verify Your Email id", "code" => 404], 200);
        }

        // if (!($req->password == $users->password)) {
        //     # code...
        //     return response(["msg" => "Wrong Password", "code" => 404], 200);
        // }
        if (!Hash::check($req->password, $users->password)) {
            # code...
            return response(["msg" => "Wrong Password", "code" => 404], 200);
        }

        $token = Str::random(60);

        $users->update([
            "token" => $token,
        ]);

        return response([
            "msg" => "Login Successfully",
            "code" => 200,
            "user" => $users,
            "accessToken" => $token,
        ], 200);
    }
    public function customerlogin(Request $req)
    {
        $users = customer::where('email', $req->email)->orWhere('phone_no', $req->email)->first();


        if (!$users) {
            # code...
            return response(["msg" => "Users Not Found", "code" => 404], 200);
        }


        if (!Hash::check($req->password, $users->password)) {
            # code...
            return response(["msg" => "Wrong Password", "code" => 404], 200);
        }

        if ($users->approved == 0) {
            # code...
            return response(["msg" => "Your account is under verification for approvals", "code" => 404], 200);
        }

        if ($users->status == 0) {
            # code...
            return response(["msg" => "Your Account is not Active", "code" => 404], 200);
        }

        if (!$users->email_veryfi) {
            # code...
            return response(["msg" => "Pls Veryfi Your Email Id", "code" => 404], 200);
        }

        $token = Str::random(60);

        $users->update([
            "token" => $token,
        ]);

        // dd($users->toArray());
        return response([
            "msg" => "Login Successfully",
            "code" => 200,
            "user" => $users,
            "token" => $token,
        ], 200);
    }

    public function otpvery(Request $req)
    {
    }
    public function tokenVerify(Request $req)
    {
        $users = customer::where('token', $req->token)->first();


        if (!$users) {
            # code...
            return response(["msg" => "Users Not Found", "code" => 404], 200);
        }

        if ($users->status == 0) {
            # code...
            return response(["msg" => "Your Account is not Active", "code" => 404], 200);
        }

        if ($users->approved == 0) {
            # code...
            return response(["msg" => "Your Account is Not approved", "code" => 404], 200);
        }

        // $token = Str::random(60);

        // $users->update([
        //     "token" => $token,
        // ]);
        // dd($users->toArray());

        return response([
            "msg" => "Login Successfully",
            "code" => 200,
            "user" => $users,
            "token" => $users->token,
        ], 200);
    }

    public function forgetPasswordReq(Request $req, customer $customer)
    {
        //Write function code hear

        $users = customer::where('email', $req->email)->orWhere('phone_no', $req->email)->first();

        $email = $users->email;

        if (!$users) {
            # code...
            return response(["msg" => "Users Not Found", "code" => 404], 200);
        }

        $otp = rand(1000, 9999);

        $users->update([
            "otp" => $otp,
        ]);

        Mail::to($email)->send(new sendResetPasswordOtp($otp));

        return response([
            "msg" => "OTP Send Successfully",
            "send" => $email,
            "code" => 200,
        ], 200);
    }

    // check otp

    public function checkOtp(Request $req, customer $customer)
    {
        //Write function code hear

        $users = customer::where('email', $req->email)->orWhere('phone_no', $req->email)->first();

        if (!$users) {
            # code...
            return response(["msg" => "Users Not Found", "code" => 404], 200);
        }

        if ($users->otp == $req->otp) {
            # code...
            return response(["msg" => "OTP Match", "code" => 200], 200);
        }

        return response(["msg" => "OTP Not Match", "code" => 404], 200);
    }


    public function setPassword(Request $req, customer $customer)
    {
        //Write function code hear

        $users = customer::where('email', $req->email)->orWhere('phone_no', $req->email)->first();

        if (!$users) {
            # code . . .
            return response(["msg" => "Users Not Found", "code" => 404], 200);
        }

        $users->update([
            "password" => Hash::make($req->password),
        ]);

        return response([
            "msg" => "Password Change Successfully",
            "code" => 200,
        ], 200);
    }
}
