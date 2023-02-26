<?php
namespace Modules\Sale\Database\factories;

use App\Models\Common\Company;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Sale\Entities\Sale;

class SaleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Sale::class;

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
            }, // Replace with your own logic for generating company_id

            'date' => $this->faker->date,
            'reference' => $this->faker->unique()->text(10),
            'customer_id' => rand(1, 10), // Replace with your own logic for generating customer_id
            'customer_name' => $this->faker->name,
            'tax_percentage' => $this->faker->numberBetween(0, 100),
            'tax_amount' => $this->faker->numberBetween(0, 10000),
            'discount_percentage' => $this->faker->numberBetween(0, 100),
            'discount_amount' => $this->faker->numberBetween(0, 10000),
            'shipping_amount' => $this->faker->numberBetween(0, 10000),
            'total_amount' => $this->faker->numberBetween(0, 100000),
            'paid_amount' => $this->faker->numberBetween(0, 100000),
            'due_amount' => $this->faker->numberBetween(0, 100000),
            'status' => $this->faker->randomElement(['draft', 'completed', 'cancelled']),
            'payment_status' => $this->faker->randomElement(['paid', 'unpaid', 'partially_paid']),
            'payment_method' => $this->faker->randomElement(['cash', 'credit_card', 'paypal']),
            'note' => $this->faker->optional()->text(100),
        ];
    }
}

