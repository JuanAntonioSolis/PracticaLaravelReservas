<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reservas')->insert(['fecha' => "2025-11-29", 'hora' => '09:00', 'numPersonas' => 2,
            'estado' => 'pendiente', 'sala_id' => 2, 'user_id' => 1, 'created_at' => now(), 'updated_at' => now()]);
        DB::table('reservas')->insert(['fecha' => "2025-12-1", 'hora' => '10:00', 'numPersonas' => 5,
            'estado' => 'pendiente', 'sala_id' => 5, 'user_id' => 2, 'created_at' => now(), 'updated_at' => now()]);

    }
}
