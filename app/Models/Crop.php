<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crop extends Model
{
    use HasFactory;
    protected $table = 'crop';
    protected  $fillable = [
     'crop', 'season', 'field_id', 'avocodvariety', 'dateplanted', 'nooftrees', 'certifiedtrees', 'beansvariety', 'expectedharvestdate', 'expectedvolume', 'previouscrop', 'quantityplanted',
    ];
     public function pests()
    {
        return $this->belongsToMany(Pests::class);
    }

	 public function pesticides()
    {
        return $this->belongsToMany(Pesticide::class);
    }

     public function diseases()
    {
        return $this->belongsToMany(Diseases::class);
    }
    public function fields() {
        return $this->belongsTo(Field::class);
    }
    public function harvests(){
        return $this->hasMany(Harvest::class);
    }
}
