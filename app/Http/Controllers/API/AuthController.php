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
    public function index() {
        $user = User::all();

        return response()->json([
            'status' => 'success',
            'data'  => $user
        ]);
    }

    public function show($id)
    {
        $user = User::find($id);

        if(!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User not found'
            ], 404); 
        }

        return response()->json([
            'status' => 'success',
            'data'  => $user
        ]);
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:100|min:3',
            'email' => 'required|email|string|max:100|unique:users',
            'password' => 'required|string|min:8',
            'image' => 'image',
            'level' => 'in:Admin,User'
        ];

        $data = $request->all();

        $validator = Validator::make($data, $rules);

        if($validator->fails()){
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()
            ], 400);     
        }

        $data['password'] = Hash::make($data['password']);

        if($request->file('image')) {
            $data['image'] = $request->file('image')->store('img-users');
        }

        $user = User::create($data);

        return response()->json([
            'status' => 'success',
            'data'  => $user
        ]);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'string|max:100|min:3',
            'email' => 'email|string|max:100|unique:users',
            'password' => 'string|min:8',
            'image' => 'image',
            'level' => 'in:Admin,User'
        ];

        $data = $request->all();

        $validator = Validator::make($data, $rules);


        if($validator->fails()){
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()
            ], 400);     
        }

        if($request->file('image')) {
            // if($request->oldImage) {
            //     Storage::delete($request->oldImage);
            // }
            $data['image'] = $request->file('image')->store('img-users');
        }

        $user = User::find($id);

        if(!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User not found'
            ], 404); 
        }

        $user->fill($data);
        $user->save();

        return response()->json([
            'status' => 'success',
            'data'  => $user
        ]);
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if(!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User not found'
            ], 404); 
        }

        $user->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'User deleted'
        ]);
    }
    

    public function register(Request $request)
    {
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

        return response()->json([
            'message' => 'success',
            'data' => $user
        ]);
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
