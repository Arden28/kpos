<?php
namespace Modules\Adjustment\Database\factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdjustmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Adjustment\Entities\Adjustment::class;

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
            'date' => $this->faker->date(),
            'reference' => $this->faker->unique()->numerify('####'),
            'note' => $this->faker->text(50),
    
        ];
    }
}

