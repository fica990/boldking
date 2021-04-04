<?php


namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;
use RuntimeException;

abstract class BaseRepository
{
    /**
     * @var Model
     */
    protected $model;

    public function __construct()
    {
        $this->model = $this->buildModel();
    }

    public function buildModel(): Model
    {
        $model = $this->getModelResource();

        if (!class_exists($model))
            throw new RuntimeException("Model: {$model} is not defined in repository");

        return new $model;
    }


    protected abstract function getModelResource(): string;
}
