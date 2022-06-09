<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farmer extends Model
{
    use HasFactory;

     protected $fillable = [ 'name', 'gender', 'age', 'education', 'phone', 'location', 'fperiod', 'farmsize', 'fwithhomestead', 'farmanimals', 'farmblocks', 'farmblocksno', 'farmcertifications', 'farmownership', 'farmanimalsno', 'farmtransport', 'fmaincrop', 'fothercrop'
    ];

    public function fields(){
    	return $this->hasMany(Field::class);
    }

}
