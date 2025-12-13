<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('salas')->insert(['capacidad' => 10, 'tipo' => "reunion",'nombre' => 'Reuniones1', 'equipamiento' => 'Wifi, Proyector']);
        DB::table('salas')->insert(['capacidad' => 5, 'tipo' => "coworking",'nombre' => 'Coworking1', 'equipamiento' => 'Router, Impresora']);
        DB::table('salas')->insert(['capacidad' => 15, 'tipo' => "presentacion",'nombre' => 'Presentacion1', 'equipamiento' => 'Pizarra electronica']);
        DB::table('salas')->insert(['capacidad' => 12, 'tipo' => "reunion",'nombre' => 'Reuniones2', 'equipamiento' => 'Wifi, Radio, Alexa']);
        DB::table('salas')->insert(['capacidad' => 11, 'tipo' => "coworking",'nombre' => 'Coworking2', 'equipamiento' => 'Router, Impresora,Mesa redonda']);
        DB::table('salas')->insert(['capacidad' => 20, 'tipo' => "presentacion",'nombre' => 'Presentacion2', 'equipamiento' => 'Router, Impresora']);


    }
}
