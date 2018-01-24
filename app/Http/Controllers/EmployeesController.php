<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;

use App\Employees;
use App\Exports;

class EmployeesController extends Controller
{
    public function export(){
    	
        $filename = "Employees-" . time();

    	$file = Excel::create($filename, function($excel){

    		$excel->setTitle("Employees");
    		
    		$excel->sheet('sheet1', function($sheet){

    			$employees = Employees::all();
    			
    			$data = [];

    			foreach($employees as $e){
    				$data[] = [
    					"Employee Name" => $e->name,
    					"Employee ID" => $e->id,
    					"Company Name" => $e->company->name,
    					"Company ID" => $e->company_id,
    					"Created" => date("M d, Y", strtotime($e->created_at))
    				];
    			}

    			$sheet->fromArray($data);

    		});

    	})->string('csv');


        $filename .=".csv";

        $url = \Storage::disk('s3')->put($filename, $file, [
               'visibility' => 'public',
               'ContentType' => 'application/csv'
           ]);

        Exports::create([
            "file" => $filename
        ]);

        return response()->json([
            "success" => true,
            "data" => [
                "file" => \Storage::disk('s3')->url($filename)
            ]
        ]);
    }
}
