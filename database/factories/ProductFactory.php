<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class ProductFactory extends Factory
{

    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $product_name = $this->faker->unique()->words($nb=4,$asText=true);
        $slug = Str::slug($product_name);
        return [
            'name' => $product_name,
            'slug' => $slug,
            'short_description' => $this->faker->text(200),
            'description' => $this->faker->text(500),
            'normal_price' => $this->faker->numberBetween(10,20000),
            'sale_price' => $this->faker->numberBetween(10,2000),
            'SKU' => 'PND'.$this->faker->unique()->numberBetween(100,500),
            'stock_status' => 'instock',
            'quantity' =>$this->faker->numberBetween(100,200),
            'image' => 'digital_' . $this->faker->numberBetween(1,22).'.jpg',
            'category_id' => $this->faker->numberBetween(1,5),
            'subcategory_id' => $this->faker->numberBetween(1,5),
            'brand_id' => $this->faker->numberBetween(1,5),
            'shop_id' => $this->faker->numberBetween(1,5),


        ];
    }
}
