<?php namespace App\Api;

use App\Api\Traits\SoftDeletes;
use App\Authentication\Contracts\AccountManagerInterface;
use App\Database\Models\Recipe as Model;
use Doctrine\DBAL\Query\QueryBuilder;

/**
 * @package App
 */
class RecipesApi extends BaseApi
{
    use SoftDeletes;

    const MODEL = Model::class;
    
}
