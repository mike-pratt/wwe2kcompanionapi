<?php

namespace App\Http\Controllers;

use App\Models\V0\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenBlacklistedException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\JWTAuth;

class AuthController extends Controller {


    /**
     * @var \Tymon\JWTAuth\JWTAuth
     */
    protected $jwt;

    public function __construct(JWTAuth $jwt) {
        $this->jwt = $jwt;
        $this->broker = 'users';
    }

    public function login(Request $request) {
        $this->validate($request, [
            'email'    => 'required|email|max:255',
            'password' => 'required', // min:8 (breaks as seed password is less than 8 characters)
        ]);

        try {
            if (! $token = $this->jwt->attempt($request->only('email', 'password'))) {
                return response()->json(['user_not_found'],Response::HTTP_NOT_FOUND);
            }
        } catch (TokenExpiredException $e) {
            return response()->json(['token_expired'], Response::HTTP_BAD_REQUEST);
        } catch (TokenInvalidException $e) {
            return response()->json(['token_invalid'], Response::HTTP_BAD_REQUEST);
        } catch (JWTException $e) {
            return response()->json(['token_absent' => $e->getMessage()],Response::HTTP_BAD_REQUEST);
        }
        return response()->json(compact('token'), Response::HTTP_OK);
    }


    public function refresh() {
        try {
            if (!$this->jwt->getToken()) {
                return response()->json(Response::HTTP_BAD_REQUEST, ['token_absent']);
            }

            if (! $token = $this->jwt->refresh()) {
                return response()->json(Response::HTTP_BAD_REQUEST, ['token_expired']);
            }
        } catch (TokenBlacklistedException $e) {
            return response()->json(Response::HTTP_BAD_REQUEST, ['token_blacklisted']);
        } catch (TokenExpiredException $e) {
            return response()->json(Response::HTTP_BAD_REQUEST, ['token_expired']);
        } catch (TokenInvalidException $e) {
            return response()->json(Response::HTTP_BAD_REQUEST, ['token_invalid']);
        } catch (JWTException $e) {
            return response()->json(Response::HTTP_BAD_REQUEST, ['token_absent' => $e->getMessage()]);
        }

        return response()->json(compact('token'), Response::HTTP_OK);
    }

    public function getCurrentUser()
    {
        return User::find(Auth::id());
    }
}