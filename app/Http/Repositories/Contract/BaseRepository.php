<?php


namespace App\Http\Repositories\Contract;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceResponse;

abstract class BaseRepository implements Contract
{
    protected $resource;
    protected $collection;
    protected $model;

    public function index($page = 15) : Json
    {
        return new $this->collection($this->getModel()->paginate($page));
    }

    public function getModel() : Model
    {
        return new $this->model;
    }

    public function store(Request $request) : ResourceResponse
    {
        return new $this->resource($this->getModel()->create($request->validated()));
    }

    public function show(Model $model)
    {
        return new $this->resource($model);
    }

    public function update(Request $request,Model $model)
    {
        return new $this->resource($model->update($request->validated()));
    }

    public function destroy(Model $model)
    {
        return new $this->resource($model->delete());
    }
}
