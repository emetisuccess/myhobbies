<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            "sports" => "primary",
            "Relaxation" => "secondary",
            "Fun" => "warning",
            "Nature" => "success",
            "inspiration" => "light",
            "Friends" => "info",
            "Love" => "danger",
            "Interest" => "dark"
        ];

        foreach ($tags as $key => $value) {
            $tag = new Tag([
                "name" => $key,
                "style" => $value
            ]);
            $tag->save();
        }
    }
}