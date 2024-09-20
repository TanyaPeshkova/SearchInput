<?php

namespace Database\Seeders;

use App\Models\Repository;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RepositoriesTableSeeder extends Seeder
{

    public function run(): void
    {
        Repository::factory()->count(10)->create();
    }
}
