<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PublicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('publications') -> insert([
            'title' => 'alfabeto',
            'content' => 'abcdefghijklmnopqrstuvwxyz',
            'likes' => 100,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
    }
}
