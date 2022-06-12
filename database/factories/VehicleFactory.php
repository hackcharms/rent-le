<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'model'=>$this->faker->bothify('??-######'),
            'number'=>$this->faker->bothify('UP-## ?-####'),
            'image'=>$this->faker->imageUrl(480,480,'car',true,'car'),
            'seating_capacity'=>$this->faker->randomDigitNotZero(),
            'available'=>$this->faker->boolean(50),
            'rent_per_day'=>$this->faker->randomFloat(2,1,10000),
        ];
    }
}
