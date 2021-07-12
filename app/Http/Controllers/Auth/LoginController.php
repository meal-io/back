<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Repositories\UserRepository;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    protected $repository;

    public function __construct(UserRepository $repository)
    {
        $this->middleware('auth:sanctum')->except('login');

        $this->repository = $repository;
    }

    public function login(Request $request)
    {
        return $this->repository->login($request);
    }

    public function me()
    {
        return $this->repository->me();
    }
}
