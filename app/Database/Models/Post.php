<?php namespace App\Database\Models;

use App\Database\Types\DateTimeType;
use Doctrine\DBAL\Types\Type;
use Limoncello\JsonApi\Models\RelationshipTypes;

/**
 * @package App
 */
class Post extends Model
{
    /** @inheritdoc */
    const TABLE_NAME = 'posts';

    /** @inheritdoc */
    const FIELD_ID = 'id_post';

    /** Field name */
    const FIELD_ID_BOARD = Board::FIELD_ID;

    /** Field name */
    const FIELD_ID_USER = User::FIELD_ID;

    /** Relationship name */
    const REL_BOARD = 'board';

    /** Relationship name */
    const REL_USER = 'user';

    /** Relationship name */
    const REL_COMMENTS = 'comments';

    /** Field name */
    const FIELD_TITLE = 'title';

    /** Field name */
    const FIELD_TEXT = 'text';

    /**
     * @inheritdoc
     */
    public static function getAttributeTypes()
    {
        return [
            self::FIELD_ID         => Type::INTEGER,
            self::FIELD_ID_BOARD   => Type::INTEGER,
            self::FIELD_ID_USER    => Type::INTEGER,
            self::FIELD_TITLE      => Type::STRING,
            self::FIELD_TEXT       => Type::TEXT,
            self::FIELD_CREATED_AT => DateTimeType::NAME,
            self::FIELD_UPDATED_AT => DateTimeType::NAME,
            self::FIELD_DELETED_AT => DateTimeType::NAME,
        ];
    }

    /**
     * @inheritdoc
     */
    public static function getAttributeLengths()
    {
        return [
            self::FIELD_TITLE => 255,
        ];
    }

    /**
     * @inheritdoc
     */
    public static function getRelationships()
    {
        return [
            RelationshipTypes::BELONGS_TO => [
                self::REL_BOARD => [Board::class, self::FIELD_ID_BOARD, Board::REL_POSTS],
                self::REL_USER  => [User::class, self::FIELD_ID_USER, User::REL_POSTS],
            ],
            RelationshipTypes::HAS_MANY   => [
                self::REL_COMMENTS => [Comment::class, Comment::FIELD_ID_POST, Comment::REL_POST],
            ],
        ];
    }
}
