<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class favourite extends Model
{
    //
	protected $fillable = [
    'Season',
    'Episode',
    'Quote'
  ];
}
