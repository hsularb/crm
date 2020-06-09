<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
   	protected $table = 'currencies';

   	protected $fillable = ['name','code'];

   	public function transaction()
   	{
   		return $this->hasMany(Transaction::class);
   	}
}
