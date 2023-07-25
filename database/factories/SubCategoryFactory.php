<?php

namespace Database\Factories;

use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class SubCategoryFactory extends Factory
{

    protected $model = SubCategory::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $sub_category_name = $this->faker->unique()->words($nb=2,$asText=true);
        $slug = Str::slug($sub_category_name);
        return [
            'name' => $sub_category_name,
            'slug' => $slug,
            'category_id' => $this->faker->numberBetween(1,5),

        ];
    }
}
