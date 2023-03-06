<?php
namespace Modules\Inventory\Database\factories;

use App\Models\Company;
use Modules\Inventory\Entities\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

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
            'category_code' => $this->faker->unique()->regexify('[A-Za-z0-9]{10}'),
            'category_name' => $this->faker->word,
        ];
    }
}

