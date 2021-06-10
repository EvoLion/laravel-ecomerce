<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()  //заполняет базу с фабрикики php artisan migrate:refresh --seed || php artisan db:seed (запустить заполнение без очистки базы)
    {
        if($this->command->confirm('Do you want to refresh the database?')) { // интерактивный вопрос для консоли
            $this->command->call('migrate:refresh'); // конскольная команда php artisan
            $this->command->info('Database was refreshed');
        }

        $this->call([
            CategorySeeder::class, // php artisan db:seed --class=CategorySeeder
            ProductSeeder::class, // php artisan db:seed --class=ProductSeeder
        ]);

    }
}
