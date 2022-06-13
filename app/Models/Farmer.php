<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farmer extends Model
{
    use HasFactory;

     protected $fillable = [ 'name', 'phone', 'location', 'farmsize', 'fwithhomestead', 'farmblocksno', 'farmownership', 'fmaincrop', 'idno', 'coordinator', 'gps',
      'fieldname', 'crop', 'avocodvariety', 'nooftrees', 'certifiedtrees', 'dateplanted', 'beansvariety', 'quantityplanted', 'expectedvolume', 'expectedharvestdate',
    ];

    public function harvests(){
    	return $this->hasMany(Harvest::class);
    }

    public function fields(){
    	return $this->hasMany(Field::class);
    }

}
