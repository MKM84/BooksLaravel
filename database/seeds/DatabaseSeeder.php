<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        
        $this->call(AuthorTableSeeder::class);
        // d'abord on crée les livres
        // puis dans le code des seeders on les associera 
        $this->call(BookTableSeeder::class);
    }
}
