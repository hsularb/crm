<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IncomeSource extends Model
{
   	protected $table = 'income_source';

   	protected $fillable = ['name','fee_percent'];

   	public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }
}
