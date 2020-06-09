<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';

    protected $fillable = ['amount','transaction_date','description','project_id','currency_id','income_source_id','transaction_type_id','user_id'];

    public function project()
    {
    	return $this->belongsTo(Project::class);
    }

    public function currency()
    {
    	return $this->belongsTo(Currency::class);
    }

    public function incomeSource()
    {
    	return $this->belongsTo(IncomeSource::class);
    }

    public function transactionType()
    {
    	return $this->belongsTo(TransactionType::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
