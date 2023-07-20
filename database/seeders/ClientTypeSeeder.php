<?php

namespace Database\Seeders;

use App\Models\ClientType;
use Illuminate\Database\Seeder;

class ClientTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = ['Primary School', 'High School', 'HS School', 'College', 'University', 'Training Institute'];

        foreach ($types as $type) {
            ClientType::create(['type_name' => $type]);
        }
    }
}
