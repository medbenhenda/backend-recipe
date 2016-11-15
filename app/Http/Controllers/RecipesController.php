<?php namespace App\Http\Controllers;

use App\Api\RecipesApi as Api;
use App\Http\Validators\RecipesValidator as Validator;
use App\Schemes\RecipeSchema as Schema;
use Interop\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * @package App
 */
class RecipesController extends BaseController
{
    /** @inheritdoc */
    const API_CLASS = Api::class;

    const SCHEMA_CLASS = Schema::class;

    /** @inheritdoc */
    const VALIDATOR_CLASS = Validator::class;


    /**
     * @inheritdoc
     */
    public static function parseInputOnCreate(
        ContainerInterface $container,
        ServerRequestInterface $request
    ) {
        $validator = static::getValidator($container);
        $json      = static::parseJson($container, $request);
        $captures  = $validator->parseAndValidateOnCreate($json);

        return $captures;
    }

    /**
     * @inheritdoc
     */
    public static function parseInputOnUpdate(
        $index,
        ContainerInterface $container,
        ServerRequestInterface $request
    ) {
        $validator = static::getValidator($container);
        $json      = static::parseJson($container, $request);
        $captures  = $validator->parseAndValidateOnUpdate($index, $json);

        return $captures;
    }

    /**
     * @param ContainerInterface $container
     *
     * @return Validator
     */
    protected static function getValidator(ContainerInterface $container)
    {
        return static::createValidatorFromClass(static::VALIDATOR_CLASS, $container);
    }
}
