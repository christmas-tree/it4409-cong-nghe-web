<?php

namespace App\Http\Controllers;

use App\Enums\Roles;
use App\Enums\UserStatus;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Resources\User as UserResource;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth.jwt', 'active'], ['except' => ['login', 'register']]);
    }

    /**
     * register new user.
     *
     * @return UserResource
     */
    public function register()
    {
        $validator = Validator::make(request()->all(), [
            'name' => ['required', 'max:75', 'string'],
            'email' => ['required', 'email', 'unique:users'],
            'address' => ['string', 'max:255'],
            'phone_number' => ['numeric', 'unique:users'],
            'password' => ['required', 'min:6'],
        ]);

        if ($validator->fails()) {
            return response()->json([$validator->errors()]);
        }

        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'address' => request('address'),
            'role' => Roles::User,
            'password' => Hash::make(request('password')),
            'status' => UserStatus::ACTIVE,
        ]);

        return new UserResource($user);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $validator = Validator::make(request()->all(), [
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6'],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        if (User::where('email', request()->get('email'))->where('status', UserStatus::LOCKED)->exists()) {
            return response()->json(['error' => 'locked'], 401);
        }

        $credentials = request(['email', 'password']);

        if (! $token = JWTAuth::attempt($credentials)) {
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
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        JWTAuth::invalidate();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(JWTAuth::refresh());
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
            'accessToken' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
            'id' => Auth::id(),
            'username' => Auth::user()->name,
            'email' => Auth::user()->email,
            'roles' => Auth::user()->role,
            'status' => Auth::user()->status,
        ]);
    }

    public function changePassword()
    {
        $validator = Validator::make(request()->all(), [
            'password' => ['required', 'min:6'],
            'new_password' => ['required', 'min:6', 'different:password'],
        ]);

        if ($validator->fails()) {
            return response()->json([$validator->errors()]);
        }

        if (! Hash::check(request()->get('password'), Auth::user()->getAuthPassword())) {
            return response()->json(['error' => 'password not match'], 401);
        } else {
            Auth::user()->update([
                'password' => bcrypt(request()->get('new_password')),
            ]);

            return response()->json(['success' => 'updated password']);
        }
    }
}
