<?php

use Illuminate\Database\Seeder;
use App\PostInfo;

class PostInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(PostInfo::class, 50)->create()->each(function($id){
            $id->save();
        });
    }
}
