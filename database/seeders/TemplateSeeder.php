<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Template;

class TemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Template::create(
            [
                'slug' => 'classic',
                'name' => 'Classic Dark', 
                'is_active' => true
            ],
        );

    }
}
