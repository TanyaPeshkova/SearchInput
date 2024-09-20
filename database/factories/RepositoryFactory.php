<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Repository;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Repository>
 */
class RepositoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Repository::class;


    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'owner' => $this->faker->name,
            'stargazers_count' => $this->faker->numberBetween(0, 1000),
            'watchers_count' => $this->faker->numberBetween(0, 1000),
            'html_url' => $this->faker->unique()->url,
        ];
    }
}
