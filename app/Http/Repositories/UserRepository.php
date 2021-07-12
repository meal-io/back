<?php


namespace App\Http\Repositories;


use App\Http\Repositories\Contract\BaseRepository;
use App\Http\Resources\User\Collection;
use App\Http\Resources\User\Resource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserRepository extends BaseRepository
{
    protected $model = User::class;
    protected $collection = Collection::class;
    protected $resource = Resource::class;

    public function login(Request $request)
    {
        if(Auth::attempt($request->only('email','password'))) {
            $user = Auth::user();
            $token = $user->createToken(Auth::user()->name)->plainTextToken;

            return response()->json([
                'token' => $token,
                'user' => $user,
                'roles' => ['public',$user->roles()->first()->name]
            ],200);
        }

        return response()->json([
            'message' => 'Credenciais não existem em nosso banco de dados!!',
        ],401);
    }

    public function me()
    {
        return new $this->resource([
            'user' => Auth::user(),
            'roles' => ['public',Auth::user()->roles()->first()->name]
        ]);
    }
}
