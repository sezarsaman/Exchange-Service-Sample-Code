<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('fa_IR');
        $max = 100;
        for ($i = 0; $i < $max; $i++) {
            $origin = rand(1,3);
            if($origin==1){
                $end = rand(2,3);
            }elseif($origin==2){
                $end = 3;
            }elseif($origin==3){
                $end = rand(1,2);
            }
            DB::table('orders')->insert([
                'order_email'              => $faker->email,
                'order_amount'             => $faker->numberBetween(10),
                'order_currency_id_origin' => $origin,
                'order_currency_id_end'    => $end,
                'order_reference_code'     => $faker->unique()->numberBetween(99999,9999999),
                'created_at'               => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'               => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
    }
}
