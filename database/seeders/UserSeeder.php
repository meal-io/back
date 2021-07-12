<?php

namespace Database\Seeders;

use App\Http\Controllers\Repositories\UserRepository;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    protected $repository;
    public function __construct(UserRepository $userRepository)
    {
        $this->repository = $userRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->repository->getModel()->create([
            'name' => 'Lucas Antonio',
            'email' => 'lucas@email.com',
            'password' => 123
        ]);
    }
}
