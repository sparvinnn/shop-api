<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    //this method adds new users
    public function createAccount(Request $request)
    {
        
        $validator  =   Validator::make($request->all(), [
            'mobile' => 'required|min:10',
            'password' => 'required|min:6',
            // 'role_id' => 'required'
        ]);
        if($validator->fails()) {
            return response()->json(["status" => "failed", "validation_errors" => $validator->errors()]);
        }
        if ($request->username){
            $validator = Validator::make($request->all(), [
                'username' => 'min:6',
            ]);
        }
        if($validator->fails()) {
            return response()->json(["status" => "failed", "validation_errors" => $validator->errors()]);
        }
        if ($request->national_code){
            $validator = Validator::make($request->all(), [
                'national_code' => 'min:10|max:10',
            ]);
        }
        if($validator->fails()) {
            return response()->json(["status" => "failed", "validation_errors" => $validator->errors()]);
        }
        if ($request->email){
            $validator = Validator::make($request->all(), [
                'email' => 'email',
            ]);
        }
        if($validator->fails()) {
            return response()->json(["status" => "failed", "validation_errors" => $validator->errors()]);
        }
        try{
            $inputs = $request->all();
            $inputs["password"] = Hash::make($request->password);
            $user   =   User::where('mobile', $request->mobile)->first();
            if($user) return response()->json(["status" => "duplicate mobile", "message" => "Registration failed!"]);
            $user   =   User::create([
                'f_name' => $request->f_name,
                'l_name' => $request->l_name,
                'national_code' => $request->national_code,
                'username' => $request->username,
                'mobile' => $request->mobile,
                'mobile_verified_at' => Carbon::now(),
                'county' => $request->county,
                'city' => $request->city,
                'address' => $request->address,
                'postal_code' => $request->postal_code,
                'email'  => $request->email,
                'status' => 'active',
                'password' => $inputs["password"],
                // 'role_id' => $request->role_id,
                'branch_id' => $request->branch_id,

            ]);

            // $user->assignRole($request->role);
            // return $user;
            if(!is_null($user)) {
                return response()->json([
                    'token' => $user->createToken('tokens')->plainTextToken
                ], 201);
            }
            else {
                return response()->json(["status" => "failed", "message" => "Registration failed!"]);
            }
        }catch (\Exception $exception){
            return response()->json(["status" => "failed", "message" => $exception]);
        }

        
    }
    //use this method to signin users
    public function signin(Request $request)
    {
        $attr = $request->validate([
            'mobile' => 'required|string',
            'password' => 'required|string|min:6'
        ]);

        if (!Auth::attempt($attr)) {
            return response()->json([
                'msg' => 'Credentials not match',
            ], 401);
        }

        return response()->json([
            'token' => auth()->user()->createToken('API Token')->plainTextToken
        ], 200);
    }

    // this method signs out users by removing tokens
    public function signout()
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Tokens Revoked'
        ];
    }

    public function me(){
        $user       =       Auth::user();
        if(!is_null($user)) {
            $data = [
                'id' => $user->id,
                'f_name' => $user->f_name ?? null,
                'l_name' => $user->l_name ?? null,
                'username' => $user->username ?? "",
                'avatar' => $user->avatar,
                'mobile' => isset($user->mobile) ? $user->mobile : null,
                'email' => $user->email ?? null,
                'isMobileVerified' => $user->mobile_verified_at? true: false,
                'roles' => $user->getRoleNames()
            ];
            return $data;
        }

        else {
            return response()->json(["status" => "failed", "message" => "Whoops! no user found"]);
        }
    }
}
