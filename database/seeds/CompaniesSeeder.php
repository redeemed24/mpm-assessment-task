<?php

use Illuminate\Database\Seeder;
use App\Companies;

class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$data = array(
			array(
				"name" => "Tencent Holdings",
				"created_at" => date("Y-m-d h:m:s")
			),
			array(
				"name" => "Apple",
				"created_at" => date("Y-m-d h:m:s")
			),
			array(
				"name" => "Microsoft",
				"created_at" => date("Y-m-d h:m:s")
			),
			array(
				"name" => "Amazon.com",
				"created_at" => date("Y-m-d h:m:s")
			),
			array(
				"name" => "Johnson & Johnson",
				"created_at" => date("Y-m-d h:m:s")
			),
			array(
				"name" => "Alibaba",
				"created_at" => date("Y-m-d h:m:s")
			),
			array(
				"name" => "General Electric",
				"created_at" => date("Y-m-d h:m:s")
			),
			array(
				"name" => "Berkshire Hathaway",
				"created_at" => date("Y-m-d h:m:s")
			),
			array(
				"name" => "Facebook",
				"created_at" => date("Y-m-d h:m:s")
			),
			array(
				"name" => "ExxonMobil",
				"created_at" => date("Y-m-d h:m:s")
			)
		);

		Companies::insert($data);        
    }
}
