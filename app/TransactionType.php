<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionType extends Model
{
    protected $table = 'transaction_type';

    protected $fillable = ['name'];

    public function transaction()
    {
    	return $this->hasMany(Transaction::class);
    }
}
