<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Harvest extends Model
{
    use HasFactory;
    protected  $fillable = [
     'date', 'unit', 'farmers_id', 'quantity','totalquantity', 'avocadovariety', 'crates', 'price', 'amount', 
    ];

     public function farmers() {
        return $this->belongsTo(Farmer::class);
    }

     public function crops() {
        return $this->belongsTo(Crop::class);
    }

    use \Znck\Eloquent\Traits\BelongsToThrough;

    public function fields() {
        return $this->belongsToThrough(Field::class, Crop::class);
    }
     
}
