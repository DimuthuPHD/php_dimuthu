<?php

namespace App\Repositories;

use App\Models\Representative;
use App\Repositories\interfaces\Repository;


class RepresentativeRepository extends Repository
{

    public function __construct()
    {
        $this->model = new Representative();
    }

}
