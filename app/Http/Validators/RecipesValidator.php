<?php namespace App\Http\Validators;

use App\Database\Models\recipe as Model;
use App\Schemes\RecipeSchema as Schema;
use Limoncello\Validation\Contracts\RuleInterface;

/**
 * @package App
 */
class RecipesValidator extends BaseValidator
{
    /**
     * @param array $json
     *
     * @return array
     */
    public function parseAndValidateOnCreate(array $json)
    {
        $schema         = $this->getJsonSchemes()->getSchemaByType(Schema::MODEL);
        $idRule         = $this->absentOrNull();
        $attributeRules = [
            Schema::ATTR_TITLE => $this->required($this->title()),
            Schema::ATTR_AUTHOR      => $this->required($this->title()),
            Schema::ATTR_TYPE_RECIPE => $this->required($this->title()),
            Schema::ATTR_IMAGE  => $this->required($this->isUrl()),
            Schema::ATTR_DESCRIPTION   => $this->required($this->text()),
        ];

        list (, $attrCaptures, $toManyCaptures) = $this->assert($schema, $json, $idRule, $attributeRules);

        return [$attrCaptures, $toManyCaptures];
    }

    /**
     * @param string|int $index
     * @param array      $json
     *
     * @return array
     */
    public function parseAndValidateOnUpdate($index, array $json)
    {
        $schema = $this->getJsonSchemes()->getSchemaByType(Schema::MODEL);
        $idRule = $this->idEquals($index);
        $attributeRules = [
            Schema::ATTR_TITLE => $this->required($this->name()),
        ];

        list (, $attrCaptures, $toManyCaptures) = $this->assert($schema, $json, $idRule, $attributeRules);

        return [$attrCaptures, $toManyCaptures];
    }

    /**
     * @return RuleInterface
     *
     * @SuppressWarnings(PHPMD.StaticAccess)
     */
    private function name()
    {
        return $this->andX(
            $this->textValue(Model::getAttributeLengths()[Model::FIELD_TITLE]),
            $this->isUnique(Model::TABLE_NAME, Model::FIELD_TITLE)
        );
    }

    /**
     * @return RuleInterface
     *
     * @SuppressWarnings(PHPMD.StaticAccess)
     */
    private function title()
    {
        return $this->textValue(Model::getAttributeLengths()[Model::FIELD_TITLE]);
    }

    /**
     * @return RuleInterface
     */
    private function text()
    {
        return $this->textValue();
    }
}
