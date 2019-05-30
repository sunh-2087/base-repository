<?php

namespace Kenini\Repository;

use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;
use Kenini\Repository\Contracts\RepositoryInterface;
use Illuminate\Database\Query\Builder;

/**
 * Class AbstractRepository
 *
 * @package Kenini\Repository
 */
class AbstractRepository implements RepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * AbstractRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @inheritdoc
     */
    public function find(array $conditions = [])
    {
        return $this->model->where($conditions)->get();
    }

    /**
     * @inheritdoc
     */
    public function findOne(array $conditions)
    {
        return $this->model->where($conditions)->first();
    }

    /**
     * @inheritdoc
     */
    public function findById(int $id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * @inheritdoc
     */
    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    /**
     * @inheritdoc
     */
    public function update(Model $model, array $attributes = [])
    {
        return $model->update($attributes);
    }

    /**
     * @inheritdoc
     */
    public function save(Model $model)
    {
        return $model->save();
    }

    /**
     * @inheritdoc
     */
    public function delete(Model $model)
    {
        return $model->delete();
    }

    /**
     * @inheritdoc
     */
    public function get($query)
    {
        return $query->get();
    }

    /**
     * @inheritdoc
     */
    public function destroy(array $ids)
    {
        return $this->model->destroy($ids);
    }

    /**
     * @inheritdoc
     */
    public function findCount(array $conditions)
    {
        return $this->model->where($conditions)->count();
    }

    /**
     * @inheritdoc
     */
    public function toBase($query)
    {
        return $query->toBase();
    }

    /**
     * @inheritdoc
     */
    public function updateMultiple(Builder $query, array $attributes = [])
    {
        return $query->update($attributes);
    }

    /**
     * @inheritdoc
     */
    public function updateOrCreate(array $attributes, array $values)
    {
        return $this->model->updateOrCreate($attributes, $values);
    }

    /**
     * @inheritdoc
     */
    public function findAll($columns = ['*'])
    {
        return $this->model->all($columns);
    }

    /**
     * @inheritdoc
     */
    public function findByIds(array $ids, $columns = ['*'])
    {
        return $this->model->whereIn('id', $ids)->get($columns);
    }

    /**
     * @inheritdoc
     */
    public function model()
    {
        return get_class($this->model);
    }

    /**
     * @inheritdoc
     */
    public function makeModel()
    {
        $this->model = App::make($this->model());

        return $this->model;
    }

    /**
     * @inheritdoc
     */
    public function resetModel()
    {
        return $this->makeModel();
    }
}
