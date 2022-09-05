<?php

namespace Database\Factories\Employees;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EmployeeModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'employee_image' => $this->faker->image('public/images/logo',400,300, 'icon3.png', true),
            'employee_name'=>$this->faker->name(),
            'employee_email'=>$this->faker->unique()->safeEmail(),
            'employee_phone'=>$this->faker->numerify('###-###-####'),
            'employee_status'=>rand(1,3),
        ];
    }
}
