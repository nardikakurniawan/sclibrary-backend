<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function getUsers() {
        $user = User::all();

        return response()->json(['user' => $user], 200);
    }

    public function userInfo() {
        $user = auth()->user();

        return response()->json(['user' => $user], 200);
    }

    public function register(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'name' => 'required|string|max:100|min:3',
            'email' => 'required|email|string|max:100|unique:users',
            'password' => 'required|string|min:8',
            'image' => 'image',
            'level' => 'in:Admin,User'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        // Cek image kosong atau tidak
        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('images');
        }

        $user = User::create($validatedData);

        $token = $user->createToken('auth-sanctum')->plainTextToken;

        return response()->json([
            'message' => 'success',
            'data' => $user,
            'access_token' => $token,
            'token_type' => 'Bearer'
        ]);
    }

    public function update(Request $request) {
        // dd($request);
        // $input = $request->all();
        // $validator = Validator::make($input, [
        //     'name' => 'string|max:100|min:3',
        //     'email' => 'email|string|max:100|unique:users',
        //     'password' => 'string|min:8',
        //     'image' => 'image',
        //     'level' => 'in:Admin,User'
        // ]);

        $validatedData = $request->validate([
            'name' => 'string|max:100|min:3',
            'email' => 'email|string|max:100|unique:users',
            'password' => 'string|min:8',
            'image' => 'image',
            'level' => 'in:Admin,User'
        ]);

        dd($validatedData['name']);

        // $rules = [
        //     'name' => 'string|max:100|min:3',
        //     'email' => 'email|string|max:100|unique:users',
        //     'password' => 'string|min:8',
        //     'image' => 'image',
        //     'level' => 'in:Admin,User'
        // ];

        // $data = $request->all();

        // $validator = Validator::make($data, $rules);

        // if($validator->fails()){
        //     // return $this->sendError('Validation Error.', $validator->errors());  
        //     return response()->json([
        //                 'status' => 'error',
        //                 'message' => $validator->errors()
        //             ], 400);     
        // }

        // $user->name = $input['name'];
        // $user->email = $input['email'];
        // $user->password = $input['password'];
        // $user->image = $input['image'];
        // $user->level = $input['level'];
        // $user->update([
        //     'name' => $input['name'],
        // ]);
        
        // return response()->json([
        //     "message" => "User updated successfully.",
        //     "data" => $user
        // ]);


        // $rules = [
        //     'name' => 'string|max:100|min:3',
        //     'email' => 'email|string|max:100|unique:users',
        //     'password' => 'string|min:8',
        //     'image' => 'image',
        //     'level' => 'in:Admin,User'
        // ];

        // $data = $request->all();

        // $validatedData = $request->Validate($rules);
        // $validator = Validator::make($data, $rules);

        // if(!$validatedData->fails()) {
        //     return response()->json([
        //         'status' => 'error',
        //         'message' => $validator->errors()
        //     ], 400);
        // }

        // $user = User::find($id);

        // if(!$user) {
        //     return response()->json([
        //         'status' => 'error',
        //         'message' => 'User Not Found'
        //     ], 404);
        // }

        // // $user->fill($data);
        // $user->save();

        // return response()->json([
        //     'status' => 'success',
        //     'data'  => $user
        // ]);
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email|string|max:100',
            'password' => 'required|string|min:8'
        ]);

        if (!Auth::attempt($request->only('email', 'password')))
        {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $user = User::where('email', $request->email)->firstOrFail();

        $token = $user->createToken('auth-sanctum')->plainTextToken;

        return response()->json([
            'data' => $user,
            'access_token' => $token,
            'token_type' => 'Bearer'
        ]);
    }

    public function logout(Request $request){
        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'Logout Success'
        ]);
    }
}
