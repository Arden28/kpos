<?php
namespace Modules\Pos\Database\factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Pos\Entities\Pos;
use Modules\Pos\Entities\PosSale;
use Modules\Sale\Entities\Sale;

class PosSaleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PosSale::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'pos_id' => function () {
                return Pos::inRandomOrder()->first()->id;
            },
            'sale_id' => function () {
                return Sale::inRandomOrder()->first()->id;
            },
            'company_id' => function () {
                return Company::inRandomOrder()->first()->id;
            },
        ];
    }
}

