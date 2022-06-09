<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Market extends Model
{
	use HasFactory;
	protected $table = 'farmer';

	protected $fillable = [
		'name', 'email', 'phone', 'crop',
	];
}
