<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\VoterAcctModel;
use Illuminate\Support\Str;

class VoterAcctModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = VoterAcctModel::class;
    public function definition()
    {
        return [
            'idNum' => $this->faker->numberBetween($min = 18100002, $max = 18199992),
            'fname' => $this->faker->firstNameMale(),
            'lname' => $this->faker->lastName(),
            'college' => $this->faker->company(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => Carbon::parse('2012-9-5 23:26:11.223', 'Asia/Singapore')->timezone->getName(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ];
    }
}
