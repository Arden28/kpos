<?php
namespace Modules\Pos\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Pos\Entities\Pos::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker()->name(),
            'company_id' => 1,
        ];
    }
}

