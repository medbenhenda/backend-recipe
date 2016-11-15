<?php namespace App\Database\Migrations;

use App\Database\Models\Recipe as Model;

/**
 * @package App
 */
class RecipesMigration extends TableMigration
{
    /** @inheritdoc */
    const MODEL_CLASS = Model::class;

    /**
     * @inheritdoc
     */
    public function migrate()
    {
        $this->createTable([
            $this->primaryInt(Model::FIELD_ID),
            $this->string(Model::FIELD_TITLE),
            $this->string(Model::FIELD_AUTHOR),
            $this->string(Model::FIELD_TYPE_RECIPE),
            $this->string(Model::FIELD_IMAGE),
            $this->text(Model::FIELD_DESCRIPTION),
            $this->timestamps(),
        ]);
    }
}
