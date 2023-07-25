<?php

namespace Database\Factories;

use App\Models\Shop;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class ShopFactory extends Factory
{

    protected $model = Shop::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $shop_name = $this->faker->unique()->words($nb=2,$asText=true);
        $slug = Str::slug($shop_name);
        return [
            'shopname' => $shop_name,
            'slug' => $slug,
            'user_id' => $this->faker->numberBetween(1,5),

        ];
    }
}
