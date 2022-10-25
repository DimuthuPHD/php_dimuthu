<?php

namespace App\Repositories;

use App\Models\Route;
use App\Repositories\interfaces\Repository;


class RouteRepository extends Repository
{

    public function __construct()
    {
        $this->model = new Route();
    }

    public function activeRoutes(){
        try {
            return $this->model->where('status', 1)->get();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
