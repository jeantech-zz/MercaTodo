<?php 
namespace App\Repositories\User;

use App\Models\User;

class UserRepositories{

    private $model;

    public function __construct()
    {
        $this->model = new User;

    }

    public function userPaginate()
    {
       return $this->model->paginate();
    }

    public function userId($id)
    {
        return  $this->model->find($id);
    }

}