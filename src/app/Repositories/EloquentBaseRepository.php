<?php


namespace App\Repositories;


abstract class EloquentBaseRepository extends BaseRepository
{
    public function all()
    {
        return $this->model->all();
    }

    public function findBy(array $data, string $order = null, bool $takeOne = false)
    {
        $query = $this->model->where($data);

        if ($order) {
            if ($order[0] === '-') {
                $order = substr($order, 1);
                $query->orderByDesc($order);
            } else {
                $query->orderBy($order);
            }
        }

        return ($takeOne) ? $query->first() : $query->get();
    }


    public function find(int $id)
    {
        return $this->model->find($id);
    }
}
