<?php namespace App\Database\Seeds\Testing;

use App\Database\Models\Recipe as Model;
use App\Database\Seeds\Seeder;

/**
 * @package App
 */
class RecipesSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        $curDateTime = $this->getCurrentDateTime();

        $faker  = $this->getFaker();
        $this->seedTable(100, Model::TABLE_NAME, function () use ($faker, $curDateTime) {
            return [
                Model::FIELD_TITLE       => $faker->text(50),
                Model::FIELD_AUTHOR      => $faker->name,
                Model::FIELD_TYPE_RECIPE => $faker->colorName,
                Model::FIELD_IMAGE       => $faker->imageUrl(),
                Model::FIELD_DESCRIPTION => $faker->text(),
                Model::FIELD_CREATED_AT  => $curDateTime,
            ];
        });
    }
}
