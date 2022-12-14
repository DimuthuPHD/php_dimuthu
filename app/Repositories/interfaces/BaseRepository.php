<?php

namespace App\Repositories\interfaces;
use App\Models\Download;
use App\Models\Faq;
use App\Models\Unapproval;
use App\Models\UsefulLink;

/**
 * Class BaseRepository.
 */
class BaseRepository
{
    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->query()->get();
    }

    /**
     * @return mixed
     */
    public function getCount()
    {
        return $this->query()->count();
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function find($id)
    {
        return $this->query()->find($id);
    }

    public function findOrFail($id)
    {
        return $this->query()->findOrFail($id);
    }

    /**
     * @return mixed
     */
    public function query()
    {
        return call_user_func(static::MODEL.'::query');
    }
}
