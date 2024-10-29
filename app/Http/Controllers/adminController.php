<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin', ['except' => ['login']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth('admin')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth('admin')->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth('admin')->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('admin')->factory()->getTTL() * 60
        ]);
    }

    public function index()
    {
      $users= User::all();
      return response()->json(['data'=>$users]);
    }

    public function store(Request $request)
    {
        $input= $request->validate([
            'name'=>['required'],
            'email'=>['required','email'],
            'password'=>['required']
        ]);
        User::create($input);
        return response()->json(['message'=>'creating user successfully']);
    }

    public function show(string $id)
    {
      $user= User::findOrFail($id);
      return response()->json(['data'=>$user]);
    }

    public function update(Request $request,string $id)
    {
        $input= $request->validate([
            'name'=>['required'],
            'email'=>['required','email'],
            'password'=>['required']
        ]);
        $user=User::findOrFail($id);
        $user->update($input);
        return response()->json(['message'=>'updating user successfully']);
    }

    public function destroy(string $id)
    {
        $user=User::findOrFail($id);
        $user->delete();
        return response()->json(['message'=>'deleting user successfully']);
    }


}
