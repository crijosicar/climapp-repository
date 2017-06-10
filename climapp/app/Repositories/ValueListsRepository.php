<?php namespace App\Repositories;

use Bosnadev\Repositories\Contracts\RepositoryInterface;
use Bosnadev\Repositories\Eloquent\Repository;
use Illuminate\Support\Facades\Input;
use App\ValueList;
use App\Common\Util;

class ValueListsRepository extends Repository {

    public function model() {
        return 'App\ValueList';
    }

    public function getValueListByCategory($category) {
        $util = new Util();
        $categoryUpper = $util->removeAccents($category);
        $MVlist = $this->findWhere([ 'category' => strtoupper($categoryUpper)]);
        return $MVlist;
    }
    
}
