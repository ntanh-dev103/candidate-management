<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Candidate>
 */
class CandidateFactory extends Factory
{
    protected $model = \App\Models\Candidate::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //fake()->name() → tên ngẫu nhiên.
            //safeEmail() → email hợp lệ.
            //numerify() → số điện thoại giả.
            //randomElement() → trạng thái ngẫu nhiên.
            'full_name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->numerify('09########'),
        'status' => fake()->randomElement([
            'Applied',
            'Interview',
            'Hired',
            'Rejected'
        ]),
        ];
    }
}
