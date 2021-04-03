<?php


namespace App\Repositories;


abstract class EloquentBaseRepository extends BaseRepository
{
    public function findBy(array $data, string $order = null, bool $takeOne = false)
    {
        $asd = $this->model->where($data);

        if ($order) {
            if ($order[0] === '-') {
                $order = substr($order, 1);
                $asd->orderByDesc($order);
            } else {
                $asd->orderBy($order);
            }
        }

        return ($takeOne) ? $asd->first() : $asd->get();
    }
}
