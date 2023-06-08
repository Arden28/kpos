<?php
namespace Modules\Elearning\Database\factories\School;

use Illuminate\Database\Eloquent\Factories\Factory;

class ShoolFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Elearning\Entities\School\ShoolFactory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $companies = Company::pluck('id')->get();
        return [
            'company_id' => $companies,
            'name' => $this->faker->words(3, true),
            'short_name' => $this->faker->word(),
            'about' => $this->faker->sentences(3, true),
            'medium' => $this->faker->randomElement(['french', 'lingala', 'english']),
            'code' => 'KOV-'.date("y").'-'.mt_rand(100000000, 999999999),
            // 'code' => date("y").substr(number_format(time() * mt_rand(),0,'',''),0,6),
            'theme' => 'flatly',
        ];
    }
}

