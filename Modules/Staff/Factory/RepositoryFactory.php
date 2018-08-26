<?php
/**
 * Created by PhpStorm.
 * User: leviet
 * Date: 25/08/2018
 * Time: 9:56 CH
 */

namespace Modules\Staff\Factory;


use Modules\Staff\Repository\CategoryRepository;
use Modules\Staff\Repository\NewRepository;

class RepositoryFactory
{
    /**
     * @return NewRepository
     */
    public static function newsRepository(){
        return app(NewRepository::class);
    }

    public static function categoryRepository(){
        return app(CategoryRepository::class);
    }
}