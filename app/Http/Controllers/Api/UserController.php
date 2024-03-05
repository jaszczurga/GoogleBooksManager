<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use function Laravel\Prompts\error;

class UserController extends Controller
{

    public function createUser(Request $request)
    {
        try {
            //Validated
            $validateUser = Validator::make($request->all(),
                [
                    'name' => 'required',
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required'
                ]);

            if($validateUser->fails()){

                return redirect('/register')->with('errors', $validateUser->errors());
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            $result =  response()->json([
                'status' => true,
                'message' => 'User Created Successfully',

            ], 200);

            return redirect('/')->with('result', $result);


        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function loginUser(Request $request)
    {
        try {
            $validateUser = Validator::make($request->all(),
                [
                    'email' => 'required|email',
                    'password' => 'required'
                ]);

            if($validateUser->fails()){
//                return response()->json([
//                    'status' => false,
//                    'message' => 'not correct email or password',
//                    'errors' => $validateUser->errors()
//                ], 401);
                return redirect('/login')->with('errors', $validateUser->errors());
            }

            if(!Auth::attempt($request->only(['email', 'password']))){
//                return response()->json([
//                    'status' => false,
//                    'message' => 'Email & Password does not match with our record.',
//                ], 401);
                $errors = ['Email or Password do not match our records.'];
                return redirect('/login')->withErrors($errors);
            }

            $user = User::where('email', $request->email)->first();
//            $user->createToken("TOKEN")->plainTextToken;

            $result =  response()->json([
                'status' => true,
                'message' => 'User Logged In Successfully',
              //  'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);
             return redirect('/')->with('result', $result);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    //logout method
    public function logout()
    {
        try {

            Auth::guard('web')->logout();

            $result =  response()->json([
                'status' => true,
                'message' => 'User Logged Out Successfully',
            ], 200);
            return redirect('/login')->with('result', $result);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

}
