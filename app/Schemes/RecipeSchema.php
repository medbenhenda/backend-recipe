<?php namespace App\Schemes;

use App\Database\Models\Recipe as Model;

/**
 * @package App
 */
class RecipeSchema extends BaseSchema
{
    /** Type */
    const TYPE = 'recipes';

    /** Model class name */
    const MODEL = Model::class;

    /** Attribute name */
    const ATTR_TITLE = 'title';

    /** Attribute name */
    const ATTR_AUTHOR = 'author';

    /** Attribute name */
    const ATTR_TYPE_RECIPE = 'type_recipe';

    /** Attribute name */
    const ATTR_IMAGE = 'image';

    /** Attribute name */
    const ATTR_DESCRIPTION = 'description';

    /**
     * @inheritdoc
     */
    public static function getMappings()
    {
        return [
            self::SCHEMA_ATTRIBUTES => [
                self::ATTR_TITLE      => Model::FIELD_TITLE,
                self::ATTR_AUTHOR      => Model::FIELD_AUTHOR,
                self::ATTR_TYPE_RECIPE      => Model::FIELD_TYPE_RECIPE,
                self::ATTR_IMAGE      => Model::FIELD_IMAGE,
                self::ATTR_DESCRIPTION      => Model::FIELD_DESCRIPTION,
                self::ATTR_CREATED_AT => Model::FIELD_CREATED_AT,
                self::ATTR_UPDATED_AT => Model::FIELD_UPDATED_AT,
            ],
            /*self::SCHEMA_RELATIONSHIPS => [
                self::REL_POSTS => Model::REL_POSTS,
            ],*/
        ];
    }
}
