<?php

namespace App\Repositories\interfaces;

use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\DataTables;


class Repository implements RepositoryInterFace
{

    // model property on class instances
    protected $model;

    // Constructor to bind model to repo
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    // Get all instances of model
    public function all($field = 'id', $by = 'ASC')
    {
        return $this->model->orderBy($field, $by)->get();
    }

    // create a new record in the database
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    // update record in the database
    public function update(array $data, $id)
    {
        $record = $this->model->findOrFail($id);
        return $record->update($data);
    }

    // remove record from the database
    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    // show the record with the given id
    public function show($id)
    {
        return $this->model->findOrFail($id);
    }

    // Get the associated model
    public function getModel()
    {
        return $this->model;
    }

    // Set the associated model
    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    // Eager load database relationships
    public function with($relations)
    {
        return $this->model->with($relations);
    }


    // Get Filtered records
    public function filter(array $filters, $paginate = null, $orderBy = null)
    {
        $data =  $this->model->where($filters);

        if ($orderBy !== null && is_array($orderBy)) {
            $data = $data->orderBy($orderBy[0] , $orderBy[1]);
        }

        if ($paginate !== null) {
            $data = $data->paginate($paginate);
        }else{
            $data = $data->get();
        }

        return $data;
    }

    // Eager load database relationships
    public function BySlug($slug)
    {
        return $this->model->where('slug', $slug)->first();
    }

}
