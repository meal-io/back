<?php


namespace App\Http\Repositories\Contract;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

interface Contract
{
    public function index($page = 15);

    public function store(Request $request);

    public function show(Model $model);

    public function update(Request $request,Model $model);

    public function destroy(Model $model);
}
