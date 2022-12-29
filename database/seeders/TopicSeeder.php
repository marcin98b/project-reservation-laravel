<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('topics')->insert([
            [
                'title' => "Serwis aukcyjny",
                'description' => "Prosta aplikacja aukcyjna umożliwiająca wymianę towarów między użytkownikami.",
                'technologies' => "dowolne (WEB)",
                'difficulty' => "średnia",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'title' => "Edytor tekstu",
                'description' => "Aplikacja umożliwiająca tworzenie, edytowanie i zapisywanie dokumentów tekstowych.",
                'technologies' => "C#",
                'difficulty' => "łatwa",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'title' => "Prosta gra komputerowa",
                'description' => "Prosta gra komputerowa z wybranym przez studenta motywem lub mechanikami rozgrywki.",
                'technologies' => "Unity 3D",
                'difficulty' => "trudna",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],    
            
            [
                'title' => "Aplikacja do tworzenia notatek",
                'description' => "Aplikacja umożliwiająca tworzenie i przechowywanie notatek oraz ich organizację za pomocą tagów i kategorii.",
                'technologies' => "dowolne (WEB)",
                'difficulty' => "łatwa",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],   

            [
                'title' => "Prosty klient poczty elektronicznej",
                'description' => "Aplikacja umożliwiająca przeglądanie i wysyłanie poczty elektronicznej z wybranego konta pocztowego.",
                'technologies' => "dowolne (desktop)",
                'difficulty' => "trudna",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],   

            [
                'title' => "Aplikacja do tworzenia listy zakupów",
                'description' => "Aplikacja umożliwiająca tworzenie i edytowanie listy produktów do kupienia oraz oznaczanie tych, które już zostały zakupione.",
                'technologies' => "dowolne (WEB)",
                'difficulty' => "średnia",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],   

            [
                'title' => "Aplikacja do tworzenia harmonogramu",
                'description' => "Aplikacja umożliwiająca tworzenie i edytowanie harmonogramu zajęć lub wydarzeń, a także ich przypominanie o nadchodzących wydarzeniach.",
                'technologies' => "dowolne (WEB)",
                'difficulty' => "średnia",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],   
            
            [
                'title' => "Inny temat realizowany przez studenta",
                'description' => "Inny temat realizowany przez studenta.",
                'technologies' => "-",
                'difficulty' => "-",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],                 


        ]);
    }
}
