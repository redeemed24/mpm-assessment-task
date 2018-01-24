<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    protected $fillable = [
    	"name"
    ];

    public function employees(){
    	return $this->hasMany("App\Employees", "company_id");
    }
}
