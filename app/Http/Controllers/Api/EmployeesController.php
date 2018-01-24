<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Excel;

use App\Employees;
use App\Exports;

class EmployeesController extends Controller
{
    public function export(){
    	
        $filename = "employees-" . time();
        
        $success = false; $data = [];

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

        try{
            $uploaded = \Storage::disk('s3')->put($filename, $file, [
               'visibility' => 'public',
               'ContentType' => 'application/csv'
            ]);
        }catch(\Aws\S3\Exception\S3Exception $e){
           
            return response()->json([
                "success" => false,
                "error" => $e->getMessage()
            ]);
        }

        if($uploaded){
            $success = true;
            $url = \Storage::disk('s3')->url($filename);

            Exports::create([
                "file" => $url
            ]);

            $data["file"] = $url;
        }

        return response()->json([
            "success" => $success,
            "data" => $data
        ]);
    }
}

