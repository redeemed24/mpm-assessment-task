<?php

use Illuminate\Database\Seeder;
use App\Employees;
use App\Companies;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = Companies::all()->pluck('id')->toArray();
        
        if($companies){
            
            $total = count($companies) - 1;

            $data = array(
            	array(
            		"name" => "Marilyn Monroe",
            		"company_id" => $companies[rand(0, $total)],
    				"created_at" => date("Y-m-d h:m:s")
            	),
            	array(
            		"name" => "Abraham Lincoln",
            		"company_id" => $companies[rand(0, $total)],
    				"created_at" => date("Y-m-d h:m:s")
            	),
            	array(
            		"name" => "Mother Teresa",
            		"company_id" => $companies[rand(0, $total)],
    				"created_at" => date("Y-m-d h:m:s")
            	),
            	array(
            		"name" => "John F. Kennedy",
            		"company_id" => $companies[rand(0, $total)],
    				"created_at" => date("Y-m-d h:m:s")
            	),
            	array(
            		"name" => "Martin Luther King",
            		"company_id" => $companies[rand(0, $total)],
    				"created_at" => date("Y-m-d h:m:s")
            	),
            	array(
            		"name" => "Winston Churchill",
            		"company_id" => $companies[rand(0, $total)],
    				"created_at" => date("Y-m-d h:m:s")
            	),
            	array(
            		"name" => "Muhammad Ali",
            		"company_id" => $companies[rand(0, $total)],
    				"created_at" => date("Y-m-d h:m:s")
            	),
            	array(
            		"name" => "Mahatma Gandhi",
            		"company_id" => $companies[rand(0, $total)],
    				"created_at" => date("Y-m-d h:m:s")
            	),
            	array(
            		"name" => "Margaret Thatcher",
            		"company_id" => $companies[rand(0, $total)],
    				"created_at" => date("Y-m-d h:m:s")
            	),
            	array(
            		"name" => "George Orwell",
            		"company_id" => $companies[rand(0, $total)],
    				"created_at" => date("Y-m-d h:m:s")
            	),
            	array(
            		"name" => "Albert Einstein",
            		"company_id" => $companies[rand(0, $total)],
    				"created_at" => date("Y-m-d h:m:s")
            	),
            	array(
            		"name" => "Queen Elizabeth II",
            		"company_id" => $companies[rand(0, $total)],
    				"created_at" => date("Y-m-d h:m:s")
            	),
            	array(
            		"name" => "Louis Pasteur",
            		"company_id" => $companies[rand(0, $total)],
    				"created_at" => date("Y-m-d h:m:s")
            	)
            );

            Employees::insert($data);
        }
    }
}
