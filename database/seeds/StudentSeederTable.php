<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class StudentSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('students')->insert([
            [
                'roll_no'=>12,
                'name'=>'Ram',
                'class'=>'C6'
            ],
            [
                'roll_no'=>13,
                'name'=>'Shyam',
                'class'=>'C6'
            ]
        ]);
        
    }
}
