<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoriesCount = max((int)$this->command->ask('How many categories would you like?', 12), 1); // интерактивный вопрос для консоли, стандартное значение. max() потребуется больше поставить больше, чем 1

        Category::factory($categoriesCount)->create(); // 20 шт
    }
}
