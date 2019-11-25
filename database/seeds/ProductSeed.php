<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ProductSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,50) as $index) {
            DB::table('products')->insert([
                'name' => $faker->name(10,true),
                'quantity'=> rand(11,9),
                'stock'=> rand(11,9),
                'price'=>number_format(rand(111,999),2, '.', ','),
                'created_at' => Carbon::now(),
            ]);
        }
    }
}
