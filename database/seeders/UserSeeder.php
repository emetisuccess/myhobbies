<?php

namespace Database\Seeders;

use App\Models\Hobby;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(100)->create()
            ->each(function ($user) {
                Hobby::factory(rand(1, 8))->create([
                    "user_id" => $user->id
                ])->each(function ($hobby) {
                    $tag_ids = range(1, 8);
                    shuffle($tag_ids);
                    $assignment = array_slice($tag_ids, 0, rand(0, 8));
                    foreach ($assignment as $tag_id) {
                        DB::table("hobby_tag")->insert([
                            "hobby_id" => $hobby->id,
                            "tag_id" => $tag_id,
                            "created_at" => now(),
                            "updated_at" => now()
                        ]);
                    }
                });
            });
    }
}