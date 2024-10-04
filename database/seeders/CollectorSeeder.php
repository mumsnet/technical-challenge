<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Collector;
use Illuminate\Database\Seeder;

final class CollectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Collector::factory(50)->create();
    }
}
