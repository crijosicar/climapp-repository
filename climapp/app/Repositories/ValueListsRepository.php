<?php namespace App\Repositories;

use Bosnadev\Repositories\Contracts\RepositoryInterface;
use Bosnadev\Repositories\Eloquent\Repository;

class UserAccessesRepository extends Repository {

    public function model() {
        return 'App\ValueList';
    }
    
    
}
