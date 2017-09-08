<?php namespace App\Http\Repositories;

interface PostsRepositoryInterface
{


    /**
     * Returns all the timesheets entries.
     *
     */
    public function findAll();

    /**
     * Returns a timesheets entry by its primary key.
     *
     * @param  int $id
     */
    public function find($id);

    /**
     * Determines if the given timesheets is valid for creation.
     *
     * @param  array $data
     * @return \Illuminate\Support\MessageBag
     */
    public function validForCreation(array $data);

    /**
     * Determines if the given timesheets is valid for update.
     *
     * @param  int $id
     * @param  array $data
     * @return \Illuminate\Support\MessageBag
     */
    public function validForUpdate($id, array $data);

    /**
     * Creates or updates the given timesheets.
     *
     * @param  int $id
     * @param  array $input
     * @return bool|array
     */
    public function store($id, array $input);

    /**
     * Creates a timesheets entry with the given data.
     *
     * @param  array $data
     */
    public function create(array $data);

    /**
     * Updates the timesheets entry with the given data.
     *
     * @param  int $id
     * @param  array $data
     */
    public function update($id, array $data);


    /**
     * Deletes the timesheets entry.
     *
     * @param  int $id
     * @return bool
     */
    public function delete($id);


}
