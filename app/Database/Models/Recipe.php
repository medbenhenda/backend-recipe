<?php namespace App\Database\Models;

use App\Database\Types\DateTimeType;
use Doctrine\DBAL\Types\Type;

/**
 * @package App
 */
class Recipe extends Model
{
    /** @inheritdoc */
    const TABLE_NAME = 'recipes';

    /** @inheritdoc */
    const FIELD_ID = 'id_recipe';

    /** Field name */
    const FIELD_TITLE = 'title';

    /** Field name */
    const FIELD_AUTHOR = 'author';

    /** Field name */
    const FIELD_TYPE_RECIPE = 'type_recipe';

    /** Field name */
    const FIELD_IMAGE = 'image';

    /** Field name */
    const FIELD_DESCRIPTION = 'description';

    /**
     * @inheritdoc
     */
    public static function getAttributeTypes()
    {
        return [
            self::FIELD_ID          => Type::INTEGER,
            self::FIELD_TYPE_RECIPE => Type::STRING,
            self::FIELD_AUTHOR      => Type::STRING,
            self::FIELD_TITLE       => Type::STRING,
            self::FIELD_IMAGE       => Type::STRING,
            self::FIELD_DESCRIPTION => Type::TEXT,
            self::FIELD_CREATED_AT  => DateTimeType::NAME,
            self::FIELD_UPDATED_AT  => DateTimeType::NAME,
            self::FIELD_DELETED_AT  => DateTimeType::NAME,
        ];
    }

    /**
     * @inheritdoc
     */
    public static function getAttributeLengths()
    {
        return [
            self::FIELD_TITLE => 255,
            self::FIELD_TYPE_RECIPE => 255,
            self::FIELD_AUTHOR => 255,
            self::FIELD_IMAGE => 255,
        ];
    }

    /**
     * @inheritdoc
     */
    public static function getRelationships()
    {
        return [];
    }
}
