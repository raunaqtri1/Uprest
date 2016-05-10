<?php

use Illuminate\Database\Seeder;

class categoriestable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'category' => 'business',
        ]);
        DB::table('categories')->insert([
            'category' => 'entertainment',
        ]);
         DB::table('categories')->insert([
            'category' => 'fashion',
        ]);
          DB::table('categories')->insert([
            'category' => 'food',
        ]);
           DB::table('categories')->insert([
            'category' => 'football',
        ]);
           DB::table('categories')->insert([
           'category' => 'home & garden',
        ]);
           DB::table('categories')->insert([
           'category' => 'india',
        ]);
           DB::table('categories')->insert([
           'category' => 'indian cricket',
        ]);
           DB::table('categories')->insert([
           'category' => 'ipl',
        ]);
           DB::table('categories')->insert([
           'category' => 'lifestyle',
        ]);
           DB::table('categories')->insert([
           'category' => 'movies',
        ]);
           DB::table('categories')->insert([
           'category' => 'politics',
        ]);
           DB::table('categories')->insert([
           'category' => 'relaxation',
        ]);
           DB::table('categories')->insert([
           'category' => 'sports',
        ]);
           DB::table('categories')->insert([
           'category' => 'tech',
        ]);
           DB::table('categories')->insert([
           'category' => 'travel',
        ]);

    }
}
