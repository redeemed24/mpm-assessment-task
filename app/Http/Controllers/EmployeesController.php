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

    	Excel::create($filename, function($excel){

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

    	})->store('csv', 'exports');

        Exports::create([
            "file" => $filename . ".csv"
        ]);

        return response()->json([
            "success" => true,
            "data" => [
                "file" => url("/") . "/exports/" . $filename . ".csv"
            ]
        ]);
    }
}
