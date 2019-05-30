<?php

namespace Kenini\Repository\Contracts;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

/**
 * Interface BaseRepositoryInterface
 *
 * @package App\Repositories
 */
interface RepositoryInterface
{
    /**
     * Find all records that match a given conditions
     *
     * @param array $conditions
     *
     * @return Model[]
     */
    public function find(array $conditions = []);

    /**
     * Find a specific record that matches a given conditions
     *
     * @param array $conditions
     *
     * @return Model
     */
    public function findOne(array $conditions);

    /**
     * Find a specific record by its ID
     *
     * @param int $id
     *
     * @return Model
     */
    public function findById(int $id);

    /**
     * Create a record
     *
     * @param array $attributes
     *
     * @return Model
     */
    public function create(array $attributes);

    /**
     * Update a record
     *
     * @param Model $model
     * @param array $attributes
     *
     * @return bool
     */
    public function update(Model $model, array $attributes = []);

    /**
     * Save a given record
     *
     * @param Model $model
     *
     * @return boolean
     */
    public function save(Model $model);

    /**
     * Delete the record from the database.
     *
     * @param Model $model
     *
     * @return bool
     *
     * @throws Exception
     */
    public function delete(Model $model);

    /**
     * get records from query.
     *
     * @param $query
     *
     * @return collection
     *
     * @throws Exception
     */
    public function get($query);

    /**
     * Delete array record from the database.
     *
     * @param array $ids
     *
     * @return bool
     *
     * @throws Exception
     */
    public function destroy(array $ids);

    /**
     * Find amount record that matches a given conditions
     *
     * @param  array $conditions
     *
     * @return void
     *
     * @throws Exception
     */
    public function findCount(array $conditions);

    /**
     * get base from query.
     *
     * @param $query
     *
     * @return query builder
     *
     * @throws Exception
     */
    public function toBase($query);

    /**
     * update multiple record
     *
     * @param Builder $query, array $attributes
     *
     * @return boolean
     *
     * @throws Exception
     */
    public function updateMultiple(Builder $query, array $attributes = []);

    /**
     * create new record or update existing record
     *
     * @param  array $attributes
     *
     * @return void
     *
     * @throws Exception
     */
    public function updateOrCreate(array $attributes, array $values);

    /**
     * Find all existing record
     *
     * @return Model
     */
    public function findAll();

    /**
     * Find  record by list of id
     *
     * @param  array $ids
     *
     * @return Model
     */
    public function findByIds(array $ids);

    /**
     * Get Model
     *
     * @return Model
     */
    public function model();

    /**
     * Make new Model
     *
     * @return Model
     */
    public function makeModel();
    
    /**
     * Reset model query
     *
     * @return void
     */
    public function resetModel();

}
