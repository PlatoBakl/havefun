<?php

use Illuminate\Database\Seeder;

class EventTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('event_types')->insert([
            [ 'title' => 'Бизнес', 'created_at' => NOW(), 'updated_at' => NOW()],
            [ 'title' => 'Выставка', 'created_at' => NOW(), 'updated_at' => NOW()],
            [ 'title' => 'Детям', 'created_at' => NOW(), 'updated_at' => NOW()],
            [ 'title' => 'Еда', 'created_at' => NOW(), 'updated_at' => NOW()],
            [ 'title' => 'Кино', 'created_at' => NOW(), 'updated_at' => NOW()],
            [ 'title' => 'Концерт', 'created_at' => NOW(), 'updated_at' => NOW()],
            [ 'title' => 'Лекция', 'created_at' => NOW(), 'updated_at' => NOW()],
            [ 'title' => 'Театр', 'created_at' => NOW(), 'updated_at' => NOW()],
            [ 'title' => 'Спорт', 'created_at' => NOW(), 'updated_at' => NOW()],
            [ 'title' => 'Фестиваль', 'created_at' => NOW(), 'updated_at' => NOW()],
            [ 'title' => 'Экскурсия', 'created_at' => NOW(), 'updated_at' => NOW()]
        ]);
    }
}
