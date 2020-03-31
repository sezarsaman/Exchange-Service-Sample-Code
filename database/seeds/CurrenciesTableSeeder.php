<?php

use Illuminate\Database\Seeder;

class CurrenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currencies = array(
            array(
                'currency_name'    => 'ریال',
                'currency_sign'    => 'ریال',
                'currency_ratio'   => 1,
                'currency_default' => true
            ),
            array(
                'currency_name'    => 'یورو',
                'currency_sign'    => '€',
                'currency_ratio'   => 180000,
                'currency_default' => false
            ),
            array(
                'currency_name'    => 'دلار',
                'currency_sign'    => '$',
                'currency_ratio'   => 160000,
                'currency_default' => false
            )
        );
        foreach ($currencies as $k=>$c){
            DB::table('currencies')->insert([
                'currency_name'    => $c['currency_name'],
                'currency_sign'    => $c['currency_sign'],
                'currency_ratio'   => $c['currency_ratio'],
                'currency_default' => $c['currency_default'],
            ]);
        }
    }
}
