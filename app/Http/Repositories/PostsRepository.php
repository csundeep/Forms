<?php 

namespace App\Http\Repositories;

use App\post;
use Illuminate\Container\Container;

class PostsRepository implements PostsRepositoryInterface
{


    /**
     * The Data handler.
     *
     */
    protected $data;

    /**
     * The Eloquent timesheets model.
     *
     * @var string
     */
    protected $model;

    /**
     * Constructor.
     *
     * @param  \Illuminate\Container\Container $app
     * @return void
     */
    public function __construct(Container $app)
    {

    }

    public function createModel()
    {
        return new post();
    }


    /**
     * {@inheritDoc}
     */
    public function findAll()
    {
        return $this->createModel()->get();
    }

    /**
     * {@inheritDoc}
     */
    public function find($id)
    {
        return $this->createModel()->find($id);
    }

    /**
     * {@inheritDoc}
     */
    public function validForCreation(array $input)
    {
        // return $this->validator->on('create')->validate($input);
        return null;
    }

    /**
     * {@inheritDoc}
     */
    public function validForUpdate($id, array $input)
    {
//        return $this->validator->on('update')->validate($input);
        return null;
    }

    /**
     * {@inheritDoc}
     */
    public function store($id, array $input)
    {
        return !$id ? $this->create($input) : $this->update($id, $input);
    }

    /**
     * {@inheritDoc}
     */
    public function create(array $input)
    {
        $leave = $this->createModel();
        $leave->fill($input)->save();
        return $leave;
    }

    /**
     * {@inheritDoc}
     */
    public function update($id, array $input)
    {
        $leave = $this->find($id);
        $leave->fill($input)->save();
        return $leave;
    }


    public function delete($id)
    {
        // Check if the leave exists
        if ($leave = $this->find($id)) {
            // Delete the leave entry
            $leave->forceDelete();
            return true;
        }
        return false;
    }


}
