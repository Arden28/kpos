<?php
namespace Modules\Product\Database\factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Product\Entities\Category;
use Modules\Product\Entities\Product;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'company_id' => function () {
                return Company::inRandomOrder()->first()->id;
            },
            'category_id' => function () {
                return Category::inRandomOrder()->first()->id;
            },
            'product_name' => $this->faker->words(3),
            'product_code' => $this->faker->unique()->numerify('#############'),
            'product_barcode_symbology' => $this->faker->randomElement(['UPC-A', 'EAN-13', 'Code 128']),
            'product_quantity' => $this->faker->numberBetween(50, 100),
            'product_cost' => $this->faker->numberBetween(10, 50),
            'product_price' => $this->faker->numberBetween(50, 100),
            'product_unit' => $this->faker->randomElement(['bouteilles(s)', 't-shirt(s)', 'sac(s)', 'ml']),
            'product_stock_alert' => $this->faker->numberBetween(10, 20),
            'product_order_tax' => $this->faker->numberBetween(1, 5),
            'product_tax_type' => $this->faker->randomElement([null, 1, 2, 3]),
            'product_note' => $this->faker->paragraph(2)
        ];
    }
}

